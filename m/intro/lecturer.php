<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top-m.php';
$page_title = '톡스앤필 브로우 | 강사진';
?>
</head>
<body>
<div id="wrap" class="">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb-m.php';
	?>
		
	<div id="container">
		<?php
		$category	=	'intro';
		include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/subTab-m.php';
		?>
		<div id="titBanner" style="background-image:url('/common/img/m/intro/banner2.jpg');">
			<div class="text-vertical-center">
				<div class="vertical-middle">
					<div class="minframe">
						<h2>강사진 소개 </h2>
						<span>INSTRUCTOR INTRODUCTION</span>
					</div>
				</div>
			</div>
		</div>

		<div class="intro-pg">
			<section class="img-section" style="margin-bottom: 100px;">
				<img src="/common/img/m/intro/lecturer.png?ver=221018" alt="">
			</section>
			<?php
			include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/contactUs-m.php';
			?>
		</div>
	</div>
</div>

<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/floating-m.php';
	?>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer-m.php';
?>
</body>
</html>