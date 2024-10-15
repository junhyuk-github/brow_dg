<div class="sec-map" style="position: relative;">
	<div class="map_wrap">
		<div class="map-area">
			<div id="map" style="width:100%;height:100%;"></div>
			<script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=ivvlg84ssn"></script>
			<script>
			var map = new naver.maps.Map('map', {
				useStyleMap		:	true,
				center			:	new naver.maps.LatLng(35.871098, 128.733267),
				zoom			:	15,
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
		<div class="contact_info _contact_info">
			<div class="detail">
				<figure class="text-center">
					<img src="/common/img/main/logo-map.png" alt="contact us">
				</figure>
				<p class="__txt text-center">전화 또는 카카오톡으로 문의 주시면 친절한 상담 도와드리겠습니다.</p>
				<div class="__info">
					<div>
						<figure class="img-wrap"><img src="/common/img/main/icon/i-tell-renew.png" alt="contact us"></figure>
						<span>1555-4011  / 010-2469-0604</span>
					</div>
					<div>
						<figure class="img-wrap"><img src="/common/img/main/icon/i-kakao-renew.png" alt="contact us"></figure>
						<span>톡스앤필 브로우 대구점
							<!-- 240621 임시 미노출 -->
							<a class="btn-kakao" href="https://open.kakao.com/o/sAkEfwzg" target="_blank">상담하기</a>
							<!-- 240621 임시 미노출 -->
						</span>
					</div>
					<div>
						<figure class="img-wrap"><img src="/common/img/main/icon/i-time-renew.png" alt="contact us"></figure>
						<span>09:30~18:30 (매주 일요일 휴무)</span>
					</div>
					<div>
						<figure class="img-wrap"><img src="/common/img/main/icon/i-place-renew.png" alt="contact us"></figure>
						<span>대구광역시 동구 안심로73길 22, 롯데캐슬레전드상가 118호 <br>(신서동, 신서 롯데캐슬레전드)</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>