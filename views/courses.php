<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Courses - <?php echo APP_NAME; ?></title>
    <link rel="stylesheet" href="./static/css/bootstrap.min.css">

<style> 
.card { 
    width: 18rem; /* Mengatur lebar kartu */ 
    height: 24rem; /* Mengatur tinggi kartu */ 
    border-radius: 20px; /* Mengatur border-radius */ 
    } 
.card-img-top { 
    width: 100%; /* Mengatur lebar gambar */ 
    height: 12rem; /* Mengatur tinggi gambar */ 
    object-fit: cover; /* Menjaga proporsi gambar */ 
    } 
.card-text { 
    height: 6rem; /* Mengatur tinggi deskripsi */ 
    overflow: hidden; /* Menyembunyikan teks yang melebihi batas */ 
    text-overflow: ellipsis; /* Menambahkan elipsis di akhir teks */ 
    display: -webkit-box; 
    -webkit-line-clamp: 3; /* Membatasi jumlah baris teks */ 
    -webkit-box-orient: vertical; 
    } 

    
        body{
            overflow-x:hidden;
        }
    
</style>


</head>
<body>
    <?php include 'controllers/header.php'?>
    
    



    <div class=" containerCourseContent">
    <h1>All Courses</h1><br><br>
    <div class="container card_content"> 
    <div class="row g-5"> 
    <?php foreach ($courses as $course): ?>
    <div class="col-md-3 ">
        <div class="card cardItem" style="width: 18rem; border-radius:20px;">
            <!-- Pengecekan jika image_course tidak kosong -->
            <?php if (!empty($course['image_course'])): ?>
                <img src="data:image/jpeg;base64,<?= base64_encode($course['image_course']) ?>" class="card-img-top" alt="Course Image">
            <?php else: ?>
                <img src="static/assets/image/loading.jpeg" class="card-img-top" alt="Default Course Image">
            <?php endif; ?>
            <div class="card-body">
                <p class="card-text"><?= htmlspecialchars($course['description']) ?></p>
                <a href="<?= BASE_URL . 'Detail_course?course_id=' . $course['course_id']; ?>" class="btn btn-primary course-link">View Details</a>            </div>
        </div>
    </div>
<?php endforeach; ?>

    </div> 
</div>

    </div>



    <?php include 'footer.php'?>

</body>
</html>
