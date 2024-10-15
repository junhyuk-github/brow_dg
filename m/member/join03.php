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
				<li class="step step-01">
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
				<li class="step step-03 on">
					<p>
						STEP 03
						<span class="agr">가입 완료</span>
					</p>
				</li>
			</ul>
			<div class="step-clear">
				<figure>
					<img src="/common/img/member/join-step3-m.svg" alt="가입완료">
				</figure>
				<h3>회원가입이 완료되었습니다.</h3>
				<span>톡스앤필 브로우 회원가입을 진심으로 환영합니다.</span>
				<div class="ja-btn-wrap">
					<a href="http://toxnfillbrow.com/m/" class="goNext">
						<span>메인으로</span>
					</a>
				</div>
			</div>
		</div>
	</div>
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

<!--	DB Close Start	-->
<?php
include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>
<!--	DB Close End	-->