<div class="minframe consult-inner __treat">
    <form id="frmTreatInput" name="frmTreatInput" method="post" enctype="multipart/form-data" style="margin-top:0;margin-bottom:0">
    <input type="hidden" id="blank"								name="blank"							value="">
    <input type="hidden" id="corpCode"							name="corpCode"							value="<?=$common['corpCode']?>">
    <input type="hidden" id="bID"								name="bID"								value="51">
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
	<div class="counsel-form text-center">
		<fieldset class="text-left">
			<div class="flex-box">
				<div class="flex-left">
					<div class="form-group g-cb-group">
						<label for="" class="form-label">시술 부위</label>
						<div class="form-input">
							<div class="form-check">
								<input type="checkbox" class="" id="treat1" name="tInquiry" value="31">
								<label class="class" for="treat1"></label>
								<span class="">헤어라인</span>
							</div>
							<div class="form-check">
								<input type="checkbox" class="" id="treat2" name="tInquiry" value="32">
								<label class="class" for="treat2"></label>
								<span class="">정수리</span>
							</div>
							<div class="form-check">
								<input type="checkbox" class="" id="treat3" name="tInquiry" value="33">
								<label class="class" for="treat3"></label>
								<span class="">구레나룻</span>
							</div>
							<div class="form-check">
								<input type="checkbox" class="" id="treat4" name="tInquiry" value="34">
								<label class="class" for="treat4"></label>
								<span class="">가르마</span>
							</div>
							<div class="form-check">
								<input type="checkbox" class="" id="treat5" name="tInquiry" value="35">
								<label class="class" for="treat5"></label>
								<span class="">삭발 두피</span>
							</div>
							<div class="form-check">
								<input type="checkbox" class="" id="treat6" name="tInquiry" value="36">
								<label class="class" for="treat6"></label>
								<span class="">숱채움</span>
							</div>
							<div class="form-check">
								<input type="checkbox" class="" id="treat7" name="tInquiry" value="37">
								<label class="class" for="treat7"></label>
								<span class="">재시술</span>
							</div>
							<div class="form-check">
								<input type="checkbox" class="" id="treat8" name="tInquiry" value="38">
								<label class="class" for="treat8"></label>
								<span class="">기타</span>
							</div>
						</div>
					</div>
				</div>
				<div class="flex-right">
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
							-
							<input type="text" id="phoneNumM" name="phoneNumM" value="" placeholder="" maxlength="4" oninput="mobileMaxLengthChk(this)">
							-
							<input type="text" id="phoneNumL" name="phoneNumL" value="" placeholder="" maxlength="4" oninput="mobileMaxLengthChk(this)">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="form-label">이메일</label>
						<div class="form-input email-input">
							<input type="text" id="emailId" name="emailId" value="" placeholder="" size="15">
							<p>@</p>
							<input type="text" id="emailAddress" name="emailAddress" value="" placeholder="" size="15">
							<select id="addressSelect" name="addressSelect" onchange="addEmailAddress(this)">
								<option value="" selected="">직접입력</option>
								<option value="naver.com">naver.com</option>
								<option value="hanmail.net">hanmail.net</option>
								<option value="nate.com">nate.com</option>
								<option value="gmail.com">gmail.com</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="" class="form-label">문의내용</label>
				<div class="form-input">
					<textarea id="contents" name="contents" rows="9" wrap="on" class="form-control" tabindex="2" placeholder="내용 입력"></textarea>
				</div>
			</div>
			<div class="form-group policy-wrap">
				<div class="flex-box">
					<div class="frame privacy">
						<input type="checkbox" class="" id="agree2" name="agree2" value=""  tabindex="2">
						<label for="agree2">
							<b>[개인정보 수집 동의]</b>각종 서비스 및 이벤트 공지, 상담을 위한 개인정보수집
							<a href="javascript:openPolicy('privacyPolicy');">자세히 보기</a>
						</label>
					</div>
                    <div class="g-recaptcha" id="treatCaptcha"></div>
				</div>
			</div>
		</fieldset>
		<button type="button" id="" class="btn-register" onClick="treatFormWrite()">상담 신청하기</button>
	</div>
	</form>
</div>

<script>
    function treatFormWrite()
    {
        var frm						=	document.frmTreatInput;
        let aptcha                  =   grecaptcha.getResponse(treatCaptcha);
        var gubun					=	"";
        var writerPhone				=	"";
        var writerMail				=	"";

        if ( $( "input:checkbox[name=tInquiry]:checked" ).length == 0 ) {
            alert("시술부위를 선택해 주십시오.");
            return false;
        }

        $( "input:checkbox[name=tInquiry]" ).each(function() {
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
        if ( frm.agree2.checked == false ) {
            alert("서비스 이용 및 예약 신청을 위한 개인정보 제공에 동의 해주십시오");
            frm.agree2.focus();
            return false;
        }

        if ( treatRecaptchaResponse.length == 0 ) {
            alert('로봇이아닙니다. 영역을체크해주세요.');
            return false;
        }

        if (treatRecaptchaResponse != aptcha) {
            alert('로봇이아닙니다. 영역을체크해주세요.');
            return false;
        }

        if (frm.emailId.value != "" && frm.emailAddress.value != "") {
            writerMail = `${frm.emailId.value}@${frm.emailAddress.value}`;
            frm.writerMail.value = writerMail;
        }
        var form					=	document.querySelector( "#frmTreatInput" );
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
