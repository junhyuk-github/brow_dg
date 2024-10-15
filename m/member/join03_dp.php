<?php
$page_title = '회원가입 | 톡스앤필 브로우';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top-m.php';
?>
</head>
<body>
<div id="wrap" class="">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb-m.php';
	?>

	<div id="container">
		<div class="pg-tit">
			<h2>회원가입</h2>
			<span>SIGN UP</span>
		</div>
		<ul class="join-step">
			<li class="frt on"><b>1</b><span style="font-weight:600;">&#x02713;</span></li>
			<li class="snd on"><b>2</b><span style="font-weight:600;">&#x02713;</span></li>
			<li class="thr on"><b>3</b><span>회원가입 완료</span></li>
		</ul>
		<div class="minframe">
			<div class="join-clear">
				<h3>회원가입이 완료되었습니다.</h3>
				<span>톡스앤필 브로우 회원가입을 진심으로 환영합니다.</span>
				<div class="ja-btn-wrap">
					<a href="https://toxnfillbrow.com/m/" class="goNext">메인으로</a>
				</div>
			</div>
		</div>
	</div>
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/floating-m.php';
	?>

	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/share-m.php';
	?>

	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer-m.php';
	?>
</div>


<script src="/common/js/func.js"></script>

</body>
</html>

<!--	DB Close Start	-->
<?php
include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>
<!--	DB Close End	-->