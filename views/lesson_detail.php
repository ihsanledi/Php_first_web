<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lesson Detail</title>
    <link rel="stylesheet" href="./static/css/bootstrap.min.css">
    <style>
        body, html { 
            height: 100%; 
            margin: 0; 
            display: flex; 
            flex-direction: column;         
            overflow-x:hidden;
        

        } 
        .content {
            flex-grow: 1;
        } 
        .footer { 
            height: 20vh; 
            background-color: black; 
            padding-top: 2%; 
            margin-top: 10vh; 
            color: white; 
        } 
        .footer_content h4, 
        .footer_content h5 { 
            color: rgba(255, 255, 255, 0.5); 
        }
    </style>
</head>
<body>
    <?php include 'controllers/header.php'; ?>
    <div class="container">
        <h1><?= htmlspecialchars($lesson['title']) ?></h1>
        <p><?= htmlspecialchars($lesson['content']) ?></p>

        <h2>Assignments</h2>
        <ul class="list-group">
            <?php foreach ($assignments as $assignment): ?>
                <li class="list-group-item">
                    <a href="assignment_detail?assignment_id=<?= $assignment['assignment_id'] ?>&lesson_id=<?= $lesson_id ?>"><?= htmlspecialchars($assignment['title']) ?></a>
                </li>
            <?php endforeach; ?>
        </ul>

        <?php if ($user_role === 'instructor' && $lesson['course_id'] == $course_id): ?>
            <h2>Add Assignment</h2>
            <form action="Add_assignment" method="post">
                <input type="hidden" name="lesson_id" value="<?= $lesson_id ?>">
                <input type="hidden" name="course_id" value="<?= $course_id ?>">
                <div class="form-group">
                    <label for="assignment_title">Assignment Title:</label>
                    <input type="text" name="assignment_title" id="assignment_title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="assignment_description">Assignment Description:</label>
                    <textarea name="assignment_description" id="assignment_description" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="due_date">Due Date:</label>
                    <input type="date" name="due_date" id="due_date" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Assignment</button>
            </form>
        <?php endif; ?>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
