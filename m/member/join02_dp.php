<?php
$page_title = '회원가입 | 톡스앤필 브로우';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top-m.php';

$agree1							=	allTags($_POST['agree1']);
$agree2							=	allTags($_POST['agree2']);

if ( $agree1 == '' || $agree2 == '' ) {
	$common['CommonManager']->goPage('/', $msg = '정상적인 접근이 아닙니다.', '');
	exit();
}
?>
</head>
<body>
<div id="wrap" class="">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb-m.php';
	?>

	<div id="container">
		<div class="pg-tit">
			<h2>회원가입</h2>
			<span>SIGN UP</span>
		</div>

		<ul class="join-step">
			<li class="frt on"><b>1</b><span style="font-weight:600;">&#x02713;</span></li>
			<li class="snd on"><b>2</b><span>회원정보 입력</span></li>
			<li class="thr"><b>3</b><span>회원가입 완료</span></li>
		</ul>

		<h3 class="sr-only">회원정보 입력</h3>
		<form class="form-signin" id="frmInput" name="frmInput" method="post" style="margin-top:0;margin-bottom:0">
		<input type="hidden" id="blank"					name="blank"				value="">
		<input type="hidden" id="userMail"				name="userMail"				value="">
		<input type="hidden" id="userMobile"			name="userMobile"			value="">
		<input type="hidden" id="userGroup"				name="userGroup"			value="3">
		<input type="hidden" id="joinGubun"				name="joinGubun"			value="1">
		<input type="hidden" id="idChk"					name="idChk"				value="N">
		<div class="joinForm-wrap">
			<p class="minframe"><span class="req">항목</span>은 필수 항목입니다.</p>
			<div class="joinForm">
				<div class="minframe">
					<table>
						<caption>회원정보 입력폼</caption>
						<colgroup>
							<col width="30%">
							<col width="*">
						</colgroup>
						<tbody>
							<tr scope="row">
								<th><span class="req">이름</span></th>
								<td>
									<input type="text" id="userName" name="userName" value="" placeholder="" class="form-control">
								</td>
							</tr>
							<tr scope="row">
								<th><span class="req">아이디</span></th>
								<td>
									<div class="ipt-btn-box">
										<input type="text" id="userID" name="userID" value="" placeholder="" class="form-control"><button type="button" onClick="goIDCheck();">중복확인</button>
									</div>
									<span>영문, 숫자만 입력, 6~12자리 입력</span>
								</td>
							</tr>
							<tr scope="row">
								<th><span class="req">비밀번호</span></th>
								<td>
									<input type="password" id="userPWD" name="userPWD" value="" placeholder="" class="form-control"><br/>
									<span>영문과 숫자 조합으로 6자리 이상 입력</span>
								</td>
							</tr>
							<tr scope="row">
								<th><span class="req">비밀번호 확인</span></th>
								<td>
									<input type="password" id="userPWD1" name="userPWD1" value="" placeholder="" class="form-control"><br/>
									<span>비밀번호 확인을 위해 다시 한번 입력해주세요.</span>
								</td>
							</tr>
							<tr scope="row">
								<th><span class="req">휴대폰</span></th>
								<td class="short-hz">
									<div class="phone-slct">
										<select id="userMobile1" name="userMobile1" class="form-control">
											<option value="010" selected="">010</option>
											<option value="011">011</option>
											<option value="016">016</option>
											<option value="017">017</option>
											<option value="018">018</option>
											<option value="019">019</option>
										</select>
									</div>
									<div class="phone-ipt">
										<input type="number" id="userMobile2" name="userMobile2" value="" placeholder="" class="form-control" maxlength="4">
									</div>
									<div class="phone-ipt">
										<input type="number" id="userMobile3" name="userMobile3" value="" placeholder="" class="form-control" maxlength="4">
									</div>
								</td>
							</tr>
							<tr scope="row">
								<th><span class="req">이메일</span></th>
								<td>
									<ul class="short-hz">
										<li class="email-id">
											<input type="text" id="userMail1" name="userMail1" value="" placeholder="" class="form-control">
										</li>
										<li class="email-adr">
											<input type="text" id="userMail2" name="userMail2" value="" placeholder="" class="form-control">
										</li>
									</ul>
									<select id="selMail" name="selMail" class="form-control" style="margin-top:5px;" onChange="chgMail(this.value);">
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
								<td>
									<div class="ipt-btn-box">
										<input type="text" id="userZip" name="userZip" value="" placeholder="" class="form-control" readOnly ontouchend="openPostcode(this.form);"><button type="button" ontouchend="openPostcode(this.form);">우편번호</button>
									</div>
									<input type="text" id="userAddr1" name="userAddr1" value="" placeholder="" class="form-control" style="margin-top:5px;" readOnly ontouchend="openPostcode(this.form);"><br/>
									<input type="text" id="userAddr2" name="userAddr2" value="" placeholder="" class="form-control" style="margin-top:5px;">
								</td>
							</tr>
							<tr scope="row">
								<th>생년월일</th>
								<td>
									<input type="number" id="userBirth" name="userBirth" value="" placeholder="" class="form-control" maxlength="6"><br/>
									<span>(예: 950115)</span>
								</td>
							</tr>
							<tr scope="row">
								<th>직업</th>
								<td>
									<select id="userJob" name="userJob" class="form-control">
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
			</div>

			<div class="ja-btn-wrap">
				<a href="javascript:history.back();">취소</a>
				<a style="cursor:pointer;" ontouchend="goNextStep();" class="goNext">다음단계</a>
			</div>
		</div>
		</form>
	</div>
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/floating-m.php';
	?>

	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/share-m.php';
	?>

	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer-m.php';
	?>
</div>


<script src="/common/js/func.js"></script>

</body>
</html>

<script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script> 
<script language="javascript">
$( "#userName" ).focus();

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
		//alert("6~12자의 대/소 영문 ,숫자만 사용할 수 있습니다");
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
			console.log(response);
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
		url						:	"./join02Proc.php",
		type					:	"POST",
		data					:	postDate,
		dataType				:	"html",
		contentType				:	"application/x-www-form-urlencoded; charset=UTF-8", 
		async					:	true,
		success					:	function (data)
		{
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