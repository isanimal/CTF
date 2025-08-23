<?php
session_start();
require_once 'config/db.php';
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Payroll CTF A04-01</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <h2>Dashboard</h2>
    <p>Selamat datang, <strong><?= htmlspecialchars($username) ?></strong>!</p>
    <p><a href="slip_gaji.php?id=<?= $user_id ?>">Lihat Slip Gaji Anda</a></p>
    <p><a href="logout.php">Logout</a></p>
</div>
</body>
</html>
