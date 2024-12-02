<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Courses - <?php echo APP_NAME; ?></title>
</head>
<body>
    <h1>All Courses</h1>
    <ul>
        <?php foreach ($courses as $course): ?>
        <li>
            <a href="<?php echo BASE_URL . 'course?id=' . $course['course_id']; ?>">
                <?php echo $course['title']; ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
    <a href="<?php echo BASE_URL . 'logout'; ?>">Logout</a>
</body>
</html>
