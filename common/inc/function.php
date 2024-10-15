<?php
#------------------------------------------------------------------------------
# 작업내용	:	함수 관련
# 인    수	:
# 작성일자	:	2018-11-30
# 작 성 자	:	webtick@gmail.com
# 변경이력	:
#------------------------------------------------------------------------------

//	===========================================
//	strip_tags
function stripTags($data)
{
	//	strip_tags($user_input, '<img><b>');
	if ( $data ) {
		if ( is_array($data) ) {
			foreach ( $data as $key => $value )
			{
				$data[$key]		=	strip_tags(trim($value));
			}
			return $data;
		} else {
			return strip_tags(trim($data));
		}
	} else {
		return $data;
	}
}

//	addslashes
function dataAddslashes($data)
{
	if ( $data ) {
		if ( is_array($data) ) {
			foreach ( $data as $key => $value )
			{
				$data[$key]		=	addslashes(trim($value));
			}
			return $data;
		} else {
			return addslashes(trim($data));
		}
	} else {
		return $data;
	}
}

//	remove AllTags
function allTags($data)
{
	if ( $data ) {
		if (is_array($data) ) {
			foreach ( $data as $key => $value )
			{
				$data[$key]		=	strip_tags(addslashes(trim($value)));
			}
			return $data;
		} else {
			return strip_tags(addslashes(trim($data)));
		}
	} else {
		return $data;
	}
}

//	remove HTML
function removeHTML($data)
{
	if ( $data ) {
		return htmlspecialchars(trim($data));
	} else {
		return $data;
	}
}

//	return HTML
function returnHTML($data)
{
	if ( $data ) {
		return htmlspecialchars_decode(trim($data));
	} else {
		return $data;
	}
}
//	===========================================

function strLenCut($str, $strLen)
{
	if ( mb_strlen($str, 'UTF-8') > $strLen ) {
		return mb_substr($str, 0, $strLen, 'utf-8') . '...';
	} else {
		return mb_substr($str, 0, $strLen, 'utf-8');
	}
}

//	윈쪽에서 문자열 자르기	=============================================
function left($str, $length)
{
	return substr($str, 0, $length);
}
//	윈쪽에서 문자열 자르기	=============================================

//	오른쪽에서 문자열 자르기	=========================================
function right($str, $length)
{
	return substr($str, -$length);
}
//	오른쪽에서 문자열 자르기	=========================================

//	전체 공백 제거	=====================================================
function aTrim($str)
{
	return preg_replace('/\s+/', '', $str);
}
//	전체 공백 제거	=====================================================

//	랜덤 문자열  생성 함수	=============================================
function getRandomString($type = '', $len = 10)
{
	$lowercase					=	'abcdefghijklmnopqrstuvwxyz';
	$uppercase					=	'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$numeric					=	'0123456789';
	$special					=	'`~!@#$%^&*()-_=+\\|[{]};:\'",<.>/?';
	$key						=	'';
	$token						=	'';

	if ( $type == '' ) {
		$key					=	$lowercase . $uppercase . $numeric;
	} else {
		if ( strpos($type,'09') > -1 ) $key			.=	$numeric;
		if ( strpos($type,'az') > -1 ) $key			.=	$lowercase;
		if ( strpos($type,'AZ') > -1 ) $key			.=	$uppercase;
		if ( strpos($type,'$') > -1 ) $key			.=	$special;
	}

	for ( $i = 0; $i < $len; $i++ )
	{
		$token					.=	$key[mt_rand(0, strlen($key) - 1)];
	}
	return $token;
}
//	랜덤 문자열  생성 함수	=============================================

//	파일 용량 변환	=====================================================
//	사용법 : bytesToSize($bytes, 0);
function bytesToSize($bytes, $decimals = 2)
{
	if ( $bytes > 0 ) {
		$size					=	array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
		$factor					=	floor((strlen($bytes) - 1) / 3);
		return sprintf("%.{$decimals}f ", $bytes / pow(1024, $factor)) . @$size[$factor];
	} else {
		return 0;
	}
}
//	파일 용량 변환	=====================================================

