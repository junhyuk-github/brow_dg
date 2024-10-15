<div id="eventPopup1" class="ev-popup">
	<div class="pop-wrap">
		<div class="popSwiper swiper">
			<div class="swiper-wrapper">
                <div class="swiper-slide">
					<figure>
                        <a href="https://www.toxnfillbrow.com/commu/event.php">
                            <img src="/common/img/main/evPop-tatoo.jpg" alt="사연신청">
                        </a>
					</figure>
				</div>
				<div class="swiper-slide">
					<figure>
                        <a href="https://www.toxnfillbrow.com/contact/index.php">
                            <img src="/common/img/main/evPop-discount.jpg" alt="동반할인">
                        </a>
					</figure>
				</div>
			</div>
			<div class="popSwiper-pagination"></div>
		</div>
		<div class="pop-btn">
			<button type="button" class="" onclick="closePopup('1', 1);">오늘은 그만 볼래요</button>
			<button type="button" class="" onclick="closePopup('1', 2);">닫기</button>
		</div>
	</div>
</div>

<script>

    //메인 팝업 닫기
    function closePopup(target, type){
        $('#eventPopup' + target).attr('aria-hidden', 'true').removeClass('on');
        if(type == 1) {
            setCookie('eventPopup' + target, "done" , 1);
        }
    };
    //메인 팝업 열기(쿠키에 없으면 보이고 있으면 안보임)
    function openPopup(target){
        var $target;
        var cookieDone;
        cookiedata = document.cookie;
        //나중에 3대신 공지팝업 갯수만큼 루프
        for(var i=1; i < 3; i++){
            $target		=	$('#' + target + i);
            cookieDone	=	target + i + '=done';
            if ( cookiedata.indexOf(cookieDone) < 0 ){
                $target.attr('aria-hidden', 'false').addClass('on');
            }
            else {
                $target.attr('aria-hidden', 'true').removeClass('on');
            }
        }
    };

    // 쿠키 가져오기
    function getCookie( name ) {
        var nameOfCookie = name + "=";
        var x = 0;
        while ( x <= document.cookie.length ){
            var y = (x+nameOfCookie.length);
            if ( document.cookie.substring( x, y ) == nameOfCookie ) {
                if ( (endOfCookie=document.cookie.indexOf( ";", y )) == -1 )
                    endOfCookie = document.cookie.length;
                return unescape( document.cookie.substring( y, endOfCookie ) );
            }
            x = document.cookie.indexOf( " ", x ) + 1;
            if ( x == 0 )
                break;
        }
        return "";
    }

    //쿠키 설정
    function setCookie( name, value, expiredays ){
        var todayDate				=	new Date();
        todayDate.setDate( todayDate.getDate() + parseInt(expiredays) );
        todayDate.setHours(0,0,0,0);
        document.cookie				=	name + "=" + escape( value ) + "; path=/; domain=<?=$corpHost?>; expires=" + todayDate.toGMTString() + ";";
    }

	//이벤트팝업 스와이퍼
	var popSwiper = new Swiper(".popSwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
	    loop: true,
	    loopAdditionalSlides: 1,
	    centeredSlides: true,
        observer: true,
        observeParents: true,
	  autoplay: {
		delay: 3000,
		disableOnInteraction: false,
	  },
	  pagination: {
        el: ".popSwiper-pagination"
      },
    });

	//이벤트버튼 클릭시 팝업 노출
	$(document).on('click', '.btn-evPop', function(e){
	  e.preventDefault();
	  //$('body').addClass('scrollLock'); 
	  $('.ev-popup').addClass('on');
	});
</script>