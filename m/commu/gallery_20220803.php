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

		<div class="board-list-wrap">
			<div class="maxframe">
				<ul class="thumb-list" id="contentDiv">
					<li>
						<div class="thumb-item">
							<a href="">
								<img src="/common/img/m/commu/pf-01-m.jpg" alt="">
							</a>
							<p class="tit">
								<a href="/m/commu/galleryView.php" class="ellip1">톡스앤필 취업후기</a>
							</p>
							<span class="date">2022.05.20</span>
						</div>
					</li>
					<li>
						<div class="thumb-item">
							<a href="">
								<img src="/common/img/m/commu/pf-02-m.jpg" alt="">
							</a>
							<p class="tit">
								<a href="/m/commu/galleryView.php" class="ellip1">톡스앤필 취업후기</a>
							</p>
							<span class="date">2021.10.18</span>
						</div>
					</li>
					<li>
						<div class="thumb-item">
							<a href="">
								<img src="/common/img/m/commu/pf-03-m.jpg" alt="">
							</a>
							<p class="tit">
								<a href="/m/commu/galleryView.php" class="ellip1">톡스앤필 취업후기</a>
							</p>
							<span class="date">2021.10.15</span>
						</div>
					</li>
					<li>
						<div class="thumb-item">
							<a href="">
								<img src="/common/img/m/commu/pf-04-m.jpg" alt="">
							</a>
							<p class="tit">
								<a href="/m/commu/galleryView.php" class="ellip1">톡스앤필 취업후기</a>
							</p>
							<span class="date">2019-12-06</span>
						</div>
					</li>
					<li>
						<div class="thumb-item">
							<a href="">
								<img src="/common/img/m/commu/pf-05-m.jpg" alt="">
							</a>
							<p class="tit">
								<a href="/m/commu/galleryView.php" class="ellip1">톡스앤필 취업후기</a>
							</p>
							<span class="date">2019-12-06</span>
						</div>
					</li>
				</ul>
			</div>
			<div class="more-btn-wrap">
				<button type="button" class="btn-more" onClick="getContentList();">MORE</button>
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

