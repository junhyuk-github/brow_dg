<?php
$page_title = '온라인 상담 | 톡스앤필 브로우';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top-m.php';
$category						=	'contact';
$bID							=	'45';
?>
</head>
<body>
<div id="wrap" class="">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb-m.php';
	?>

	<div id="container">
		<?php
		include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/subTab-m.php';
		?>
		<div id="titBanner" style="background-image:url('/common/img/m/contact/banner1.jpg?ver=0303');">
			<div class="text-vertical-center">
				<div class="vertical-middle">
					<div class="minframe">
						<h2>온라인 상담</h2>
						<span>ONLINE CUNSULTING</span>
					</div>
				</div>
			</div>
		</div>

		<div class="contact-pg">
			<?php
			include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/classSubmit-m_DP1.php';
			?>
		</div>
	</div>

	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/floating-m.php';
	?>

	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer-m.php';
	?>
</div>

</body>
</html>

