<link rel="stylesheet" href="/common/css/page-m.css">
<?php
$page_title = '갤러리 | 톡스앤필 브로우';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top-m.php';

$bID							=	'46';
$bbsListURL						=	'/m/commu/gallery.php';
$bbsViewURL						=	'/m/commu/galleryView.php';
?>

<script language="javascript">
//<![CDATA[
var page						=	1;

function getContentList()
{
	$.ajax({
		url						:	"/m/bbs/galleryList_hj.php",
		type					:	"POST",
		data					:
		{
			bID						:	"46",
			pno						:	page
		},
		dataType				:	"html",
		contentType				:	"application/x-www-form-urlencoded; charset=UTF-8", 
		async					:	true,
		success					:	function (data)
		{
			if ( data ) {
				$( "#contentDiv" ).append(data);
				page			=	page + 1;
			}
		}
	});
}
//]]>

document.oncontextmenu = function(){return false;}	//우클릭방지
</script>

</head>

<body class="pg-detail no-footer-top">

<div id="wrap" class="main pg_detail">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb-m.php';
	?>

	<div id="" class="board-frame gallery">
		<div class="thumbnail">
			<div class="thumb-title">
				<img src="/common/img/title/gallery.png" alt="">
			</div>
		</div>
		<div class="pg-tit">
			<h2>갤러리</h2>
		</div>

		<div class="board-list-wrap">
			<div class="minframe">
				<ul class="event-list row" id="contentDiv"></ul>
			</div>
			<div class="more-btn-wrap">
				<button type="button" class="btn-more" onClick="getContentList();">MORE</button>
			</div>
		</div>
	</div>

	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer-m.php';
	?>
</div>

</body>
</html>

<script language="javascript">
//<![CDATA[
getContentList();
//]]>
</script>

<!--	DB Close Start	-->

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/floating-m.php';
?>
<?php
include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>
<!--	DB Close End	-->