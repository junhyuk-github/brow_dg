<link rel="stylesheet" href="/common/css/page.css">
<?php
$page_title = '회원가입 | 톡스앤필 브로우';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top.php';

$agree1							=	allTags($_POST['agree1']);
$agree2							=	allTags($_POST['agree2']);

if ( $agree1 == '' || $agree2 == '' ) {
	$common['CommonManager']->goPage('/', $msg = '정상적인 접근이 아닙니다.', '');
	exit();
}

//추천인 코드 생성
$chkCommende = true;
while ($chkCommende) {
	$token = getRandomString('az09',8);
	$chkToken =	$common['MemberManager']->chkCommendeDuplication($token);
   if ($chkToken) $chkCommende = false;
}
?>

</head>

<body class="pg-detail no-footer-top">

<div id="wrap" class="main  nav-blk">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb_main.php';
	?>

	<div id="" class="pg_join">
		<div class="pg-tit">
			<h2>회원가입</h2>
		</div>
		<div class="minframe">
			<ul class="step-wrap">
				<li class="step step-01">
					<p>
						STEP 01
						<span class="agr">약관동의</span>
					</p>
				</li>
				<li class="step step-02 on">
					<p>
						STEP 02
						<span class="agr">정보 입력</span>
					</p>
				</li>
				<li class="step step-03">
					<p>
						STEP 03
						<span class="agr">가입 완료</span>
					</p>
				</li>
			</ul>
		</div>

		<form class="form-signin" id="frmInput" name="frmInput" method="post" style="margin-top:0;margin-bottom:0">
		<input type="hidden"		id="blank"					name="blank"				value="">
		<input type="hidden"		id="userMail"				name="userMail"				value="">
		<input type="hidden"		id="userMobile"				name="userMobile"			value="">
		<input type="hidden"		id="joinGubun"				name="joinGubun"			value="1">
		<input type="hidden"		id="idChk"					name="idChk"				value="N">
		<input type="hidden"		id="certChk"                name="certChk"				value="N">
		<input type="hidden"		id="certNo"					name="certNo"				value="">
		<input type="hidden"		id="commendGroup"			name="commendGroup"			value="">
		<input type="hidden"		id="commendToken"			name="commendToken"			value="">
		<input type="hidden"		id="userGroup"				name="userGroup"			value="2">		

		
		<div class="join-agree-wrap">
			<h3 class="sr-only">회원정보 입력</h3>
			<div class="minframe">
				<div class="joinForm-wrap">
					<h3 class="notice-txt"><span class="req">항목</span>은 필수 항목입니다.</h3>
					<table class="join-form">
						<caption>회원정보 입력폼</caption>
						<tbody>
							<tr scope="row">
								<th><span class="req">이름</span></th>
								<td>
									<input type="text" id="userName" name="userName" value="" placeholder="" size="30">
								</td>
							</tr>
							<tr scope="row">
								<th><span class="req">아이디</span></th>
								<td>
									<input type="text" id="userID" name="userID" value="" size="30" maxlength="12" onkeyup="userIDEvt(event);" onkeydown="userIDEvt(event);"/>
									<button type="button" onClick="goIDCheck();" class="btn-gray">중복확인</button>
									<span>영문, 숫자만 입력, 6~12자리 입력</span>
								</td>
							</tr>
							<tr scope="row">
								<th><span class="req">비밀번호</span></th>
								<td>
									<input type="password" id="userPWD" name="userPWD" value="" placeholder="" size="30">
									<span>영문과 숫자 조합으로 6자리 이상 입력</span>
								</td>
							</tr>
							<tr scope="row">
								<th><span class="req">비밀번호 확인</span></th>
								<td>
									<input type="password" id="userPWD1" name="userPWD1" value="" placeholder="" size="30">
									<span>비밀번호 확인을 위해 다시 한번 입력해주세요.</span>
								</td>
							</tr>
							<tr scope="row">
								<th><span class="req">휴대폰</span></th>
								<td>
									<div class="wrap __phone">
										<select id="userMobile1" name="userMobile1">
											<option value="010" selected="">010</option>
											<!-- <option value="011">011</option>
											<option value="016">016</option>
											<option value="017">017</option>
											<option value="018">018</option>
											<option value="019">019</option> -->
										</select>
										<input type="number" id="userMobile2" name="userMobile2" value="" placeholder="" size="15" maxlength="4" oninput="mobileMaxLengthChk(this)">
										<input type="number" id="userMobile3" name="userMobile3" value="" placeholder="" size="15" maxlength="4" oninput="mobileMaxLengthChk(this)">
									</div>
									
									<button type="button" class="btn-blk" id="sendBtn1" onClick="sendCertNo();" style="">
										인증번호요청
									</button>
									<button type="button" class="btn-gray" id="sendBtn2" onClick="sendCertNo();" style="display:none">
										재발송
									</button>
								</td>
							</tr>
							<tr scope="row" id="chkDiv" style="display:none;">
								<th>
									<span class="req">인증번호</span>
								</th>
								<td>
									<input type="number" class="fm_ctrl f-col" id="chkAuthNum" name="chkAuthNum" value="" tabindex="5">
									<button type="button" class="btn-blk" id="sendBtn1" onClick="checkCert();" style="">
										인증 확인
									</button>
								</td>
							</tr>
							<tr scope="row">
								<th><span class="req">이메일</span></th>
								<td>
									<div class="wrap __email">
										<input type="text" id="userMail1" name="userMail1" value="" size="15"/>
										<p>@</p>
										<input type="text" id="userMail2" name="userMail2" value="" placeholder="" size="15">
									</div>
									<select id="selMail" name="selMail" onChange="chgMail(this.value);">
										<option value="" selected>직접입력</option>
										<option value="naver.com">naver.com</option>
										<option value="hanmail.net">hanmail.net</option>
										<option value="nate.com">nate.com</option>
										<option value="gmail.com">gmail.com</option>
									</select>
								</td>
							</tr>
							<tr scope="row">
								<th style="vertical-align:top; padding-top:20px;"><span class="req">주소</span></th>
								<td class="address-wrap">
									<div class="__search">
										<input type="text" id="userZip" name="userZip" value="" placeholder="" size="15" readOnly onclick="openPostcode(this.form);">
										<button class="btn-gray" type="button" onclick="openPostcode(this.form);">우편번호</button>
									</div>
									<div class="wrap">
										<input type="text" id="userAddr1" name="userAddr1" value="" placeholder="" size="30" readOnly onclick="openPostcode(this.form);"><br/>
										<input type="text" id="userAddr2" name="userAddr2" value="" placeholder="" size="30">
									</div>
								</td>
							</tr>
							<tr scope="row">
								<th>생년월일</th>
								<td>
									<input type="number" id="userBirth" name="userBirth" value="" placeholder="" size="30" maxlength="6">
									<span>(예: 950115)</span>
								</td>
							</tr>
							<tr scope="row">
								<th>직업</th>
								<td>
									<select id="userJob" name="userJob">
										<option value="" selected="">선택</option>
										<option value="1">학생</option>
										<option value="2">주부</option>
										<option value="3">회사원</option>
										<option value="4">자영업</option>
										<option value="5">예술인</option>
										<option value="6">군인</option>
										<option value="7">서비스업</option>
										<option value="8">무직</option>
										<option value="9">기타</option>
									</select>
								</td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="recom-wrap">
					<h1>추천인 코드 입력</h1>
					<p>추천인 코드를 입력하시면 수강비 할인 쿠폰을 드립니다.</p>
					<label for="" class="search-wrap">
						<input type="text" id="recommenderCode" name="recommenderCode" value="" placeholder="" size="30">
						<button type="button" class="btn-search" onClick="commendChk();">조회</button>
					</label>
					<p class="info-wrap">
						<img src="/common/img/member/i-info.png" alt="안내사항">
						<span>지금 입력하지 않으셔도 괜찮아요 :) 가입 후 3일 이내에 마이페이지에서 입력하실 수 있습니다.</span>
					</p>
				</div>

				<div class="ja-btn-wrap">
					<a href="javascript:history.back();">취소</a>
					<a style="cursor:pointer;" onClick="goNextStep();" class="goNext"><span class="i-next">다음단계</span></a>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer-main.php';
