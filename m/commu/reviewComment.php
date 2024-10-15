<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';

$bID							=	allTags($_POST['val1']);
$bIdx							=	allTags($_POST['val2']);

$commentList					=	$common['BoardManager']->getCommentList($bIdx);
$commentList					=	$commentList->getData();

if ( $commentList ) {
	$commentCnt					=	sizeof($commentList);
} else {
	$commentCnt					=	0;
}
?>

	<form class="" id="frmComment_<?=$bIdx?>" name="frmComment_<?=$bIdx?>" method="post" style="margin-top:0;margin-bottom:0">
	<input type="hidden" id="blank"					name="blank"				value="">
	<input type="hidden" id="bID"					name="bID"					value="<?=$bID?>" />
	<input type="hidden" id="bIdx"					name="bIdx"					value="<?=$bIdx?>" />
	<input type="hidden" id="pIdx"					name="pIdx"					value="0" />
	<input type="hidden" id="idx"					name="idx"					value="" />
	<input type="hidden" id="isAction"				name="isAction"				value="" />
	<div class="add-reply">
		<div class="ar-head">
			<img src="/common/img/icon/reply.png" alt="">
			<? if ( $common['userIdx'] ) { ?>
			<button type="button" class="btn-addRely" onClick="openComment('replyRegMain_<?=$bIdx?>');">댓글쓰기</button>
			<? } else { ?>
			<button type="button" class="btn-addRely" onClick="alert('로그인 후 사용해주세요.');">댓글쓰기</button>
			<? } ?>
			<span class="right">COMMENT : <?=$commentCnt?></span>
		</div>
		<div class="vw-comment-reg-box replyReg1" id="replyRegMain_<?=$bIdx?>">
			<div class="inner">
				<textarea id="comment" name="comment" cols="" rows="4" class="form-control"></textarea>
			</div>
			<div class="vw-reg-btn">
				<button type="button" onClick="actionComment(this.form, 'frmComment_<?=$bIdx?>', 'commentDiv<?=$bIdx?>',  '','N');">등록</button>
			</div>
		</div>
	</div>
	</form>

	<? if ( $commentList ) { ?>
	<ul class="reply-list">
		<?
		foreach ($commentList as $key => $val)
		{
			$cIdx						=	$val['idx'];
			$cPidx						=	$val['pIdx'];
			$cPuserName					=	$val['pUserName'];
			$cWriterIdx					=	$val['writerIdx'];
			$cWriterID					=	$val['userID'];
			$cWriterName				=	$val['userName'];
			$cUserGroup					=	$val['userGroup'];
			$cComment					=	$val['comment'];
			$cRegDate					=	$val['regDate'];
			$cRegDate					=	DATE('Y-m-d H:i', strtotime($cRegDate));
		?>
		<form class="" id="frmComment_<?=$bIdx?>_<?=$cIdx?>" name="frmComment_<?=$bIdx?>_<?=$cIdx?>" method="post" style="margin-top:0;margin-bottom:0">
		<input type="hidden" id="blank"					name="blank"				value="">
		<input type="hidden" id="bID"					name="bID"					value="<?=$bID?>" />
		<input type="hidden" id="bIdx"					name="bIdx"					value="<?=$bIdx?>" />
		<input type="hidden" id="pIdx"					name="pIdx"					value="<?=$cIdx?>" />
		<input type="hidden" id="idx"					name="idx"					value="" />
		<input type="hidden" id="isAction"				name="isAction"				value="" />
		<li class="reply-item">
			<div class="rply-head">
				<span class="vw-id">
                    <?php if ($common['userGroup'] == '5' || $common['userGroup'] == '6') { ?>
					    <span class="icon l2"></span>
                    <?php } ?>
					<span><?=$cWriterName?></span>
				</span>
				<span class="vw-date"><?=$cRegDate?></span>
			</div>
			<div class="rply-content">
				<? if ( $cPidx > 0 ) { ?><span class="rply-target">TO.<?=$cPuserName?></span><? } ?><?=nl2br($cComment)?>
			</div>
			<div class="add-reply">
				<div class="ar-head">
					<img src="/common/img/icon/reply.png" alt="">
					<? if ( $common['userIdx'] ) { ?>
					<button type="button" class="btn-addRely" onClick="openComment('replyRegSub_<?=$bIdx?>_<?=$cIdx?>');">댓글쓰기</button>
					<? } else { ?>
					<button type="button" class="btn-addRely" onClick="alert('로그인 후 사용해주세요.');">댓글쓰기</button>
					<? } ?>
				</div>
				<div class="vw-comment-reg-box replyReg2" id="replyRegSub_<?=$bIdx?>_<?=$cIdx?>">
					<div class="inner">
						<textarea id="comment" name="comment" cols="" rows="4" class="form-control"></textarea>
						
					</div>
					<div class="vw-reg-btn">
						<button type="button" onClick="actionComment(this.form, 'frmComment_<?=$bIdx?>_<?=$cIdx?>', 'commentDiv<?=$bIdx?>', '','N');">등록</button>
					</div>
				</div>
			</div>

			<? if ( $cWriterIdx == $common['userIdx'] ) { ?>
			<button type="button" class="btn-delete" onclick="actionComment(this.form, 'frmComment_<?=$bIdx?>_<?=$cIdx?>', 'commentDiv<?=$bIdx?>', '<?=$cIdx?>','D');"><img src="/common/img/icon/times_w.svg" alt=""></button>
			<? } ?>
		</li>
		</form>
		<? } ?>
	</ul>
	<? } ?>