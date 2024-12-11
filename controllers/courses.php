<?php
require 'config.php';
require 'db.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header('Location: ' . BASE_URL . 'login');
    exit();
}

$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['role'];

// Periksa apakah pengguna adalah student atau instructor
if ($user_role !== 'student' && $user_role !== 'instructor') {
    // Jika peran tidak cocok, arahkan ke halaman lain atau tampilkan pesan kesalahan
    echo "Access denied.";
    exit();
}

$stmt = $pdo->prepare("SELECT course_id, title, description, image_course FROM courses"); 
$stmt->execute(); 
$courses = $stmt->fetchAll();

$is_logged_in = isset($_SESSION['user_id']);

require 'views/courses.php';
?>
