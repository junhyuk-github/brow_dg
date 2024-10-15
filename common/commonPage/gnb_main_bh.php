

<link rel="stylesheet" href="/common/css/common_main_jy.css?v=<?php echo date("ymdHi") ?>">
<header id="header" class="">
    <div class="top-nav">
        <div class="maxframe">
            <ul class="top-right">
                <li class="global-btn-box">
                    <button type="button" class="global-btn txt-sub-color">
                        <!--                        <span class="icon global_icon iconImg_wrap">-->
                        <!--                            <img src="/common/img/icon/i-global-g.svg" class="iconImg icon_g" alt="">-->
                        <!--                        </span>-->
                        <span class="menu-tit">GLOBAL</span>
                    </button>
                </li>
              <? if ( $common['userIdx'] ) { ?>
                  <li>
                      <a <? if( $common['userGroup'] == '2' || $common['userGroup'] == '3' || $common['userGroup'] == '4' || $common['userGroup'] == '5' || $common['userGroup'] == '6' ) {?> href="/member/user.php"<? } ?>><?=$common['userName']?>님</a>
                  </li>
                  <li><a href="/member/logout.php" class="txt-sub-color">로그아웃</a></li>
              <? } else { ?>
                  <li><a href="/member/login.php" class="txt-sub-color">로그인</a></li>
                  <li><a href="/member/join01.php" class="txt-sub-color">회원가입</a></li>
              <? } ?>
                <li><a href="/contact/index.php" class="txt-sub-color">상담신청</a></li>
            </ul>
        </div>
        <div class="main-nav">
            <nav id="gnb" class="gnb-main">
                <div class="maxframe">
                    <div class="depth2-bg"></div>
                    <div class="nav-wrap">
                        <div class="brunch-logo-box">
                            <h1>
                                <a href="/" title="톡스앤필 브로우 홈">
                                    <span class="logo"></span>
                                    <span class="sr-only">Toxnfill Brow</span>
                                </a>
                            </h1>
                            <div class="brunch-dropdown">
                                <div class="choice-select">
                                    <span>본점</span>
                                    <img src="/common/img/main/icon/ico_brunch.svg?v=2409051950" alt="" class="origin_img">
                                    <img src="/common/img/main/icon/ico_brunch_on.svg?v=2409051950" alt="" class="on_img">
                                </div>
                                <ul class="sub-drop1">
                                    <li class="">
                                        <a href="/" target="_blank">
                                            <span>본점</span>
                                            <span>+</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="https://dg.toxnfillbrow.com/" target="_blank">
                                            <span>대구점</span>
                                            <span>+</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <ul class="depth1">
                            <li>
                                <h2>브로우 소개</h2>
                                <ul class="depth2">
                                    <li class="list-ttl"><a href="/browIntro/about.php"><span>ABOUT</span></a></li>
                                    <li class="list-ttl"><a href="/browIntro/ambassador.php"><span>엠버서더</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <h2>아카데미 소개</h2>
                                <ul class="depth2">
                                    <li class="list-ttl"><a href="/academyIntro/smp.php"><span>SMP</span></a></li>
                                    <li class="list-ttl"><a href="/academyIntro/semiPerm.php"><span>반영구</span></a></li>
                                  <?php if($isPortfolio === 'Y') { ?><li class="list-ttl"><a href="/commu/studentWork.php"><span>수강생 포트폴리오</span></a></li><?php } ?>
                                </ul>
                            </li>
                            <li>
                                <h2>시술 전후사진</h2>
                                <ul class="depth2">
                                    <li class="list-ttl"><a href="/bna/shavedHead.php"><span>삭발 디자인</span></a></li>
                                    <li class="list-ttl"><a href="/bna/densityFill.php"><span>숱채움</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <h2>교육과정</h2>
                                <ul class="depth2">
                                    <li class="list-ttl"><a href="/curriculum/indexBeginer.php"><span>SMP 초급 체험반</span></a></li>
                                    <li class="list-ttl"><a href="/curriculum/indexBasic.php"><span>SMP 베이직 클래스</span></a></li>
                                    <li class="list-ttl"><a href="/curriculum/indexDeepening.php"><span>TSMP 심화 클래스</span></a></li>
                                    <li class="list-ttl"><a href="/curriculum/indexAllMaster.php"><span>SMP 올 마스터 클래스</span></a></li>
                                    <li class="list-ttl"><a href="/curriculum/indexOneday.php"><span>SMP 원데이 클래스</span></a></li>
                                    <li class="list-ttl"><a href="/curriculum/indexSemiPerm.php"><span>반영구 클래스</span></a></li>
                                    <li class="list-ttl"><a href="/curriculum/indexEyeBrow.php"><span>눈썹단과반</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <h2>수강생 혜택</h2>
                                <ul class="depth2">
                                    <li class="list-ttl"><a href="/studentFavor/franchise.php"><span>가맹</span></a></li>
                                    <li class="list-ttl"><a href="/studentFavor/employment.php"><span>취업</span></a></li>
                                </ul>
                            </li>
                            <li>
                                <h2>
                                    <a href="/contact/index.php">
                                        상담신청
                                    </a>
                                </h2>
                                <!--                                <ul class="depth2">-->
                                <!--                                    <li class="list-ttl"><a href="/contact/index.php"><span>상담신청하기</span></a></li>-->
                                <!--                                </ul>-->
                            </li>
                            <li>
                                <h2>커뮤니티</h2>
                                <ul class="depth2">
                                    <li class="list-ttl"><a href="/commu/notice.php"><span>공지사항</span></a></li>
                                    <li class="list-ttl"><a href="/commu/acadNews.php"><span>아카데미 뉴스</span></a></li>
                                    <li class="list-ttl"><a href="/commu/review.php"><span>수강생 후기</span></a></li>
                                    <li class="list-ttl"><a href="/commu/youtube.php"><span>유튜브</span></a></li>
                                    <li class="list-ttl"><a href="/commu/event.php"><span>이벤트</span></a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="btn-wrap">
                            <a href="/member/user.php"><figure class="btn-mypage"></figure></a>
                            <div class="full-menu">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <div class="full-menu-wrap">
                                <div class="bg-logo"><img src="/common/img/main/full-menu-logo.png" alt="톡스앤필브로우"></div>
                                <div class="maxframe">
                                    <div class="sitemap-wrap">
                                        <ul class="sitemap">
                                            <li>
                                                <h2>브로우 소개</h2>
                                                <ul class="sub-wrap">
                                                    <li class="sub-ttl"><a href="/browIntro/about.php">ABOUT</a></li>
                                                    <li class="sub-ttl"><a href="/browIntro/ambassador.php">엠버서더</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <h2>아카데미 소개</h2>
                                                <ul class="sub-wrap">
                                                    <li class="sub-ttl"><a href="/academyIntro/smp.php">SMP</a></li>
                                                    <li class="sub-ttl"><a href="/academyIntro/semiPerm.php">반영구</a></li>
                                                  <?php if($isPortfolio === 'Y') { ?><li class="sub-ttl"><a href="/commu/studentWork.php"><span>수강생 포트폴리오</span></a></li><?php } ?>
                                                </ul>
                                            </li>
                                            <li>
                                                <h2>시술 전후사진</h2>
                                                <ul class="sub-wrap">
                                                    <li class="sub-ttl"><a href="/bna/shavedHead.php">삭발 디자인</a></li>
                                                    <li class="sub-ttl"><a href="/bna/densityFill.php">숱채움</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <h2>교육과정</h2>
                                                <ul class="sub-wrap">
                                                    <li class="sub-ttl"><a href="/curriculum/indexBeginer.php">SMP 초급 체험반</a></li>
                                                    <li class="sub-ttl"><a href="/curriculum/indexBasic.php">SMP 베이직 클래스</a></li>
                                                    <li class="sub-ttl"><a href="/curriculum/indexDeepening.php">TSMP 심화 클래스</a></li>
                                                    <li class="sub-ttl"><a href="/curriculum/indexAllMaster.php">SMP 올 마스터 클래스</a></li>
                                                    <li class="sub-ttl"><a href="/curriculum/indexOneday.php">SMP 원데이 클래스</a></li>
                                                    <li class="sub-ttl"><a href="/curriculum/indexSemiPerm.php">반영구 클래스</a></li>
                                                    <li class="sub-ttl"><a href="/curriculum/indexEyeBrow.php">눈썹단과반</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <h2>수강생 혜택</h2>
                                                <ul class="sub-wrap">
                                                    <li class="sub-ttl"><a href="/studentFavor/franchise.php">가맹</a></li>
                                                    <li class="sub-ttl"><a href="/studentFavor/employment.php">취업</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <h2>상담신청</h2>
                                                <ul class="sub-wrap">
                                                    <li class="sub-ttl"><a href="/contact/index.php">상담신청하기</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <h2>커뮤니티</h2>
                                                <ul class="sub-wrap">
                                                    <li class="sub-ttl"><a href="/commu/notice.php">공지사항</a></li>
                                                    <li class="sub-ttl"><a href="/commu/acadNews.php">아카데미 뉴스</a></li>
                                                    <li class="sub-ttl"><a href="/commu/review.php">수강생 후기</a></li>
                                                    <li class="sub-ttl"><a href="/commu/youtube.php">유튜브</a></li>
                                                    <li class="sub-ttl"><a href="/commu/event.php">이벤트</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <div class="cooperation_box02">
                                            <h2>협업점</h2>
                                            <ul>
                                                <li>
                                                    <a href="https://www.toxnfill1.com/serviceInfo.php?c=3641&utm_source=gnb_procedure&utm_medium=SMP%20%EB%91%90%ED%94%BC%EB%AC%B8%EC%8B%A0/%EB%B0%98%EC%98%81%EA%B5%AC" target="_blank">
                                                        <span>톡스앤필 강남본점</span>
