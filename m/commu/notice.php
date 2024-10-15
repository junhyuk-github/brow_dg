<link rel="stylesheet" href="/common/css/page-m.css">
<?php
$page_title = '공지사항 | 톡스앤필 브로우';
$bID        = 52;
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top-m.php';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';
//	게시판 환경정보	=======================================================================================
include $_SERVER['DOCUMENT_ROOT'] . '/common/inc/bbsConfig.php';
//	게시판 환경정보	=======================================================================================

$page							=	array();
$page['recordPerPage']			=	20;																					//	한 페이지당 최대 게시글 개수.
$page['pnoPerPage']				=	10;																					//	한 페이지당 최대 페이지번호 개수.
$page['pno']					=	allTags($_REQUEST['pno']) == '' ? 1 : (int)allTags($_REQUEST['pno']);						//	페이지번호.
$temp							=	($page['pno'] * $page['recordPerPage']) - $page['recordPerPage'];
$msg							=	$common['BoardManager']->getBBSList($temp, $page['recordPerPage'], $bID, $orderBy);
$bbsList						=	$msg->getData();
$page['totalCount']				=	$msg->getMessage();										//	해당 게시판 총 게시글 개수.
$msg							=	$common['BoardManager']->getHighBBSList($temp, $page['recordPerPage'], $bID, $orderBy);
$bbsListTop						=	$msg->getData();
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
?>

</head>

<body class="pg-detail no-footer-top">
    <div id="wrap" class="main pg_board pg_detail">
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb-m.php';
        ?>
        <div id="" class="board-frame notice">
            <div class="thumbnail">
                <div class="thumb-title">
                    <img src="/common/img/title/notice.png" alt="">
                </div>
            </div>
            <div class="pg-tit">
                <h2>공지사항</h2>
            </div>
            <div class="minframe">
                <div class="board-wrap">
                    <ul class="list-wrap">
                        <?php
                        if ($bbsListTop) {
                            foreach ($bbsListTop as $val) {
                                $idx					=	$val['idx'];
                                $subject				=	stripslashes($val['subject']);
                                $regDate				=	$val['regDate'];
                                $regDate				=	date('Y.m.d', strtotime($regDate));
                                ?>
                                <li class="list pin">
                                    <a href="/m/commu/noticeView.php?pno=<?=$page['pno']?>&idx=<?=$idx?>"">
                                        <span class="pin-txt">TOP</span>
                                        <span class="tit_"><?=$subject?></span>
                                        <span class="date_"><?=$regDate?></span>
                                    </a>
                                </li>
                                <?php
                            }
                        }
                        ?>
                        <?php
                        if ($bbsList) {
                            foreach ($bbsList as $val) {
                                $idx					=	$val['idx'];
                                $subject				=	stripslashes($val['subject']);
                                $regDate				=	$val['regDate'];
                                $regDate				=	date('Y.m.d', strtotime($regDate));
                                ?>
                                <li class="list">
                                    <a href="/m/commu/noticeView.php?pno=<?=$page['pno']?>&idx=<?=$idx?>"">
                                        <span class="tit_"><?=$subject?></span>
                                        <span class="date_"><?=$regDate?></span>
                                    </a>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>

            <ul class="pagi-wrap">
                <?php if ($bbsList) { ?>
                    <?php if ($page['ppno'] != 1) { ?>
                        <li>
                            <a href="/commu/notice.php?pno=1">
                                <img src="/common/img/member/i-prev-first.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="/commu/notice.php?pno=<?=$page['spno']-1?>">
                                <img src="/common/img/member/i-prev.png" alt="">
                            </a>
                        </li>
                    <?php } ?>

                    <?php
                    for ($i = $page['spno']; $i <= $page['epno']; $i++) {
                        $isActive = '';
                        if ($i == $page['pno']) {
                            $isActive = ' active ';
                        }
                        ?>
                        <li class="pg-num <?=$isActive?>"><a href="/commu/notice.php?pno=<?=$i?>"><?=$i?></a></li>
                        <?php
                    }
                    ?>
                    <?php if ($page['ppno'] != $page['maxPpno']) { ?>
                        <li>
                            <a href="/commu/notice.php?pno=<?=$page['epno']+1?>">
                                <img src="/common/img/member/i-next.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="/commu/notice.php?pno=<?=$page['pnoCount']?>">
                                <img src="/common/img/member/i-next-end.png" alt="">
                            </a>
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>

        </div>
    </div>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/floating-m.php';
    ?>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer-m.php';
    ?>

<script>
	//pagination
	$(document).on('click', '.pg-num', function(e){
      $(this).addClass('active');
      $(this).siblings('.pg-num').removeClass('active');
    });
</script>

</body>
</html>

<script language="javascript">

</script>


<!--	DB Close Start	-->
<?php
include $common['wwwPath'] . '/common/commonPage/_footer.php';
?>
<!--	DB Close End	-->