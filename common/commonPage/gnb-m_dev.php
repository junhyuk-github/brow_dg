<header id="header">
	<h1>
		<a href="/m/" title="톡스앤필 브로우 홈">
			<span class="sr-only">Toxnfill Brow</span>
		</a>
	</h1>
	<button type="button" class="btn btn-toggle">
		<span class="sr-only">전체메뉴 열기</span>
	</button>
</header>
<nav id="gnb">
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
				<a <? if( $common['userGroup'] == '3' || $common['userGroup'] == '4' ) {?> href="/m/member/user.php"<? } ?> class="loginBtn"><?=$common['userName']?>님</a>
				<a href="/m/member/logout.php" class="joinBtn">로그아웃</a>
				<? } else { ?>
				<a href="/m/member/login.php" class="loginBtn i">로그인</a>
				<a href="/m/member/join01.php" class="joinBtn">회원가입</a>
				<? } ?>
			</div>
			<ul class="depth1">
				<li id="intro">
					<a class="acd-head carvon-right">
						톡스앤필 브로우
					</a>
					<ul class="acd-body depth2"> 
						<!-- <li><a href="/m/intro/index.php">소개</a></li> -->
						<!-- <li><a href="/m/intro/lecturer.php">강사진</a></li> -->
						<li><a href="/m/intro/interior.php">시설안내</a></li>
						<li><a href="/m/intro/map.php">오시는 길</a></li>
					</ul>
				</li>
				<li id="curriculum">
					<a class="acd-head carvon-right">커리큘럼</a>
					<ul class="acd-body depth2"> 
						<li><a href="/m/curriculum/artist.php">아티스트</a></li>
						<li><a href="/m/curriculum/master.php">마스터</a></li>
						<li><a href="/curriculum/skatterSMP.php">스카터 SMP</a></li>
						<li><a href="/curriculum/mediSkincare.php">메디컬 스킨케어</a></li>
					</ul>	
				</li>
				<li id="commu">
					<a class="acd-head carvon-right">커뮤니티</a>
					<ul class="acd-body depth2"> 
						<li><a href="/m/commu/gallery.php">갤러리</a></li>
						<li><a href="/m/commu/studentWork.php">수강생 포트폴리오</a></li>
						<li><a href="/m/commu/review.php">수강생 실제후기</a></li>
					</ul>
				</li>
				<li id="contact">
					<a class="acd-head carvon-right">상담센터</a>
					<ul class="acd-body depth2"> 
						<li><a href="/m/contact/index.php">온라인 상담</a></li>
					</ul>
				</li>
				<li id="reservation">
					<a class="acd-head carvon-right">시술 예약</a>
					<ul class="acd-body depth2"> 
						<li><a href="/m/reservation/index.php">시술 예약</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
