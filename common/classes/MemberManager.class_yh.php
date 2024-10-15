<?php
#------------------------------------------------------------------------------
# 작업내용	:	회원 관련
# 인    수	:
# 작성일자	:	2018-11-30
# 작 성 자	:	webtick@gmail.com
# 변경이력	:
#------------------------------------------------------------------------------

class MemberManager
{
	private $dbm;

	public function __construct() {
		$this->dbm				=	new DBManager();
		$this->fm				=	new FileManager();
	}

	//	아이디 중복 체크
	public function chkIDDuplication($userID)
	{
		global $common;
		$strSQL					=	"
									SELECT count(userID) AS count
									FROM tbl_academyMember
									WHERE userID = '$userID' AND gubun = 'B'
									";
		$msg					=	$this->dbm->execute($strSQL, '2');
		$data					=	$msg->getData();
		$size					=	$data[0]['count'];

		if ( $size == 0 ) {
			return true;
		} else {
			return false;
		}
	}
	//	아이디 중복 체크

	//추천인코드 중복체크
	public function chkCommendeDuplication($token)
	{
		global $common;
		$strSQL					=	"
									SELECT count(recommender) AS count
									FROM tbl_academyMember
									WHERE recommender = '$token'
									";
		$msg					=	$this->dbm->execute($strSQL, '2');
		$data					=	$msg->getData();
		$size					=	$data[0]['count'];

		if ( $size == 0 ) {
			return true;
		} else {
			return false;
		}
	}

	//추천인 정보
	public function chkCommendeInfo($token)
	{
		global $common;
		$strSQL					=	"
									SELECT userGroup
									FROM tbl_academyMember
									WHERE recommender = '$token' and isOut = 'N' and gubun = 'B'
									";
		$msg					=	$this->dbm->execute($strSQL, '2');
		$data					=	$msg->getData();
		return $data[0];
	}

