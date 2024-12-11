<?php
require 'db.php';

// Detail pengguna baru
$username = 'pratama';
$password = 'ihsan123';
$email = 'pratama@gmail.com';
$first_name = 'pratama';
$last_name = 'ledi';

// Hash password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Tambahkan pengguna baru ke database
$stmt = $pdo->prepare("INSERT INTO users (username, password, email, first_name, last_name, role) VALUES (?, ?, ?, ?, ?, 'instructor')");
$stmt->execute([$username, $hashed_password, $email, $first_name, $last_name]);

echo "User added successfully with hashed password.";
?>
