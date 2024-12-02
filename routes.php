<?php
require 'db.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'home':
        require 'controllers/home.php';
        break;
    case 'courses':
        require 'controllers/courses.php';
        break;
    case 'login':
        require 'controllers/login.php';
        break;
    case 'register':
        require 'controllers/register.php';
        break;
    case 'add':
        require '/add_user.php';
        break;
    case 'logout':
        require 'controllers/logout.php';
        break;
    // Tambahkan routing lain sesuai kebutuhan
    default:
        require 'views/404.php';
        break;
}
?>
