<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';

//	게시판 환경정보	=======================================================================================
include $_SERVER['DOCUMENT_ROOT'] . '/common/inc/bbsConfig.php';
//	게시판 환경정보	=======================================================================================

ini_set('max_execution_time', 0);												//	최대 스크립트 실행시간 늘려주기

//	게시판 리스트
$page							=	array();
$page['recordPerPage']			=	5;																					//	한 페이지당 최대 게시글 개수.
$page['pnoPerPage']				=	10;																					//	한 페이지당 최대 페이지번호 개수.
$page['pno']					=	allTags($_REQUEST['pno']) == '' ? 1 : (int)allTags($_REQUEST['pno']);						//	페이지번호.
$temp							=	($page['pno'] * $page['recordPerPage']) - $page['recordPerPage'];
$msg							=	$common['BoardManager']->getBBSList($temp, $page['recordPerPage'], $bID, $orderBy);
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

				<table class="table table-list">
					<caption>진학정보 게시물</caption>
					<colgroup>
						<col width="10%" />
						<col width="*" />
						<col width="20%" />
					</colgroup>
					<thead>
						<tr>
							<th scope="col">NO.</th>
							<th scope="col">제목</th>
							<th scope="col">작성일</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ( $bbsList ) {
							foreach ($bbsList as $key => $val)
							{
								$idx					=	$val['idx'];
								$subject				=	stripslashes($val['subject']);
								$regDate				=	$val['regDate'];
								$regDate				=	date('Y.m.d', strtotime($regDate));

								$fileCnt				=	$val['fileCnt'];
								$imgCnt					=	$val['imgCnt'];
						?>
						<tr>
							<td scope="row" class="text-center"><?=$page['sno']--?></td>
							<td class="t-tit">
								<a href="<?=$bbsViewURL?>?idx=<?=$idx?>&pno=<?=$page['pno']?>#VP">
									<span class="txt"><?=$subject?></span>
									<? if ( $imgCnt > 0 ) { ?>
									<img class="icon image" src="/common/img/icon/images.png" alt="이미지">
									<? } ?>
									<? if ( $fileCnt > 0 ) { ?>
									<img class="icon attach" src="/common/img/icon/paperclip.png" alt="첨부파일">
									<? } ?>
								</a>
							</td>
							<td class="text-center"><?=$regDate?></td>
						</tr>
						<?
							}
						}
						?>
					</tbody>
				</table>

				<div class="pagin-wrap">
					<ul class="pagination">
						<? if ( $page['ppno'] != 1 && $bbsList != '' ) { ?>
						<li><a href="<?=$selfPage?>?pno=1<?=$qry?>" class="icon first"></a></li>
						<li><a href="<?=$selfPage?>?pno=<?=$page['spno'] - 1?><?=$qry?>" class="icon prev"></a></li>
						<?
						}

						for ($i = $page['spno']; $i <= $page['epno']; $i++) {
						?>
							<? if ( $i == $page['pno'] ) { ?>
								<li class="active"><a class="pn-link" href="#"><?=$i?></a></li>
							<? } else { ?>
								<li><a class="pn-link" href="<?=$selfPage?>?pno=<?=$i?><?=$qry?>"><?=$i?></a></li>
							<? } ?>
						<?
						}

						if ( $page['ppno'] != $page['maxPpno'] && $bbsList != '' ) {
						?>
						<li><a href="<?=$selfPage?>?pno=<?=$page['epno'] + 1?><?=$qry?>" class="icon next"></a></li>
						<li><a href="<?=$selfPage?>?pno=<?=$page['pnoCount']?><?=$qry?>" class="icon last"></a></li>
						<? } ?>
					</ul>
				</div>