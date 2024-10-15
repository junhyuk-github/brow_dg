<link rel="stylesheet" href="/common/css/page.css?v=2312121117">
<?php
$page_title = '이벤트 | 톡스앤필 브로우';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top.php';

$codeList = $common['BasicManager']->getPubCodeList('pubCode', '909');
$codeList = $codeList->getData();
?>
<script type="text/javascript">
    var eventCaptcha = "";
    var eventRecaptchaResponse = "";
    var captchaSiteKey = "<?=$captchaSiteKey?>";

    function eventCaptchaCallBack(res) {
        eventRecaptchaResponse = res;
    }
    var onloadCallback = function () {
        eventCaptcha = grecaptcha.render('eventCaptcha', {
            'sitekey' : captchaSiteKey,
            'callback' : eventCaptchaCallBack,
        });
    }
</script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
</head>

<body class="pg-detail no-footer-top">
<div id="wrap" class="main pg_board pg_detail">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb_main.php';
	?>

	<div id="" class="board-frame event">
		<div class="thumbnail">
			<div class="thumb-title">
                <img src="/common/img/title/event.png" alt="">
            </div>
		</div>
		<div class="pg-tit">
			<h2>이벤트</h2>
			<p>
				여러분의 시들어 가는 일상에 톡스앤필 브로우가 희망을 나누고자 합니다.
			</p>
            <p>
                <span class="ev-chk-txt">이직/ 경력 단절/ 퇴직 등의 이유로 새로운 일을 찾고 계신 분들</span>
                <span class="ev-chk-txt">여러 직업을 통해 경제적 자유를 얻고 싶으신 분들</span>
                <span class="ev-chk-txt">진로를 고민 중인 사회초년생 분들</span>
                <span class="ev-chk-txt">몸을 크게 움직이기가 불편하여 직업 고르기 까다로우신 분들</span>
            </p>
            <p>
                기술을 배워야 하는 사연이 있거나, 탈모나 두피문신시술을 고민하시는 분들께서는<br>
                사연을 신청해주시면 추첨을 통해 80% 할인된 가격에 교육 또는 무료로 시술을 진행해드릴 수 있습니다.<br>
                많은 관심 부탁드립니다.
            </p>
		</div>
		<div class="minframe text-center">
            <form id="frmInput" name="frmInput" method="post" enctype="multipart/form-data" style="margin-top:0;margin-bottom:0">
            <input type="hidden" id="blank"								name="blank"							value="">
            <input type="hidden" id="corpCode"							name="corpCode"							value="<?=$common['corpCode']?>">
            <input type="hidden" id="bID"								name="bID"								value="54">
            <input type="hidden" id="isAction"							name="isAction"							value="N">
            <input type="hidden" id="subject"							name="subject"							value="Event">
            <input type="hidden" id="brandCode"							name="brandCode"						value="<?=$common['brandCode']?>">
            <input type="hidden" id="bbsState"							name="bbsState"							value="200">
            <input type="hidden" id="certNo"							name="certNo"							value="">
            <input type="hidden" id="certChk"							name="certChk"							value="N">
            <input type="hidden" id="hopeTreat"							name="hopeTreat"						value="">

            <input type="hidden" id="fCnt"								name="fCnt"								value="0">
            <input type="hidden" id="iCnt"								name="iCnt"								value="0">

            <input type="hidden" id="reservationMobile"					name="reservationMobile"				value="">
            <input type="hidden" id="writerPhone"						name="writerPhone"						value="">
            <input type="hidden" id="writerMail"						name="writerMail"						value="">
			<div class="event-wrap text-left row">
				<div class="col-6">
					<div class="form-inner">
						<span class="form-ttl">이름</span>
						<input type="text" id="writerName" name="writerName" value="">
					</div>
				</div>
				<div class="col-6">
					<div class="form-inner">
						<span class="form-ttl">희망 시기</span>
						<input type="text" id="hopeDate" name="hopeDate" value="">
					</div>
				</div>
				<div class="col-6">
					<div class="form-inner">
						<span class="form-ttl">연락처</span>
						<div class="frame phone">
							<select id="phoneNumF" name="phoneNumF">
								<option value="010" selected="">010</option>
								<option value="011">011</option>
							</select>
							-
							<input type="text" id="phoneNumM" name="phoneNumM" value="" placeholder="" maxlength="4" oninput="mobileMaxLengthChk(this)">
							-
							<input type="text" id="phoneNumL" name="phoneNumL" value="" placeholder="" maxlength="4" oninput="mobileMaxLengthChk(this)">
						</div>
					</div>
				</div>
                <!-- 231212 미노출 요청으로 인한 주석 처리 -->
				<!--<div class="col-6">
					<div class="form-inner">
						<span class="form-ttl">시술 부위</span>
						<div class="frame treatArea">
							<input type="radio" name="curri" id="curri1" value="910" checked>
							<input type="radio" name="curri" id="curri2" value="911">
							<label for="curri1">전체</label>
							<label for="curri2">숱채움</label>
						</div>
					</div>
				</div>-->
				<div class="col-6">
					<div class="form-inner">
						<span class="form-ttl">이메일</span>
						<div class="frame email">
							<input type="text" id="emailId" name="emailId" value="" placeholder="" size="15">
							<p>@</p>
							<input type="text" id="emailAddress" name="emailAddress" value="" placeholder="" size="15">
							<select id="addressSelect" name="addressSelect" onChange="addEmailAddress(this)">
								<option value="" selected>직접입력</option>
								<option value="naver.com">naver.com</option>
								<option value="hanmail.net">hanmail.net</option>
								<option value="nate.com">nate.com</option>
								<option value="gmail.com">gmail.com</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="form-inner inquiry">
						<span class="form-ttl">문의내용</span>
						<textarea class="custom-scroll" id="contents" name="contents" rows="9" wrap="on" class="" tabindex="2" placeholder="내용 입력"></textarea>
					</div>
				</div>
				<div class="col-12">
					<div class="event-flex">
						<div class="frame privacy">
							<input type="checkbox" name="privacy" id="privacy">
							<label for="privacy">
								<b>[개인정보 수집 동의]</b>각종 서비스 및 이벤트 공지, 상담을 위한 개인정보수집
								<a href="javascript:openPolicy('privacyPolicy');">자세히 보기</a>
							</label>
						</div>
                        <div class="g-recaptcha" id="eventCaptcha"></div>
					</div>
				</div>
			</div>
			<button type="button" class="btn-register" onclick="formWrite()">이벤트 신청하기</button>
            </form>
		</div>
	</div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer-main.php';
