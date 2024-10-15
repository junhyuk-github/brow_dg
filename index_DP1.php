<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top.php';
?>
</head>
<body>
	
<div id="wrap" class="main">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb_main.php';
	?>
	<main class="">
		<section id="scroll-section-0" class="sc-video-bg">
			<div class="sticky-wrap">
				<div class="sticky-elem-bg">
					<div id="mainBannerVideo">
						<video autoplay loop muted>
						  <source src="/common/img/main/thumb-video.mp4" type="video/mp4">
						  Your browser does not support the video tag.
						</video>
					</div>
					<div class="cate-wrap">
						<div class="logo">
							<img src="/common/img/main/thumb-cate.png" alt="카테고리">
							<p>
								원하시는 서비스를 선택해 주세요.
							</p>
						</div>
						<div class="cate-menu">
							<a class="btn-cate" href="/contact/index.php">
								<figure>
									<img src="/common/img/main/thumb-cate1.png" alt="상담 신청">
								</figure>
								<span>상담 신청</span>
							</a>
							<a class="btn-cate" href="javascript:alert('준비중입니다.');">
								<figure>
									<img src="/common/img/main/thumb-cate2.png" alt="이벤트">
								</figure>
								<span>이벤트</span>
							</a>
							<a class="btn-cate" href="javascript:alert('준비중입니다.');">
								<figure>
									<img src="/common/img/main/thumb-cate3.png" alt="수강 커리큘럼">
								</figure>
								<span>수강 커리큘럼</span>
							</a>
							<a class="btn-cate" href="/intro/map.php">
								<figure>
									<img src="/common/img/main/thumb-cate4.png" alt="오시는길">
								</figure>
								<span>오시는길</span>
							</a>
						</div>
					</div>
				</div>
				<!--
				<div class="bm-title">
					<span class="sticky-elem fadeinleft bgtxt1">
						test left
					</span>
					<div class="sticky-elem fadeinright bgtxt2">
						test right
					</div>
				</div>
				-->
				<div class="video-wrap">
					<div class="video-area">
						<figure class="text-center">
							<img src="/common/img/main/thumb-logo-01.png" alt="톡스앤필 브로우">
						</figure>
						<p class="thumb-txt text-center">
							<span>탈모인들의 놀이터.</span>
							탈모인들이 맘편히 어울리고 쉴 수 있는 놀이터 '톡스앤필 브로우' 아카데미
						</p>
					</div>
				</div>
				<div class="video-wrap2">
					<div class="video-area">
						<figure class="text-center">
							<img src="/common/img/main/thumb-logo-02.png" alt="톡스앤필 브로우">
						</figure>
						<p class="thumb-txt text-center">
							체계적인 교육 시스템과 트렌드를 앞장서는 '톡스앤필'이라는 네임벨류의 뷰티아카데미의 시작!
							톡스앤필 브로우는 SMP(두피문신)와 반영구 교육으로 
							뷰티시장에 새로운 바람을 불러옵니다.
						</p>
					</div>
				</div>
				<div class="video-wrap3">
					<div class="video-area">
						<figure class="text-center">
							<img src="/common/img/main/thumb-logo-03.png" alt="톡스앤필 브로우">
						</figure>
						<p class="thumb-txt text-center">
							체계적인 선진 기술과 교육 시스템, 그리고 인체학적인 디자인으로 
							탈모인들의 고충을 해결할 수 있는 인재들을 양성하는 
							'톡스앤필 브로우' 아카데미입니다. 
						</p>
					</div>
				</div>
			</div>
		</section>
		<section id="scroll-section-1" class="sec-review">
			<div class="maxframe">
				<div class="title_wrap minframe">
					<h1 class="title"><img src="/common/img/main/logo-review.png" alt="수강생 후기"></h1>
					<span class="sub-ttl">고민 끝에 선택한 톡스앤필 브로우 아카데미 수강생들의 찐 후기</span>
				</div>
				<div class="cont_wrap">
					<?php
						include $_SERVER['DOCUMENT_ROOT'] . '/commu/main_review.php';
					?>
					<div class="pop_review"></div>
					<div class="btn_wrap text-center">
						<a href="/commu/review.php" class="btn-more">더 많은 후기 보러가기</a>
					</div>
				</div>
			</div>
		</section>
		<section id="scroll-section-2" class="sec-tech">
			<div class="cont_wrap">
				<div class="cont_inner" id="tech1">
					<div class="cont">
						<figure class="tech-name">
							<img src="/common/img/main/tech-smp.png" alt="SMP">
						</figure>
						<div class="tech-detail">
							아주 미세한 마이크로바늘을 이용해 
							두피에 점을 찍어 실제 모근과 흡사하게 
							표현해내는 두피 문신의 베이스 기법
							<a class="btn-read" href="javascript:alert('준비중입니다.');">
								<img class="img-read" src="/common/img/main/logo-read.png" alt="Read More">
								<img  class="img-read2"src="/common/img/main/logo-read2.png" alt="Read More">
							</a>
						</div>
					</div>
				</div>
				<div class="cont_inner" id="tech2">
					<div class="cont">
						<figure class="tech-name">
							<img src="/common/img/main/tech-tsmp.png" alt="SMP">
						</figure>
						<div class="tech-detail">
							점보다 더 어둡고 입체적으로 
							컬을 표현하여 자연스러운 짧은 모발을 
							연출하는 고난도 기법
							<a class="btn-read" href="javascript:alert('준비중입니다.');">
								<img class="img-read" src="/common/img/main/logo-read.png" alt="Read More">
								<img  class="img-read2"src="/common/img/main/logo-read2.png" alt="Read More">
							</a>
						</div>
					</div>
				</div>
				<div class="cont_inner" id="tech3">
					<div class="cont">
						<figure class="tech-name">
							<img class="img-special" src="/common/img/main/tech-special.png" alt="special">
							<img src="/common/img/main/tech-4d.png" alt="SMP">
						</figure>
						<div class="tech-detail">
							두피 상태부터 고객 생활 패턴까지 감안하는  
							인체공학적 디자인으로 황금비율 결과를 만드는 
							톡스앤필 브로우만의 4D 헤어라인 디자인 교육
							<a class="btn-read" href="javascript:alert('준비중입니다.');">
								<img class="img-read" src="/common/img/main/logo-read.png" alt="Read More">
								<img  class="img-read2"src="/common/img/main/logo-read2.png" alt="Read More">
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="scroll-section-3" class="sec-curri">
			<div class="maxframe">
				<div class="text-center">
					<img src="/common/img/main/logo-curri.png" alt="커리큘럼">
				</div>
				<div class="curri-tab-menu minframe">
				  <button class="tab-btn active" data-target="curriA">SMP 베이직 클래스</button>
				  <button class="tab-btn" data-target="curriB">SMP 창업 클래스</button>
				  <button class="tab-btn" data-target="curriC">SMP 속성 클래스</button>
				  <button class="tab-btn" data-target="curriD">TSMP 심화 클래스</button>
				  <button class="tab-btn" data-target="curriE">팜므 SMP 숱채움 마스터 클래스</button>
				  <button class="tab-btn" data-target="curriF">SMP ALL 마스터 클래스</button>
				  <button class="tab-btn" data-target="curriG">사후 과정</button>
				</div>
				<div class="curriSwiper">
					<div class="swiper-wrapper">
					  <div class="swiper-slide" role="curriA">
						<div class="item_wrap">
							<div class="item-img">
								<figure class="img-frame">
									<img src="/common/img/main/curri-smp-basic.jpg" alt="커리큘럼">
								</figure>
								<a class="btn-read" href="javascript:alert('준비중입니다.');">
									<img class="img-read" src="/common/img/main/logo-read-w.png" alt="Read More">
									<img  class="img-read2"src="/common/img/main/logo-read2-w.png" alt="Read More">
								</a>
							</div>
							<div class="item-detail">
								<div class="__title">
									SMP 베이직 클래스
								</div>
								<p class="__detail">
									SMP의 가장 기본인 정통 기술의 교육
									이론과 실습을 통해 숱채움 삭발 디자인의
									모든 것을 배울 수 있는 클래스
								</p>
							</div>
						</div>
					  </div>
					  <div class="swiper-slide" role="curriB">
						<div class="item_wrap">
							<div class="item-img">
								<figure class="img-frame">
									<img src="/common/img/main/curri-smp-founded.jpg" alt="커리큘럼">
								</figure>
								<a class="btn-read" href="javascript:alert('준비중입니다.');">
									<img class="img-read" src="/common/img/main/logo-read-w.png" alt="Read More">
									<img  class="img-read2"src="/common/img/main/logo-read2-w.png" alt="Read More">
								</a>
							</div>
							<div class="item-detail">
								<div class="__title">
									SMP 창업 클래스
								</div>
								<p class="__detail">
									SMP 마스터 과정 수료 후 마케팅 + 보정 법
									추가 실습을 하면서 속성 창업을 위한 클래스
								</p>
							</div>
						</div>
					  </div>
					  <div class="swiper-slide" role="curriC">
						<div class="item_wrap">
							<div class="item-img">
								<figure class="img-frame">
									<img src="/common/img/main/curri-smp-speed.jpg" alt="커리큘럼">
								</figure>
								<a class="btn-read" href="javascript:alert('준비중입니다.');">
									<img class="img-read" src="/common/img/main/logo-read-w.png" alt="Read More">
									<img  class="img-read2"src="/common/img/main/logo-read2-w.png" alt="Read More">
								</a>
							</div>
							<div class="item-detail">
								<div class="__title">
									SMP 속성 클래스
								</div>
								<p class="__detail">
									타업체 수료를 통해 기본적인 지식은 있으나
									톡스앤필SMP만의 자체 기술 습득을 위한 클래스
								</p>
							</div>
						</div>
					  </div>
					  <div class="swiper-slide" role="curriD">
						<div class="item_wrap">
							<div class="item-img">
								<figure class="img-frame">
									<img src="/common/img/main/curri-asmp-strength.jpg" alt="커리큘럼">
								</figure>
								<a class="btn-read" href="javascript:alert('준비중입니다.');">
									<img class="img-read" src="/common/img/main/logo-read-w.png" alt="Read More">
									<img  class="img-read2"src="/common/img/main/logo-read2-w.png" alt="Read More">
								</a>
							</div>
							<div class="item-detail">
								<div class="__title">
									TSMP 심화 클래스
								</div>
								<p class="__detail">
									SMP의 심화 과정으로 점이 아닌 컬 표현의 하이테크닉 기술로 심도 있는 교육을 통해 삭발디자인의 입체감을 표현하는 수업
								</p>
							</div>
						</div>
					  </div>
					  <div class="swiper-slide" role="curriE">
						<div class="item_wrap">
							<div class="item-img">
								<figure class="img-frame">
									<img src="/common/img/main/curri-femme-smp.jpg" alt="커리큘럼">
								</figure>
								<a class="btn-read" href="javascript:alert('준비중입니다.');">
									<img class="img-read" src="/common/img/main/logo-read-w.png" alt="Read More">
									<img  class="img-read2"src="/common/img/main/logo-read2-w.png" alt="Read More">
								</a>
							</div>
							<div class="item-detail">
								<div class="__title">
									팜므 SMP 숱채움 마스터 클래스
								</div>
								<p class="__detail">
									정통 SMP 기술을 통해 팜므(여성) 밀도 보강, 숱채움 만을 집중 교육 받을 수 있는 클래스
								</p>
							</div>
						</div>
					  </div>
					  <div class="swiper-slide" role="curriF">
						<div class="item_wrap">
							<div class="item-img">
								<figure class="img-frame">
									<img src="/common/img/main/curri-smp-all-master.jpg" alt="커리큘럼">
								</figure>
								<a class="btn-read" href="javascript:alert('준비중입니다.');">
									<img class="img-read" src="/common/img/main/logo-read-w.png" alt="Read More">
									<img  class="img-read2"src="/common/img/main/logo-read2-w.png" alt="Read More">
								</a>
							</div>
							<div class="item-detail">
								<div class="__title">
									SMP ALL 마스터 클래스
								</div>
								<p class="__detail">
									SMP 기본이 되는 정통의 모든 과정과 심화 과정 ASMP를 모두 배울 수 있는 클래스
								</p>
							</div>
						</div>
					  </div>
					  <div class="swiper-slide" role="curriG">
						<div class="item_wrap">
							<div class="item-img">
								<figure class="img-frame">
									<img src="/common/img/main/curri-after-care.jpg" alt="커리큘럼">
								</figure>
								<a class="btn-read" href="javascript:alert('준비중입니다.');">
									<img class="img-read" src="/common/img/main/logo-read-w.png" alt="Read More">
									<img  class="img-read2"src="/common/img/main/logo-read2-w.png" alt="Read More">
								</a>
							</div>
							<div class="item-detail">
								<div class="__title">
									사후 과정
								</div>
								<p class="__detail">
									멘토참여, 대회참여, 세미나참여, 공간지원, 부자재 염가제공
								</p>
							</div>
						</div>
					  </div>
					</div>
					<div class="curri-btn text-center">
						<div class="swiper-button-prev"></div>
						<div class="swiper-button-next"></div>
					</div>
				</div>
			</div>
		</section>
		<section id="scroll-section-4" class="sec-portfolio">
			<div class="minframe">
				<div class="title_wrap">
					<h1 class="title"><img src="/common/img/main/logo-portfolio.png" alt="수강생 포트폴리오"></h1>
					<span class="sub-ttl">톡스앤필 브로우 수강생 포트폴리오</span>
				</div>
				<?php
					include $_SERVER['DOCUMENT_ROOT'] . '/commu/main_studentWork.php';
				?>
				<div class="btn_wrap text-center">
					<a href="/commu/studentWork.php" class="btn-more">더 많은 수강생 작품 보러가기</a>
				</div>
			</div>
		</section>
		<section id="scroll-section-5" class="sec-banner">
			<div class="bg-frame">
				<div class="__bg"></div>
				<div class="cont_wrap">
					<figure class="text-center">
						<img src="/common/img/main/logo-tnfBrow.png" alt="톡스앤필 브로우">
					</figure>
					<h1 class="__title text-center">교육 브랜드 대상 반영구&피부 1위</h1>
					<p class="__detail text-center">
						배웠지만 까먹었다? 둘 중 하나입니다. 체계적이지 않았거나! 체득하지 못했거나! <br>
						톡스앤필 브로우 아카데미는 체계적 이론과 다양한 실습을 통해 실전 기술을 이해하고 활용할 수 있는 인재를 키웁니다.
					</p>
				</div>
			</div>
		</section>
		<section id="scroll-section-6" class="sec-map">
			<div class="map_wrap">
				<div class="map-area">
					<div id="map" style="width:100%;height:100%;"></div>
					<script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=ivvlg84ssn"></script>
					<script>
					var map = new naver.maps.Map('map', {
						useStyleMap		:	true,
						center			:	new naver.maps.LatLng(37.499437032308876, 127.0276304140299),
						zoom			:	15,
						draggable		:	false,
						pinchZoom		:	false,
						scrollWheel		:	false,
						keyboardShortcuts:	false,
						disableDoubleTapZoom: true,
						disableDoubleClickZoom: true,
						disableTwoFingerTapZoom: true
					});

					var marker = new naver.maps.Marker({
						useStyleMap		:	true,
						position		:	new naver.maps.LatLng(37.499437032308876, 127.0276304140299),
						map				:	map
					});

					$("#map").on("click",function(e){
						e.preventDefault();

						map.setOptions({
							draggable	:	true,
							pinchZoom	:	true,
							scrollWheel	:	true,
							keyboardShortcuts: true,
							disableDoubleTapZoom: false,
							disableDoubleClickZoom: false,
							disableTwoFingerTapZoom: false
						});
					});
					</script>
				</div>
				<div class="contact_info">
					<div class="detail">
						<figure class="text-center">
							<img src="/common/img/main/logo-map.png" alt="contact us">
						</figure>
						<p class="__txt text-center">전화 또는 카카오톡으로 문의 주시면 친절한 상담 도와드리겠습니다.</p>
						<div class="__info">
							<div>
								<figure class="img-wrap"><img src="/common/img/main/icon/i-tell.png" alt="contact us"></figure>
								<span>02-554-4842</span>
							</div>
							<div>
								<figure class="img-wrap"><img src="/common/img/main/icon/i-kakao.png" alt="contact us"></figure>
								<span>톡스앤필 브로우 <a class="btn-kakao" href="https://pf.kakao.com/_dWCcxl" target="_blank">상담하기</a></span>
							</div>
							<div>
								<figure class="img-wrap"><img src="/common/img/main/icon/i-time.png" alt="contact us"></figure>
								<span>10:30~18:30</span>
							</div>
							<div>
								<figure class="img-wrap"><img src="/common/img/main/icon/i-place.png" alt="contact us"></figure>
								<span>서울특별시 강남구 테헤란로 1길 17, 6층 <br> 신분당선/2호선 강남역 11번 출구에서 도보 2분</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer-main.php';
