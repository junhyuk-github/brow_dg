<?php
//	https://tonhnegod.tistory.com/entry/%EC%9B%B9-%EC%82%AC%EC%9D%B4%ED%8A%B8%EC%97%90-%EB%82%B4-%EC%9D%B8%EC%8A%A4%ED%83%80%EA%B7%B8%EB%9E%A8-%EA%B0%80%EC%A0%B8%EC%98%A4%EA%B8%B0-instagram-api






//	인증코드 받기
//	https://api.instagram.com/oauth/authorize?client_id=1620880168307458&redirect_uri=https://www.toxnfillbrow.com&scope=user_profile,user_media&response_type=code 

//	받은 인증코드
//	https://www.toxnfillbrow.com/?code=AQCh2ts93c7EtSsfVQL6udVtDyto08MEPg2tHc_cJ1K8Y1kJqJHkRUYOlsyMxVmicSt_u6KbhoLHYlpwUtxFWD87XpouF04f39zfTlULoRzIKtr3KKOsLXJ0zRhQAFCLaI0HH91o2WoKgKmxfar0BsvbR1mf5YInjoN-YwwnhWdBJHFHV90_8P79sQDf0AOMJAOiXiwc5eudPKR8d-GfM7oDzuscIxvDdxl8SFYFiAOwQQ#_



https://graph.instagram.com/access_token?grant_type=ig_exchange_token&client_secret={Instagram 앱 시크릿 코드}&access_token={1시간짜리 액세스 토큰}
출처: https://tonhnegod.tistory.com/entry/웹-사이트에-내-인스타그램-가져오기-instagram-api [평범한 게 제일 어렵다:티스토리]






//	액세스 토큰 발급
$url							=	'https://api.instagram.com/oauth/access_token';
$post_array						=	array(
										'client_id'			=>	'1620880168307458',							//	여기에 본인의 Instagram 앱 ID 입력하세요
										'client_secret'		=>	'122d20f01a4f82a195baf8e88c613ece',			//	여기에 본인의 Instagram 앱 시크릿 코드를 입력하세요
										'grant_type'		=>	'authorization_code',
										'redirect_uri'		=>	'https://www.toxnfillbrow.com/',				//	여기에 본인의 유효한 OAuth 리디렉션 URI에 적었던 주소를 입력하세요
										'code'				=>	'AQCh2ts93c7EtSsfVQL6udVtDyto08MEPg2tHc_cJ1K8Y1kJqJHkRUYOlsyMxVmicSt_u6KbhoLHYlpwUtxFWD87XpouF04f39zfTlULoRzIKtr3KKOsLXJ0zRhQAFCLaI0HH91o2WoKgKmxfar0BsvbR1mf5YInjoN-YwwnhWdBJHFHV90_8P79sQDf0AOMJAOiXiwc5eudPKR8d-GfM7oDzuscIxvDdxl8SFYFiAOwQQ#_'	//	여기에 발급 받았던 인증 코드를 입력하세요
									);

$curl							=	curl_init($url);
curl_setopt($curl, CURLOPT_POST,true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $post_array);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);  
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$result							=	curl_exec($curl);
curl_close($curl);
$result							=	json_decode($result,true);
print_r($result);
?>