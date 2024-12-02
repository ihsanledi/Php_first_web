<?php
require 'db.php';

// Detail pengguna baru
$username = 'jonathan';
$password = 'sandi1';
$email = 'jonathan@example.com';
$first_name = 'John';
$last_name = 'nathan';

// Hash password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Tambahkan pengguna baru ke database
$stmt = $pdo->prepare("INSERT INTO users (username, password, email, first_name, last_name, role) VALUES (?, ?, ?, ?, ?, 'student')");
$stmt->execute([$username, $hashed_password, $email, $first_name, $last_name]);

echo "User added successfully with hashed password.";
?>
