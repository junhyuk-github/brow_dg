<section class="ms-6">
	<div class="ms-tit">
		<h3>1:1 상담문의</h3>
		<span class="ms-sub">궁금한 내용을 톡스앤필 브로우에 물어봐주세요!</span>
	</div>
	<div class="minframe">
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
			<fieldset>
				<legend class="sr-only">1:1상담문의 입력</legend>
				<div class="row">
					<div class="col-6 cf-left-box g-form-box">
						<div class="form-group g-cb-group">
							<label for="" class="form-label">교육과정</label>
							<div class="form-input">
								<div class="form-check">
									<input type="checkbox" class="" id="class1" name="bCurri" value="15">
									<label class="class" for="class1"></label>
									<span class="class-ttl">SMP 베이직 클래스</span>
								</div>
								<div class="form-check">
									<input type="checkbox" class="" id="class2" name="bCurri" value="16">
									<label class="class" for="class2"></label>
									<span class="class-ttl">SMP 창업 클래스</span>
								</div>
								<div class="form-check">
									<input type="checkbox" class="" id="class3" name="bCurri" value="17">
									<label class="class" for="class3"></label>
									<span class="class-ttl">SMP 속성 클래스</span>
								</div>
								<div class="form-check">
									<input type="checkbox" class="" id="class4" name="bCurri" value="18">
									<label class="class" for="class4"></label>
									<span class="class-ttl">TSMP 심화 클래스</span>
								</div>
								<div class="form-check">
									<input type="checkbox" class="" id="class5" name="bCurri" value="19">
									<label class="class" for="class5"></label>
									<span class="class-ttl">팜므 SMP 숱채움 마스터 클래스</span>
								</div>
								<div class="form-check">
									<input type="checkbox" class="" id="class6" name="bCurri" value="20">
									<label class="class" for="class6"></label>
									<span class="class-ttl">SMP ALL 마스터 클래스</span>
								</div>
								<div class="form-check">
									<input type="checkbox" class="" id="class7" name="bCurri" value="21">
									<label class="class" for="class7"></label>
									<span class="class-ttl">사후 과정</span>
								</div>
								<div class="form-check">
									<input type="checkbox" class="" id="class8" name="bCurri" value="22">
									<label class="class" for="class8"></label>
									<span class="class-ttl">SMP 시술 문의</span>
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
								<input type="text" class="form-control" id="writerPhone" name="writerPhone" value=""  tabindex="2">
							</div>
						</div>
					</div>
					<div class="col-6 cf-right-box">
						<div class="form-group">
							<label for="" class="form-label">문의내용</label>
							<div class="form-input">
								<textarea id="contents" name="contents" rows="9" wrap="on" class="form-control" tabindex="2" placeholder=""></textarea>
							</div>
						</div>
						<div class="form-group policy-wrap">
							<label for="" class="sr-only">이용약관</label>
							<div class="form-input policy-item">
								<div class="form-check">
									<input type="checkbox" class="" id="agree" name="agree" value=""  tabindex="2">
									<label for="agree"></label>
									<div class="pri-agree">
										<strong>개인정보 수집동의</strong><br/>
										<span class="sub-txt">
											각종 서비스 및 이벤트 공지, 상담을 위한 개인정보수집 동의 
											<a href="javascript:openPolicy('privacyPolicy');">[자세히보기]</a>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
			<button type="button" id="counselSubmit" class="btn btn-submit" onClick="formWrite();">상담 신청하기</button>
		</div>
		</form>
	</div>
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