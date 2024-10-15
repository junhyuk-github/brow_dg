<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';

$findID							=	allTags($_POST['findID']);
$findMobile						=	allTags($_POST['findMobile']);

$mm_msg							=	$common['MemberManager']->findPWDProc($findID, $findMobile);
$mm_data						=	$mm_msg->getData();
$rs								=	$mm_data[0];
//print_r($success);
//exit();

if ( $mm_data == '' ) {
	echo 'N';
} else {
	$userIdx					=	$rs['userIdx'];
	$userID						=	$rs['userID'];
	$userName					=	$rs['userName'];
	$userMobile					=	$rs['userMobile'];

	//	임시 비밀번호 생성 및 업데이트
	$imsiPWD					=	sprintf('%06d', mt_rand(0, 999999));

	$message					=	'회원님의 임시비밀번호는 ' . $imsiPWD . '입니다<br />';
	$message					.=	'비밀번호 변경은 로그인 후 [마이페이지]에서 할 수 있습니다';

	$DATA['senderMobile']		=	'02-540-4840';
	$DATA['receiveMobile']		=	$userMobile;
	$DATA['receiverName']		=	$userName;
	$DATA['subject']			=	'[톡스앤필 뷰티아카데미] 비밀번호가 변경 되었습니다.';
	$DATA['contents']			=	$message;
	$success1					=	$common['SMSManager']->sendSMSProc($DATA);

	if ( $success1->isResult() ) {
		$success2			=	$common['MemberManager']->setNewPwdProc($userIdx, $imsiPWD);
		if ( $success2->isResult() ) {
			echo 'Y';
		} else {
			echo 'N';
		}
	} else {
		echo 'N';
	}
}
?>