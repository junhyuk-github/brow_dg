<?php
if ( $bID ) {
	$data						=	$common['BoardManager']->getBoardInfo($bID);
	$data						=	$data->getData();
	$rs							=	$data[0];

	if ( $rs ) {
		$boardName				=	$rs['boardName'];
		$optGubun				=	$rs['optGubun'];
		$isSecret				=	$rs['isSecret'];
		$isMember				=	$rs['isMember'];
		$uploadgubun			=	$rs['uploadgubun'];
		$uploadFileCnt			=	$rs['uploadFileCnt'];
		$uploadImgCnt			=	$rs['uploadImgCnt'];
		$isReply				=	$rs['isReply'];
		$isComment				=	$rs['isComment'];
		$isDate					=	$rs['isDate'];
		$isSpam					=	$rs['isSpam'];
		$isTop					=	$rs['isTop'];
		$isUse					=	$rs['isUse'];
		$isHomeView				=	$rs['isHomeView'];
		$orderBy				=	$rs['orderBy'];
		$menuCode				=	$rs['menuCode'];
	} else {
		$common['CommonManager']->goPage('/', $msg = '필요한 정보가 없습니다1. 다시 시도해 주세요.', '');
		exit();
	}
} else {
	$common['CommonManager']->goPage('/', $msg = '필요한 정보가 없습니다2. 다시 시도해 주세요.', '');
	exit();
}
?>