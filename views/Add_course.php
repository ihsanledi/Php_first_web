<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./static/css/bootstrap.min.css">
    <link rel="stylesheet" href="./static/add_course.css">
    <title> - <?php echo APP_NAME; ?></title>
    <style>
        .inputan_teks{
            margin-bottom:3vh;
        }

        
        body{
            overflow-x:hidden;
        }
    
    </style>
</head>
<body>
<?php include 'controllers/header.php' ?>

<h1>Add New Course</h1>
<?php
if (isset($_SESSION['message'])) {
    echo "<p>" . $_SESSION['message'] . "</p>";
    unset($_SESSION['message']); // Hapus pesan setelah ditampilkan
}
?>

<div class="formContainer" >
    <form class="row g-2 formAddCourse" action="Add_Course" method="post" enctype="multipart/form-data">
        <div class='row col-md-10 g-1 justify-content-center content teks-content' style="margin-left:5vw;">
            <h4>Masukkan detail Course</h4>
        </div>

        <div class="row justify-content-center Content">
            <div class="col-md-9 g-1">
                <label for="title">Course Title:</label>
                <br>
                <input type="text" name="title" id="title" class='inputan_teks' required>
                <br>
            </div>
        </div>

        <div class="row justify-content-center Content">
            <div class="col-md-9 g-1">
                <label for="description">Description:</label>
                <br>
                <textarea name="description" id="description" required></textarea>
                <br>
            </div>
        </div>

        <div class="row justify-content-center Content">
            <div class="col-md-9 g-3" style='margin-left: -3%;'>
                <label for="instructor_id">Instructor ID:</label>
                <br>
                <input type="number" name="instructor_id" id="instructor_id" class='inputan_teks' required>
                <br>
            </div>
        </div>

        <div class="row justify-content-center Content">
            <div class="col-md-9 g-1">
                <label for="image_course">Upload Course Image:</label>
                <input type="file" name="image_course" id="image_course" required>
                <br>
            </div>
        </div>

        <div class="row justify-content-center Content">
            <div class="col-md-9 g-1">
                <label for="enrollment_key">Enrollment Key:</label>
                <input type="text" name="enrollment_key" id="enrollment_key" class='inputan_teks' required>
                <br>
            </div>
        </div>

        <div class="row justify-content-center Content">
            <div class="col-md-9 g-1">
                <button type="submit">Add Course</button>
            </div>
        </div>
    </form>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
