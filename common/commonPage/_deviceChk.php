<?php
$isMobile						=	mobileCheck();													//	Y : Mobile, N : PC
$curPageURI						=	$_SERVER['REQUEST_URI'];
$splitCurPage					=	substr($curPageURI, 0, 3);										//	접속 주소

$pcCurPageURI					=	$common['http'] . $common['wwwURL'] . str_replace('/m/', '/', $curPageURI);
$moCurPageURI					=	$common['http'] . $common['wwwURL'] . '/m' . str_replace('/m/', '/', $curPageURI);
?>

<script>
//디바이스 종류(Mobile, PC, Tablet)
function deviceKind()
{
	//	모바일 Device종류(윈도우 폰은 앞으로 나오지 않기 때문에 빼도 무방하나 아직 쓰는 사람이 존재하기에..)
	var mobileFlag				=	/Mobile|iP(hone|od)|Windows (CE|Phone)|Minimo|Opera M(obi|ini)|BlackBerry|Nokia/;

	if (navigator.userAgent.match(mobileFlag) && !navigator.userAgent.match(/iPad/)) {				//	모바일일경우
		return "Mobile";
	} else if (navigator.userAgent.match(/iPad|Android/)) {											//	모바일 Device와 Android가 포함이 안되어 있을 경우
		return "Tablet";
	} else {																						//	그 외의 경우 모두 테블릿
		return "PC";
	}
}

var screenWidth					=	screen.width;													//	가로 해상도
var screenHeight				=	screen.height;													//	세로 해상도
var device						=	deviceKind();

if ( "<?=$splitCurPage?>" == "/m/" ) {																//	Mobile 주소로 접속 했다면
	if ( device == "PC" ) {
		location.href			=	"<?=$pcCurPageURI?>";
	} else if ( device == "Tablet" ) {
		if ( parseInt(screenWidth) > 767 ) {														//	PC 이동
			location.href		=	"<?=$pcCurPageURI?>";
		}
	}
} else {																							//	PC 주소로 접속 했다면
	if ( device == "Mobile" ) {
		location.href			=	"<?=$moCurPageURI?>";
	} else if ( device == "Tablet" ) {
		if ( parseInt(screenWidth) < 768 ) {														//	Mobile 이동
			location.href		=	"<?=$moCurPageURI?>";
		}
	}
}
</script>