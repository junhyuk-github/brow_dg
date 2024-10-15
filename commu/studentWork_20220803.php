<?php

$page_title = '수강생 포트폴리오 | 톡스앤필 브로우';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top.php';

?>

</head>

<body>
<div id="wrap" class="">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb.php';
	?>

	<div id="container">
		<div id="titBanner" style="background-image:url('/common/img/commu/banner6.jpg');">
			<div class="minframe text-vertical-center">
				<div class="vertical-middle">
					<h2>수강생 포트폴리오</h2>
					<span>STUDENT PORTFOLIO</span>
				</div>
			</div>
		</div>

		<div class="board-list-wrap">
			<div class="minframe">
				<ul class="event-list row" id="contentDiv">
					<li class="col-4">
						<div class="event-item">
							<a href="/commu/studentWorkView.php" class="img-box">
								<img src="/common/img/commu/st-01.jpg" alt="">
							</a>
							<p class="tit">
								<a href="/commu/studentWorkView.php" class="ellip1">7월 마스터반 수강생 작품</a>
							</p>
							<span class="date">2022.07.04</span>
						</div>
					</li>
					<li class="col-4">
						<div class="event-item">
							<a href="/commu/studentWorkView.php" class="img-box">
								<img src="/common/img/commu/st-02.jpg" alt="">
							</a>
							<p class="tit">
								<a href="/commu/studentWorkView.php" class="ellip1">7월 마스터반 수강생 작품</a>
							</p>
							<span class="date">2022.07.01</span>
						</div>
					</li>
					<li class="col-4">
						<div class="event-item">
							<a href="/commu/studentWorkView.php" class="img-box">
								<img src="/common/img/commu/st-03.jpg" alt="">
							</a>
							<p class="tit">
								<a href="/commu/studentWorkView.php" class="ellip1">6월 아티스트반 수강생 작품</a>
							</p>
							<span class="date">2022.06.21</span>
						</div>
					</li>
					<li class="col-4">
						<div class="event-item">
							<a href="/commu/studentWorkView.php" class="img-box">
								<img src="/common/img/commu/st-03.jpg" alt="">
							</a>
							<p class="tit">
								<a href="/commu/studentWorkView.php" class="ellip1">6월 아티스트반 수강생 작품</a>
							</p>
							<span class="date">2022.06.21</span>
						</div>
					</li>
					<li class="col-4">
						<div class="event-item">
							<a href="/commu/studentWorkView.php" class="img-box">
								<img src="/common/img/commu/st-05.jpg" alt="">
							</a>
							<p class="tit">
								<a href="/commu/studentWorkView.php" class="ellip1">6월 마스터반 수강생 작품</a>
							</p>
							<span class="date">2022.06.15</span>
						</div>
					</li>
					<li class="col-4">
						<div class="event-item">
							<a href="/commu/studentWorkView.php" class="img-box">
								<img src="/common/img/commu/st-06.jpg" alt="">
							</a>
							<p class="tit">
								<a href="/commu/studentWorkView.php" class="ellip1">6월 마스터반 수강생 작품</a>
							</p>
							<span class="date">2022.06.10</span>
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

