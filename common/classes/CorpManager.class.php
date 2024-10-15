<?php
#------------------------------------------------------------------------------
# 작업내용	:	업체 관리
# 인    수	:
# 작성일자	:	2018-12-26
# 작 성 자	:	webticktock@gmail.com
# 변경이력	:
#------------------------------------------------------------------------------

class CorpManager
{
	private $dbm;

	public function __construct()
	{
		$this->dbm				=	new DBManager();
	}

	//	업체 코드
	public function getCorpCode($domain)
	{
		$msg					=	new Message();

		if ( $domain == '' ) {
			$msg->setMessage("잘못된 매개변수입니다. 관리자에게 문의하세요.");
			return $msg;
		}

		$nDomain				=	str_replace('www.', '', $domain);
		$domain1				=	'www.' . $nDomain;

		$strSQL					=	"SELECT corpCode AS outField FROM tbl_corp WHERE (corpHost = '" . $domain . "' OR corpHost = '" . $domain1 . "' OR corpTestHost = '" . $domain . "' OR corpTestHost = '" . $domain1 . "') AND state IN ('1','2')";
		//echo $strSQL;
		$msg					=	$this->dbm->execute($strSQL, '2');
		$tmp					=	$msg->getData();
		if ( $tmp ) {
			$msg				=	$tmp[0]['outField'];
		} else {
			$msg				=	'';
		}

		return $msg;
	}
	//	업체 코드

