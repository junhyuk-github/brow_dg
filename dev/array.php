<?php
/*
$arr							=	array ('a', 'b', 'c', 'd', 'e', 'f', '1', '2', '3', '4', '5', '6');
for ( $x = 6; $x < count($arr); $x++ )
{
	echo $arr[$x] . '<br>';
}
*/


include $_SERVER['DOCUMENT_ROOT'] . '/common/classes/instagram.class.php';

$accessToken					=	'IGQVJXZADQteElTaGFZANE1jWjlTZAENBUHFBSFRpY1VMQkNCeTZARVHJSWFVEbWZACb25iZAUdsdER3akV4VVg2MEotM1FnNkVsN3V4ZA1VncDlhOFFmcHlabUNpU3VxcHdDNzhOY3FUQzYwTWdKdjhhWVFXQwZDZD';

$params							=	array(
	'get_code'						=>	isset( $_GET['code'] ) ? $_GET['code'] : '',
	'access_token'					=>	$accessToken,
	'user_id'						=>	'17841447922145763'
);
$ig								=	new Instagram( $params );

$result							=	array();
if ( $ig->hasUserAccessToken ) {
	$usersMedia					=	$ig->getUsersMedia();
	$result['code']				=	1;
	$postList					=	array();

	$result						=	$usersMedia['data'];

	for ( $i = 6; $i < count($result); $i++ )
	{
		if ( $result['media_type'] == 'IMAGE' ) {
			$postList[]			=	$result;
			if ( count($postList) === 12 ) break;
		}
	}

	$result['data']				=	$postList;
} else {
	$result['code']				=	0;
}

echo json_encode($result);
exit;
?>