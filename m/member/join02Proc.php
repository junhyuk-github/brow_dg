<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';

foreach($_POST as $key=>$post) $_POST[$key] = allTags($post);

$success						=	$common['MemberManager']->setMemberProc($_POST);
//print_r($success);
//exit();

if ($success->isResult()) {
	$snsUserID					=	allTags($_POST['snsUserID']);
	if ( $snsUserID ) {
		$mm_msg					=	$common['MemberManager']->snsLoginProc($_POST);
		$mm_data				=	$mm_msg->getData();
		$rs						=	$mm_data[0];

		if ( $mm_data ) {
			//	세션 굽기
			$userIdx					=	$rs['userIdx'];
			$_SESSION['userIdx']		=	encrypt($rs['userIdx']);
			$_SESSION['userID']			=	encrypt($rs['userID']);
			$_SESSION['userName']		=	encrypt($rs['userName']);
			$_SESSION['userMobile']		=	encrypt($rs['userMobile']);
			$_SESSION['userMail']		=	encrypt($rs['userMail']);
			$_SESSION['userGroup']		=	encrypt($rs['userGroup']);

			$success					=	$common['MemberManager']->setLoginHistoryProc($userIdx);
		}
	} else {
		$loginID						=	allTags($_POST['userID']);
		$loginPWD						=	allTags($_POST['userPWD']);

		$mm_msg							=	$common['MemberManager']->userLoginProc($loginID, $loginPWD);
		$mm_data						=	$mm_msg->getData();
		$rs								=	$mm_data[0];

		//print_r($mm_msg);
		//exit();

		if ( $mm_data ) {
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
		}
	}

	echo 'Y';
} else {
	echo 'N';
}
?>