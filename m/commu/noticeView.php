<link rel="stylesheet" href="/common/css/page-m.css">
<?php
$page_title = '공지사항 | 톡스앤필 브로우';
$bID							=	52;
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top-m.php';

$idx							=	allTags($_REQUEST['idx']);
$pno							=	allTags($_REQUEST['pno']);

if ($idx) {
    $data						=	$common['BoardManager']->getBBSInfo($bID, $idx);
    $data					    =	$data->getData();
    $bbsInfo                    =   $data[0];

    $subject                    =   $bbsInfo['subject'];
    $regDate				    =	$bbsInfo['regDate'];
    $regDate				    =	date('Y.m.d', strtotime($regDate));
    $contents				    =	$bbsInfo['contents'];
	$contents		            =	str_replace("/uploadFiles", 'https://intranet.bbgnetworks.com/uploadFiles', $contents);
} else {
    ?>
    <script>
        alert("비정상적인 접근입니다.");
        history.back(-1);
    </script>
<?php } ?>
</head>

<body class="pg-detail no-footer-top">
<div id="wrap" class="main pg_board pg_detail">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb-m.php';
	?>

	<div id="" class="board-frame notice">
		<div class="thumbnail">
			<div class="thumb-title">notice</div>
		</div>
		<div class="pg-tit">
			<h2>공지사항</h2>
		</div>
		<div class="minframe text-center">
			<div class="cont-wrap">
				<div class="cont-title">
                    <?=$subject?>
					<span class="cont-date"><?=$regDate?></span>
				</div>
				<p class="cont-txt">
                    <?=$contents?>
				</p>
			</div>
			<a href="/commu/notice.php" class="btn-list text-center">목록으로</a>
		</div>

	</div>
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/floating-m.php';
?>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer-m.php';
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