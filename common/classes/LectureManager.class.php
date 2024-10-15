<?php
#------------------------------------------------------------------------------
# 작업내용	:	피부미용 국가자격증 실기강의 관리
# 인    수	:
# 작성일자	:	2020-01-08
# 작 성 자	:	webticktock@gmail.com
# 변경이력	:
#------------------------------------------------------------------------------

class LectureManager
{
	private $dbm;

	public function __construct()
	{
		$this->dbm				=	new DBManager();
		$this->fm				=	new FileManager();
		$this->cm				=	new CommonManager();
	}

	//	실기강의 리스트
	public function getLectureList($pageNo, $recordPerPage, $schSDate, $schEDate, $schWord, $schCurriculum)
	{
		global $common;
		$msg					=	new Message();
		$where1					=	'';
		$where2					=	'';
		$where3					=	'';

		if ( $schSDate && $schEDate ) {
			$where1				=	" AND LEFT(regDate, 10) >= '$schSDate' AND LEFT(regDate, 10) <= '$schEDate'";
		}

		if ( $schWord ) {
			$where2				=	" AND BINARY lecture LIKE '%$schWord%'";
		}

		if ( $schCurriculum ) {
			$where3				=	" AND curriculum = '$schCurriculum'";
		}

		$strSQL					=	"
									SELECT	idx, curriculum, lecture, regDate
									FROM tbl_lecture
									WHERE idx IS NOT NULL
									"
									. $where1 . $where2 . $where3 .
									"
									ORDER BY regDate DESC
									LIMIT $pageNo, $recordPerPage
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');

		$strSQL					=	"
									SELECT IFNULL(count(idx), 0) AS count
									FROM tbl_lecture
									WHERE idx IS NOT NULL
									" . $where1 . $where2 . $where3;
		//echo($strSQL);
		$msg2					=	$this->dbm->execute($strSQL, '2');
		$temp					=	$msg2->getData();
		$msg->setMessage($temp[0]['count']);

		return $msg;
	}
	//	실기강의 리스트

	//	실기강의 정보 가져오기
	public function getLectureInfo($idx)
	{
		if ( $idx == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		//	이전 글번호
		$strSQL					=	"
									SELECT IFNULL(idx, 0) AS prevIdx, lecture AS prevSub
									FROM tbl_lecture
									WHERE idx < $idx
									ORDER BY regDate DESC
									LIMIT 1
									";
		//echo '<!--';
		//echo $strSQL;
		//echo '-->';
		$msg					=	$this->dbm->execute($strSQL);
		$temp					=	$msg->getData();
		if ( $temp ) {
			$prevIdx			=	$temp[0]['prevIdx'];
			$prevSub			=	$temp[0]['prevSub'];
		} else {
			$prevIdx			=	0;
			$prevSub			=	0;
		}

		//	다음 글번호
		$strSQL					=	"
									SELECT IFNULL(idx, 0) AS nextIdx, lecture AS nextSub
									FROM tbl_lecture
									WHERE idx > $idx
									ORDER BY regDate DESC
									LIMIT 1
									";
		//echo '<!--';
		//echo $strSQL;
		//echo '-->';
		$msg					=	$this->dbm->execute($strSQL);
		$temp					=	$msg->getData();
		if ( $temp ) {
			$nextIdx			=	$temp[0]['nextIdx'];
			$nextSub			=	$temp[0]['nextSub'];
		} else {
			$nextIdx			=	0;
			$nextSub			=	0;
		}

		$strSQL					=	"
									SELECT	lecture, contents, memo, regDate,
											$prevIdx AS prevIdx, '$prevSub' AS prevSub, $nextIdx AS nextIdx, '$nextSub' AS nextSub
									FROM tbl_lecture
									WHERE idx = $idx
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}

	public function getLectureInfoNew($idx, $schCurriculum)
	{
		if ( $idx == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		//	이전 글번호
		$strSQL					=	"
									SELECT IFNULL(idx, 0) AS prevIdx, lecture AS prevSub
									FROM tbl_lecture
									WHERE idx < $idx AND curriculum = '$schCurriculum'
									ORDER BY regDate DESC
									LIMIT 1
									";
		//echo '<!--';
		//echo $strSQL;
		//echo '-->';
		$msg					=	$this->dbm->execute($strSQL);
		$temp					=	$msg->getData();
		if ( $temp ) {
			$prevIdx			=	$temp[0]['prevIdx'];
			$prevSub			=	$temp[0]['prevSub'];
		} else {
			$prevIdx			=	0;
			$prevSub			=	0;
		}

		//	다음 글번호
		$strSQL					=	"
									SELECT IFNULL(idx, 0) AS nextIdx, lecture AS nextSub
									FROM tbl_lecture
									WHERE idx > $idx AND curriculum = '$schCurriculum'
									ORDER BY regDate DESC
									LIMIT 1
									";
		//echo '<!--';
		//echo $strSQL;
		//echo '-->';
		$msg					=	$this->dbm->execute($strSQL);
		$temp					=	$msg->getData();
		if ( $temp ) {
			$nextIdx			=	$temp[0]['nextIdx'];
			$nextSub			=	$temp[0]['nextSub'];
		} else {
			$nextIdx			=	0;
			$nextSub			=	0;
		}

		$strSQL					=	"
									SELECT	lecture, contents, memo, regDate,
											$prevIdx AS prevIdx, '$prevSub' AS prevSub, $nextIdx AS nextIdx, '$nextSub' AS nextSub
									FROM tbl_lecture
									WHERE idx = $idx
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	실기강의 정보 가져오기

	//	실기강의 저장 / 수정
	public function setLectureProc($data)
	{
		global $common;
		$msg					=	new Message();

		if ( !is_array($data) ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$idx					=	$data['idx']; if ( $idx == '' ) $idx = 'NULL';
		$isAction				=	$data['isAction'];

		if ( $isAction == 'D' ) {
			$strSQL				=	"DELETE FROM tbl_lecture WHERE idx = '$idx'";
		} else {
			$lecture			=	$data['lecture'];
			$contents			=	$data['contents'];
			$memo				=	$data['memo'];
			$regDate			=	$data['regDate'] . ':00';

			$strSQL				=	"
									INSERT INTO tbl_lecture
										(idx, lecture, contents, memo, regDate) VALUES
										($idx, '$lecture', '$contents', '$memo', '$regDate')
									ON DUPLICATE KEY UPDATE
										lecture					=	'$lecture',
										contents				=	'$contents',
										memo					=	'$memo',
										regDate					=	'$regDate'
									";
		}
		//echo($strSQL.'<br>');
		$msg					=	$this->dbm->execute($strSQL, '1', 'N');
		return $msg;
	}
	//	실기강의 저장 / 수정
}
?>