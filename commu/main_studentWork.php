<?php
$bID							=	'47';
$order							=	allTags($_REQUEST['order']); if ( $order == '' ) $order = '1';

$bbsListURL						=	'/commu/studentWork.php';
$bbsViewURL						=	'/commu/studentWorkView.php';

//	게시판 리스트
$msg							=	$common['BoardManager']->getImgBBSList(0, 5, $bID, $orderBy);
$bbsList						=	$msg->getData();
?>

<div class="cont_wrap">
	<?php
	if ( $bbsList ) {
		for ( $i = 0; $i < count($bbsList); $i++ ) {
			$idx					=	$bbsList[$i]['idx'];
			$subject				=	stripslashes($bbsList[$i]['subject']);
			$regDate				=	$bbsList[$i]['regDate'];
			$regDate				=	date('Y.m.d', strtotime($regDate));

			$iCorpCode				=	$bbsList[$i]['fCorpCode'];
			$iFile					=	$bbsList[$i]['fileName'];

			$fullUpImg				=	$common['intranetURL'] . '/uploadFiles/' . $iCorpCode . '/boardFile/' . $bID . '/' . $iFile;

			if ( $i == 0 ) {
	?>
	<div class="cont __left">
		<figure class="img-wrap">
			<img src="<?=$fullUpImg?>" alt="수강생 포트폴리오">
		</figure>	
	</div>
	<?php
			} else if ( $i == 1 ) {
	?>
	<div class="cont __right">
		<div class="item">
			<figure class="img-wrap">
				<img src="<?=$fullUpImg?>" alt="수강생 포트폴리오">
			</figure>
		</div>
	<?php
			} else if ( $i == ( count($bbsList) - 1 ) ) {
	?>
		<div class="item">
			<figure class="img-wrap">
				<img src="<?=$fullUpImg?>" alt="수강생 포트폴리오">
			</figure>
		</div>
	</div>
	<?php
			} else {
	?>
		<div class="item">
			<figure class="img-wrap">
				<img src="<?=$fullUpImg?>" alt="수강생 포트폴리오">
			</figure>
		</div>
	<?php
			}
		}
	}
	?>
</div>