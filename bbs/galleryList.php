<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';

$bID							=	allTags($_REQUEST['bID']);

if ( $bID == '46' ) {
	$bbsListURL					=	'/commu/gallery.php';
	$bbsViewURL					=	'/commu/galleryView.php';
} else if ( $bID == '47' ) {
	$bbsListURL					=	'/commu/studentWork.php';
	$bbsViewURL					=	'/commu/studentWorkView.php';
}

//	게시판 환경정보	=======================================================================================
include $_SERVER['DOCUMENT_ROOT'] . '/common/inc/bbsConfig.php';
//	게시판 환경정보	=======================================================================================

ini_set('max_execution_time', 0);												//	최대 스크립트 실행시간 늘려주기

//	게시판 리스트
$page							=	array();
$page['recordPerPage']			=	6;																					//	한 페이지당 최대 게시글 개수.
$page['pnoPerPage']				=	10;																					//	한 페이지당 최대 페이지번호 개수.
$page['pno']					=	allTags($_REQUEST['pno']) == '' ? 1 : (int)allTags($_REQUEST['pno']);						//	페이지번호.
$temp							=	($page['pno'] * $page['recordPerPage']) - $page['recordPerPage'];
$msg							=	$common['BoardManager']->getImgBBSList($temp, $page['recordPerPage'], $bID, $orderBy);
$bbsList						=	$msg->getData();
$page['totalCount']				=	$msg->getMessage();																	//	해당 게시판 총 게시글 개수.
$page['pnoCount']				=	ceil($page['totalCount'] / $page['recordPerPage']);									//	페이지넘버의 총 개수.
$temp							=	0;
$page['ppno']					=	1;
while(1)
{
	$temp						+=	$page['pnoPerPage'];
	if ( $temp >= $page['pno'] ) break;
	$page['ppno']++;
}
$page['maxPpno']				=	ceil($page['pnoCount'] / $page['pnoPerPage']);
$page['spno']					=	($page['ppno'] - 1) * $page['pnoPerPage'] + 1;
$page['epno']					=	$page['ppno'] * $page['pnoPerPage'];
$page['sno']					=	$page['totalCount'] - (($page['pno'] - 1) * $page['recordPerPage']);

if ( $page['epno'] > $page['pnoCount'] ) $page['epno'] = $page['pnoCount'];
?>

					<?php
					if ( $bbsList ) {
						foreach ($bbsList as $key => $val)
						{
							$idx					=	$val['idx'];
							$subject				=	stripslashes($val['subject']);
							$regDate				=	$val['regDate'];
							$regDate				=	date('Y.m.d', strtotime($regDate));

							$iCorpCode				=	$val['fCorpCode'];
							$iFile					=	$val['fileName'];

							$fullUpImg				=	$common['intranetURL'] . '/uploadFiles/' . $iCorpCode . '/boardFile/' . $bID . '/' . $iFile;
					?>
					<li class="col-4">
						<div class="event-item">
							<a href="<?=$bbsViewURL?>?idx=<?=$idx?>&pno=<?=$page['pno']?>#VP" class="img-box">
								<img src="<?=$fullUpImg?>" alt="">
							</a>
							<p class="tit">
								<a href="<?=$bbsViewURL?>?idx=<?=$idx?>&pno=<?=$page['pno']?>#VP" class="ellip1"><?=$subject?></a>
							</p>
							<!-- <span class="date"><?=$regDate?></span> -->
						</div>
					</li>
					<?
						}
					}
					?>