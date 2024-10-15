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
            <div class="video-sc-inner">
                <div id="mainBannerVideo" class="" style="position:relative;">
                    <video autoplay loop muted playsinline>
                        <source src="/common/img/m/231010_main-video.mp4" type="video/mp4">
                    </video>
                </div>
                <div class="mainSwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="txt_box">
                                <div class="_thumb-main mb-40">
                                    <span class="font-b-30 db-mb-15">거품을 뺀 가격</span>
                                    <div class="center-wrap">
                                        <img src="/common/img/m/main/price-190-m.png" alt="" class="price-img">
                                        <span class="font-m-45">만원!</span>
                                    </div>
                                </div>
                                <p class="_main-tit">
                                    터무니없는 수강료 합리적인가?
                                </p>
                                <p class="sub-tit">
                                    이것저것 과장된 내용이아닌!<br/>
                                    실무에 필요한 내용만 교육합니다.
                                </p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="txt_box">
                                <div class="_thumb-main">
                                    <span class="font-m-40 db-mb-20">배우는데 너무 오래걸리시죠?</span>
                                    <div class="center-wrap">
                                        <p class="font-b-35">
                                            <span class="font-m-45">수강료</span>가 낮으면<br/>
                                            <span class="font-m-45">퀄리티</span>가 낮다?
                                        </p>
                                    </div>
                                </div>
                                <p class="sub-tit">
                                    오랜 기간의 배움과 높은 수강료가<br/>
                                    여러분을 당장 두피문신 전문가로 만들어 주지 않습니다.<br/>
                                    체계적인 교육 시스템과 트렌드를 앞장서는 '톡스앤필'<br/>
                                    불필요한 과정을 제외한 최적의 커리큘럼을 제공합니다.
                                </p>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="txt_box">
                                <div class="_thumb-main">
                                    <span class="font-m-40 db-mb-20">무한 참관수업 시스템</span>
                                    <div class="center-wrap">
                                        <p class="font-b-35">
                                            같이 성장하는<br/>
                                            <span class="font-m-45">톡스앤필 브로우</span>
                                        </p>
                                    </div>
                                </div>
                                <p class="sub-tit">
                                    수료 후 1년이 지나고 3년이 지나도<br/>
                                    언제든지 참관수업이 가능합니다.<br/>
                                    수료 후에도 활발한 커뮤니케이션!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <p class="scroll-down">
                    <img src="/common/img/m/main/scroll-down.png" alt="">
                </p>
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
                        <a href="https://www.toxnfillbrow.com/commu/event.php"" title="이벤트">
                        <span class="icon">
								<img src="/common/img/m/main/i-cate02.png" alt="">
							</span>
                        <span class="txt_">이벤트</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.toxnfillbrow.com/m/curriculum/index.php" title="수강 커리큘럼">
							<span class="icon">
								<img src="/common/img/m/main/i-cate03.png" alt="">
							</span>
                            <span class="txt_">수강 커리큘럼</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.toxnfillbrow.com/m/intro/browSpace.php" target="_blank" title="오시는길">
							<span class="icon">
								<img src="/common/img/m/main/i-cate04.png" alt="">
							</span>
                            <span class="txt_">오시는길</span>
                        </a>
                    </li>
                </ul>
            </div>
        </section>
        <section id="scroll-section-2" style="margin-top:0"></section>
        <!-- 리뷰 -->
        <!-- <section id="scroll-section-2" class="review-sec">
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
						<a class="btn btn-dark" href="javascript:void(0);" onclick="alert('준비중입니다.')" title="포트폴리오 게시판">
							더 많은 후기 보러가기
						</a>
					</div>
				</div>
			</div>
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
		</section> -->
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
                                <a class="line-icon icon" href="/m/introduction/index.php">
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
                                <a class="line-icon icon" href="/m/introduction/index.php">
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
                                <a class="line-icon icon" href="/m/introduction/index.php">
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
                                    <a class="line-icon icon" href="/m/curriculum/index.php">
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
                                        SMP의 삭발디자인의기본 지식이 있는 분들을 대상으로 입체감을 표현하는 수업
                                    </p>
                                </div>
                                <div class="btn-rotate-wrap">
									<span class="center-icon icon">
										<img src="/common/img/m/main/i-deco-center.png" alt="">
									</span>
                                    <a class="line-icon icon" href="/m/curriculum/index.php">
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
                                        SMP의 기본이 되는 정통의 모든 과정과 심화 과정 TCURL-SMP를 모두 배울 수 있는 클래스
                                    </p>
                                </div>
                                <div class="btn-rotate-wrap">
									<span class="center-icon icon">
										<img src="/common/img/m/main/i-deco-center.png" alt="">
									</span>
                                    <a class="line-icon icon" href="/m/curriculum/index.php">
                                        <img class="rotate_icon__" src="/common/img/m/main/i-deco-line.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <figure class="img__">
                                    <img src="/common/img/m/main/curriculum-02.jpg?ver=2308280519" alt="">
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
                                    <a class="line-icon icon" href="/m/curriculum/index.php">
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
                                    <a class="line-icon icon" href="/m/curriculum/index.php">
                                        <img class="rotate_icon__" src="/common/img/m/main/i-deco-line.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <figure class="img__">
                                    <img src="/common/img/m/main/curriculum-05.jpg?ver=2308281521" alt="">
                                </figure>
                                <div class="txt_box_">
                                    <p class="tit_">
                                        SMP<br/>숱채움 마스터 클래스
                                    </p>
                                    <p class="desc">
                                        정통 SMP 기술을 통해 팜므(여성), 옴므(남성) 밀도 보강, 숱채움 만을 집중 교육받을 수 있는 클래스
                                    </p>
                                </div>
                                <div class="btn-rotate-wrap">
									<span class="center-icon icon">
										<img src="/common/img/m/main/i-deco-center.png" alt="">
									</span>
                                    <a class="line-icon icon" href="/m/curriculum/index.php">
                                        <img class="rotate_icon__" src="/common/img/m/main/i-deco-line.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <figure class="img__">
                                    <img src="/common/img/m/main/curriculum-09.jpg" alt="">
                                </figure>
                                <div class="txt_box_">
                                    <p class="tit_">
                                        반영구 클래스
                                    </p>
                                    <p class="desc">
                                        반영구 기법 중 눈썹, 입술, 아이라인에 해당하는 기술을 수강하는 과정
                                    </p>
                                </div>
                                <div class="btn-rotate-wrap">
									<span class="center-icon icon">
										<img src="/common/img/m/main/i-deco-center.png" alt="">
									</span>
                                    <a class="line-icon icon" href="/m/curriculum/index.php">
                                        <img class="rotate_icon__" src="/common/img/m/main/i-deco-line.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <figure class="img__">
                                    <img src="/common/img/m/main/curriculum-08.jpg" alt="">
                                </figure>
                                <div class="txt_box_">
                                    <p class="tit_">
                                        눈썹단과반
                                    </p>
                                    <p class="desc">
                                        반영구 기법 중 눈썹에 해당하는 기술을 수강하는 과정
                                    </p>
                                </div>
                                <div class="btn-rotate-wrap">
									<span class="center-icon icon">
										<img src="/common/img/m/main/i-deco-center.png" alt="">
									</span>
                                    <a class="line-icon icon" href="/m/curriculum/index.php">
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
                                    <a class="line-icon icon" href="/m/curriculum/index.php">
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
        <section id="scroll-section-5"></section>
        <!-- 포트폴리오 -->
        <!-- <section id="scroll-section-5" class="portfolio-sec">
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
						<a class="btn btn-dark" href="javascript:void(0);" onclick="alert('준비중입니다.')" title="포트폴리오 게시판">
							더 많은 수강생 작품 보러가기
						</a>
					</div>
				</div>
			</div>
		</section> -->
        <!-- 하단배너영역 -->
        <section id="scroll-section-6" class="pr-sec">
            <div class="minframe">
                <h3 class="logo">
                    <img src="/common/img/m/main/tfb-logo-gray.png" alt="">
                </h3>
                <p class="tit__ font-b-20">
                    단순히 기술만 배우고 끝내시겠습니까?<br/>
                    저희는 직업을 만들어 드립니다.
                </p>
                <p class="desc">
                    막막한 창업, 톡스앤필 브로우 아카데미<br/>
                    프렌차이즈 창업이 가능하시며<br/>
                    국내 NO.1 톡스앤필로 취업의 기회도 열려있습니다.
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
<?php
//include $_SERVER['DOCUMENT_ROOT'] . '/m/eventPopup.php';
?>

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
<!-- 메인 스와이퍼  -->
<script>
  var mainSwiper = new Swiper(".mainSwiper", {
    loop: true,
    slidesPerView: 1,
    centeredSlides: true,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".mainSwiper .swiper-pagination",
    },
  });
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
    // autoplay: {
    // 	delay: 2500,
    // 	disableOnInteraction: false,
    // },
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
