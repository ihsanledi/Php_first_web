<?php
    require '../config.php';
    require '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    // Simpan pengguna baru
    $stmt = $pdo->prepare("INSERT INTO users (username, password, email, first_name, last_name, role) VALUES (?, ?, ?, ?, ?, 'student')");
    $stmt->execute([$username, $password, $email, $first_name, $last_name]);

    header('Location: ' . BASE_URL . 'login');
} else {
    require 'views/register.php';
}
?>
