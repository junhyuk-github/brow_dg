<?php
$page_title = '온라인 상담 | 톡스앤필 브로우';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top.php';
$bID							=	'45';
?>
</head>
<body>
<div id="wrap" class="">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb.php';
	?>

	<div id="container">
		<div id="titBanner" style="background-image:url('/common/img/contact/banner1.jpg');">
			<div class="minframe text-vertical-center">
				<div class="vertical-middle">
					<h2>온라인 상담</h2>
					<span>ONLINE CUNSULTING</span>
				</div>
			</div>
		</div>

		<?php
		include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/classSubmit_DP1.php';
		?>
	</div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/contactUs.php';
?>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer.php';
?>

</body>
</html>

