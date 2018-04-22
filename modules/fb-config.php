<?php
if(!session_id()){
    session_start();
}

// Include the autoloader provided in the SDK
require_once (__DIR__ .'/../resources/Facebook/autoload.php');

// Include required libraries
//use Facebook\Facebook;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\FacebookRequest;

/*
 * Configuration and setup Facebook SDK
 */
$appid = '340777723022258';
$appSecret = 'e5a9fcb969acad32b870a46f26f114ee';
$redirectURL   = 'http://localhost/autoengage.social/modules/user/login/autoengage-cb.php'; //Callback URL
$fbPermissions = array('email','user_location','manage_pages','read_insights');  //Optional permissions

$fb = new Facebook\Facebook([
    'app_id' => $appid, // Replace {app-id} with your app id
    'app_secret' => $appSecret,
    'default_graph_version' => 'v2.4',
]);

$helper = $fb->getRedirectLoginHelper();

?>  