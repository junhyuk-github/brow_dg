'use strict';

$(function(){
	var $window			=	$(window);
	var viewportW		=	$window.width();
	var viewportH		=	$window.height();
	var nowPath			=	window.location.pathname;
	var contentHeight	=	$(document).height() - $('#Header').height();
	var $wrap			=	$('#wrap');
	var $Container		=	$('#Container');
	var noNavFix		=	$wrap.hasClass('noNavFix');

	var UI = {
		init : function(){
			UI.browserCheck();
			UI.nav();
			//UI.minHeight();
			//UI.Modal();
		},
		browserCheck : function(){
			function isIE () {
			   var myNav = navigator.userAgent.toLowerCase();
			   return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
			}    
			var ua = window.navigator.userAgent;
			//Internet Explorer | if | 9-11

			var $CssError = $('#CssError');

			if (isIE () == 9) {
			   alert('해당 웹 사이트는 Internet Explorer10 버전 이상 환경에 최적화되어 있습니다.\n브라우저를 최신버전으로 업그레이드하시거나 크롬(Chrome)과 같은 최신 브라우저를 이용해주세요.');
			} 
		},
		minHeight : function(){
			var $footerH	=	$('#footer').outerHeight();
			var minHeight	=	viewportH - $footerH;

			$wrap.css('min-height', minHeight);
		},
		nav : function(){
			var $header			=	$('#header');
			var $gnb			=	$('#gnb');
			var $depth1			=	$gnb.find('.depth1 > li');
			var isMain			=	$wrap.hasClass('main');   /*메인에서만*/
			var now1depth		=	nowPath.split('/')[1];
			var $now1depth		=	'li#' + now1depth;

			/*마우스 on*/
			$depth1.on("mouseenter", function(){ 
				$header.addClass('on');
			});
			/*마우스 off*/
			$depth1.on("mouseleave", function(){ 
				if(isMain){
					$header.removeClass('on');
				}
			});

			/*url에 따른 메뉴 엑티브*/
			//if(nowPath.indexOf(now1depth)) {
				//$($now1depth).addClass('active');
				//$depth1.on("mouseenter", function(){ 
					//$($now1depth).removeClass('active');
				//});
				//$depth1.on("mouseleave", function(){ 
					//$($now1depth).addClass('active');
				//});
			//}
			nowPath = nowPath.replace('View', '');
			$('#gnb .depth2 a').filter(function(){
				return this.pathname == nowPath;
			}).parent().addClass('active');


			$window.on('mousewheel',function(e){
				navScroll(e.originalEvent.deltaY);
			}).scroll(function(){
				var scrollT		=	$window.scrollTop();
				var navTopH		=	123; /*nav top height*/
				if(isMain){
					var navTopH		=	40; /*nav top height*/
					var $mainBannerH	=	$('.main-visual-swiper').height();
					if($mainBannerH <scrollT){
						$header.addClass('fixbg');
					}
				}

				if(scrollT > navTopH){ 
					$header.addClass('fix');
				} else {
					$header.removeClass('fix');
				}

			});

			function navScroll(e){
				if( e > 0){
					//휠을 아래로
					$header.addClass('fixbg');
				} else {
					//휠을 위로
				}
			};

		},
		Modal : function(){
			var $modal			=	$('.modal');
			var $onModal		=	$('[data-toggle="modal"]');
			var $closeBtn		=	$('.modal-close');


			$onModal.on('click', function(e){
				var $target = $( $(this).attr('data-target'));
				openModal($target);


				$closeBtn.on('click', function(){
					 closeModal($target);
				});

				$target.on('click', function(e){
					if (e.target !== e.currentTarget) return;
					closeModal($target);
				});
			});

			function openModal() {
				$modal.css('visibility', 'visible');
				$('body').addClass('modal-open');
				setTimeout(function(){
					$modal.addClass('on');
				},100)
			}	

			function closeModal(target) {
				target.css('visibility', 'hidden');
				target.removeClass('on');
				$('body').removeClass('modal-open');
			}
		},



		twoDethMenu : function(){ 
			var $subDepthWrap		= $('#subDepthWrap');
					
			var currentMenu			= nowPath.replace('Detail', '');
			var currentSplit		= currentMenu.split('/', 4);
			var currentCateg		= currentSplit.join('/');
			var loadImg				= $('.load-img');
			var i;
			var st;

			// make category
			if($('.brd-tablist').next().hasClass('tab-tow-depth')) {
				currentCateg += '/';
			}

			//서브 페이지 2 depth 메뉴 엑티브
			$('.brd-tablist > li > a').filter(function(element, index){
				return this.pathname == currentCateg;
			}).parent().addClass('active');
			
			//서브 페이지 3 depth 메뉴 show
			function threeShow() {
				i = $('.brd-tablist > li.active').index();
				$('.tab-tow-depth > ul').removeClass('on');
				$('.tab-tow-depth > ul').eq(i).addClass('on');
			}
			threeShow();
			/*마우스 on*/
			$('.brd-tablist > li').on("mouseenter", function(){ 
				$('.brd-tablist > li').removeClass('active');
				$(this).addClass('active');
				threeShow();
			});
			/*마우스 off*/
			$('#subDepthWrap').on("mouseleave", function(){ 
				$('.brd-tablist > li').removeClass('active');
				$('.brd-tablist > li > a').filter(function(element, index){
					return this.pathname == currentCateg;
				}).parent().addClass('active');
				threeShow();
			});


			//서브 페이지 3 depth 메뉴 엑티브
			$('.tab-tow-depth .brd-tab > a').filter(function(){
				return this.pathname == currentMenu;
			}).parent().addClass('active');

			//get height
			var subDepthHeight		= $subDepthWrap.height();
			$('.sub-depth-h').css('min-height', subDepthHeight);
			
			//stiky
			$("<img/>").load(function () {
				var ContHeihgt = $Container.height() + subDepthHeight + $('#Footer').outerHeight();

				if( noNavFix && $window.height() < ContHeihgt ) {
					var offsetSD		= $subDepthWrap.offset().top;
					$window.on("scroll", function(){
						st		= $window.scrollTop();
						if(st > offsetSD){
							$subDepthWrap.addClass('stiky');

						} else {
							$subDepthWrap.removeClass('stiky');
						}
					});
				}
			}).attr("src", loadImg.attr("src"));

		}
	};

	UI.init();
});

