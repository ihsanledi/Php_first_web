<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course Details - <?php echo htmlspecialchars($course['title']); ?> - <?php echo APP_NAME; ?></title>
    <link rel="stylesheet" href="./static/css/bootstrap.min.css">
    <style>
        body{
            overflow-x:hidden;
        }
    </style>
</head>
<body>
    <?php include 'controllers/header.php' ?>

    <div class="container mt-4">
        <h1><?php echo htmlspecialchars($course['title']); ?></h1>
        <p><?php echo htmlspecialchars($course['description']); ?></p>

        <h2>Lessons</h2>
        <ul>
            <?php foreach ($lessons as $lesson): ?>
                <li><a href="lesson_detail?lesson_id=<?= $lesson['lesson_id'] ?>&course_id=<?= $course['course_id'] ?>"><?php echo htmlspecialchars($lesson['title']); ?></a></li>
            <?php endforeach; ?>
        </ul>

        <?php if ($user_role === 'instructor' && $course['instructor_id'] == $user_id): ?>
            <h2>Add Lesson</h2>
            <form action="Add_lesson" method="post">
                <input type="hidden" name="course_id" value="<?php echo $course['course_id']; ?>">
                <div class="form-group">
                    <label for="lesson_title">Lesson Title:</label>
                    <input type="text" name="lesson_title" id="lesson_title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="lesson_content">Lesson Content:</label>
                    <textarea name="lesson_content" id="lesson_content" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Lesson</button>
            </form>
        <?php endif; ?>
    </div>

    <?php include 'footer.php' ?>
</body>
</html>
