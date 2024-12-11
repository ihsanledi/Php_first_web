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
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Ambil pengguna dari database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Verifikasi password
    if ($user && password_verify($password, $user['password'])) {
        // Simpan informasi pengguna dan peran di sesi
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Login berhasil, arahkan sesuai dengan peran
        if ($user['role'] === 'student') {
            header('Location: ' . BASE_URL . 'Courses');
        } elseif ($user['role'] === 'instructor') {
            header('Location: ' . BASE_URL . 'instructor_courses');
        }
        exit(); // Menghentikan eksekusi setelah pengalihan
    } else {
        // Login gagal
        echo "Invalid email or password.";
    }
} else {
    require BASE_DIR . '/views/login.php';
}
