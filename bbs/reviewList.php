<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';

$bID							=	allTags($_REQUEST['bID']);

//	게시판 환경정보	=======================================================================================
include $_SERVER['DOCUMENT_ROOT'] . '/common/inc/bbsConfig.php';
//	게시판 환경정보	=======================================================================================

ini_set('max_execution_time', 0);												//	최대 스크립트 실행시간 늘려주기

//	게시판 리스트
$page							=	array();
$page['recordPerPage']			=	5;																					//	한 페이지당 최대 게시글 개수.
$page['pnoPerPage']				=	1;																					//	한 페이지당 최대 페이지번호 개수.
$page['pno']					=	allTags($_REQUEST['pno']) == '' ? 1 : (int)allTags($_REQUEST['pno']);						//	페이지번호.
$temp							=	($page['pno'] * $page['recordPerPage']) - $page['recordPerPage'];
$msg							=	$common['BoardManager']->getHighBBSList($temp, $page['recordPerPage'], $bID, $orderBy);
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
						$i							=	0;
						foreach ($bbsList as $key => $val)
						{
							$idx					=	$val['idx'];
							$subject				=	stripslashes($val['subject']);
							$writerName				=	preg_replace('/(?<=.{2})./u','*',trim($val['userName']));
							$userGroup				=	$val['userGroup'];
							$gubun					=	$val['gubun'];
							$regDate				=	$val['regDate'];
							$regDate				=	date('Y.m.d', strtotime($regDate));

							//	회원그룹(1 : 비회원, 2 : 일반회원, 3 : 정회원, 4 : 수강생)
							if ( $userGroup == '11' ) {
								$userGroupTxt		=	'비회원';
							} else if ( $userGroup == '12' ) {
								$userGroupTxt		=	'일반회원';
							} else if ( $userGroup == '11,12' ) {
								$userGroupTxt		=	'정회원';
							} else if ( $userGroup == '21' ) {
								$userGroupTxt		=	'수강생';
							}

							if ( $gubun == '11' ) {
								$gubunTxt1			=	'네일미용';
								$gubunTxt2			=	'국가자격증 과정';
							} else if ( $gubun == '12' ) {
								$gubunTxt1			=	'네일미용';
								$gubunTxt2			=	'네일살롱 실무과정';
							} else if ( $gubun == '11,12' ) {
								$gubunTxt1			=	'네일미용';
								$gubunTxt2			=	'국가자격증 과정/네일살롱 실무과정';
							} else if ( $gubun == '21' ) {
								$gubunTxt1			=	'피부미용';
								$gubunTxt2			=	'국가자격증 과정';
							}

							$iCorpCode				=	$val['fCorpCode'];
							$iFile					=	$val['fileName'];

							$fullUpImg				=	$common['intranetURL'] . '/uploadFiles/' . $iCorpCode . '/boardFile/' . $bID . '/' . $iFile;
					?>
					<li>
						<div class="itv-hd">
							<? if ( $iFile ) { ?>
							<div class="img-box"><img src="<?=$fullUpImg?>" alt=""></div>
							<? } ?>
							<div class="txt-box">
								<span class="cn">[<?=$gubunTxt1?> <?=$gubunTxt2?>]</span>
								<span class="sn"><strong><?=$writerName?></strong> <?=$userGroupTxt?></span>
								<p><?=$subject?></p>
								<a href="./reviewView.php?idx=<?=$idx?>" class="readmore-btn">자세히보기</a>
							</div>
						</div>
					</li>
					<?
							$i++;
						}

						if ( $i == 5 ) {
					?>
					<div class="more-btn-wrap" id="paging_<?=$_REQUEST['pno']?>">
						<br><button type="button" class="btn-more" onClick="getContentList();">수강생 인터뷰 더보기</button>
					</div>
					<?
						}
					}
					?>