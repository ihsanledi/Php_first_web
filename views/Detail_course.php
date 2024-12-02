<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $course['title']; ?> - <?php echo APP_NAME; ?></title>
</head>
<body>
    <h1><?php echo $course['title']; ?></h1>
    <p><?php echo $course['description']; ?></p>
    <a href="<?php echo BASE_URL; ?>courses">Back to Courses</a>
</body>
</html>
