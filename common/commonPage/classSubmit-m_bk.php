<section class="ms-6">
	<div class="minframe">
		<div class="tit-box">
			<h3>1:1 상담문의</h3>
			<span class="ms-sub">궁금한 내용을 톡스앤필 브로우에 물어봐주세요!</span>
		</div>
	</div>

	<form id="frmInput" name="frmInput" method="post" enctype="multipart/form-data" style="margin-top:0;margin-bottom:0">
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
	<div class="counsel-form">
		<div class="minframe">
			<fieldset>
				<legend class="sr-only">1:1상담문의 입력</legend>

				<div class="form-group g-cb-group" id="" >
					<label for="" class="form-label">교육과정</label>
					<div class="form-input">
						<div class="form-check">
							<input type="checkbox" class="" id="class1" name="bCurri" value="11">
							<label class="class" for="class1"></label>
							<span class="class-ttl">아티스트</span>
						</div>
						<div class="form-check">
							<input type="checkbox" class="" id="class2" name="bCurri" value="12">
							<label class="class" for="class2"></label>
							<span class="class-ttl">마스터</span>
						</div>
						<div class="form-check">
							<input type="checkbox" class="" id="class3" name="bCurri" value="13">
							<label class="class" for="class3"></label>
							<span class="class-ttl">스카터 SMP</span>
						</div>
						<div class="form-check">
							<input type="checkbox" class="" id="class4" name="bCurri" value="14">
							<label class="class" for="class4"></label>
							<span class="class-ttl">메디컬스킨케어</span>
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
						<input type="text" class="form-control" id="writerPhone" name="writerPhone" value="" tabindex="1">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="form-label">문의</label>
					<div class="form-input">
						<textarea id="contents" name="contents" rows="4" wrap="on" class="form-control" tabindex="1"></textarea>
					</div>
				</div>
				<div class="policy-wrap">
					<div class="form-check">
						<input type="checkbox" class="" id="agree" name="agree" value="" tabindex="1">
						<label for="agree"></label>
						<div class="pri-agree">
							<strong>개인정보 수집동의</strong>
							<span class="agree-sub-txt">
								각종 서비스 및 이벤트 공지, 상담을 위한 개인정보수집 동의 <a href="javascript:openPolicy('privacyPolicy');">[자세히보기]</a>
							</span>
						</div>
					</div>
				</div>
			</fieldset>
			<button type="button" id="counselSubmit" class="btn btn-submit" onClick="formWrite();">상담 신청하기</button>
		</div>
	</div>
	</form>
</section>


<script type="text/javascript">
function formWrite()
{
	var frm						=	document.frmInput;
	var gubun					=	"";

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

	if ( frm.writerPhone.value == "" ) {
		alert("연락처를 입력해 주십시오.");
		frm.writerPhone.focus();
		return false;
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

	var form					=	document.querySelector( "#frmInput" );
	var postDate				=	new FormData(form);

	$.ajax({
		url						:	"/m/contact/contactProc.php",
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
				location.href	=	"/m/";
			} else {
				alert("상담 신청 시 오류가 발생하였습니다. 다시 시도해 주세요.");
			}
		}
	});
}
</script>