<?php
    // Include FB config file
    require_once ('modules/fb-config.php');

    // Remove access token from session
    unset($_SESSION['fb_access_token']);

    // Remove user data from session
    unset($_SESSION['userData']);

    session_destroy();

    // Redirect to the homepage
   header("Location:./");
?>