/*
	아코디언 UI
	사용: accordionUI('.as-section2'[, 'active']);
*/
function accordionUI (wrap, active) {
	active = active || false;
	var $wrap		=	$(wrap);
	var $arHead		=	$wrap.find('.acd-head');
	var $arBody		=	$wrap.find('.acd-body');
	var arBody		=	'.acd-body';
	var $carvon		=	$wrap.find('.icon-round-carvon');
	var carvon		=	'.icon-round-carvon';

	$arBody.hide();
	$arHead.click(function() {
		if ($arBody.is(':visible')) {
			$arBody.slideUp(200);
			$carvon.removeClass('up');

			if(typeof active === 'string'){
				$arHead.removeClass(active);
			}
		}

		if ($(this).next(arBody).is(':visible')) {
			$(this).next(arBody).slideUp(200);
			$(this).find(carvon).removeClass('up');

			if(typeof active === 'string'){
				$(this).removeClass(active);
			}
		} else {
			$(this).next(arBody).slideDown(200);
			$(this).find(carvon).addClass('up');

			if(typeof active === 'string'){
				$(this).addClass(active);
			}
		}
	});
};

/*
	모달창 UI
	사용: openModal('#id');
*/
function openModal(target){
	var $modal			=	$('.modal');
	var $closeBtn		=	$('.modal-close');
	var $target = $('#' + target);


	openModal($target);


	$closeBtn.on('click', function(){
		 closeModal($target);
	});

	$target.on('click', function(e){
		if (e.target !== e.currentTarget) return;
		closeModal($target);
	});

	function openModal() {
		$modal.css('visibility', 'visible');
		$('body').addClass('modal-open');
		setTimeout(function(){
			$modal.addClass('on');
		},100)
	}	

	function closeModal(target) {
		target.css('visibility', 'hidden');
		target.removeClass('on');
		$('body').removeClass('modal-open');
	}
};

function bookmarkAlert() {
	alert('Ctrl+D를 이용해 톡스앤필 브로우를 즐겨찾기에 추가할 수 있습니다.');
}

function openPolicy(target){
	var page =  '/' + target + '.php';
	window.open(page, target, 'width=550, height=500, top=80, left=500, scrollbars=yes');
}

