<?php
$page_title = '갤러리 | 톡스앤필 브로우';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top-m.php';

?>

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
			<div class="minframe">
				<div class="view-tit">
					<h3>톡스앤필 취업후기</h3>
					<span>2022.05.20</span>
				</div>
				<div class="view-body">
					<img src="/common/img/m/commu/gelleryView-01.jpg" alt="">
					<img src="/common/img/m/commu/gelleryView-02.jpg" alt="">
				</div>
				<div class="pg-his">
					<div class="pg-item">
						<span>이전글</span>
						<p class="eillip1">
							<!-- 1.이전글이 없는경우 
							<span>이전글이 없습니다.</span>
							-->
							<!-- 2. 있는 경우 -->
							<a href="/m/commu/galleryView.php" class="eillip1">톡스앤필 취업후기</a>
						</p>
					</div>
					<div class="pg-item">
						<span>다음글</span>
						<p class="eillip1">
							<!-- 1.다음글이 없는경우 
							<span>다음글이 없습니다.</span>
							-->
							<!-- 2. 있는 경우 -->
							<a href="/m/commu/galleryView.php" class="eillip1">톡스앤필 취업후기</a>
						</p>
					</div>
				</div>
			</div>

			<div class="more-btn-wrap">
				<button type="button" class="btn-more" onclick="window.location='/m/commu/gallery.php'">목록</button>
			</div>
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

