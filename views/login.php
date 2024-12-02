<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - <?php echo APP_NAME; ?></title>
</head>
<body>
    <h1>Login to Your Account</h1>
    <form method="post" action="login">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
