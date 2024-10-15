<!-- 2022-08-31 간편로그인 적용완료 -->
<?php
$page_title = '로그인 | 톡스앤필 브로우';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top-m.php';

session_unset();																					//	현재 연결된 세션에 등록되어 있는 모든 변수의 값을 삭제한다
session_destroy();																					//	현재의 세션을 종료한다.

// 아이디 자동저장
if ( $_COOKIE['saveUserID'] ) {
	$isChecked					=	' checked';
	$saveUserID					=	decrypt($_COOKIE['saveUserID']);
}

if ( isset($_COOKIE['saveUserID']) ) {
	$isChecked					=	' checked';
	$saveUserID					=	decrypt($_COOKIE['saveUserID']);
}
?>

<!-- https://www.toxnfillacademy.com/m/member/login.php 하단 부분은 톡스앤필 아카데미 로그인 페이지에서 소스코드 가지고 왔습니다 -->

<script type="text/javascript" src="/common/js/vendor/naveridlogin_js_sdk_2.0.0.js" charset="utf-8"></script>
<script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>

</head>

<body>

<div id="wrap" class="">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb-m.php';
	?>

	<div id="container">
		<div class="pg-tit">
			<h2>로그인</h2>
			<span>LOGIN</span>
		</div>

		<form id="frmInput" name="frmInput" method="post" style="margin-top:0;margin-bottom:0">
		<input type="hidden" id="blank"			name="blank"		value="">
		<div class="loginForm-wrap">
			<div class="minframe">
				<div class="loginForm">
					<dl>
						<dt class="sr-only">아이디</dt>
						<dd>
							<input type="text" id="loginID" name="loginID" value="<?=$saveUserID?>" tabindex="100" class="form-control" 
								title="아이디를 입력하세요" placeholder="아이디를 입력하세요">
						</dd>
						<dt class="sr-only">비밀번호</dt>
						<dd style="margin-top:-1px;">
							<input type="password" id="loginPWD" name="loginPWD" value="" tabindex="101" class="form-control"
								title="비밀번호를 입력하세요" placeholder="비밀번호를 입력하세요">
						</dd>
						<dd class="id-save">
							<div class="form-checkbox">
								<input type="checkbox" id="idSave" name="idSave" value="Y"<?=$isChecked?>>
								<label for="idSave">아이디 저장</label>
							</div>
						</dd>
					</dl>
					<a style="cursor:pointer;" ontouchend="loginChk();" class="login-btn">로그인</a>
				</div>

				<div class="social-box">
					<ul class="row">
						<li class="col-4">
							<a class="btn-sns-login" title="네이버 아이디로 로그인" style="line-height:0; height:42px;">
								<span id="naverIdLogin"></span>
								<span class="bsl-txt">로그인</span>
							</a>
						</li>
						<li class="col-4">
							<!-- ★카카오 로그인은 실제 모바일에서 작동합니다.★ -->
							<a class="btn-sns-login" style="cursor:pointer;" ontouchend="loginWithKakao();" title="카카오 아이디로 로그인"><span class="i-box box-kko"></span>로그인</a>
						</li>
						<li class="col-4">
							<a class="btn-sns-login" style="cursor:pointer;" ontouchend="FB.login();" title="페이스북 아이디로 로그인"><span class="i-box box-fb"></span>로그인</a>
						</li>
					</ul>
				</div>

				<ul class="login-other">
					<li>
						<span>계정정보를 잊으셨나요?</span>
						<a ontouchend="Common.openWindow('/m/member/idpwSearch.php', 400, 700, 'idpwSearch', 50, 120);">아이디/비밀번호 찾기</a>
					</li>
					<li>
						<span>톡스앤필브로우 회원이 아니신가요?</span>
						<a href="/m/member/join01.php">회원가입</a>
					</li>
				</ul>
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

<form id="snsLogin" name="snsLogin" method="post" style="margin-top:0;margin-bottom:0;">
<input type="hidden"			id="blank"				name="blank"				value="">
<input type="hidden"			id="snsUserID"			name="snsUserID"			value="">
<input type="hidden"			id="userName"			name="userName"				value="">
<input type="hidden"			id="userMail"			name="userMail"				value="">
<input type="hidden"			id="joinGubun"			name="joinGubun"			value="">
</form>

<script language="javascript">
<!--

