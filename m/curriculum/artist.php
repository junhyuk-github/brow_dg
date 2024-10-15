<?php
$page_title = '톡스앤필 브로우 | 커리큘럼';
include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/top-m.php';
?>
</head> 
<body>
<div id="wrap" class="">
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/gnb-m.php';
	?>
		
	<div id="container">
		<?php
		$category	=	'curri';
		include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/subTab-m.php';
		?>
		<div id="titBanner" style="background-image:url('/common/img/m/curriculum/banner1.jpg');">
			<div class="text-vertical-center">
				<div class="vertical-middle">
					<div class="minframe">
						<h2>아티스트 과정</h2>
						<span>ARTIST CURRICULUM</span>
					</div>
				</div>
			</div>
		</div>
		
		<div class="class-content">
			<section class="gc-sec1">
				<div class="minframe">
					<div class="inner">
						<div class="gc-tit">
							<h3>아티스트 과정</h2>	
							<p>
								기초이론부터 실습까지 최신 트렌드 <br>
								반영구 종목을 다방면으로 익힐 수 있는 <br>
								창업 대비 반영구 전반 교육 과정
							</p>
						</div>
						<div class="gc-cont">
							<table>
								<colgroup>
									<col width="23%">
									<col width="78%">
								</colgroup>
								<tbody>
									<tr>
										<th>교육 기간</th>
										<td>
											<em>- 평균  3 ~ 4개월 (개인차에 따라 변동가능)</em>
											<em>- 주 2~3회 (1회 2시간)</em>
										</td>
									</tr>
									<tr>
										<th>교육 과목 </th>
										<td>
											<em>- 눈썹 : 엠보, 콤보, 옴브레, 수지, 맨즈브로우</em>
											<em>- 입술 : 틴트립, 풀립</em>
											<em>- 아이라인 : 꼬리 아이라인, 점막 아이라인</em>
											<em>- 헤어라인 : 4D 헤어라인</em>
											<em>- 유륜&미인점 : 머신 테크닉</em>
											<em>- 반영구 이론 : 피부학, 색채학, 보건위생, 시술 주의사항, 상담법</em>
											<em style="color: #A73439;">- 추가 특강 : SMP, 전문가 마케팅, 메디컬 스킨케어, 속눈썹 연장,  피부미용 국가자격증</em>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</section>
			<section class="gc-sec2">
				<div class="minframe">
					<div class="gc-tit">
						<h3>최고의 뷰티 마스터 양성을 위한 차별화 전략</h3>
					</div>
					<div class="gc-cont">
						<div class="info-box">
							<table>
								<tbody>
									<tr>
										<td style="background-image:url(/common/img/m/curriculum/1-1-bg.jpg)">
											<div class="info-item text-vertical-center">
												<div class="vertical-middle txt_frame">
													<span class="label">1</span> <br>
													전국 1위 브랜드 <br>
													톡스앤필 & BLS클리닉 <br>
													의료진 협진 및 노하우
												</div>
											</div>
										</td>
										<td class="white" style="background-image:url(/common/img/m/curriculum/1-2-bg.jpg)">
											<div class="info-item text-vertical-center">
												<div class="vertical-middle txt_frame">
													<span class="label">2</span> <br>
													개인별 눈높이를 고려한 <br>
													맞춤 진도 밀착 교육 <br>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td class="white" style="background-image:url(/common/img/m/curriculum/1-3-bg.jpg)">
											<div class="info-item text-vertical-center">
												<div class="vertical-middle txt_frame">
													<span class="label">3</span> <br>
													마케팅 노하우 습득과 <br>
													자격증 취득을 동시에 
												</div>
											</div>
										</td>
										<td style="background-image:url(/common/img/m/curriculum/1-4-bg.jpg)">
											<div class="info-item text-vertical-center">
												<div class="vertical-middle txt_frame">
													<span class="label">4</span> <br>
													사진촬영 및 다양한 어플 <br>
													편집 노하우 공유
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td style="background-image:url(/common/img/m/curriculum/1-5-bg.jpg)">
											<div class="info-item text-vertical-center">
												<div class="vertical-middle txt_frame">
													<span class="label">5</span> <br>
													졸업 후 기술 업그레이드 <br>
													세미나 진행  
												</div>
											</div>
										</td>
										<td class="white"  style="background-image:url(/common/img/m/curriculum/1-6-bg.jpg)">
											<div class="info-item text-vertical-center">
												<div class="vertical-middle txt_frame">
													<span class="label">6</span> <br>
													창업공간 <br>
													톡스앤필 브로우 수강생 혜택
												</div>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</section>
			<?php
			include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/contactUs-m.php';
			?>
		</div>
	</div>
	
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/floating-m.php';
	?>
	<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/common/commonPage/footer-m.php';
	?>
</div>
</body>
</html>