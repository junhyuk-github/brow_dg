
<?php
$page_title = '톡스앤필 브로우 | 예약하기';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top.php';
?>

</head>

<body>

<div id="wrap" class="curri_artist">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb.php';
	?>

	<div id="container">
		<div id="titBanner" style="background-image:url('/common/img/reservation/banner1.jpg');"></div>
		<div class="class-content">
			<section class="gc-sec1">
				<div class="minframe">
					<div class="b_top_menu">
						<h2>시술 예약하기</h2>
					</div>
					<div class="b_reser_list">
						<div class="b_reser_card">
							<div class="card_inner">
								<h4>강남본원</h4>
								<table>
									<tbody>
										<tr>
											<th>주소</th>
											<td>서울 서초구 강남대로 415, 대동빌딩 10층 11층</td>
										</tr>
										<tr>
											<th>전화</th>
											<td>02-537-4842</td>
										</tr>
										<tr>
											<th>영업</th>
											<td>
												평일 10:30 ~ 21:00 / 토요일 10:30 ~ 17:00<br>
													(점심시간 12:30 ~ 14:00)<br>
													*일요일 및 공휴일 휴진
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="card_img thumb_center">
								<img src="/common/img/reservation/img1.jpg" alt="" class="">
							</div>
							<a class="btn_go vc_wrap" href="http://www.toxnfill1.com/serviceInfo.php?c=2541" name="강남본윈 예약하기" target="_blank">
								<span class="vc_inner">예약하기</span>
							</a>
						</div>
					</div>
				</div>
			</section>

			<section class="gc-sec2" id="scroll-section">
				<div class="minframe">
					<div class="b_top_menu">
						<h2>톡스앤필 브로우가 만드는 매혹적인 아름다움</h2>
					</div>
					<div id="instafeed" class="ins__wrap"></div>
					<p class="insta__btn_wrap">
						<button type="button" class="insta__btn" onclick="appendMedia();">INSTAGRAM 더보기+</button>
					</p>
				</div>
			</section>
			<?php
			include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/contactUs.php';
			?>
		</div>
	</div>
</div>


<script src="/common/js/instafeed.min.js"></script>

<script>

    var link = 'https://www.toxnfillbrow.com/contact/index.php';
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

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer.php';
?>
</body>

</html>