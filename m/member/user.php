<link rel="stylesheet" href="/common/css/page-m.css">
<?php
$page_title = '마이페이지 | 톡스앤필 브로우';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top-m.php';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/userLoginChk_m.php';

$data							=	$common['MemberManager']->getMemberInfo($common['userIdx']);
$data							=	$data->getData();
$rs								=	$data[0];

$useCouponCnt					=	$common['CouponManager']->getCouponIssueCount();

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
	$recommender				=	$rs['recommender'];
	$recommenderCode			=	$rs['recommenderCode'];
	$regDate					=	$rs['regDate'];

	// 시, 분, 초 무시하고 일(day)로만 차이 계산
	$nowDate = date('Y-m-d');
	$nowDate = strtotime($nowDate);

	$endDate = date('Y-m-d', strtotime($regDate));
	// $endDate = date('2023-08-20');
	$endDate = strtotime($endDate);

	$dateDiff = ($nowDate-$endDate) / 3600 / 24;
	$recommenderTxt = '';
	$certChk = '';

	switch ($dateDiff) {
		case 0 :
			$certChk			=	'N';
			$recommenderTxt		=	'3일 남았어요!';
			break;
		case 1 :
			$certChk			=	'N';
			$recommenderTxt		=	'2일 남았어요!';
			break;
		case 2 :
			$certChk			=	'N';
			$recommenderTxt		=	'1일 남았어요!';
			break;
		default:
			$certChk			=	'Y';
			$recommenderTxt		=	'지났습니다.';
			break;
	}

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

switch ($common['userGroup']) {
	case '1':
		$userGubun = '비회원';
		break;
	case '2':
		$userGubun = '일반회원';
		break;
	case '3':
	case '4':
		$userGubun = '수강생';
		break;
	case '5':
		$userGubun = '영업사원';
		break;
	case '6':
		$userGubun = '마스터';
		break;
	default:
		$userGubun = '관리자에게 문의하세요';
		break;
}

// 공통코드 name 가져오기 - 쿠폰 처리상태
$stateList						=	$common['PubCode']->getPubCodeName(809);
$stateList						=	$stateList->getData();

//접근 가능: 일반회원, 정회원, 수강생, 영업사원, 마스터
if( $common['userGroup'] !== '2' && $common['userGroup'] !== '3' && $common['userGroup'] !== '4' && $common['userGroup'] !== '5' && $common['userGroup'] !== '6' ) {
?>
	<script>
		alert("잘못된 접근 입니다.");
		document.referrer && -1 != document.referrer.indexOf('https://www.toxnfillacademy.com/')?
			history.back(-1) : location.href='https://www.toxnfillacademy.com/m/';
	</script>
<? } ?>
</head>

