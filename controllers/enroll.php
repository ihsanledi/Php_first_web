<?php
require 'config.php';
require 'db.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    // Jika bukan siswa, arahkan kembali ke halaman utama atau login
    header('Location: ' . BASE_URL);
    exit();
}

$student_id = $_SESSION['user_id'];

if (!isset($_GET['course_id'])) {
    header('Location: ' . BASE_URL);
    exit();
}

$course_id = $_GET['course_id'];

// Ambil detail kursus
$stmt = $pdo->prepare("SELECT * FROM courses WHERE course_id = ?");
$stmt->execute([$course_id]);
$course = $stmt->fetch();

if (!$course) {
    header('Location: ' . BASE_URL);
    exit();
}

// Proses pendaftaran kursus
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $enrollment_key = $_POST['enrollment_key'];
    
    // Periksa apakah kunci pendaftaran cocok
    if ($enrollment_key === $course['enrollment_key']) {
        $stmt = $pdo->prepare("INSERT INTO enrollments (student_id, course_id) VALUES (?, ?)");
        $stmt->execute([$student_id, $course_id]);

        // Redirect ke halaman detail kursus setelah berhasil mendaftar
        header('Location: Detail_course?course_id=' . $course_id);
        exit();
    } else {
        $error_message = "Invalid enrollment key.";
    }
}

require 'views/enroll.php';