?>

</body>
</html>

<script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script> 
<script language="javascript">
$( "#userName" ).focus();

function userIDEvt(e) {
	inputMaxLeng(e.target);

	// 숫자와 영문자만 허용
	const regExp = /[^0-9a-zA-Z]/g;
	// 한글만 허용
	// const regExp = /[^ㄱ-ㅎ|가-힣]/g;
	if (regExp.test(e.target.value)) {
		e.target.value = e.target.value.replace(regExp, '');
	}
}

// input tag length
function inputMaxLeng(object, focus) {
	if (object.value.length >= object.maxLength) {
		object.value = object.value.slice(0, object.maxLength);

		if ( focus ) {
			$(object).next().focus();
		}
	}
}

// 핸드폰번호 체크
function mobileMaxLengthChk(object) {
	object.value = object.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');

	inputMaxLeng(object, true);
}

function openPostcode(frm)
{
	new daum.Postcode({
		oncomplete: function(data) {
			var userSelectedType		=	data.userSelectedType;

			if (userSelectedType == 'R') {																			//	사용자가 도로명 주소를 선택한 경우
				var address				=	data.roadAddress;
			} else {																								//	사용자가 지번 주소를 선택한 경우
				var address				=	data.jibunAddress;
			}

			frm.userZip.value			=	data.zonecode;
			frm.userAddr1.value			=	address;
			frm.userAddr2.focus();
		}
	}).open();
}