?>

<script src="/common/js/main-scroll-ui.js"></script>
<!-- Rolling CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.Marquee/1.6.0/jquery.marquee.min.js"></script>

<script>
	//수강생후기 팝업생성
	$(document).on('click', '.sec-review .item', function(e){
	  e.preventDefault();
	  $('body').addClass('scrollLock'); 
	  $('.pop_review').addClass('popActive');
	});
	$(document).on('click', '.popUp_wrap .btn-close', function(e){
	  e.preventDefault();
	  $('body').removeClass('scrollLock'); 
	  $('.pop_review').removeClass('popActive');
	});

	//테크닉
	$(document).on('mouseenter', '#tech1', function(e){
	  $('.sec-tech').addClass('tech1Ac');
	});
	$(document).on('mouseenter', '#tech2', function(e){
	  $('.sec-tech').addClass('tech2Ac');
	});
	$(document).on('mouseenter', '#tech3', function(e){
	  $('.sec-tech').addClass('tech3Ac');
	});
	$(document).on('mouseleave', '#tech1', function(e){
	  $('.sec-tech').removeClass('tech1Ac');
	});
	$(document).on('mouseleave', '#tech2', function(e){
	  $('.sec-tech').removeClass('tech2Ac');
	});
	$(document).on('mouseleave', '#tech3', function(e){
	  $('.sec-tech').removeClass('tech3Ac');
	});

	//커리큘럼
	var curriSwiper = new Swiper(".curriSwiper", {
      slidesPerView: 2.1,
      spaceBetween: 10,
	  loop: true,
	  loopAdditionalSlides: 1,
	  centeredSlides: true,
	  autoplay: {
		delay: 4000,
		disableOnInteraction: false,
	  },
	  navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });

	//탭메뉴
	var $tabBtns = $('.curri-tab-menu .tab-btn');
	$tabBtns.on('click', function() {
	  var target = $(this).data('target');
	  var index = $tabBtns.index(this);

	  curriSwiper.slideToLoop(index);
	  $tabBtns.removeClass('active');
	  $(this).addClass('active');
	});

	curriSwiper.on('slideChange', function() {
	  var activeIndex = curriSwiper.realIndex;
	  $tabBtns.removeClass('active');
	  $tabBtns.eq(activeIndex).addClass('active');
	});
</script>
</body>
</html>