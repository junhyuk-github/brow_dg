<!-- 
	@ 휘진
	@ 네이버 로그인 팝업창이 자동으로 닫히지 않아 추가한 페이지 
-->

<?php
$page_title = 'SNS 간편 회원가입 | 톡스앤필 뷰티아카데미';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top-m.php';
?>

<!-- (1) LoginWithNaverId Javscript SDK -->
<script type="text/javascript" src="https://static.nid.naver.com/js/naveridlogin_js_sdk_2.0.0.js" charset="utf-8"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

</head>

<body>

<!--
(2) LoginWithNaverId Javscript 설정 정보 및 초기화 : https://developers.naver.com/docs/login/web/
-->
<script>
var naverLogin					=	new naver.LoginWithNaverId(
	{
		clientId				:	"iq4kAzctywQLtOgzknYr",
		callbackUrl				:	"https://www.toxnfillbrow.com/m/member/authNaver.php",
		isPopup					:	true,
		callbackHandle			:	true
		/* callback 페이지가 분리되었을 경우에 callback 페이지에서는 callback처리를 해줄수 있도록 설정합니다. */
	}
);

/* (3) 네아로 로그인 정보를 초기화하기 위하여 init을 호출 */
naverLogin.init();

/* (4) Callback의 처리. 정상적으로 Callback 처리가 완료될 경우 main page로 redirect(또는 Popup close) */
window.addEventListener("load", function () {
	naverLogin.getLoginStatus(function (status) {
		if ( status ) {
			/* (5) 필수적으로 받아야하는 프로필 정보가 있다면 callback처리 시점에 체크 */
			var uniqID			=	naverLogin.user.getId();
			var email			=	naverLogin.user.getEmail();
			var name			=	naverLogin.user.getName();

			if ( email == undefined || email == null || name == undefined || name == null ) {
				alert("회원이름, 이메일, 별명, 성별, 생일은 필수정보입니다.\n정보제공에 동의해주세요.");
				/* (5-1) 사용자 정보 재동의를 위하여 다시 네아로 동의페이지로 이동함 */
				naverLogin.reprompt();
				return;
			}

			$( "#snsUserID", opener.document ).val(uniqID);
			$( "#userName", opener.document ).val(name);
			$( "#userMail", opener.document ).val(email);
			$( "#joinGubun", opener.document ).val("2");

			window.close();
			opener.snsLogin();
		} else {
			console.log("callback 처리에 실패하였습니다.");
			alert(status);
		}
	});
});
</script>

</body>
</html>

<!--	DB Close Start	-->
<?php
include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>
<!--	DB Close End	-->