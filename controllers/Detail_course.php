<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require 'config.php';
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ' . BASE_URL . 'login');
    exit();
}

$course_id = $_GET['course_id'];
$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['role'];

// Periksa apakah siswa terdaftar dalam kursus
$stmt = $pdo->prepare("SELECT COUNT(*) FROM enrollments WHERE student_id = ? AND course_id = ?");
$stmt->execute([$user_id, $course_id]);
$is_enrolled = $stmt->fetchColumn();

if ($user_role === 'student' && !$is_enrolled) {
    // Jika pengguna adalah siswa dan tidak terdaftar, arahkan ke halaman enroll
    header('Location: enroll?course_id=' . $course_id);
    exit();
}

// Ambil detail kursus
$stmt = $pdo->prepare("SELECT * FROM courses WHERE course_id = ?");
$stmt->execute([$course_id]);
$course = $stmt->fetch();

if (!$course) {
    // Jika kursus tidak ditemukan, arahkan kembali ke halaman utama
    header('Location: ' . BASE_URL);
    exit();
}

// Ambil lesson dalam kursus
$stmt = $pdo->prepare("SELECT * FROM lessons WHERE course_id = ?");
$stmt->execute([$course_id]);
$lessons = $stmt->fetchAll();

require 'views/detail_course.php';
?>
