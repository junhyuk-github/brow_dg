<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/_header.php';

$idx							=	allTags($_REQUEST['idx']);
$pno							=	allTags($_REQUEST['pno']);

//	게시판 환경정보	=======================================================================================
include $_SERVER['DOCUMENT_ROOT'] . '/common/inc/bbsConfig.php';
//	게시판 환경정보	=======================================================================================

//	게시글 수정 정보 가져오기	================================================
if ( $idx ) {
	$data						=	$common['BoardManager']->getBBSInfo($bID, $idx, 'Y');
	$data						=	$data->getData();
	$rs							=	$data[0];

	if ( $rs ) {
		$corpCode				=	$rs['corpCode'];
		$boardRef				=	$rs['boardRef'];
		$boardStep				=	$rs['boardStep'];
		$boardLevel				=	$rs['boardLevel'];
		$subject				=	stripslashes($rs['subject']);
		$writerName				=	$rs['writerName'];
		$writerIdx				=	$rs['writerIdx'];
		$writerPWD				=	$rs['writerPWD'];
		$writerIP				=	$rs['writerIP'];
		$hitCount				=	$rs['hitCount'];
		$contents				=	$rs['contents'];
		$startDate				=	$rs['startDate'];
		$endDate				=	$rs['endDate'];
		$highYN					=	$rs['highYN'];
		$isDisplay				=	$rs['isDisplay'];
		$applyBrand				=	$rs['applyBrand'];
		$applyCorp				=	$rs['applyCorp'];
		$branchName				=	$rs['branchName'];
		$brandName				=	$rs['brandName'];
		$regDate				=	$rs['regDate'];
		$regDate				=	date('Y.m.d', strtotime($regDate));

		$prevIdx				=	$rs['prevIdx'];
		$prevSub				=	$rs['prevSub'];
		$nextIdx				=	$rs['nextIdx'];
		$nextSub				=	$rs['nextSub'];

		preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $contents, $matches1);
		foreach ($matches1[1] as $k => $val1)
		{
			if ( strpos($val1, 'http://') === false ) {
				$fImgSrc1		=	$common['intranetURL'] . $val1;
				$contents		=	str_replace($val1, $fImgSrc1, $contents);
			}
		}

		$data					=	$common['CorpManager']->getCorpModify($applyCorp);
		$data					=	$data->getData();
		$rs1					=	$data[0];

		if ( $rs1 ) {
			$mCorpHost			=	'http://' . $rs1['corpHost'];
			$mCorpName			=	$rs1['corpName'];
		}

		//	파일 리스트
		$fileList				=	$common['BoardManager']->getBBSFileList($idx, '1');
		$fileList				=	$fileList->getData();

		//	이미지 리스트
		$imgList				=	$common['BoardManager']->getBBSFileList($idx, '2');
		$imgList				=	$imgList->getData();
	}
}
?>

			<div class="maxframe">
				<div class="view-tit">
					<h3><?=$subject?></h3>
					<span><?=$regDate?></span>
				</div>
				<div class="view-body">
					<?=$contents?>

					<? if( $bID !== '43' && $bID !== '37' ) {?> <!-- 20211025 HJ: 수강생 작품사진, 갤러리는 첨부파일 미노출 -->
						<!-- 첨부파일이 있다면 노출 -->
						<? if ( $fileList || $imgList ) { ?>
						<div class="download-box">
							<?
							if ( $imgList ) {
								for ($i=0; $i < sizeof($imgList); $i++)
								{
									$fCorpCode					=	$imgList[$i]['corpCode'];
									$fIdx						=	$imgList[$i]['idx'];
									$fName						=	$imgList[$i]['upFileName'];
									$fFile						=	$imgList[$i]['fileName'];
									$fPath						=	$imgList[$i]['filePath'];

									$saveFile					=	$common['defaultPath'] . '/' . $fFile;
									$is_file_exist				=	file_exists($saveFile);
									if ( !$is_file_exist ) {
										$downFile				=	'http://intranet.devbbg.com/uploadFiles/' . $fCorpCode . '/boardFile/' . $bID . '/' . $fFile;
										$copyFile				=	file_get_contents($downFile);
										$rsFile					=	fopen($saveFile, 'w');
										fwrite($rsFile, $copyFile);
										fclose($rsFile);
									}
							?>
							<a href="/common/commonPage/fileDown.php?downFile=<?=$saveFile?>&fileName=<?=$fName?>" target="procFrame"><span class="filename"><?=$fName?></span></a>
							<?
								}
							}
							?>

							<?
							if ( $fileList ) {
								for ($i=0; $i < sizeof($fileList); $i++)
								{
									$fCorpCode					=	$fileList[$i]['corpCode'];
									$fIdx						=	$fileList[$i]['idx'];
									$fName						=	$fileList[$i]['upFileName'];
									$fFile						=	$fileList[$i]['fileName'];
									$fPath						=	$fileList[$i]['filePath'];

									$saveFile					=	$common['defaultPath'] . '/' . $fFile;
									$is_file_exist				=	file_exists($saveFile);
									if ( !$is_file_exist ) {
										$downFile				=	'http://intranet.devbbg.com/uploadFiles/' . $fCorpCode . '/boardFile/' . $bID . '/' . $fFile;
										$copyFile				=	file_get_contents($downFile);
										$rsFile					=	fopen($saveFile, 'w');
										fwrite($rsFile, $copyFile);
										fclose($rsFile);
									}
							?>
							<a href="/common/commonPage/fileDown.php?downFile=<?=$saveFile?>&fileName=<?=$fName?>"><span class="filename"><?=$fName?></span></a>
							<?
								}
							}
							?>
						</div>
						<? } ?>
						<!-- // 첨부파일이 있다면 노출 -->
					<? } ?>
				</div>

				<div class="pg-his">
					<? if ( $prevIdx > 0 ) { ?>
					<div class="pg-item">
						<span>이전글</span>
						<p class="eillip1">
							<!-- 1.이전글이 없는경우 
							<span>이전글이 없습니다.</span>
							-->
							<!-- 2. 있는 경우 -->
							<a href="<?=$bbsViewURL?>?idx=<?=$prevIdx?>&pno=<?=$pno?>#VP" class="eillip1"><?=$prevSub?></a>
						</p>
					</div>
					<? } ?>
					<? if ( $nextIdx > 0 ) { ?>
					<div class="pg-item">
						<span>다음글</span>
						<p class="eillip1">
							<!-- 1.다음글이 없는경우 
							<span>다음글이 없습니다.</span>
							-->
							<!-- 2. 있는 경우 -->
							<a href="<?=$bbsViewURL?>?idx=<?=$nextIdx?>&pno=<?=$pno?>#VP" class="eillip1"><?=$nextSub?></a>
						</p>
					</div>
					<? } ?>
				</div>
			</div>

			<div class="more-btn-wrap">
				<button type="button" class="btn-more" onclick="window.location='<?=$bbsListURL?>?pno=<?=$pno?>'">목록</button>
			</div>