<link rel="stylesheet" href="/common/css/page.css">
<?php
$page_title = 'SNS 채널 바로가기 | 톡스앤필 브로우';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top.php';
?>

</head>

<body class="pg-detail no-footer-top">
<div id="wrap" class="main pg_detail">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb_main.php';
	?>

	<div id="" class="board-frame event sns">
		<div class="thumbnail">
			<div class="thumb-title"><img src="/common/img/commu/ev-logo.png" alt=""></div>
		</div>
		<div class="minframe">
			<div class="cont-wrap">
				<figure>
					<img src="/common/img/commu/ev-cont.png" alt="">
				</figure>
				<div class="txt-inner">
					<h1>SNS 채널 바로가기</h1>
					<p>
						톡스앤필'이라는 명성의 신뢰성을 가지고 <br>
						탈모인들의 고충을 해결할 수 있는 인재를 양성하는 <br>
						'톡스앤필 브로우' 아카데미 입니다.
					</p>
					<div class="sns-wrap">
						<!-- <a href="javascript:void kakaoChatStart()"> -->
						<a href="https://open.kakao.com/o/sAkEfwzg">
							<!-- kakao chatbot btn -->
							<div class="float-inner float-kakao">
								<figure class="cont-img">
									<img src="/common/img/commu/i-kakao-lg.png" alt="카톡 상담">
								</figure>
							</div>
						</a>
						<a href="https://www.instagram.com/toxnfill_brow/" target="_blank">
							<div class="float-inner float-insta">
								<figure class="cont-img">
									<img src="/common/img/commu/i-insta-lg.png" alt="인스타그램">
								</figure>
							</div>
						</a>
						<!-- <a href="https://www.youtube.com/@toxnfillbrow" target="_blank">
							<div class="float-inner float-youtube">
								<figure class="cont-img">
									<img src="/common/img/commu/i-youtube-lg.png" alt="유튜브">
								</figure>
							</div>
						</a>
						<a href="https://blog.naver.com/timer14864" target="_blank">
							<div class="float-inner">
								<figure class="cont-img">
									<img src="/common/img/commu/i-blog-lg.png" alt="블로그">
								</figure>
							</div>
						</a> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer-main.php';
?>

<script>
	//pagination
	$(document).on('click', '.pg-num', function(e){
      $(this).addClass('active');
      $(this).siblings('.pg-num').removeClass('active');
    });
</script>

</body>
</html>

<script language="javascript">

</script>


<!--	DB Close Start	-->
<?php
include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>
<!--	DB Close End	-->