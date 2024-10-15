<?php
#------------------------------------------------------------------------------
# 작업내용	:	기초 환경 설정 정보
# 인    수	:
# 작성일자	:	2022-07-15
# 작 성 자	:	webtick@gmail.com
# 변경이력	:
#------------------------------------------------------------------------------

//	기초 데이터 배열 선언
$common							=	array();
$common['DOCUMENTROOT']			=	'/home/tfbrow/www';

@header('Content-Type: text/html; charset=UTF-8');
@header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
@header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . 'GMT');
@header('Content-Type: text/html; charset=UTF-8; P3P: CP="ALL CURa ADMa DEVa TAIa OUR BUS IND PHY ONL UNI PUR FIN COM NAV INT DEM CNT STA POL HEA PRE LOC OTC"');
@header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
@header('Cache-Control: post-check=0, pre-check=0', false);
@header('Pragma: no-cache');

@session_save_path($_SERVER['DOCUMENT_ROOT'] . '/_session');													//	이 옵션에서 LG U+ 전자결제 에러.
@session_cache_limiter('nocache, must-revalidate');																//	캐시가 유지되어 폼값이 보존
@ini_set('session.gc_maxlifetime', 7200);																		//	초 - 세션 만료시간을 12시간으로 설정
@ini_set('session.cache_expire', 7200);																			//	12시간
@ini_set('session.gc_probability', 1);
@ini_set('session.gc_divisor', 100);
//if ( !isset($set_time_limit) ) $set_time_limit = 0;
//@set_time_limit($set_time_limit);
@session_set_cookie_params(0, '/', $_SERVER['HTTP_HOST']);														//	해당 도메인만 세션 생성
@ini_set('session.cookie_domain', $_SERVER['HTTP_HOST']);														//	세션이 활성화 될 도메인
@ini_set('session.use_trans_sid', 0);
@ini_set('url_rewriter.tags', '');
session_start();																								//	세션 시작

if ( function_exists('date_default_timezone_set') )
	date_default_timezone_set('Asia/Seoul');

//	에러 메세지 화면 노출(1 : 활성화, 0 : 비활성화)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(E_ALL & ~E_NOTICE);
//error_reporting(E_ALL);

//	클래스 포함	=========================================================================================================
include_once $_SERVER['DOCUMENT_ROOT'] . '/common/classes/DBManager.class.php';									//	DB 관리
include_once $_SERVER['DOCUMENT_ROOT'] . '/common/classes/BasicManager.class.php';								//	기초 관리
include_once $_SERVER['DOCUMENT_ROOT'] . '/common/classes/CommonManager.class.php';								//	공통 관리
include_once $_SERVER['DOCUMENT_ROOT'] . '/common/classes/FileManager.class.php';								//	파일 업로드 관리
include_once $_SERVER['DOCUMENT_ROOT'] . '/common/classes/CorpManager.class.php';								//	업체 관리
include_once $_SERVER['DOCUMENT_ROOT'] . '/common/classes/BoardManager.class.php';								//	게시판 관리
include_once $_SERVER['DOCUMENT_ROOT'] . '/common/classes/LectureManager.class.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/common/classes/MemberManager.class.php';								//	회원 관리
include_once $_SERVER['DOCUMENT_ROOT'] . '/common/classes/SMSManager.class.php';								//	문자 관리
include_once $_SERVER['DOCUMENT_ROOT'] . '/common/classes/CouponManager.class.php';								//	쿠폰 관리
include_once $_SERVER['DOCUMENT_ROOT'] . '/common/classes/PubCode.class.php';					        		//	공통코드

$common['DBManager']			=	New DBManager();															//	DB 관리
$common['BasicManager']			=	New BasicManager();															//	기초 관리
$common['CommonManager']		=	New CommonManager();														//	공통 관리
$common['FileManager']			=	New FileManager();															//	파일 업로드 관리
$common['CorpManager']			=	New CorpManager();															//	업체 관리
$common['BoardManager']			=	New BoardManager();															//	게시판 관리
$common['LectureManager']		=	New LectureManager();
$common['MemberManager']		=	New MemberManager();														//	회원 관리
$common['SMSManager']			=	New SMSManager();															//	문자 관리
$common['CouponManager']		=	New CouponManager();														//	쿠폰 관리
$common['PubCode']				=	New PubCode();																//	공통코드

if ( $_SERVER['SERVER_PORT'] == '80' ) {
	$common['http']				=	'http://';
} else {
	$common['http']				=	'https://';
}
//$common['http']					=	'https://';

$common['wwwURL']				=	$_SERVER['HTTP_HOST'];
$common['wwwPath']				=	$common['DOCUMENTROOT'];
$common['defaultUrl']			=	$common['wwwURL'] . '/down';
$common['defaultPath']			=	$common['wwwPath'] . '/down';
$common['tempPath']				=	$common['defaultPath'] . '/tempFiles';
$common['uploadVirDir']			=	'/down';
$common['dirPermission']		=	0777;

//	회원 정보
$common['corpCode']				=	'W00091';
$common['userIdx']				=	decrypt($_SESSION['userIdx']);
$common['userID']				=	decrypt($_SESSION['userID']);
$common['userName']				=	decrypt($_SESSION['userName']);
$common['userMobile']			=	decrypt($_SESSION['userMobile']);
$common['userMail']				=	decrypt($_SESSION['userMail']);
$common['userGroup']			=	decrypt($_SESSION['userGroup']);

$common['masterBrand']			=	'C';																		//	마스터 브랜드 코드
$common['masterCorp']			=	'C00001';																	//	마스터 회사 코드
// $common['brandCode']			=	'M';																		//	브랜드 코드
$common['brandCode']			=	'W';																		//	기존코드가 달라서 임의로 바꿈 브랜드 코드
$common['intranetURL']			=	$common['http'] . 'intranet.toxnfill.com';
$common['intranetURL2']			=	'https://intranet.bbgnetworks.com';
$common['sendMail']				=	'admin@toxnfillacademy.com';

$common['buseoCode']			=	'1';																		//	tbl_pubCode의 부서 코드
$common['positionCode']			=	'12';																		//	tbl_pubCode의 직위 코드
$common['dutyCode']				=	'29';																		//	tbl_pubCode의 직책 코드
$common['regionGrp']			=	'35';																		//	tbl_pubCode의 지역별 코드
$common['requestCode']			=	'48';																		//	tbl_pubCode의 예약요청사항 코드
$common['eventInfoCode']		=	'49';																		//	tbl_pubCode의 시술간편정보 코드
$common['alimtalkCode']			=	'68';																		//	tbl_pubCode의 알림톡 발송 상황 코드
$common['bnfateCode']			=	'100';																		//	tbl_pubCode의 시술전후사진_톡스앤필
$common['videoCode']			=	'138';																		//	tbl_pubCode의 톡스앤필 영상

$selfPage						=	$_SERVER['PHP_SELF'];														//	자기의 페이지
$pageQueryString				=	$_SERVER['QUERY_STRING'];
$refererPage					=	$_SERVER['HTTP_REFERER'];													//	이전 페이지
$adminLoginPage					=	'/login.php';
$requestURI						=	$_SERVER['REQUEST_URI'];
$curPageURL						=	$common['http'] . $common['wwwURL'] . $requestURI;
$captchaSiteKey                 =   '6LcVZ60nAAAAAGgBYHlGJRKdkzbPH_0x3vdcdZCD';

$common['connIP']				=	getConnIP();
$common['sessionID']			=	session_id();

defined(	'webticktock'		)	OR	define(	'webticktock',				true				);				//	개별페이지 접근불가
?>