<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top.php';
?>
</head>
<body>
	
<div id="wrap" class="main">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb.php';
	?>
		
	<div id="container">
		<div class="main-visual-swiper">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<div class="main-visual-wrap" 
						style="background-image:url('/common/img/banner/1-pc.jpg?ver=4'); " onclick="">
					</div>
				</div>
				<div class="swiper-slide">
					<div class="main-visual-wrap" 
						style="background-image:url('/common/img/banner/2-pc.jpg');" onclick="">
					</div>
				</div>
				<!-- <div class="swiper-slide"> -->
					<!-- <div class="main-visual-wrap"  -->
						<!-- style="background-image:url('/common/img/banner/3-pc.jpg'); cursor:pointer;" onclick="window.location='http://toxnfillbrow.com/intro/lecturer.php'"> -->
					<!-- </div> -->
				<!-- </div> -->
			</div>
			<!-- Add Pagination :슬라이드 한개여서 주석처리-->
			<div class="mb-width swiper-pagination"></div>
			<div class="swiper-btn-minframe">
				<div class="swiper-button-prev"></div>
			    <div class="swiper-button-next"></div>
			</div>
		</div>
		<div class="main-section">
			<section class="ms-1">
				<div class="minframe">
					<div class="d-flex ms1-box-area">
						<div class="ms1-box1">
							<p>교육부터 자격증, 취업/창업까지 <br>숙련된 전문가와 함께하세요.</p>
						</div>
						<div class="row ms1-box2">
							<a href="/contact/index.php" class="col-4">
								<p>
									<span>1:1 상담</span>
									<span class="icon-box">
										<img src="/common/img/main/counsel-w.png" alt="" class="normal">
										<img src="/common/img/main/counsel-b.png" alt="" class="hover">
									</span>
								</p>
							</a>
							<a href="http://pf.kakao.com/_dWCcxl" target="_blank" class="col-4">
								<p>
									<span>카톡 상담</span>
									<span class="icon-box">
										<img src="/common/img/icon/sns/kakao_w.png" alt="" class="normal">
										<img src="/common/img/icon/sns/kakao_b.png" alt="" class="hover">
									</span>
								</p>
							</a>
							<a href="/intro/map.php" class="col-4">
								<p>
									<span>오시는 길</span>
									<span class="icon-box">
										<img src="/common/img/main/loca-w.png" alt="" class="normal">
										<img src="/common/img/main/loca-b.png" alt="" class="hover">
									</span>
								</p>
							</a>
						</div>
						<div class="ms1-box3">
							<p>
								<span>대표전화</span>
								<img src="/common/img/main/call.png" alt="025544840">
							</p>
						</div>
					</div>
				</div>
			</section>
			<section class="ms-2">
				<div class="minframe">
					<div class="ms2-program2">
						<div class="ms-tit">
							<h3><img src="/common/img/main/ms1-tit.png" alt="UNIQUE CURRICULUM"></h3>
							<span class="ms-sub">개별 맞춤진도와 속성 교육으로 최고의 뷰티 마스터를 양성하는 독보적인 전문 커리큘럼</span>
						</div>
						<div class="ms-con">
							<div class="program-swiper swiper-container">
								<div class="swiper-wrapper">
									<div class="swiper-slide">
										<a href="/curriculum/artist.php" class="ms2p-box">
											<!-- <strong>평균 3 ~ 4개월</strong> -->
											<img src="/common/img/main/class1.jpg" alt="">
											<p class="ms2pb-txt">
												<b>아티스트</b>
												<span>기초이론부터 실습까지 <br>
												창업 대비 반영구 전반 교육과정</span>
											</p>
										</a>
									</div>
									<div class="swiper-slide">
										<a href="/curriculum/master.php" class="ms2p-box">
											<!-- <strong>평균 4 ~ 5개월</strong> -->
											<img src="/common/img/main/class2.jpg" alt="">
											<p class="ms2pb-txt">
												<b>마스터</b>
												<span>아티스트 과정 + 마이크로블레이딩 <br>
												고난이도 눈썹 테크닉 <br>
												추가 교육과정</span>
											</p>
										</a>
									</div>
									<div class="swiper-slide">
										<a href="/curriculum/skatterSMP.php" class="ms2p-box">
											<img src="/common/img/main/class3.jpg" alt="">
											<p class="ms2pb-txt">
												<b>스카터 SMP</b>
												<span>균일한 결과물의 쉐딩 기법으로 <br>
												오토 디바이스를 활용한 <br>
												최신 두피문신 교육과정</span>
											</p>
										</a>
									</div>
									<div class="swiper-slide">
										<a href="/curriculum/mediSkincare.php" class="ms2p-box">
											<img src="/common/img/main/class4.jpg" alt="">
											<p class="ms2pb-txt">
												<b>메디컬 스킨케어</b>
												<span>
													피부창업을 위한 기기관리+ <br>
													스킨플래닝+MTS 실전마스터 <br>
													교육과정
												</span>
											</p>
										</a>
									</div>
								</div>
							</div>
							<div class="swiper-button-prev"></div>
							<div class="swiper-button-next"></div>
						</div>
					</div>
				</div>
			</section>
			<section class="ms-3">
				<div class="minframe">
					<div class="ms3-bg" style="background-image:url('/common/img/main/banner1.jpg')" onclick="">
					</div>
				</div>
			</section>
			<section class="ms-5">
				<div class="ms-tit">
					<h3><img src="/common/img/main/ms5-tit.jpg" alt="DIFFERENTIATION&SPECIALITY"></h3>
					<span class="ms-sub"><span>차별화 & 특별함</span></span>
				</div>
				<div class="minframe">
					<ul class="row">
						<li class="col-4">
							<div class="differ-item" style="background-image:url('/common/img/main/differ1.jpg')">
								<p><span><b>피부&메디컬 중심</b><br/>집중교육</span></p>
							</div>
						</li>
						<li class="col-4">
							<div class="differ-item" style="background-image:url('/common/img/main/differ2.jpg')">
								<p><span>피부미용 국가 자격증<br/><b>수월한 취득</b></span></p>
							</div> 
						</li>
						<li class="col-4">
							<div class="differ-item" style="background-image:url('/common/img/main/differ3.jpg')">
								<p><span>국제 뷰티대회 시상<br/><b>스펙 더블 UP</b></span></p>
							</div>
						</li>
						<li class="col-4">
							<div class="differ-item" style="background-image:url('/common/img/main/differ4.jpg')">
								<p><span>졸업 후 <b>기술 업그레이드<br/>세미나</b> 진행</span></p>
							</div>
						</li>
						<li class="col-4">
							<div class="differ-item" style="background-image:url('/common/img/main/differ5.jpg')">
								<p><span><b>사진 촬영 기법</b> 및 <br>다양한 어플 편집 공유</span></p>
							</div>
						</li>
						<li class="col-4">
							<div class="differ-item" style="background-image:url('/common/img/main/differ6.jpg')">
								<p><span><b>멤버쉽 카페</b> 관리로<br/>지속적인 피드백</span></p>
							</div>
						</li>
					</ul>
				</div>
			</section>
			<?php
			include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/contactUs.php';
			?>
		</div>
	</div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer.php';
?>
<script>
/*
 * 인터뷰 팝업 오픈/닫기
 * HJ
 */
 function openInterviewPop(target) {
	var popup = $('#interviewPop');
	var video = popup.find('[video-label="'+ target +'"]');
	popup.show();
	video.addClass('on');
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
var mainVisualSwiper	=	new Swiper(".main-visual-swiper", { //메인배너 스와이프
	autoplay:{
		delay					:	5000,
		disableOnInteraction	:	false,
	},
	loop						:	true,
	pagination	:{
		el						:	".main-visual-swiper .swiper-pagination",
		type					:	"progressbar",
	},
	navigation: {
		nextEl: '.main-visual-swiper .swiper-button-next',
		prevEl: '.main-visual-swiper .swiper-button-prev',
	},
});
var programSwiper	=	new Swiper(".program-swiper", { //프로그램 스와이프
	autoplay:{
		delay					:	5000,
		disableOnInteraction	:	false,
	},
	loop						:	true,
	allowTouchMove				:	false,
	slidesPerView				:	3,
	spaceBetween				:	20,
	navigation: {
		nextEl: '.ms2-program2 .swiper-button-next',
		prevEl: '.ms2-program2 .swiper-button-prev',
	},
});
</script>


</body>
</html>