/*
	탭 UI
	사용: tabUI('element', 초기탭num);
*/
function tabUI(wrap, num) {
	if (!num) num = 1;
	var $wrap					=	$(wrap);
	var $tabItem				=	$wrap.find('.tab-item');
	var $tabItemF				=	$wrap.find('.tab-item#tab' + num);
	var $tabPanel				=	$wrap.find('.tab-panel');
	var $tabPanelF				=	$wrap.find('.tab-panel#tab-panel' + num);

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
}


/***************share**************/
function cosmosfarm_share_is_mobile(){
	var mobile = new Array('iPhone', 'iPad', 'iPod', 'BlackBerry', 'Android', 'Windows CE', 'LG', 'MOT', 'SAMSUNG', 'SonyEricsson', 'Opera Mini', 'IEMobile');
	for(var word in mobile){
		if(navigator.userAgent.match(mobile[word]) != null) return true;
	}
	return false;
}

function cosmosfarm_share_facebook(url){
	var w = 720;
	var h = 350;
	jQuery.post('https://graph.facebook.com', {id:encodeURI(url),scrape:true});
	window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(url), 'cosmosfarm_share', 'width='+w+',height='+h+',left='+(screen.availWidth-w)*0.5+',top='+(screen.availHeight-h)*0.5);
	return false;
}
function cosmosfarm_share_twitter(url, text){
	var w = 720;
	var h = 350;
	window.open('https://twitter.com/intent/tweet?text='+encodeURIComponent(text)+'&url='+encodeURIComponent(url), 'cosmosfarm_share', 'width='+w+',height='+h+',left='+(screen.availWidth-w)*0.5+',top='+(screen.availHeight-h)*0.5);
	return false;
}

function cosmosfarm_share_kakaostory(url, text){
	Kakao.Story.share({
		url: encodeURI(url),
		text: text
	});
	return false;
}
function cosmosfarm_share_kakaotalk(url, text){
	if(cosmosfarm_share_is_mobile()){
		if(jQuery('meta[property="og:image"]').last().attr('content')){
			Kakao.Link.sendTalkLink({
				label: text,
				image:{
					src: jQuery('meta[property="og:image"]').last().attr('content'),
					width: jQuery('meta[property="og:image:width"]').last().attr('content')?jQuery('meta[property="og:image:width"]').last().attr('content'):'100',
					height: jQuery('meta[property="og:image:height"]').last().attr('content')?jQuery('meta[property="og:image:height"]').last().attr('content'):'100'
				},
				webLink:{
					text: '전체보기',
					url: encodeURI(url)
				}
			});
		}
		else{
			Kakao.Link.sendTalkLink({
				label: text,
				webLink:{
					text: '전체보기',
					url: encodeURI(url)
				}
			});
		}
	}
	else{
		alert('카카오톡이 설치된 모바일에서만 가능합니다.');
	}
	return false;
}
function cosmosfarm_share_google(url){
	var w = 600;
	var h = 600;
	window.open('https://plus.google.com/share?url='+encodeURIComponent(url), 'cosmosfarm_share', 'width='+w+',height='+h+',left='+(screen.availWidth-w)*0.5+',top='+(screen.availHeight-h)*0.5);
	return false;
}
function cosmosfarm_share_line(url, text){
	if(cosmosfarm_share_is_mobile()){
		var w = 410;
		var h = 540;
		window.open('http://line.me/R/msg/text/?'+encodeURIComponent(text)+encodeURIComponent("\n")+encodeURIComponent(url), 'cosmosfarm_share', 'width='+w+',height='+h+',left='+(screen.availWidth-w)*0.5+',top='+(screen.availHeight-h)*0.5);
	}
	else{
		alert('라인이 설치된 모바일에서만 가능합니다.');
	}
	return false;
}
function cosmosfarm_share(sns, url, title){
	switch(sns){
		case 'naver': cosmosfarm_share_naver(url, title); break;
		case 'facebook': cosmosfarm_share_facebook(url); break;
		case 'twitter': cosmosfarm_share_twitter(url, title); break;
		case 'band': cosmosfarm_share_band(url, title); break;
		case 'kakaostory': cosmosfarm_share_kakaostory(url, title); break;
		case 'kakaotalk': cosmosfarm_share_kakaotalk(url, title); break;
		case 'google': cosmosfarm_share_google(url); break;
		case 'line': cosmosfarm_share_line(url, title); break;
	}
	//return false; IE에서 오류남
}

