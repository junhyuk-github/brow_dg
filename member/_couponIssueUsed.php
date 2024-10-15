<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';

$idx						    =	allTags($_POST['idx']);
$userIdx						=	allTags($_POST['userIdx']);
$couponInfo                     =   $_POST['couponInfo'];

$success						=	$common['CouponManager']->setCouponState($idx);

if ( $success->isResult() ) {
    $data							=	$common['MemberManager']->getMemberInfo($common['userIdx']);
    $data							=	$data->getData();
    $rs								=	$data[0];

    if ($rs) {
        $param                  =   array();
        $receiverPhone			=	str_replace('-', '', $rs['userMobile']);
        $certNo					=	sprintf('%06d', mt_rand(0, 999999));
        $param['destPhone']		=	$receiverPhone;
        $param['destName']		=	$rs['userName'];
        $param['certNo']		=	$certNo;
        $param['couponName']    =   $couponInfo;
        //추후에 브로우용으로 바꿔야함.
        $param['tempIdx']		=	'869';
        $param['attchFile']		=	'completion_brow.json';

        $sendKakao				=	$common['SMSManager']->sendKakao($param);


    }
    echo 'Y';
} else {
    echo 'N';
}
?>