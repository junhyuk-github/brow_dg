</head>
<?php
$page_title = '마이페이지 | 톡스앤필 브로우';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top.php';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/userLoginChk.php';

$data							=	$common['MemberManager']->getMemberInfo($common['userIdx']);
$data							=	$data->getData();
$rs								=	$data[0];

if ( $rs ) {
	$userID						=	$rs['userID'];
	$userName					=	$rs['userName'];
	$userMobile					=	$rs['userMobile'];
	$userMail					=	$rs['userMail'];
	$userBirth					=	$rs['userBirth'];
	$userJob					=	$rs['userJob'];
	$userZip					=	$rs['userZip'];
	$userAddr1					=	$rs['userAddr1'];
	$userAddr2					=	$rs['userAddr2'];

	if ( $userMobile ) {
		$userMobiles			=	explode( '-', $userMobile );
		$userMobile1			=	$userMobiles[0];
		$userMobile2			=	$userMobiles[1];
		$userMobile3			=	$userMobiles[2];
	}

	if ( $userMail ) {
		$userMails				=	explode( '@', $userMail );
		$userMail1				=	$userMails[0];
		$userMail2				=	$userMails[1];
	}
}

//접근 가능: 정회원, 수강생
if( $common['userGroup'] !== '2' && $common['userGroup'] !== '3' && $common['userGroup'] !== '4' && $common['userGroup'] !== '5' && $common['userGroup'] !== '6' ) {
?>
	<script>
		alert("잘못된 접근 입니다.");
		document.referrer && -1 != document.referrer.indexOf('https://www.toxnfillacademy.com/')?
			history.back(-1) : location.href='https://www.toxnfillacademy.com/';
	</script>
<? } ?>
</head>

<body>
<div id="wrap" class="">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb.php';
	?>

	<div id="container">
		<div class="breadcrumb-wrap maxframe">
			<ul class="breadcrumb">
				<li><span>홈</span></li>
				<li><span>마이페이지</span></li>
			</ul>
		</div>

		<div class="pg-tit noLine">
			<h2>마이페이지</h2>
			<span>MY PAGE</span>
		</div>

		<div id="userTab">
			<div class="minframe">
				<ul class="tab" role="tablist">
					<li id="tab1" class="tab-item" role="tab" aria-controls="tab-panel1">회원정보 수정</li>
					<li id="tab2" class="tab-item" role="tab" aria-controls="tab-panel2">회원탈퇴</li>
				</ul>
			</div>

			<div>
				<div id="tab-panel1" class="tab-panel" role="tabpanel" aria-labelledby="tab1">
					<h3 class="sr-only">회원정보 수정</h3>
					<form id="frmInput1" name="frmInput1" method="post" style="margin-top:0;margin-bottom:0">
					<input type="hidden"		id="blank"					name="blank"				value="">
					<input type="hidden"		id="userIdx"				name="userIdx"				value="<?=$common['userIdx']?>">
					<input type="hidden"		id="userMail"				name="userMail"				value="">
					<input type="hidden"		id="userMobile"				name="userMobile"			value="">
					<div class="joinForm-wrap">
						<p><span class="req">항목</span>은 필수 항목입니다.</p>
						<div class="joinForm">
							<table>
								<caption>회원정보 입력폼</caption>
								<colgroup>
									<col width="200px">
									<col width="*">
								</colgroup>
								<tbody>
									<tr scope="row">
										<th><span class="req">이름</span></th>
										<td>
											<input type="text" id="userName" name="userName" value="<?=$userName?>" placeholder="" size="30">
										</td>
									</tr>
									<tr scope="row">
										<th><span class="req">아이디</span></th>
										<td>
											<input type="text" id="userID" name="userID" value="<?=$userID?>" placeholder="" size="30" readonly>
										</td>
									</tr>
									<tr scope="row">
										<th><span class="req">비밀번호</span></th>
										<td>
											<input type="password" id="userPWD" name="userPWD" value="" placeholder="" size="30">
											<span>특수문자 및 한글 입력불가, 6자리 이상 입력</span>
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
											<select id="userMobile1" name="userMobile1">
												<option value="010"<? if ( $userMobile1 == '010' ) { echo ' selected'; } ?>>010</option>
												<option value="011"<? if ( $userMobile1 == '011' ) { echo ' selected'; } ?>>011</option>
												<option value="016"<? if ( $userMobile1 == '016' ) { echo ' selected'; } ?>>016</option>
												<option value="017"<? if ( $userMobile1 == '017' ) { echo ' selected'; } ?>>017</option>
												<option value="018"<? if ( $userMobile1 == '018' ) { echo ' selected'; } ?>>018</option>
												<option value="019"<? if ( $userMobile1 == '019' ) { echo ' selected'; } ?>>019</option>
											</select>
											<span>-</span>
											<input type="number" id="userMobile2" name="userMobile2" value="<?=$userMobile2?>" placeholder="" size="15" maxlength="4">
											<span>-</span>
											<input type="number" id="userMobile3" name="userMobile3" value="<?=$userMobile3?>" placeholder="" size="15" maxlength="4">
										</td>
									</tr>
									<tr scope="row">
										<th><span class="req">이메일</span></th>
										<td>
											<input type="text" id="userMail1" name="userMail1" value="<?=$userMail1?>" placeholder="" size="15">
											<span>@</span>
											<input type="text" id="userMail2" name="userMail2" value="<?=$userMail2?>" placeholder="" size="15" style="width:173px">
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
										<td>
											<input type="text" id="userZip" name="userZip" value="<?=$userZip?>" placeholder="" size="15" style="width:202px" readOnly onclick="openPostcode(this.form);"><button type="button" onclick="openPostcode(this.form);">우편번호</button><br/>
											<input type="text" id="userAddr1" name="userAddr1" value="<?=$userAddr1?>" placeholder="" size="30" readOnly onclick="openPostcode(this.form);"><br/>
											<input type="text" id="userAddr2" name="userAddr2" value="<?=$userAddr2?>" placeholder="" size="30">
										</td>
									</tr>
									<tr scope="row">
										<th>생년월일</th>
										<td>
											<input type="number" id="userBirth" name="userBirth" value="<?=$userBirth?>" placeholder="" size="30" maxlength="6">
											<span>(예: 950115)</span>
										</td>
									</tr>
									<tr scope="row">
										<th>직업</th>
										<td>
											<select id="userJob" name="userJob">
												<option value="default"<? if ( $userJob == '' ) { echo ' selected'; } ?>>선택</option>
												<option value="1"<? if ( $userJob == '1' ) { echo ' selected'; } ?>>학생</option>
												<option value="2"<? if ( $userJob == '2' ) { echo ' selected'; } ?>>주부</option>
												<option value="3"<? if ( $userJob == '3' ) { echo ' selected'; } ?>>회사원</option>
												<option value="4"<? if ( $userJob == '4' ) { echo ' selected'; } ?>>자영업</option>
												<option value="5"<? if ( $userJob == '5' ) { echo ' selected'; } ?>>예술인</option>
												<option value="6"<? if ( $userJob == '6' ) { echo ' selected'; } ?>>군인</option>
												<option value="7"<? if ( $userJob == '7' ) { echo ' selected'; } ?>>서비스업</option>
												<option value="8"<? if ( $userJob == '8' ) { echo ' selected'; } ?>>무직</option>
												<option value="9"<? if ( $userJob == '9' ) { echo ' selected'; } ?>>기타</option>
											</select>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="ja-btn-wrap">
							<a href="javascript:history.back();">취소</a>
							<a style="cursor:pointer;" onClick="memberModify();" class="goNext"><span class="i-next">회원정보 수정</span></a>
						</div>
					</div>
					</form>
				</div>

				<div id="tab-panel2" class="tab-panel" role="tabpanel" aria-labelledby="tab2">
					<form id="frmInput2" name="frmInput2" method="post" style="margin-top:0;margin-bottom:0">
					<input type="hidden" id="blank"			name="blank"		value="">
					<div class="minframe secession-wrap">
						<p class="sc-p">
							그동안 톡스앤필 브로우를 이용해주셔서 감사합니다. <br/>
							탈퇴사유를 남겨주시면 보다 발전된 톡스앤필 브로우로 찾아뵙겠습니다.
						</p>
						<div class="sc-cmt">
							<label for=""><span>톡스앤필 브로우</span>에 남기고 싶은 말</label>
							<textarea name="outReason" id="outReason" rows="10" class="form-control"></textarea>
						</div>
						<div class="ja-btn-wrap">
							<a style="cursor:pointer;" onClick="memberOut();" class="goNext">탈퇴하기</a>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/share.php';
