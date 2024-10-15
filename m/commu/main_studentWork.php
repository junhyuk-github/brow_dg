<?php
$bID							=	'47';
$order							=	allTags($_REQUEST['order']); if ( $order == '' ) $order = '1';

$bbsListURL						=	'/commu/studentWork.php';
$bbsViewURL						=	'/commu/studentWorkView.php';

//	게시판 리스트
$msg							=	$common['BoardManager']->getImgBBSList(0, 5, $bID, $orderBy);
$bbsList						=	$msg->getData();
?>

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
?>
<div class="img_box">
	<figure>
		<img src="<?=$fullUpImg?>" alt=""/>
	</figure>
</div>
<?php
	}
}
?>