	//	회원 로그인
	public function userLoginProc($loginID, $loginPWD)
	{
		global $common;
		$msg					=	new Message();

		if ( $loginID == '' || $loginPWD == '' ) {
			$msg->setMessage("잘못된 매개변수입니다. 관리자에게 문의하세요.");
			return $msg;
		}

		$strSQL					=	"
									SELECT	userIdx, userID, userName, userMobile, userMail, userGroup
									FROM tbl_academyMember
									WHERE userID = '$loginID' AND userPWD = PASSWORD('$loginPWD') AND isOut = 'N' AND gubun = 'B'
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	회원 로그인

	//	SNS 로그인
	public function snsLoginProc($data)
	{
		global $common;
		$msg					=	new Message();

		if ( $data == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$snsUserID				=	$data['snsUserID'];
		$strSQL					=	"
									SELECT	userIdx, userID, userName, userMobile, userMail, userGroup
									FROM tbl_academyMember
									WHERE snsUserID = '$snsUserID' AND isOut = 'N'
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	SNS 로그인

	//	로그인 이력
	public function setLoginHistoryProc($userIdx)
	{
		global $common;
		$msg					=	new Message();
		$strSQL					=	array();

		if ( $userIdx == '' ) {
			$msg->setMessage("잘못된 매개변수입니다. 관리자에게 문의하세요.");
			return $msg;
		}

		$curDate				=	date('Y-m-d H:i:s');

		//	최종 로그인 날짜 업데이트
		$strSQL					=	"
									UPDATE tbl_academyMember SET
										lastLoginDate						=	'$curDate'
									WHERE userIdx							=	'$userIdx'
									";

		//print_r($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	로그인 이력

	//	회원 기초 정보
	public function getMemberInfo($userIdx)
	{
		global $common;
		$msg					=	new Message();

		if ( $userIdx == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$strSQL					=	"SELECT
										userID, userName, userMobile, userMail, userBirth, userJob, userZip, userAddr1, userAddr2, startDate, endDate, curriculum,
										recommender, recommenderCode, regDate
									FROM tbl_academyMember
									WHERE userIdx = '$userIdx'
									";
		//echo $strSQL;
		$msg					=	$this->dbm->execute($strSQL);
		return $msg;
	}
	//	회원 기초 정보

	//	회원 등록/수정/삭제
	public function setMemberProc($data)
	{
		global $common;
		$msg					=	new Message();

		if ( $data == '' || $data['userID'] == '' || $data['userName'] == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		if ( $data['userIdx'] ) {
			$userIdx			=	$data['userIdx'];
		} else {
			$rs					=	$this->dbm->execute("SELECT (IFNULL(MAX(userIdx), 0) + 1) AS cnt FROM tbl_academyMember");
			$rs					=	$rs->getData();
			$rs					=	$rs[0];
			if($rs['cnt'] > 0) {
				$userIdx		=	$rs['cnt'];
			}
		}

		$userID					=	$data['userID'];
		$userPWD				=	$data['userPWD'];
		$userPWD1				=	$data['userPWD1'];
		$userName				=	$data['userName'];
		$userMobile				=	$data['userMobile'];
		$userMail				=	$data['userMail'];
		$userBirth				=	$data['userBirth'];
		$userJob				=	$data['userJob'];
		$userZip				=	$data['userZip'];
		$userAddr1				=	$data['userAddr1'];
		$userAddr2				=	$data['userAddr2'];
		$joinGubun				=	$data['joinGubun'];
		$userGroup				=	$data['userGroup'];
		$snsUserID				=	$data['snsUserID'];
		$recommenderCode		=	$data['recommenderCode'];
		$commendGroup			=	$data['commendGroup'];
		$dateDiff				=	$data['dateDiff'];

		if ( $userPWD1 ) {
			$strSQL				=	"
									INSERT INTO tbl_academyMember
										(gubun, userIdx, userID, userPWD, userName, userMobile, userMail, userBirth, userJob, userZip, userAddr1, userAddr2, userGroup, joinGubun, snsUserID, recommenderCode) VALUES
										('B', $userIdx, '$userID', PASSWORD('$userPWD'), '$userName', '$userMobile', '$userMail', '$userBirth', '$userJob', '$userZip', '$userAddr1', '$userAddr2', '$userGroup', '$joinGubun', '$snsUserID', '$recommenderCode')
									ON DUPLICATE KEY UPDATE
										userName			=	'$userName',
										userPWD				=	PASSWORD('$userPWD'),
										userMobile			=	'$userMobile',
										userMail			=	'$userMail',
										userBirth			=	'$userBirth',
										userJob				=	'$userJob',
										userZip				=	'$userZip',
										userAddr1			=	'$userAddr1',
										userAddr2			=	'$userAddr2',
										recommenderCode		=	'$recommenderCode'
									";
		} else {
			$strSQL				=	"
									INSERT INTO tbl_academyMember
										(gubun, userIdx, userID, userName, userMobile, userMail, userBirth, userJob, userZip, userAddr1, userAddr2, userGroup, joinGubun, snsUserID, recommenderCode) VALUES
										('B', $userIdx, '$userID', '$userName', '$userMobile', '$userMail', '$userBirth', '$userJob', '$userZip', '$userAddr1', '$userAddr2', '$userGroup', '$joinGubun', '$snsUserID', '$recommenderCode')
									ON DUPLICATE KEY UPDATE
										userName			=	'$userName',
										userMobile			=	'$userMobile',
										userMail			=	'$userMail',
										userBirth			=	'$userBirth',
										userJob				=	'$userJob',
										userZip				=	'$userZip',
										userAddr1			=	'$userAddr1',
										userAddr2			=	'$userAddr2',
										recommenderCode		=	'$recommenderCode'
									";
		}

		$msg					=	$this->dbm->execute($strSQL, '1', 'Y');

        if ( $dateDiff != '' ) {
            if ( $dateDiff < 3 ) {
                $couponList  = $this->dbm->execute("SELECT * FROM tbl_couponTemplate where couponGubun = '814' and conditions='872' and recommenderGubun ='$commendGroup' and issueState = '817'");
                $couponList  = $couponList->getData();

                if ( $couponList ) {
                    $useStartDate = date('Y-m-d');

                    foreach ($couponList as $val) {
                        //0:pubCode,1: D 일별 / M 월별
                        $dateCreated = explode(';', $val['useDate']);
                        $couponPubdata  = $this->dbm->execute("SELECT REPLACE(REPLACE(codeName, '월', ''), '일', '') AS codeName FROM tbl_pubCode where pubCode = '$dateCreated[0]'");
                        $couponPubdata  = $couponPubdata->getData();
                        $couponPubdata  = $couponPubdata[0]['codeName'];
                        //날짜
                        $modifier = '+';
                        $modifier .= $couponPubdata;

                        if ($dateCreated[1] == 'M') {
                            $modifier .= ' month';
                        } else {
                            $modifier .= ' day';
                        }

                        $today = date('Y-m-d');

                        $useEndDate = date("Y-m-d", strtotime($today . $modifier));

                        $value = [
                            $val['idx'],
                            $userIdx,
                            $useStartDate,
                            $useEndDate,
                            "810",
                            $val['regDateIdx']
                        ];
                        $queryValues[] = "('" . implode("','", $value) . "')";
                    }

                    $strSQL = "INSERT INTO tbl_couponIssue
								(tctIdx, tamMemberIdx, useStartDate, useEndDate, couponState, regDateIdx) 
								VALUES ".implode(",", $queryValues);

                    $this->dbm->execute($strSQL, '1', 'Y');
                }

                return [$msg, $couponList];
            } else {
                return $msg;
            }
        } else {
            return $msg;
        }

	}
	//	회원 등록/수정/삭제

	//회원 가입 추천인 코드추가로직
	public function setMemberNewProc($data)
	{	
		global $common;
		$msg					=	new Message();

		if ( $data == '' || $data['userID'] == '' || $data['userName'] == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$userID					=	$data['userID'];
		$userPWD				=	$data['userPWD'];
		$userPWD1				=	$data['userPWD1'];
		$userName				=	$data['userName'];
		$userMobile				=	$data['userMobile'];
		$userMail				=	$data['userMail'];
		$userBirth				=	$data['userBirth'];
		$userJob				=	$data['userJob'];
		$userZip				=	$data['userZip'];
		$userAddr1				=	$data['userAddr1'];
		$userAddr2				=	$data['userAddr2'];
		$joinGubun				=	$data['joinGubun'];
		$userGroup				=	$data['userGroup'];
		$snsUserID				=	$data['snsUserID'];
		$commendGroup			=	$data['commendGroup'];
		$commendToken			= 	$data['commendToken'];
		$recommenderCode		= 	$data['recommenderCode'];

		$rs					=	$this->dbm->execute("SELECT (IFNULL(MAX(userIdx), 0) + 1) AS userIdx FROM tbl_academyMember");
		$rs					=	$rs->getData();
		$rs					=	$rs[0];
		if($rs['userIdx'] > 0) {
			$userIdx		=	$rs['userIdx'];
		}

		$couponList  = $this->dbm->execute("SELECT * FROM tbl_couponTemplate where couponGubun = '814' and conditions='872' and recommenderGubun ='$commendGroup' and issueState = '817'");
		$couponList  = $couponList->getData();
		if($couponList) {
			$useStartDate = date('Y-m-d');
			foreach ($couponList as $val) {
				//0:pubCode,1: D 일별 / M 월별
				$dateCreated = explode(';', $val['useDate']);
				$couponPubdata  = $this->dbm->execute("SELECT REPLACE(REPLACE(codeName, '월', ''), '일', '') AS codeName FROM tbl_pubCode where pubCode = '$dateCreated[0]'");
				$couponPubdata  = $couponPubdata->getData();
				$couponPubdata  = $couponPubdata[0]['codeName'];
				//날짜
				$modifier = '+';
				$modifier .= $couponPubdata;

				if ($dateCreated[1] == 'M') {
					$modifier .= ' month';
				} else{
					$modifier .= ' day';
				}

				$today = date('Y-m-d');

				$useEndDate = date("Y-m-d", strtotime($today . $modifier));

				$value = [
					$val['idx'],
					$userIdx,
					$useStartDate,
					$useEndDate,
					'810',
					$val['regDateIdx']
				];
				$queryValues[] = "('" . implode("','", $value) . "')";
			}

			$strSQL[] = "INSERT INTO tbl_couponIssue
							(tctIdx, tamMemberIdx, useStartDate, useEndDate, couponState, regDateIdx) 
							VALUES ".implode(",", $queryValues);
		}

		$strSQL[] = "INSERT INTO tbl_academyMember
						(gubun, userIdx, userID, userPWD, userName, userMobile, userMail, userBirth, userJob, userZip, userAddr1, userAddr2, userGroup, joinGubun, snsUserID, recommender, recommenderCode) VALUES
						('B', $userIdx, '$userID', PASSWORD('$userPWD'), '$userName', '$userMobile', '$userMail', '$userBirth', '$userJob', '$userZip', '$userAddr1', '$userAddr2', '$userGroup', '$joinGubun', '$snsUserID', '$commendToken', '$recommenderCode')
					";
		$msg      =	$this->dbm->transaction($strSQL, '1', 'Y');

		return [$msg, $couponList];
		
	}
	//회원 가입 추천인 코드 
	
	//	회원 아이디 찾기
	public function findIDProc($findName, $findMail)
	{
		global $common;
		$msg					=	new Message();

		if ( $findName == '' || $findMail == '' ) {
			$msg->setMessage("잘못된 매개변수입니다. 관리자에게 문의하세요.");
			return $msg;
		}

		$strSQL					=	"
									SELECT	userID
									FROM tbl_academyMember
									WHERE userName = '$findName' AND userMail = '$findMail' AND isOut = 'N'
									";
		//echo '<!--';
		//echo $strSQL;
		//echo '-->';
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	회원 아이디 찾기

	//	회원 비밀번호 찾기
	public function findPWDProc($findID, $findMobile)
	{
		global $common;
		$msg					=	new Message();

		if ( $findID == '' || $findMobile == '' ) {
			$msg->setMessage("잘못된 매개변수입니다. 관리자에게 문의하세요.");
			return $msg;
		}

		$strSQL					=	"
									SELECT	userIdx, userID, userName, userMobile
									FROM tbl_academyMember
									WHERE userID = '$findID' AND userMobile = '$findMobile' AND isOut = 'N'
									";
		//echo '<!--';
		//echo $strSQL;
		//echo '-->';
		$msg					=	$this->dbm->execute($strSQL, '2', 'Y');
		return $msg;
	}
	//	회원 비밀번호 찾기

	//	회원 비밀번호 찾기 후 임시 비밀번호 저장
	public function setNewPwdProc($findIdx, $imsiPWD)
	{
		global $common;
		$msg					=	new Message();

		if ( $findIdx == '' || $imsiPWD == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$strSQL					=	"
									UPDATE tbl_academyMember SET
										userPWD				=	PASSWORD('$imsiPWD')
									WHERE userIdx			=	'$findIdx'
									";

		//echo '<!--';
		//echo $strSQL;
		//echo '-->';
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	회원 비밀번호 찾기 후 임시 비밀번호 저장


	//	회원 탈퇴
	public function setMemberOutProc($data)
	{
		global $common;
		$msg					=	new Message();

		if ( $data == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$userIdx				=	$common['userIdx'];
		$outReason				=	$data['outReason'];
		$isOut					=	'Y';
		$outDate				=	DATE('Y-m-d');

		$strSQL					=	"
									UPDATE tbl_academyMember SET
										userGroup			=	'1',
										isOut				=	'$isOut',
										outDate				=	'$outDate',
										outReason			=	'$outReason'
									WHERE userIdx			=	'$userIdx'
									";
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	회원 등록/수정/삭제
}
?>