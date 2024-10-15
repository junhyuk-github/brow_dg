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

		<div class="board-list-wrap">
			<div class="minframe">
				<ul class="event-list row" id="contentDiv">
					<li class="col-4">
						<div class="event-item">
							<a href="/commu/galleryView.php" class="img-box">
								<img src="/common/img/commu/pf-01.jpg" alt="">
							</a>
							<p class="tit">
								<a href="/commu/galleryView.php" class="ellip1">톡스앤필 취업후기</a>
							</p>
							<span class="date">2022.05.20</span>
						</div>
					</li>
					<li class="col-4">
						<div class="event-item">
							<a href="/commu/galleryView.php" class="img-box">
								<img src="/common/img/commu/pf-02.jpg" alt="">
							</a>
							<p class="tit">
								<a href="/commu/galleryView.php" class="ellip1">톡스앤필 취업후기</a>
							</p>
							<span class="date">2021.10.18</span>
						</div>
					</li>
					<li class="col-4">
						<div class="event-item">
							<a href="/commu/galleryView.php" class="img-box">
								<img src="/common/img/commu/pf-03.jpg" alt="">
							</a>
							<p class="tit">
								<a href="/commu/galleryView.php" class="ellip1">톡스앤필 취업후기</a>
							</p>
							<span class="date">2021.10.15</span>
						</div>
					</li>
					<li class="col-4">
						<div class="event-item">
							<a href="/commu/galleryView.php" class="img-box">
								<img src="/common/img/commu/pf-04.jpg" alt="">
							</a>
							<p class="tit">
								<a href="/commu/galleryView.php" class="ellip1">톡스앤필 취업후기</a>
							</p>
							<span class="date">2021.10.15</span>
						</div>
					</li>
					<li class="col-4">
						<div class="event-item">
							<a href="/commu/galleryView.php" class="img-box">
								<img src="/common/img/commu/pf-05.jpg" alt="">
							</a>
							<p class="tit">
								<a href="/commu/galleryView.php" class="ellip1">우리 수강생분들만의 특권! 톡스앤필 강남본   </a>
							</p>
							<span class="date">2021.08.20</span>
						</div>
					</li>
					<li class="col-4">
						<div class="event-item">
							<a href="/commu/galleryView.php" class="img-box">
								<img src="/common/img/commu/pf-06.jpg" alt="">
							</a>
							<p class="tit">
								<a href="/commu/galleryView.php" class="ellip1">우수수강생 포상 & 자격증 취득과정 수료</a>
							</p>
							<span class="date">2021.07.28</span>
						</div>
					</li>
				</ul>
			</div>
			<div class="more-btn-wrap">
				<button type="button" class="btn-more" onClick="getContentList();">MORE</button>
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