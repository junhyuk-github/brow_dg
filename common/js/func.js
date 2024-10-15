/**
 *
 * 기능 클래스
 *
 *
 **/
Common = {
	FBLogin: function(returnUrl) {
		FB.getLoginStatus(function(response) {
			Common.FBstatusChangeCallback(response,returnUrl);
		});
	},
	FBstatusChangeCallback: function(response,returnUrl) {
		if(response.status == 'connected') {
			// PHP SDK 로 로그인 세션 생성 전달
			Common.consoleLog(response.authResponse);
			$.ajax({
				type: "POST",
				url: '/site/fbLogin',
				data: {
					'accessToken' : response.authResponse.accessToken,
					'returnUrl' : returnUrl
				},
				dataType: "json",
				success: function (json) {
					if( json.code > 0 ){
						if(json.app > 0) {
							var _returnUrl = Common.getCookie('returnUri');
							if(_returnUrl == '' || _returnUrl == null){
								_returnUrl = '/';
							}
							if(window.opener) {
								window.opener.location.href = _returnUrl;
							}
							else{
								window.location.href = _returnUrl;
							}
						}
						else
							location.href = json.returnUrl;
					}else{
						alert(json.msg);
					}
				},
				error: function(xhr) {
					alert("페이스북 로그인 중 오류가 발생했습니다. 고객 센터에 문의해주세요");
				}
			});
		} else {
			FB.login(function(response) {
				if (response.authResponse) {
					Common.FBstatusChangeCallback(response);
				} else {
					Common.consoleLog('권한을 승인하지 않음');
				}
			}, {
				scope:'email,public_profile'
			});
		}
	},
	
	/**
	 * 디버깅용 콘솔 출력
	 * @param {*} msg
	 */
	consoleLog: function (msg) {
		if (typeof console == 'object') {
			console.log(msg)
		}
	},
	/**
	 *
	 *  새로운 창 생성
	 * @(#) openWindow()
	 **/
	openWindow: function (url, width, height, winName, left, top) {
		if (!width) width = 400;
		if (!height) height = 300;
		if (!winName) winName = '';
		if (!left) left = '';
		if (!top) top = '';
		var newWin = window.open(url, winName, 'width=' + width + ',height=' + height + ',left=' + left + ',top=' + top + ',history=yes,resizable=yes,status=yes,scrollbars=yes,menubar=no');
		if (newWin != null) {
			newWin.focus();
		}
		return newWin;
	},
	/**
	 *
	 *  탭 기능
	 * @
	 **/
	 tabUI: function tabUI(wrap){
		var $wrap					=	$(wrap);
		var $tabItem				=	$wrap.find('.tab-item');
		var $tabItemF				=	$wrap.find('.tab-item:first-of-type');
		var $tabPanel				=	$wrap.find('.tab-panel');
		var $tabPanelF				=	$wrap.find('.tab-panel:first-of-type');

		$tabItemF.addClass('active').attr('tabindex', '0');
		$tabPanelF.addClass('active').attr('tabindex', '0');

		$tabItemF.attr('aria-selected', 'true');

		$tabItem.on('mousedown', function(){
			$(this).addClass('active')
				.attr({'tabindex':'0', 'aria-selected': 'true'}).focus()
				.siblings().removeClass('active')
				.attr({'tabindex':'-1', 'aria-selected': 'false'});
			$('#' + $(this).attr('aria-controls'))
				.attr('tabindex', '0').addClass('active')
				.siblings('.tab-panel').attr('tabindex', '-1').removeClass('active');
		});
	},
	/**
	 *
	 *  뒤로
	 @(#) goBack( {or m})
	 **/
	 goBack: function (divice) {
		var homepage	=	'https://www.toxnfillacademy.com/';
		if( divice == 'm') {
			var homepage	=	'https://www.toxnfillacademy.com/m/';
		}
		document.referrer && -1 != document.indexOf('https://www.toxnfillacademy.com/')?
			 history.back(-1) : location.href = homepage;
	 }
}	