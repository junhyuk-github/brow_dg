<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top-m.php';
$page_title = '톡스앤필 브로우 | 시설안내';
?>
</head>
<body>
<div id="wrap" class="">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb-m.php';
	?>
		
	<div id="container">
		<?php
		$category	=	'intro';
		include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/subTab-m.php';
		?>
		<div id="titBanner" style="background-image:url('/common/img/m/intro/banner3.png');">
			<div class="text-vertical-center">
				<div class="vertical-middle">
					<div class="minframe">
						<h2>시설안내</h2>
						<span>INTERIOR INTRODUCTION</span>
					</div>
				</div>
			</div>
		</div>

		<div class="intro-pg  interior-page">
			<section class="interior-p">
				<div class="interior-slider">
					<div class="swiper largeSwiper">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<img src="/common/img/intro/interior-th-01.jpg" />
							</div>
							<div class="swiper-slide">
								<img src="/common/img/intro/interior-th-02.jpg" />
							</div>
							<!-- <div class="swiper-slide">
								<img src="/common/img/intro/interior-th-03.jpg" />
							</div> -->
							<div class="swiper-slide">
								<img src="/common/img/intro/interior-th-04.jpg" />
							</div>
							<div class="swiper-slide">
								<img src="/common/img/intro/interior-th-05.jpg" />
							</div>
							<div class="swiper-slide">
								<img src="/common/img/intro/interior-th-06.jpg" />
							</div>
							<div class="swiper-slide">
								<img src="/common/img/intro/interior-th-07.jpg" />
							</div>
							<div class="swiper-slide">
								<img src="/common/img/intro/interior-th-08.jpg" />
							</div>
							<div class="swiper-slide">
								<img src="/common/img/intro/interior-th-09.jpg" />
							</div>
							<div class="swiper-slide">
								<img src="/common/img/intro/interior-th-10.jpg" />
							</div>
							<div class="swiper-slide">
								<img src="/common/img/intro/interior-th-11.jpg" />
							</div>
							<div class="swiper-slide">
								<img src="/common/img/intro/interior-th-12.jpg" />
							</div>
							<div class="swiper-slide">
								<img src="/common/img/intro/interior-th-13.jpg" />
							</div>
						</div>
						<div class="swiper-pagination large-pagination"></div>
					</div>
				</div>

				<div class="preview-silder">
					<div thumbsSlider="" class="swiper smallSwiper">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<img src="/common/img/intro/interior-th-01.jpg" />
							</div>
							<div class="swiper-slide">
								<img src="/common/img/intro/interior-th-02.jpg" />
							</div>
							<!-- <div class="swiper-slide">
								<img src="/common/img/intro/interior-th-03.jpg" />
							</div> -->
							<div class="swiper-slide">
								<img src="/common/img/intro/interior-th-04.jpg" />
							</div>
							<div class="swiper-slide">
								<img src="/common/img/intro/interior-th-05.jpg" />
							</div>
							<div class="swiper-slide">
								<img src="/common/img/intro/interior-th-06.jpg" />
							</div>
							<div class="swiper-slide">
								<img src="/common/img/intro/interior-th-07.jpg" />
							</div>
							<div class="swiper-slide">
								<img src="/common/img/intro/interior-th-08.jpg" />
							</div>
							<div class="swiper-slide">
								<img src="/common/img/intro/interior-th-09.jpg" />
							</div>
							<div class="swiper-slide">
								<img src="/common/img/intro/interior-th-10.jpg" />
							</div>
							<div class="swiper-slide">
								<img src="/common/img/intro/interior-th-11.jpg" />
							</div>
							<div class="swiper-slide">
								<img src="/common/img/intro/interior-th-12.jpg" />
							</div>
							<div class="swiper-slide">
								<img src="/common/img/intro/interior-th-13.jpg" />
							</div>
						</div>
					</div>
					<div class="btn-arrow">
						<div class="swiper-button-next small-button-next"></div>
						<div class="swiper-button-prev small-button-prev"></div>
					</div>
				</div>
			</section>
			<?php
			include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/contactUs-m.php';
			?>
		</div>
	</div>
</div>

<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/floating-m.php';
	?>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer-m.php';
?>
<script>
	//스와이퍼
    var smallSwiper = new Swiper(".smallSwiper", {
		slidesPerView: '3',
		centeredSlides: true,
		spaceBetween: 10,
		loop: true,
		freeMode: true,
		watchSlidesProgress: true,
		navigation: {
			nextEl: ".small-button-next",
			prevEl: ".small-button-prev",
		},
    });
    var largeSwiper = new Swiper(".largeSwiper", {
		slidesPerView : 'auto', 
		centeredSlides: true,
		spaceBetween: 20,
		loop: true,
		pagination: {
			el: ".large-pagination",
			clickable: true,
		},
		thumbs: {
			swiper: smallSwiper,
		},
    });

	// smallSwiper.controller.control = largeSwiper;
	// largeSwiper.controller.control = smallSwiper;
  </script>
</body>
</html>