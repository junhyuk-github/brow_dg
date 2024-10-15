<?php
$http_host						=	$_SERVER['HTTP_HOST'];
$request_uri					=	$_SERVER['REQUEST_URI'];
$url							=	'https://' . $http_host . $request_uri;
?>

<div class="share-box">
	<ul class="minframe">
		<li><a class="r-share"></a></li>
		<!-- <li><a href="javascript:alert('서비스 준비 중입니다.');" class="r-nate"></a></li> -->
		<li><a href="javascript:cosmosfarm_share('kakaostory', '<?=$url?>', '<?=$page_title?>');" class="r-story"></a></li>
		<li><a href="javascript:cosmosfarm_share('facebook', '<?=$url?>', '<?=$page_title?>');" class="r-facebook"></a></li>
		<li><a id="kakaoShare-btn" class="r-kakao"></a></li>
		<li><a href="javascript:cosmosfarm_share('line', '<?=$url?>', '<?=$page_title?>');" class="r-line"></a></li>
	</ul>
</div>

<script>
//<![CDATA[
Kakao.init('bceaba2649c6b9c6478a2c5a5a5fa077');
var kTitle						=	"<?=$page_title?>";
var kUrl						=	"<?=$url?>";
Kakao.Link.createDefaultButton({
	container					:	"#kakaoShare-btn",
	objectType					:	"feed",
	content						:
	{
		title						:	kTitle,
		description					:	"톡스앤필 브로우 행복한 배움을 꿈꾸다",
		imageUrl					:	"https://toxnfillbrow.com/common/img/main.jpg",
		link						:
		{
			mobileWebUrl				:	kUrl,
			webUrl						:	kUrl
		}
	},
	buttons						:
	[
		{
			title					:	"보러가기",
			link					:
			{
				mobileWebUrl			:	kUrl,
				webUrl					:	kUrl
			}
		},
	]
});
 //]]>
</script>