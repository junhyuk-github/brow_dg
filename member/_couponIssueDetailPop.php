<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';

	$couponNoticeList				=	$common['CouponManager']->getCouponNoticeList($_POST['tctIdx']);
	$couponNoticeList				=	$couponNoticeList->getData();
?>
<div class="pop-detail-wrap">
	<div class="pop-inner">
		<figure class="img-wrap text-center">
			<img src="<?=$common['intranetURL2'].$_POST['imgPath'].$_POST['imgName']?>" alt="쿠폰">
		</figure>
		<div class="info-inner">
			<ul>
				<li class="title">쿠폰명</li>
				<li class="info-txt"><?=$_POST['couponName']?></li>
			</ul>
			<ul>
				<li class="title">상태</li>
				<li class="info-txt"><?=$_POST['couponStateName']?></li>
			</ul>
			<ul>
				<li class="title">사용기간</li>
				<li class="info-txt"><?=$_POST['useStartDate']?> ~ <?=$_POST['useEndDate']?></li>
			</ul>
		</div>
		<ul class="info-tail">
			<?
			if ( $couponNoticeList ) {
				foreach ( $couponNoticeList as $key => $val ) {
					$notice				=	$val['notice'];
			?>
			<li>※ <?=$notice?></li>
			<?
				}
			}
			?>
			<!-- <li>※ 발급된 쿠폰은 오프라인에서 수강 결제 시 사용 가능합니다. <br>(결제 시 현장에서 해당 쿠폰을 제시해 주세요.)</li>
			<li>※ 사용 처리된 쿠폰은 중복 지급되지 않습니다.</li> -->
		</ul>
		<div class="text-center">
			<? if ( $_POST['couponState'] == 810 ) { ?>
			<button class="btn-use able-c" onclick="couponUsed('<?=$_POST['idx']?>', '<?=$common['userIdx']?>', '<?=$_POST['couponName']?>');">쿠폰 사용 처리 (직원 확인용)</button>
			<? } else { ?>
			<button class="btn-use unable-c" disabled><?=$_POST['couponStateName']?></button>
			<? } ?>
			<!-- 1. 사용 전일 경우 -->
			
			<!-- 2. 사용완료일 경우
			<button class="btn-use unable-c">사용 완료</button>
			-->
		</div>
		<div class="btn-close"></div>
	</div>
</div>