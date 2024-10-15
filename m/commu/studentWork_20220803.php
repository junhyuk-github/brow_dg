<?php

$page_title = '수강생 포트폴리오 | 톡스앤필 브로우';
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

		<div class="board-list-wrap">
			<div class="maxframe">
				<ul class="thumb-list" id="contentDiv">
					<li>
						<div class="thumb-item">
							<a href="/m/commu/studentWorkView.php">
								<img src="/common/img/m/commu/st-01-m.jpg" alt="">
							</a>
							<p class="tit">
								<a href="/m/commu/studentWorkView.php" class="ellip1">7월 마스터반 수강생 작품</a>
							</p>
							<span class="date">2022.07.04</span>
						</div>
					</li>
					<li>
						<div class="thumb-item">
							<a href="/m/commu/studentWorkView.php">
								<img src="/common/img/m/commu/st-02-m.jpg" alt="">
							</a>
							<p class="tit">
								<a href="/m/commu/studentWorkView.php" class="ellip1">7월 마스터반 수강생 작품</a>
							</p>
							<span class="date">2022.07.01</span>
						</div>
					</li>
					<li>
						<div class="thumb-item">
							<a href="/m/commu/studentWorkView.php">
								<img src="/common/img/m/commu/st-03-m.jpg" alt="">
							</a>
							<p class="tit">
								<a href="/m/commu/studentWorkView.php" class="ellip1">6월 아티스트반 수강생 작품</a>
							</p>
							<span class="date">2022.06.21</span>
						</div>
					</li>
					<li>
						<div class="thumb-item">
							<a href="/m/commu/studentWorkView.php">
								<img src="/common/img/m/commu/st-05-m.jpg" alt="">
							</a>
							<p class="tit">
								<a href="/m/commu/studentWorkView.php" class="ellip1">6월 마스터반 수강생 작품</a>
							</p>
							<span class="date">2022.06.15</span>
						</div>
					</li>
					<li>
						<div class="thumb-item">
							<a href="/m/commu/studentWorkView.php">
								<img src="/common/img/m/commu/st-06-m.jpg" alt="">
							</a>
							<p class="tit">
								<a href="/m/commu/studentWorkView.php" class="ellip1">6월 마스터반 수강생 작품</a>
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
		include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/contactUs-m.php';
		?>
	</div>

	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer-m.php';
	?>
</div>

</body>
</html>


