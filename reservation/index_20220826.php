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
							<a class="btn_go vc_wrap" href="http://www.toxnfill1.com/serviceInfo.php?c=2541" name="강남본윈 예약하기">
								<span class="vc_inner">예약하기</span>
							</a>
						</div>
					</div>
				</div>
			</section>
			<section class="gc-sec2">
				<div class="minframe">
					<div class="b_top_menu">
						<h2>톡스앤필 브로우가 만드는 매혹적인 아름다움</h2>
					</div>
					<div id="instafeed" class="ins__wrap"></div>
					<p class="insta__btn_wrap">
						<button type="button" class="insta__btn">INSTAGRAM 더보기+</button>
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

<script type="text/javascript">
var feed						=	new Instafeed({
	get							:	'user',
	userId						:	'17841447922145763',
	clientId					:	'1620880168307458',
	target						:	'instafeed',
	sortBy						:	'most-recent',
	limit						:	6,
	template					:	'<div class="ins__img"><a target="_blank" class="insta-imgBox active" href="{{link}}"><img title="{{caption}}" src="{{image}}" /><span class="insta-body"></span></a></div>',
	accessToken					:	'IGQVJXZADQteElTaGFZANE1jWjlTZAENBUHFBSFRpY1VMQkNCeTZARVHJSWFVEbWZACb25iZAUdsdER3akV4VVg2MEotM1FnNkVsN3V4ZA1VncDlhOFFmcHlabUNpU3VxcHdDNzhOY3FUQzYwTWdKdjhhWVFXQwZDZD'
});
feed.run();
</script>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer.php';
?>
</body>

</html>