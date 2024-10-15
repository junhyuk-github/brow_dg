<section class="ms-7" style="background-color: #F5F6F8">
	<div class="minframe">
		<div class="tit-box">
			<h3><img src="/common/img/m/main/ms-tit5.png" alt="CONTACT US"></h3>
			<span class="ms-sub">궁금한 사항은 전화 또는 카카오톡 메신저로 문의주세요.</span>
		</div>
		<div class="info-area">
			 <ul>
				<li class="">
					<img src="/common/img/m/main/loca1.png" alt="">
					<span>
						서울특별시 강남구 테헤란로 1길 17, 6층<br/>
						신분당선/2호선 강남역 11번 출구에서 도보 2분
					</span>
				</li>
				<li>
					<img src="/common/img/m/main/loca2.png" alt="">
					<span><a href="tel:02-554-4842">02-554-4842</a></span>
				</li>
				<li class="">
					<a href="https://pf.kakao.com/_QgIAxj" target="_blank"><img src="/common/img/main/loca-icon3.png" alt=""></a>
					<span>톡스앤필 브로우</span>
				</li>
			 </ul>
		</div>
	</div>
	<div class="map-area">
		<div id="map" style="width:100%;height:100%;"></div>
		<script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=ivvlg84ssn"></script>
		<script>
		var map = new naver.maps.Map('map', {
			useStyleMap		:	true,
			center			:	new naver.maps.LatLng(37.499437032308876, 127.0276304140299),
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
</section>