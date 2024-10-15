<?php
$page_title = '톡스앤필 브로우 | 커리큘럼';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top-m.php';
?>

</head>

<body>

<div id="wrap" class="">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb-m.php';
	?>
		
	<div id="container">
		<?php
		$category	=	'reservation';
		include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/subTab-m.php';
		?>
		<div id="titBanner" style="background-image:url('/common/img/reservation/banner1_m.jpg');"></div>
		
		<div class="class-content">
			<section class="gc-sec1">
				<div class="minframe">
					<div class="b_content">
						<div class="gc-tit">
							<h3>시술 예약하기</h3>
						</div>
						<div class="b_reservList">
							<div class="b_reser_card">
								<div class="card_inner">
									<h3 class="tit">강남본원</h3>
									<a href="tel:02-537-4842" class="card_call">
										<img src="/common/img/reservation/phone_round.png" alt="전화연동">
									</a>
									<p>서울 서초구 강남대로 415, 대동빌딩 10층 11층</p>
									<p class="oper_time">
										<img src="/common/img/reservation/time.png" alt="영업시간">
										<span>
											<b>영업시간</b><br>
											평일 10:30 ~ 21:00<br>
											토요일 10:30 ~ 17:00<br>
											(점심시간 12:30 ~ 14:00)<br>
											*일요일 및 공휴일 휴진
										</span>
									</p>
									<div class="c_btn_wrap both_end">
										<div class="left">
											<a href="http://pf.kakao.com/_xgWujl" class="btn d-block" name="">
												<span><img src="/common/img/reservation/kakao.svg" alt="카카오톡" width="25px" height="25px" class="v-middle"></span>
												<span>상담하기</span>
											</a>
										</div>
										<div class="right">
											<a href="http://www.toxnfill1.com/serviceInfo.php?c=2541" class="btn d-block" name="">
												예약하기
											</a>
										</div>
									</div>
								</div>
								<div class="card_img thumb_center">
									<img src="/common/img/reservation/img1.jpg" alt="강남본원 매장">
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="gc-sec2" id="scroll-section">
				<div class="minframe">
					<div class="gc-tit">
						<h3>톡스앤필 브로우가 만드는 매혹적인 아름다움</h3>
					</div>
					<div id="instafeed" class="ins__wrap"></div>
					<p class="insta__btn_wrap">
						<button type="button" class="insta__btn" onclick="appendMedia();">INSTAGRAM 더보기+</button>
					</p>
				</div>
			</section>
			<?php
			include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/contactUs-m.php';
			?>
		</div>
	</div>

	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/floating-m.php';
	?>

	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer-m.php';
	?>
</div>

<script src="/common/js/instafeed.min.js"></script>

<script>

    var link = 'https://www.toxnfillbrow.com/m/contact/index.php';
    location.href=link;

    let instagramMediaList			=	[];
let mediaPage					=	0;
$(function(){
	var feed					=	new Instafeed({
		target						:	'instafeed',
		accessToken					:	'IGQVJYazZAqMTM3bk5pNEx4Tm01N1QwN2ZAkUXpSTDBzSEQycmxhVWdUNXgxSlhlQmxRYVhPSVRhUXhObzJhdjVNMVF3ZAk9OVklPTU00NjBVUFdsdkxCX1c2RXNiUHIxSk1vVzY1dkRPcXBoQnFKQ1gxdwZDZD',
		limit						:	20,
		mock						:	true,
		success						:	function(response)
		{
			//console.log(response);
			var data				=	response.data;
			for ( let idx in data )
			{
				if ( data[idx].media_type == 'IMAGE' ) {
					instagramMediaList.push(data[idx]);
				}
			}
			appendMedia();
		}
	});
	feed.run();

	// 인스타그램 리스트 가져오기
	function getInstagramMedia()
	{
		$.ajax({
			url						:	"/common/commonPage/getInstagram.php",
			type					:	"GET",
			dataType				:	"json",
			async					:	true,
			success					:	function(response)
			{
				//console.log(response);
				if ( response.code == 1 ) {
					instagramMediaList = response.data;
					appendMedia();
				} else {
					console.log('Failed to get instagram media list');
				}
			}
		});
	}
	//getInstagramMedia();
});

// 화면에 출력 - 6개씩
function appendMedia()
{
	let html					=	'';
	let list					=	instagramMediaList.slice(6 * mediaPage, 6 * mediaPage + 6);
 
	if ( list.length <= 0 ) return;

	for ( let arr in list )
	{
		if ( list[arr].media_type == 'IMAGE' ) {
			html				+=	`
									<div class="ins__img">
										<a target="_blank" class="insta-imgBox active" href="${list[arr].permalink}"><img title="${list[arr].caption}" src="${list[arr].media_url}"><span class="insta-body"></span></a>
									</div>
									`;
		}
	}

	$( "#instafeed" ).append(html);
	mediaPage++;

	// 더보기 버튼 삭제
	if ( mediaPage == 2 ) $( "#scroll-section .insta__btn_wrap" ).hide();
	// 컨텐츠 높이 재설정
	$( "#instafeed" ).css("height", "auto");
}
</script>

</body>
</html>