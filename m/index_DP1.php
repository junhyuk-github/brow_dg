<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top-m.php';
?>
</head>

<body class="main">
<div id="wrap">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb-m.php';
	?>
	<main id="container" class="main-section">
		<!-- 메인배너 -->
		<section id="scroll-section-0" class="sc-video-bg">
			<div class="sticky-elem-bg">
				<div id="mainBannerVideo">
					<video autoplay loop muted playsinline>
						<source src="/common/img/m/main-video.mp4" type="video/mp4">
					</video>
				</div>
			</div>
			<div class="sticky-elem main-message a">
				<div class="txt_box">
					<p class="logo-txt">
						<img src="/common/img/m/main/main_txt_01.png" alt="">
					</p>
					<p class="main-tit">
						탈모인들의 놀이터.
					</p>
					<p class="sub-tit">
						탈모인들이 맘편히 어울리고 쉴 수 있는 놀이터<br/>
						'톡스앤필 브로우' 아카데미 
					</p>
				</div>
			</div>
			<div class="sticky-elem main-message b">
				<div class="txt_box">
					<p class="logo-txt">
						<img src="/common/img/m/main/main_txt_02.png" alt="">
					</p>
					<p class="sub-tit">
						체계적인 교육 시스템과 트렌드를 앞장서는<br/>
						'톡스앤필'이라는 네임벨류의 뷰티아카데미의 시작!<br/>
						톡스앤필 브로우는 SMP(두피문신)와 반영구 교육으로<br/>
						뷰티시장에 새로운 바람을 불러옵니다.
					</p>
				</div>
			</div>
			<div class="sticky-elem main-message c">
				<div class="txt_box">
					<p class="logo-txt">
						<img src="/common/img/m/main/main_txt_03.png" alt="">
					</p>
					<p class="sub-tit">
						체계적인 교육 시스템과 트렌드를 앞장서는<br/>
						'톡스앤필'이라는 네임벨류의 뷰티아카데미의 시작!<br/>
						톡스앤필 브로우는 SMP(두피문신)와 반영구 교육으로<br/>
						뷰티시장에 새로운 바람을 불러옵니다.
					</p>
				</div>
			</div>
		</section>
		<!-- 카테고리 -->
		<section id="scroll-section-1" class="cate-sec">
			<div class="minframe">
				<div class="title_wrap left">
					<h2 class="title">CATECORY</h2>
					<span class="sub-ttl">원하시는 서비스를 선택해 주세요.</span>
				</div>
				<ul class="cate-wrap">
					<li>
						<a href="https://www.toxnfillbrow.com/contact/index.php" target="_blank" title="상담신청">
							<span class="icon">
								<img src="/common/img/m/main/i-cate01.png" alt="">
							</span>
							<span class="txt_">상담 신청</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" onclick="alert('준비중입니다.')" title="이벤트">
							<span class="icon">
								<img src="/common/img/m/main/i-cate02.png" alt="">
							</span>
							<span class="txt_">이벤트</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);" onclick="alert('준비중입니다.')" title="수강 커리큘럼">
							<span class="icon">
								<img src="/common/img/m/main/i-cate03.png" alt="">
							</span>
							<span class="txt_">수강 커리큘럼</span>
						</a>
					</li>
					<li>
						<a href="https://www.toxnfillbrow.com/intro/map.php" target="_blank" title="오시는길">
							<span class="icon">
								<img src="/common/img/m/main/i-cate04.png" alt="">
							</span>
							<span class="txt_">오시는길</span>
						</a>
					</li>
				</ul>
			</div>
		</section>
		<!-- 리뷰 -->
		<section id="scroll-section-2" class="review-sec">
			<div class="minframe">
				<div class="title_wrap">
					<h2 class="title img_">
						<img src="/common/img/m/main/real-review-tit.png" alt="">
					</h2>
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
			<div class="modal">
				<div class="modal-inner">
					<div class="info-wrap">
						<div class="info">
							<span class="sort">일반회원</span>
							<span class="name">민경아</span>
						</div>
					</div>
					<div class="desc">
						오래 고민했고, 다른 학원들도 많이 
						알아보고 결정한 톡스앤필 브로우
						예요. 자세하고 정확한 상담에 
						믿음이 가서 등록을 했어요~ 모든...
					</div>
					<button class="modal-close">
						<img src="/common/img/m/main/i-close.png" alt=""/>
					</button>
				</div>
			</div>
		</section>
		<!-- 시술소개 -->
		<section id="scroll-section-3" class="tech-sec">
			<div class="minframe">
				<div class="title_wrap">
					<h2 class="title img_">
						<img src="/common/img/m/main/technique-tit.png" alt="">
					</h2>
				</div>
			</div>
			<div class="techSwiper">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<figure>
							<img src="/common/img/m/main/tech-bg01.jpg" alt="">
						</figure>
						<div class="txt_box">
							<p class="tit_">SMP</p>
							<p class="desc">
								아주 미세한 마이크로 바늘을 이용하여
								두피에 점을 찍어 실제 모근과 유사하게
								표현해내는 두피 문신의 베이스 기법
							</p>
							<div class="btn-rotate-wrap">
								<span class="center-icon icon">
									<img src="/common/img/m/main/i-deco-center-color.png" alt="">
								</span>
								<a class="line-icon icon" href="javascript:void(0);" onclick="alert('준비중입니다.')">
									<img class="rotate_icon__" src="/common/img/m/main/i-deco-line-color.png" alt="">
								</a>
							</div>
						</div>
						
					</div>
					<div class="swiper-slide">
						<figure>
							<img src="/common/img/m/main/tech-bg02.jpg" alt="">
						</figure>
						<div class="txt_box">
							<p class="tit_">TSMP</p>
							<p class="desc">
								점보다 더 어둡고 입체적인
								미세한 색소침착을 통해 선명하고 
								드라마틱한 모발을 연출하는 고난도 기법
							</p>
							<div class="btn-rotate-wrap">
								<span class="center-icon icon">
									<img src="/common/img/m/main/i-deco-center-color.png" alt="">
								</span>
								<a class="line-icon icon" href="javascript:void(0);" onclick="alert('준비중입니다.')">
									<img class="rotate_icon__" src="/common/img/m/main/i-deco-line-color.png" alt="">
								</a>
							</div>
						</div>
					</div>
					<div class="swiper-slide">
						<figure>
							<img src="/common/img/m/main/tech-bg03.jpg" alt="">
						</figure>
						<div class="txt_box">
							<p class="color_txt_">Special</p>
							<p class="tit_">4D Hairline Design</p>
							<p class="desc">
								두피 상태부터 고객 생활 패턴까지 감안해
								두상별 인체공학적 맞춤형 디자인을 제공하는
								톡스앤필 브로우만의 4D 헤어라인 디자인
							</p>
							<div class="btn-rotate-wrap">
								<span class="center-icon icon">
									<img src="/common/img/m/main/i-deco-center-color.png" alt="">
								</span>
								<a class="line-icon icon" href="javascript:void(0);" onclick="alert('준비중입니다.')">
									<img class="rotate_icon__" src="/common/img/m/main/i-deco-line-color.png" alt="">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- 커리큘럼 -->
		<section id="scroll-section-4" class="curriculum-sec" >
			<div class="inner" style="background-color:#000;">
				<div class="inner-frame">
					<div class="title_wrap">
						<h2 class="title img_">
							<img src="/common/img/m/main/curriculum-tit.png" alt="">
						</h2>
					</div>
					<div class="curriculSwiper">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<figure class="img__">
									<img src="/common/img/m/main/curriculum-01.jpg" alt="">
								</figure>
								<div class="txt_box_">
									<p class="tit_">
										SMP<br/>베이직 클래스
									</p>
									<p class="desc">
										SMP 베이직 클래스
										SMP의 가장 기본인 정통 기술의 교육
										이론과 실습을 통해 숱채움 삭발 디자인의
										모든 것을 배울 수 있는 클래스
									</p>
								</div>
								<div class="btn-rotate-wrap">
									<span class="center-icon icon">
										<img src="/common/img/m/main/i-deco-center.png" alt="">
									</span>
									<a class="line-icon icon" href="javascript:void(0);" onclick="alert('준비중입니다.')">
										<img class="rotate_icon__" src="/common/img/m/main/i-deco-line.png" alt="">
									</a>
								</div>
							</div>
							<div class="swiper-slide">
								<figure class="img__">
									<img src="/common/img/m/main/curriculum-02.jpg" alt="">
								</figure>
								<div class="txt_box_">
									<p class="tit_">
										SMP<br/>창업 클래스
									</p>
									<p class="desc">
										SMP마스터 과정 수료 후
										마케팅 + 보정법 추가 실습을 통해
										속성으로 창업 노하우를 습득하는 클래스
									</p>
								</div>
								<div class="btn-rotate-wrap">
									<span class="center-icon icon">
										<img src="/common/img/m/main/i-deco-center.png" alt="">
									</span>
									<a class="line-icon icon" href="javascript:void(0);" onclick="alert('준비중입니다.')">
										<img class="rotate_icon__" src="/common/img/m/main/i-deco-line.png" alt="">
									</a>
								</div>
							</div>
							<div class="swiper-slide">
								<figure class="img__">
									<img src="/common/img/m/main/curriculum-03.jpg" alt="">
								</figure>
								<div class="txt_box_">
									<p class="tit_">
										SMP<br/>속성 클래스
									</p>
									<p class="desc">
										타 업체 교육과정 수료를 통해
										기본적인 지식이 있는 교육생들을 대상으로 한
										톡스앤필 SMP의 자체 기술 습득을 위한 클래스
									</p>
								</div>
								<div class="btn-rotate-wrap">
									<span class="center-icon icon">
										<img src="/common/img/m/main/i-deco-center.png" alt="">
									</span>
									<a class="line-icon icon" href="javascript:void(0);" onclick="alert('준비중입니다.')">
										<img class="rotate_icon__" src="/common/img/m/main/i-deco-line.png" alt="">
									</a>
								</div>
							</div>
							<div class="swiper-slide">
								<figure class="img__">
									<img src="/common/img/m/main/curriculum-04.jpg" alt="">
								</figure>
								<div class="txt_box_">
									<p class="tit_">
										TSMP<br/>심화 클래스
									</p>
									<p class="desc">
										점이 아닌 컬 표현의 하이테크닉 기술과 
										삭발디자인의 입체감 표현법을 배울 수 있는 
										심도 깊은 SMP 심화 클래스
									</p>
								</div>
								<div class="btn-rotate-wrap">
									<span class="center-icon icon">
										<img src="/common/img/m/main/i-deco-center.png" alt="">
									</span>
									<a class="line-icon icon" href="javascript:void(0);" onclick="alert('준비중입니다.')">
										<img class="rotate_icon__" src="/common/img/m/main/i-deco-line.png" alt="">
									</a>
								</div>
							</div>
							<div class="swiper-slide">
								<figure class="img__">
									<img src="/common/img/m/main/curriculum-05.jpg" alt="">
								</figure>
								<div class="txt_box_">
									<p class="tit_">
										팜므 SMP<br/>숱채움 마스터 클래스
									</p>
									<p class="desc">
										정통 SMP 기술을 통해
										팜므(여성) 밀도 보강, 숱채움만을 위한
										집중 교육을 받을 수 있는 클래스
									</p>
								</div>
								<div class="btn-rotate-wrap">
									<span class="center-icon icon">
										<img src="/common/img/m/main/i-deco-center.png" alt="">
									</span>
									<a class="line-icon icon" href="javascript:void(0);" onclick="alert('준비중입니다.')">
										<img class="rotate_icon__" src="/common/img/m/main/i-deco-line.png" alt="">
									</a>
								</div>
							</div>
							<div class="swiper-slide">
								<figure class="img__">
									<img src="/common/img/m/main/curriculum-06.jpg" alt="">
								</figure>
								<div class="txt_box_">
									<p class="tit_">
										SMP ALL<br/>마스터 클래스
									</p>
									<p class="desc">
										SMP의 기본이 되는 모든 정통 과정 및
										심화과정 TSMP를
										모두 배울 수 있는 클래스
									</p>
								</div>
								<div class="btn-rotate-wrap">
									<span class="center-icon icon">
										<img src="/common/img/m/main/i-deco-center.png" alt="">
									</span>
									<a class="line-icon icon" href="javascript:void(0);" onclick="alert('준비중입니다.')">
										<img class="rotate_icon__" src="/common/img/m/main/i-deco-line.png" alt="">
									</a>
								</div>
							</div>
							<div class="swiper-slide">
								<figure class="img__">
									<img src="/common/img/m/main/curriculum-07.jpg" alt="">
								</figure>
								<div class="txt_box_">
									<p class="tit_">
										사후 과정
									</p>
									<p class="desc">
										멘토참여, 대회참여, 세미나참여, 공간지원, 부자재 염가 제공
									</p>
								</div>
								<div class="btn-rotate-wrap">
									<span class="center-icon icon">
										<img src="/common/img/m/main/i-deco-center.png" alt="">
									</span>
									<a class="line-icon icon" href="javascript:void(0);" onclick="alert('준비중입니다.')">
										<img class="rotate_icon__" src="/common/img/m/main/i-deco-line.png" alt="">
									</a>
								</div>
							</div>
						</div>
						<div class="swiper-arrow-wrap">
							<div class="swiper-button-next btn-next"></div>
							<div class="swiper-button-prev btn-prev"></div>
						</div>
						<div class="swiper-pagination pagination"></div>
					</div>
				</div>
			</div>
			<p class="deco-bg">
				<img src="/common/img/m/main/deco-bg.png" alt="">
			</p>
		</section>
		<!-- 포트폴리오 -->
		<section id="scroll-section-5" class="portfolio-sec">
			<div class="minframe">
				<div class="title_wrap">
					<h2 class="title img_">
						<img src="/common/img/m/main/protfolio-tit.png" alt="">
					</h2>
					<span>톡스앤필 브로우 수강생 포트폴리오</span>
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
		<!-- 하단배너영역 -->
		<section id="scroll-section-6" class="pr-sec">
			<div class="minframe">
				<h3 class="logo">
					<img src="/common/img/m/main/tfb-logo-gray.png" alt="">
				</h3>
				<p class="tit__">교육 브랜드 대상<br/>반영구&피부 1위</p>
				<p class="desc">
					배웠지만 까먹었다? 둘 중 하나입니다. 체계적이지 않았거나! 체득하지 못했거나! 
					톡스앤필 브로우 아카데미는 체계적 이론과 다양한 실습을 통해 실전 기술을 이해하고 활용할 수 있는 인재를 키웁니다.
				</p>
			</div>
		</section>
		<?php
		include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/contactUs-m.php';
		?>
	</main>

	

	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer-m.php';
	?>
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/floating-m.php';
	?>
</div>
<script src="/common/js/main-scroll-ui-m.js"></script>

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
<!-- 테크닉 스와이퍼 -->
<script>
    var techSwiper = new Swiper(".techSwiper", {
		loop: true,
		slidesPerView: 1.2,
		spaceBetween: 10,
		centeredSlides: true,
		autoplay: {
			delay: 2500,
			disableOnInteraction: false,
		},
    });
</script>
<!-- 커리큘럼 스와이퍼 -->
<script>
    var curriculSwiper = new Swiper(".curriculSwiper", {
		spaceBetween: 20,
		autoplay: {
			delay: 2500,
			disableOnInteraction: false,
		},
		pagination: {
			el: ".curriculSwiper .pagination",
			type: "fraction",
		},
		navigation: {
			nextEl: ".curriculSwiper .btn-next",
			prevEl: ".curriculSwiper .btn-prev",
		},
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.Marquee/1.6.0/jquery.marquee.min.js"></script>


</body>
</html>
