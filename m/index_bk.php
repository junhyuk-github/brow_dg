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
			<section class="ms-1">
				<div class="minframe">
					<div class="tit-box">
						<h3><img src="/common/img/m/main/ms-tit.png" alt="UNIQUE CURRICULUM"></h3>
						<span class="ms-sub">개별 맞춤진도와 속성 교육으로 최고의 뷰티 마스터를 양성하는 독보적인 전문 커리큘럼  </span>
					</div>
					<div class="ms-cont">
						<div class="program2-swiper swiper-container">
							<div class="swiper-wrapper">
								<div class="swiper-slide" onclick="window.location='/m/curriculum/artist.php'">
									<div class="ms1-card">
										<!-- <strong>평균 3 ~ 4개월</strong> -->
										<div class="inner-bg" style="background-image:url('/common/img/m/main/class1.jpg');"></div>
										<div class="inner">
											<b>아티스트</b>
											<span>기초이론부터 실습까지 <br>
											창업 대비 반영구 전반 교육과정</span>
										</div>
									</div>
								</div>
								<div class="swiper-slide" onclick="window.location='/m/curriculum/master.php'">
									<div class="ms1-card">
										<!-- <strong>평균 4 ~ 5개월</strong> -->
										<div class="inner-bg" style="background-image:url('/common/img/m/main/class2.jpg');"></div>
										<div class="inner">
											<b>마스터</b>
											<span>아티스트 과정 + 마이크로블레이딩 <br>
											고난이도 눈썹 테크닉 <br>
											추가 교육과정</span>
										</div>
									</div>
								</div>
								<div class="swiper-slide" onclick="window.location='/m/curriculum/skatterSMP.php'">
									<div class="ms1-card">
										<div class="inner-bg" style="background-image:url('/common/img/m/main/class3.jpg');"></div>
										<div class="inner">
											<b>스카터 SMP</b>
											<span>균일한 결과물의 쉐딩 기법으로 <br>
											오토 디바이스를 활용한 <br>
											최신 두피문신 교육과정</span>
										</div>
									</div>
								</div>
								<div class="swiper-slide" onclick="window.location='/m/curriculum/mediSkincare.php'">
									<div class="ms1-card">
										<div class="inner-bg" style="background-image:url('/common/img/m/main/class4.jpg');"></div>
										<div class="inner">
											<b>메디컬 스킨케어</b>
											<span>
												피부창업을 위한 기기관리+ <br>
												스킨플래닝+MTS 실전마스터 <br>
												교육과정
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="ms-3" style="background-image:url('/common/img/m/main/banner1.jpg')" 
				onclick="">
				<h3 class="sr-only"><b>톡스앤필 뷰티아카데미</b>는 당신의 꿈을 이루어 드립니다.</h3>	
			</section>
			<section class="ms-5" style="padding-bottom: 60px;">
				<div class="minframe">
					<div class="tit-box">
						<h3><img src="/common/img/m/main/ms5-tit.png" alt="DIFFERENTIATION&SPECIALITY"></h3>
						<span class="ms-sub">차별화 & 특별함</span>
					</div>
					<ul class="row">
						<li class="col-6">
							<div class="differ-item" style="background-image:url('/common/img/m/main/differ1.jpg')">
								<p><span><b>피부&메디컬 중심</b><br/>집중교육</span></p>
							</div>
						</li>
						<li class="col-6">
							<div class="differ-item" style="background-image:url('/common/img/m/main/differ2.jpg')">
								<p><span>피부미용 국가 자격증 <br><b>수월한 취득</b></span></p>
							</div> 
						</li>
						<li class="col-6">
							<div class="differ-item" style="background-image:url('/common/img/m/main/differ3.jpg')">
								<p><span>국제 뷰티대회 시상 <br><b>스펙 더블 UP</b></span></p>
							</div>
						</li>
						<li class="col-6">
							<div class="differ-item" style="background-image:url('/common/img/m/main/differ4.jpg')">
								<p><span>졸업 후 <b>기술 업그레이드 <br>세미나</b> 진행</span></p>
							</div>
						</li>
						<li class="col-6">
							<div class="differ-item" style="background-image:url('/common/img/m/main/differ5.jpg')">
								<p><span><b>사진 촬영 기법 및</b><br>다양한 어플 편집 공유 </span></p>
							</div>
						</li>
						<li class="col-6">
							<div class="differ-item" style="background-image:url('/common/img/m/main/differ6.jpg')">
								<p><span><b>멤버쉽 카페</b> 관리로 <br>지속적인 피드백 </span></p>
							</div>
						</li>
					</ul>
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

</body>
</html>
