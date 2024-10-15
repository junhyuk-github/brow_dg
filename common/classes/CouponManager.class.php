<?php
#------------------------------------------------------------------------------
# 작업내용	:	쿠폰 관련
# 인    수	:
# 작성일자	:	2023-08-16
# 작 성 자	:	lyhti@triupcorp.com
# 변경이력	:
#------------------------------------------------------------------------------

class CouponManager
{
	private $dbm;

	public function __construct() {
		$this->dbm				=	new DBManager();
		$this->fm				=	new FileManager();
	}

	// 사용 가능 쿠폰 count
	public function getCouponIssueCount()
	{
		global $common;
		$msg					=	new Message();

		$userIdx = $common['userIdx'];

		if ( $userIdx == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$strSQL					=	"SELECT
										IFNULL(count(tci.idx), 0) AS count
									FROM tbl_couponIssue tci
									JOIN tbl_couponTemplate tct
									ON tci.tctIdx = tct.idx
									WHERE 1=1
									AND tci.isDel = 'N'
									AND tci.deleteDate IS NULL
									AND tct.isDel = 'N'
									AND tct.deleteDate IS NULL
									AND tci.tamMemberIdx = $userIdx
									AND tci.couponState = 810";

		$msg					=	$this->dbm->execute($strSQL, 2);
		$temp					=	$msg->getData();

		return $temp[0]['count'];
	}
	// 사용 가능 쿠폰 count

	// 쿠폰 내역 조회
	public function couponIssueDetail($gubun, $pageNo, $recordPerPage)
	{
		global $common;
		$msg					=	new Message();

		$userIdx = $common['userIdx'];

		if ( $userIdx == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		if ( $gubun ) {
			$whereData					=	" AND tci.couponState = $gubun ";
		} else {
			$whereData					=	'';
		}

		$strSQL					=	"SELECT
										tci.idx, tct.idx AS tctIdx, tct.imgPath, tct.imgName, tct.couponName, tci.couponState,
										pubCode_NAME(tci.couponState) AS couponStateName,
										tci.useStartDate, tci.useEndDate
									FROM tbl_couponIssue tci
									JOIN tbl_couponTemplate tct
									ON tci.tctIdx = tct.idx
									WHERE 1=1
									AND tci.isDel = 'N'
									AND tci.deleteDate IS NULL
									AND tct.isDel = 'N'
									AND tct.deleteDate IS NULL
									AND tci.tamMemberIdx = $userIdx
									".$whereData."
									ORDER BY tci.regDate DESC
									LIMIT $pageNo, $recordPerPage
									";

		$msg					=	$this->dbm->execute($strSQL, 2);

		$strSQL					=	"SELECT
										IFNULL(count(tci.idx), 0) AS count
									FROM tbl_couponIssue tci
									JOIN tbl_couponTemplate tct
									ON tci.tctIdx = tct.idx
									WHERE 1=1
									AND tci.isDel = 'N'
									AND tci.deleteDate IS NULL
									AND tct.isDel = 'N'
									AND tct.deleteDate IS NULL
									AND tci.tamMemberIdx = $userIdx
									".$whereData;

		$msg2					=	$this->dbm->execute($strSQL, '2');
		$temp					=	$msg2->getData();
		$msg->setMessage($temp[0]['count']);

		return $msg;
	}
	// 쿠폰 내역 조회

	// 쿠폰 주의사항 리스트
	public function getCouponNoticeList($idx)
	{
		global $common;
		$msg					=	new Message();

		if ( $idx == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$strSQL					=	"SELECT
										tcn.notice
									FROM tbl_couponNotice tcn
									WHERE 1=1
									AND tcn.isDel = 'N'
									AND tcn.deleteDate IS NULL
									AND tctIdx = $idx
									";

		$msg					=	$this->dbm->execute($strSQL, 2);

		return $msg;
	}
	// 쿠폰 주의사항 리스트

	// 쿠폰 사용 처리
	public function setCouponState($idx)
	{
		global $common;
		$msg					=	new Message();

		if ( $idx == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$userIdx				=	$common['userIdx'];
		$nowDate				=	date('Y-m-d H:i:s');

		$strSQL					=	"UPDATE tbl_couponIssue SET
										couponState			=	'811',
										usedDate			=	'$nowDate'
									WHERE idx				=	'$idx'
									";

		$msg					=	$this->dbm->execute($strSQL, '1');

		return $msg;
	}
	//	쿠폰 사용 처리
}
?>