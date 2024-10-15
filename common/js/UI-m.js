'use strict';

$(function(){
	var $window			=	$(window);
	var $wrap			=	$('#wrap');
	var viewportW		=	$window.width();
	var viewportH		=	$window.height();
	var nowPath			=	window.location.pathname;

	var UI = {
		init : function(){
			//UI.MinHeight();
			UI.Nav();
			UI.subTab();
			UI.GoTop();
		},

		MinHeight : function(){
			var $Footer	=	$('#footer');
			var wrapH	=	viewportH;

			$wrap.css('minHeight', wrapH);
			$window.resize(function(){
				wrapH			=	viewportH;
				$wrap.css('minHeight', wrapH);
			})
		},
		Nav : function(){
			var $Header			=	$('#header');
			var $Nav			=	$('#gnb');
			var $oneMenu		=	$('.depth1 > li');
			var $towDepth		=	$('.depth2');
			var $closeBtn		=	$Nav.find('.btn-close');
			var $openBtn		=	$Header.find('.btn-toggle');
			var $logo			=	$Header.find('.logo img');
			var currentMenu		=	nowPath.replace('Detail', '').split('/');
			var currentCateg	=	currentMenu[2].replace('.php', '');
			//var currentPage		=	currentMenu[currentMenu.length-1].replace('.php', '');

			$openBtn.on('click', function(){ //nev on
				$Nav.addClass('on');
				$('html').addClass('html-fix');
				$wrap.addClass('navOn');

				//$oneMenu.filter(function(){ // one dapth url active
					//return this.id == currentCateg;
				//}).addClass('active');

				$('.nav-two-depth > li').filter(function(){ // two depth url active
					return this.id == currentPage;
				}).addClass('active');
			});

			accordionUI('#gnb .depth1', 'up');
			function accordionUI (wrap, active) {
				var $wrap		=	$(wrap);
				var $arHead		=	$wrap.find('.acd-head');
				var $arBody		=	$wrap.find('.acd-body');
				var arBody		=	'.acd-body';

				$arBody.hide();
				$arHead.click(function() {
					if ($arBody.is(':visible')) {
						$arBody.slideUp(200);
						$arHead.removeClass(active);
					}

					if ($(this).next(arBody).is(':visible')) {
						$(this).next(arBody).slideUp(200);
						$(this).removeClass(active);

					} else {
						$(this).next(arBody).slideDown(200);
						$(this).addClass(active);

					}
				});
			};


			$closeBtn.on('click', function(){
				closeNav();
			});

			function closeNav() {
				$Nav.removeClass('on');
				$oneMenu.removeClass('active');
				$towDepth.slideUp(200);
				$('html').removeClass('html-fix');
				$wrap.removeClass('navOn');
			};

		},
		subTab : function(){
			nowPath = nowPath.replace('View', '');

			$('.towDepth-tab a').filter(function(){
				return this.pathname == nowPath;
			}).parent().addClass('active');
		},
		GoTop : function(){
			var $btn	=	$('.btn-goTop');
			var reach	=	500;

			window.onscroll = function() {
				goTopFunc();
			};

			function goTopFunc(){
				if ( document.body.scrollTop > reach || document.documentElement.scrollTop > reach ) {
					$btn.show();
				} else {
					$btn.hide();
				}
			}

			$btn.on('click', function() {
				$("html, body").stop().animate({"scrollTop": 0}, 400);
				$('body').removeClass("local-nav-sticky");
				
			});
		},

		bordDetail : function() {
			var $bordCont		=	$('.board-content');
			var $bordContImg	=	$bordCont.find('img');
			var maxWidth		=	300;

			if($bordContImg.width() > maxWidth){
				$bordContImg.css('width', '100%');
			}
		},
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
	var $carvon		=	$wrap.find('.i-round-carvon');
	var carvon		=	'.i-round-carvon';
	console.log('??');
	$arBody.hide();
	$arHead.click(function() {
		if ($arBody.is(':visible')) {
			$arBody.slideUp(200);
			$carvon.removeClass('up');

			if(typeof active === 'string'){
				$arHead.removeClass(active);
			}
		}
		console.log('????');

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
//<![CDATA[
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

function cosmosfarm_share_kakaostory(url, text){
	Kakao.Story.share({
		url: encodeURI(url),
		text: text
	});
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
		case 'kakaotalk': shareKakao(url, title); break;
		case 'google': cosmosfarm_share_google(url); break;
		case 'line': cosmosfarm_share_line(url, title); break;
	}
	return false;
}
 //]]>