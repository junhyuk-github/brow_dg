<div class="minframe text-center">
    <form id="frmFranchInput" name="frmFranchInput" method="post" enctype="multipart/form-data" style="margin-top:0;margin-bottom:0">
    <input type="hidden" id="blank"								name="blank"							value="">
    <input type="hidden" id="corpCode"							name="corpCode"							value="<?=$common['corpCode']?>">
    <input type="hidden" id="bID"								name="bID"								value="50">
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
	<div class="event-wrap text-left row">
		<div class="col-6">
			<div class="form-inner">
				<span class="form-ttl">희망지역</span>
				<input type="text" id="hopeRegion" name="hopeRegion" value="">
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
		<div class="col-6">
			<div class="form-inner">
				<span class="form-ttl">이름</span>
				<input type="text" id="writerName" name="writerName" value="" tabindex="1">
			</div>
		</div>
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
                <div class="g-recaptcha" id="franchCaptcha"></div>
			</div>
		</div>
	</div>
	<button type="button" class="btn-register" onClick="franchFormWrite();">상담 신청하기</button>
    </form>
</div>

<script type="text/javascript">

    function franchFormWrite()
    {
        var frm						=	document.frmFranchInput;
        let aptcha                  =   grecaptcha.getResponse(franchCaptcha);
        var writerPhone				=	"";
        var writerMail				=	"";

        if ( frm.hopeRegion.value == "" ) {
            alert("희망지역을 입력해 주십시오.");
            frm.hopeRegion.focus();
            return false;
        }

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

        if ( frm.privacy.checked == false ) {
            alert("서비스 이용 및 예약 신청을 위한 개인정보 제공에 동의 해주십시오");
            frm.privacy.focus();
            return false;
        }

        if ( franchRecaptchaResponse.length == 0 ) {
            alert('로봇이아닙니다. 영역을체크해주세요.');
            return false;
        }

        if (franchRecaptchaResponse != aptcha) {
            alert('로봇이아닙니다. 영역을체크해주세요.');
            return false;
        }

        if (frm.emailId.value != "" && frm.emailAddress.value != "") {
            writerMail = `${frm.emailId.value}@${frm.emailAddress.value}`;
            frm.writerMail.value = writerMail;
        }
        var form					=	document.querySelector( "#frmFranchInput" );
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