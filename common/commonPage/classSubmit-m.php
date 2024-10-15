<div class="consult-inner">
	<form id="frmClassInput" name="frmClassInput" method="post" enctype="multipart/form-data" style="margin-top:0;margin-bottom:0">
	<input type="hidden" id="blank"								name="blank"							value="">
	<input type="hidden" id="corpCode"							name="corpCode"							value="<?=$common['corpCode']?>">
	<input type="hidden" id="bID"								name="bID"								value="45">
	<input type="hidden" id="isAction"							name="isAction"							value="N">
	<input type="hidden" id="subject"							name="subject"							value="Contact us">
	<input type="hidden" id="brandCode"							name="brandCode"						value="<?=$common['brandCode']?>">
	<input type="hidden" id="bbsState"							name="bbsState"							value="200">
	<input type="hidden" id="certNo"							name="certNo"							value="">
	<input type="hidden" id="certChk"							name="certChk"							value="N">

	<input type="hidden" id="fCnt"								name="fCnt"								value="0">
	<input type="hidden" id="iCnt"								name="iCnt"								value="0">

	<input type="hidden" id="reservationMobile"					name="reservationMobile"				value="">
	<input type="hidden" id="gubun"								name="gubun"							value="">
        <input type="hidden" id="writerPhone"						name="writerPhone"						value="">
        <input type="hidden" id="writerMail"						name="writerMail"						value="">
	<div class="counsel-form">
		<div class="counsel-form">
			<fieldset>
				<legend class="sr-only">1:1상담문의 입력</legend>
				<div class="form-group g-cb-group" id="" >
					<label for="" class="form-label pl">수강구분</label>
					<div class="form-input">
						<div class="form-checkbox">
							<input type="checkbox" class="" id="class1" name="bCurri" value="15">
							<label class="class" for="class1">SMP 베이직 클래스</label>
						</div>
						<div class="form-checkbox">
							<input type="checkbox" class="" id="class2" name="bCurri" value="16">
							<label class="class" for="class2">SMP 창업 클래스</label>
						</div>
						<div class="form-checkbox">
							<input type="checkbox" class="" id="class3" name="bCurri" value="17">
							<label class="class" for="class3">SMP 속성 클래스</label>
						</div>
						<div class="form-checkbox">
							<input type="checkbox" class="" id="class4" name="bCurri" value="18">
							<label class="class" for="class4">TSMP 심화 클래스</label>
						</div>
						<div class="form-checkbox">
							<input type="checkbox" class="" id="class5" name="bCurri" value="19">
							<label class="class" for="class5">팜므 SMP 숱채움 마스터 클래스</label>
						</div>
						<div class="form-checkbox">
							<input type="checkbox" class="" id="class6" name="bCurri" value="20">
							<label class="class" for="class6">SMP ALL 마스터 클래스</label>
						</div>
						<div class="form-checkbox">
							<input type="checkbox" class="" id="class7" name="bCurri" value="21">
							<label class="class" for="class7">사후 과정</label>
						</div>
						<div class="form-checkbox">
							<input type="checkbox" class="" id="class8" name="bCurri" value="22">
							<label class="class" for="class8">SMP 시술 문의</label>
						</div>
                        <div class="form-checkbox">
                            <input type="checkbox" class="" id="class9" name="bCurri" value="23">
                            <label class="class" for="class9">SMP 초급 체험반</label>
                        </div>
                        <div class="form-checkbox">
                            <input type="checkbox" class="" id="class10" name="bCurri" value="24">
                            <label class="class" for="class10">SMP 기초 클래스</label>
                        </div>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="form-label">이름</label>
					<div class="form-input">
						<input type="text" class="form-control" id="writerName" name="writerName" value="" tabindex="1">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="form-label">연락처</label>
					<div class="form-input phone-input">
						<select id="phoneNumF" name="phoneNumF">
							<option value="010" selected="">010</option>
							<option value="011">011</option>
						</select>
						<input type="number" id="phoneNumM" name="phoneNumM" value="" placeholder="" maxlength="4" oninput="mobileMaxLengthChk(this)">
						<input type="number" id="phoneNumL" name="phoneNumL" value="" placeholder="" maxlength="4" oninput="mobileMaxLengthChk(this)">
					</div>
				</div>
				<div class="form-group _email">
					<label for="" class="form-label">이메일</label>
					<div class="form-input email-input">
						<input type="text" id="emailId" name="emailId" value="" placeholder="" size="15">
						<p>@</p>
						<input type="text" id="emailAddress" name="emailAddress" value="" placeholder="" size="15">
					</div>
					<select id="addressSelect" name="addressSelect" onchange="addEmailAddress(this)">
						<option value="" selected="">직접입력</option>
						<option value="naver.com">naver.com</option>
						<option value="hanmail.net">hanmail.net</option>
						<option value="nate.com">nate.com</option>
						<option value="gmail.com">gmail.com</option>
					</select>
				</div>
				<div class="form-group">
					<label for="" class="form-label">문의내용</label>
					<div class="form-input">
						<textarea id="contents" name="contents" rows="4" wrap="on" class="form-control" tabindex="1" placeholder="내용 입력"></textarea>
					</div>
				</div>
				<div class="privacy-wrap">
					<div class="form-checkbox">
						<input type="checkbox" class="" id="agree" name="agree" value="" tabindex="1">
						<label for="agree"></label>
						<div class="pri-agree">
							<strong>[개인정보 수집동의]</strong>
							<span class="agree-sub-txt">
								각종 서비스 및 이벤트 공지, 상담을 위한 개인정보수집 동의
								<a href="javascript:openPolicy('privacyPolicy');">자세히보기</a>
							</span>
						</div>
					</div>
				</div>
                <div class="g-recaptcha" id="classCaptcha"></div>
			</fieldset>
			<button type="button" id="counselSubmit" class="btn-register" onClick="classFormWrite();">상담 신청하기</button>
		</div>
	</div>
	</form>
