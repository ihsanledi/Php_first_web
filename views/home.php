<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> - <?php echo APP_NAME; ?></title>
    <link rel="stylesheet" href="./static/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/home.css">
    <link rel="stylesheet" href="static/footer.css">

    
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
    border-radius:20px;
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
  
   
    <div class=" text-bg-dark img-fluid  gambarHome ">
        <h1 class='text-banner'>Get knowledge <br> <b style='color: ghostwhite;'> everywhere</b></h1> 
    </div>

    <div class="container mt-4 teks-container">
    <h1 class="display-4"><b> Selamat Datang di Learn Nest!</b></h1>
    <br>
    <h4 class="display-7">"Tempat Terbaik untuk Mengembangkan Pengetahuan dan Keterampilan Anda"<br><br>

        Belajar Tanpa Batas Di Learn Nest, kami percaya bahwa setiap orang memiliki potensi untuk tumbuh dan berkembang. Kami menawarkan berbagai kursus yang dirancang untuk membantu Anda mencapai tujuan pribadi dan profesional.</h4>

    <br><br>
    </div>






    <div class=" containerCourseContent">
    <h1>Temukan Kursus yang cocok dengan anda:</h1><br><br>
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


    



    <div class='container  mt-4  contentHome'>
        

    <h1 class="display-4">Kenapa Belajar di Learn Nest?</h1>
    <br>
    <ul class="display-6 ">
        <li class="teks-list"><b>Kursus Berkualitas:</b> Kami menyediakan kursus yang diajarkan oleh instruktur berpengalaman dan ahli di bidangnya.</li>
        <li class="teks-list"><b>Fleksibilitas:</b> Belajar kapan saja, di mana saja dengan akses 24/7 ke semua materi kursus.</li>
        <li class="teks-list"><b>Komunitas Pendukung:</b> Bergabunglah dengan komunitas pembelajar yang saling mendukung dan berbagi pengetahuan.</li>
    </ul>
    </div>





    <?php include 'footer.php'?>


    


<script> document.addEventListener('DOMContentLoaded', function () {
    var isLoggedIn = <?= json_encode($is_logged_in); ?>;
    var courseLinks = document.querySelectorAll('.course-link');
    
    courseLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            if (!isLoggedIn) {
                event.preventDefault();
                alert('Anda harus login terlebih dahulu untuk melihat detail kursus.');
                window.location.href = 'login';
            }
        });
    });
});
</script>
    </body>
    </html>