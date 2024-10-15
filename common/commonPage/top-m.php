<!doctype html>
<html lang="ko">
<head>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_deviceChk.php';

if(isset($page_title)){
	$page_title		=	$page_title;
} else {
	$page_title		=	'톡스앤필 브로우';
}
$pLink						=	'https://www.toxnfillbrow.com/' . $_SERVER['REQUEST_URI'];
?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="target-densitydpi=device-dpi,width=device-width, initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">
<title><?=$page_title?></title>
<meta name="apple-mobile-web-app-title" content="톡스앤필 브로우">
<meta name="description" content="톡스앤필 브로우 행복한 배움을 꿈꾸다">
<meta property="og:title" content="<?=$page_title?>">
<meta property="og:url" content="<?=$pLink?>">
<!-- <meta property="og:image" content="/common/img/m/main.jpg"> -->
<meta property="og:image" content="/common/img/main.png">
<meta property="og:description" content="톡스앤필 브로우 행복한 배움을 꿈꾸다">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="<?=$page_title?>">
<meta name="twitter:url" content="<?=$pLink?>">
<!-- <meta name="twitter:image" content="/common/img/m/main.jpg"> -->
<meta name="twitter:image" content="/common/img/main.png">
<meta name="twitter:description" content="톡스앤필 브로우 행복한 배움을 꿈꾸다">
<!-- 파비콘 넣을 곳-->
<script src="/common/js/vendor/webfont.js"></script>
<script>
WebFont.load({
	google: {
		families: ['Nanum Myeongjo:400,700']
	}
});
</script>
<link rel="stylesheet" href="/common/css/vendor/swiper.min.css">
<link rel="stylesheet" href="/common/css/common-m.css?v=2402081633">
<link rel="stylesheet" href="/common/css/common.layout-m.css?v=2402081633">
<link rel="stylesheet" href="/common/css/main-m.css?v=2402081633">
<script src="/common/js/vendor/prefixfree.min.js"></script>
<script src="/common/js/vendor/jquery-1.8.2.min.js"></script>
<script src="/common/js/vendor/TweenMax.min.js"></script>
<script src="/common/js/vendor/swiper.min.js"></script>
<script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
<!-- 어도비 폰트 -->
<script>
  (function(d) {
    var config = {
      kitId: 'ofd3irt',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>
<!-- 어도비 폰트 -->
<script>
//<![CDATA[
Kakao.init('f255d298e226a16c243bb0c4025f472d');
//]]>
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-237570417-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-237570417-2');
</script>


