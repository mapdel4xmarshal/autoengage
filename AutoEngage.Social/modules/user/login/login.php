<?php
 
    require_once (__DIR__ .'/../../fb-config.php');

    $permissions = ['email']; // Optional permissions
    $loginUrl = $helper->getLoginUrl($redirectURL, $fbPermissions);

    echo $loginUrl;
?>