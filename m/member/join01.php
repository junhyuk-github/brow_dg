<link rel="stylesheet" href="/common/css/page-m.css">
<?php
$page_title = '회원가입 | 톡스앤필 브로우';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top-m.php';
?>
</head>
<body class="pg-detail navBgOn">
<div id="wrap" class="main">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb-m.php';
	?>

	<div id="" class="pg_join">
		<div class="pg-tit">
			<h2>회원가입</h2>
		</div>
		<div class="minframe">
			<ul class="step-wrap">
				<li class="step step-01 on">
					<p>
						STEP 01
						<span class="agr">약관동의</span>
					</p>
				</li>
				<li class="step step-02">
					<p>
						STEP 02
						<span class="agr">정보 입력</span>
					</p>
				</li>
				<li class="step step-03">
					<p>
						STEP 03
						<span class="agr">가입 완료</span>
					</p>
				</li>
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
					<a style="cursor:pointer;" ontouchend="goNextStep();" class="goNext">
						<span>다음단계</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	</form>

	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/floating-m.php';
	?>

	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer-m.php';
	?>
</div>

<script src="/common/js/func.js"></script>

</body>
</html>

<script language="javascript">
<!--
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
//-->
</script>

<!--	DB Close Start	-->

<?php
include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>
<!--	DB Close End	-->