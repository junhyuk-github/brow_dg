<?php
define( 'INSTAGRAM_APP_ID', '1620880168307458' );
define( 'INSTAGRAM_APP_SECRET', '122d20f01a4f82a195baf8e88c613ece' );
define( 'INSTAGRAM_APP_REDIRECT_URI', 'https://www.toxnfillbrow.com/common/commonPage/getInstagram.php' );

Class Instagram {
    private $_appId = INSTAGRAM_APP_ID;
    private $_appSecret = INSTAGRAM_APP_SECRET;
    private $_redirectUrl = INSTAGRAM_APP_REDIRECT_URI;
    private $_getCode = '';
    private $_apiBaseUrl = 'https://api.instagram.com/';
    private $_graphBaseUrl = 'https://graph.instagram.com/';
    private $_userAccessToken = '';
    private $_userAccessTokenExpires = '';

    public $authorizationUrl = '';
    public $hasUserAccessToken = false;
    public $userId = '';

    function __construct( $params ) {
        // save instagram code
        $this->_getCode = $params['get_code'];

        // get an access token
        $this->_setUserInstagramAccessToken( $params );

        // get authorization url
        $this->_setAuthorizationUrl();
    }
 
    // Access Token 가져오기
    public function getUserAccessToken() {
        return $this->_userAccessToken;
    }

    // Access Token 만료 기한
    public function getUserAccessTokenExpires() {
        return $this->_userAccessTokenExpires;
    }

    // 인증 권한 URL 세팅
    private function _setAuthorizationUrl() {
        $getVars = array( 
            'app_id' => $this->_appId,
            'redirect_uri' => $this->_redirectUrl,
            'scope' => 'user_profile,user_media',
            'response_type' => 'code'
        );

        // create url
        $this->authorizationUrl = $this->_apiBaseUrl . 'oauth/authorize?' . http_build_query( $getVars );
    }

    // 인스타그램 Access Token 호출
    private function _setUserInstagramAccessToken( $params ) {
        if ( $params['access_token'] ) { // we have an access token
            $this->_userAccessToken = $params['access_token'];
            $this->hasUserAccessToken = true;
            $this->userId = $params['user_id'];
        } elseif ( $params['get_code'] ) { // try and get an access token
            $userAccessTokenResponse = $this->_getUserAccessToken();
            $this->_userAccessToken = $userAccessTokenResponse['access_token'];
            $this->hasUserAccessToken = true;
            $this->userId = $userAccessTokenResponse['user_id'];

            // get long lived access token
            $longLivedAccessTokenResponse = $this->_getLongLivedUserAccessToken();
            $this->_userAccessToken = $longLivedAccessTokenResponse['access_token'];
            $this->_userAccessTokenExpires = $longLivedAccessTokenResponse['expires_in'];
        }
    }

    // Access Token 호출
    private function _getUserAccessToken() {
        $params = array(
            'endpoint_url' => $this->_apiBaseUrl . 'oauth/access_token',
            'type' => 'POST',
            'url_params' => array(
                 'app_id' => $this->_appId,
                 'app_secret' => $this->_appSecret,
                 'grant_type' => 'authorization_code',
                 'redirect_uri' => $this->_redirectUrl,
                 'code' => $this->_getCode
            )
        );

        $response = $this->_makeApiCall( $params );
        return $response;
    }

    private function _getLongLivedUserAccessToken() {
        $params = array(
        'endpoint_url' => $this->_graphBaseUrl . 'access_token',
        'type' => 'GET',
            'url_params' => array(
             'client_secret' => $this->_appSecret,
             'grant_type' => 'ig_exchange_token',
            )
        );

        $response = $this->_makeApiCall( $params );
        return $response;
    }

    // 인스타그램 게시물 가져오기
    public function getUsersMedia() {
        $params = array(
            'endpoint_url' => $this->_graphBaseUrl . $this->userId . '/media',
            'type' => 'GET',
            'url_params' => array(
                'fields' => 'id,caption,media_type,media_url,permalink',
            )
        );

        $response = $this->_makeApiCall( $params );
        return $response;
    }

    // API 호출
    private function _makeApiCall( $params ) {
        $ch = curl_init();

        $endpoint = $params['endpoint_url'];

        if ( 'POST' == $params['type'] ) { // post request
            curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $params['url_params'] ) );
            curl_setopt( $ch, CURLOPT_POST, 1 );
//        } elseif ( 'GET' == $params['type'] && !$params['url_params']['paging'] ) { // get request
        } elseif ( 'GET' == $params['type']) { // get request
            $params['url_params']['access_token'] = $this->_userAccessToken;

            //add params to endpoint
            $endpoint .= '?' . http_build_query( $params['url_params'] );
        }

        // general curl options
        curl_setopt( $ch, CURLOPT_URL, $endpoint );

        curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

        $response = curl_exec( $ch );
//echo $response;
        curl_close( $ch );

        $responseArray = json_decode( $response, true );

        if ( isset( $responseArray['error_type'] ) ) {
            var_dump( $responseArray );
            die();
        } else {
            return $responseArray;
        }
    }
}