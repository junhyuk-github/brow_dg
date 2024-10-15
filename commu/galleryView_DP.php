<link rel="stylesheet" href="/common/css/page.css">
<?php
$page_title = '갤러리 | 톡스앤필 브로우';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top.php';

$bID							=	'46';
$bbsListURL						=	'/commu/gallery.php';
$bbsViewURL						=	'/commu/galleryView.php';
?>
<script>
	document.oncontextmenu = function(){return false;}	//우클릭방지
</script>
</head>

<body class="pg-detail no-footer-top">

<div id="wrap" class="main pg_detail">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb_main.php';
	?>

	<div id="" class="board-frame gallery">
		<div class="thumbnail">
			<div class="thumb-title">GALLERY</div>
		</div>
		<div class="pg-tit">
			<h2>갤러리</h2>
		</div>

		<div id="VP" class="board-view-wrap">
			<?php
			include $common['wwwPath'] . '/bbs/bbsView.php';
			?>
		</div>
	</div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer-main.php';
?>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/eventPopup.php';
?>
</body>
</html>

<!--	DB Close Start	-->
<?php
include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>
<!--	DB Close End	-->