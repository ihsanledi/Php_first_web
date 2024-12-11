<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enroll in Course</title>
    <link rel="stylesheet" href="./static/css/bootstrap.min.css">
    <style>
        body{
            overflow-x:hidden;
        }
    </style>
</head>
<body>
    <?php include 'controllers/header.php'; ?>
    <div class="container">
        <h1>Enroll in <?= htmlspecialchars($course['title']) ?></h1>
        <p><?= htmlspecialchars($course['description']) ?></p>
        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger"><?= $error_message ?></div>
        <?php endif; ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="enrollment_key">Enrollment Key</label>
                <input type="text" name="enrollment_key" id="enrollment_key" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-top:3vh;">Enroll</button>
        </form>
    </div>
</body>
</html>