<!--                                                        <img src="/common/img/main/cooperation02-link-ico.png" alt="">-->
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.toxnfill11.com/serviceInfo.php?c=3307&utm_source=gnb_procedure&utm_medium=%EB%91%90%ED%94%BC%EB%AC%B8%EC%8B%A0(SMP)/%EB%B0%98%EC%98%81%EA%B5%AC" target="_blank">
                                                        <span>톡스앤필 인천부평점</span>
<!--                                                        <img src="/common/img/main/cooperation02-link-ico.png" alt="">-->
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="fullSns-wrap">
                                    <div class="sns-item">
                                        <a href="https://pf.kakao.com/_dWCcxl" target="_blank"><img src="/common/img/main/icon/i-kakao-b.png" alt="카카오톡"></a>
                                        <!--                                        <a href="https://www.instagram.com/p/Cui4Dt6pac1/?igshid=NTc4MTIwNjQ2YQ%3D%3D" target="_blank"><img src="/common/img/main/icon/i-insta-b.png" alt="인스타그램"></a>-->
                                        <a href="https://www.youtube.com/@toxnfillbrow" target="_blank"><img src="/common/img/main/icon/i-youtube-b.png" alt="유튜브"></a>
                                        <!--                                        <a href="https://blog.naver.com/timer14864" target="_blank"><img src="/common/img/main/icon/i-blog-b.png" alt="블로그"></a>-->
                                    </div>
                                    <p>Copyright © 2023 . All Rights Reserved.</p>
                                </div>
                                <div class="btn-close"></div>
                            </div>
                        </div>
                    </div>
                    <div class="cooperation_box">
                        <h2>| 협업점</h2>
                        <ul>
                            <li>
                                <a href="https://www.toxnfill1.com/serviceInfo.php?c=3641&utm_source=gnb_procedure&utm_medium=SMP%20%EB%91%90%ED%94%BC%EB%AC%B8%EC%8B%A0/%EB%B0%98%EC%98%81%EA%B5%AC" target="_blank">
                                    <span>톡스앤필 강남본점</span>
                                    <img src="/common/img/main/cooperation-link-ico.png" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="https://www.toxnfill11.com/serviceInfo.php?c=3307&utm_source=gnb_procedure&utm_medium=%EB%91%90%ED%94%BC%EB%AC%B8%EC%8B%A0(SMP)/%EB%B0%98%EC%98%81%EA%B5%AC" target="_blank">
                                    <span>톡스앤필 인천부평점</span>
                                    <img src="/common/img/main/cooperation-link-ico.png" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>

