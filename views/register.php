<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> - <?php echo APP_NAME; ?></title>
    <!-- <meta http-equiv="refresh" content="5"> -->
    <link rel="stylesheet" href="./static/css/bootstrap.min.css">
    <link rel="stylesheet" href="./static/register.css">
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

      <a href="<?php echo BASE_URL . 'login'; ?>" class="btn btn-primary" style='margin-left:65vw;'>Login</a>

    </div>
  </div>
</nav>

<h1>Create a New Account</h1>
<div class="formContainer" >
   
    <form method="post" action="register" class="row g-2 formRegister">

    <div class='row justify-content-center Content text-container'>   
        <div class="col-md-6  g-1">
             <h2>New User? <br>  Sign in here</h2>
        </div>
    </div>

    <div class="row justify-content-center Content content-item">
        <div class="col-md-9 g-1">
        <label for="username">Username:</label><br>
                    <input type="text"  class="form-control" name="username" id="username" required>

        </div>
   
            
    </div>
        
    
    <div class="row justify-content-center Content content-item">
        <div class="col-md-9 g-1">

            <label for="password">Password:</label><br>
            <input type="password" class="form-control" name="password" id="password" required>


        </div>

    </div>

    
    <div class="row justify-content-center Content content-item">
        <div class="col-md-9 g-1">
        <label for="email">Email:</label><br>
        <input type="email"  class="form-control" name="email" id="email" required>


        </div>
    </div>

    
    <div class="row justify-content-center Content content-item">
        <div class="col-md-9 g-1">
        <label for="first_name">First Name:</label><br>
        <input type="text"  class="form-control" name="first_name" id="first_name" required>

        </div>

    </div>
        
    <div class="row justify-content-center Content ">
        <div class="col-md-9 g-1">
        <label for="last_name">Last Name:</label><br>
        <input type="text"  class="form-control" name="last_name" id="last_name" required>

        </div>

    </div>

    <div class="row  justify-content-center Content" style='margin-bottom:5vh;'>
  <div class="col-md-3 g-5">
  <button type="submit" class='btn btn-primary'>Register</button>

</div>  
  </div>
    </form>
</div>

       <?php include 'footer.php'?>
       </body>
       </html>
