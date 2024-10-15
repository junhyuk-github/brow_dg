<?php
$page_title = '아이디&비밀번호 찾기 | 톡스앤필 뷰티아카데미';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top.php';
?>
</head>
<body>
<div id="">
	<header class="idpws-header">
		<h1>아이디/비밀번호 찾기</h1>
	</header>

	<div class="idpws-cont">
		<form id="frmSchID" name="frmSchID" method="post" style="margin-top:0;margin-bottom:0">
		<input type="hidden" id="blank"					name="blank"				value="">
		<section>
			<h2>아이디찾기</h2>
			<input type="text" id="findName" name="findName" value="" placeholder="이름을 입력해주세요">
			<input type="text" id="findMail" name="findMail" value="" placeholder="이메일을 입력해주세요">
			<button type="button" onClick="findID();">아이디 찾기</button>
		</section>
		</form>

		<form id="frmSchPWD" name="frmSchPWD" method="post" style="margin-top:0;margin-bottom:0">
		<input type="hidden" id="blank"					name="blank"				value="">
		<section>
			<h2>비밀번호 찾기</h2>
			<input type="text" id="findID" name="findID" value="" placeholder="아이디를 입력해주세요">
			<input type="text" id="findMobile" name="findMobile" value="" placeholder="휴대폰 번호를 입력해주세요 ('-' 제외하고 입력)">
			<button type="button" onClick="findPWD();">임시 비밀번호 발송</button>
		</section>
		</form>
	</div>
</div>

</body>
</html>

<script language="javascript">
<!--

function findID()
{
	var frm						=	document.frmSchID;

	if ( frm.findName.value == "" ) {
		alert("이름을 입력해주세요.");
		frm.findName.focus();
		return false;
	}

	if ( frm.findMail.value == "" ) {
		alert("이메일을 입력해주세요.");
		frm.findMail.focus();
		return false;
	}

	$.ajax({
		url						:	"./_findIDProc.php",
		type					:	"POST",
		data					:
		{
			findName				:	frm.findName.value,
			findMail				:	frm.findMail.value
		},
		dataType				:	"html",
		contentType				:	"application/x-www-form-urlencoded; charset=UTF-8", 
		async					:	true,
		success					:	function (data)
		{
			rsDate				=	data.replace( /(\s*)/g, "" );
			if ( rsDate == "N" ) {
				alert("입력하신 정보와 일치하는 아이디가 없습니다.");
			} else {
				alert("회원님의 아이디는 " + rsDate + " 입니다.");
			}
		}
	});
}

function findPWD()
{
	var frm						=	document.frmSchPWD;

	if ( frm.findID.value == "" ) {
		alert("아이디를 입력해주세요.");
		frm.findID.focus();
		return false;
	}

	if ( frm.findMobile.value == "" ) {
		alert("이메일을 입력해주세요.");
		frm.findMobile.focus();
		return false;
	}

	$.ajax({
		url						:	"./_findPWDProc.php",
		type					:	"POST",
		data					:
		{
			findID					:	frm.findID.value,
			findMobile				:	frm.findMobile.value
		},
		dataType				:	"html",
		contentType				:	"application/x-www-form-urlencoded; charset=UTF-8", 
		async					:	true,
		success					:	function (data)
		{
			//console.log(data);
			rsDate				=	data.replace( /(\s*)/g, "" );
			if ( rsDate == "N" ) {
				alert("입력하신 정보로 가입된 아이디가 없습니다.");
			} else {
				alert("가입 시 등록하셨던 휴대폰 번호로 임시 비밀번호를 발송했습니다.");
			}
		}
	});
}

//	핸드폰 번호 하이픈(-) 자동입력
document.getElementById("findMobile").onkeyup = function(event)
{
	event						=	event || window.event;
	var _val					=	this.value.trim();
	this.value					=	autoHypenPhone(_val) ;
}
//	핸드폰 번호 하이픈(-) 자동입력

//	핸드폰 번호 하이픈(-) 자동입력
function autoHypenPhone(str)
{
	str							=	str.replace(/[^0-9]/g, '');
	var tmp						=	"";
	if ( str.length < 4 ) {
		return str;
	} else if ( str.length < 7 ) {
		tmp						+=	str.substr(0, 3);
		tmp						+=	"-";
		tmp						+=	str.substr(3);
		return tmp;
	} else if ( str.length < 11 ) {
		tmp						+=	str.substr(0, 3);
		tmp						+=	"-";
		tmp						+=	str.substr(3, 3);
		tmp						+=	"-";
		tmp						+=	str.substr(6);
		return tmp;
	} else {
		tmp						+=	str.substr(0, 3);
		tmp						+=	"-";
		tmp						+=	str.substr(3, 4);
		tmp						+=	"-";
		tmp						+=	str.substr(7);
		return tmp;
	}
	return str;
}
//	핸드폰 번호 하이픈(-) 자동입력

//-->
</script>

<!--	DB Close Start	-->
<?php
include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>
<!--	DB Close End	-->