<link rel="stylesheet" href="/common/css/page.css">
<?php
$page_title = '수강생 포트폴리오 | 톡스앤필 브로우';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top.php';

$bID							=	'47';
$bbsListURL						=	'/commu/studentWork.php';
$bbsViewURL						=	'/commu/studentWorkView.php';
?>

<script language="javascript">
//<![CDATA[
var page						=	1;

function getContentList()
{
	$.ajax({
		url						:	"/bbs/galleryList.php",
		type					:	"POST",
		data					:
		{
			bID						:	"47",
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
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb_main.php';
	?>

	<div id="" class="board-frame gallery studentW">
		<div class="thumbnail">
			<div class="thumb-title">STUDENT PORTFOLIO</div>
		</div>
		<div class="pg-tit">
			<h2>수강생 포트폴리오</h2>
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
</div>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer-main.php';
?>

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/eventPopup.php';
?>

</body>
</html>

<script language="javascript">
//<![CDATA[
getContentList();
//]]>
</script>

<!--	DB Close Start	-->
<?php
include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>
<!--	DB Close End	-->