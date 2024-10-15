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
$msg							=	$common['BoardManager']->getReviewList(11, $page['recordPerPage'], $bID, $order);
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
<div class="cont_inner contBottom">
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
                <h3 class="__name"><span class="__rank">수강생</span> <?=$writerName?></h3>
                <p class="__interview ellip4">
                    <?=$contents?>
                </p>
                <a class="i-more"><img src="/common/img/main/icon/i-more.png" alt="view more"></a>
            </div>

            <?
        }?>
    </div>
    <?  }    ?>


</div>
</body>

<script>
    /*
     * hj: 업로드한 이미지 썸네일로 확인
     */
    function setThumbnail(event) {
        var reader = new FileReader();
        $("#vwImgContainer").show();
        reader.onload = function(event) {
            var img = document.createElement("img");
            img.setAttribute("src", event.target.result);
            document.querySelector("#vwImgThumb").appendChild(img);

        };
        reader.readAsDataURL(event.target.files[0]);
    }

    /*
     * HJ: 이미지 선택 초기화
     */
    function initThumb(){
        $("#vwImgThumb img").attr('src', '');
        $("#vwImgContainer").hide();
    }

    /*
     * hj : 댓글쓰기 버튼 토글
     */
    /*
    $('.btn-addRely').on('click', function(){
        var target = $(this).attr('id');
        $('div[data-for="' + target + '"').toggle();
    });
    */



    function openComment(divID)
    {
        $( "#" + divID ).toggle();
    }

    function actionComment(frm, frmName, divID, idx, isAction)
    {
        var bIdx					=	frm.bIdx.value;
        frm.idx.value			=	idx;
        frm.isAction.value		=	isAction;

        var postDate				=	$( "#" + frmName ).serialize();
        if ( isAction == "D" ) {
            if (confirm("댓글을 삭제 하시겠습니까?")) {
                $.ajax({
                    url				:	"./reviewCommentProc.php",
                    type			:	"POST",
                    data			:	postDate,
                    dataType		:	"html",
                    contentType		:	"application/x-www-form-urlencoded; charset=UTF-8",
                    async			:	true,
                    success			:	function (data)
                    {
                        //console.log(data);
                        rsDate		=	data.replace( /(\s*)/g, "" );
                        if (rsDate == "Y") {
                            getComment(divID, '<?=$bID?>', bIdx);
                        } else {
                            alert("삭제시 에러가 발생하였습니다. 다시 시도해 주세요.");
                        }

                        focus();
                    }
                });
            }
        } else {
            if ( frm.comment.value == "" ) {
                alert("댓글을 입력하세요.");
                frm.comment.focus();
                return false;
            }

            $.ajax({
                url					:	"./reviewCommentProc.php",
                type				:	"POST",
                data				:	postDate,
                dataType			:	"html",
                contentType			:	"application/x-www-form-urlencoded; charset=UTF-8",
                async				:	true,
                success				:	function (data)
                {
                    //console.log(data);
                    rsDate			=	data.replace( /(\s*)/g, "" );
                    if (rsDate == "Y") {
                        getComment(divID, '<?=$bID?>', bIdx)
                    } else {
                        alert("등록시 에러가 발생하였습니다. 다시 시도해 주세요.");
                    }

                    focus();
                }
            });
        }
    }
</script>

</body>
</html>

<!--	DB Close Start	-->

<!--	DB Close End	-->