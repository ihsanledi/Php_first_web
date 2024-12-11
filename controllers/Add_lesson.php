<?php
require 'config.php';
require 'db.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_id = $_POST['course_id'];
    $lesson_title = $_POST['lesson_title'];
    $lesson_content = $_POST['lesson_content'];

    // Periksa apakah pengguna adalah instruktur dari kursus ini
    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['role'];

    if ($user_role !== 'instructor') {
        // Pengguna bukan instruktur
        header('Location: ' . BASE_URL . 'courses');
        exit();
    }

    // Tambahkan lesson baru ke database
    $stmt = $pdo->prepare("INSERT INTO lessons (course_id, title, content) VALUES (?, ?, ?)");
    $stmt->execute([$course_id, $lesson_title, $lesson_content]);

    // Redirect kembali ke halaman detail kursus
    header('Location: Detail_course?course_id=' . $course_id);
    exit();
}
?>