//	암호화 / 복호화	=====================================================
function encrypt($string)
{
	$key						=	'(webtick2019webtick2019)';
	$result						=	'';

	for ( $i=0; $i<strlen($string); $i++ )
	{
		$char					=	substr($string, $i, 1);
		$keychar				=	substr($key, ($i % strlen($key))-1, 1);
		$char					=	chr(ord($char)+ord($keychar));
		$result					.=	$char;
	}
	return base64_encode($result);
}
 
function decrypt($string)
{
	$key						=	'(webtick2019webtick2019)';
	$result						=	'';
	$string						=	base64_decode($string);

	for ( $i=0; $i<strlen($string); $i++ )
	{
		$char					=	substr($string, $i, 1);
		$keychar				=	substr($key, ($i % strlen($key))-1, 1);
		$char					=	chr(ord($char)-ord($keychar));
		$result					.=	$char;
	}
	return $result;
}

/*
// AES-256과 HMAC을 사용하여 문자열을 암호화하고 위변조를 방지하는 법.
// 비밀번호는 서버만 알고 있어야 한다. 절대 클라이언트에게 전송해서는 안된다.
// PHP 5.2 이상, mcrypt 모듈이 필요하다.
// 문자열을 암호화한다.
function encrypt($string)
{
	// 보안을 최대화하기 위해 비밀번호를 해싱한다.
	$key						=	'(webtick2019webtick2019)';
	$password					=	hash('sha256', $key, true);

	// 용량 절감과 보안 향상을 위해 평문을 압축한다.
	$string						=	gzcompress($string);

	// 초기화 벡터를 생성한다.
	$iv_source					=	defined('MCRYPT_DEV_URANDOM') ? MCRYPT_DEV_URANDOM : MCRYPT_RAND;
	$iv							=	mcrypt_create_iv(32, $iv_source);

	// 암호화한다.
	$ciphertext					=	mcrypt_encrypt('rijndael-256', $password, $string, 'cbc', $iv);

	// 위변조 방지를 위한 HMAC 코드를 생성한다. (encrypt-then-MAC)
	$hmac						=	hash_hmac('sha256', $ciphertext, $password, true);

	// 암호문, 초기화 벡터, HMAC 코드를 합하여 반환한다.
	return base64_encode($ciphertext . $iv . $hmac);
}

// 위의 함수로 암호화한 문자열을 복호화한다.
// 복호화 과정에서 오류가 발생하거나 위변조가 의심되는 경우 false를 반환한다.
function decrypt($string)
{
	// 초기화 벡터와 HMAC 코드를 암호문에서 분리하고 각각의 길이를 체크한다.
	$ciphertext					=	@base64_decode($string, true);
	if ( $ciphertext === false ) return false;
	$len						=	strlen($ciphertext);
	if ( $len < 64 ) return false;
	$iv							=	substr($ciphertext, $len - 64, 32);
	$hmac						=	substr($ciphertext, $len - 32, 32);
	$ciphertext					=	substr($ciphertext, 0, $len - 64);

	// 암호화 함수와 같이 비밀번호를 해싱한다.
	$key						=	'(webtick2019webtick2019)';
	$password					=	hash('sha256', $key, true);

	// HMAC 코드를 사용하여 위변조 여부를 체크한다.
	$hmac_check					=	hash_hmac('sha256', $ciphertext, $password, true);
	if ( $hmac !== $hmac_check ) return false;

	// 복호화한다.
	$plaintext					=	@mcrypt_decrypt('rijndael-256', $password, $ciphertext, 'cbc', $iv);
	if ( $plaintext === false ) return false;

	// 압축을 해제하여 평문을 얻는다.
	$plaintext					=	@gzuncompress($plaintext);
	if ($plaintext === false) return false;

	// 이상이 없는 경우 평문을 반환한다.
	return $plaintext;
}
*/
//	암호화 / 복호화	=====================================================

//	날짜 유효성 검사	=================================================
function dateValidate($chkDate)
{
	$chkDates					=	explode('-', $chkDate);

	$chkYear					=	$chkDates[0];
	$chkMonth					=	$chkDates[1];
	$chkDay						=	$chkDates[2];

	if ( checkdate($chkMonth, $chkDay, $chkYear) ) {
		return 'Y';
	} else {
		return 'N';
	}
}
//	날짜 유효성 검사	=================================================