</div>


<script type="text/javascript">
    function classFormWrite()
    {
        var frm						=	document.frmClassInput;
        let aptcha                  =   grecaptcha.getResponse(classCaptcha);
        var gubun					=	"";
        var writerPhone				=	"";
        var writerMail				=	"";

        if ( $( "input:checkbox[name=bCurri]:checked" ).length == 0 ) {
            alert("교육과정을 선택해 주십시오.");
            return false;
        }

        $( "input:checkbox[name=bCurri]" ).each(function() {
            if ( $(this).is(":checked") == true ) {
                if ( gubun == "" ) {
                    gubun				=	$(this).val();
                } else {
                    gubun				=	gubun + "," + $(this).val();
                }
            }
        });
        frm.gubun.value				=	gubun;

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

        if ( frm.contents.value == "" ) {
            alert("문의내용을 입력해 주십시오.");
            frm.contents.focus();
            return false;
        }
        if ( frm.agree.checked == false ) {
            alert("서비스 이용 및 예약 신청을 위한 개인정보 제공에 동의 해주십시오");
            frm.agree.focus();
            return false;
        }

        if ( classRecaptchaResponse.length == 0 ) {
            alert('로봇이아닙니다. 영역을체크해주세요.');
            return false;
        }

        if (classRecaptchaResponse != aptcha) {
            alert('로봇이아닙니다. 영역을체크해주세요.');
            return false;
        }


        if (frm.emailId.value != "" && frm.emailAddress.value != "") {
            writerMail = `${frm.emailId.value}@${frm.emailAddress.value}`;
            frm.writerMail.value = writerMail;
        }
        
        var form					=	document.querySelector( "#frmClassInput" );
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
                    alert("정상적으로 상담 신청되었습니다.");
                    location.href	=	"https://www.toxnfillbrow.com/contact/index.php";
                } else {
                    alert("상담 신청 시 오류가 발생하였습니다. 다시 시도해 주세요.");
                }
            }
        });

    }
</script>