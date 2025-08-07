<!DOCTYPE html>
<html>
<head>
    <title>Payroll CTF A04-01</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php
require_once 'config/db.php';
$users = $conn->query("SELECT id, username FROM users WHERE role = 'karyawan'");
$firstUser = $conn->query("SELECT id FROM users WHERE role = 'karyawan' ORDER BY id ASC LIMIT 1")->fetch_assoc();
?>
<div class="container">
    <h2>Selamat Datang</h2>
    <p>Ini adalah dashboard Untuk melihat Payroll Silahkan Login.</p>
    <p><a href="login.php">Login</a></p>
</div>
</body>
</html>
