<?php
require 'config.php';
require 'db.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    header('Location: ' . BASE_URL . 'login.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM courses");
$stmt->execute();
$courses = $stmt->fetchAll();

require 'views/courses.php';
?>
