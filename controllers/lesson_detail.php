<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require 'config.php';
require 'db.php';

if (!isset($_GET['lesson_id']) || !isset($_GET['course_id'])) {
    // Jika tidak ada lesson_id atau course_id, arahkan kembali ke halaman utama
    header('Location: ' . BASE_URL);
    exit();
}

$lesson_id = $_GET['lesson_id'];
$course_id = $_GET['course_id'];

// Query untuk mengambil detail pelajaran
$stmt = $pdo->prepare("SELECT * FROM lessons WHERE lesson_id = ?");
$stmt->execute([$lesson_id]);
$lesson = $stmt->fetch();

if (!$lesson) {
    // Jika pelajaran tidak ditemukan, arahkan kembali ke halaman utama
    header('Location: ' . BASE_URL);
    exit();
}

// Query untuk mengambil daftar tugas terkait pelajaran
$stmt_assignments = $pdo->prepare("SELECT * FROM assignments WHERE lesson_id = ?");
$stmt_assignments->execute([$lesson_id]);
$assignments = $stmt_assignments->fetchAll();

$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['role'];

require 'views/lesson_detail.php';
?>
