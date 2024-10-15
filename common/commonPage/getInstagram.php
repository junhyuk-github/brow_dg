<?php
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
	//$result['data'] = array_slice($usersMedia['data'], 0, 9);
	foreach ($usersMedia['data'] as &$post)
	{
		if ( $post['media_type'] == 'IMAGE' ) {
			$postList[]			=	$post;
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