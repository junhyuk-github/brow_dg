<link rel="stylesheet" href="/common/css/page.css">
<?php
$page_title = 'Brow Space | 톡스앤필 브로우';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top.php';
?>
</head>

<body class="pg-detail">
<div id="wrap" class="main pg_detail">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb_main.php';
	?>

	<div id="" class="board-frame bSpace">
		<div class="thumbnail">
			<div class="thumb-title">
				<img src="/common/img/title/brow_space.png" alt="">
			</div>
		</div>
		<div class="cont-wrap">
			<div id="pgNav" class="tab-inner">
				<a href="#section1">인테리어</a>
				<a href="#section2">오시는 길</a>
			</div>
			<div id="section1" class="section">
				<div class="title-wrap text-center">
					<h1 class="title">Interior</h1>
					<span>편안하고 쾌적한 시설의 브로우 아카데미를 즐겨보세요!</span>	
				</div>
				<div class="interior slide-content">
					<div class="interior-slider">
						<div class="swiper largeSwiper">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<img src="/common/img/intro/dg-interior-th-01.jpg" />
								</div>
								<div class="swiper-slide">
									<img src="/common/img/intro/dg-interior-th-02.jpg" />
								</div>
								<div class="swiper-slide">
									<img src="/common/img/intro/dg-interior-th-03.jpg" />
								</div>
								<div class="swiper-slide">
									<img src="/common/img/intro/dg-interior-th-04.jpg" />
								</div>
								<div class="swiper-slide">
									<img src="/common/img/intro/dg-interior-th-05.jpg" />
								</div>
								<div class="swiper-slide">
									<img src="/common/img/intro/dg-interior-th-06.jpg" />
								</div>
								<div class="swiper-slide">
									<img src="/common/img/intro/dg-interior-th-07.jpg" />
								</div>
							</div>
							<div class="btn-wrap">
								<div class="swiper-button-next"></div>
								<div class="swiper-button-prev"></div>
							</div>
						</div>
						<div class="swiper-pagination"></div>
					</div>

					<div class="preview-silder">
						<div thumbsSlider="" class="swiper smallSwiper">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<img src="/common/img/intro/dg-interior-th-01.jpg" />
								</div>
								<div class="swiper-slide">
									<img src="/common/img/intro/dg-interior-th-02.jpg" />
								</div>
								<div class="swiper-slide">
									<img src="/common/img/intro/dg-interior-th-03.jpg" />
								</div>
								<div class="swiper-slide">
									<img src="/common/img/intro/dg-interior-th-04.jpg" />
								</div>
								<div class="swiper-slide">
									<img src="/common/img/intro/dg-interior-th-05.jpg" />
								</div>
								<div class="swiper-slide">
									<img src="/common/img/intro/dg-interior-th-06.jpg" />
								</div>
								<div class="swiper-slide">
									<img src="/common/img/intro/dg-interior-th-07.jpg" />
								</div>
							</div>
						</div>
						<div class="btn-arrow">
							<div class="swiper-button-next"></div>
							<div class="swiper-button-prev"></div>
						</div>
					</div>
				</div>
				<div class="banner bg-frame">
					<div class="__bg"></div>
					<div class="cont_wrap">
						<figure class="text-center">
							<img src="/common/img/main/logo-tnfBrow.png" alt="톡스앤필 브로우">
						</figure>
						<h1 class="__title text-center">교육 브랜드 대상 반영구&amp;피부 1위</h1>
						<p class="__detail text-center">
							배웠지만 까먹었다? 둘 중 하나입니다. 체계적이지 않았거나! 체득하지 못했거나! <br>
							톡스앤필 브로우 아카데미는 체계적 이론과 다양한 실습을 통해 실전 기술을 이해하고 활용할 수 있는 인재를 키웁니다.
						</p>
					</div>
				</div>
			</div>
			<div id="section2" class="section">
				<?php
				include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/map.php';
				?>
			</div>
		</div>
	</div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer-main.php';
?>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/eventPopup.php';
?>

<script>
	// 탭메뉴 스크롤 시 픽스
	function handleScroll() {
		const element = document.getElementById('pgNav');
		const scrollY = window.scrollY;

		if (scrollY > 330) { //Thumbnail - gnb
			element.classList.add('scrolled');
		} else {
			element.classList.remove('scrolled');
		}
	}

	// 스크롤 이벤트 리스너 추가
	window.addEventListener('scroll', handleScroll);
</script>

</body>
</html>

<script language="javascript">

</script>
<script>
	//스와이퍼
    var smallSwiper = new Swiper(".smallSwiper", {
		slidesPerView: 5,
		centeredSlides: true,
		spaceBetween: 20,
		loop: true,
		freeMode: true,
		watchSlidesProgress: true,
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
    });
    var largeSwiper = new Swiper(".largeSwiper", {
		slidesPerView : 'auto', 
		centeredSlides: true,
		spaceBetween: 300,
		loop: true,
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
		thumbs: {
			swiper: smallSwiper,
		},
    });

	// smallSwiper.controller.control = largeSwiper;
	// largeSwiper.controller.control = smallSwiper;
</script>

<!--	DB Close Start	-->
<?php
include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>
<!--	DB Close End	-->