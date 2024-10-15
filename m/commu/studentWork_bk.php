<?php
$page_title = '수강생 포트폴리오 | 톡스앤필 브로우';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top-m.php';

$bID							=	'47';
$bbsListURL						=	'/m/commu/studentWork.php';
$bbsViewURL						=	'/m/commu/studentWorkView.php';
?>

<script language="javascript">
//<![CDATA[
var page						=	1;

function getContentList()
{
	$.ajax({
		url						:	"/m/bbs/galleryList.php",
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

<body>

<div id="wrap" class="">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb-m.php';
	?>

	<div id="container">
		<?php
		$category				=	'commu';
		include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/subTab-m.php';
		?>
		<div id="titBanner" style="background-image:url('/common/img/m/commu/banner6.jpg');">
			<div class="text-vertical-center">
				<div class="vertical-middle">
					<div class="minframe">
						<h2>수강생 포트폴리오</h2>
						<span>STUDENT PORTFOLIO</span>
					</div>
				</div>
			</div>
		</div>

		<div class="board-list-wrap">
			<div class="maxframe">
				<ul class="thumb-list" id="contentDiv"></ul>
			</div>
			<div class="more-btn-wrap">
				<button type="button" class="btn-more" onClick="getContentList();">MORE</button>
			</div>
		</div>

		<?php
		include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/contactUs-m.php';
		?>
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