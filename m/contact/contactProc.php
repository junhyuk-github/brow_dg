<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';

foreach($_POST as $key=>$post) $_POST[$key] = allTags($post);

$_POST['writerIP']				=	$_SERVER['REMOTE_ADDR'];
$success						=	$common['BoardManager']->setBBSProc($_POST, $_FILES);
//print_r($success);
//exit();

if ( $success->isResult() ) {
	echo 'Y';
} else {
	echo 'N';
}

include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>