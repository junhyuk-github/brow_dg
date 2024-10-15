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
                        <iframe src="https://player.vimeo.com/video/813497388?autoplay=1&loop=1&muted=1&amp;autoplay=1&amp;controls=0&amp;app_id=122963" width="426" height="224" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen="" title="" data-ready="true"></iframe>
                    </div>
                </div>
                <!-- <div class="bm-title"> -->
                <!-- <span class="sticky-elem fadeinleft bgtxt1" style="color: red;"> -->
                <!-- test left -->
                <!-- </span> -->
                <!-- <div class="sticky-elem fadeinright bgtxt2" style="color: red;"> -->
                <!-- test right -->
                <!-- </div> -->
                <!-- </div> -->
                <div class="video-wrap" style="border: 5px solid #fff;">
                    <div class="video-area">
                        test bottom
                    </div>
                </div>
                <div class="video-wrap2" style="border: 5px solid pink;">
                    <div class="video-area">
                        test bottom
                    </div>
                </div>
            </div>
        </section>
        <section id="scroll-section-1" class="sec-review">
            <div class="maxframe">
                <div class="title_wrap minframe">
                    <h1 class="title">REAL REVIEW</h1>
                    <span class="sub-ttl">고민 끝에 선택한 톡스앤필 브로우 아카데미 수강생들의 찐 후기</span>
                </div>
                <div class="cont_wrap">

                            <?php
                            include $_SERVER['DOCUMENT_ROOT'] . '/commu/new_reviewTop.php';
                            ?>

                  
                            <?php
                            include $_SERVER['DOCUMENT_ROOT'] . '/commu/new_reviewBot.php';
                            ?>

<!--                    <div class="pop_review">
                        <div class="popUp_wrap">
                            <div class="__top">
                                <span class="__rank">수강생</span>
                                <h3 class="__name">하지연</h3>
                                <div class="btn-close"></div>
                            </div>
                            <p class="__interview">
                                풀데이터1111
                            </p>
                        </div>
                    </div>-->
                    <div class="btn_wrap text-center">
                        <a href="/commu/review.php" class="btn-more">더 많은 후기 보러가기</a>
                    </div>
                </div>
            </div>
        </section>
        <section id="scroll-section-2" class="sec-portfolio">
            <div class="minframe">
                <div class="title_wrap">
                    <h1 class="title">PORTFOLIO</h1>
                    <span class="sub-ttl">톡스앤필 브로우 수강생 포트폴리오</span>
                </div>
                <div class="cont_wrap">
                    <div class="cont __left">
                        <figure class="img-wrap">
                            <img src="/common/img/main/dummy-01.jpg" alt="수강생 포트폴리오">
                        </figure>
                    </div>
                    <div class="cont __right">
                        <div class="item">
                            <figure class="img-wrap">
                                <img src="/common/img/main/dummy-02.jpg" alt="수강생 포트폴리오">
                            </figure>
                        </div>
                        <div class="item">
                            <figure class="img-wrap">
                                <img src="/common/img/main/dummy-02.jpg" alt="수강생 포트폴리오">
                            </figure>
                        </div>
                        <div class="item">
                            <figure class="img-wrap">
                                <img src="/common/img/main/dummy-02.jpg" alt="수강생 포트폴리오">
                            </figure>
                        </div>
                        <div class="item">
                            <figure class="img-wrap">
                                <img src="/common/img/main/dummy-02.jpg" alt="수강생 포트폴리오">
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="btn_wrap text-center">
                    <a href="/commu/review.php" class="btn-more">더 많은 후기 보러가기</a>
                </div>
            </div>
        </section>
        <section id="scroll-section-3">
            <div class="minframe">
                <div class="title_wrap">
                    <h1 class="title">test</h1>
                    <span class="sub-ttl">아직 시안 없음 ㅜㅜㅜㅜ</span>
                </div>
            </div>
        </section>
    </main>




</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer.php';
?>

<script src="/common/js/main-scroll-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.Marquee/1.6.0/jquery.marquee.min.js"></script>
<!--<script type="text/javascript">-->
<!--    //수강생후기 롤링-->
<!--    $(document).ready(function(){-->
<!--        $('.contTop').marquee({-->
<!--            speed: 60,-->
<!--            gap: 0,-->
<!--            startVisible: true,-->
<!--            delayBeforeStart: 0, // 시작 delay값-->
<!--            direction: 'left',-->
<!--            duplicated: true,-->
<!--            pauseOnHover: true-->
<!--        });-->
<!--        $('.contBottom').marquee({-->
<!--            speed: 60,-->
<!--            gap: 0,-->
<!--            startVisible: true,-->
<!--            delayBeforeStart: 0,-->
<!--            direction: 'right',-->
<!--            duplicated: true,-->
<!--            pauseOnHover: true-->
<!--        });-->
<!--    });-->
<!---->
<!--    //수강생후기 팝업생성-->
<!--    $(document).on('click', '.sec-review .item', function(e){-->
<!--        e.preventDefault();-->
<!--        $('body').addClass('scrollLock');-->
<!--        $('.pop_review').addClass('popActive');-->
<!--    });-->
<!--    $(document).on('click', '.popUp_wrap .btn-close', function(e){-->
<!--        e.preventDefault();-->
<!--        $('body').removeClass('scrollLock');-->
<!--        $('.pop_review').removeClass('popActive');-->
<!--    });-->
<!---->
<!--</script>-->

</body>
</html>