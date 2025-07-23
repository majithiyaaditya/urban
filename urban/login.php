<?php
session_start();
include "db.php";
$message = "";
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $message = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style/form.css">
</head>
<body>
<div class="form-container">
    <h2>Login</h2>
    <?php if ($message): ?>
        <div class="message"> <?= $message ?> </div>
    <?php endif; ?>
    <form method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required placeholder="Enter your username">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required placeholder="Enter your password">
        <button type="submit" name="login">Login</button>
    </form>
    <div class="link-area">
        Don't have an account? <a href="register.php">Register</a>
    </div>
</div>
</body>
</html>