function chgMail(value)
{
	if ( value == "" ) {
		$( "#userMail2" ).prop('readonly', false);
		$( "#userMail2" ).val("");
	} else {
		$( "#userMail2" ).prop('readonly', true);
		$( "#userMail2" ).val(value);
	}
}

function checkNumber(num)
{
	var pattern					=	/^[0-9]+$/;
	if ( !pattern.test(num) )	return false;
	else						return true;
}

function sendCertNo()
{
	var frm = document.frmInput;

	if (frm.userName.value == "") {
		alert("이름을 입력해주세요.");
		frm.userName.focus();
		return false;
	}

	if (frm.userMobile2.value == "" || frm.userMobile2.value < 4 ) {
		alert("휴대폰 번호 두번째 자리를 입력해 주십시오.");
		frm.userMobile2.focus();
		return false;
	}

	if (frm.userMobile3.value == "" || frm.userMobile3.value < 4 ) {
		alert("휴대폰 번호 세번째 자리를 입력해 주십시오.");
		frm.userMobile3.focus();
		return false;
	}

	frm.userMobile.value		=	frm.userMobile1.value + "-" + frm.userMobile2.value + "-" + frm.userMobile3.value;

	var form					=	document.querySelector("#frmInput");
	var postDate				=	new FormData(form);
	$.ajax({
		url						:	"./memberJoinCertNoProc.php",
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
			rsDate				=	data.replace( /(\s*)/g, "" );
			if ( rsDate == "N1" ) {
				alert("인증 문자 발송에 실패 하였습니다. 다시 시도해 주세요.");
			} else {
				$( "#sendBtn1" ).hide();
				$( "#sendBtn2" ).show();
				$( "#chkDiv" ).show();
				frm.certNo.value = rsDate;
				alert("인증번호가 전송되었습니다.");
			}
		}
	});
}

