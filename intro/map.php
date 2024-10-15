<?php
$page_title = '오시는 길 | 톡스앤필 브로우';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top.php';
?>
</head>
<body>
<div id="wrap" class="">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb.php';
	?>
		
	<div id="container">
		<div id="titBanner" style="background-image:url('/common/img/intro/banner4.jpg?ver=0302');">
			<div class="minframe text-vertical-center">
				<div class="vertical-middle">
					<h2>오시는 길</h2>
					<span>LOCATION</span>
				</div>
			</div>
		</div>

		<div class="map-pg">
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