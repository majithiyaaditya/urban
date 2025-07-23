<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<h2>Welcome, <?= $_SESSION['username'] ?>!</h2>
<p>This is your dashboard.</p>
<a href="logout.php">Logout</a>
