<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';

foreach($_POST as $key=>$post) $_POST[$key] = allTags($post);

$chkNo					=	$_POST['chkNo'];
$chkCommendeInfo =	$common['MemberManager']->chkCommendeInfo($chkNo);

if($chkCommendeInfo){
    if( $chkCommendeInfo['userGroup'] == 3)  $chkCommendeInfo['userGroup'] = 4;
    $data =  $chkCommendeInfo['userGroup'];

}else{
    $data =  'N';
}


echo json_encode($data);

?>