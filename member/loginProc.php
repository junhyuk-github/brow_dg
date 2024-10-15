<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';

$loginID						=	allTags($_POST['loginID']);
$loginPWD						=	allTags($_POST['loginPWD']);
$idSave							=	allTags($_POST['idSave']);

$mm_msg							=	$common['MemberManager']->userLoginProc($loginID, $loginPWD);
$mm_data						=	$mm_msg->getData();
$rs								=	$mm_data[0];

//print_r($mm_msg);
//exit();

if ( $mm_data == '' ) {																				//	해당 ID, PWD가 일치하지 않으면,
	$common['CommonManager']->goBack('등록된 회원정보가 없습니다.', 'frame');
} else {
	//	세션 굽기
	$userIdx					=	$rs['userIdx'];
	$_SESSION['userIdx']		=	encrypt($rs['userIdx']);
	$_SESSION['userID']			=	encrypt($rs['userID']);
	$_SESSION['userName']		=	encrypt($rs['userName']);
	$_SESSION['userMobile']		=	encrypt($rs['userMobile']);
	$_SESSION['userMail']		=	encrypt($rs['userMail']);
	$_SESSION['userGroup']		=	encrypt($rs['userGroup']);

	$cookieDomain				=	getDomainName($common['wwwURL']);

	if ( $idSave == 'Y' ) {
		$cookieTime				=	time() + 60 * 60 * 24 * 30;										//	1달
		setcookie('saveUserID',		$_SESSION['userID'],		$cookieTime,	'/',	$cookieDomain);
	} else {
		setcookie('saveUserID',		'',							$cookieTime,	'/',	$cookieDomain);
	}

	//	로그인 내역 저장
	$success					=	$common['MemberManager']->setLoginHistoryProc($userIdx);

	$common['CommonManager']->goPage('/index.php', $msg = '', 'frame');
}
?>