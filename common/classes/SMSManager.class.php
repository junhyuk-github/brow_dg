<?php
#------------------------------------------------------------------------------
# 작업내용	:	문자 / 알림톡 / 메일 발송
# 인    수	:
# 작성일자	:	2018-11-30
# 작 성 자	:	webticktock@gmail.com
# 변경이력	:
#------------------------------------------------------------------------------

class SMSManager
{
	private $dbm;

	public function __construct()
	{
		$this->dbm				=	new DBManager();
		$this->fm				=	new FileManager();
	}

	//	SMS 발송
	function sendSMSProc($data)
	{
		global $common;
		$msg					=	new Message();
		$strSQL					=	array();

		if ( !is_array($data) ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$corpCode				=	$common['corpCode'];
		$t						=	explode(' ', microtime());
		$CMID					=	floor(($t[0] + $t[1]) * 1000);
		$senderMobile			=	str_replace('-', '', $data['senderMobile']);
		$receiveMobile			=	str_replace('-', '', $data['receiveMobile']);
		$receiverName			=	$data['receiverName'];
		$contents				=	$data['contents'];

		//	메시지 타입 (4:SMS 5:MMS, 7:AT, 8:FT) 대체발송이 이루진 경우 (1:SMS / 2:MMS) 
		$strSQL					=	"
									INSERT INTO BIZ_MSG
										( MSG_TYPE, CMID, REQUEST_TIME, SEND_TIME, DEST_PHONE, DEST_NAME, SEND_PHONE, MSG_BODY, CINFO ) VALUES
										('5', '$CMID', NOW(), NOW(), '$receiveMobile', '$receiverName', '$senderMobile', '$contents', '$corpCode')
									";
		//print_r($strSQL);
		$msg				=	$this->dbm->execute($strSQL, '3');
		return $msg;
	}
	//	SMS 발송

	//	메일 발송
	function sendMail($data)
	{
		//	$data['sendMail']		:	보내는 메일 주소
		//	$data['sendName']		:	보낸이
		//	$data['mailto']			:	받는 메일주소
		//	$data['subject']		:	메일 제목
		//	$data['content']		:	메일 내용

		$header					=	"Return-Path: " . $data['sendMail'] . "\n";
		$header					.=	"From: =?UTF-8?B?" . base64_encode($data['sendName']) . "?= <" . $data['sendMail'] . ">\n";
		$header					.=	"MIME-Version: 1.0\n";
		$header					.=	"X-Priority: 3\n";
		$header					.=	"X-MSMail-Priority: Normal\n";
		$header					.=	"X-Mailer: FormMailer\n";
		$header					.=	"Content-Transfer-Encoding: base64\n";
		$header					.=	"Content-Type: text/html;\n \tcharset=UTF-8\n";

		$subject				=	"=?UTF-8?B?" . base64_encode($data['subject']) . "?=\n";
		$contents				=	'이름 : ' . $data['sendName'] . '<br>이메일 : ' . $data['sendMail'] . '<br><br>' . $data['content'];

		$message				=	base64_encode($contents);
		flush();
		$msg					=	mail($data['mailTo'], $subject, $message, $header, '-f'. $data['sendMail']);

		return $msg;
	}
	//	메일 발송


	//	예약 인증을 위한 SMS 발송 횟수
	public function getReservationCertNoSendCnt($phone)
	{
		global $common;
		$msg					=	new Message();

		if ( $phone == '' ) {
			$readCnt			=	'999';
		} else {
			$sendTime			=	date('Y-m-d');

			$strSQL1			=	"
									SELECT count(CMID) AS cnt
									FROM BIZ_MSG
									WHERE DEST_PHONE = '$phone' AND LEFT(SEND_TIME, 10) = '$sendTime' AND BINARY MSG_BODY LIKE '%예약 인증번호 : %'
									";
			//echo '<!--';
			//echo $strSQL1;
			//echo '-->';
			$msg1				=	$this->dbm->execute($strSQL1, '3', 'Y');
			$tmp1				=	$msg1->getData();
			$readCnt1			=	$tmp1[0]['cnt'];

			$tableName			=	'BIZ_LOG_' . date('Ym');
			$strSQL2			=	"
									SELECT count(CMID) AS cnt
									FROM $tableName
									WHERE DEST_PHONE = '$phone' AND LEFT(SEND_TIME, 10) = '$sendTime' AND BINARY MSG_BODY LIKE '%예약 인증번호 : %'
									";
			//echo '<!--';
			//echo $strSQL2;
			//echo '-->';
			$msg2				=	$this->dbm->execute($strSQL2, '3', 'Y');
			$tmp2				=	$msg2->getData();
			$readCnt2			=	$tmp2[0]['cnt'];

			$readCnt			=	$readCnt1 + $readCnt2;
		}
		return $readCnt;
	}
	//	예약 인증을 위한 SMS 발송 횟수


	//	알림톡 발송
	function sendKakao($data)
	{
		global $common;
		$msg					=	new Message();
		$strSQL					=	array();

		if ( !is_array($data) ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$t						=	explode(' ', microtime());
		$CMID					=	floor(($t[0] + $t[1]) * 1000);
		$corpCode				=	$common['corpCode'];
		$receiver				=	str_replace('-', '', $data['destPhone']);
		$receiverName			=	$data['destName'];
		$destDate				=	date('Y년 m월 d일 H시 i분', strtotime($data['destDate']));					//	2019년 1월 10일 11시 00분
		$tempIdx				=	$data['tempIdx'];
		$certNo					=	$data['certNo'];
		$attchFile				=	$data['attchFile'];

		if ( $data['sendTime'] ) {
			$sendDate			=	$data['sendTime'];															//	발송예약 시간
		} else {
			$sendDate			=	date('Y-m-d H:i:s');
		}

		//	업체 정보 구하기
		$rsSQL					=	"
									SELECT  br.brandName, cp.corpHost, cp.corpName, cp.corpTelNum, cp.corpMobile,
											CONCAT(cp.corpAddr1, ' ', cp.corpAddr2) AS corpAddr,
											cp.mapInfo, cp.parkingInfo, cs.alimtalkKey
									FROM tbl_corp AS cp
									INNER JOIN tbl_corpBrand AS br ON
									br.brandCode = LEFT(cp.corpCode, 1)
									INNER JOIN tbl_corpSNS AS cs ON
									cs.corpCode = cp.corpCode
									WHERE cp.corpCode = '$common[corpCode]'
									";
		//echo $rsSQL . '<br><br>';
		$rs						=	$this->dbm->execute($rsSQL, '2');
		$rs						=	$rs->getData();

		if ( $rs ) {
			$brandName			=	$rs[0]['brandName'];
			$corpHomePage		=	$common['http'] . $rs[0]['corpHost'];
			$corpName			=	$rs[0]['corpName'];
			$sender				=	str_replace('-', '', $rs[0]['corpTelNum']);
			$corpMobile			=	str_replace('-', '', $rs[0]['corpMobile']);
			$corpAddr			=	$rs[0]['corpAddr'];
			$mapInfo			=	$rs[0]['mapInfo'];
			$parkingInfo		=	$rs[0]['parkingInfo'];
			$alimtalkKey		=	$rs[0]['alimtalkKey'];
		} else {
			$msg->setMessage('잘못된 정보 입니다. 관리자에게 문의하세요.');
			return $msg;
		}
		//	업체 정보 구하기

		//	알림톡 템플릿 정보 구하기
		$rsSQL					=	"
									SELECT tempCode, contents
									FROM tbl_alimtalkTemplate
									WHERE brandCode = '$common[brandCode]' AND tempIdx = '$tempIdx' AND isUse = 'Y' AND idx NOT IN ('21', '24', '25', '26', '27', '29', '31', '58', '59')
									";
		//echo $rsSQL . '<br>';
		$msg					=	$this->dbm->execute($rsSQL, '2');
		$temp					=	$msg->getData();
		if ( $temp ) {
			$templateCode		=	$temp[0]['tempCode'];
			$content			=	$temp[0]['contents'];

			$kakaoContents		=	addslashes($content);
			if ( $tempIdx == '113' ) {
				$kakaoContents		=	str_replace('{브랜드명}', $brandName, $kakaoContents);
				$kakaoContents		=	str_replace('{지점명}', $corpName, $kakaoContents);
				$kakaoContents		=	str_replace('{고객명}', $receiverName, $kakaoContents);
				$kakaoContents		=	str_replace('{예약시간}', $destDate, $kakaoContents);
				$kakaoContents		=	str_replace('{휴대전화}', $data['destPhone'], $kakaoContents);

				$receiver				=	str_replace('-', '', $corpMobile);
				$receiverName			=	$brandName;
			} else {
				$kakaoContents		=	str_replace('{브랜드명}', $brandName, $kakaoContents);
				$kakaoContents		=	str_replace('{지점명}', $corpName, $kakaoContents);
				$kakaoContents		=	str_replace('{고객명}', $receiverName, $kakaoContents);
				$kakaoContents		=	str_replace('{예약시간}', $destDate, $kakaoContents);
				$kakaoContents		=	str_replace('{지점홈페이지}', $corpHomePage, $kakaoContents);
				$kakaoContents		=	str_replace('{지점주소}', $corpAddr, $kakaoContents);
				$kakaoContents		=	str_replace('{간략위치}', $mapInfo, $kakaoContents);
				$kakaoContents		=	str_replace('{주차안내}', $parkingInfo, $kakaoContents);
				$kakaoContents		=	str_replace('{지점대표번호}', $sender, $kakaoContents);
				$kakaoContents		=	str_replace('#{인증번호}', $certNo, $kakaoContents);
				$kakaoContents		=	str_replace('{인증번호}', $certNo, $kakaoContents);
				$kakaoContents		=	str_replace('#{이름}', $receiverName, $kakaoContents);
				$kakaoContents		=	str_replace('#{쿠폰명}', $data['couponName'], $kakaoContents);
				$kakaoContents		=	str_replace('#{사용 처리 일시}', $sendDate, $kakaoContents);
			}

			$kakaoContents			=	addslashes($kakaoContents);
		} else {
			$msg->setMessage('정보가 부족합니다. 관리자에게 문의하세요.');
			return $msg;
		}
		//	알림톡 템플릿 정보 구하기

		$strSQL					=	"
									INSERT INTO BIZ_MSG
										( MSG_TYPE, CMID, REQUEST_TIME, SEND_TIME, DEST_PHONE, DEST_NAME, SEND_PHONE, MSG_BODY, TEMPLATE_CODE, SENDER_KEY, NATION_CODE, RE_TYPE, RE_BODY, ATTACHED_FILE, CINFO ) VALUES
										('6', '$CMID', NOW(), '$sendDate', '$receiver', '$receiverName', '$sender', '$kakaoContents', '$templateCode', '$alimtalkKey', '82', 'MMS', '$kakaoContents', '$attchFile', '$corpCode')
									";

		$msg				=	$this->dbm->execute($strSQL, '3', 'Y');
		return $msg;
	}
	//	알림톡 발송

	function sendKakaoCoupon($couponList, $data)
	{
		global $common;
		$msg					=	new Message();
		$strSQL					=	array();

		if ( !is_array($couponList) || !is_array($data)) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		//알림톡
		$corpCode				=	$common['corpCode'];
		$receiver				=	str_replace('-', '', $data['userMobile']);
		$receiverName			=	$data['userName'];
		$tempIdx				=	'867';
		$sendDate				=	date('Y-m-d H:i:s');
		$attchFile				=	'newCoupon_brow.json';
		//	업체 정보 구하기
		$rsSQL					=	"
			SELECT  br.brandName, cp.corpHost, cp.corpName, cp.corpTelNum, cp.corpMobile,
					CONCAT(cp.corpAddr1, ' ', cp.corpAddr2) AS corpAddr,
					cp.mapInfo, cp.parkingInfo, cs.alimtalkKey
			FROM tbl_corp AS cp
			INNER JOIN tbl_corpBrand AS br ON
			br.brandCode = LEFT(cp.corpCode, 1)
			INNER JOIN tbl_corpSNS AS cs ON
			cs.corpCode = cp.corpCode
			WHERE cp.corpCode = '$corpCode'
		";
		//echo $rsSQL . '<br><br>';
		$rs						=	$this->dbm->execute($rsSQL, '2');
		$rs						=	$rs->getData();

		if ( $rs ) {
			$alimtalkKey		=	$rs[0]['alimtalkKey'];
			$sender				=	str_replace('-', '', $rs[0]['corpTelNum']);
		} else {
			$msg->setMessage('잘못된 정보 입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		//	알림톡 템플릿 정보 구하기
		$rsSQL ="   SELECT 
						tempCode, contents
					FROM 
						tbl_alimtalkTemplate
					WHERE 
						brandCode = '$common[brandCode]' AND tempIdx = '$tempIdx' AND isUse = 'Y' AND idx NOT IN ('21', '24', '25', '26', '27', '29', '31', '58', '59')
			";
		//echo $rsSQL . '<br>';
		$msg					=	$this->dbm->execute($rsSQL, '2');
		$temp					=	$msg->getData();
		if ( !$temp ) {
			$msg->setMessage('정보가 부족합니다. 관리자에게 문의하세요.');
			return $msg;
		}else{
			$templateCode		=	$temp[0]['tempCode'];
			$content			=	$temp[0]['contents'];
			$kakaoContents		=	addslashes($content);
		}

		$useStartDate = date('Y-m-d');
		
		foreach($couponList as $val)
		{
			$kakaoContents		=	addslashes($content);	
			// 현재시간으로 랜덤값 생성임 써두될듯
			$CMID = uniqid();
			//0:pubCode,1: D 일별 / M 월별
			$dateCreated = explode(';', $val['useDate']);
			$couponPubdata  = $this->dbm->execute("SELECT REPLACE(REPLACE(codeName, '월', ''), '일', '') AS codeName FROM tbl_pubCode where pubCode = '$dateCreated[0]'");
			$couponPubdata  = $couponPubdata->getData();
			$couponPubdata  = $couponPubdata[0]['codeName'];
			//날짜
			$modifier = '+';
			$modifier .= $couponPubdata;

			if ( $dateCreated[1] == 'M' ) {
				$modifier .= ' month';
			} else {
				$modifier .= ' day';
			}

			$today = date('Y-m-d');

			$useEndDate = date("Y-m-d", strtotime($today . $modifier));
			//알림톡
			$kakaoContents		=	str_replace('#{이름}', $data['userName'], $kakaoContents);
			$kakaoContents		=	str_replace('#{쿠폰명}', $val['couponName'], $kakaoContents);
			$kakaoContents		=	str_replace('#{시작일}', $useStartDate, $kakaoContents);
			$kakaoContents		=	str_replace('#{종료일}', $useEndDate, $kakaoContents);
			$kakaoContents		=	addslashes($kakaoContents);

			$alimtalkValue = [
				'6',
				$CMID,
				$sendDate,
				$sendDate,
				$receiver,
				$receiverName,
				$sender,
				$kakaoContents,
				$templateCode,
				$alimtalkKey,
				'82',
				'MMS',
				$kakaoContents,
				$attchFile, 
				$corpCode
			];

			$alimtalkVal[] = "('" . implode("','", $alimtalkValue) . "')";
		}

		$strSQL = "INSERT INTO BIZ_MSG
		( MSG_TYPE, CMID, REQUEST_TIME, SEND_TIME, DEST_PHONE, DEST_NAME, SEND_PHONE, MSG_BODY, TEMPLATE_CODE, SENDER_KEY, NATION_CODE, RE_TYPE, RE_BODY, ATTACHED_FILE, CINFO ) 
		VALUES ".implode(",", $alimtalkVal);
		$msg =	$this->dbm->execute($strSQL, '3', 'Y');
		//알림톡
	}
}
?>