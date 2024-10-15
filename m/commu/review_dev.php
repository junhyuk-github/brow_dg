<!-- 2022-08-26 교육과정 삭제 적용완료 -->
<?php
$page_title = '수강생 실제후기 | 톡스앤필 브로우';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top-m.php';

//https://www.toxnfillacademy.com/m/commu/review.php 톡스앤필뷰티아카데미 수강생 실제후기 페이지에서 소스코드 가지고 왔습니다.

$bID							=	48;
$order							=	allTags($_REQUEST['order']); if ( $order == '' ) $order = '1';

//	게시판 리스트
$page							=	array();
$page['recordPerPage']			=	10;																					//	한 페이지당 최대 게시글 개수.
$page['pnoPerPage']				=	10;																					//	한 페이지당 최대 페이지번호 개수.
$page['pno']					=	allTags($_REQUEST['pno']) == '' ? 1 : (int)allTags($_REQUEST['pno']);				//	페이지번호.
$temp							=	($page['pno'] * $page['recordPerPage']) - $page['recordPerPage'];
$msg							=	$common['BoardManager']->getReviewList($temp, $page['recordPerPage'], $bID, $order);
$bbsList						=	$msg->getData();
$page['totalCount']				=	$msg->getMessage();																	//	해당 게시판 총 게시글 개수.
$page['pnoCount']				=	ceil($page['totalCount'] / $page['recordPerPage']);									//	페이지넘버의 총 개수.
$temp							=	0;
$page['ppno']					=	1;
while(1)
{
	$temp						+=	$page['pnoPerPage'];
	if ( $temp >= $page['pno'] ) break;
	$page['ppno']++;
}
$page['maxPpno']				=	ceil($page['pnoCount'] / $page['pnoPerPage']);
$page['spno']					=	($page['ppno'] - 1) * $page['pnoPerPage'] + 1;
$page['epno']					=	$page['ppno'] * $page['pnoPerPage'];
$page['sno']					=	$page['totalCount'] - (($page['pno'] - 1) * $page['recordPerPage']);

if ( $page['epno'] > $page['pnoCount'] ) $page['epno'] = $page['pnoCount'];
//	게시판 리스트

$qry							=	'&order=' . $order;
?>

<script type="text/javascript">
function getComment(divID, value1, value2)
{
	$.ajax({
		url						:	"./reviewComment.php",
		type					:	"POST",
		data					:
		{
			val1					:	value1,
			val2					:	value2
		},
		dataType				:	"html",
		contentType				:	"application/x-www-form-urlencoded; charset=UTF-8", 
		async					:	true,
		success					:	function (data)
		{
			$( "#" + divID ).html(data);
		}
	});
}
</script>

</head>

