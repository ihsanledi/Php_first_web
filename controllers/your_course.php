<?php
require 'config.php';
require 'db.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    // Jika bukan siswa, arahkan kembali ke halaman utama atau login
    header('Location: ' . BASE_URL . 'login');
    exit();
}

$student_id = $_SESSION['user_id'];

// Query untuk mengambil kursus yang diikuti oleh siswa
$stmt = $pdo->prepare("
    SELECT c.course_id, c.title, c.description, c.image_course 
    FROM courses c
    JOIN enrollments e ON c.course_id = e.course_id
    WHERE e.student_id = ?
");
$stmt->execute([$student_id]);
$courses = $stmt->fetchAll();

require 'views/your_course.php';
