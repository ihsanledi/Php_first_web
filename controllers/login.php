<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!defined('BASE_DIR')) {
    define('BASE_DIR', __DIR__);
}

require 'config.php';
require 'db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Ambil pengguna dari database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // Verifikasi password
    if ($user && password_verify($password, $user['password'])) {
        // Login berhasil
        $_SESSION['user'] = $user;
        header('Location: ' . BASE_URL . 'courses');
    } else {
        // Login gagal
        echo "Invalid username or password.";
    }
} else {
    require BASE_DIR . '/views/login.php';
}
?>
