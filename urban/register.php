<?php
include "db.php";
$message = "";
if (isset($_POST['register'])) {

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $check_user = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    $check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    
    if (mysqli_num_rows($check_user) > 0) {
        $message = "Username already exists!";
    } elseif (mysqli_num_rows($check_email) > 0) {
        $message = "Email already registered!";
    } else {
        mysqli_query($conn, "INSERT INTO users (full_name, email, phone, username, password) VALUES ('$full_name', '$email', '$phone', '$username', '$password')");
        $message = "Registration successful! <a href='login.php'>Login here</a>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="style/form.css">
</head>
<body>
<div class="form-container">
    <h2>Create Account</h2>
    <?php if ($message): ?>
        <div class="message<?= strpos($message, 'successful') !== false ? ' success' : '' ?>"><?= $message ?></div>
    <?php endif; ?>
    <form method="post">
        <label for="full_name">Full Name</label>
        <input type="text" id="full_name" name="full_name" required placeholder="Enter your full name">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required placeholder="Enter your email address">
        <label for="phone">Phone Number</label>
        <input type="text" id="phone" name="phone" required placeholder="Enter your phone number">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required placeholder="Choose a username">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required placeholder="Create a password">
        <button type="submit" name="register">Register</button>
    </form>
    <div class="link-area">
        Already have an account? <a href="login.php">Login</a>
    </div>
</div>
</body>
</html>
