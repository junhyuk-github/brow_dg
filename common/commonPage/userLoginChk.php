<?php
if ( $common['userID'] == '' ) {
?>
<script>
	//alert("로그인 후 사용해 주세요.");
	location.href				=	"/member/login.php";
</script>
<?
	exit;
}
?>