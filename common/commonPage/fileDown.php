<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';

if ( !$_GET['downFile'] || !$_GET['fileName'] ) {
	echo '<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">';
	echo '잘못된 접근입니다.';
	exit;
}

$downFilePath					=	$_GET['downFile'];
$downFileName					=	$_GET['fileName'];

$common['FileManager']->fileDownload($downFilePath, $downFileName);
?>