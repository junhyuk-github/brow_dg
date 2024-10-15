<?php
$bID							=	48;
$order							=	allTags($_REQUEST['order']); if ( $order == '' ) $order = '1';

//	게시판 리스트
$msg							=	$common['BoardManager']->getReviewList(0, 20, $bID, $order);
$bbsList						=	$msg->getData();

$bbsListCount					= 	count($bbsList);
?>

<?php
	if ( $bbsList && $bbsListCount >= 5 ) {
?>
<div class=" cont_inner contTop">
	<div class="cont">
<?php
	// 리뷰 10개 초과 일 경우 contTop 10개, 나머지 리스트는 contBottom에 출력하기 위한 조건
	$bbsListTopCnt		=	$bbsListCount <= 10 ? $bbsListCount : 10;

	for ( $i = 0; $i < $bbsListTopCnt; $i++ ) {
		$idx					=	$bbsList[$i]['idx'];
		$contents				=	$bbsList[$i]['contents'];
		$writerIdx				=	$bbsList[$i]['writerIdx'];
		$writerName				=	$bbsList[$i]['writerName'];
		$writerGroup			=	$bbsList[$i]['userGroup'];

		switch ($writerGroup) {
			case 1:
				$writerGroupTxt = '비회원';
				break;
			case 2:
				$writerGroupTxt = '일반회원';
				break;
			case 3:
				$writerGroupTxt = '정회원';
				break;
			case 4:
				$writerGroupTxt = '수강생';
				break;
			default:
				$writerGroupTxt = '수강생';
				break;
		}
?>
		<div class="card">
			<div class="info-wrap">
				<div class="info">
					<span class="name"><?=$writerName?></span>
				</div>
				<button class="icon">
					<img src="/common/img/m/main/i-add.png" alt=""/>
				</button>
			</div>
			<div class="desc ellip4">
				<?=$contents?>
			</div>
		</div>
	<?php
		if ( $i == $bbsListTopCnt - 1) {
	?>
	</div>
</div>
<?php
		}
	}
	// 리뷰 10개 이후 데이터 contBottom으로 출력
	if ( ($bbsListCount - 10) >= 5 ) {
?>
<div class=" cont_inner contBottom">
	<div class=" cont">
<?php
		for ( $i = 10; $i < $bbsListCount; $i++ ) {
			$idx					=	$bbsList[$i]['idx'];
			$contents				=	$bbsList[$i]['contents'];
			$writerIdx				=	$bbsList[$i]['writerIdx'];
			$writerName				=	$bbsList[$i]['writerName'];
			$writerGroup			=	$bbsList[$i]['userGroup'];

			switch ($writerGroup) {
				case 1:
					$writerGroupTxt = '비회원';
					break;
				case 2:
					$writerGroupTxt = '일반회원';
					break;
				case 3:
					$writerGroupTxt = '정회원';
					break;
				case 4:
					$writerGroupTxt = '수강생';
					break;
				default:
					$writerGroupTxt = '수강생';
					break;
			}
?>
		<div class="card">
			<div class="info-wrap">
				<div class="info">
					<span class="name"><?=$writerName?></span>
				</div>
				<button class="icon">
					<img src="/common/img/m/main/i-add.png" alt=""/>
				</button>
			</div>
			<div class="desc ellip4">
				<?=$contents?>
			</div>
		</div>
		<?php
			if ( $i == $bbsListCount - 1) {
		?>
	</div>
</div>
<?php				
			}
		}
	}
}
?>

<script type="text/javascript">
	function replaceText(text) {
		return text.replace(/\n/g, '<br>')
	}

	// 수강생후기 롤링
  	$(document).ready(function() {
		$('.contTop').marquee({
            speed: 30,
            gap: 0,
			startVisible: true,
            delayBeforeStart: 0, // 시작 delay값
            direction: 'left',
            duplicated: true,
            pauseOnHover: true
        });
		$('.contBottom').marquee({
            speed: 30,
            gap: 0,
			startVisible: true,
            delayBeforeStart: 0,
            direction: 'right',
            duplicated: true,
            pauseOnHover: true
        });
	});

	// 수강생후기 팝업생성
	$(document).on('click', '.review-sec .card', function(e) {
		e.preventDefault();
		var writerName = $(this).find('.name').text();
		var contents = $(this).find('.desc').html();
		contents = replaceText(contents);

		$.ajax({
			url						:	"./commu/main_reviewPop.php",
			type					:	"POST",
			data					:
			{
				writerName : writerName,
				contents : contents
			},
			dataType				:	"html",
			contentType				:	"application/x-www-form-urlencoded; charset=UTF-8", 
			async					:	true,
			success					:	function (data) {
				$('.modal').append(data);
				$('body').addClass('scrollLock'); 
				$('.review-sec .modal').addClass('on');
			}
		});
	});

	$(document).on('click', '.review-sec .modal-close', function(e) {
		e.preventDefault();
		$('body').removeClass('scrollLock'); 
		$('.review-sec .modal').removeClass('on');
	});

</script>