<body>
<div id="wrap" class="">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb-m.php';
	?>

	<div id="container">
		<?php
		$category				=	'commu';
		include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/subTab-m.php';
		?>

		<div id="titBanner" style="background-image:url('/common/img/m/commu/banner4.jpg">
			<div class="text-vertical-center">
				<div class="vertical-middle">
					<div class="minframe">
						<h2>수강생 실제후기</h2>
						<span>REVIEW</span>
					</div>
				</div>
			</div>
		</div>
		
		<div class="review-list-wrap">
			<div class="minframe">
				<section class="view-reg"> 
					<div class="vw-tit-box">
						<!-- 1. 로그인 상태일때 -->
						<? if ( $common['userIdx'] ) { ?>
						<span class="vw-id">
							<!--1) 수강생 아이콘--> 
							<span class="icon l<? if ( $common['userGroup'] == '2' ) { echo '1'; } else if ( $common['userGroup'] == '3' ) { echo '2'; } else if ( $common['userGroup'] == '4' ) { echo '3'; } ?>"></span>
							<!--2) 정회원 아이콘
							<span class="icon l2"></span>
							--> 
							<!--3) 일반회원 아이콘
							<span class="icon l3"></span>
							--> 
							<span><?=$common['userName']?></span>
						</span>
						<? } else { ?>
						<!-- 2. 비로그인 상태일때 -->
						<div class="vw-login">
							<b class="">후기 작성은 로그인 후 이용할 수 있습니다.</b>
							<button type="button" onclick="window.location='/m/member/login.php'" class="">로그인</button>
						</div>
						<? } ?>
					</div>

					<form id="frmReview" name="frmReview" method="post" enctype="multipart/form-data" style="margin-top:0;margin-bottom:0" onsubmit="return false;">
					<input type="hidden" id="blank"					name="blank"				value="">
					<input type="hidden" id="isAction"				name="isAction"				value="N">
					<input type="hidden" id="bID"					name="bID"					value="<?=$bID?>">
					<input type="hidden" id="idx"					name="idx"					value="">
					<input type="hidden" id="isDisplay"				name="isDisplay"			value="Y">
					<input type="hidden" id="subject"				name="subject"				value="">
					<input type="hidden" id="writerName"			name="writerName"			value="<?=$common['userName']?>">
					<input type="hidden" id="imgGubun"				name="imgGubun"				value="2">
					<input type="hidden" id="iCnt"					name="iCnt"					value="1">
					<div class="vw-reg-form">
						<!-- 2022-08-24 미노출처리요청
						<div class="vw-class-select">
							<select id="gubun" name="gubun">
								<option value="" selected>교육과정을 선택해주세요</option>
								<option value="1">[커리큘럼] 아티스트 과정</option>
								<option value="2">[커리큘럼] 마스터 과정</option>
								<option value="3">[커리큘럼] 스카터 SMP 과정</option>
								<option value="4">[커리큘럼] 메디컬 스킨케어 과정</option>
							</select>
						</div>
						-->
						<div class="vwrf-bottom">
							<div class="vw-comment-reg-box">
								<div class="inner">
									<? if ( $common['userIdx'] ) { ?>
									<textarea name="contents" id="contents" cols="" rows="4" class="form-control" placeholder="후기를 입력해주세요.(최대 2000자 이내)"></textarea>
									<? } else { ?>
									<textarea name="contents" id="contents" cols="" rows="4" class="form-control" placeholder="로그인 후 이용할 수 있습니다."></textarea>
									<? } ?>
									<div id="vwImgContainer" style="display:none;">
										<div class="vw-img-box">
											<div id="vwImgThumb" class="img-box"></div>
											<button type="button" class="btn-delect" onclick="initThumb()">
												<img src="/common/img/icon/times_w.svg" alt="" onClick="delImg();">
											</button>
										</div>
									</div>
									<div class="vw-reg-btn">
										<? if ( $common['userIdx'] ) { ?>
										<div class="vw-upload">
											<input type="hidden" id="isImgDel1"			name="isImgDel1"			value="N">
											<input type="file" id="upImg1" name="upImg1" accept="image/*" onchange="setThumbnail(event);"/>
											<div class="btn-vwf" onclick="document.all.upImg1.click()">
												<img src="/common/img/icon/camera.png" alt="">
											</div>
										</div>
										<button type="button" onClick="formReview('', 'N');">등&nbsp;&nbsp;록</button>
										<? } else { ?>
										<div class="vw-upload">
											<input type="hidden" id="isImgDel1"			name="isImgDel1"			value="N">
											<input type="file" id="upImg1" name="upImg1" accept="image/*" onchange="setThumbnail(event);"/>
											<div class="btn-vwf" onClick="alert('로그인 후 사용해주세요.');">
												<img src="/common/img/icon/camera.png" alt="">
											</div>
										</div>
										<button type="button" onClick="alert('로그인 후 사용해주세요.');">등&nbsp;&nbsp;록</button>
										<? } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					</form>
				</section>

				<section class="view-list-area">
					<div class="vw-list-head">
						<h3 class="">수강후기</h3>
						<span>전체 후기 <?=$page['totalCount']?></span>
					</div>
					<div class="vw-sort row">
						<button type="button" class="col-6<? if ( $order == '1' ) { echo ' active'; } ?>" onclick="window.location='<?=$selfPage?>?order=1';">최신순</button>
						<button type="button" class="col-6<? if ( $order == '2' ) { echo ' active'; } ?>" onclick="window.location='<?=$selfPage?>?order=2';">오래된순</button>
					</div>
					<ul class="vw-list">
						<?php
						if ( $bbsList ) {
							foreach ($bbsList as $key => $val)
							{
								$idx					=	$val['idx'];
								$contents				=	$val['contents'];
								$writerIdx				=	$val['writerIdx'];
								$writerName				=	$val['writerName'];
								$writerGroup			=	$val['userGroup'];
								$gubun					=	$val['gubun'];
								$regDate				=	$val['regDate'];
								$regDate				=	DATE('Y-m-d', strtotime($regDate)); //hj 2021-02-24: 아카데미 요청으로 수정(Y-m-d H:i)

								$iCorpCode				=	$val['iCorpCode'];
								$iFile					=	$val['fileName'];

								$fullUpImg				=	$common['uploadVirDir'] . '/' . $iCorpCode . '/boardFile/' . $bID . '/' . $iFile;

								if ( $gubun == '1' ) {
									$gubunTxt			=	'[커리큘럼] 아티스트 과정';
								} else if ( $gubun == '2' ) {
									$gubunTxt			=	'[커리큘럼] 마스터 과정';
								} else if ( $gubun == '3' ) {
									$gubunTxt			=	'[커리큘럼] 스카터 SMP 과정';
								} else if ( $gubun == '4' ) {
									$gubunTxt			=	'[커리큘럼] 메디컬 스킨케어 과정';
								}
						?>
						<li class="vw-item">
							<div class="vw-tit-box">
								<span class="vw-id">
									<span class="icon l<? if ( $writerGroup == '2' ) { echo '1'; } else if ( $writerGroup == '3' ) { echo '2'; } else if ( $writerGroup == '4' ) { echo '3'; } ?>"></span>
									<span><?=$writerName?></span>
								</span>
								<span class="vw-date"><?=$regDate?></span>
								<span class="vw-class"><?=$gubunTxt?></span>

								<? if ( $writerIdx == $common['userIdx'] ) { ?>
								<button type="button" class="btn-delete" onClick="formReview('<?=$idx?>', 'D');"><img src="/common/img/icon/times_w.svg" alt=""></button>
								<? } ?>
							</div>
							<div class="vw-content-box">
								<div class="feed">
									<?=nl2br($contents)?>
									<? if ( $iFile ) { ?>
									<img src="<?=$fullUpImg?>" alt="">
									<? } ?>
								</div>
								<span id="commentDiv<?=$idx?>"></span>
								<script Language="javaScript">getComment('commentDiv<?=$idx?>', '<?=$bID?>', '<?=$idx?>');</script>
							</div>
						</li>
						<?
							}
						}
						?>
					</ul>
				</section>

				<div class="pagin-wrap">
					<ul class="pagination">
						<? if ( $page['ppno'] != 1 && $bbsList != '' ) { ?>
						<li><a href="<?=$selfPage?>?pno=1<?=$qry?>" class="icon first"></a></li>
						<li><a href="<?=$selfPage?>?pno=<?=$page['spno'] - 1?><?=$qry?>" class="icon prev"></a></li>
						<?
						}

						for ( $i = $page['spno']; $i <= $page['epno']; $i++ ) {
						?>
							<? if ( $i == $page['pno'] ) { ?>
								<li class="active"><a class="pn-link" href="#"><?=$i?></a></li>
							<? } else { ?>
								<li><a class="pn-link" href="<?=$selfPage?>?pno=<?=$i?><?=$qry?>"><?=$i?></a></li>
							<? } ?>
						<?
						}

						if ( $page['ppno'] != $page['maxPpno'] && $bbsList != '' ) {
						?>
						<li><a href="<?=$selfPage?>?pno=<?=$page['epno'] + 1?><?=$qry?>" class="icon next"></a></li>
						<li><a href="<?=$selfPage?>?pno=<?=$page['pnoCount']?><?=$qry?>" class="icon last"></a></li>
						<? } ?>
					</ul>
				</div>
			</div>
		</div>
		<?php
		include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/contactUs-m.php';
		?>
	</div>

	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/floating-m.php';
	?>

	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer-m.php';
	?>
