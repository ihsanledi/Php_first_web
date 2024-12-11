<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Courses - <?php echo APP_NAME; ?></title>
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

<?php include 'controllers/header.php' ?>

<h1>Your Courses</h1>

<div class="container mt-4">
    <div class="row">
        <?php foreach ($courses as $course): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="data:image/jpeg;base64,<?= base64_encode($course['image_course']) ?>" class="card-img-top" alt="Course Image">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($course['title']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($course['description']) ?></p>
                        <a href="<?= BASE_URL . 'Detail_course?course_id=' . $course['course_id']; ?>" class="btn btn-primary course-link" style="margin-top:-4vh;">View Details</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
