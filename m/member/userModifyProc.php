<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';

foreach($_POST as $key=>$post) $_POST[$key] = allTags($post);

$success						=	$common['MemberManager']->setMemberProc($_POST);

$dateDiff						=	$_POST['dateDiff'];

if ( $dateDiff != '' ) {
	if ( $dateDiff < 3 ) {
		if ( $success[1] ) {
			$userName				=	$_POST['userName'];
			$userMobile				=	$_POST['userMobile'];
			$couponKakao			=	$common['SMSManager']->sendKakaoCoupon($success[1], $_POST);
	
			echo 'Y';
		} else {
			echo 'Y';
		}
	} else {
		if ($success->isResult()) {
			echo 'Y';
		} else {
			echo 'N';
		}
	}
} else {
	if ($success->isResult()) {
		echo 'Y';
	} else {
		echo 'N';
	}
}

?>