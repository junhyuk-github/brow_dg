<div id="float" class="float_renew">
  <!-- 240621 임시 미노출 -->
    <!-- youtube btn -->
    <!-- <a href="https://www.youtube.com/@toxnfillbrow" target="_blank" class="shortcuts-btn-youtube">
        <div class="youtube-inner">
            <figure class="cont-img">
                <img src="/common/img/icon/sns_youtube.png" alt="유튜브 상담">
            </figure>
        </div>
    </a> -->
	<!-- kakao chatbot btn -->
	<!-- <a href="javascript:void kakaoChatStart()" class="chatbot-btn-kakao"> -->
  <a href="https://open.kakao.com/o/sAkEfwzg" class="chatbot-btn-kakao">
		<div class="kakao-inner">
			<figure class="cont-img">
				<img src="/common/img/icon/sns_kakao.png" alt="카톡 상담">
			</figure>
		</div>
	</a>
  <!-- 240621 임시 미노출 -->
	<button type="button" class="btn-goTop">
		<span class="sr-only">위로</span>
		<span class="icon">
			<img src="/common/img/m/i-gotop.png" alt="">
		</span>
	</button>
  <!-- 240621 임시 미노출 -->
	<div class="tow-btn row">
		<a href="tel:1555-0411" class="col-4" style="width: 50%;">전화걸기</a>
		<!-- <a href="javascript:void addChannel()" class="col-4">카카오톡 상담</a> -->
    <a href="https://open.kakao.com/o/sAkEfwzg" class="col-4" style="width: 50%;">카카오톡 상담</a>
		<!-- <a href="/m/contact/index.php" onfocus="this.blur()" class="col-4">온라인상담</a> -->
	</div>
  <!-- 240621 임시 미노출 -->
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