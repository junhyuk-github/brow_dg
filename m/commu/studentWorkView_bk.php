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
		<div id="titBanner" style="background-image:url('/common/img/m/commu/banner6.jpg');">
			<div class="text-vertical-center">
				<div class="vertical-middle">
					<div class="minframe">
						<h2>수강생 포트폴리오</h2>
						<span>STUDENT PORTFOLIO</span>
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