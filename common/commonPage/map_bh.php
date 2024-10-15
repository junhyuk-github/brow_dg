<div class="sec-map" style="position: relative;">
	<div class="map_wrap">
		<div class="map-area">
			<div id="map" style="width:100%;height:100%;"></div>
			<script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=ivvlg84ssn"></script>
			<script>
			var map = new naver.maps.Map('map', {
				useStyleMap		:	true,
				center			:	new naver.maps.LatLng(37.5013577, 127.0357776),
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
				position		:	new naver.maps.LatLng(37.499437032308876, 127.0276304140299),
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
						<span>02-554-4842</span>
					</div>
					<div>
						<figure class="img-wrap"><img src="/common/img/main/icon/i-kakao-renew.png" alt="contact us"></figure>
						<span>톡스앤필 브로우 <a class="btn-kakao" href="http://pf.kakao.com/_QgIAxj/chat" target="_blank">상담하기</a></span>
					</div>
					<div>
						<figure class="img-wrap"><img src="/common/img/main/icon/i-time-renew.png" alt="contact us"></figure>
						<span>10:30~18:30</span>
					</div>
					<div>
						<figure class="img-wrap"><img src="/common/img/main/icon/i-place-renew.png" alt="contact us"></figure>
						<span>서울특별시 강남구 테헤란로 1길 17, 6층 <br> 신분당선/2호선 강남역 11번 출구에서 도보 2분</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>