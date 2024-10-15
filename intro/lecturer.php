<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top.php';
$page_title = '톡스앤필 브로우 | 강사진';
?>
</head>
<body>
<div id="wrap" class="">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb.php';
	?>
		
	<div id="container">
		<div id="titBanner" style="background-image:url('/common/img/intro/banner2.jpg?ver=0302');">
			<div class="minframe text-vertical-center">
				<div class="vertical-middle">
					<h2>강사진 소개 </h2>
					<span>INSTRUCTOR INTRODUCTION</span>
				</div>
			</div>
		</div>

		<div class="intro-pg">
			<section class="img-section">
				<img src="/common/img/intro/lecturer.png?ver=221018" alt="">
			</section>
			<?php
			include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/contactUs.php';
			?>
		</div>
	</div>
</div>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer.php';
?>
</body>
</html>