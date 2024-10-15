<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';

foreach($_POST as $key=>$post) $_POST[$key] = allTags($post);

$mm_msg							=	$common['MemberManager']->snsLoginProc($_POST);
$mm_data						=	$mm_msg->getData();
$rs								=	$mm_data[0];

//print_r($mm_msg);
//exit();

if ( $mm_data == '' ) {																				//	해당 ID, PWD가 일치하지 않으면,
	echo 'N';
} else {
	//	세션 굽기
	$userIdx					=	$rs['userIdx'];
	$_SESSION['userIdx']		=	encrypt($rs['userIdx']);
	$_SESSION['userID']			=	encrypt($rs['userID']);
	$_SESSION['userName']		=	encrypt($rs['userName']);
	$_SESSION['userMobile']		=	encrypt($rs['userMobile']);
	$_SESSION['userMail']		=	encrypt($rs['userMail']);
	$_SESSION['userGroup']		=	encrypt($rs['userGroup']);

	//	로그인 내역 저장
	$success					=	$common['MemberManager']->setLoginHistoryProc($userIdx);

	echo 'Y';
}
?>