<header id="header" class="local-nav">
	<h1 class="logo">
		<a href="/m/" title="톡스앤필 브로우 홈">
			<span class="sr-only">Toxnfill Brow</span>
		</a>
	</h1>
	<button type="button" class="btn btn-toggle">
		<span class="sr-only">전체메뉴 열기</span>
	</button>
</header>
<nav id="gnb" class="global-nav">
	<div class="inner">
		<div class="gnb_hd">
			<h1>
				<a href="/" title="톡스앤필 브로우 홈">
					<span class="sr-only">Toxnfill Brow</span>
				</a>
			</h1>
			<button type="button" class="btn btn-close">
				<span class="sr-only">전체메뉴 닫기</span>
			</button>
		</div>
		<div class="gnb_body">
			<div class="member-wrap">
				<? if ( $common['userIdx'] ) { ?>
				<div class="join-wrap">
					<a <? if( $common['userGroup'] == '2' || $common['userGroup'] == '3' || $common['userGroup'] == '4' || $common['userGroup'] == '5' || $common['userGroup'] == '6' ) {?> href="/m/member/user.php"<? } ?> class="loginBtn" ><?=$common['userName']?>님</a>
					<a href="/m/member/logout.php" class="joinBtn">로그아웃</a>
				</div>
				<? } else { ?>
				<div class="login-wrap">
					<a href="/m/member/login.php" class="">
						<i><img src="/common/img/m/i-login.png" alt=""></i>
						<span>로그인</span>
					</a>
					<a href="/m/member/join01.php" class="">
						<i><img src="/common/img/m/i-member.png" alt=""></i>
						<span>회원가입</span>
					</a>
				</div>
				<? } ?>
			</div>
			<ul class="depth1">
				<li id="intro">
					<a class="acd-head carvon-right">
						톡스앤필 브로우
					</a>
					<ul class="acd-body depth2"> 
						<li class="sub-ttl">IDENTITY</li>
						<li><a href="/m/intro/identity.php">ABOUT</a></li>
						<li><a href="/m/intro/identity.php">사회공헌</a></li>
						<li><a href="/m/intro/identity.php">문화 컨텐츠</a></li>
						<!--
						<li><a href="javascript:void(0);" onClick="alert('준비중입니다.')">사회공헌</a></li>
						<li><a href="javascript:void(0);" onClick="alert('준비중입니다.')">문화컨텐츠</a></li>
						-->
						<li class="sub-ttl">BROW SPACE</li>
						<li><a href="/m/intro/browSpace.php">시설안내</a></li>
						<li><a href="/m/intro/browSpace.php">오시는 길</a></li>
					</ul>
				</li>
				<li>
					<a class="acd-head carvon-right">시술소개</a>
					<ul class="acd-body depth2"> 
						<li><a href="/m/introduction/index.php">SMP란?</a></li>
						<li><a href="/m/introduction/index.php">TSMP란?</a></li>
						<li><a href="/m/introduction/index.php">두상 유형별 헤어라인 디자인</a></li>
						<li><a href="/m/introduction/index.php">Before&After</a></li>
					</ul>	
				</li>
				<li id="curriculum">
					<a class="acd-head carvon-right">SMP 교육 가이드</a>
					<ul class="acd-body depth2">
                        <li><a href="/m/curriculum/index.php">SMP 초급 체험반</a></li>
                        <li><a href="/m/curriculum/index.php">SMP 기초 클래스</a></li>
                        <li><a href="/m/curriculum/index.php">SMP 숱채움 정규반</a></li>
						<li><a href="/m/curriculum/index.php">SMP 베이직 클래스</a></li>
						<li><a href="/m/curriculum/index.php">TSMP 심화 클래스</a></li>
						<li><a href="/m/curriculum/index.php">SMP ALL 마스터 클래스</a></li>
						<li><a href="/m/curriculum/index.php">SMP 창업 클래스</a></li>
						<li><a href="/m/curriculum/index.php">SMP 속성 클래스</a></li>
						<li><a href="/m/curriculum/index.php">반영구 클래스</a></li>
						<li><a href="/m/curriculum/index.php">눈썹 단과반</a></li>
						<li><a href="/m/curriculum/index.php">사후과정</a></li>
					</ul>
				</li>
				<li id="commu">
					<a class="acd-head carvon-right">브로우 커뮤니티</a>
					<ul class="acd-body depth2"> 
						<li><a href="/m/commu/notice.php">공지사항</a></li>
						<li><a href="/m/commu/acadNews.php">아카데미 뉴스</a></li>
						<li><a href="/m/commu/sns.php">SNS</a></li>
						<!-- 240621 임시 미노출 -->
						<!-- <li><a href="/m/commu/event.php">EVENT</a></li> -->
						<!-- 240621 임시 미노출 -->
						<!-- <li><a href="/m/commu/gallery.php">갤러리</a></li> -->
						<li><a href="/m/commu/studentWork.php">수강생 포트폴리오</a></li>
						<li><a href="/m/commu/review.php">수강생 실제후기</a></li>
						
					</ul>
				</li>
				<li id="contact">
					<a class="acd-head carvon-right">상담신청</a>
					<ul class="acd-body depth2"> 
						<li><a href="/m/contact/index.php">상담신청하기</a></li>
					</ul>
				</li>
				<!-- <li id="reservation">
					<a class="acd-head carvon-right">시술 예약</a>
					<ul class="acd-body depth2"> 
						<li><a href="/m/reservation/index.php">시술 예약</a></li>
						<li><a href="javascript:void(0);" onClick="alert('준비중입니다.')">시술 예약</a></li>
					</ul>
				</li> -->
			</ul>
		</div>
	</div>
</nav>

<!-- 상세페이지 네비 스크롤 -->
<script>
	$(document).ready(function(){
      $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if (scroll > 1) {
          $(".pg-main header").css("background" , "#fff");
          $(".pg-main header").css("background" , "#fff");
          $(".pg_detail .local-nav").css("background" , "#000");
          $(".pg-detail .local-nav").css("background" , "#000");
          $(".pg-detail .local-nav").addClass('detail-nav');
		  //   배경 흰색 네이비 일때 navBgOn 클래스 추가
		  $(".pg-detail.navBgOn .local-nav").css("background" , "#000");
        }
        else{
          $(".pg-main header").css("background" , "#fff");
          $(".pg-main header").css("background" , "#fff");
          $(".pg_detail .local-nav").css("background" , "none");
          $(".pg-detail .local-nav").css("background" , "none");
          $(".pg-detail .local-nav").addClass('detail-nav');
		  //   배경 흰색 네이비 일때 navBgOn 클래스 추가
          $(".pg-detail.navBgOn .local-nav").css("background" , "#000");
        }
      })
    })
</script>