//	new 아이콘 표시
function newIcon($regDate, $interval)
{
	$currentTime				=	time();

	$date						=	substr($regDate, 0, 10);
	$time						=	substr($regDate, 11, 8);
	$date						=	explode('-', $date);
	$time						=	explode(':', $time);

	$timestamp					=	mktime($time[0], $time[1], $time[2], $date[1], $date[2], $date[0]);

	###### $interval 동안 New 버튼을 표시 한다. 참고 -> 24 * 3600 : 1일
	if ( $currentTime - $timestamp <= $interval * 3600 ) {
		return '<img src="/images/iconNew.gif" width="16" height="16" border="0" align="absmiddle">';
	}
}
//	new 아이콘 표시

//	정규식을 이용한 자동링크 걸기
function alink($data)
{
	// http
	$data						=	preg_replace("/http:\/\/([0-9a-z-.\/@~?&=_]+)/i", "<a href=\"http://\\1\" target='_blank'>http://\\1</a>", $data); 
	// ftp
	$data						=	preg_replace("/ftp:\/\/([0-9a-z-.\/@~?&=_]+)/i", "<a href=\"ftp://\\1\" target='_blank'>ftp://\\1</a>", $data); 
	// email
	$data						=	preg_replace("/([_0-9a-z-]+(\.[_0-9a-z-]+)*)@([0-9a-z-]+(\.[0-9a-z-]+)*)/i", "<a href=\"mailto:\\1@\\3\">\\1@\\3</a>", $data); 
	return $data;
}
//	정규식을 이용한 자동링크 걸기

//	현재 접속이 모바일인지 PC인지 체크 코드
function mobileCheck()
{ 
	$userAgent					=	$_SERVER['HTTP_USER_AGENT'];
	//$MobileArray				=	array("iphone","lgtelecom","skt","mobile","samsung","nokia","blackberry","android","android","sony","phone");
	$MobileArray				=	array("iphone","ipod","android","blackberry","opera mini","windows ce","nokia","sony");

	$checkCount					=	0;
	for ( $i=0; $i<sizeof($MobileArray); $i++ )
	{ 
		if ( preg_match("/$MobileArray[$i]/", strtolower($userAgent)) ) {
			$checkCount++; break;
		}
	}
	//return ($checkCount >= 1) ? "Mobile" : "Computer";
	return ($checkCount >= 1) ? 'Y' : 'N';
}
//	현재 접속이 모바일인지 PC인지 체크 코드

//	현재 접속한 도메인이 모바일인지 PC인지 체크 코드
function domainCheck()
{ 
	$domain						=	$_SERVER['HTTP_HOST'];
	$arrDomain					=	explode('.', $domain);

	if ( $arrDomain[0] == 'm' ) {
		return 'Y';
	} else {
		return 'N';
	}
}
//	현재 접속한 도메인이 모바일인지 PC인지 체크 코드

//	접속 아이피
function getConnIP()
{
	if ( !empty($_SERVER['HTTP_CLIENT_IP']) ) {														//	공용 IP 확인
		$connIP					=	$_SERVER['HTTP_CLIENT_IP'];
	} elseif ( !empty($_SERVER["HTTP_X_FORWARDED_FOR"]) ) {											//	프록시 사용하는지 확인
		$connIP					=	$_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$connIP					=	$_SERVER['REMOTE_ADDR'];
	}

	return $connIP;
}
//	접속 아이피

//	현재 시간 밀리세컨드 포함
function getMillisecond()
{
	list($microtime,$timestamp)	=	explode(' ',microtime());
	$time						=	$timestamp.substr($microtime, 2, 3);

	return $time;
}
//	현재 시간 밀리세컨드 포함

