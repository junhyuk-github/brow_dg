<!-- https://www.toxnfillacademy.com/member/snsJoin.php 톡스앤필 뷰티 아카데미 페이지에서 소스코드 가지고 왔습니다. -->
<?php
$page_title = 'SNS 간편 회원가입 | 톡스앤필 브로우';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top.php';

$snsUserID						=	allTags($_POST['snsUserID']);
$userName						=	allTags($_POST['userName']);
$userMail						=	allTags($_POST['userMail']);
$joinGubun						=	allTags($_POST['joinGubun']);

if ( $userMail ) {
	$userMails					=	explode('@', $userMail);
	$userMail1					=	$userMails[0];
	$userMail2					=	$userMails[1];
}
?>

</head>

<body>

<div id="wrap" class="noneFix">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb.php';
	?>

	<div id="container">
		<div class="breadcrumb-wrap maxframe">
			<ul class="breadcrumb">
				<li><span>홈</span></li>
				<li><span>SNS간편 회원가입</span></li>
			</ul>
		</div>

		<div class="pg-tit noLine">
			<h2>SNS 간편 회원가입</h2>
			<span>SNS계정을 통해 간편하게 톡스앤필 브로우 서비스를 이용할 수 있습니다.</span>
		</div>

		<form id="frmInput" name="frmInput" method="post" style="margin-top:0;margin-bottom:0">
		<input type="hidden"			id="blank"				name="blank"				value="">
		<input type="hidden"			id="userID"				name="userID"				value="<?=$snsUserID?>">
		<input type="hidden"			id="snsUserID"			name="snsUserID"			value="<?=$snsUserID?>">
		<input type="hidden"			id="userMail"			name="userMail"				value="">
		<input type="hidden"			id="userMobile"			name="userMobile"			value="">
		<input type="hidden"			id="userGroup"			name="userGroup"			value="2">
		<input type="hidden"			id="joinGubun"			name="joinGubun"			value="<?=$joinGubun?>">
		<div class="sns-join-wrap">
			<div class="join-agree-wrap">
				<h3 class="sr-only">약관동의</h3>
				<ul>
					<li class="agd-item">
						<div class="agd-hd">
							<span class="form-checkbox">
								<input type="checkbox" class="" id="allAgree" name="allAgree" value="Y" onClick="allChk();">
								<label for="allAgree">톡스앤필 브로우 회원약관에 모두 동의합니다.</label>
							</span>
						</div>
					</li>
					<li>
						<div class="agd-hd">
							<span class="form-checkbox">
								<input type="checkbox" class="snsAgree" id="agree1" name="agree1" value="Y" onClick="isAllChk();">
								<label for="agree1">이용약관 동의<span class="reqTxt">(필수)</span></label>
							</span>
							<a class="adToggle-btn" onclick="viewDetail(this); return false;">
								<span class="carvon-right">내용보기</span>
							</a>
						</div>
						<div class="join-agree hd">
							<div>
								<?php
								include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_policyCnt.php';
								?>
							</div>
						</div>
					</li>
					<li>
						<div class="agd-hd">
							<span class="form-checkbox">
								<input type="checkbox" class="snsAgree" id="agree2" name="agree2" value="Y" onClick="isAllChk();">
								<label for="agree2">개인정보취급방침 동의<span class="reqTxt">(필수)</span></label>
							</span>
							<a class="adToggle-btn" onclick="viewDetail(this); return false;">
								<span class="carvon-right">내용보기</span>
							</a>
						</div>
						<div class="join-agree hd">
							<div>
								<?php
								include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_privacyPlcyCnt.php';
								?>
							</div>
						</div>
					</li>
				</ul>
			</div>

			<div class="joinForm-wrap">
				<h3 class="sr-only">회원정보 입력</h3>
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
								<th><span class="req">휴대폰</span></th>
								<td>
									<select id="userMobile1" name="userMobile1">
										<option value="010" selected="">010</option>
										<option value="011">011</option>
										<option value="016">016</option>
										<option value="017">017</option>
										<option value="018">018</option>
										<option value="019">019</option>
									</select>
									<span>-</span>
									<input type="number" id="userMobile2" name="userMobile2" placeholder="" size="15" maxlength="4">
									<span>-</span>
									<input type="number" id="userMobile3" name="userMobile3" value="" placeholder="" size="15" maxlength="4">
								</td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="text-center">
					<p>
						톡스앤필 브로우는 고객님의 소중한 개인정보를 안전하게 관리하고 있습니다.<br/>고객님의 주요정보는 담당자 이외에는 접근을 제한하고 있습니다.
					</p>
				</div>

				<div class="ja-btn-wrap">
					<a style="cursor:pointer;" onClick="goNextStep();" class="goNext">
						<span class="i-next">가입완료</span>
					</a>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/share.php';
?>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer.php';
?>

<script>
function viewDetail(obj)
{
	var box						=	$(obj).parent().next();
	if ( box.hasClass('hd') ) {
		box.removeClass('hd');
		$(obj).addClass('on');
	} else {
		box.addClass('hd');
		$(obj).removeClass('on');
	}
}

function isAllChk() {
	var chkboxNum		=	$('input.snsAgree').length;
	var chkedNum		=	$('input.snsAgree:checked').length;

	 if (chkedNum == chkboxNum)	{
		$( "input:checkbox[id='allAgree']" ).prop("checked", true);
	} else {
		$( "input:checkbox[id='allAgree']" ).prop("checked", false);
	}
}

function allChk()
{
	var isChk					=	$( "input:checkbox[id='allAgree']" ).is(":checked");

	if ( isChk ) {
		$( "#agree1" ).prop("checked", true);
		$( "#agree2" ).prop("checked", true);
	} else {
		$( "#agree1" ).prop("checked", false);
		$( "#agree2" ).prop("checked", false);
	}
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

function goNextStep()
{
	var frm						=	document.frmInput;

	if ( frm.agree1.checked == false ) {
		alert("이용약관에에 동의해 주세요.");
		frm.agree1.focus();
		return false;
	}

	if ( frm.agree2.checked == false ) {
		alert("개인정보취급방침에 동의해 주세요.");
		frm.agree2.focus();
		return false;
	}

	if ( frm.userName.value == "" ) {
		alert("이름을 입력해 주세요.");
		frm.userName.focus();
		return false;
	}

	if ( frm.userMail1.value == "" && frm.userMail2.value == "" ) {
		alert("이메일을 입력하세요.");
		return false;
	}


	var userMail				=	frm.userMail1.value + "@" + frm.userMail2.value;
	$( "#userMail" ).val(userMail);

	if ( !checkNumber(frm.userMobile1.value) ) {
		alert("휴대폰 번호를 입력해 주세요.");
		frm.userMobile1.focus();
		return false;
	}

	if ( !checkNumber(frm.userMobile2.value) ) {
		alert("휴대폰 번호를 입력해 주세요.");
		frm.userMobile2.focus();
		return false;
	}

	if ( !checkNumber(frm.userMobile3.value) ) {
		alert("휴대폰 번호를 입력해 주세요.");
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
</script>

</body>
</html>

<!--	DB Close Start	-->
<?php
include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>
<!--	DB Close End	-->