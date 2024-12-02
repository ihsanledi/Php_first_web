<?php
require '../db.php'; // Path ke file db.php

$course_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

try {
    $stmt = $pdo->prepare("SELECT * FROM courses WHERE course_id = ?");
    $stmt->execute([$course_id]);
    $course = $stmt->fetch(PDO::FETCH_ASSOC); // Mengambil hasil sebagai array asosiatif

    if ($course) {
        $_SESSION['course'] = $course;
        header('Location: ../views/Detail_course.php');
    } else {
        header('Location: ../views/404.php'); // Redirect ke halaman 404 jika kursus tidak ditemukan
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
