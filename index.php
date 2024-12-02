<?php
if (!defined('BASE_DIR')) {
    define('BASE_DIR', __DIR__);
}
require BASE_DIR . '/config.php';
require BASE_DIR . '/db.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Halaman yang memerlukan autentikasi
$auth_pages = ['courses', 'course'];

if (in_array($page, $auth_pages) && !isset($_SESSION['user'])) {
    header('Location: ' . BASE_URL . 'login');
    exit;
}


// Mendapatkan halaman dari URL


// Cek apakah pengguna sudah login jika halaman memerlukan autentikasi


// Menentukan file kontroler yang akan dipanggil
$controller = BASE_DIR . '/controllers/' . $page . '.php';

if (file_exists($controller)) {
    require $controller;
} else {
    require BASE_DIR . '/views/404.php';
}
?>
