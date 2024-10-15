<?php
$page_title = '회원가입 | 톡스앤필 뷰티아카데미';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top.php';
?>

</head>

<body>

<div id="wrap" class="noneFix">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb.php';
	?>

	<div id="container">
		<div class="breadcrumb-wrap maxframe">
			<ul class="breadcrumb">
				<li><span>홈</span></li>
				<li><span>회원가입</span></li>
			</ul>
		</div>

		<div class="pg-tit noLine">
			<h2>회원가입</h2>
			<span>SIGN UP</span>
		</div>

		<div class="minframe">
			<ul class="join-step">
				<li class="frt on"><b>1</b><span>약관동의</span></li>
				<li class="snd"><b>2</b><span>회원정보 입력</span></li>
				<li class="thr"><b>3</b><span>회원가입 완료</span></li>
			</ul>
		</div>

		<form class="form-signin" id="frmInput" name="frmInput" method="post" style="margin-top:0;margin-bottom:0">
		<input type="hidden" id="blank"				name="blank"			value="">
		<div class="join-agree-wrap">
			<h3 class="sr-only">약관동의</h3>
			<div class="minframe">
				<div class="join-agree">
					<h4>이용약관</h4>
					<div class>
						<?php
						include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_policyCnt.php';
						?>
					</div>
					<p>
						<span class="form-checkbox">
							<input type="checkbox" class="" id="agree1" name="agree1" value="Y">
							<label for="agree1">이용약관에 동의합니다.</label>
						</span>
					</p>
				</div>

				<div class="join-agree">
					<h4>개인정보취급방침</h4>
					<div>
						<?php
						include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_privacyPlcyCnt.php';
						?>
					</div>
					<p>
						<span class="form-checkbox">
							<input type="checkbox" class="" id="agree2" name="agree2" value="Y">
							<label for="agree2">개인정보취급방침에 동의합니다.</label>
						</span>
					</p>
				</div>

				<div class="ja-btn-wrap">
					<a href="javascript:history.back();">취소</a>
					<a style="cursor:pointer;" onClick="goNextStep();" class="goNext"><span class="i-next">다음단계</span></a>
				</div>
				<!-- <div class="g-recaptcha" data-sitekey="6LcVZ60nAAAAAGgBYHlGJRKdkzbPH_0x3vdcdZCD"></div> -->
			</div>
		</div>
		</form>
	</div>
</div>
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/share.php';
?>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer.php';
?>

</body>
</html>

<script language="javascript">
function goNextStep()
{
	var frm						=	document.frmInput;

	if ( frm.agree1.checked == false ) {
		alert("이용약관에 동의해 주세요.");
		frm.agree1.focus();
		return false;
	}

	if ( frm.agree2.checked == false ) {
		alert("개인정보취급방침에 동의해 주세요.");
		frm.agree2.focus();
		return false;
	}

	frm.action					=	"./join02.php";
	frm.submit();
}
</script>

<!--	DB Close Start	-->
<?php
include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>
<!--	DB Close End	-->