<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - <?php echo APP_NAME; ?></title>
</head>
<body>
    <h1>Create a New Account</h1>
    <form method="post" action="controllers/register.php">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" id="first_name" required>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" id="last_name" required>
        <button type="submit">Register</button>
    </form>
</body>
</html>