?>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer.php';
?>

<script src="/common/js/func.js"></script>
<script>
	Common.tabUI('#userTab');
</script>

</body>
</html>

<script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script> 
<script language="javascript">
<!--

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

function memberModify()
{
	var frm						=	document.frmInput1;

	if ( frm.userName.value == "" ) {
		alert("이름을 입력해 주세요.");
		frm.userName.focus();
		return false;
	}

	if ( frm.userPWD.value || frm.userPWD1.value ) {
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
	frm.action					=	"./userModifyProc.php";
	//frm.target				=	"procFrame";
	frm.submit();
	*/

	var postDate				=	$( "#frmInput1" ).serialize();
	$.ajax({
		url						:	"./userModifyProc.php",
		type					:	"POST",
		data					:	postDate,
		dataType				:	"html",
		contentType				:	"application/x-www-form-urlencoded; charset=UTF-8", 
		async					:	true,
		success					:	function (data)
		{
			rsDate				=	data.replace( /(\s*)/g, "" );
			if ( rsDate == "Y" ) {
				alert("수정 되었습니다.");
				location.href	=	"/index.php";
			} else {
				alert("적용시 에러가 발생하였습니다. 다시 시도해 주세요.");
			}
		}
	});
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

function memberOut()
{
	var frm						=	document.frmInput2;

	if ( confirm("정말로 회원 탈퇴 하겠습니까?") ) {
		if (frm.outReason.value=="") {
			alert("남기고 싶은말을 입력해 주세요.");
			frm.outReason.focus();
			return false;
		}

		var form				=	document.querySelector( "#frmInput2" );
		var postDate			=	new FormData(form);
		$.ajax({
			url					:	"./userOutProc.php",
			type				:	"POST",
			data				:	postDate,
			dataType			:	"html",
			//contentType		:	"application/x-www-form-urlencoded; charset=UTF-8",
			async				:	true,
			cache				:	false,
			contentType			:	false,
			processData			:	false,
			success				:	function (data)
			{
				rsDate			=	data.replace( /(\s*)/g, "" );
				if ( rsDate == "Y" ) {
					location.href	=	"/index.php";
				} else {
					alert("탈퇴시 에러가 발생하였습니다. 다시 시도해 주세요.");
				}
			}
		});
	}
}

//-->
</script>

<!--	DB Close Start	-->
<?php
include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>
<!--	DB Close End	-->