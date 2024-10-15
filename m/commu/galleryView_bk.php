<?php
$page_title = '갤러리 | 톡스앤필 브로우';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top-m.php';

$bID							=	'46';
$bbsListURL						=	'/m/commu/gallery.php';
$bbsViewURL						=	'/m/commu/galleryView.php';
?>
<script>
	document.oncontextmenu = function(){return false;}	//우클릭방지
</script>
</head>

<body>

<div id="wrap" class="">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb-m.php';
	?>
		
	<div id="container">
		<?php
		$category				=	'commu';
		include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/subTab-m.php';
		?>
		<div id="titBanner" style="background-image:url('/common/img/m/commu/banner3.jpg');">
			<div class="text-vertical-center">
				<div class="vertical-middle">
					<div class="minframe">
						<h2>갤러리</h2>
						<span>GALLERY</span>
					</div>
				</div>
			</div>
		</div>

		<div id="VP" class="board-view-wrap">
			<?php
			include $common['wwwPath'] . '/bbs/bbsView.php';
			?>
		</div>
		<?php
		include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/contactUs-m.php';
		?>
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

<!--	DB Close Start	-->
<?php
include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>
<!--	DB Close End	-->