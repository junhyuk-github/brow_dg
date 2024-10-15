<?php
$page_title = '톡스앤필 브로우 | 커리큘럼';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top.php';
?>
</head>
<body>
<div id="wrap" class="">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb.php';
	?>
		
	<div id="container">
		<div id="titBanner" style="background-image:url('/common/img/curriculum/banner4.jpg');">
			<div class="minframe text-vertical-center">
				<div class="vertical-middle">
					<h2>메디컬스킨케어 과정</h2>
					<span>MEDICAL SKINCARE CURRICULUM</span>
				</div>
			</div>
		</div>
		<div class="class-content">
			<div class="class-tab">
				<div id="tab-panel1" class="tab-panel" role="tabpanel" aria-labelledby="tab1">
					<section class="gc-sec1">
						<div class="minframe">
							<div class="inner">
								<div class="gc-tit">
									<h3>메디컬스킨케어 과정</h2>	
									<p>
										피부창업을 위한 기기관리+스킨플래닝+MTS <br/>
										실전 마스터 교육 과정으로, <br/>
										최신 트렌드를 반영한 인기 종목을 피부관리 샵에서 <br/>
										적용할 수 있도록 실전 테크닉을 배우는 교육 프로그램
									</p>
								</div>
								<div class="gc-cont">
									<table>
										<colgroup>
											<col width="30%">
											<col width="70%">
										</colgroup>
										<tbody>
											<tr>
												<th>교육 기간</th>
												<td>
													<em>- 평균 1개월 이내</em>
													<em>- 총 12시간 교육</em>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</section>
					<section class="gc-sec3">
						<div class="minframe">
							<div class="gc-tit">
								<h3>교육 특징</h3>
							</div>
							<p class="gc-cont">
								피부관리 샵 취업 및 창업을 준비하는 에스테티션 <br/>
								OR 현장에서 활동 중이거나 샵을 운영중인 에스테티션 대상 <br/>
								<b>최신 트렌드 반영한 인기 종목의 실전 테크닉 향상을 목표로 한 심화 과정</b>
							</p>
						</div>
					</section>
					<section class="gc-sec3">
						<div class="minframe">
							<div class="gc-tit">
								<h3>교육 목표</h3>
							</div>
							<p class="gc-cont">
								<b>에스테틱 샵에서 활용하는 현장 중심의 테크닉 습득 및 피부 유형별 판독</b><br/>
								AMTS & 피부기기 적용 & 스킨플래닝 인기 종목 마스터
							</p>
						</div>
					</section>
					<section class="gc-sec2">
						<div class="minframe">
							<div class="gc-tit">
								<h3>커리큘럼 안내</h3>
							</div>
							<div class="gc-cont">
								<div class="info-box" style="height:725px;">
									<img src="/common/img/curriculum/4-bg.jpg" alt="">
									<table>
										<tbody>
											<tr>
												<td>
													<span>1</span>
													<p class="content">
														현장실습 테크닉 및 <br/>
														피부유형별 판독
													</p>
													<p class="content-inner">
														고객별 상담, 예약방법 <br>
														제품 종류, 현장테크닉 <br>
														피부 유형별 특징 이해, <br>
														피부 판독하기
													</p>
												</td>
												<td class="white">
													<span>2</span>
													<p class="content">
														AMTS <br/>
														적용하기
													</p>
													<p class="content-inner">
														AMTS 이론 및 적용 <br>
														피부유형 주의사항
													</p>	
												</td>
												<td>
													<span>3</span>
													<p class="content">
														피부기기 <br/>
														적용하기 1
													</p>
													<p class="content-inner">
														AMTS 전 사용기기 적용 <br>
														AMTS 후 사용기기 적용
													</p>
												</td>
											</tr>
											<tr>
												<td class="white">
													<span>4</span>
													<p class="content">
														스킨플래닝
													</p>
													<p class="content-inner">
														스킨플래닝 이론 및 적용 <br>
														피부 유형별 주의사항
													</p>
												</td>
												<td>
													<span>5</span>
													<p class="content">
														피부기기 <br/>
														적용하기 2
													</p>
													<p class="content-inner">
														스킨플래닝 전 후 <br>
														기기 적용
													</p>
												</td>
												<td></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>

		<?php
		include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/contactUs.php';
		?>
	</div>
</div>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer.php';
?>

<script>
	tabUI('.class-tab', 1);
</script>
</body>
</html>