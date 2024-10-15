<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top-m.php';
?>
</head>

<body>
<div id="wrap" class="main">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb-m.php';
	?>

	<div id="container">
		<div class="main-visual-wrap">
			<div class="main-visual-swiper">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<div class="main-visual-banner" 
							style="background-image:url('/common/img/banner/1-m.jpg?ver=4');" onclick="">
						</div>
					</div>
					<div class="swiper-slide">
						<div class="main-visual-banner" 
							style="background-image:url('/common/img/banner/2-m.jpg');" onclick="">
						</div>
					</div>
					<!-- <div class="swiper-slide"> -->
						<!-- <div class="main-visual-banner"  -->
							<!-- style="background-image:url('/common/img/banner/3-m.jpg');" onclick="window.location='http://toxnfillbrow.com/m/intro/lecturer.php'"> -->
						<!-- </div> -->
					<!-- </div> -->
				</div>
				<!-- Add Pagination: 슬라이드가 한개여서 주석처리-->
				<div class="mb-width swiper-pagination"></div>
			</div>
		</div>
		<div class="main-section">
			<!-- 리뷰 -->
			<section class="review-sec">
				<div class="minframe">
					<div class="title_wrap">
						<h2 class="title">REAL REVIEW</h2>
						<span class="sub-ttl">고민 끝에 선택한 톡스앤필 브로우 아카데미 수강생들의 찐 후기</span>
					</div>
				</div>
				<div class="cont_wrap">
					<div class="cont_inner">
						<?php
							include $_SERVER['DOCUMENT_ROOT'] . '/m/commu/main_review.php';
						?>
						<div class="btn_wrap"> 
							<a class="btn btn-dark" href="https://www.toxnfillbrow.com/commu/review.php" target="_blank" title="포트폴리오 게시판">
								더 많은 후기 보러가기
							</a>
						</div>
					</div>
				</div>
				<!-- 모달팝업 -->
				<div class="modal"></div>
			</section>
			<!-- 포트폴리오 -->
			<section class="portfolio-sec">
				<div class="minframe">
					<div class="title_wrap">
						<h2 class="title">PORTFOLIO</h2>
						<span class="sub-ttl">톡스앤필 브로우 수강생 포트폴리오</span>
					</div>
					<div class="cont_wrap">
						<div class="cont_inner">
						<?php
							include $_SERVER['DOCUMENT_ROOT'] . '/m/commu/main_studentWork.php';
						?>
						</div>
						<div class="btn_wrap">
							<a class="btn btn-dark" href="https://www.toxnfillbrow.com/commu/studentWork.php" target="_blank" title="포트폴리오 게시판">
								더 많은 수강생 작품 보러가기
							</a>
						</div>
					</div>
				</div>
			</section>
			<?php
			include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/contactUs-m.php';
			?>
		</div>
	</div>

	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/floating-m.php';
	?>

	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer-m.php';
	?>
</div>


<script>
/*
 * 인터뷰/홍보영상 팝업 오픈/닫기
 * HJ
 */
 function openInterviewPop(target) {
	var popup = $('#interviewPop');
	var video = popup.find('[video-label="'+ target +'"]');
	video.addClass('on');
	popup.show();
 }
 function closeInterviewPop() {
	var popup = $('#interviewPop');
	var video = popup.find('iframe.on');
	var videoSrc = $(video).attr("src");
	$(video).attr("src",""); 
	$(video).attr("src",videoSrc);
	popup.hide();
	video.removeClass('on');
 }
</script>
<!-- Initialize Swiper -->
<script>
var mainVisualSwiper			=	new Swiper(".main-visual-swiper", { //메인 비쥬얼
	autoplay					:
	{
		delay						:	5000,
		disableOnInteraction		:	false,
	},
	loop						:	true,
	pagination					:
	{
		el							:	".main-visual-swiper .swiper-pagination",
		type						:	"progressbar",
	},
});
var programSwiper				=	new Swiper(".program2-swiper", {	//프로그램 스와이프
	autoplay					:
	{
		delay						:	5000,
		disableOnInteraction		:	false,
	},
	slidesPerView				:	1.2,
	spaceBetween				:	20, 
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.Marquee/1.6.0/jquery.marquee.min.js"></script>
</body>
</html>