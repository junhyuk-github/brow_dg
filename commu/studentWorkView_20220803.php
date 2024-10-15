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

		<div id="VP" class="board-view-wrap">
			<div class="minframe">
				<div class="view-tit">
					<h3>7월 마스터반 수강생 작품</h3>
					<span>2022.07.04</span>
				</div>
				<div class="view-body">
					<img src="/common/img/commu/pfView-01.jpg" alt="">
				</div>

				<div class="pg-his">
					<div class="pg-item">
						<span>이전글</span>
						<p class="eillip1">
							<!-- 1.이전글이 없는경우 
							<span>이전글이 없습니다.</span>
							-->
							<!-- 2. 있는 경우 -->
							<a href="/commu/studentWorkView.php" class="eillip1">7월 마스터반 수강생 작품</a>
						</p>
					</div>
					<div class="pg-item">
						<span>다음글</span>
						<p class="eillip1">
							<!-- 1.다음글이 없는경우 
							<span>다음글이 없습니다.</span>
							-->
							<!-- 2. 있는 경우 -->
							<a href="/commu/studentWorkView.php" class="eillip1">7월 마스터반 수강생 작품</a>
						</p>
					</div>
				</div>
			</div>

			<div class="more-btn-wrap">
				<button type="button" class="btn-more" onclick="window.location='/commu/studentWork.php'">목록</button>
			</div>
		</div>s

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

