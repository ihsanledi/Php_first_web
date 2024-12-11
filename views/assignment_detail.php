<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Detail</title>
    <link rel="stylesheet" href="./static/css/bootstrap.min.css">
    <style> 
    body, html { 
        height: 100%; 
        margin: 0; 
        display: flex; 
        flex-direction: column; 
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

    
        body{
            overflow-x:hidden;
        }
    
    </style>    
</head>
<body>
    <?php include 'controllers/header.php'; ?>
    <div class="container">
        <h1><?= htmlspecialchars($assignment['title']) ?></h1>
        <p><?= htmlspecialchars($assignment['description']) ?></p>
        <p><strong>Due Date:</strong> <?= htmlspecialchars($assignment['due_date']) ?></p>

        <?php if ($user_role === 'student'): ?>
            <!-- Tampilkan pesan jika sudah mengirimkan tugas -->
            <?php if ($submission): ?>
                <div class="alert alert-info">You have already submitted this assignment.</div>
            <?php else: ?>
                <!-- Form untuk upload file -->
                <h2>Submit Your Assignment</h2>
                <?php if (isset($success_message)): ?>
                    <div class="alert alert-success"><?= $success_message ?></div>
                <?php elseif (isset($error_message)): ?>
                    <div class="alert alert-danger"><?= $error_message ?></div>
                <?php endif; ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="assignment_file">Upload File:</label>
                        <input type="file" name="assignment_file" id="assignment_file" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            <?php endif; ?>
        <?php elseif ($user_role === 'instructor'): ?>
            <!-- Daftar submission untuk instruktur -->
            <h2>Submissions</h2>
            <?php if (count($submissions) > 0): ?>
                <ul class="list-group">
                    <?php foreach ($submissions as $submission): ?>
                        <li class="list-group-item">
                            <strong><?php echo htmlspecialchars($submission['username']); ?></strong>
                            <br>
                            Submitted at: <?php echo htmlspecialchars($submission['submitted_at']); ?>
                            <br>
                            <a href="<?php echo htmlspecialchars($submission['file_path']); ?>" download>Download File</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No submissions yet.</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
