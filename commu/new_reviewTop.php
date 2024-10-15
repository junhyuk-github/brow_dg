<?php


//https://www.toxnfillacademy.com/commu/review.php 톡스앤필뷰티아카데미 수강생 실제후기 페이지에서 소스코드 가지고 왔습니다.

$bID							=	48;
$order							=	allTags($_REQUEST['order']); if ( $order == '' ) $order = '1';

//	게시판 리스트
$page							=	array();
$page['recordPerPage']			=	10;																					//	한 페이지당 최대 게시글 개수.
$page['pnoPerPage']				=	10;																					//	한 페이지당 최대 페이지번호 개수.
$page['pno']					=	allTags($_REQUEST['pno']) == '' ? 1 : (int)allTags($_REQUEST['pno']);				//	페이지번호.
$temp							=	($page['pno'] * $page['recordPerPage']) - $page['recordPerPage'];
$msg							=	$common['BoardManager']->getReviewList($temp, $page['recordPerPage'], $bID, $order);
/*echo 'temp : '.$temp;
echo 'bID : '.$bID;
echo 'order : '.$order;*/
$bbsList						=	$msg->getData();

$page['totalCount']				=	$msg->getMessage();																	//	해당 게시판 총 게시글 개수.
$page['pnoCount']				=	ceil($page['totalCount'] / $page['recordPerPage']);									//	페이지넘버의 총 개수.
$temp							=	0;
$page['ppno']					=	1;
while(1)
{
    $temp						+=	$page['pnoPerPage'];
    if ( $temp >= $page['pno'] ) break;
    $page['ppno']++;
}
$page['maxPpno']				=	ceil($page['pnoCount'] / $page['pnoPerPage']);
$page['spno']					=	($page['ppno'] - 1) * $page['pnoPerPage'] + 1;
$page['epno']					=	$page['ppno'] * $page['pnoPerPage'];
$page['sno']					=	$page['totalCount'] - (($page['pno'] - 1) * $page['recordPerPage']);

if ( $page['epno'] > $page['pnoCount'] ) $page['epno'] = $page['pnoCount'];
//	게시판 리스트

$qry							=	'&order=' . $order;
?>



</head>
<body>
<div class="cont_inner contTop">
    <div class="cont">
                        <?php
                        if ( $bbsList ) {

                            foreach ($bbsList as $key => $val)
                            {
                                $idx					=	$val['idx'];
                                $contents				=	$val['contents'];
                                $writerIdx				=	$val['writerIdx'];
                                $writerName				=	$val['writerName'];
                                $writerGroup			=	$val['userGroup'];
                                $gubun					=	$val['gubun'];
                                $regDate				=	$val['regDate'];
                                $regDate				=	DATE('Y-m-d', strtotime($regDate)); //hj 2021-02-24: 아카데미 요청으로 수정(Y-m-d H:i)

                                $iCorpCode				=	$val['iCorpCode'];
                                $iFile					=	$val['fileName'];

                                $fullUpImg				=	$common['uploadVirDir'] . '/' . $iCorpCode . '/boardFile/' . $bID . '/' . $iFile;

                                if ( $gubun == '1' ) {
                                    $gubunTxt			=	'[커리큘럼] 아티스트 과정';
                                } else if ( $gubun == '2' ) {
                                    $gubunTxt			=	'[커리큘럼] 마스터 과정';
                                } else if ( $gubun == '3' ) {
                                    $gubunTxt			=	'[커리큘럼] 스카터 SMP 과정';
                                } else if ( $gubun == '4' ) {
                                    $gubunTxt			=	'[커리큘럼] 메디컬 스킨케어 과정';
                                }
                                ?>


                                    <div class="item">
                                        <form id="frmReview" name="frmReview" method="post" enctype="multipart/form-data" style="margin-top:0;margin-bottom:0" onsubmit="return false;">
                                        <input type="hidden" id="name"				    name="name"				value="<?=$writerName?>">
                                        <input type="hidden" id="contens_id" value="<?=$idx?>">
                                        <h3 class="__name"><span class="__rank">수강생</span> <?=$writerName?></h3>
                                        <p class="__interview ellip4">

                                           <?=$contents?>
                                        </p>
                                        <a class="i-more"><img src="/common/img/main/icon/i-more.png" alt="view more"></a>
                                    </div>



                            <? }?>

                            </div>
                      <?  }    ?>
</div>
<!--<div class="pop_review">-->
<!--    <div class="popUp_wrap">-->
<!--        <div class="__top">-->
<!--            <span class="__rank">수강생</span>-->
<!--            <h3 class="__name">하지연</h3>-->
<!--            <div class="btn-close"></div>-->
<!--        </div>-->
<!--        <p class="__interview">-->
<!--            풀데이터222-->
<!--        </p>-->
<!--    </div>-->
<!--</div>-->
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/commu/pop_review.php';
?>
</body>


<script src="/common/js/main-scroll-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.Marquee/1.6.0/jquery.marquee.min.js"></script>
<script type="text/javascript">
    //수강생후기 롤링
    $(document).ready(function(){
        $('.contTop').marquee({
            speed: 60,
            gap: 0,
            startVisible: true,
            delayBeforeStart: 0, // 시작 delay값
            direction: 'left',
            duplicated: true,
            pauseOnHover: true
        });
        $('.contBottom').marquee({
            speed: 60,
            gap: 0,
            startVisible: true,
            delayBeforeStart: 0,
            direction: 'right',
            duplicated: true,
            pauseOnHover: true
        });
    });

    //수강생후기 팝업생성
    $(document).on('click', '.sec-review .item', function(e){

        e.preventDefault();
        $('body').addClass('scrollLock');
        $('.pop_review').addClass('popActive');
        var form					=	document.querySelector( "#frmReview" );
        var postDate				=	new FormData(form);
    
        $.ajax({
            url				:	"./commu/pop_review.php",
            type			:	"POST",
            data			:	postDate,
            dataType		:	"html",
            //contentType	:	"application/x-www-form-urlencoded; charset=UTF-8",
            async			:	true,
            cache			:	false,
            contentType		:	false,
            processData		:	false,
            success			:	function (data)
            {

            }
        });
    });
    $(document).on('click', '.popUp_wrap .btn-close', function(e){
        e.preventDefault();
        $('body').removeClass('scrollLock');
        $('.pop_review').removeClass('popActive');
    });

</script>
</body>
</html>

<!--	DB Close Start	-->

<!--	DB Close End	-->