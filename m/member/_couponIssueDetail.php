<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';

	$page							=	array();
	$page['recordPerPage']			=	10;																					//	한 페이지당 최대 게시글 개수.
	$page['pnoPerPage']				=	10;																					//	한 페이지당 최대 페이지번호 개수.
	$page['pno']					=	allTags($_REQUEST['pno']) == '' ? 1 : (int)allTags($_REQUEST['pno']);				//	페이지번호.
	$temp							=	($page['pno'] * $page['recordPerPage']) - $page['recordPerPage'];
	$couponIssueDetail				=	$common['CouponManager']->couponIssueDetail($_POST['gubun'], $temp, $page['recordPerPage']);
	$couponList						=	$couponIssueDetail->getData();
	$page['totalCount']				=	$couponIssueDetail->getMessage();																//	해당 게시판 총 게시글 개수.
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
<div class="coupon-list-wrap">
	<?
	if ( $couponList ) {
		foreach ( $couponList as $key => $val ) {
			$idx					=	$val['idx'];
			$tctIdx					=	$val['tctIdx'];
			$imgPath				=	$val['imgPath'];
			$imgName				=	$val['imgName'];
			$couponName				=	$val['couponName'];
			$couponState			=	$val['couponState'];
			$couponStateName		=	$val['couponStateName'];
			$useStartDate			=	$val['useStartDate'];
			$useEndDate				=	$val['useEndDate'];

			$jsonData				=	json_encode($val);
	?>
	<div class="coupon-list">
		<span class="c-name"><?=$couponName?></span>
		<div class="usage-status<? if ( $couponState == 810 ) { echo ' able'; } else { echo ' unable'; } ?>">
			<span class="use"><?=$couponStateName?></span>
			<span class="expired"><?=$useStartDate?> ~ <?=$useEndDate?></span>
		</div>
		<p class="btn-detail" onclick='openDetail(<?=$jsonData?>)'><a>+</a></p>
	</div>
	<?
		}
	}
	?>
	<div id="couponPop"></div>
</div>
<ul class="pagi-wrap">
	<? if ( $page['ppno'] != 1 && $bbsList != '' ) { ?>
	<li><a href="<?=$selfPage?>?pno=1<?=$qry?>"><img src="/common/img/member/i-prev-first.png" alt=""></a></li>
	<li><a href="<?=$selfPage?>?pno=<?=$page['spno'] - 1?><?=$qry?>"><img src="/common/img/member/i-prev.png" alt=""></a></li>
	<?
	}

	for ( $i = $page['spno']; $i <= $page['epno']; $i++ ) {
	?>
		<? if ( $i == $page['pno'] ) { ?>
			<li class="pg-num active"><a href="#"><?=$i?></a></li>
		<? } else { ?>
			<li class="pg-num"><a href="<?=$selfPage?>?pno=<?=$i?><?=$qry?>"><?=$i?></a></li>
		<? } ?>
	<?
	}

	if ( $page['ppno'] != $page['maxPpno'] && $bbsList != '' ) {
	?>
	<li><a href="<?=$selfPage?>?pno=<?=$page['epno'] + 1?><?=$qry?>"><img src="/common/img/member/i-next.png" alt=""></a></li>
	<li><a href="<?=$selfPage?>?pno=<?=$page['pnoCount']?><?=$qry?>"><img src="/common/img/member/i-next-end.png" alt=""></a></li>
	<? } ?>
</ul>
<!-- <ul class="pagi-wrap">
	<li><a href="#none"><img src="/common/img/member/i-prev-first.png" alt=""></a></li>
	<li><a href="#none"><img src="/common/img/member/i-prev.png" alt=""></a></li>
	<li class="pg-num active"><a href="#none">1</a></li>
	<li class="pg-num"><a href="#none">2</a></li>
	<li class="pg-num"><a href="#none">3</a></li>
	<li class="pg-num"><a href="#none">4</a></li>
	<li class="pg-num"><a href="#none">5</a></li>
	<li><a href="#none"><img src="/common/img/member/i-next.png" alt=""></a></li>
	<li><a href="#none"><img src="/common/img/member/i-next-end.png" alt=""></a></li>
</ul> -->