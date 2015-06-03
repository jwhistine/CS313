<?php
    // this will kill the session and guide the user back to the login page
    session_start();
    session_unset();
    session_destroy();
    header('location:login.php');
?>