//	파일 MimeType 알아내기
function getMimeType($filename)
{
	$mime_types					=	array
										(
											'txt'			=>	'text/plain',
											'htm'			=>	'text/html',
											'html'			=>	'text/html',
											'php'			=>	'text/html',
											'css'			=>	'text/css',
											'js'			=>	'application/javascript',
											'json'			=>	'application/json',
											'xml'			=>	'application/xml',
											'swf'			=>	'application/x-shockwave-flash',
											'flv'			=>	'video/x-flv',

											// images
											'png'			=>	'image/png',
											'jpe'			=>	'image/jpeg',
											'jpeg'			=>	'image/jpeg',
											'jpg'			=>	'image/jpeg',
											'gif'			=>	'image/gif',
											'bmp'			=>	'image/bmp',
											'ico'			=>	'image/vnd.microsoft.icon',
											'tiff'			=>	'image/tiff',
											'tif'			=>	'image/tiff',
											'svg'			=>	'image/svg+xml',
											'svgz'			=>	'image/svg+xml',

											// archives
											'zip'			=>	'application/zip',
											'rar'			=>	'application/x-rar-compressed',
											'exe'			=>	'application/x-msdownload',
											'msi'			=>	'application/x-msdownload',
											'cab'			=>	'application/vnd.ms-cab-compressed',

											// audio/video
											'mp3'			=>	'audio/mpeg',
											'qt'			=>	'video/quicktime',
											'mov'			=>	'video/quicktime',

											// adobe
											'pdf'			=>	'application/pdf',
											'psd'			=>	'image/vnd.adobe.photoshop',
											'ai'			=>	'application/postscript',
											'eps'			=>	'application/postscript',
											'ps'			=>	'application/postscript',

											// ms office
											'doc'			=>	'application/msword',
											'rtf'			=>	'application/rtf',
											'xls'			=>	'application/vnd.ms-excel',
											'ppt'			=>	'application/vnd.ms-powerpoint',

											// open office
											'odt'			=>	'application/vnd.oasis.opendocument.text',
											'ods'			=>	'application/vnd.oasis.opendocument.spreadsheet',
										);

	$ext						=	strtolower(array_pop(explode('.', $filename)));

	if ( array_key_exists($ext, $mime_types) ) {
		return $mime_types[$ext];
	} elseif ( function_exists('finfo_open') ) {
		$finfo					=	finfo_open(FILEINFO_MIME);
		$mimetype				=	finfo_file($finfo, $filename);
		finfo_close($finfo);
		return $mimetype;
	} else {
		return 'application/octet-stream';
	}
}
//	파일 MimeType 알아내기

//	도메인 추출 정규식
function getDomainName($url)
{
	$value						=	strtolower(trim($url));
	$url_patten					=	'/^(?:(?:[a-z]+):\/\/)?((?:[a-z\d\-]{2,}\.)+[a-z]{2,})(?::\d{1,5})?(?:\/[^\?]*)?(?:\?.+)?$/i';
	$domain_patten				=	'/([a-z\d\-]+(?:\.(?:asia|info|name|mobi|com|net|org|biz|tel|xxx|kr|co|so|me|eu|cc|or|pe|ne|re|tv|jp|tw)){1,2})(?::\d{1,5})?(?:\/[^\?]*)?(?:\?.+)?$/i';

	if ( preg_match($url_patten, $value) ) {
		preg_match($domain_patten, $value, $matches);
		$host					=	(!$matches[1]) ? $value : $matches[1];
	}

	return $host;
}
//	도메인 추출 정규식

//	기존 이전 데이타를 위한 이미지 경로 변경
function contentsChgImg($pcURL, $contents)
{
	preg_match_all("/<img[^>]*src=[\"']?([^>\"']+)[\"']?[^>]*>/i", $contents, $matches);
	foreach ($matches[1] as $k => $val)
	{
		if ( strpos($val, 'http://') !== false ) {
			$url				=	parse_url($val);
			$domain				=	'http://' . $url['host'];
			$imgURL				=	str_replace($domain, '', $val);
		} else {
			$imgURL				=	$val;
		}

		if ( strpos($imgURL, 'uploadFiles') === false ) {
			if ( strpos($imgURL, '/filedata/se2/') !== false ) {
				$imgURL			=	str_replace('/filedata/se2/','/uploadFiles/filedata/se2/',$imgURL);
			}

			if ( strpos($imgURL, '/updata/photo/') !== false ) {
				$imgURL			=	str_replace('/updata/photo/','/uploadFiles/updata/photo/',$imgURL);
			}
		}

		$fImgSrc				=	$pcURL . $imgURL;
		$contents				=	str_replace($val, $fImgSrc, $contents);
	}

	return $contents;
}
//	기존 이전 데이타를 위한 이미지 경로 변경

