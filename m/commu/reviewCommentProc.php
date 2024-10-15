<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';

foreach($_POST as $key=>$post) $_POST[$key] = allTags($post);

$success						=	$common['BoardManager']->setCommentProc($_POST);
//print_r($success);
//exit();

if ( $success->isResult() ) {
	echo 'Y';
} else {
	echo 'N';
}

include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>