<body class="pg-detail navBgOn">
<div id="wrap" class="main">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb-m.php';
	?>

	<div id="" class="pg_join pg_my">
		<div class="pg-tit noLine">
			<h2>마이페이지</h2>
		</div>
		<div class="minframe">
			<div class="coupon-frame active">
				<div class="coupon-wrap">
					<div class="left-wrap">
						<figure><img src="/common/img/member/i-brow-logo.png" alt="톡스앤필 브로우"></figure>
						<div class="user-inner">
							<span class="status"><?=$userGubun?></span>
							<b class="user-name"><?=$userName?></b>님 안녕하세요.
							<div class="copy-wrap">
								<span class="tit">추천인코드</span>
								<div class="num-wrap">
									<input value="<?=$recommender?>" readonly/>
									<button onclick="copy_to_clipboard(this)">
										<img src="/common/img/member/i-copy.png" alt="복사하기">복사
									</button>
								</div>
							</div>
						</div>
					</div>
					<div class="right-wrap text-center">
						사용가능 쿠폰
						<span><?=$useCouponCnt?></span>
					</div>
				</div>
			</div>
			<div id="userTab">
				<ul class="tab" role="tablist">
					<li id="tab1" class="tab-item" role="tab" aria-controls="tab-panel1">회원정보 수정</li>
					<li id="tab2" class="tab-item" role="tab" aria-controls="tab-panel2">할인 쿠폰 내역</li>
					<li id="tab3" class="tab-item" role="tab" aria-controls="tab-panel3">회원탈퇴</li>
				</ul>

				<div id="tab-panel1" class="tab-panel" role="tabpanel" aria-labelledby="tab1">
					<h3 class="sr-only">회원정보 수정</h3>
					<form id="frmInput1" name="frmInput1" method="post" style="margin-top:0;margin-bottom:0">
					<input type="hidden"		id="blank"					name="blank"				value="">
					<input type="hidden"		id="userIdx"				name="userIdx"				value="<?=$common['userIdx']?>">
					<input type="hidden"		id="userMail"				name="userMail"				value="">
					<input type="hidden"		id="userMobile"				name="userMobile"			value="<?=$userMobile?>">
					<input type="hidden"		id="userMobileChk"			name="userMobileChk"		value="Y">
					<input type="hidden"		id="certChk"                name="certChk"				value="<?=$certChk?>">
					<input type="hidden"		id="certNo"					name="certNo"				value="">
					<input type="hidden"		id="dateDiff"				name="dateDiff"				value="<?=$dateDiff?>">
					<input type="hidden"		id="commendGroup"			name="commendGroup"			value="">

					<div class="joinForm-wrap">
						<h3 class="notice-txt"><span class="req">항목</span>은 필수 항목입니다.</h3>
						<table class="join-form">
							<caption>회원정보 입력폼</caption>
							<tbody>
								<tr scope="row">
									<th><span class="req">이름</span></th>
									<td>
										<input type="text" id="userName" name="userName" value="<?=$userName?>" placeholder="">
									</td>
								</tr>
								<tr scope="row">
									<th><span class="req">아이디</span></th>
									<td>
										<input type="text" id="userID" name="userID" value="<?=$userID?>" placeholder="" readonly>
									</td>
								</tr>
								<tr scope="row">
									<th><span class="req">비밀번호</span></th>
									<td>
										<input type="password" id="userPWD" name="userPWD" value="" placeholder="">
										<span>특수문자 및 한글 입력불가, 6자리 이상 입력</span>
									</td>
								</tr>
								<tr scope="row">
									<th><span class="req">비밀번호 확인</span></th>
									<td>
										<input type="password" id="userPWD1" name="userPWD1" value="" placeholder="">
										<span>비밀번호 확인을 위해 다시 한번 입력해주세요.</span>
									</td>
								</tr>
								<tr scope="row">
									<th><span class="req">휴대폰</span></th>
									<td>
										<div class="wrap __phone">
											<select id="userMobile1" name="userMobile1">
												<option value="010"<? if ( $userMobile1 == '010' ) { echo ' selected'; } ?>>010</option>
												<option value="011"<? if ( $userMobile1 == '011' ) { echo ' selected'; } ?>>011</option>
												<option value="016"<? if ( $userMobile1 == '016' ) { echo ' selected'; } ?>>016</option>
												<option value="017"<? if ( $userMobile1 == '017' ) { echo ' selected'; } ?>>017</option>
												<option value="018"<? if ( $userMobile1 == '018' ) { echo ' selected'; } ?>>018</option>
												<option value="019"<? if ( $userMobile1 == '019' ) { echo ' selected'; } ?>>019</option>			
											</select>
											<input type="number" id="userMobile2" name="userMobile2" value="<?=$userMobile2?>" maxlength="4" onkeyup="mobileChg();" onkeydown="mobileChg();" oninput="mobileMaxLengthChk(this)">
											<input type="number" id="userMobile3" name="userMobile3" value="<?=$userMobile3?>" maxlength="4" onkeyup="mobileChg();" onkeydown="mobileChg();" oninput="mobileMaxLengthChk(this)">
										</div>
										<button type="button" class="btn-blk" id="sendBtn1" onClick="sendCertNo();" style="display:none">
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
											<input type="text" id="userMail1" name="userMail1" value="<?=$userMail1?>" placeholder="">
											<p>@</p>
											<input type="text" id="userMail2" name="userMail2" value="<?=$userMail2?>" placeholder="">
										</div>
										<select id="selMail" name="selMail" onChange="chgMail(this.value);">
											<option value="typing" selected="">직접입력</option>
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
										<div class="input-btn-box">
											<input type="text" id="userZip" name="userZip" value="<?=$userZip?>" placeholder="" readOnly ontouchend="openPostcode(this.form);">
											<button type="button" ontouchend="openPostcode(this.form);" class="btn-gray">우편번호</button>
										</div>
										<input type="text" id="userAddr1" name="userAddr1" value="<?=$userAddr1?>" placeholder="" style="margin-top:5px;" readOnly ontouchend="openPostcode(this.form);"><br/>
										<input type="text" id="userAddr2" name="userAddr2" value="<?=$userAddr2?>" placeholder="" style="margin-top:5px;">
									</td>
								</tr>
								<tr scope="row">
									<th>생년월일</th>
									<td>
										<input type="number" id="userBirth" name="userBirth" value="<?=$userBirth?>" placeholder=""><br/>
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
						<div class="recom-wrap">
							<h1>추천인 코드 입력</h1>
							<p>추천인 코드를 입력하시면<br/>수강비 할인 쿠폰을 드립니다.</p>
							<label for="" class="search-wrap">
								<input type="text" id="recommenderCode" name="recommenderCode" value="<?=$recommenderCode?>" placeholder="" size="30"<? if ( $dateDiff > 2 || $recommenderCode ) { echo ' readonly'; } ?>>
								<button type="button" class="btn-search" id="recommendBtn"<? if ( $dateDiff > 2 || $recommenderCode ) { echo ' disabled'; } ?> onclick="commendChk();">조회</button>
							</label>
							<p class="info-wrap">
								<img src="/common/img/member/i-info.png" alt="안내사항">
								<? if ( $recommenderCode ) { ?>
								<span>할인 쿠폰 발급이 완료 되었습니다.</span>
								<? } else { ?>
								<span>추천인 코드 입력 기간이 <?=$recommenderTxt?></span>
								<? } ?>
							</p>
						</div>
						<div class="ja-btn-wrap">
							<a href="javascript:history.back();">취소</a>
							<a style="cursor:pointer;" onClick="memberModify();" class="goNext">
								<span>회원정보 수정</span>
							</a>
						</div>
					</div>
					</form>
				</div>

				<div id="tab-panel2" class="tab-panel" role="tabpanel" aria-labelledby="tab2">
					<div class="coupon-inner">
						<span class="useable-coupon">사용 가능한 쿠폰 : 총 <?=$useCouponCnt?>개</span>
						<select id="couponState" name="couponState" class="select-coupon" onchange="couponIssueDetail()";>
							<option value="" selected="">전체</option>
							<?
								if ( $stateList ) {
									foreach ( $stateList as $key => $val ) {
										$pubCode			=	$val['pubCode'];
										$codeName			=	$val['codeName'];
							?>
							<option value="<?=$pubCode?>"><?=$codeName?></option>
							<?
									}
								}
							?>
						</select>
					</div>
					<div id="couponDetail"></div>
				</div>	

				<div id="tab-panel3" class="tab-panel" role="tabpanel" aria-labelledby="tab2">
					<form id="frmInput2" name="frmInput2" method="post" style="margin-top:0;margin-bottom:0">
					<div class="minframe secession-wrap">
						<p class="sc-p">
							그동안 톡스앤필 브로우를 이용해주셔서 감사합니다. <br/>
							탈퇴사유를 남겨주시면 보다 발전된 톡스앤필 브로우로 찾아뵙겠습니다.
						</p>
						<div class="sc-cmt">
							<label for=""><span>톡스앤필 브로우</span>에 남기고 싶은 말</label>
							<textarea name="outReason" id="outReason" rows="6" class="form-control"></textarea>
						</div>
						<div class="ja-btn-wrap">
							<a style="cursor:pointer;" ontouchend="memberOut();" class="goNext">탈퇴하기</a>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/floating-m.php';
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
	couponIssueDetail();

	Common.tabUI('#userTab');

	//복사기능
	function copy_to_clipboard(event) {    
		var copyText = event.previousElementSibling;
		copyText.select();
		copyText.setSelectionRange(0, 99999);
		document.execCommand("Copy");
		copyText.setSelectionRange(0, 0);
		alert('복사되었습니다, 감사합니다.');
	}

	//쿠폰 노출/미노출
	$(document).on('click', '#tab1', function(e){
	  $('.coupon-frame').addClass('active');
	});
	$(document).on('click', '#tab2', function(e){
	  $('.coupon-frame').removeClass('active');
	});
	$(document).on('click', '#tab3' , function(e){
	  $('.coupon-frame').removeClass('active');
	});

	//popup
	// $(document).on('click', '.pg_my .btn-detail', function(e){
	//   e.preventDefault();
	//   $('body').addClass('scrollLock'); 
	//   $('.coupon-list-wrap').addClass('pop');
	// });
	$(document).on('click', '.pop-detail-wrap .btn-close', function(e){
	  e.preventDefault();
	  $('body').removeClass('scrollLock'); 
	  $('.coupon-list-wrap').removeClass('pop');
	});

	//pagination
	$(document).on('click', '.pg-num', function(e){
      $(this).addClass('active');
      $(this).siblings('.pg-num').removeClass('active');
    });

	//핸드폰번호 체크
	function mobileMaxLengthChk(object) {
		object.value = object.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');

		if (object.value.length >= object.maxLength) {
			object.value = object.value.slice(0, object.maxLength);
			$(object).next().focus();
		}
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
		
		if ( $('#certChk').val() == 'N' ) {
			alert("추천인 코드를 확인해주세요.");
			frm.recommenderCode.focus();
			return false;
		}

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

		if ( frm.outReason.value == "" ) {
			alert("남기고 싶은말을 입력해 주세요.");
			frm.outReason.focus();
			return false;
		}

		if ( confirm("정말로 회원 탈퇴 하겠습니까?") ) {
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
						location.href	=	"/m/index.php";
					} else {
						alert("탈퇴시 에러가 발생하였습니다. 다시 시도해 주세요.");
					}
				}
			});
		}
	}

	//추천인 코드 체크
	function commendChk() {
		let chkNo = $('#recommenderCode').val();

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
				if ( response != 'N' ) {
					$('#certChk').val('Y');
					$('#commendGroup').val(response);
					$('#recommenderCode').prop('readonly', true);
					$('#recommendBtn').prop('disabled', true);
					alert('추천인 코드가 등록되었습니다.');
				} else {
					alert('추천인코드를 다시 확인 해주세요.');
					$('#recommenderCode').focus();
				}
			}
		});
	}

	function sendCertNo() {
		var frm = document.frmInput1;

		if (frm.userMobile2.value == "" || frm.userMobile2.value.length < 4 ) {
			alert("휴대폰 번호 두번째 자리를 입력해 주십시오.");
			frm.userMobile2.focus();
			return false;
		}

		if (frm.userMobile3.value == "" || frm.userMobile3.value.length < 4 ) {
			alert("휴대폰 번호 세번째 자리를 입력해 주십시오.");
			frm.userMobile3.focus();
			return false;
		}

		frm.userMobile.value		=	frm.userMobile1.value + "-" + frm.userMobile2.value + "-" + frm.userMobile3.value;

		var form					=	document.querySelector("#frmInput1");
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

	//인증번호 체크
	function checkCert() {
		var frm = document.frmInput1;

		if ( frm.certNo.value == frm.chkAuthNum.value ) {
			frm.certChk.value		=	"Y";
			$('#userMobileChk').val('Y');

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

	// 휴대폰번호 변경 시 인증번호 버튼
	function mobileChg() {
		$oldMobile = $('#userMobile').val();

		$userMobile1 = $('#userMobile1').val();
		$userMobile2 = $('#userMobile2').val();
		$userMobile3 = $('#userMobile3').val();

		$chgMobile = $userMobile1 + '-' + $userMobile2 + '-' + $userMobile3;

		if ( $oldMobile == $chgMobile ) {
			$('#sendBtn1').css('display', 'none');
			$('#userMobileChk').val('Y');
		} else {
			$('#sendBtn1').css('display', '');
			$('#userMobileChk').val('N');
		}
	}

	function couponIssueDetail() {
		var gubun = $('#couponState').val();

		if ( gubun == undefined ) { gubun = ''; }

		$.ajax({
			url						:	"./_couponIssueDetail.php",
			type					:	"POST",
			data					:	{
					gubun	:	gubun
			},
			dataType				:	"html",
			// contentType				:	"application/x-www-form-urlencoded; charset=UTF-8",
			async					:	true,
			success					:	function (data) {
				$('#couponDetail').empty();
				$('#couponDetail').html(data);
			}
		});
	}

	function openDetail(data) {
		$('#couponPop').empty();

		$.ajax({
			url						:	"./_couponIssueDetailPop.php",
			type					:	"POST",
			data					:	data,
			dataType				:	"html",
			// contentType				:	"application/x-www-form-urlencoded; charset=UTF-8",
			async					:	true,
			success					:	function (data) {
				$('#couponPop').html(data);

				$('body').addClass('scrollLock'); 
				$('.coupon-list-wrap').addClass('pop');
			}
		});
	}

	function couponUsed(idx) {
		console.log(idx);

		$.ajax({
			url						:	"./_couponIssueUsed.php",
			type					:	"POST",
			data					:	{
					idx			:	idx
			},
			dataType				:	"html",
			// contentType				:	"application/x-www-form-urlencoded; charset=UTF-8",
			async					:	true,
			success					:	function (data) {
				rsDate				=	data.replace( /(\s*)/g, "" );
				if ( rsDate == "Y" ) {
					alert("쿠폰 사용 처리 되었습니다.");
					location.reload();
				} else {
					alert("에러가 발생하였습니다. 다시 시도해 주세요.");
				}
			}
		});
	}
</script>

<!--	DB Close Start	-->
<?php
include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>
<!--	DB Close End	-->