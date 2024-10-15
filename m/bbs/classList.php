<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';

$schCurriculum					=	allTags($_REQUEST['val']);

//	리스트	===================================================================================
$page							=	array();
$page['recordPerPage']			=	10;																					//	한 페이지당 최대 게시글 개수.
$page['pnoPerPage']				=	10;																					//	한 페이지당 최대 페이지번호 개수.
$page['pno']					=	allTags($_REQUEST['pno']) == '' ? 1 : (int)allTags($_REQUEST['pno']);				//	페이지번호.
$temp							=	($page['pno'] * $page['recordPerPage']) - $page['recordPerPage'];
$msg							=	$common['LectureManager']->getLectureList($temp, $page['recordPerPage'], $schSDate, $schEDate, $schWord, $schCurriculum);
$result							=	$msg->getData();
$page['totalCount']				=	$msg->getMessage();																	//	해당 게시판 총 게시글 개수.
$page['pnoCount']				=	ceil($page['totalCount'] / $page['recordPerPage']);									//	페이지넘버의 총 개수.
$temp							=	0;
$page['ppno']					=	1;
while(1){
	$temp						+=	$page['pnoPerPage'];
	if ( $temp >= $page['pno'] ) break;
	$page['ppno']++;
}
$page['maxPpno']				=	ceil($page['pnoCount'] / $page['pnoPerPage']);
$page['spno']					=	($page['ppno'] - 1) * $page['pnoPerPage'] + 1;
$page['epno']					=	$page['ppno'] * $page['pnoPerPage'];
$page['sno']					=	$page['totalCount'] - (($page['pno'] - 1) * $page['recordPerPage']);

if ( $page['epno'] > $page['pnoCount'] ) $page['epno'] = $page['pnoCount'];
//	리스트	===================================================================================
?>

					<?
					if ( $result ) {
						foreach ($result as $key => $val)
						{
							$idx					=	$val['idx'];
							$curriculum				=	stripslashes($val['curriculum']);
							$lecture				=	stripslashes($val['lecture']);
							$regDate				=	$val['regDate'];
							$regDate				=	date('Y.m.d', strtotime($regDate));
					?>
					<li>
						<a class="bl-item" href="./classView.php?idx=<?=$idx?>&pno=<?=$page['pno']?>&c=<?=$curriculum?>#VP">
							<span class="t-tit">
								<span class="txt"><?=$lecture?></span>
							</span>
							<span class="date"><?=$regDate?></span>
						</a>
					</li>
					<?
						}
					}
					?>