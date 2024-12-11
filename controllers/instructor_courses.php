<?php
require 'config.php';
require 'db.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'instructor') {
    // Jika bukan instruktur, arahkan kembali ke halaman utama atau login
    header('Location: ' . BASE_URL . 'login');
    exit();
}

$instructor_id = $_SESSION['user_id'];

// Query untuk mengambil kursus yang dikelola oleh instruktur
$stmt = $pdo->prepare("SELECT course_id, title, description, image_course FROM courses WHERE instructor_id = ?");
$stmt->execute([$instructor_id]);
$courses = $stmt->fetchAll();

require 'views/instructor_courses.php';
