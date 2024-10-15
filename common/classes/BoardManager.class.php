<?php
#------------------------------------------------------------------------------
# 작업내용	:	게시판 관리
# 인    수	:
# 작성일자	:	2018-11-30
# 작 성 자	:	webticktock@gmail.com
# 변경이력	:
#------------------------------------------------------------------------------

class BoardManager
{
	private $dbm;

	public function __construct()
	{
		$this->dbm				=	new DBManager();
		$this->fm				=	new FileManager();
		$this->cm				=	new CommonManager();
	}

	//	게시판 관리	=======================================================================================================
	//	게시판 정보 가져오기
	public function getBoardInfo($boardID)
	{
		$strSQL					=	"
									SELECT	boardName, isSecret, isMember, uploadgubun, uploadFileCnt, uploadImgCnt, isReply, isComment, isDate, isSpam, orderBy, isUse, menuCode, regDate
									FROM tbl_bbsmaster
									WHERE boardID = $boardID
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	게시판 정보 가져오기
	//	게시판 관리	=======================================================================================================

	//	게시물 관리	=======================================================================================================
	//	게시판 최상위 글 리스트
	public function getHighBBSList($pageNo, $recordPerPage, $boardID, $sort = '')
	{
		global $common;

		$msg					=	new Message();

		if ( $sort ) {
			$orderBy			=	' ORDER BY bbs.' . $sort . ' DESC';
		} else {
			$orderBy			=	' ORDER BY bbs.boardRef DESC, bbs.boardStep ASC';
		}

		$strSQL					=	"
									SELECT	bbs.idx, bbs.subject, bbs.contents, bbs.writerName AS userName, am.userGroup, bbs.gubun, bbs.regDate,
											bf.corpCode AS fCorpCode, bf.boardID AS fBID, bf.upFileName, bf.fileName, bf.filePath, bf.fileGubun
									FROM tbl_bbs AS bbs
									LEFT OUTER JOIN tbl_academyMember AS am ON
									am.userIdx = bbs.writerIdx
									LEFT OUTER JOIN tbl_bbsFile AS bf ON
									bbs.boardID = bf.boardID AND bbs.idx = bf.bIdx AND bf.fileGubun = '2' AND bf.fileSort = '1'
									WHERE bbs.boardID = '$boardID' AND bbs.isDisplay = 'Y' AND bbs.highYN = 'Y'
									"
									. $orderBy .
									"
									LIMIT $pageNo, $recordPerPage
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');

		$strSQL					=	"
									SELECT IFNULL(count(bbs.idx), 0) AS count
									FROM tbl_bbs AS bbs
									LEFT OUTER JOIN tbl_bbsFile AS bf ON
									bbs.boardID = bf.boardID AND bbs.idx = bf.bIdx AND bf.fileGubun = '2' AND bf.fileSort = '1'
									WHERE bbs.boardID = '$boardID' AND bbs.isDisplay = 'Y' AND bbs.highYN = 'Y'
									";
		$msg2					=	$this->dbm->execute($strSQL, '2');
		$temp					=	$msg2->getData();
		$msg->setMessage($temp[0]['count']);

		return $msg;
	}
	//	게시판 최상위 글 리스트

	//	게시판 글 리스트 with paging
	public function getBBSListNew($pageNo, $recordPerPage, $boardID, $sort = '')
	{
		global $common;
		$msg					=	new Message();

		if ( $boardID == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		if ( $sort ) {
			$orderBy			=	' ORDER BY bbs.' . $sort . ' DESC';
		} else {
			$orderBy			=	' ORDER BY bbs.boardRef DESC, bbs.boardStep ASC';
		}

		$strSQL					=	"
									SELECT	bbs.idx, bbs.subject, bbs.contents, bbs.writerName AS userName, am.userGroup, bbs.gubun, bbs.regDate
									FROM tbl_bbs AS bbs
									LEFT OUTER JOIN tbl_academyMember AS am ON
									am.userIdx = bbs.writerIdx
									WHERE bbs.boardID = '$boardID' AND bbs.isDisplay = 'Y' AND bbs.highYN != 'Y'
									"
									. $orderBy .
									"
									LIMIT $pageNo, $recordPerPage
									";
		//echo $strSQL;
		$msg					=	$this->dbm->execute($strSQL, '2');

		$strSQL					=	"
									SELECT IFNULL(count(bbs.idx), 0) AS count
									FROM tbl_bbs AS bbs
									LEFT OUTER  JOIN tbl_academyMember AS am ON
									am.userIdx = bbs.writerIdx
									WHERE bbs.boardID = '$boardID' AND bbs.isDisplay = 'Y' AND bbs.highYN != 'Y'
									";
		$msg2					=	$this->dbm->execute($strSQL, '2');
		$temp					=	$msg2->getData();
		$msg->setMessage($temp[0]['count']);

		return $msg;
	}
	//	게시판 글 리스트 with paging

	//	게시판 글 정보 가져오기
	public function getBBSInfoNew($bID, $idx, $isHit = '')
	{
		global $common;
		$msg					=	new Message();

		if ( $idx == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$strSQL1				=	"UPDATE tbl_bbs SET hitCount = hitCount + 1 WHERE idx = $idx";
		//echo($strSQL1);
		$r1						=	$this->dbm->execute($strSQL1, '1');

		//	이전 글번호
		$strSQL					=	"
									SELECT IFNULL(bbs.idx, 0) AS prevIdx, bbs.subject AS prevSub
									FROM tbl_bbs AS bbs
									WHERE bbs.boardID = '$bID' AND bbs.idx < $idx
									ORDER BY bbs.boardRef DESC, bbs.boardStep ASC
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
									SELECT IFNULL(bbs.idx, 0) AS nextIdx, bbs.subject AS nextSub
									FROM tbl_bbs AS bbs
									WHERE bbs.boardID = '$bID' AND bbs.idx > $idx
									ORDER BY bbs.boardRef DESC, bbs.boardStep ASC
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
									SELECT	bbs.subject, bbs.contents, bbs.writerIdx, bbs.writerName, am.userGroup, bbs.gubun, bbs.regDate,
											$prevIdx AS prevIdx, '$prevSub' AS prevSub, $nextIdx AS nextIdx, '$nextSub' AS nextSub
									FROM tbl_bbs AS bbs
									LEFT OUTER JOIN tbl_academyMember AS am ON
									am.userIdx = bbs.writerIdx
									WHERE bbs.idx = $idx
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	게시판 글 정보 가져오기

	//	게시판 글 리스트 with paging
	public function getBBSList($pageNo, $recordPerPage, $boardID, $sort = '')
	{
		global $common;
		$msg					=	new Message();

		if ( $boardID == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		if ( $sort ) {
			$orderBy			=	' ORDER BY bbs.' . $sort . ' DESC';
		} else {
			$orderBy			=	' ORDER BY bbs.boardRef DESC, bbs.boardStep ASC';
		}

		$strSQL					=	"
									SELECT	bbs.idx, bbs.boardRef, bbs.boardStep, bbs.boardLevel, bbs.subject, bbs.contents,
											bbs.startDate, bbs.endDate, bbs.hitCount, bbs.writerName, bbs.writerIdx, bbs.isDisplay,
											bbs.gubun, bbs.regDate, bbs.modifyDate,
											bf.corpCode AS fCorpCode, bf.boardID AS fBID, bf.upFileName, bf.fileName, bf.filePath, bf.fileGubun, bf.isOld,
											(
												SELECT COUNT(idx) 
												FROM tbl_bbsFile
												WHERE boardID = bbs.boardID AND bIdx = bbs.idx AND fileGubun = '1'
											) AS fileCnt,
											(
												SELECT COUNT(idx) 
												FROM tbl_bbsFile
												WHERE boardID = bbs.boardID AND bIdx = bbs.idx AND fileGubun = '2'
											) AS imgCnt
									FROM tbl_bbs AS bbs
									LEFT OUTER JOIN tbl_bbsFile AS bf ON
									bbs.boardID = bf.boardID AND bbs.idx = bf.bIdx AND bf.fileGubun = '1' AND bf.fileSort = '1'
									WHERE bbs.boardID = '$boardID' AND bbs.isDisplay = 'Y'
									"
									. $orderBy .
									"
									LIMIT $pageNo, $recordPerPage
									";
		//echo $strSQL;
		$msg					=	$this->dbm->execute($strSQL, '2');

		$strSQL					=	"
									SELECT IFNULL(count(bbs.idx), 0) AS count
									FROM tbl_bbs AS bbs
									LEFT OUTER JOIN tbl_bbsFile AS bf ON
									bbs.boardID = bf.boardID AND bbs.idx = bf.bIdx AND bf.fileGubun = '1' AND bf.fileSort = '1'
									WHERE bbs.boardID = '$boardID' AND bbs.isDisplay = 'Y'
									";
		$msg2					=	$this->dbm->execute($strSQL, '2');
		$temp					=	$msg2->getData();
		$msg->setMessage($temp[0]['count']);

		return $msg;
	}
	//	게시판 글 리스트 with paging

	//	게시판 글 리스트 with paging
	public function getImgBBSList($pageNo, $recordPerPage, $boardID, $sort = '')
	{
		global $common;
		$msg					=	new Message();

		if ( $boardID == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		if ( $sort ) {
			$orderBy			=	' ORDER BY bbs.' . $sort . ' DESC';
		} else {
			$orderBy			=	' ORDER BY bbs.boardRef DESC, bbs.boardStep ASC';
		}

		$strSQL					=	"
									SELECT	bbs.idx, bbs.boardRef, bbs.boardStep, bbs.boardLevel, bbs.subject, bbs.contents,
											bbs.startDate, bbs.endDate, bbs.hitCount, bbs.writerName, bbs.writerIdx, bbs.isDisplay, bbs.regDate, bbs.modifyDate,
											bf.corpCode AS fCorpCode, bf.boardID AS fBID, bf.upFileName, bf.fileName, bf.filePath, bf.fileGubun, bf.isOld,
											(
												SELECT COUNT(idx) 
												FROM tbl_bbsFile
												WHERE boardID = bbs.boardID AND bIdx = bbs.idx AND fileGubun = '1'
											) AS fileCnt,
											(
												SELECT COUNT(idx) 
												FROM tbl_bbsFile
												WHERE boardID = bbs.boardID AND bIdx = bbs.idx AND fileGubun = '2'
											) AS imgCnt
									FROM tbl_bbs AS bbs
									LEFT OUTER JOIN tbl_bbsFile AS bf ON
									bbs.boardID = bf.boardID AND bbs.idx = bf.bIdx AND bf.fileGubun = '2' AND bf.fileSort = '1'
									WHERE bbs.boardID = '$boardID' AND bbs.isDisplay = 'Y'
									"
									. $where . $orderBy .
									"
									LIMIT $pageNo, $recordPerPage
									";
		//echo $strSQL;
		$msg					=	$this->dbm->execute($strSQL, '2');

		$strSQL					=	"
									SELECT IFNULL(count(bbs.idx), 0) AS count
									FROM tbl_bbs AS bbs
									LEFT OUTER JOIN tbl_bbsFile AS bf ON
									bbs.boardID = bf.boardID AND bbs.idx = bf.bIdx AND bf.fileGubun = '2' AND bf.fileSort = '1'
									WHERE bbs.boardID = '$boardID' AND bbs.isDisplay = 'Y'
									" . $where;
		$msg2					=	$this->dbm->execute($strSQL, '2');
		$temp					=	$msg2->getData();
		$msg->setMessage($temp[0]['count']);

		return $msg;
	}
	//	게시판 글 리스트 with paging

	//	게시판 글 리스트 with paging
	public function getReviewList($pageNo, $recordPerPage, $boardID, $sort = '')
	{
		global $common;
		$msg					=	new Message();

		if ( $boardID == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		if ( $sort == '2' ) {
			$orderBy			=	' ORDER BY bbs.regDate ASC';
		} else {
			$orderBy			=	' ORDER BY bbs.regDate DESC';
		}

		$strSQL					=	"
									SELECT	bbs.idx, bbs.contents, bbs.writerIdx, bbs.writerName, am.userGroup, bbs.gubun, bbs.regDate,
											bf.corpCode AS iCorpCode, bf.fileName
									FROM tbl_bbs AS bbs
									LEFT OUTER JOIN tbl_bbsFile AS bf ON
									bbs.boardID = bf.boardID AND bbs.idx = bf.bIdx AND bf.fileGubun = '2'
									LEFT OUTER JOIN tbl_academyMember AS am ON
									am.userIdx = bbs.writerIdx
									WHERE bbs.boardID = '$boardID' AND bbs.isDisplay = 'Y'
									"
									. $orderBy .
									"
									LIMIT $pageNo, $recordPerPage
									";
//		echo $strSQL;
		$msg					=	$this->dbm->execute($strSQL, '2');

		$strSQL					=	"
									SELECT IFNULL(count(bbs.idx), 0) AS count
									FROM tbl_bbs AS bbs
									LEFT OUTER JOIN tbl_bbsFile AS bf ON
									bbs.boardID = bf.boardID AND bbs.idx = bf.bIdx AND bf.fileGubun = '2'
									LEFT OUTER JOIN tbl_academyMember AS am ON
									am.userIdx = bbs.writerIdx
									WHERE bbs.boardID = '$boardID' AND bbs.isDisplay = 'Y'
									";
		$msg2					=	$this->dbm->execute($strSQL, '2');
		$temp					=	$msg2->getData();
		$msg->setMessage($temp[0]['count']);

		return $msg;
	}
	//	게시판 글 리스트 with paging

	//	게시판 글 정보 가져오기
	public function getBBSInfo($bID, $idx, $isHit = '')
	{
		global $common;
		$msg					=	new Message();

		if ( $idx == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$strSQL1				=	"UPDATE tbl_bbs SET hitCount = hitCount + 1 WHERE idx = $idx";
		//echo($strSQL1);
		$r1						=	$this->dbm->execute($strSQL1, '1');

		//	이전 글번호
		$strSQL					=	"
									SELECT IFNULL(bbs.idx, 0) AS prevIdx, bbs.subject AS prevSub
									FROM tbl_bbs AS bbs
									WHERE bbs.boardID = '$bID' AND bbs.idx < $idx
									ORDER BY bbs.boardRef DESC, bbs.boardStep ASC
									LIMIT 1
									";
		//echo '<!--';
		//echo $strSQL;
		//echo '-->';
		$msg					=	$this->dbm->execute($strSQL);
		$temp					=	$msg->getData();
		if ( $temp ) {
			$prevIdx			=	$temp[0]['prevIdx'];
			$prevSub			=	addslashes($temp[0]['prevSub']);
		} else {
			$prevIdx			=	0;
			$prevSub			=	0;
		}

		//	다음 글번호
		$strSQL					=	"
									SELECT IFNULL(bbs.idx, 0) AS nextIdx, bbs.subject AS nextSub
									FROM tbl_bbs AS bbs
									WHERE bbs.boardID = '$bID' AND bbs.idx > $idx
									ORDER BY bbs.boardRef DESC, bbs.boardStep ASC
									LIMIT 1
									";
		//echo '<!--';
		//echo $strSQL;
		//echo '-->';
		$msg					=	$this->dbm->execute($strSQL);
		$temp					=	$msg->getData();
		if ( $temp ) {
			$nextIdx			=	$temp[0]['nextIdx'];
			$nextSub			=	addslashes($temp[0]['nextSub']);
		} else {
			$nextIdx			=	0;
			$nextSub			=	0;
		}

		$strSQL					=	"
									SELECT	bbs.corpCode, bbs.boardRef, bbs.boardStep, bbs.boardLevel, bbs.subject, bbs.writerName, bbs.writerIdx, bbs.writerPWD, bbs.writerPhone,
											bbs.writerIP, bbs.hitCount, bbs.contents, bbs.startDate, bbs.endDate, bbs.highYN, bbs.isDisplay, bbs.applyCorp, bbs.contentURL,
											bbs.eventURL, bbs.isOld, bbs.regDate,
											$prevIdx AS prevIdx, '$prevSub' AS prevSub, $nextIdx AS nextIdx, '$nextSub' AS nextSub
									FROM tbl_bbs AS bbs
									WHERE bbs.idx = $idx
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	게시판 글 정보 가져오기

	//	게시판 글 파일 리스트
	public function getBBSFileList($idx, $gubun)
	{
		$msg					=	new Message();

		if ( $idx == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		if ( $gubun ) {
			$where1				=	" AND fileGubun = '$gubun'";
		} else {
			$where1				=	'';
		}

		$strSQL					=	"
									SELECT	corpCode, boardID, idx, upFileName, fileName, filePath, isList, isOld
									FROM tbl_bbsFile
									WHERE bIdx = '$idx'
									"
									. $where1 .
									"
									ORDER BY fileSort
									";
		//echo $strSQL . '<br>';
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	게시판 글 파일 리스트

	//	게시판 글 파일 개별 리스트
	public function getBBSFile($idx, $gubun, $sort)
	{
		$msg					=	new Message();

		if ( $idx == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$strSQL					=	"
									SELECT	corpCode, boardID, idx, upFileName, fileName, filePath, isList, isOld
									FROM tbl_bbsFile
									WHERE bIdx = '$idx' AND fileGubun = '$gubun' AND fileSort = '$sort'
									ORDER BY fileSort
									";
		//echo $strSQL . '<br>';
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	게시판 글 파일 개별 리스트

	//	게시판 글 등록/수정/삭제
	public function setBBSProc($data, $file)
	{
		global $common;

		$msg					=	new Message();
		$strSQL					=	array();

		if ( !is_array($data) || !$data['isAction'] ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		if ( $data['corpCode'] ) {
			$corpCode			=	$data['corpCode'];
		} else {
			$corpCode			=	$common['corpCode'];
		}

		$newFileName			=	date('YmdHis');
		$basicUploadPath		=	$this->fm->setMakeDir($common['defaultPath'], $corpCode, 'boardFile', $data['bID'], '', $common['dirPermission']);

		if ( $data['isAction'] == 'D' ) {
			//	원본파일 삭제
			$rsSQL				=	"
									SELECT filePath, fileName
									FROM tbl_bbsFile
									WHERE bIdx = '$data[idx]'
									";
			//echo $rsSQL3;
			$rsData				=	$this->dbm->execute($rsSQL, '2');
			$rsData				=	$rsData->getData();

			if ( $rsData ) {
				foreach ( $rsData as $val )
				{
					$delFile	=	$common['wwwPath'] . $val['filePath'] . $val['fileName'];
					if ( file_exists($delFile) ) {
						@unlink($delFile);
					}
				}
			}

			$strSQL[]			=	"DELETE FROM tbl_bbsFile WHERE bIdx = '$data[idx]'";
			$strSQL[]			=	"DELETE FROM tbl_bbscomment WHERE bIdx = '$data[idx]'";
			$strSQL[]			=	"DELETE FROM tbl_bbs WHERE idx = '$data[idx]'";
		} else {
			if ( $data['isAction'] == 'U' ) {
				$idx						=	$data['idx'];
			} else {
				$rs							=	$this->dbm->execute("SELECT (IFNULL(MAX(idx), 0) + 1) AS cnt FROM tbl_bbs", '2');
				$rs							=	$rs->getData();
				$rs							=	$rs[0];
				if ( $rs['cnt'] > 0 ) {
					$idx					=	$rs['cnt'];
				}

				if ( $data['isAction'] == 'R' ) {
					$rsSQL					=	"UPDATE tbl_bbs SET boardStep = boardStep + 1 WHERE boardRef = $data[boardRef] AND boardStep > $data[boardStep]";
					$msg1					=	$this->dbm->execute($rsSQL, '1');

					$boardStep				=	$data['boardStep'] + 1;
					$boardLevel				=	$data['boardLevel'] + 1;

					$rs						=	$this->dbm->execute("SELECT idx, writerIdx FROM tbl_bbs WHERE idx = $data[boardRef] AND boardLevel = 0", '2');
					$rs						=	$rs->getData();
					$boardRef				=	$rs[0]['idx'];
				} else {
					$boardRef				=	$idx;
					$boardStep				=	0;
					$boardLevel				=	0;
				}
			}

			if ( $boardRef == '' ) $boardRef = 0;																				//	부모글번호
			if ( $boardStep == '' ) $boardStep = 0;																				//	답변글번호
			if ( $boardLevel == '' ) $boardLevel = 0;																			//	답변위치
			$writerIdx			=	$common['userIdx'];			if ( $writerIdx == '' ) $writerIdx = 'NULL';					//	작성자 일련번호
			$writerName			=	$data['writerName'];
			$highYN				=	$data['highYN'];			if ( $highYN == '' ) $highYN = 'N';								//	최상위(공지) 여부(Y/N)
			$isDisplay			=	$data['isDisplay'];			if ( $isDisplay == '' ) $isDisplay = 'N';						//	출력여부(Y/N)
			$writerIP			=	$common['connIP'];																			//	작성자 IP
			$writerPhone		=	$data['writerPhone'];
			$writerMail			=	$data['writerMail'];
			$gubun				=	$data['gubun'];
            $hopeRegion         =   $data['hopeRegion'];
            $hopeDate           =   $data['hopeDate'];
            $hopeTreat          =   $data['hopeTreat'];
			$bbsState			=	$data['bbsState'];
			$applyBrand			=	$data['brandCode'];
			$applyCorp			=	$data['corpCode'];

			$strSQL[]			=	"
									INSERT INTO tbl_bbs
										(corpCode, boardID, idx, boardRef, boardStep, boardLevel, subject, writerIdx, writerName, writerPWD, writerPhone, writerMail, writerIP, contents, startDate, endDate, highYN, isDisplay, applyBrand, applyCorp, gubun, hopeRegion, hopeDate, hopeTreat, bbsState) VALUES
										('$corpCode', '$data[bID]', $idx, $boardRef, $boardStep, $boardLevel, '$data[subject]', '$writerIdx', '$writerName', PASSWORD('$data[writerPWD]'), '$writerPhone', '$writerMail', '$writerIP', '$data[contents]', '$data[startDate]', '$data[endDate]', '$highYN', '$isDisplay', '$applyBrand', '$applyCorp', '$gubun', '$hopeRegion', '$hopeDate', '$hopeTreat', '$bbsState')
									ON DUPLICATE KEY UPDATE
										subject					=	'$data[subject]',
										writerName				=	'$data[writerName]',
										writerIP				=	'$data[writerIP]',
										writerPhone				=	'$data[writerPhone]',
										writerMail				=	'$data[writerMail]',
										contents				=	'$data[contents]',
										startDate				=	'$data[startDate]',
										endDate					=	'$data[endDate]',
										hitCount				=	'$data[hitCount]',
										highYN					=	'$highYN',
										isDisplay				=	'$isDisplay',
										applyBrand				=	'$applyBrand',
										applyCorp				=	'$applyCorp',
										gubun					=	'$gubun',
										hopeRegion				=	'$hopeRegion',
										hopeDate				=	'$hopeDate',
										hopeTreat				=	'$hopeTreat',
										bbsState				=	'$bbsState'
									";

			//	첨부 파일
			for ( $i = 1; $i <= $data['fCnt']; $i++ )
			{
				$fileIdx					=	'oldFileIdx' . $i;
				$oldIdx						=	'oldFileOldIdx' . $i;
				$upFileName					=	'upFile' . $i;
				$oldFile					=	'oldFile' . $i;
				$oldFileName				=	'oldFileName' . $i;
				$oldFilePath				=	'oldFilePath' . $i;
				$isFileDel					=	'isFileDel' . $i;
				$isFileList					=	'isFileList' . $i;

				$fileIdx					=	$data[$fileIdx]; if ( $fileIdx == '' ) $fileIdx = 'NULL';
				$oldIdx						=	$data[$oldIdx];
				$upload						=	$file[$upFileName];
				$oldFile					=	$data[$oldFile];
				$oldFileName				=	$data[$oldFileName];
				$oldFilePath				=	$data[$oldFilePath];
				$isFileDel					=	$data[$isFileDel];
				$isFileList					=	$data[$isFileList]; if ( $isFileList == '' ) $isFileList = 'N';

				if ( is_uploaded_file($upload['tmp_name']) == '' ) {
					$upFile					=	$oldFile;
					$upFileName				=	$oldFileName;
					$uploadPath				=	$common['wwwPath'] . $oldFilePath;

					if ( $isFileDel == 'Y' ) {
						if ( file_exists($oldFilePath . $oldFile) ) {
							@unlink($oldFilePath . $oldFile);
						}

						$upFile				=	'';
						$oldIdx				=	'';
						$strSQL[]			=	"DELETE FROM tbl_bbsFile WHERE idx = '$fileIdx'";
					}
				} else {
					$uploadPath				=	$basicUploadPath;
					$ext					=	substr(strrchr($upload['name'], '.'), 1);
					$upFile					=	$newFileName . '_file_' . $i .  '.' . $ext;
					$upFileName				=	$upload['name'];
					$oldIdx					=	'';

					$msg2					=	$this->fm->uploadFile($upload['tmp_name'], $uploadPath . $upFile);
					if ( $msg2->isResult() ) {
						//	원본파일 삭제
						if ( file_exists($oldFilePath . $oldImg) ) {
							@unlink($oldFilePath . $oldImg);
						}
					}
				}

				$uploadPath					=	str_replace($common['wwwPath'], '', $uploadPath);

				if ( $upFile ) {
					$strSQL[]				=	"
												INSERT INTO tbl_bbsFile
													(corpCode, boardID, bIdx, idx, upFileName, fileName, filePath, fileGubun, fileSort, isList) VALUES
													('$corpCode', '$data[bID]', '$idx', '$fileIdx', '$upFileName', '$upFile', '$uploadPath', '$data[fileGubun]', $i, '$isFileList')
												ON DUPLICATE KEY UPDATE
													upFileName				=	'$upFileName',
													fileName				=	'$upFile',
													filePath				=	'$uploadPath',
													fileGubun				=	'$data[fileGubun]',
													fileSort				=	$i,
													isList					=	'$isFileList',
													oldIdx					=	'$oldIdx'
												";
				}
			}
			//	첨부 파일

			//	첨부 이미지
			for ( $i = 1; $i <= $data['iCnt']; $i++ )
			{
				$imgIdx						=	'oldImgIdx' . $i;
				$upImgName					=	'upImg' . $i;
				$oldImg						=	'oldImg' . $i;
				$oldImgName					=	'oldImgName' . $i;
				$oldImgPath					=	'oldImgPath' . $i;
				$isImgDel					=	'isImgDel' . $i;
				$isImgList					=	'isImgList' . $i;

				$imgIdx						=	$data[$imgIdx]; if ( $imgIdx == '' ) $imgIdx = 'NULL';
				$upload						=	$file[$upImgName];
				$oldImg						=	$data[$oldImg];
				$oldImgName					=	$data[$oldImgName];
				$oldImgPath					=	$data[$oldImgPath];
				$isImgDel					=	$data[$isImgDel];
				$isImgList					=	$data[$isImgList]; if ( $isImgList == '' ) $isImgList = 'N';

				if ( is_uploaded_file($upload['tmp_name']) == '' ) {
					$upImg					=	$oldImg;
					$upImgName				=	$oldImgName;
					$uploadPath				=	$common['wwwPath'] . $oldImgPath;

					if ( $isImgDel == 'Y' ) {
						if ( file_exists($oldImgPath . $oldImg) ) {
							@unlink($oldImgPath . $oldImg);
						}

						$upImg				=	'';
						$strSQL[]			=	"DELETE FROM tbl_bbsFile WHERE idx = '$imgIdx'";
					}
				} else {
					$uploadPath				=	$basicUploadPath;
					$ext					=	substr(strrchr($upload['name'], '.'), 1);
					$upImg					=	$newFileName . '_img_' . $i .  '.' . $ext;
					$upImgName				=	$upload['name'];

					$msg2					=	$this->fm->uploadImg($upload['tmp_name'], $uploadPath . $upImg, '', '', '');
					if ( $msg2->isResult() ) {
						//	원본파일 삭제
						if ( file_exists($oldImgPath . $oldImg) ) {
							@unlink($oldImgPath . $oldImg);
						}
					}
				}

				$uploadPath					=	str_replace($common['wwwPath'], '', $uploadPath);

				if ( $upImg ) {
					$strSQL[]				=	"
												INSERT INTO tbl_bbsFile
													(corpCode, boardID, bIdx, idx, upFileName, fileName, filePath, fileGubun, fileSort, isList) VALUES
													('$corpCode', '$data[bID]', '$idx', '$imgIdx', '$upImgName', '$upImg', '$uploadPath', '$data[imgGubun]', $i, '$isImgList')
												ON DUPLICATE KEY UPDATE
													upFileName				=	'$upImgName',
													fileName				=	'$upImg',
													filePath				=	'$uploadPath',
													fileGubun				=	'$data[imgGubun]',
													fileSort				=	$i,
													isList					=	'$isImgList'
												";
				}
			}
			//	첨부 이미지
		}

		//print_r($strSQL);
		$msg					=	$this->dbm->transaction($strSQL, '1', 'Y');
		return $msg;
	}
	//	게시판 글 등록/수정/삭제






	//	이벤트 게시판 글 리스트 with paging
	public function getEventBBSList($pageNo, $recordPerPage, $boardID, $gubun, $schBranch, $sort = '')
	{
		global $common;
		$msg					=	new Message();

		if ( $boardID == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$curDate				=	DATE('Y-m-d');

		//	진행중 이벤트 : 1, 완료된 이벤트 : 2
		if ( $gubun == '1' ) {
			$where1				=	" AND LEFT(bbs.endDate, 10) >= '$curDate'";
		} else if ( $gubun == '2' ) {
			$where1				=	" AND LEFT(bbs.endDate, 10) < '$curDate'";
		}

		//	2019-10-29
		if ( $schBranch ) {
			if ( $boardID == '9' ) {
				$where2			=	" AND (bbs.applyCorp = 'ALL' OR MATCH(bbs.applyCorp) AGAINST('$schBranch'))";
			} else {
				$where2			=	" AND MATCH(bbs.applyCorp) AGAINST('$schBranch')";
			}
		} else {
			$where2				=	'';
		}

		if ( $sort ) {
			$orderBy			=	' ORDER BY bbs.highYN DESC, bbs.' . $sort . ' DESC';
		} else {
			$orderBy			=	' ORDER BY bbs.boardRef DESC, bbs.boardStep ASC';
		}

		$strSQL					=	"
									SELECT	bbs.idx, bbs.boardRef, bbs.boardStep, bbs.boardLevel, bbs.subject, bbs.contents,
											bbs.startDate, bbs.endDate, bbs.hitCount, bbs.writerName, bbs.writerIdx, bbs.isDisplay,
											bbs.regDate, bbs.modifyDate,
											bf.corpCode AS fCorpCode, bf.boardID AS fBID, bf.upFileName, bf.fileName, bf.filePath, bf.fileGubun, bf.isOld,
											SUBSTRING_INDEX
											(
												(
													SELECT GROUP_CONCAT(corpName ORDER BY corpCode)
													FROM tbl_corp
													WHERE INSTR(CONCAT(bbs.applyCorp, ','), CONCAT(corpCode, ',')) > 0
												), ',', 1
											) AS branchCodeOne,
											(
												LENGTH(bbs.applyCorp) - LENGTH(REPLACE(bbs.applyCorp, ',', ''))
											) AS branchCnt
									FROM tbl_bbs AS bbs
									LEFT OUTER JOIN tbl_bbsFile AS bf ON
									bbs.boardID = bf.boardID AND bbs.idx = bf.bIdx
									WHERE bbs.boardID = '$boardID' AND bbs.isDisplay = 'Y' AND bbs.applyBrand = '$common[brandCode]'
									"
									. $where1 . $where2 . $orderBy .
									"
									LIMIT $pageNo, $recordPerPage
									";
		//echo '<!--';
		//echo $strSQL;
		//echo '-->';
		$msg					=	$this->dbm->execute($strSQL, '2');

		$strSQL					=	"
									SELECT IFNULL(count(bbs.idx), 0) AS count
									FROM tbl_bbs AS bbs
									LEFT OUTER JOIN tbl_bbsFile AS bf ON
									bbs.boardID = bf.boardID AND bbs.idx = bf.bIdx
									WHERE bbs.boardID = '$boardID' AND bbs.isDisplay = 'Y' AND bbs.applyBrand = '$common[brandCode]'
									" . $where1 . $where2;
		$msg2					=	$this->dbm->execute($strSQL, '2');
		$temp					=	$msg2->getData();
		$msg->setMessage($temp[0]['count']);

		return $msg;
	}
	//	이벤트 게시판 글 리스트 with paging

	//	게시글 comment 리스트 가져오기
	public function getCommentList($bIdx)
	{
		global $common;

		if ( $bIdx == '' ) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$strSQL					=	"
									SELECT	bc.idx, bc.pIdx, bc.writerIdx, am.userID, am.userName, am.userGroup, bc.comment, bc.regDate,
											(
												SELECT am1.userName
												FROM tbl_bbscomment AS bc1
												LEFT JOIN tbl_academyMember AS am1 ON
												bc1.writerIdx = am1.userIdx
												WHERE bc1.bIdx = '$bIdx' AND bc1.idx = bc.pIdx
											) AS pUserName
									FROM tbl_bbscomment AS bc
									LEFT JOIN tbl_academyMember AS am ON
									bc.writerIdx = am.userIdx
									WHERE bc.bIdx = '$bIdx'
									ORDER BY bc.regDate
									";
		//echo($strSQL);
		$msg					=	$this->dbm->execute($strSQL, '2');
		return $msg;
	}
	//	게시글 comment 리스트 가져오기

	//	게시글 comment 등록/수정/삭제
	public function setCommentProc($data)
	{
		global $common;
		$msg					=	new Message();

		if (
			!is_array($data) || !$data['isAction'] || !$data['bIdx']) {
			$msg->setMessage('잘못된 매개변수입니다. 관리자에게 문의하세요.');
			return $msg;
		}

		$corpCode				=	$common['corpCode'];
		if ( $data['isAction'] == 'D' ) {
			$strSQL				=	"DELETE FROM tbl_bbscomment WHERE idx = '$data[idx]'";
		} else {
			$strSQL				=	"
									INSERT INTO tbl_bbscomment
										(corpCode, boardID, bIdx, pIdx, writerIdx, comment, applyBrand, applyCorp) VALUES
										('$corpCode', '$data[bID]', '$data[bIdx]', '$data[pIdx]', '$common[userIdx]', '$data[comment]', '$data[brandCode]', '$corpCode')
									";
		}
		//echo($strSQL.'<br>');
		$msg					=	$this->dbm->execute($strSQL, '1');
		return $msg;
	}
	//	게시글 comment 등록/수정/삭제
	//	게시물 관리	=======================================================================================================
}
?>