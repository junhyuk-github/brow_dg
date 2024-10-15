<link rel="stylesheet" href="/common/css/common_main.css?v=2407031627">
<header id="header" class="">
<div class="top-nav">
	<div class="maxframe">
		<ul class="top-right">
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
					<h1>
						<a href="/" title="톡스앤필 브로우 홈">
							<span class="logo"></span>
							<span class="sr-only">Toxnfill Brow</span>
						</a>
					</h1>
					<ul class="depth1">
						<li id="intro" class="">
							<h2>톡스앤필 브로우</h2>
							<ul class="depth2">
								<li class="sub-ttl">IDENTITY</li>
								<li class="list-ttl"><a href="/intro/identity.php">ABOUT</a></li>
								<li class="list-ttl"><a href="/intro/identity.php">사회공헌</a></li>
								<li class="list-ttl"><a href="/intro/identity.php">문화컨텐츠</a></li>
								<li class="sub-ttl">BROW SPACE</li>
								<li class="list-ttl"><a href="/intro/browSpace.php">시설안내</a></li>
								<li class="list-ttl"><a href="/intro/browSpace.php">오시는 길</a></li>
							</ul>	
						</li> 
						<li>
							<h2>시술소개</h2>
							<ul class="depth2"> 
								<li class="sub-ttl"><a href="/introduction/index.php">SMP란?</a></li>
								<li class="sub-ttl"><a href="/introduction/index.php">TSMP란?</a></li>
								<li class="sub-ttl"><a href="/introduction/index.php">두상 유형별 <br> 헤어라인 디자인</a></li>
								<li class="sub-ttl"><a href="/introduction/index.php">Before&After</a></li>
							</ul>	
						</li>
						<li id="curriculum">
							<h2>SMP 교육 가이드</h2>
							<ul class="depth2">
                                <li class="sub-ttl"><a href="/curriculum/index.php">SMP 초급 체험반</a></li>
                                <li class="sub-ttl"><a href="/curriculum/index.php">SMP 기초 클래스</a></li>
                                <li class="sub-ttl"><a href="/curriculum/index.php">SMP 숱채움 정규반</a></li>
								<li class="sub-ttl"><a href="/curriculum/index.php">SMP 베이직 클래스</a></li>
								<li class="sub-ttl"><a href="/curriculum/index.php">TSMP 심화 클래스</a></li>
								<li class="sub-ttl"><a href="/curriculum/index.php">SMP ALL 마스터 클래스</a></li>
								<li class="sub-ttl"><a href="/curriculum/index.php">SMP 창업 클래스</a></li>
								<li class="sub-ttl"><a href="/curriculum/index.php">SMP 속성 클래스</a></li>
								<li class="sub-ttl"><a href="/curriculum/index.php">반영구 클래스</a></li>
								<li class="sub-ttl"><a href="/curriculum/index.php">눈썹 단과반</a></li>
								<li class="sub-ttl"><a href="/curriculum/index.php">사후 과정</a></li>
							</ul>	
						</li>
						<li id="commu">
							<h2>브로우 커뮤니티</h2>
							<ul class="depth2">
								<li class="sub-ttl"><a href="/commu/notice.php">공지사항</a></li>
								<li class="sub-ttl"><a href="/commu/acadNews.php">아카데미 뉴스</a></li>
								<li class="sub-ttl"><a href="/commu/sns.php">SNS</a></li>
								<!-- 240621 임시 미노출 -->
								<!-- <li class="sub-ttl"><a href="/commu/event.php">EVENT</a></li> -->
								<!-- 240621 임시 미노출 -->
								<!-- <li class="sub-ttl"><a href="/commu/gallery.php">갤러리</a></li> 브로우측 미노출 요청 -->
								<li class="sub-ttl"><a href="/commu/studentWork.php">수강생 포트폴리오</a></li>
								<li class="sub-ttl"><a href="/commu/review.php">수강생 실제후기</a></li>
							</ul>
						</li>
						<li id="contact">
							<h2>상담신청</h2>
							 <ul class="depth2">
								<li class="sub-ttl"><a href="/contact/index.php">상담신청하기</a></li>
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
											<h2>톡스앤필 브로우</h2>
											<span class="sub-ttl">IDENTITY</span>
											<ul class="sub-wrap">
												<li class="list-ttl"><a href="/intro/identity.php">ABOUT</a></li>
												<li class="list-ttl"><a href="/intro/identity.php">사회공헌</a></li>
												<li class="list-ttl"><a href="/intro/identity.php">문화컨텐츠</a></li>
											</ul>	

											<span class="sub-ttl">BROW SPACE</span>
											<ul class="sub-wrap">
												<li class="list-ttl"><a href="/intro/browSpace.php">시설안내</a></li>
												<li class="list-ttl"><a href="/intro/browSpace.php">오시는 길</a></li>
											</ul>	
										</li>
										<li>
											<h2>시술소개</h2>
											<ul class="sub-wrap">
												<li class="sub-ttl"><a href="/introduction/index.php">SMP란?</a></li>
												<li class="sub-ttl"><a href="/introduction/index.php">TSMP란?</a></li>
												<li class="sub-ttl"><a href="/introduction/index.php">두상 유형별 헤어라인 디자인</a></li>
												<li class="sub-ttl"><a href="/introduction/index.php">Before&After</a></li>
											</ul>	

										</li>
										<li>
											<h2>SMP 교육 가이드</h2>
											<ul class="sub-wrap">
                                                <li class="sub-ttl"><a href="/curriculum/index.php">SMP 초급 체험반</a></li>
                                                <li class="sub-ttl"><a href="/curriculum/index.php">SMP 기초 클래스</a></li>
                                                <li class="sub-ttl"><a href="/curriculum/index.php">SMP 숱채움 정규반</a></li>
                                                <li class="sub-ttl"><a href="/curriculum/index.php">SMP 베이직 클래스</a></li>
												<li class="sub-ttl"><a href="/curriculum/index.php">TSMP 심화 클래스</a></li>
												<li class="sub-ttl"><a href="/curriculum/index.php">SMP ALL 마스터 클래스</a></li>
												<li class="sub-ttl"><a href="/curriculum/index.php">SMP 창업 클래스</a></li>
												<li class="sub-ttl"><a href="/curriculum/index.php">SMP 속성 클래스</a></li>
												<li class="sub-ttl"><a href="/curriculum/index.php">반영구 클래스</a></li>
												<li class="sub-ttl"><a href="/curriculum/index.php">눈썹 단과반</a></li>
												<li class="sub-ttl"><a href="/curriculum/index.php">사후 과정</a></li>
											</ul>	
										</li>
										<li>
											<h2>브로우 커뮤니티</h2>
											<ul class="sub-wrap">
												<li class="sub-ttl"><a href="/commu/notice.php">공지사항</a></li>
												<li class="sub-ttl"><a href="/commu/acadNews.php">아카데미 뉴스</a></li>
												<li class="sub-ttl"><a href="/commu/sns.php">SNS</a></li>
												<!-- 240621 임시 미노출 -->
												<!-- <li class="sub-ttl"><a class="/commu/event.php">EVENT</a></li> -->
												<!-- 240621 임시 미노출 -->
												<!-- <li class="sub-ttl"><a href="/commu/gallery.php">갤러리</a></li> -->
												<li class="sub-ttl"><a href="/commu/studentWork.php">수강생 포트폴리오</a></li>
												<li class="sub-ttl"><a href="/commu/review.php">수강생 실제후기</a></li>
											</ul>	
										</li>
										<li>
											<h2>상담신청</h2>
											<ul class="sub-wrap">
												<li class="sub-ttl"><a href="/contact/index.php">상담신청하기</a></li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
							<div class="fullSns-wrap">
								<!-- 240621 임시 미노출 -->
								<div class="sns-item">
									<a href="https://open.kakao.com/o/sAkEfwzg" target="_blank"><img src="/common/img/main/icon/i-kakao-b.png" alt="카카오톡"></a>
									<!-- <a href="https://www.instagram.com/toxnfill_brow/" target="_blank"><img src="/common/img/main/icon/i-insta-b.png" alt="인스타그램"></a> -->
									<!-- <a href="https://www.youtube.com/@toxnfillbrow" target="_blank"><img src="/common/img/main/icon/i-youtube-b.png" alt="유튜브"></a>
									<a href="https://blog.naver.com/timer14864" target="_blank"><img src="/common/img/main/icon/i-blog-b.png" alt="블로그"></a> -->
								</div>
								<!-- 240621 임시 미노출 -->
								<p>Copyright © 2023 . All Rights Reserved.</p>
							</div>
							<div class="btn-close"></div>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</div>
</header> 

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
</script>
