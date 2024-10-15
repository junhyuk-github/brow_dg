<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top.php';
?>
</head>
<body>
	
<div id="wrap" class="main renewal">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb_main_bh.php';
	?>
	<main class="">
		<section id="scroll-section-0" class="sc-video-bg">
			<div class="sticky-wrap">
				<div class="sticky-elem-bg">
					<div id="mainBannerVideo">
						<video autoplay loop muted>
						  <source src="/common/img/main/231010_thumb-video.mp4" type="video/mp4">
						  Your browser does not support the video tag.
						</video>
					</div>
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
						<a class="btn-cate" href="/commu/event.php">
							<figure>
								<img src="/common/img/main/thumb-cate2.png" alt="이벤트">
							</figure>
							<span>이벤트</span>
						</a>
						<a class="btn-cate" href="/curriculum/index.php">
							<figure>
								<img src="/common/img/main/thumb-cate3.png" alt="수강 커리큘럼">
							</figure>
							<span>수강 커리큘럼</span>
						</a>
						<a class="btn-cate" href="/intro/browSpace.php">
							<figure>
								<img src="/common/img/main/thumb-cate4.png" alt="오시는길">
							</figure>
							<span>오시는길</span>
						</a>
					</div>
				</div>
				<div>
					<div class="video-wrap">
						<div class="video-area">
							<div class="_thumb-main-txt text-center">
								<p class="mb-35">거품을 뺀 가격</p>
								<div class="center-wrap">
									<img src="/common/img/main/price-190.png" alt="190">
									<span>만원!</span>
								</div>
							</div>
							<p class="_thumb-txt text-center mt-60">
								<span>터무니없는 수강료 합리적인가?</span>
								이것저것 과장된 내용이아닌!<br>
								실무에 필요한 내용만 교육합니다.
							</p>
						</div>
					</div>
					<div class="video-wrap2">
						<div class="video-area">
							<div class="_thumb-main-txt text-center">
								<p class="font-m-40">배우는데 너무 오래걸리시죠?</p>
								<div class="center-wrap">
									<p class="font-b-60"><span class="font-b-80">수강료</span>가 낮으면 <span class="font-b-80">퀄리티</span>가 낮다?</p>
								</div>
							</div>
							<p class="_thumb-txt text-center">
								체계적인 교육 시스템과 트렌드를 앞장서는 '톡스앤필'이라는 네임벨류의 뷰티아카데미의 시작!
								톡스앤필 브로우는 SMP(두피문신)와 반영구 교육으로 
								뷰티시장에 새로운 바람을 불러옵니다.
							</p>
						</div>
					</div>
					<div class="video-wrap3">
						<div class="video-area">
							<div class="_thumb-main-txt text-center">
								<p class="font-m-40">무한 참관수업 시스템</p>
								<div class="center-wrap">
									<p>같이 성장하는 <span>톡스앤필 브로우</span></p>
								</div>
							</div>
							<p class="_thumb-txt text-center">
								체계적인 선진 기술과 교육 시스템, 그리고 인체학적인 디자인으로 
								탈모인들의 고충을 해결할 수 있는 인재들을 양성하는 
								'톡스앤필 브로우' 아카데미입니다. 
							</p>
						</div>
					</div>
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
					<h1 class="__title text-center">
						단순히 기술만 배우고 끝내시겠습니까?<br>
						저희는 직업을 만들어 드립니다.
					</h1>
					<p class="__detail text-center _text-cr">
						막막한 창업, 톡스앤필 브로우 아카데미 프렌차이즈 창업이 가능하시며<br>
						국내 NO.1 톡스앤필로 취업의 기회도 열려있습니다.
					</p>
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
							<a class="btn-read" href="/introduction/index.php">
								<img class="img-read" src="/common/img/main/logo-read-renew.png" alt="Read More">
								<img  class="img-read2"src="/common/img/main/logo-read2-renew.png" alt="Read More">
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
							<a class="btn-read" href="/introduction/index.php">
								<img class="img-read" src="/common/img/main/logo-read-renew.png" alt="Read More">
								<img  class="img-read2"src="/common/img/main/logo-read2-renew.png" alt="Read More">
							</a>
						</div>
					</div>
				</div>
				<div class="cont_inner" id="tech3">
					<div class="cont">
						<figure class="tech-name">
							<img class="img-special" src="/common/img/main/tech-special-renew.png" alt="special">
							<img src="/common/img/main/tech-4d.png" alt="SMP">
						</figure>
						<div class="tech-detail">
							두피 상태부터 고객 생활 패턴까지 감안하는  
							인체공학적 디자인으로 황금비율 결과를 만드는 
							톡스앤필 브로우만의 4D 헤어라인 디자인 교육
							<a class="btn-read" href="/introduction/index.php">
								<img class="img-read" src="/common/img/main/logo-read-renew.png" alt="Read More">
								<img  class="img-read2"src="/common/img/main/logo-read2-renew.png" alt="Read More">
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="scroll-section-3" class="sec-curri _sec-curri">
			<div class="maxframe">
				<div class="text-center">
					<img src="/common/img/main/logo-curri-renew.png" alt="커리큘럼">
				</div>
				<div class="curri-tab-menu maxframe">
				  <button class="tab-btn active" data-target="curriA">SMP 베이직 클래스</button>
				  <button class="tab-btn" data-target="curriB">TSMP 심화 클래스</button>
				  <button class="tab-btn" data-target="curriC">SMP ALL 마스터 클래스</button>
				  <button class="tab-btn" data-target="curriD">SMP 창업 클래스</button>
				  <button class="tab-btn" data-target="curriE">SMP 속성 클래스</button>
				  <button class="tab-btn" data-target="curriF">SMP 숱채움 마스터 클래스</button>
				  <button class="tab-btn" data-target="curriG">반영구 클래스</button>
				  <button class="tab-btn" data-target="curriH">눈썹 단과반</button>
				  <button class="tab-btn" data-target="curriI">사후 과정</button>
				</div>
				<div class="curriSwiper">
					<div class="swiper-wrapper">
					  <div class="swiper-slide" role="curriA">
						<div class="item_wrap">
							<a href="/curriculum/index.php">
								<div class="item-img">
									<figure class="img-frame">
										<img src="/common/img/main/curri-smp-basic.jpg" alt="커리큘럼">
									</figure>
									<a class="btn-read" href="/curriculum/index.php">
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
							</a>
						</div>
					  </div>
					  <div class="swiper-slide" role="curriB">
						<div class="item_wrap">
							<a href="/curriculum/index.php">
								<div class="item-img">
									<figure class="img-frame">
										<img src="/common/img/main/curri-tsmp.jpg" alt="커리큘럼">
									</figure>
									<a class="btn-read" href="/curriculum/index.php">
										<img class="img-read" src="/common/img/main/logo-read-w.png" alt="Read More">
										<img  class="img-read2"src="/common/img/main/logo-read2-w.png" alt="Read More">
									</a>
								</div>
								<div class="item-detail">
									<div class="__title">
										TSMP 심화 클래스
									</div>
									<p class="__detail">
										SMP의 삭발디자인의기본 지식이 있는 분들을 대상으로 입체감을 표현하는 수업
									</p>
								</div>
							</a>
						</div>
					  </div>
					  <div class="swiper-slide" role="curriC">
						<div class="item_wrap">
							<a href="/curriculum/index.php">
								<div class="item-img">
									<figure class="img-frame">
										<img src="/common/img/main/curri-smp-all-master.jpg" alt="커리큘럼">
									</figure>
									<a class="btn-read" href="/curriculum/index.php">
										<img class="img-read" src="/common/img/main/logo-read-w.png" alt="Read More">
										<img  class="img-read2"src="/common/img/main/logo-read2-w.png" alt="Read More">
									</a>
								</div>
								<div class="item-detail">
									<div class="__title">
										SMP ALL 마스터 클래스
									</div>
									<p class="__detail">
										SMP의 기본이 되는 정통의 모든 과정과 심화 과정 TCURL-SMP를 모두 배울 수 있는 클래스
									</p>
								</div>
							</a>
						</div>
					  </div>
					  <div class="swiper-slide" role="curriD">
						<div class="item_wrap">
							<a href="/curriculum/index.php">
								<div class="item-img">
									<figure class="img-frame">
										<img src="/common/img/main/curri-smp-founded.jpg?ver=2308281516" alt="커리큘럼">
									</figure>
									<a class="btn-read" href="/curriculum/index.php">
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
							</a>
						</div>
					  </div>
					  <div class="swiper-slide" role="curriE">
						<div class="item_wrap">
							<a href="/curriculum/index.php">
								<div class="item-img">
									<figure class="img-frame">
										<img src="/common/img/main/curri-smp-speed.jpg" alt="커리큘럼">
									</figure>
									<a class="btn-read" href="/curriculum/index.php">
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
							</a>
						</div>
					  </div>
					  <div class="swiper-slide" role="curriF">
						<div class="item_wrap">
							<a href="/curriculum/index.php">
								<div class="item-img">
									<figure class="img-frame">
										<img src="/common/img/main/curri-femme-smp.jpg?ver=2308280520" alt="커리큘럼">
									</figure>
									<a class="btn-read" href="/curriculum/index.php">
										<img class="img-read" src="/common/img/main/logo-read-w.png" alt="Read More">
										<img  class="img-read2"src="/common/img/main/logo-read2-w.png" alt="Read More">
									</a>
								</div>
								<div class="item-detail">
									<div class="__title">
										SMP 숱채움 마스터 클래스
									</div>
									<p class="__detail">
										정통 SMP 기술을 통해 팜므(여성), 옴므(남성) 밀도 보강, 숱채움 만을 집중 교육받을 수 있는 클래스
									</p>
								</div>
							</a>
						</div>
					  </div>

					  <div class="swiper-slide" role="curriG">
						<div class="item_wrap">
							<a href="/curriculum/index.php">
								<div class="item-img">
									<figure class="img-frame">
										<img src="/common/img/main/curri-semi-perman.jpg" alt="커리큘럼">
									</figure>
									<a class="btn-read" href="/curriculum/index.php">
										<img class="img-read" src="/common/img/main/logo-read-w.png" alt="Read More">
										<img  class="img-read2"src="/common/img/main/logo-read2-w.png" alt="Read More">
									</a>
								</div>
								<div class="item-detail">
									<div class="__title">
										반영구 클래스
									</div>
									<p class="__detail">
										반영구 기법 중 눈썹, 입술, 아이라인에 해당하는 기술을 수강하는 과정
									</p>
								</div>
							</a>
						</div>
					  </div>
					  <div class="swiper-slide" role="curriH">
						<div class="item_wrap">
							<a href="/curriculum/index.php">
								<div class="item-img">
									<figure class="img-frame">
										<img src="/common/img/main/curri-brow.jpg" alt="커리큘럼">
									</figure>
									<a class="btn-read" href="/curriculum/index.php">
										<img class="img-read" src="/common/img/main/logo-read-w.png" alt="Read More">
										<img  class="img-read2"src="/common/img/main/logo-read2-w.png" alt="Read More">
									</a>
								</div>
								<div class="item-detail">
									<div class="__title">
										눈썹 단과반
									</div>
									<p class="__detail">
										반영구 기법 중 눈썹에 해당하는 기술을 수강하는 과정
									</p>
								</div>
							</a>
						</div>
					  </div>

					  <div class="swiper-slide" role="curriI">
						<div class="item_wrap">
							<a href="/curriculum/index.php">
								<div class="item-img">
									<figure class="img-frame">
										<img src="/common/img/main/curri-after-care.jpg" alt="커리큘럼">
									</figure>
									<a class="btn-read" href="/curriculum/index.php">
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
							</a>
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
	
		<section id="scroll-section-6" class="sec-map">
			<?php
			include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/map_bh.php';
			?>
		</section>
	</main>

	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/eventPopup.php';
	?>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer-main.php';
?>

<script src="/common/js/main-scroll-ui.js"></script>
<!-- Rolling CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.Marquee/1.6.0/jquery.marquee.min.js"></script>

<script>
	//Event Popup
	openPopup('eventPopup');

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