//	접속 브라우저 종류 리턴
function getBrowser()
{
	$userAgent					=	$_SERVER['HTTP_USER_AGENT'];
	$agent						=	strtolower($userAgent);
	//echo $agent; echo '<br/>';
	if(preg_match('/msie 4.[0-9]*/',						$agent))													{ $s = 'MSIE 4.x'; }
	else if (preg_match('/msie 5.0[0-9]*/',					$agent))													{ $s = 'MSIE 5.0'; }
	else if(preg_match('/msie 5.5[0-9]*/',					$agent))													{ $s = 'MSIE 5.5'; }
	else if(preg_match('/msie 6.0[0-9]*/',					$agent))													{ $s = 'MSIE 6.0'; }
	else if(preg_match('/msie 7.0[0-9]*/',					$agent))													{ $s = 'MSIE 7.0'; }
	else if(preg_match('/msie 8.0[0-9]*/',					$agent))													{ $s = 'MSIE 8.0'; }
	else if(preg_match('/msie 9.0[0-9]*/',					$agent))													{ $s = 'MSIE 9.0'; }
	else if(preg_match('/msie 10.0[0-9]*/',					$agent))													{ $s = 'MSIE 10.0'; }
	else if(preg_match('/trident*/', $agent) && preg_match('/rv:11.0*/', $agent) && preg_match('/gecko*/', $agent))		{ $s = 'MSIE 11'; }
	else if(preg_match('/edge/i',							$agent))													{ $s = 'Edge'; }
	else if(preg_match('/firefox/',							$agent))													{ $s = 'FireFox'; }
	else if(preg_match('/chrome/',							$agent))													{ $s = 'Chrome'; }
	else if(preg_match('/x11/',								$agent))													{ $s = 'Netscape'; }
	else if(preg_match('/opera/',							$agent))													{ $s = 'Opera'; }
	else if(preg_match('/gec/',								$agent))													{ $s = 'Gecko'; }
	else if(preg_match('/python/',							$agent))													{ $s = 'Python'; }
	else if(preg_match('/bot|slurp|scrap|spider|crawl/',	$agent))													{ $s = 'Robot'; }
	else if(preg_match('/internet explorer/',				$agent))													{ $s = 'IE'; }
	else if(preg_match('/mozilla/',							$agent))													{ $s = 'Mozilla'; }
	else																												{ $s = '기타'; }
	return $s;
}
//	접속 브라우저 종류 리턴

