<?php
#------------------------------------------------------------------------------
# 작업내용	:	기초 관리
# 인    수	:
# 작성일자	:	2018-11-30
# 작 성 자	:	webticktock@gmail.com
# 변경이력	:
#------------------------------------------------------------------------------

class BasicManager
{
	private $dbm;

	public function __construct()
	{
		$this->dbm				=	new DBManager();
		$this->fm				=	new FileManager();
	}

	//	공통코드	=====================================================================================================
	//	공통코드명 가져오기
	public function getPubCodeName($table, $cCode)
	{
		$msg					=	new Message();
		$tableName				=	'tbl_' . $table;

		if ( !$table || !$cCode ) return $msg;

		$strSQL					=	"SELECT codeName FROM $tableName WHERE pubCode = '$cCode'";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		$tmp					=	$msg->getData();
		if ( $tmp ) {
			$msg				=	$tmp[0]['codeName'];
		} else {
			$msg				=	'';
		}

		return $msg;
	}
	//	공통코드명 가져오기

	//	공통코드 리스트 가져오기
	public function getPubCodeList($table, $pCode, $rCnt=0)
	{
		global $common;

		$tableName				=	'tbl_' . $table;
		if ( $rCnt > 0 ) {
			$limitPage			=	" LIMIT $rCnt";
		}

		if ( $table == 'pubCode' ) {
			$corpCode			=	$common['masterCorp'];
		} else {
			$corpCode			=	$common['corpCode'];
		}

		$strSQL					=	"
									SELECT pubCode, codeName
									FROM $tableName
									WHERE corpCode = '$corpCode' AND pPubCode = '$pCode' AND isUse = 'Y'
									ORDER BY codeSort
									" . $limitPage;
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	공통코드 리스트 가져오기

	//	공통코드 리스트 가져오기
	public function getPubCodeNoCorpList($table, $pCode, $rCnt=0)
	{
		global $common;

		$tableName				=	'tbl_' . $table;
		if ( $rCnt > 0 ) {
			$limitPage			=	" LIMIT $rCnt";
		}

		$strSQL					=	"
									SELECT pubCode, codeName
									FROM $tableName
									WHERE pPubCode = '$pCode' AND isUse = 'Y'
									ORDER BY codeSort
									" . $limitPage;
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	공통코드 리스트 가져오기

	//	공통코드 수정정보 가져오기
	public function getModifyPubCode($table, $cCode)
	{
		$tableName				=	'tbl_' . $table;

		$strSQL					=	"
									SELECT codeName
									FROM $tableName
									WHERE pubCode				=	'$cCode'
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	공통코드 수정정보 가져오기

	//	공통코드 등록/수정/삭제 가져오기
	public function setPubCodeProc($table, $data)
	{
		global $common;

		$msg					=	new Message();
		$tableName				=	'tbl_' . $table;

		if ( $data == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		if ( strtoupper($data['isAction']) == 'D' ) {
			if ( $data['cCode'] == '' ) {
				$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
				return $msg;
			}

			$strSQL				=	"
									UPDATE $tableName SET
										isUse					=	'N'
									WHERE pubCode				=	'$data[cCode]'
									";
		} else if ( strtoupper($data['isAction']) == 'U' ) {
			if ( $data['cCode'] == '' || $data['cName'] == '' ) {
				$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
				return $msg;
			}

			$strSQL				=	"
									UPDATE $tableName SET
										codeName				=	'$data[cName]'
									WHERE pubCode				=	'$data[cCode]'
									";
		} else if ( strtoupper($data['isAction']) == 'N' ) {
			if ( $data['pCode'] == '' || $data['cName'] == '' || $data['lvl'] == '' ) {
				$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
				return $msg;
			}

			if ( $table == 'pubCode' ) {
				$corpCode		=	$common['masterCorp'];
			} else {
				$corpCode		=	$common['corpCode'];
			}

			$msg				=	$this->getPubCodeSort($table, $data['pCode']);
			$rs					=	$msg->getData();
			$cSort				=	$rs['codeSort'];

			$strSQL				=	"
									INSERT INTO $tableName
										(corpCode, pPubCode, codeName, codeLevel, codeSort) VALUES
										('$corpCode', '$data[pCode]', '$data[cName]', '$data[lvl]', '$cSort')
									";
		}
		//echo $strSQL;
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	공통코드 등록/수정/삭제 가져오기

	//	공통코드 순서 가져오기
	public function getPubCodeSort($table, $pCode)
	{
		$tableName				=	'tbl_' . $table;
		$strSQL					=	"
									SELECT (IFNULL(MAX(codeSort), 0) + 1) AS codeSort
									FROM $tableName
									WHERE pPubCode = '$pCode'
									";
		//echo $strSQL;
		$msg					=	$this->dbm->execute($strSQL, '2');
		$temp					=	$msg->getData();
		if ( $temp != '' ) $msg->setData($temp[0]);
		return $msg;
	}
	//	공통코드 순서 가져오기

	//	공통코드 순서 수정
	public function setPubCodeOrderProc($table, $codeSort)
	{
		$msg					=	new Message();
		$tableName				=	'tbl_' . $table;
		$strSQL					=	array();

		$codeSort				=	str_replace(',,', '', $codeSort);
		$codeSort				=	explode(',', $codeSort);

		for ( $i = 1; $i <= count($codeSort); $i++ )
		{
			$pubCode			=	$codeSort[$i - 1];
			if ( $pubCode ) {
				$strSQL[]		=	"
									UPDATE $tableName SET
										codeSort					=	$i
									WHERE pubCode					=	" . $pubCode;
			}
		}
		//print_r($strSQL);
		$msg					=	$this->dbm->transaction($strSQL, '1');
		return $msg;
	}
	//	공통코드 순서 수정

	//	공통코드 등록 및 순서 저장
	public function setPubCodeSortProc($table, $data)
	{
		global $common;

		$msg					=	new Message();
		$tableName				=	'tbl_' . $table;
		$strSQL					=	array();

		if ( $table == 'pubCode' ) {
			$corpCode			=	$common['masterCorp'];
		} else {
			$corpCode			=	$common['corpCode'];
		}

		$codeSort				=	str_replace(',,', '', $data['codeSort']);
		$codeSort				=	explode(',', $codeSort);

		for ( $i = 1; $i <= count($codeSort); $i++ )
		{
			$pubCode			=	$codeSort[$i - 1];

			if ( $pubCode ) {
				$sql			=	"SELECT codeName FROM $tableName WHERE pubCode = '$pubCode'";
				$rs				=	$this->dbm->execute($sql, '2');
				$rs				=	$rs->getData();
				$rs				=	$rs[0];
				$codeName		=	$rs['codeName'];

				$strSQL[]		=	"
									INSERT INTO $tableName
										(corpCode, pPubCode, pubCode, codeName, codeLevel, codeSort) VALUES
										('$corpCode', '0', '$pubCode', '$codeName', '1', '$i')
									ON DUPLICATE KEY UPDATE
										codeSort						=	$i
									";
			}
		}
		$msg					=	$this->dbm->transaction($strSQL, '1');
		return $msg;
	}
	//	공통코드 등록 및 순서 저장
	//	공통코드	=====================================================================================================






	//	시술코드	=====================================================================================================
	//	시술코드 리스트 가져오기
	public function getTreatmentCodeList($brandCode, $gubun, $pCode)
	{
		global $common;

		$strSQL					=	"
									SELECT pubCode, codeName, applyCorp
									FROM tbl_treatmentCode
									WHERE brandCode = '$brandCode' AND gubun='$gubun' AND pPubCode = '$pCode' AND isUse = 'Y'
									ORDER BY codeSort
									" . $limitPage;
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	시술코드 리스트 가져오기

	//	시술코드 리스트 가져오기
	public function getTreatmentCodeList2($brandCode, $corpCode, $gubun, $pCode)
	{
		global $common;
		$where1					=	'';

		if ( $corpCode ) {
			$where1				=	" AND applyCorp = '$corpCode'";
		}

		$strSQL					=	"
									SELECT pubCode, codeName, applyCorp
									FROM tbl_treatmentCode
									WHERE brandCode = '$brandCode' AND gubun='$gubun' AND pPubCode = '$pCode' AND isUse = 'Y'
									"
									. $where1 .
									"
									ORDER BY codeSort
									" . $limitPage;
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	시술코드 리스트 가져오기

	//	시술코드 리스트 가져오기
	public function getTreatmentCodeList3($brandCode, $corpCode, $gubun, $pCode)
	{
		global $common;
		$where1					=	'';

		if ( $gubun == '2' || $gubun == '3' ) {
			$where				=	" AND applyCorp = '$corpCode'";
		}
		$strSQL					=	"
									SELECT pubCode, codeName
									FROM tbl_treatmentCode
									WHERE brandCode = '$brandCode' AND gubun='$gubun' AND pPubCode = '$pCode' AND isUse = 'Y'
									"
									. $where .
									"
									ORDER BY codeSort
									" . $limitPage;
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	시술코드 리스트 가져오기

	//	시술코드 수정정보 가져오기
	public function getModifyTreatmentCode($cCode)
	{
		if ( $cCode == '' ) {
			$msg->setMessage("잘못된 매개변수입니다. 관리자에게 문의하세요.");
			return $msg;
		}

		$strSQL					=	"
									SELECT codeName, applyCorp, isView
									FROM tbl_treatmentCode
									WHERE pubCode				=	'$cCode'
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	시술코드 수정정보 가져오기

	//	시술코드 등록/수정/삭제 가져오기
	public function setTreatmentCodeProc($data)
	{
		global $common;
		$msg					=	new Message();

		if ( $data == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		if ( strtoupper($data['isAction']) == 'D' ) {
			if ( $data['cCode'] == '' ) {
				$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
				return $msg;
			}

			$schBranch				=	$data['corpCode'];
			$schCate				=	$data['cCode'];
			if ( $data['gubun'] == '3' ) {
				$schGubun			=	'1';
			} else {
				$schGubun			=	'2';
			}

			$rsSQL				=	"
									SELECT	COUNT(idx) AS cnt
									FROM tbl_eventInfo
									WHERE MATCH(applyCorp) AGAINST('$schBranch') AND isView = 'Y' AND isUse = 'Y' AND gubun = '$schGubun' AND eventCate = '$schCate'
									";
			$rs					=	$this->dbm->execute($rsSQL, '2', 'Y');
			$rs					=	$rs->getData();
			$rs					=	$rs[0];
			if ( $rs['cnt'] == 0 ) {
				$strSQL			=	"
									UPDATE tbl_treatmentCode SET
										isUse					=	'N'
									WHERE pubCode				=	'$data[cCode]'
									";
				$msg			=	$this->dbm->execute($strSQL, '1');
			} else {
				$msg->setMessage('N1');
			}
		} else {
			$pubCode			=	$data['cCode']; if ( $pubCode == '' ) $pubCode = 'NULL';
			$applyCorp			=	$data['corpCode'];

			/*
			if ( $data['chkCorp'] ) {
				$applyCorp					=	'';
				for ( $j = 0; $j < count($data['chkCorp']); $j++ )
				{
					if ( $applyCorp ) {
						$applyCorp			=	$applyCorp . ',' . $data['chkCorp'][$j];
					} else {
						$applyCorp			=	$data['chkCorp'][$j];
					}
				}
			}
			*/

			//	구분(1 : 시술등록, 2 : 지점별 일반시술패키지, 3 : 지점별 이벤트패키지, 4 : 공통 일반시술패키지, 5 : 공통 이벤트패키지)
			if ( $data['gubun'] == '1' ) {
				$codeName		=	$data['cateName1'];
			} else if ( $data['gubun'] == '2' ) {
				$codeName		=	$data['cateName2'];
			} else if ( $data['gubun'] == '3' ) {
				$codeName		=	$data['cateName3'];
			} else if ( $data['gubun'] == '4' ) {
				$codeName		=	$data['cateName4'];
			} else if ( $data['gubun'] == '5' ) {
				$codeName		=	$data['cateName5'];
			}

			$strSQL				=	"
									INSERT INTO tbl_treatmentCode
										(brandCode, gubun, pubCode, codeName, applyCorp, pPubCode, codeLevel) VALUES
										('$data[brandCode]', '$data[gubun]', $pubCode, '$codeName', '$applyCorp', '$data[pCode]', '$data[lvl]')
									ON DUPLICATE KEY UPDATE
										codeName				=	'$codeName',
										applyCorp				=	'$applyCorp'
									";
			$msg				=	$this->dbm->execute($strSQL, '1');
			$msg->setMessage('Y');
		}
		//echo $strSQL;
		return $msg;
	}
	//	시술코드 등록/수정/삭제 가져오기

	//	시술코드 순서 저장
	public function setTreatmentCodeSortProc($data)
	{
		global $common;
		$msg					=	new Message();
		$strSQL					=	array();

		if ( $data == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$codeSort				=	$data['codeSort'];
		$strSort				=	explode(',' , $codeSort);

		for ( $i = 0 ; $i < count($strSort) ; $i++ )
		{
			$pubCode			=	$strSort[$i];
			$sort				=	$i + 1;

			if ( $pubCode ) {
				$strSQL[]			=	"
										UPDATE tbl_treatmentCode SET
											codeSort				=	'$sort'
										WHERE pubCode				=	'$pubCode'
										";
			}
		}
		//echo $strSQL;
		$msg					=	$this->dbm->transaction($strSQL, '1', 'Y');
		return $msg;
	}
	//	시술코드 순서 저장

	//	시술코드 노출설정
	public function setTreatmentCodeViewProc($data)
	{
		global $common;
		$msg					=	new Message();

		if ( $data == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$schBranch				=	$data['corpCode'];
		$schCate				=	$data['cCode'];
		if ( $data['gubun'] == '3' ) {
			$schGubun			=	'1';
		} else {
			$schGubun			=	'2';
		}
		$isView					=	$data['isView']; if ( $isView == '' ) $isView = 'N';

		$rsSQL					=	"
									SELECT	COUNT(idx) AS cnt
									FROM tbl_eventInfo
									WHERE MATCH(applyCorp) AGAINST('$schBranch') AND isView = 'Y' AND isUse = 'Y' AND gubun = '$schGubun' AND eventCate = '$schCate'
									";
		$rs						=	$this->dbm->execute($rsSQL, '2');
		$rs						=	$rs->getData();
		$rs						=	$rs[0];
		if ( $rs['cnt'] > 0 ) {
			$strSQL				=	"UPDATE tbl_treatmentCode SET isView = '$isView' WHERE pubCode = $schCate";
			$msg				=	$this->dbm->execute($strSQL, '1');
		} else {
			$msg->setMessage('N1');
		}

		return $msg;
	}
	//	시술코드 노출설정
	//	공통코드	=====================================================================================================

	//	권한 설정	=====================================================================================================
	//	메뉴 리스트 가져오기
	public function getMenuList()
	{
		$strSQL					=	"
									SELECT menuCode, menuLevel, menuName
									FROM tbl_menu
									WHERE isUse = 'Y'
									ORDER BY menuCode
									";

		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	메뉴 리스트 가져오기

	//	개인별 메뉴 권한 등록/수정
	public function setPerAuthProc($data)
	{
		$msg					=	new Message();
		$strSQL					=	array();

		if ( $data == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		//	삭제 후 다시
		$delSQL					=	"DELETE FROM tbl_menuPerAuth WHERE corpCode = '$data[corpCode]'";
		$this->dbm->execute($delSQL, '1');

		$staffIdxs				=	$data['staffIdx'];

		for ($i = 0; $i < count($staffIdxs); $i++)
		{
			$staffIdx			=	$staffIdxs[$i];
			$menuCode			=	'authMenu_' . $staffIdx;
			$menuCodes			=	$data[$menuCode];
			$authMenu			=	'';

			if ( $menuCodes ) {
				for ($j = 0; $j < count($menuCodes); $j++)
				{
					if ( $authMenu ) {
						$authMenu		=	$authMenu . ',' . $menuCodes[$j];
					} else {
						$authMenu		=	$menuCodes[$j];
					}
				}

				if ( $authMenu ) {
					$strSQL[]			=	"
											INSERT INTO tbl_menuPerAuth
												(corpCode, userIdx, authMenu) VALUES
												('$data[corpCode]', '$staffIdx', '$authMenu')
											ON DUPLICATE KEY UPDATE
												authMenu					=	'$authMenu'
											";
				}
			}
		}
		//print_r($strSQL);
		$msg					=	$this->dbm->transaction($strSQL, '1');
		return $msg;
	}
	//	개인별 메뉴 권한 등록/수정

	//	개인별 메뉴 권한 정보 가져오기
	public function getAuthPerMenu($schCode, $schUser)
	{
		if ( $schUser == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$strSQL					=	"
									SELECT authMenu
									FROM tbl_menuPerAuth
									WHERE userIdx = '$schUser'
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	개인별 메뉴 권한 정보 가져오기

	//	개인별 메뉴 권한 정보 가져오기
	public function getAdminPerAuth($schUser)
	{
		if ( $schUser == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$strSQL					=	"
									SELECT authMenu
									FROM tbl_menuPerAuth
									WHERE userIdx = '$schUser'
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	개인별 메뉴 권한 정보 가져오기
	//	권한 설정	=====================================================================================================


	//	대쉬보드 환경설정	=============================================================================================
	//	대쉬보드 정보 가져오기
	public function getDashBoardSettingInfo($schBrand)
	{
		$msg					=	new Message();

		if ( $schBrand == '' ) {
			$msg->setMessage("잘못된 매개변수입니다. 관리자에게 문의하세요.");
			return $msg;
		}

		$strSQL					=	"
									SELECT	dashSTime1, dashETime1, dashSTime2, dashETime2, dashSTime3, dashETime3, dashSTime4, dashETime4,
											timeMent1, timeMent2, timeMent3, timeMent4, dashMovie1, dashMovie2, dashMovie3, dashMovie4
									FROM tbl_dashBoardSetting
									WHERE brandCode = '$schBrand'
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	대쉬보드 정보 가져오기

	//	대쉬보드 등록/수정/삭제
	public function setDashBoardSettingProc($data)
	{
		$strSQL						=	array();

		if ( $data == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$brandCode					=	$data['brandCode'];

		//	시간대1
		$dashSTime1					=	$data['dashSTime11'] . ':' . $data['dashSTime12'];
		$dashETime1					=	$data['dashETime11'] . ':' . $data['dashETime12'];
		$timeMent1					=	$data['timeMent1'];
		$dashMovie1					=	$data['dashMovie1'];

		//	시간대2
		$dashSTime2					=	$data['dashSTime21'] . ':' . $data['dashSTime22'];
		$dashETime2					=	$data['dashETime21'] . ':' . $data['dashETime22'];
		$timeMent2					=	$data['timeMent2'];
		$dashMovie2					=	$data['dashMovie2'];

		//	시간대3
		$dashSTime3					=	$data['dashSTime31'] . ':' . $data['dashSTime32'];
		$dashETime3					=	$data['dashETime31'] . ':' . $data['dashETime32'];
		$timeMent3					=	$data['timeMent3'];
		$dashMovie3					=	$data['dashMovie3'];

		//	시간대4
		$dashSTime4					=	$data['dashSTime41'] . ':' . $data['dashSTime42'];
		$dashETime4					=	$data['dashETime41'] . ':' . $data['dashETime42'];
		$timeMent4					=	$data['timeMent4'];
		$dashMovie4					=	$data['dashMovie4'];

		$strSQL[]					=	"
										INSERT INTO tbl_dashBoardSetting
											(brandCode, dashSTime1, dashETime1, dashSTime2, dashETime2, dashSTime3, dashETime3, dashSTime4, dashETime4, timeMent1, timeMent2, timeMent3, timeMent4, dashMovie1, dashMovie2, dashMovie3, dashMovie4) VALUES
											('$brandCode', '$dashSTime1', '$dashETime1', '$dashSTime2', '$dashETime2', '$dashSTime3', '$dashETime3', '$dashSTime4', '$dashETime4', '$timeMent1', '$timeMent2', '$timeMent3', '$timeMent4', '$dashMovie1', '$dashMovie2', '$dashMovie3', '$dashMovie4')
										ON DUPLICATE KEY UPDATE
											dashSTime1					=	'$dashSTime1',
											dashETime1					=	'$dashETime1',
											dashSTime2					=	'$dashSTime2',
											dashETime2					=	'$dashETime2',
											dashSTime3					=	'$dashSTime3',
											dashETime3					=	'$dashETime3',
											dashSTime4					=	'$dashSTime4',
											dashETime4					=	'$dashETime4',

											timeMent1					=	'$timeMent1',
											timeMent2					=	'$timeMent2',
											timeMent3					=	'$timeMent3',
											timeMent4					=	'$timeMent4',

											dashMovie1					=	'$dashMovie1',
											dashMovie2					=	'$dashMovie2',
											dashMovie3					=	'$dashMovie3',
											dashMovie4					=	'$dashMovie4'
										";
		//echo $strSQL;
		$msg					=	$this->dbm->transaction($strSQL, '1');
		return $msg;
	}
	//	대쉬보드 등록/수정/삭제
	//	대쉬보드 환경설정	=============================================================================================
}
?>