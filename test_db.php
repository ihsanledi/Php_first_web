<?php
require 'db.php'; // Pastikan path ke db.php benar

#menselect semua user yang ada
$stmt = $pdo->prepare("SELECT * FROM users");
$stmt->execute(); // Tidak perlu parameter di sini karena kita mengambil semua data
$users = $stmt->fetchAll(); // Mengambil semua hasil



// Menampilkan hasil
foreach ($users as $user) {
    echo 'ID: ' . $user['user_id'] . '<br>';
    echo 'Username: ' . $user['username'] . '<br>';
    echo 'Email: ' . $user['email'] . '<br>';
    echo 'First Name: ' . $user['first_name'] . '<br>';
    echo 'Last Name: ' . $user['last_name'] . '<br>';
    echo 'Role: ' . $user['role'] . '<br>';
    echo 'Created At: ' . $user['created_at'] . '<br><br>';
}



#Melihat Informasi Pengguna dengan Tugas yang Belum Dikumpulkanegya
try { $stmt = $pdo->prepare('SELECT u.user_id, u.username, u.email FROM users u WHERE u.user_id IN ( SELECT e.student_id FROM enrollments e WHERE e.course_id = 1 -- Ganti 1 dengan ID kursus yang relevan
 AND e.student_id NOT IN ( SELECT s.student_id FROM submissions s WHERE s.assignment_id = 1 -- Ganti 1 dengan ID tugas yang relevan 
 ) );'); $stmt->execute(); $users = $stmt->fetchAll(PDO::FETCH_ASSOC); // Mengambil semua hasil sebagai array asosiatif 
 
 // Memastikan bahwa hasil tidak kosong 
 if ($users) { 
    // Menampilkan semua hasil baris 
    foreach ($users as $user) 
    { echo 'ID: ' . $user['user_id'] . '<br>'; 
    echo 'Username: ' . $user['username'] . '<br>'; 
    echo 'Email: ' . $user['email'] . '<br>'; 
    } } else { echo 'No users found.'; } }
     catch (PDOException $e) 
     { echo 'Error: ' . $e->getMessage(); } 