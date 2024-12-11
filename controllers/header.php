<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {

    require 'views/header_Unlog.php';

   
} else {
    $user_role = $_SESSION['role'];

    if ($user_role === 'student') {
        require 'views/header_login.php';
    } elseif ($user_role === 'instructor') {
        require 'views/header_instructor_login.php';
    }
}
?>
