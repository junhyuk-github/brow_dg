<?php
$page_title = '갤러리 | 톡스앤필 브로우';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top.php';

?>
</head>

<body>

<div id="wrap" class="">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb.php';
	?>

	<div id="container">
		<div id="titBanner" style="background-image:url('/common/img/commu/banner3.jpg');">
			<div class="minframe text-vertical-center">
				<div class="vertical-middle">
					<h2>갤러리</h2>
					<span>GALLERY</span>
				</div>
			</div>
		</div>

		<div id="VP" class="board-view-wrap">
			<div class="minframe">
				<div class="view-tit">
					<h3>톡스앤필 취업후기</h3>
					<span>2022.05.20 </span>
				</div>
				<div class="view-body">
					<img src="/common/img/commu/gelleryView-01.jpg" alt="">
					<img src="/common/img/commu/gelleryView-02.jpg" alt="">
				</div>
				<div class="pg-his">
					<div class="pg-item">
						<span>이전글</span>
						<p class="eillip1">
							<a href="/commu/galleryView.php" class="eillip1">톡스앤필 취업후기</a>
						</p>
					</div>
					<div class="pg-item">
						<span>다음글</span>
						<p class="eillip1">
							<a href="/commu/galleryView.php" class="eillip1">톡스앤필 취업후기</a>
						</p>
					</div>
				</div>
			</div>

			<div class="more-btn-wrap">
				<button type="button" class="btn-more" onclick="window.location='/commu/gallery.php?pno=1'">목록</button>
			</div>
		</div>

		<?php
		include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/contactUs.php';
		?>
	</div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer.php';
?>
</body>
</html>

<!--	DB Close Start	-->
<?php
include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>
<!--	DB Close End	-->