<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';

foreach($_POST as $key=>$post) $_POST[$key] = allTags($post);

$success						=	$common['MemberManager']->setMemberOutProc($_POST);
//print_r($success);
//exit();

if ($success->isResult()) {
	session_unset();
	session_destroy();

	//	세션 굽기
	$_SESSION['userIdx']		= '';
	$_SESSION['userID']			= '';
	$_SESSION['userName']		= '';
	$_SESSION['userMobile']		= '';
	$_SESSION['userMail']		= '';

	echo 'Y';
} else {
	echo 'N';
}
?>