?>

</body>
</html>

<script language="javascript">
    function addEmailAddress(object) {
        var selAddress = object.value;
        $(object).siblings('#emailAddress').val(selAddress);
    }

    function mobileMaxLengthChk(object) {
        object.value = object.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');

        if (object.value.length >= object.maxLength) {
            object.value = object.value.slice(0, object.maxLength);
            $(object).next().focus();
        }
    }

    function formWrite()
    {
        var frm						=	document.frmInput;
        let aptcha                  =   grecaptcha.getResponse(eventCaptcha);
        var hopeTreat				=	"";
        var writerPhone				=	"";
        var writerMail				=	"";

        if ( frm.writerName.value == "" ) {
            alert("이름을 입력해 주십시오.");
            frm.writerName.focus();
            return false;
        }

        if ( frm.phoneNumF.value == "" || frm.phoneNumM.value == "" || frm.phoneNumL.value == "") {
            alert("연락처를 입력해 주십시오.");
            frm.phoneNumF.focus();
            return false;
        } else {
            writerPhone = frm.phoneNumF.value + frm.phoneNumM.value + frm.phoneNumL.value;
            frm.writerPhone.value = writerPhone;
        }

        if ( frm.hopeDate.value == "" ) {
            alert("시술 희망 시기를 입력해 주십시오.");
            frm.hopeDate.focus();
            return false;
        }

        if ( $( "input:radio[name=curri]:checked" ).length == 0 ) {
            alert("시술부위를 선택해 주십시오.");
            return false;
        }

        $( "input:radio[name=curri]" ).each(function() {
            if ( $(this).is(":checked") == true ) {
                hopeTreat			=	$(this).val();
            }
        });
        frm.hopeTreat.value				=	hopeTreat;

        if ( frm.contents.value == "" ) {
            alert("문의내용을 입력해 주십시오.");
            frm.contents.focus();
            return false;
        }
        if ( frm.privacy.checked == false ) {
            alert("서비스 이용 및 예약 신청을 위한 개인정보 제공에 동의 해주십시오");
            frm.privacy.focus();
            return false;
        }

        if ( eventRecaptchaResponse.length == 0 ) {
            alert('로봇이아닙니다. 영역을체크해주세요.');
            return false;
        }

        if (eventRecaptchaResponse != aptcha) {
            alert('로봇이아닙니다. 영역을체크해주세요.');
            return false;
        }


        if (frm.emailId.value != "" && frm.emailAddress.value != "") {
            writerMail = `${frm.emailId.value}@${frm.emailAddress.value}`;
            frm.writerMail.value = writerMail;
        }

        var form					=	document.querySelector( "#frmInput" );
        var postDate				=	new FormData(form);

        $.ajax({
            url						:	"/contact/contactProc.php",
            type					:	"POST",
            data					:	postDate,
            dataType				:	"html",
            //contentType			:	"application/x-www-form-urlencoded; charset=UTF-8",
            async					:	true,
            cache					:	false,
            contentType				:	false,
            processData				:	false,
            success					:	function (data)
            {
                console.log(data);
                rsDate				=	data.replace( /(\s*)/g, "" );
                if (rsDate == "Y") {
                    alert("정상적으로 이벤트 신청되었습니다.");
                    location.href	=	"https://www.toxnfillbrow.com/commu/event.php";
                } else {
                    alert("상담 신청 시 오류가 발생하였습니다. 다시 시도해 주세요.");
                }
            }
        });

    }
</script>


<!--	DB Close Start	-->
<?php
include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>
<!--	DB Close End	-->