//추천인 코드 체크
function commendChk() {
	if($('#commendGroup').val() != "")
	{
		alert('이미 추천인 등록을 하셨습니다.');
		return false;
	}

	let chkNo = $('#recommenderCode').val();
	
	if(!chkNo){
		alert('추천인 코드를 입력해주세요.');
		return false;
	}

	$.ajax({
		type					:	"POST",
		url						:	"./_commendChkProc.php",
		dataType				:	"json",
		data					:
		{
			chkNo : chkNo
		},
		success					:	function(response, status, request)
		{
			if(response != 'N'){

				console.log(response);
				alert('추천인 코드가 등록되었습니다.');
				$('#commendGroup').val(response);
				$( "#recommenderCode" ).prop("readonly", true);
			}else{
				alert('추천인코드를 다시 확인 해주세요.');
			}
		}
	});
}

//인증번호 체크
function checkCert()
{
	var frm = document.frmInput;

	if ( frm.certNo.value == frm.chkAuthNum.value ) {
		frm.certChk.value		=	"Y";
		$( "#sendBtn1, #sendBtn2, #certBtn" ).hide();
	
		$( "#chkAuthNum" ).prop("readonly", true);

		$("#userMobile1").prop("disabled", true);
		$("#userMobile2").prop("readonly", true);
		$("#userMobile3").prop("readonly", true);

		alert("인증에 성공하였습니다.");
	} else {
		$( "#sendBtn1" ).hide();
		$( "#sendBtn2" ).show();
		alert("인증에 실패하였습니다. 다시 시도해 주세요.");
	}
}


//	아이디 중복 체크
function goIDCheck()
{
	var frm						=	document.frmInput;

	if ( frm.userID.value == "" ) {
		alert("아이디를 입력해 주세요.");
		frm.userID.focus();
		return false;
	}

	if ( !chkID(frm.userID.value) ) {
		// alert("6~12자의 대/소 영문 ,숫자만 사용할 수 있습니다");
		frm.userID.focus();
		return false;
	}

	$.ajax({
		type					:	"POST",
		url						:	"/common/commonPage/userIDCheck.php",
		dataType				:	"json",
		data					:
		{
			id						:	frm.userID.value
		},
		success					:	function(response, status, request)
		{
			if ( response.result ) {
				$( "#idChk" ).val("Y");
				alert("입력하신 아이디(" + frm.userID.value + ")는 사용 가능한 아이디입니다.");
				return false;
			} else {
				$( "#idChk" ).val("N");
				alert("입력하신 아이디(" + frm.userID.value + ")는 사용할 수 없는 아이디입니다.");
				frm.userID.focus();
				return false;
			}
		}
	});
}
//	아이디 중복 체크

