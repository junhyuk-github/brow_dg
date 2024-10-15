<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';

$findName						=	allTags($_POST['findName']);
$findMail						=	allTags($_POST['findMail']);

$mm_msg							=	$common['MemberManager']->findIDProc($findName, $findMail);
$mm_data						=	$mm_msg->getData();
$rs								=	$mm_data[0];
//print_r($success);
//exit();

if ( $mm_data == '' ) {
	echo 'N';
} else {
	echo $rs['userID'];
}
?>