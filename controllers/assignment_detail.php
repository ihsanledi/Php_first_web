<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require 'config.php';
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ' . BASE_URL . 'login');
    exit();
}

$assignment_id = $_GET['assignment_id'];
$lesson_id = $_GET['lesson_id'];
$user_id = $_SESSION['user_id'];
$user_role = $_SESSION['role'];

// Ambil detail assignment
$stmt = $pdo->prepare("SELECT * FROM assignments WHERE assignment_id = ?");
$stmt->execute([$assignment_id]);
$assignment = $stmt->fetch();

if (!$assignment) {
    // Jika assignment tidak ditemukan, arahkan kembali ke halaman utama
    header('Location: ' . BASE_URL);
    exit();
}

if ($user_role === 'student') {
    // Query untuk memeriksa apakah siswa sudah mengirimkan tugas
    $stmt = $pdo->prepare("SELECT * FROM submissions WHERE assignment_id = ? AND student_id = ?");
    $stmt->execute([$assignment_id, $user_id]);
    $submission = $stmt->fetch();

    // Proses upload file jika belum mengirimkan
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['assignment_file']) && !$submission) {
        $file = $_FILES['assignment_file'];
        $upload_dir = 'uploads/';
        $file_path = $upload_dir . basename($file['name']);

        // Pindahkan file yang diunggah ke direktori tujuan
        if (move_uploaded_file($file['tmp_name'], $file_path)) {
            // Simpan informasi pengumpulan tugas ke database
            $stmt = $pdo->prepare("INSERT INTO submissions (assignment_id, student_id, file_path) VALUES (?, ?, ?)");
            $stmt->execute([$assignment_id, $user_id, $file_path]);
            $success_message = "File successfully uploaded!";
        } else {
            $error_message = "Error uploading file.";
        }
    }
} elseif ($user_role === 'instructor') {
    // Query untuk mengambil daftar submission terkait assignment ini
    $stmt_submissions = $pdo->prepare("SELECT s.submission_id, s.file_path, s.submitted_at, u.username 
        FROM submissions s 
        JOIN users u ON s.student_id = u.user_id 
        WHERE s.assignment_id = ?
    ");
    $stmt_submissions->execute([$assignment_id]);
    $submissions = $stmt_submissions->fetchAll();
}

require 'views/assignment_detail.php';
?>
