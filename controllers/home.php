<?php


require 'config.php'; // Pastikan config.php berisi koneksi PDO ke database 
require 'db.php'; // Atau langsung buat koneksi baru di sini 

// Set batas jumlah kartu 
$limit = 8; // Ganti sesuai kebutuhan Anda 

// Query untuk mengambil data dari tabel course 
$stmt = $pdo->prepare("SELECT course_id,description, image_course FROM courses limit $limit"); 
$stmt->execute(); 
$courses = $stmt->fetchAll();

$is_logged_in = isset($_SESSION['user_id']);

require 'views/home.php';
?>