function loginChk()
{
	var frm						=	document.frmInput;

	var _isChk					=	$( "#idSave" ).prop("checked");
	var idSave					=	"";

	if ( frm.loginID.value == "" ) {
		alert("아이디를 입력해 주세요.");
		frm.loginID.focus();
		return false;
	}

	if ( frm.loginPWD.value == "" ) {
		alert("비밀번호를 입력해 주세요.");
		frm.loginPWD.focus();
		return false;
	}

	if ( _isChk ) {
		idSave					=	"Y";
	} else {
		idSave					=	"N";
	}

	frm.action					=	"./loginProc.php";
	frm.target					=	"procFrame";
	frm.submit();
}

<? if ($_COOKIE['saveUserID']) { ?>
$( "#loginPWD" ).focus();
<? } else { ?>
$( "#loginID" ).focus();
<? } ?>

//-->
</script>

<!--	네이버 로그인	-->
<script type="text/javascript">
var naverIdLogin				=	new naver.LoginWithNaverId(
	{
		clientId				:	"iq4kAzctywQLtOgzknYr",
		callbackUrl				:	"https://www.toxnfillbrow.com/m/member/authNaver.php",
		callbackHandle			:	true,
		isPopup					:	true,																/* 팝업을 통한 연동처리 여부 */
		loginButton				:	{color: "white", type: 1, height: 42, width: 133 }
	}
);

naverIdLogin.init();
</script>

<!--	카카오톡 로그인	-->
<script type='text/javascript'>
//<![CDATA[
// 로그인 창을 띄웁니다.
function loginWithKakao()
{
	Kakao.Auth.login({
		success					:	function(authObj)
		{
			//alert(JSON.stringify(authObj));

			// 로그인 성공시, API를 호출합니다.
			Kakao.API.request({
				url					:	'/v2/user/me',
				success				:	function(res)
				{
					var uniqID			=	res.id;
					var email			=	res.kakao_account["email"];

					$( "#snsUserID" ).val(uniqID);
					$( "#userMail" ).val(email);
					$( "#joinGubun" ).val("3");

					snsLogin();
				},
				fail				:	function(error)
				{
					alert(JSON.stringify(error));
				}
			});
		},
		fail					:	function(err)
		{
			alert(JSON.stringify(err));
		}
	});
};
//]]>
</script>

<!--	페이스북 로그인	-->
<script>
function statusChangeCallback(response)											//	Called with the results from FB.getLoginStatus().
{
	FB.login(function(response) {
		if ( response.status === "connected" ) {
			getUserInfo();
		}
	}, {scope: "public_profile,email"});
}

function checkLoginState()														//	Called when a person is finished with the Login Button.
{
	FB.getLoginStatus(function(response) {										//	See the onlogin handler
		statusChangeCallback(response);
	});
}

window.fbAsyncInit				=	function()
{
	FB.init({
		appId					:	"1129557061005979",
		cookie					:	true,										//	Enable cookies to allow the server to access the session.
		xfbml					:	true,										//	Parse social plugins on this webpage.
		version					:	"v6.0"										//	Use this Graph API version for this call.
	});

	//FB.getLoginStatus(function(response) {									//	Called after the JS SDK has been initialized.
	//	statusChangeCallback(response);											//	Returns the login status.
	//});
};

(function(d, s, id) {															//	Load the SDK asynchronously
	var js, fjs					=	d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
		js						=	d.createElement(s); js.id = id;
		js.src					=	"https://connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));

function getUserInfo()															//	Testing Graph API after login.  See statusChangeCallback() for when this call is made.
{
	//console.log('Welcome!  Fetching your information.... ');
	FB.api("/me", function(response)
	{
		$( "#snsUserID" ).val(response.id);
		$( "#userName" ).val(response.name);
		$( "#userMail" ).val(response.email);
		$( "#joinGubun" ).val("4");

		snsLogin();
	});
}
</script>
<!--	페이스북 로그인	-->

<script>
function snsLogin()
{
	var frm						=	document.snsLogin;

	/*
	frm.action					=	"./snsLoginProc.php",
	frm.submit();
	return false();
	*/

	var postDate				=	$( "#snsLogin" ).serialize();
	$.ajax({
		type					:	"POST",
		url						:	"./_snsLoginProc.php",
		dataType				:	"html",
		contentType				:	"application/x-www-form-urlencoded; charset=UTF-8", 
		async					:	true,
		data					:	postDate,
		success					:	function(data)
		{
			rsDate				=	data.replace( /(\s*)/g, "" );
			if ( data == "Y" ) {
				location.href	=	"/index.php";
			} else {
				frm.action		=	"./snsJoin.php",
				frm.submit();
			}
		}
	});
}
</script>

<div id="fb-root"></div>
<script src="/common/js/func.js"></script>

</body>
</html>

<!--	DB Close Start	-->
<?php
include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>
<!--	DB Close End	-->