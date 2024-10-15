	<ul class="towDepth-tab">
		<?php if($category == 'commu'){ ?>
			<li><a href="/m/commu/gallery.php">갤러리</a></li>
			<li><a href="/m/commu/studentWork.php" onfocus="this.blur()">수강생 포트폴리오</a></li>
			<li><a href="/m/commu/review.php">수강생 실제후기</a></li>
		<?php } else if($category == 'contact'){ ?>
			<li><a href="/m/contact/index.php">온라인 상담</a></li>
		<?php } else if($category == 'reservation'){ ?>
			<li><a href="/m/reservation/index.php">시술예약</a></li>
<!-- 			<li><a href="/m/reservation/index.php">온라인 상담</a></li> -->
		<?php } else if($category == 'intro'){ ?>
			<!-- <li><a href="/m/intro/">소개</a></li> -->
			<!-- <li><a href="/m/intro/lecturer.php">강사진</a></li> -->
			<li><a href="/m/intro/interior.php">시설안내</a></li>
			<li><a href="/m/intro/map.php">오시는 길</a></li>
		<?php } else if($category == 'curri'){ ?>
			<li><a href="/m/curriculum/artist.php">아티스트</a></li>
			<li><a href="/m/curriculum/master.php">마스터</a></li>
			<li><a href="/m/curriculum/skatterSMP.php">스카터 SMP</a></li>
			<li><a href="/m/curriculum/mediSkincare.php">메디컬 스킨케어</a></li>
		<? } ?>
	</ul>
