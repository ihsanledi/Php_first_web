<?php
require 'db.php'; // Menggunakan koneksi database

// Fungsi untuk mengambil pengguna berdasarkan username
function getUserByUsername($username) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return null;
    }
}

// Fungsi-fungsi lain untuk operasi database dapat ditambahkan di sini

