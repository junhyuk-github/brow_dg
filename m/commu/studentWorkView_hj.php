<link rel="stylesheet" href="/common/css/page-m.css">
<?php
$page_title = '수강생 포트폴리오 | 톡스앤필 브로우';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top-m.php';

$bID							=	'47';
$bbsListURL						=	'/m/commu/studentWork.php';
$bbsViewURL						=	'/m/commu/studentWorkView.php';
?>
<script>
	document.oncontextmenu = function(){return false;}	//우클릭방지
</script>
</head>

<body class="pg-detail no-footer-top">

<div id="wrap" class="main pg_detail pg_board">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb-m.php';
	?>
		
	<div id="" class="board-frame studentW gallery">
		<div class="thumbnail">
			<div class="thumb-title">STUDENT PORTFOLIO</div>
		</div>
		<div class="pg-tit">
			<h2>수강생 포트폴리오</h2>
		</div>

		<div id="VP" class="board-view-wrap">
			<?php
			include $common['wwwPath'] . '/m/bbs/bbsView_hj.php';
			?>
		</div>
	</div>

	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer-m.php';
	?>
</div>

</body>
</html>

<!--	DB Close Start	-->
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/floating-m.php';
?>
<?php
include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>
<!--	DB Close End	-->