<style>
    .chatbot-btn-youtube {display: flex; align-items: center; position: fixed; bottom: 160px; right: 10px; border-radius: 50%; z-index: 100; width:45px; height:45px; padding:0 8px; background-color: #fff; box-shadow: 0 1px 3px 0 rgba(60,64,67,0.302), 0 4px 8px 3px rgba(60,64,67,0.149);}
    .chatbot-btn-youtube .cont-img {display: flex; align-items: center;}
    .chatbot-btn-youtube .cont-img > img {width:100%;}
</style>
<div id="float" class="float_renew">
    <!-- youtube btn -->
    <a href="https://www.youtube.com/@toxnfillbrow" target="_blank" class="chatbot-btn-youtube">
        <div class="youtube-inner">
            <figure class="cont-img">
                <img src="/common/img/icon/sns_youtube.png" alt="유튜브 상담">
            </figure>
        </div>
    </a>
    <!-- kakao chatbot btn -->
    <a href="javascript:void kakaoChatStart()" class="chatbot-btn-kakao">
        <div class="kakao-inner">
            <figure class="cont-img">
                <img src="/common/img/icon/sns_kakao.png" alt="카톡 상담">
            </figure>
        </div>
    </a>
    <button type="button" class="btn-goTop">
        <span class="sr-only">위로</span>
        <span class="icon">
			<img src="/common/img/m/i-gotop.png" alt="">
		</span>
    </button>
    <div class="tow-btn row">
        <a href="tel:02-554-4842" class="col-4">전화걸기</a>
        <a href="javascript:void addChannel()" class="col-4">카카오톡 상담</a>
        <a href="/m/contact/index.php" onfocus="this.blur()" class="col-4">온라인상담</a>
    </div>
</div>

<script type='text/javascript'>
  //<![CDATA[

  function addChannel() {
    Kakao.Channel.addChannel({
      channelPublicId: '_QgIAxj'
    });
  }
  //]]>
</script>

<!-- kakao chatbot script -->
<script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
<script type='text/javascript'>
  Kakao.init('34aee5dfcf1626055d69ae310274f30d'); // JavaScript 키
  function kakaoChatStart() {
    Kakao.Channel.chat({
      channelPublicId: '_QgIAxj' // 채널 홈  id
    });
  }
</script>
<!-- //kakao chatbot script -->