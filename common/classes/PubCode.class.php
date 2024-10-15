<?php
#------------------------------------------------------------------------------
# 작업내용	:	공통코드
# 인    수	:
# 작성일자	:	2023-08-22
# 작 성 자	:	lyhti@triupcorp.com
# 변경이력	:
#------------------------------------------------------------------------------

class PubCode
{
	private $dbm;

	public function __construct() {
		$this->dbm				=	new DBManager();
		$this->fm				=	new FileManager();
	}

	// 공통코드 이름 가져오기
	public function getPubCodeName($pubCode)
	{
		global $common;
        $msg					=	new Message();

        $strSQL					=	"SELECT corpCode, pubCode, codeName, pPubCode, codeLevel, codeSort, isUse, codeDesc
									FROM tbl_pubCode
									WHERE pPubCode = '$pubCode'";

        $msg					=	$this->dbm->execute($strSQL, '2');
        return $msg;
	}
}
?>