<?php
include $_SERVER['DOCUMENT_ROOT'] . "/common/commonPage/_header.php";

session_unset();
session_destroy();

//	세션 굽기
$_SESSION['userIdx']			= '';
$_SESSION['userID']				= '';
$_SESSION['userName']			= '';
$_SESSION['userMobile']			= '';
$_SESSION['userMail']			= '';
?>
<script>
top.location.href				=	"/index.php";
</script>