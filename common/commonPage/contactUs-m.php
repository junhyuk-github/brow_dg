<section id="scroll-section-7" class="contact-sec">
	<div class="minframe">
		<div class="title_wrap left">
			<h2 class="title img_">
				<img src="/common/img/m/main/contact-us-tit.png" alt="">
			</h2>
			<span>전화 또는 카카오톡으로 문의 주시면<br/>친절한 상담 도와드리겠습니다.</span>
		</div>
		<div class="info-wrap">
			 <ul>
				<li class="">
					<span class="icon">
						<img src="/common/img/m/main/i-call.png" alt="">
					</span>
					<p class="txt_">
						<a href="tel:1555-0411">1555-4011  / 010-2469-0604</a>
					</p>
				</li>
				<li class="">
					<span class="icon">
						<img src="/common/img/m/main/i-talk.png" alt="">
					</span>
					<p class="txt_">
						톡스앤필 브로우 대구점
						<!-- 240621 임시 미노출 -->
						<!-- <a class="btn btn-dark" href="http://pf.kakao.com/_QgIAxj/chat" target="_blank">상담하기</a> -->
						<!-- 240621 임시 미노출 -->
					</p>
				</li>
				<li class="">
					<span class="icon">
						<img src="/common/img/m/main/i-clock.png" alt="">
					</span>
					<p class="txt_">
						09:30~18:30 (매주 일요일 휴무)
					</p>
				</li>
				<li class="">
					<span class="icon">
						<img src="/common/img/m/main/i-adress.png" alt="">
					</span>
					<p class="txt_">
						대구광역시 동구 안심로73길 22, <br>
						롯데캐슬레전드상가 118호 (신서동, 신서 롯데캐슬레전드)
					</p>
				</li>
			 </ul>
		</div>
		<div class="map-area">
			<div id="map" style="width:100%;height:100%;"></div>
			<script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=ivvlg84ssn"></script>
			<script>
			var map = new naver.maps.Map('map', {
				useStyleMap		:	true,
				center			:	new naver.maps.LatLng(35.870824, 128.725836),
				zoom			:	16,
				draggable		:	false,
				pinchZoom		:	false,
				scrollWheel		:	false,
				keyboardShortcuts:	false,
				disableDoubleTapZoom: true,
				disableDoubleClickZoom: true,
				disableTwoFingerTapZoom: true
			});

			var marker = new naver.maps.Marker({
				useStyleMap		:	true,
				position		:	new naver.maps.LatLng(35.870824, 128.725836),
				map				:	map
			});

			$("#map").on("click",function(e){
				e.preventDefault();

				map.setOptions({
					draggable	:	true,
					pinchZoom	:	true,
					scrollWheel	:	true,
					keyboardShortcuts: true,
					disableDoubleTapZoom: false,
					disableDoubleClickZoom: false,
					disableTwoFingerTapZoom: false
				});
			});
			</script>
		</div>
	</div>
</section>