//	접속 OS 종류 리턴
function getOS()
{
	$userAgent					=	$_SERVER['HTTP_USER_AGENT'];
	$agent						=	strtolower($userAgent);
	//echo $agent; echo '<br/>';
	if (preg_match('/windows 95/',							$agent))													{ $s = ' Win 95'; }
	else if(preg_match('/iphone/',							$agent))													{ $s = 'iPhone'; }							//	iPhone
	else if(preg_match('/ipad/',							$agent))													{ $s = 'iPad'; }							//	iPad
	else if(preg_match('/iPod/',							$agent))													{ $s = 'iPod'; }							//	iPod
	else if(preg_match('/android/',							$agent))													{ $s = 'Android'; }							//	Android
	else if(preg_match('/psp/',								$agent))													{ $s = 'PSP'; }								//	PSP
	else if(preg_match('/playstation/',						$agent))													{ $s = 'PLAYSTATION'; }						//	PLAYSTATION
	else if(preg_match('/berry/',							$agent))													{ $s = 'BlackBerry'; }						//	BlackBerry
	else if(preg_match('/symbian/',							$agent))													{ $s = 'Symbian'; }							//	Symbian
	else if(preg_match('/ericsson/',						$agent))													{ $s = 'SonyEricsson'; }					//	SonyEricsson
	else if(preg_match('/nokia/',							$agent))													{ $s = 'Nokia'; }							//	Nokia
	else if(preg_match('/sph/',								$agent))													{ $s = '애니콜'; }							//	삼성폰
	else if(preg_match('/sgh/',								$agent))													{ $s = '옴니아'; }							//	옴니아
	else if(preg_match('/sch/',								$agent))													{ $s = 'T*옴니아'; }						//	T*옴니아
	else if(preg_match('/im-s/',							$agent))													{ $s = '스카이폰'; }						//	스카이폰
	else if(preg_match('/lgtelecom/',						$agent))													{ $s = 'LG 사이언'; }						//	LG 사이언
	/* Win OS */
	else if(preg_match('/windows 98/',						$agent))													{ $s = 'Win 98'; }
	else if(preg_match('/windows nt 4\.[0-9]*/',			$agent))													{ $s = 'NT'; }
	else if(preg_match('/windows nt 5\.0/',					$agent))													{ $s = 'Win 2000'; }
	else if(preg_match('/windows nt 5\.1/',					$agent))													{ $s = 'Win XP'; }
	else if(preg_match('/windows nt 5\.2/',					$agent))													{ $s = 'Win 2003'; }
	else if(preg_match('/windows nt 6\.0/',					$agent))													{ $s = 'Win Vista'; }
	else if(preg_match('/windows nt 6\.1/',					$agent))													{ $s = 'Win 7'; }
	else if(preg_match('/windows nt 6\.2/',					$agent))													{ $s = 'Win 8'; }
	else if(preg_match('/windows nt 10\.0/',				$agent))													{ $s = 'Win 10'; }
	else if(preg_match('/windows 9x/',						$agent))													{ $s = 'ME'; }
	else if(preg_match('/windows ce/',						$agent))													{ $s = 'CE'; }
	/* MAC OS X */
	/*
	else if(preg_match('/mac os x 10.5/',					$agent))													{ $s = 'Mac OS 10.5'; }
	else if(preg_match('/mac os x 10_5_1/',					$agent))													{ $s = 'Mac OS 10.5.1'; }
	else if(preg_match('/mac os x 10_5_2/',					$agent))													{ $s = 'Mac OS 10.5.2'; }
	else if(preg_match('/mac os x 10_5_3/',					$agent))													{ $s = 'Mac OS 10.5.3'; }
	else if(preg_match('/mac os x 10_5_4/',					$agent))													{ $s = 'Mac OS 10.5.4'; }
	else if(preg_match('/mac os x 10_5_5/',					$agent))													{ $s = 'Mac OS 10.5.5'; }
	else if(preg_match('/mac os x 10_5_6/',					$agent))													{ $s = 'Mac OS 10.5.6'; }
	else if(preg_match('/mac os x 10_5_7/',					$agent))													{ $s = 'Mac OS 10.5.7'; }
	else if(preg_match('/mac os x 10_5_8/',					$agent))													{ $s = 'Mac OS 10.5.8'; }
	else if(preg_match('/mac os x 10.6/',					$agent))													{ $s = 'Mac OS 10.6';   }
	else if(preg_match('/mac os x 10_6_1/',					$agent))													{ $s = 'Mac OS 10.6.1'; }
	else if(preg_match('/mac os x 10_6_2/',					$agent))													{ $s = 'Mac OS 10.6.2'; }
	else if(preg_match('/mac os x 10_6_3/',					$agent))													{ $s = 'Mac OS 10.6.3'; }
	else if(preg_match('/mac os x 10_6_4/',					$agent))													{ $s = 'Mac OS 10.6.4'; }
	else if(preg_match('/mac os x 10_6_5/',					$agent))													{ $s = 'Mac OS 10.6.5'; }
	else if(preg_match('/mac os x 10_6_6/',					$agent))													{ $s = 'Mac OS 10.6.6'; }
	else if(preg_match('/mac os x 10_6_7/',					$agent))													{ $s = 'Mac OS 10.6.7'; }
	else if(preg_match('/mac os x 10_6_8/',					$agent))													{ $s = 'Mac OS 10.6.8'; }
	else if(preg_match('/mac os x 10_6_9/',					$agent))													{ $s = 'Mac OS 10.6.9'; }
	else if(preg_match('/mac os x 10.7/',					$agent))													{ $s = 'Mac OS 10.7';   }
	else if(preg_match('/mac os x 10_7_1/',					$agent))													{ $s = 'Mac OS 10.7.1'; }
	else if(preg_match('/mac os x 10_7_2/',					$agent))													{ $s = 'Mac OS 10.7.2'; }
	else if(preg_match('/mac os x 10_7_3/',					$agent))													{ $s = 'Mac OS 10.7.3'; }
	else if(preg_match('/mac os x 10_7_4/',					$agent))													{ $s = 'Mac OS 10.7.4'; }
	else if(preg_match('/mac os x 10.8/',					$agent))													{ $s = 'Mac OS 10.8'; }
	*/

	else if(preg_match('/macintosh|mac os x/i',				$agent))													{ $s = 'Mac OS X'; }
	else if(preg_match('/linux/',							$agent))													{ $s = 'Linux'; }
	else if(preg_match('/sunos/',							$agent))													{ $s = 'sunOS'; }
	else if(preg_match('/irix/',							$agent))													{ $s = 'IRIX'; }
	else if(preg_match('/phone/',							$agent))													{ $s = 'Phone'; }
	else if(preg_match('/internet explorer/',				$agent))													{ $s = 'IE'; }
	else if(preg_match('/phone|skt|lge|0450/',				$agent))													{ $s = 'Mobile'; }
	else if(preg_match('/yeti/',							$agent))													{ $s = 'NAVER Robot'; }						//	네이버 로봇
	else if(preg_match('/mediapartners/',					$agent))													{ $s = 'Google AdSense'; }					//	구글 애드센스
	else if(preg_match('/google/',							$agent))													{ $s = 'Google Robot'; }					//	구글 로봇
	else if(preg_match('/msn/',								$agent))													{ $s = 'Msn Robot'; }						//	MSN 로봇
	else if(preg_match('/bing/',							$agent))													{ $s = 'Bing Robot'; }						//	Bing 로봇
	else if(preg_match('/yahoo/',							$agent))													{ $s = 'Yahoo! Robot'; }					//	야후! 로봇
	else if(preg_match('/daum/',							$agent))													{ $s = 'DAUM Robot'; }						//	다음 로봇
	else if(preg_match('/empas/',							$agent))													{ $s = 'Empas Robot'; }						//	네이트 로봇
	else if(preg_match('/zum/',								$agent))													{ $s = 'Zum Robot'; }						//	줌 로봇
	else if(preg_match('/baidu/',							$agent))													{ $s = 'Baidu Robot'; }						//	바이두 로봇
	else if(preg_match('/mj12/',							$agent))													{ $s = 'majestic12 Robot'; }				//	마제스틱12 로봇
	else if(preg_match('/yandex/',							$agent))													{ $s = 'YandexBot Robot'; }					//	Yandex 로봇
	else if(preg_match('/ahrefs/',							$agent))													{ $s = 'Ahrefs Robot'; }					//	Ahrefs 로봇
	else if(preg_match('/rss/',								$agent))													{ $s = 'RSS Reader'; }						//	RSS리더
	else if(preg_match('/bot|slurp|scrap|spider|crawl/',	$agent))													{ $s = 'Robot'; }							//	기타 로봇
	else																												{ $s = '기타'; }
	return $s;
}
//	접속 OS 종류 리턴

//	Debug 저장
function debugWrite($file, $noti)
{
	$logFile					=	'/home/toxnfillacademy/www/saveLog/debug/' . $file . '_' . date('ymd') . '.log';
	$logFile					=	fopen($logFile, 'a+');
	ob_start();
	print_r($noti);
	$obContent					=	ob_get_contents();
	ob_end_clean();
	fwrite($logFile, "\r\n" . $obContent . "\r\n");
	fclose($logFile);
}
//	Debug 저장
?>