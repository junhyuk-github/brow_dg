'use strict';

$(function(){
	var $window			=	$(window);
	var viewportW		=	$window.width();
	var viewportH		=	$window.height();
	var nowPath			=	window.location.pathname;

	var UI = {
		init : function(){
			//UI.MinHeight();
			UI.Nav();
			UI.branchMenu();
			UI.mbSelect();
			UI.FootAccor();
			UI.bordDetail();
		},

		MinHeight : function(){
			var $wrap	=	$('#Wrap');
			var $Footer	=	$('#Footer');
			var wrapH	=	viewportH;

			$wrap.css('minHeight', wrapH);
			$window.resize(function(){
				wrapH			=	viewportH;
				$wrap.css('minHeight', wrapH);
			})
		},
		Nav : function(){
			var $Header			= $('#Header');
			var $Nav			=	$('#Nav');
			var $oneMenu		=	$('.nav-one-depth > li');
			var $closeBtn		=	$Nav.find('.btn-close');
			var $openBtn		=	$Header.find('.btn-toggle');
			var $logo			=	$Header.find('.logo img');
			var nowPathSplit	=	nowPath.split('/bd/');
			var currentMenu		=	nowPath.replace('Detail', '').split('/');
			var currentCateg	=	currentMenu[3].replace('.php', '');
			var currentPage		=	currentMenu[currentMenu.length-1].replace('.php', '');

			var onlyIndex		=	nowPath == '/m/bd/index.php' || nowPath == '/m/bd/';   /*index.php 에서만*/
			var otherIndex		=	nowPath !== '/m/bd/index.php' && nowPath !== '/m/bd/'; /*index.php 제외한 */

			if(otherIndex){ 
				$Header.addClass("sub");
				$logo.attr('src', '/common/img/icon/bls_b.svg');
			}

			// make category
			if($('.nav-one-depth').next().hasClass('hasTwo')) {
				currentCateg += '/';
			}

			$openBtn.on('click', function(){ //nev on
				$Nav.addClass('on');
				$('html').addClass('html-fix');

				if(nowPath == '/m/bd/index.php' || nowPath == '/m/bd/'){
					$oneMenu.removeClass('active');
				};

				$oneMenu.filter(function(){ // one dapth url active
					return this.id == currentCateg;
				}).addClass('active');

				$('.nav-two-depth > li').filter(function(){ // two depth url active
					return this.id == currentPage;
				}).addClass('active');
			});

			$oneMenu.on('click', function() { //two depth open
				var $this		=	$(this);

				$oneMenu.removeClass('active');
				$(this).addClass('active');

				if($this.hasClass('hasTwo')){
					var $oneMenuCont		=	$oneMenu.find('.oneMenu');
					var $towDepth			=	$oneMenu.find('.nav-two-depth');
					var $thisTowDepth		=	$this.find('.nav-two-depth');
					$towDepth.removeClass('on');
					$thisTowDepth.addClass('on');
				}
			});

			$closeBtn.on('click', function(){
				closeNav();
			});

			$Nav.on('click', function(e){
				if(e.target !== e.currentTarget) return;
				closeNav();
			});

			function closeNav() {
				$Nav.removeClass('on');
				$oneMenu.removeClass('active');
				$('html').removeClass('html-fix');
			};

		},
		branchMenu : function(){
			var $branchW	=	$('#BranchInfo');
			var $showUPB	=	$('.go-branch-bar');
			var $openBtn	=	$('.OpenBranch');
			var $closeBtn	=	$('#BranchInfo .btn-close');
			var $dimmer		=	'<div class="popup-dimmer"></div>';

			$openBtn.on('click', function(){
				$('html').addClass('modal-open');
				TweenMax.to($showUPB, 0.3, {opacity:0, bottom: -10, ease: Power2.easeOut});
				$('body').append($dimmer);
				$branchW.addClass('on');
			});

			$closeBtn.on('click', function(){
				closeBranchMenu();
			});

			$(document).on('click', '.popup-dimmer',  function(){
				closeBranchMenu();
			});

			function closeBranchMenu(){
				$('html').removeClass('modal-open');
				$branchW.removeClass('on');
				TweenMax.to($showUPB, 0.3, {opacity:1, bottom: 0, ease: Power2.easeOut, delay:0.2});
				$('.popup-dimmer').remove();
			};
		},
		mbSelect : function(){
			var $openSelect		=	$('.mbs-tit');
			var $selectOpt		=	$('.mbs-opt');

			$openSelect.on('click', function(){

				if($selectOpt.is(':visible')) {
					$selectOpt.slideUp(200);
				}

				if($(this).next().is(':visible')) {
					$(this).next().slideUp(200);
				} else {
					$(this).next().slideDown(200);
				}
			})
		},
		FootAccor : function(){
			var onlyIndex		=  nowPath == '/m/bd/index.php' || nowPath == '/m/bd/'; 
			var otherIndex		=  nowPath !== '/m/bd/index.php' && nowPath !== '/m/bd/'; /*index.php 제외한 */
			var $toggleBtn = $('.accor-top');
			var $address = $('.accor-bottom');
			
			if(otherIndex){
				$toggleBtn.on('click', function(){
					$address.toggleClass('on');
					$toggleBtn.find('.carvon-right').toggleClass('up');
					if($address.hasClass('on')){
						$('html').animate({scrollTop: $(document).height()}, 300);
					}
				});
			}

			if(onlyIndex){
				$address.addClass('on');
				$toggleBtn.find('.carvon-right').addClass('up');
			};
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