function goNextStep()
{
	var frm						=	document.frmInput;

	$('#commendToken').val("<?=$token?>");

	if ( frm.userName.value == "" ) {
		alert("이름을 입력해 주세요.");
		frm.userName.focus();
		return false;
	}

	if ( frm.userID.value == "" ) {
		alert("아이디를 입력해 주세요.");
		frm.userID.focus();
		return false;
	}

	if ( !chkID(frm.userID.value) ) {
		//alert("6~12자의 대/소 영문 ,숫자만 사용할 수 있습니다");
		frm.userID.focus();
		return false;
	}

	if ( frm.idChk.value == "" || frm.idChk.value == "N" ) {
		alert("아이디 중복 체크를 해주세요.");
		frm.userID.focus();
		return false;
	}

	if ( !chkPwd(frm.userPWD.value) ) {
		//alert("6~12자의 대/소 영문 ,숫자, 숫자버튼의 특수문자만 사용할 수 있습니다");
		frm.userPWD.focus();
		return false;
	}

	if ( frm.userPWD.value != frm.userPWD1.value ) {
		alert("비밀번호화 비밀번호 확인이 다릅니다.");
		frm.userPWD.value		=	"";
		frm.userPWD1.value		=	"";
		frm.userPWD.focus();
		return false;
	}

	if ( !checkNumber(frm.userMobile1.value) ) {
		alert("휴대폰번호는 숫자만 입력가능합니다.");
		frm.userMobile1.focus();
		return false;
	}

	if ( !checkNumber(frm.userMobile2.value) ) {
		alert("휴대폰번호는 숫자만 입력가능합니다.");
		frm.userMobile2.focus();
		return false;
	}

	if ( !checkNumber(frm.userMobile3.value) ) {
		alert("휴대폰번호는 숫자만 입력가능합니다.");
		frm.userMobile3.focus();
		return false;
	}

	var userMobile				=	frm.userMobile1.value + "-" + frm.userMobile2.value + "-" + frm.userMobile3.value;
	$( "#userMobile" ).val(userMobile);
	if ( frm.userMobile.value == "" ) {
		alert("휴대폰 번호를 입력해 주세요.");
		frm.userMobile.focus();
		return false;
	}

	if ( frm.certChk.value == "N" ) {
		alert("휴대폰 인증을 진행해주세요.");
		frm.userMobile1.focus();
		return false;
	}

	if ( frm.userMail1.value == "" && frm.userMail2.value == "" ) {
		alert("이메일을 입력하세요..");
		return false;
	}

	var userMail				=	frm.userMail1.value + "@" + frm.userMail2.value;
	$( "#userMail" ).val(userMail);

	if ( frm.userZip.value == "" && frm.userAddr1.value == "" && frm.userAddr2.value == "" ) {
		alert("주소를 입력하세요..");
		return false;
	}

	if ( frm.userBirth.value ) {
		if ( checkNumber(frm.userBirth.value) == false ) {
			alert("생년월일은 숫자만 입력 가능합니다.");
			frm.userBirth.value = "";
			frm.userBirth.focus();
			return false;
		}
	}

	/*
	frm.action					=	"./join02Proc.php";
	//frm.target				=	"procFrame";
	frm.submit();
	*/

	var postDate				=	$( "#frmInput" ).serialize();
	$.ajax({
		url						:	"./newJoin02Proc.php",
		type					:	"POST",
		data					:	postDate,
		dataType				:	"html",
		contentType				:	"application/x-www-form-urlencoded; charset=UTF-8", 
		async					:	true,
		success					:	function (data)
		{
			console.log(data);
			//return false; 2020.03.02:다음단계로 넘어가지 않아서 주석처리함
			rsDate				=	data.replace( /(\s*)/g, "" );
			if ( rsDate == "Y" ) {
				alert("가입 되었습니다.");
				location.href	=	"./join03.php";
			} else {
				alert("적용시 에러가 발생하였습니다. 다시 시도해 주세요.");
			}
		}
	});
}

function chkID(str)
{
	var pattern_num				=	/[0-9]/;						//	숫자
	var pattern_eng				=	/[a-zA-Z]/;						//	문자
	var pattern_spc				=	/[~!@#$%^&*()_+|<>?:{}]/;		//	특수문자
	var pattern_kor				=	/[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/;			//	한글체크

	if ( str.length < 6 || str.length > 12 ) {
		alert("6자리 ~ 12자리 이내로 입력해주세요.");
		return false;
	} else {
		if ( (pattern_num.test(str)) || (pattern_eng.test(str)) || !(pattern_spc.test(str)) && !(pattern_kor.test(str)) ) {
			return true;
		} else {
			alert("아이디에 허용되지 않는 문자가 입력되었습니다.")
			return false;
		}
	}
}

function chkPwd(str)
{
	var pattern_num				=	/[0-9]/;						//	숫자
	var pattern_eng				=	/[a-zA-Z]/;						//	문자
	var pattern_spc				=	/[~!@#$%^&*()_+|<>?:{}]/;		//	특수문자
	var pattern_kor				=	/[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/;			//	한글체크

	if ( str.length < 6 ) {
		alert("6자리 이상 입력해주세요.");
		return false;
	} else {
		if ( (pattern_num.test(str)) && (pattern_eng.test(str)) && !(pattern_spc.test(str)) && !(pattern_kor.test(str)) ) {
			return true;
		} else {
			alert("영문,숫자를 조합하여 입력해주세요.")
			return false;
		}
	}
}
</script>

<!--	DB Close Start	-->
<?php
include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>
<!--	DB Close End	-->