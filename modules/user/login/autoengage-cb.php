<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once (__DIR__ .'/../../fb-config.php');
require_once (__DIR__ .'/../user.php');
require_once (__DIR__ .'/../../page/managedpages.php');

$_SESSION['FBRLH_state']=$_GET['state'];

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (! isset($accessToken)) {
  if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Bad request';
  }
  exit;
}

// Logged in
//echo '<h3>Access Token</h3>';
//var_dump($accessToken->getValue());

// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
$tokenMetadata = $oAuth2Client->debugToken($accessToken);
//echo '<h3>Metadata</h3>';
//var_dump($tokenMetadata);

// Validation (these will throw FacebookSDKException's when they fail)
$tokenMetadata->validateAppId($appid); // Replace $appid with your app id
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
$tokenMetadata->validateExpiration();

if (! $accessToken->isLongLived()) {
  // Exchanges a short-lived access token for a long-lived one
  try {
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
  } catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
    exit;
  }

  //echo '<h3>Long-lived</h3>';
  //var_dump($accessToken->getValue());
}

$_SESSION['fb_access_token'] = (string) $accessToken;

// Set default access token to be used in script
$fb->setDefaultAccessToken($_SESSION['fb_access_token']);

// User is logged in with a long-lived access token.
// You can redirect them to a members-only page.
//var_dump($tokenMetadata); 
//Facebook helper
function fbQuery($query, $fb){
    try {
        $request = $fb->get($query);
        return json_encode();
    } catch(FacebookResponseException $e) {
        return 'Graph returned an error: ' . $e->getMessage();
        
    } catch(FacebookSDKException $e) {
        return 'Facebook SDK returned an error: ' . $e->getMessage();
    }
}

// Getting user facebook profile info and Managed pages
    try {
        $profileRequest = $fb->get('/me?fields=name,first_name,last_name,email,link,gender,locale,picture,location{location},accounts');
        $fbUserProfile = $profileRequest->getGraphNode()->asArray();
    } catch(FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        // Redirect user back to app login page
        header("Location: ./");
        exit;
    } catch(FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

// Initialize User class
    $user = new User();
    $managedPages = new ManagedPages();
    
    $loc = $fbUserProfile['location']["location"]['city'].",".$fbUserProfile['location']["location"]['state'].",".$fbUserProfile['location']["location"]['country'];
    // Insert or update user data to the database
    $fbUserData = array(
        'facebookID'    => $fbUserProfile['id'],
        'firstName'     => $fbUserProfile['first_name'],
        'lastName'      => $fbUserProfile['last_name'],
        'emailAddress'  => $fbUserProfile['email'],
        'gender'        => $fbUserProfile['gender'],
        'locale'        => $fbUserProfile['locale'],
        'picture'       => $fbUserProfile['picture']['url'],
        'link'          => $fbUserProfile['link'],
        'location'      => $loc,
        'token'         => $_SESSION['fb_access_token']
    );
    
    $userData = $user->checkUser($fbUserData);    
    // Put user data into session
    $_SESSION['userData'] = $userData;

    //Create or update user managed pages in db
    $managedPagesData = $managedPages->checkManagedPages($fbUserProfile['accounts']);
    $_SESSION['managedPagesData'] = $managedPagesData;

header('Location: ../../../');
//header("Refresh:0; url=../../../");

?>
