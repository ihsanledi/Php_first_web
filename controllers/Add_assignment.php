<?php
require 'config.php';
require 'db.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lesson_id = $_POST['lesson_id'];
    $course_id = $_POST['course_id'];
    $assignment_title = $_POST['assignment_title'];
    $assignment_description = $_POST['assignment_description'];
    $due_date = $_POST['due_date'];

    // Periksa apakah pengguna adalah instruktur
    $user_id = $_SESSION['user_id'];
    $user_role = $_SESSION['role'];

    if ($user_role !== 'instructor') {
        // Pengguna bukan instruktur
        header('Location: ' . BASE_URL . 'courses');
        exit();
    }

    // Tambahkan assignment baru ke database
    $stmt = $pdo->prepare("INSERT INTO assignments (lesson_id, course_id, title, description, due_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$lesson_id, $course_id, $assignment_title, $assignment_description, $due_date]);

    // Redirect kembali ke halaman detail lesson
    header('Location: lesson_detail?lesson_id=' . $lesson_id . '&course_id=' . $course_id);
    exit();
}
?>
