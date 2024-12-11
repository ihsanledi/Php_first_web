<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - LearnNest</title>
    <link rel="stylesheet" href="./static/css/bootstrap.min.css">
    <style>
        body, html { 
            height: 100%; 
            margin: 0; 
            display: flex; 
            flex-direction: column; 
        }
        .container {
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

    <div class="container mt-5">
        <h1 class="text-center">Contact Us</h1>
        <p class="text-center">We're here to help! Fill out the form below and we'll get back to you as soon as possible.</p>
        
        <form action="submit_contact.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Send Message</button>
        </form>
    </div>
    
    <?php include 'footer.php'?>

</body>
</html>
