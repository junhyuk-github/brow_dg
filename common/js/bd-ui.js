'use strict';

$(function(){
	var $window			=	$(window);
	var viewportW		=	$window.width();
	var viewportH		=	$window.height();
	var nowPath			=	window.location.pathname;
	var contentHeight	=	$(document).height() - $('#Header').height();
	var $Container		=	$('#Container');
	var noNavFix		=	$('#Warp').hasClass('noNavFix');

	var UI = {
		init : function(){
			UI.browserCheck();
			UI.nav();
			UI.bcSideMenu();
			UI.bcSelectList();
			UI.twoDethMenu();
			UI.Modal();
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
		bcSideMenu : function(){
			var $bcPopup	= $('.bc-popup');
			var $showUPB	= $('.showUPB');
			var $dimmer		= $('.dimmer');
			var $bcSidemenu = $('.bc-sidemenu');
			var $closeBtn	= $('.bc-sidemenu .close-btn');

			$showUPB.on('click', function(){
				$('html').addClass('modal-open');
				TweenMax.to($bcPopup, 0.5, {opacity:0, right: -10, ease: Power2.easeOut});
				$dimmer.fadeIn();
				TweenMax.to($bcSidemenu, 0.5, {right:0, width: 455});
			});

			$dimmer.on('click', function(){
				closeSidemenu();
			});

			$closeBtn.on('click', function(){
				closeSidemenu();
			});

			function closeSidemenu(){
				$('html').removeClass('modal-open');
				TweenMax.to($bcSidemenu, 0.5, {right:-455, ease: Power2.easeOut});
				$dimmer.fadeOut();
				TweenMax.to($bcPopup, 0.5, {opacity:1, right: 24, ease: Power2.easeOut, delay:0.2});
			};
		},
		bcSelectList : function(){
			var $bcHead		= $('.bc-select-txt');
			$bcHead.click(function(e){
				e.stopPropagation();
				$bcHead.not(this).parent().removeClass('on');	/*remove buttonactive from the others*/
				$(this).parent().toggleClass('on');				/*toggle current clicked element*/
			});

			$window.on("click", function(){
				$bcHead.parent().removeClass('on');
			})
		},
		nav : function(){
			var $Header			= $('#Header');
			var $logo			= $Header.find('.logo img');
			var $depth1			= $Header.find('.hd-menu');
			var $depth1menu		= $depth1.find('> li');
			var $depth2			= $depth1menu.find('.two-menu-area');
			var offHeight		= $depth1.height();
			
			var onlyIndex		=  nowPath == '/bd/index.php' || nowPath == '/bd/';   /*index.php 에서만*/
			var otherIndex		=  nowPath !== '/bd/index.php' && nowPath !== '/bd/'; /*index.php 제외한 */

			var offsetHT		= $Header.offset().top;
			var st;

			
			if( otherIndex ){ 
				$Header.addClass("on");
				$logo.attr('src', '/common/img/icon/bls_b.svg');
			}

			/*stiky nav*/
			if(!noNavFix) {
				$window.on("scroll", function(){
					st		= $window.scrollTop();
					if(st > offsetHT){
						$Header.addClass('stiky');

					} else {
						$Header.removeClass('stiky');
					}
				});
			} 

			/*마우스 on*/
			$depth1menu.on("mouseenter", function(){ 
				var onHeight	= $(this).children('.two-menu-area').height();
				var $thisDepth2 = $(this).find('.two-menu-area');
				
				if(onlyIndex){ 
					$Header.addClass("on");
					$logo.attr('src', '/common/img/icon/bls_b.svg');
				}

				TweenMax.to($Header, 0.2, {height: offHeight + onHeight, backgroundColor: '#ffffff', ease: Power2.easeOut});
				$depth2.stop().removeClass('on');
				$thisDepth2.stop().addClass('on');

			});
			/*마우스 off*/
			$depth1.on("mouseleave", function(){ 
				if(onlyIndex){ 
					$Header.removeClass('on');
					$logo.attr('src', '/common/img/icon/bls_w.svg');
				}

				TweenMax.to($Header, 0.2, {height: offHeight, backgroundColor: 'transparent', ease: Power2.easeOut, onStart:removeCont});

				function removeCont(){
					$depth2.stop().removeClass('on');
				}

			});
			/*마우스 따라다니는 네브 호버바*/
			navLine(); 
			
			function navLine(){
				var $el, leftPos, elWidth;
				$depth1.append('<li class="nav-line"></li>');
				var $navLine = $Header.find('.nav-line');

				$depth1menu.hover(function(){
					$el = $(this);
					leftPos = $el.position().left;
					elWidth = $el.width();
					$navLine.stop().animate({
						left: leftPos,
						width: elWidth
					});
				}, function() {
					$navLine.stop().animate({
						left: leftPos,
						width: 0
					});
				})
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

		},
		Modal : function(){
			var $modal			=	$('.modal');
			var $popupDimmer	=	$('.popup-dimmer');
			var $closeIcon		=	$('.btn-close');
			//init
			$modal.css('display', 'none');

			$('.onModal').on('click', function(e){
				openModal(e);
			});

			$closeIcon.on('click', function(e){
				closeModal(e);
			});
			$modal.on('click', function(e){
				if (e.target !== e.currentTarget) return;
				closeModal(e);
			});

			function openModal(e) {
				if (e.target !== e.currentTarget) return;
				$modal.css('display', 'block');
				$('body').append('<div class="popup-dimmer"></div>');
				$('body').addClass('modal-open');
				setTimeout(function(){
					$modal.addClass('on');
				},100)
			}	

			function closeModal(e) {
				$modal.css('display', 'none');
				$modal.removeClass('on');
				$('body').removeClass('modal-open');
				$.when($('.popup-dimmer').fadeOut(200)).done(function(){ $('.popup-dimmer').remove(); });
			}
		}
	};

	UI.init();
});
