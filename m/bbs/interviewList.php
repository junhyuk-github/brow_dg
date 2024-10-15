<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';

$bID							=	allTags($_REQUEST['bID']);

//	게시판 환경정보	=======================================================================================
include $_SERVER['DOCUMENT_ROOT'] . '/common/inc/bbsConfig.php';
//	게시판 환경정보	=======================================================================================

//	게시판 글 리스트	===================================================================================
//	게시글 리스트
$page							=	array();
$page['recordPerPage']			=	10;																					//	한 페이지당 최대 게시글 개수.
$page['pnoPerPage']				=	10;																					//	한 페이지당 최대 페이지번호 개수.
$page['pno']					=	allTags($_REQUEST['pno']) == '' ? 1 : (int)allTags($_REQUEST['pno']);				//	페이지번호.
$temp							=	($page['pno'] * $page['recordPerPage']) - $page['recordPerPage'];
$msg							=	$common['BoardManager']->getBBSListNew($temp, $page['recordPerPage'], $bID, $orderBy);
$result							=	$msg->getData();
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
//	게시판 글 리스트	===================================================================================
?>

					<?php
					if ( $result ) {
						$i							=	0;
						foreach ($result as $key => $val)
						{
							$idx					=	$val['idx'];
							$writerName				=	preg_replace('/(?<=.{2})./u','*',trim($val['userName']));
							$subject				=	stripslashes($val['subject']);
							$regDate				=	$val['regDate'];
							$regDate				=	date('Y.m.d', strtotime($regDate));

							$fileCnt				=	$val['fileCnt'];
							$imgCnt					=	$val['imgCnt'];
					?>
					<li>
						<a class="bl-item" href="./interviewView.php?idx=<?=$idx?>&pno=<?=$page['pno']?>#VP">
							<span class="t-tit">
								<span class="txt"><?=$subject?></span>
							</span>
							<span class="date"><?=$regDate?></span>
						</a>
					</li>
					<?
							$i++;
						}

						if ( $i == 10 ) {
					?>
					<div class="more-btn-wrap" id="paging2_<?=$_REQUEST['pno']?>">
						<button type="button" class="btn-more" onClick="getContentList('/m/bbs/interviewList.php', 'contentDiv');">MORE</button>
					</div>
					<?
						}
					}
					?>