<div class="global-modal-wrap">
    <div class="modal-inner">
        <div class="content">
            <div class="branch-wrap">
                <h3><span class="color">Main Branch</span> reservation &amp; consultation website</h3>
                <ul class="link-list">
                    <li>
                        <a href="/">
                            <span class="icon">
                                <img src="/common/img/flag/kr.png" alt="">
                            </span>
                            <span class="flag_txt">Korean</span>
                        </a>
                    </li>
                    <li>
                        <a href="http://eng.toxnfillbrow.com/">
                            <span class="icon">
                                <img src="/common/img/flag/eng.png" alt="">
                            </span>
                            <span class="flag_txt">English</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <button class="close-btn">
            <img src="/common/img/icon/close-btn.png" alt="">
        </button>
    </div>
</div>

<script>
    //풀페이지 메뉴
    $(document).on('click', '.full-menu', function(e){
        e.preventDefault();
        $('body').addClass('scrollLock');
        $('.full-menu-wrap').addClass('openActive');
    });
    $(document).on('click', '.btn-close', function(e){
        e.preventDefault();
        $('body').removeClass('scrollLock');
        $('.full-menu-wrap').removeClass('openActive');
    });

    // 글로벌 메뉴
    $('#header .top-nav .top-right .global-btn-box .global-btn').click(function(){
        $('body').css("overflow", "hidden");
        $('.global-modal-wrap').addClass('on');
    })
    $('.global-modal-wrap .close-btn').click(function(){
        $('body').css("overflow", "visible");
        $('.global-modal-wrap').removeClass('on');
    })

    // 지점 드롭다운 메뉴
    $(function (){
        $('.brunch-dropdown').click(function (e) {
            e.stopPropagation();
            $(this).toggleClass('on');
        });
        $(document).on("click", function () {
            if($(".brunch-dropdown").hasClass("on")) {
                $(".brunch-dropdown").removeClass("on");
            }
        });
    });
</script>