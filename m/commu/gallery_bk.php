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
		url						:	"/m/bbs/galleryList.php",
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
		<div id="titBanner" style="background-image:url('/common/img/m/commu/banner3.jpg');">
			<div class="text-vertical-center">
				<div class="vertical-middle">
					<div class="minframe">
						<h2>갤러리</h2>
						<span>GALLERY</span>
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