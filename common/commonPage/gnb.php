<header id="header">
	<div class="main-nav">
		<div class="minframe">
			<h1>
				<a href="/" title="톡스앤필 브로우 홈">
					<span class="logo"></span>
					<span class="sr-only">Toxnfill Brow</span>
				</a>
			</h1>
		</div>
		<nav id="gnb" class="gnb-right">
			<div class="minframe">
				<div class="depth2-bg"></div>
				<ul class="depth1">
					<li id="intro" class="">
							<h2>톡스앤필 브로우</h2>
							<ul class="depth2">
								<li class="list-ttl"><a href="/intro/identity.php">ABOUT</a></li>
								<li class="list-ttl"><a href="/intro/identity.php">사회공헌</a></li>
								<li class="list-ttl"><a href="/intro/identity.php">문화컨텐츠</a></li>
								<!--
								<li class="list-ttl"><a href="javascript:alert('준비중입니다.');">사회공헌</a></li>
								<li class="list-ttl"><a href="javascript:alert('준비중입니다.');">문화컨텐츠</a></li>
								-->
								<!-- <li><a href="/intro/index.php">소개</a></li> -->
								<!-- <li><a href="/intro/lecturer.php">강사진</a></li> -->
								<li class="list-ttl"><a href="/intro/browSpace.php">시설안내</a></li>
								<li class="list-ttl"><a href="/intro/browSpace.php">오시는 길</a></li>
							</ul>	
						</li> 
						<li>
							<h2>시술소개</h2>
							<ul class="depth2"> 
								<li class="sub-ttl"><a href="/introduction/index.php">SMP란?</a></li>
								<li class="sub-ttl"><a href="/introduction/index.php">TSMP란?</a></li>
								<li class="sub-ttl"><a href="/introduction/index.php">두상 유형벌 헤어라인 디자인</a></li>
								<li class="sub-ttl"><a href="/introduction/index.php">Before&After</a></li>
							</ul>	
						</li>
						<li id="curriculum">
							<h2>SMP 교육 가이드</h2>
							<ul class="depth2">
								<!--
								<li><a href="/curriculum/artist.php">아티스트</a></li>
								<li><a href="/curriculum/master.php">마스터</a></li>
								<li><a href="/curriculum/skatterSMP.php">스카터 SMP</a></li>
								<li><a href="/curriculum/mediSkincare.php">메디컬 스킨케어</a></li>
								-->

								<li class="sub-ttl"><a href="/curriculum/index.php">SMP 베이직 클래스</a></li>
								<li class="sub-ttl"><a href="/curriculum/index.php">TSMP 심화 클래스</a></li>
								<li class="sub-ttl"><a href="/curriculum/index.php">SMP ALL 마스터 클래스</a></li>
								<li class="sub-ttl"><a href="/curriculum/index.php">SMP 창업 클래스</a></li>
								<li class="sub-ttl"><a href="/curriculum/index.php">SMP 속성 클래스</a></li>
								<li class="sub-ttl"><a href="/curriculum/index.php">SMP 숱채움 마스터 클래스</a></li>
								<li class="sub-ttl"><a href="/curriculum/index.php">반영구 클래스</a></li>
								<li class="sub-ttl"><a href="/curriculum/index.php">눈썹 단과반</a></li>
								<li class="sub-ttl"><a href="/curriculum/index.php">사후 과정</a></li>
							</ul>	
						</li>
						<li id="commu">
							<h2>브로우 커뮤니티</h2>
							<ul class="depth2">
								<!--
								<li class="sub-ttl"><a href="javascript:alert('준비중입니다.');">공지사항</a></li>
								<li class="sub-ttl"><a href="javascript:alert('준비중입니다.');">아카데미 뉴스</a></li>
								-->
								<li class="sub-ttl"><a href="https://www.instagram.com/p/Cu3s3f0u1Ld/" target="_blank">SNS</a></li>
								<!-- <li class="sub-ttl"><a href="/commu/gallery.php">갤러리</a></li> -->
								<li class="sub-ttl"><a href="/commu/studentWork.php">수강생 포트폴리오</a></li>
								<!--
								<li class="list-ttl"><a href="/commu/review.php">수강생 실제후기</a></li>
								<li class="sub-ttl"><a href="javascript:alert('준비중입니다.');">EVENT</a></li>
								-->
							</ul>
						</li>
						<li id="contact">
							<h2>상담신청</h2>
							 <ul class="depth2">
								<li class="sub-ttl"><a href="/contact/index.php">상담신청하기</a></li>
							</ul>
						</li>
						<!--
						<li id="reservation">
							<h2>시술 예약</h2>
							 <ul class="depth2">
								<li><a href="/reservation/index.php">시술 예약</a></li>
							</ul>
						</li>
						-->
				</ul>
			</div>
		</nav>
	</div>
	<div class="top-nav">
		<div class="minframe">
			<ul class="sns-link">
				<li class="instagram">
					<a href="https://instagram.com/toxnfillbrow_master?igshid=YmMyMTA2M2Y=" target="_blank">인스타그램
						<img src="/common/img/icon/sns/instagram_gray.png" alt="instagram" class="normal">
						<img src="/common/img/icon/sns/instagram_red.png" alt="instagram" class="hover">
					</a>
				</li>
				<li class="kakaoPlus">
					<a href="https://pf.kakao.com/_QgIAxj" target="_blank">카카오톡 플러스친구
						<img src="/common/img/icon/sns/kakao_gray.png" alt="kakaotalk" class="normal">
						<img src="/common/img/icon/sns/kakao_red.png" alt="kakaotalk" class="hover">
					</a>
				</li>
			</ul>
			<ul class="tn-right">
				<? if ( $common['userIdx'] ) { ?>
				<li>
					<a <? if( $common['userGroup'] == '3' || $common['userGroup'] == '4' ) {?> href="/member/user.php"<? } ?>><?=$common['userName']?>님</a>
				</li>
				<li><a href="/member/logout.php">로그아웃</a></li> 
				<? } else { ?>
				<li><a href="/member/login.php">로그인</a></li>
				<li><a href="/member/join01.php">회원가입</a></li>
				<? } ?>
				<li><a href="javascript:bookmarkAlert();">즐겨찾기</a></li>
				<li><span class="txt">대표전화 02-554-4842</span></li>
			</ul>
		</div>
	</div>
</header> 
