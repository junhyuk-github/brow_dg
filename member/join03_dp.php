<?php
$page_title = '회원가입 | 톡스앤필 브로우';
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
				<li class="frt on"><b>1</b><span style="font-weight:600;">&#x02713;</span></li>
				<li class="snd on"><b>2</b><span style="font-weight:600;">&#x02713;</span></li>
				<li class="thr on"><b>3</b><span>회원가입 완료</span></li>
			</ul>
			<div class="join-clear">
				<h3>회원가입이 완료되었습니다.</h3>
				<span>톡스앤필 브로우 회원가입을 진심으로 환영합니다.</span>
				<div class="ja-btn-wrap">
					<a href="http://toxnfillbrow.com" class="goNext"><span class="i-next">메인으로</span></a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/share.php';
?>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer.php';
?>

</body>
</html>

<!--	DB Close Start	-->
<?php
include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>
<!--	DB Close End	-->