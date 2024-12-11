<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - <?php echo APP_NAME; ?></title>
    <link rel="stylesheet" href="./static/css/bootstrap.min.css">
    <link rel="stylesheet" href="./static/Login.css">
    <style>
        body{
            overflow-x:hidden;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo BASE_URL; ?>">LEARN NEST</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Courses">Courses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="your_course">Your Course</a>
        </li>
      </ul>

      <a href="<?php echo BASE_URL . 'register'; ?>" class="btn btn-primary" style='margin-left:65vw;'>Register</a>

    </div>
  </div>
</nav>

<div class="formContainer">



    <form class="row g-2 formLogin" action='login' method='post'>
        <div class='row col-md-8 text-form text-form'>
            <h3>Welcome Back!</h3>
            <br>
            <h4>Please Login to your Account</h4>
        </div>

        <div class="row justify-content-center Content">
            <div class="col-md-9 g-1">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name='email' placeholder='Masukan Email Anda'>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
        </div>

        <div class="row justify-content-center Content">
            <div class="col-md-9 g-1">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name='password' placeholder='Masukkan Sandi Anda'>
                <br>
            </div>
        </div>

        <div class="row justify-content-center Content">
            <div class="col-md-9 g-1">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>


    
</div>

<?php include 'footer.php'?>
</body>
</html>