</div>

<script> 
/*
 * hj: 업로드한 이미지 썸네일로 확인
 */
function setThumbnail(event) { 
	var reader = new FileReader(); 
	$("#vwImgContainer").show();
	reader.onload = function(event) { 
			var img = document.createElement("img"); 
			img.setAttribute("src", event.target.result); 
			document.querySelector("#vwImgThumb").appendChild(img); 

		}; 
	reader.readAsDataURL(event.target.files[0]); 
} 

/*
 * HJ: 이미지 선택 초기화
 */
function initThumb(){
	$("#vwImgThumb img").attr('src', '');
	$("#vwImgContainer").hide();
}

/*
 * hj : 댓글쓰기 버튼 토글
 */
/*
$('.btn-addRely').on('click', function(){
	var target = $(this).attr('id');
	$('.' + target).toggle();
});
*/



function delImg(gubun)
{
	var agent					=	navigator.userAgent.toLowerCase();
	if ($.browser.msie) {
		$( "#upImg1" ).replaceWith( $( "#upImg1" ).clone(true) );
	} else {
		$( "#upImg1" ).val("");
	}
	$( "#isImgDel1" ).val("Y");
}

function formReview(idx, isAction)
{
	var frm						=	document.frmReview;

	frm.idx.value				=	idx;
	frm.isAction.value			=	isAction;
	//frm.subject.value			=	"수강생 실제후기 - " + frm.gubun.options[frm.gubun.selectedIndex].text;
	frm.subject.value			=	"수강생 실제후기";

	var form					=	document.querySelector( "#frmReview" );
	var postDate				=	new FormData(form);

	if ( isAction == "D" ) {
		if (confirm("게시물을 삭제 하시겠습니까?")) {
			$.ajax({
				url				:	"./reviewProc.php",
				type			:	"POST",
				data			:	postDate,
				dataType		:	"html",
				//contentType	:	"application/x-www-form-urlencoded; charset=UTF-8",
				async			:	true,
				cache			:	false,
				contentType		:	false,
				processData		:	false,
				success			:	function (data)
				{
					rsDate		=	data.replace( /(\s*)/g, "" );
					if ( rsDate == "Y" ) {
						alert("삭제 되었습니다.");
						location.href	=	"<?=$selfPage?>?pno=<?=$page['pno']?><?=$qry?>";
					} else {
						alert("삭제시 에러가 발생하였습니다. 다시 시도해 주세요.");
					}
				}
			});
		}
	} else {
		/*
		if ( frm.gubun.value == "" ) {
			alert("교육과정을 입력해 주십시오.");
			frm.gubun.focus();
			return false;
		}
		*/

		if ( frm.contents.value == "" ) {
			alert("내용을 입력해 주세요.");
			frm.contents.focus();
			return false;
		}

		$.ajax({
			url					:	"./reviewProc.php",
			type				:	"POST",
			data				:	postDate,
			dataType			:	"html",
			//contentType		:	"application/x-www-form-urlencoded; charset=UTF-8",
			async				:	true,
			cache				:	false,
			contentType			:	false,
			processData			:	false,
			success				:	function (data)
			{
				rsDate			=	data.replace( /(\s*)/g, "" );
				if ( rsDate == "Y" ) {
					alert("등록 되었습니다.");
					location.href	=	"<?=$selfPage?>?pno=<?=$page['pno']?><?=$qry?>";
				} else {
					alert("등록시 에러가 발생하였습니다. 다시 시도해 주세요.");
				}
			}
		});
	}
}

