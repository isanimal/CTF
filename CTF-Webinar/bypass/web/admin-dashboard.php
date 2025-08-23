<?php
// Sembunyikan warning dan notice agar user tidak melihat error
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
ini_set('display_errors', 0);
?>
<!-- comment: ini adalah dashboard admin, bukan user -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - CTF Bypass Admin Dashboard</title>
  <style>
    body { background-color: #001f3f; color: white; font-family: sans-serif; text-align: center; padding: 50px; }
    .container { background: #003366; padding: 20px; border-radius: 10px; display: inline-block; }
    a, h1, h2 { color: #7FDBFF; }
  </style>
</head>
<body>
  <div class="container">
    <h1>Admin Dashboard</h1>
    <p>Selamat datang di dashboard admin. Hanya admin yang bisa mengakses halaman ini.</p>
    <p><a href="flag.php">Get the Flag</a></p>
  </div>
</body>
</html>