	//	지점이 있는 권역 리스트
	public function getRegionPubCodeList($regionPubCode, $schCode)
	{
		global $common;
		$msg					=	new Message();

		if ( $regionPubCode == '' || $schCode == '' ) {
			$msg->setMessage("잘못된 매개변수입니다. 관리자에게 문의하세요.");
			return $msg;
		}

		$strSQL					=	"
									SELECT pc.pubCode, pc.codeName
									FROM tbl_pubCode AS pc
									INNER JOIN tbl_corp AS cp ON
									pc.pubCode = cp.regionCode
									WHERE pc.corpCode = '$common[masterCorp]' AND pc.pPubCode = '$regionPubCode' AND pc.isUse = 'Y' AND FIND_IN_SET(cp.corpCode, '$schCode') > 0 AND cp.state = '2'
									GROUP BY pc.pubCode, pc.codeName
									ORDER BY pc.codeSort
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	지점이 있는 권역 리스트

	//	권역별 지점 리스트
	/*
	서울						:	36
	인천/경기권					:	37
	대전/충청권					:	38
	부산/대구/울산/경상권		:	39
	광주/전라권					:	40
	강원권						:	41
	제주도						:	42
	*/
	public function getRegionCorpList($regionCode)
	{
		global $common;
		$msg					=	new Message();

		$strSQL					=	"
									SELECT cp.corpCode, cp.corpName, cp.corpHost, cp.corpAddr1, cp.corpAddr2, cs.kakaoEventID, cp.reservastionURL, cp.corpTelNum, cp.operationTimePC, cp.operationTimeMO, cp.corpImg
									FROM tbl_corp AS cp
									INNER JOIN tbl_corpSNS AS cs ON
									cs.corpCode = cp.corpCode
									WHERE LEFT(cp.corpCode, 1) = '$common[brandCode]' AND cp.corpGubun = '2' AND cp.regionCode = '$regionCode' AND cp.state = '2'
									ORDER BY cp.corpName
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}

	public function getRegionCorpCnt($regionCode)
	{
		global $common;
		$msg					=	new Message();

		$strSQL					=	"
									SELECT	IFNULL(COUNT(corpCode), 0) AS corpCnt
									FROM tbl_corp
									WHERE LEFT(corpCode, 1) = '$common[brandCode]' AND corpGubun = '2' AND regionCode = '$regionCode' AND state = '2'
									";
		$msg					=	$this->dbm->execute($strSQL, '2');
		$tmp					=	$msg->getData();
		if ( $tmp ) {
			$msg				=	$tmp[0]['corpCnt'];
		} else {
			$msg				=	'';
		}

		return $msg;
	}

	public function getReservationRegionCorpList($pCode)
	{
		global $common;
		$msg					=	new Message();

		$strSQL					=	"
									SELECT	pc.pubCode, pc.codeName, cp.corpName, cp.mapInfo, cs.kakaoCounselID, cs.kakaoEventID, cp.reservastionURL
									FROM tbl_pubCode AS pc
									INNER JOIN tbl_corp AS cp ON
									cp.regionCode = pc.pubCode
									INNER JOIN tbl_corpSNS AS cs ON
									cs.corpCode = cp.corpCode
									WHERE pc.pPubCode = '$pCode' AND pc.isUse = 'Y' AND LEFT(cp.corpCode, 1) = '$common[brandCode]' AND cp.corpGubun = '2' AND cp.state = '2'
									ORDER BY pc.codeSort, cp.corpName
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	권역별 지점 리스트

	//	거리별 지점 리스트
	public function getDistanceCorpList($schLat, $schLng)
	{
		global $common;
		$msg					=	new Message();

		$strSQL					=	"
									SELECT	cp.corpCode, cp.corpName, cp.corpHost, cp.corpAddr1, cp.corpAddr2, cs.kakaoEventID, cp.reservastionURL, cp.corpTelNum, cp.operationTimePC, cp.operationTimeMO, cp.corpImg,
											ROUND(6371 * acos( cos( radians($schLng) ) * cos( radians( cp.corpLng ) ) * cos( radians( cp.corpLat ) - radians($schLat) ) + sin( radians($schLng) ) * sin( radians( cp.corpLng ) ) ), 2) AS distance
									FROM tbl_corp AS cp
									INNER JOIN tbl_corpSNS AS cs ON
									cs.corpCode = cp.corpCode
									WHERE LEFT(cp.corpCode, 1) = '$common[brandCode]' AND cp.corpGubun = '2' AND cp.state = '2'
									ORDER BY distance
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}

	public function getAllCorpList()
	{
		global $common;
		$msg					=	new Message();

		$strSQL					=	"
									SELECT	cp.corpCode, cp.corpName, cp.corpHost, cp.corpNum, cp.corpTelNum, cp.corpMobile, sf1.userName AS corpChief1, sf2.userName AS corpChief2, cp.corpAddr1, cp.corpAddr2,
											sns.kakaoCounselID, sns.kakaoEventID
									FROM tbl_corp AS cp
									LEFT OUTER JOIN tbl_staff AS sf1 ON
									sf1.userIdx = cp.corpChief1
									LEFT OUTER JOIN tbl_staff AS sf2 ON
									sf2.userIdx = cp.corpChief2
									LEFT OUTER JOIN tbl_corpSNS AS sns ON
									sns.corpCode = cp.corpCode
									WHERE LEFT(cp.corpCode, 1) = '$common[brandCode]' AND cp.corpGubun = '2' AND cp.state = '2'
									ORDER BY cp.corpName
									";
		//echo $strSQL;
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	지점 리스트

	//	업체 환경 설정 수정 정보 가져오기
	public function getCorpModify($corpCode)
	{
		$msg					=	new Message();
		if ( $corpCode == '' ) {
			$msg->setMessage("잘못된 매개변수입니다. 관리자에게 문의하세요.");
			return $msg;
		}

		$strSQL					=	"
									SELECT	cp.corpGubun, cp.corpHost, cp.corpName, cp.corpRealName, cp.corpNameEng, sf1.userName AS corpChief1, sf2.userName AS corpChief2,
											cp.corpNum, cp.corpZip, cp.corpAddr1, cp.corpAddr2, cp.corpLat, cp.corpLng, cp.corpTelNum, cp.corpMobile, cp.corpFaxNum,
											cp.corpEmail, cp.operationTimePC, cp.operationTimeMO, cp.parkingInfo, cp.outParkingInfo, cp.parkingInfoTalk,
											cp.parkZip, cp.parkAddr1, cp.parkAddr2, cp.parkLat, cp.parkLng, cp.cardInfo, cp.mapInfo, cp.corpMemo, cp.corpLog,
											cp.backMovieURL, cp.corpBackImg, cp.backSubMovieURL, cp.corpSubBackImg, cp.regionCode, cp.state, cp.expectTime, cp.reservationEndTime, cp.isSundayReservation,
											cp.isPrice, cp.isAutoReservation, cp.isMondayReservation, cp.openDate, cp.regDate, cp.modifyDate, cb.brandCode, cb.brandName, cb.brandLogo,
											cs.kakaoCounselID, cs.kakaoEventID, cs.alimtalkKey, cs.kakaoJavascriptKey, cs.naverMapID,
											cs.naverBlogID, cs.faceBookID, cs.instagramID, cs.youtubeID, cs.googleKeyPC, cs.googleKeyMO,
											cs.lineID, cs.wechatID, cs.weiboID, cs.isViewKakaoEventID, cs.isViewLineID, cs.isViewWechatID, cs.isViewWeiboID,
											cs.kakaoEventIDImg, cs.lineIDImg, cs.wechatIDImg, cs.weiboIDImg
									FROM tbl_corp AS cp
									INNER JOIN tbl_corpBrand AS cb ON
									cb.brandCode = LEFT(cp.corpCode, 1)
									LEFT OUTER JOIN tbl_corpSNS AS cs ON
									cs.corpCode = cp.corpCode
									LEFT OUTER JOIN tbl_staff AS sf1 ON
									sf1.userIdx = cp.corpChief1
									LEFT OUTER JOIN tbl_staff AS sf2 ON
									sf2.userIdx = cp.corpChief2
									WHERE cp.corpCode				=	'" . $corpCode . "'
									";
		//echo $strSQL;
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	업체 환경 설정 수정정보 가져오기

	//	업체 환경 설정 수정 정보 가져오기
	public function getRegionCorpModify($regionCode, $corpCode)
	{
		$msg					=	new Message();
		if ( $corpCode == '' ) {
			$msg->setMessage("잘못된 매개변수입니다. 관리자에게 문의하세요.");
			return $msg;
		}

		$strSQL					=	"
									SELECT	cp.corpGubun, cp.corpHost, cp.corpName, cp.corpNameEng, sf1.userName AS corpChief1, sf2.userName AS corpChief2,
											cp.corpNum, cp.corpZip, cp.corpAddr1, cp.corpAddr2, cp.corpLat, cp.corpLng, cp.corpTelNum, cp.corpMobile, cp.corpFaxNum,
											cp.corpEmail, cp.operationTimePC, cp.operationTimeMO, cp.parkingInfo, cp.parkingInfoTalk, cp.cardInfo, cp.mapInfo, cp.corpMemo, cp.corpLog,
											cp.backMovieURL, cp.corpBackImg, cp.backSubMovieURL, cp.corpSubBackImg, cp.regionCode, cp.state, cp.expectTime,
											cp.openDate, cp.regDate, cp.modifyDate, cb.brandCode, cb.brandName, cb.brandLogo,
											cs.kakaoCounselID, cs.kakaoEventID, cs.alimtalkKey, cs.kakaoJavascriptKey, cs.naverMapID,
											cs.naverBlogID, cs.faceBookID, cs.instagramID, cs.youtubeID, cs.googleKeyPC, cs.googleKeyMO
									FROM tbl_corp AS cp
									INNER JOIN tbl_corpBrand AS cb ON
									cb.brandCode = LEFT(cp.corpCode, 1)
									LEFT OUTER JOIN tbl_corpSNS AS cs ON
									cs.corpCode = cp.corpCode
									LEFT OUTER JOIN tbl_staff AS sf1 ON
									sf1.userIdx = cp.corpChief1
									LEFT OUTER JOIN tbl_staff AS sf2 ON
									sf2.userIdx = cp.corpChief2
									WHERE regionCode = '$regionCode' AND cp.corpCode = '$corpCode' AND state = '2'
									";
		//echo $strSQL;
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	업체 환경 설정 수정정보 가져오기

	//	브랜트별 지점 리스트 가져오기
	public function getBrandCorpList()
	{
		global $common;
		$msg					=	new Message();

		$strSQL					=	"
									SELECT corpCode, corpName
									FROM tbl_corp
									WHERE corpCode = '$common[brandCode]' AND state = '2'
									ORDER BY corpName
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	브랜트별 지점 리스트 가져오기


	//	지점 정보 가져오기
	public function getApplyCorpInfo($applyCorp)
	{
		global $common;
		$msg					=	new Message();
		$strSQL					=	"CALL usp_applyCorpSort('$applyCorp')";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	지점 정보 가져오기

	//	홈페이지 환경 관리	===========================================================================
	//	업체 환경 설정 수정 정보 가져오기
	public function getHomePageSetting($schBrand, $schBranch)
	{
		$msg					=	new Message();
		if ( $schBrand == '' || $schBranch == '' ) {
			$msg->setMessage("잘못된 매개변수입니다. 관리자에게 문의하세요.");
			return $msg;
		}

		$strSQL					=	"
									SELECT	isAuto,
											homeImg1, homeLink1, isLink1,
											homeImg2, homeLink2, isLink2,
											homeImg3, homeLink3, isLink3,
											homeImg4, homeLink4, isLink4,
											homeImg5, homeLink5, isLink5,

											mIsAuto,
											mHomeImg1, mHomeLink1, mIsLink1,
											mHomeImg2, mHomeLink2, mIsLink2,
											mHomeImg3, mHomeLink3, mIsLink3,
											mHomeImg4, mHomeLink4, mIsLink4,
											mHomeImg5, mHomeLink5, mIsLink5,

											startDate1, endDate1, isUseDate1,
											startDate2, endDate2, isUseDate2,
											startDate3, endDate3, isUseDate3,
											startDate4, endDate4, isUseDate4,
											startDate5, endDate5, isUseDate5,

											eventImg1, isView1, eventLink1, isEventLink1, eventName1,
											eventImg2, isView2, eventLink2, isEventLink2, eventName2,
											eventImg3, isView3, eventLink3, isEventLink3, eventName3,
											eventImg4, isView4, eventLink4, isEventLink4, eventName4,
											eventImg5, isView5, eventLink5, isEventLink5, eventName5,

											mEventImg1, mEventLink1, mIsEventLink1,
											mEventImg2, mEventLink2, mIsEventLink2,
											mEventImg3, mEventLink3, mIsEventLink3,
											mEventImg4, mEventLink4, mIsEventLink4,
											mEventImg5, mEventLink5, mIsEventLink5,

											sectionName1, sectionSubName1, sectionEvent1,
											sectionName2, sectionSubName2, sectionEvent2,
											sectionName3, sectionSubName3, sectionEvent3
									FROM tbl_homePageSetting
									WHERE brandCode = '$schBrand' AND corpCode = '$schBranch'
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	업체 환경 설정 수정정보 가져오기
	//	홈페이지 환경 관리	===========================================================================
}
?>