function openComment(divID)
{
	$( "#" + divID ).toggle();
}

function actionComment(frm, frmName, divID, idx, isAction)
{
	var bIdx					=	frm.bIdx.value;
		frm.idx.value			=	idx;
		frm.isAction.value		=	isAction;

	var postDate				=	$( "#" + frmName ).serialize();
	if ( isAction == "D" ) {
		if (confirm("댓글을 삭제 하시겠습니까?")) {
			$.ajax({
				url				:	"./reviewCommentProc.php",
				type			:	"POST",
				data			:	postDate,
				dataType		:	"html",
				contentType		:	"application/x-www-form-urlencoded; charset=UTF-8", 
				async			:	true,
				success			:	function (data)
				{
					//console.log(data);
					rsDate		=	data.replace( /(\s*)/g, "" );
					if (rsDate == "Y") {
						getComment(divID, '<?=$bID?>', bIdx);
					} else {
						alert("삭제시 에러가 발생하였습니다. 다시 시도해 주세요.");
					}

					focus();
				}
			});
		}
	} else {
		if ( frm.comment.value == "" ) {
			alert("댓글을 입력하세요.");
			frm.comment.focus();
			return false;
		}

		$.ajax({
			url					:	"./reviewCommentProc.php",
			type				:	"POST",
			data				:	postDate,
			dataType			:	"html",
			contentType			:	"application/x-www-form-urlencoded; charset=UTF-8", 
			async				:	true,
			success				:	function (data)
			{
				//console.log(data);
				rsDate			=	data.replace( /(\s*)/g, "" );
				if (rsDate == "Y") {
					getComment(divID, '<?=$bID?>', bIdx)
				} else {
					alert("등록시 에러가 발생하였습니다. 다시 시도해 주세요.");
				}

				focus();
			}
		});
	}
}
</script>

</body>
</html>

<!--	DB Close Start	-->
<?php
include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>
<!--	DB Close End	-->