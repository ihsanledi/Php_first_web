<?php
    require 'config.php';
    require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];


    
    // Simpan pengguna baru
// Cek apakah username sudah ada
$checkStmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = ? OR email = ?"); 
$checkStmt->execute([$username, $email]); 
$userExists = $checkStmt->fetchColumn();

if ($userExists) {
    
    require 'views/akun_sudah_ada.php';

}
    else {
    $stmt = $pdo->prepare("INSERT INTO users (username, password, email, first_name, last_name, role) VALUES (?, ?, ?, ?, ?, 'student')");
    $stmt->execute([$username, $password, $email, $first_name, $last_name]);
    echo "Akun berhasil ditambahkan.";

    header('Location: ' . BASE_URL . 'login');
}



} else {

    require 'views/register.php';
}
?>
