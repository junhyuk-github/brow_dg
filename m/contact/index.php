<link rel="stylesheet" href="/common/css/page-m.css">
<?php
$page_title = '온라인 상담 | 톡스앤필 브로우';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top-m.php';
$category						=	'contact';
?>
<script type="text/javascript">
    var classCaptcha;
    var franchCaptcha;
    var treatCaptcha;
    var classRecaptchaResponse = "";
    var franchRecaptchaResponse = "";
    var treatRecaptchaResponse = "";
    var captchaSiteKey = "<?=$captchaSiteKey?>";

    function classCaptchaCallBack(res) {
        classRecaptchaResponse = res;
    }
    function franchCaptchaCallBack(res) {
        franchRecaptchaResponse = res;
    }
    function treatCaptchaCallBack(res) {
        treatRecaptchaResponse = res;
    }

    var onloadCallback = function () {
        classCaptcha = grecaptcha.render('classCaptcha', {
            'sitekey' : captchaSiteKey,
            'callback' : classCaptchaCallBack,
        });
        franchCaptcha = grecaptcha.render('franchCaptcha', {
            'sitekey' : captchaSiteKey,
            'callback' : franchCaptchaCallBack,
        });
        treatCaptcha = grecaptcha.render('treatCaptcha', {
            'sitekey' : captchaSiteKey,
            'callback' : treatCaptchaCallBack,
        });
    }
</script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
</head>

<body class="pg-detail no-footer-top">
	<div id="wrap" class="main pg_detail pg_board consult">
		<?php
		include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb-m.php';
		?>
		<div id="" class="board-frame online-consulting">
			<div class="thumbnail">
				<div class="thumb-title">
					<img src="/common/img/title/online_consulting.png" alt="">
				</div>
			</div>
			<div class="pg-tit">
				<h2>상담신청하기</h2>
				<p>
					궁금한 내용을 톡스앤필 브로우에 물어봐주세요!
				</p>
			</div>

			<div id="userTab">
				<div class="minframe">
					<ul class="tab" role="tablist">
						<li id="tab1" class="tab-item" role="tab" aria-controls="tab-panel1">수강 문의</li>
						<li id="tab2" class="tab-item" role="tab" aria-controls="tab-panel2">가맹 문의</li>
						<li id="tab3" class="tab-item" role="tab" aria-controls="tab-panel3">시술 문의</li>
					</ul>
					<div id="tab-panel1" class="tab-panel" role="tabpanel" aria-labelledby="tab1">
						<?php
						include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/classSubmit-m.php';
						?>
					</div>
					<div id="tab-panel2" class="tab-panel" role="tabpanel" aria-labelledby="tab2">
						<?php
						include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/franchSubmit-m.php';
						?>
					</div>
					<div id="tab-panel3" class="tab-panel" role="tabpanel" aria-labelledby="tab3">
						<?php
						include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/treatInquiry-m.php';
						?>
					</div>
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
	<script src="/common/js/func.js"></script>
	<script>
		Common.tabUI('#userTab');

        function addEmailAddress(object) {
            var selAddress = object.value;
            $(object).siblings('.email-input').find('#emailAddress').val(selAddress);
        }

        function mobileMaxLengthChk(object) {
            object.value = object.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');

            if (object.value.length >= object.maxLength) {
                object.value = object.value.slice(0, object.maxLength);
                $(object).next().focus();
            }
        }
	</script>
</body>
</html>

