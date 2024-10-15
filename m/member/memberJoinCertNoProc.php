<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';

foreach($_POST as $key=>$post) $_POST[$key] = allTags($post);

$receiverPhone					=	str_replace('-', '', $_POST['userMobile']);
// $sendCnt						=	$common['SMSManager']->getReservationCertNoSendCnt($receiverPhone);						//	당일 최대 10회만 발송 가능하게
//if ($receiverPhone == '01050059538') {
//$sendCnt = 0;
//}

//임시
$sendCnt = 0;

if ( $sendCnt > 9 ) {
	echo 'N2';
} else {
		$certNo					=	sprintf('%06d', mt_rand(0, 999999));
		$_POST['destPhone']		=	$receiverPhone;
		$_POST['destName']		=	$_POST['userName'];
		$_POST['certNo']		=	$certNo;
		//추후에 브로우용으로 바꿔야함.
        $_POST['tempIdx']		=	'912';

		$success				=	$common['SMSManager']->sendKakao($_POST);

		if ( $success->isResult() ) {
			echo $certNo;
		} else {
			echo 'N1';
		}
}
?>