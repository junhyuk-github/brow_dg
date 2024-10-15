<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top-m.php';
$page_title = '톡스앤필 브로우 | 오시는 길';
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
		<div id="titBanner" style="background-image:url('/common/img/m/intro/banner4.jpg');">
			<div class="text-vertical-center">
				<div class="vertical-middle">
					<div class="minframe">
						<h2>오시는 길</h2>
						<span>LOCATION</span>
					</div>
				</div>
			</div>
		</div>

		<div class="intro-pg">
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