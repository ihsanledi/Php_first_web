<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!defined('BASE_DIR')) {
    define('BASE_DIR', __DIR__);
}

require 'config.php'; // Pastikan config.php berisi koneksi PDO ke database
require 'db.php'; // Atau langsung buat koneksi baru di sini

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $instructor_id = $_POST['instructor_id'];
    $enrollment_key = $_POST['enrollment_key'];
    $image_course = $_FILES['image_course']['tmp_name'];

    $imgData = file_get_contents($image_course);

    $stmt = $pdo->prepare("INSERT INTO courses (title, description, instructor_id, image_course, enrollment_key) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$title, $description, $instructor_id, $imgData, $enrollment_key]);

    $_SESSION['message'] = "Course successfully added.";
    header('Location: ' . BASE_URL . 'add_course');
    exit();
} else {
    require 'views/Add_Course.php';
}
?>
