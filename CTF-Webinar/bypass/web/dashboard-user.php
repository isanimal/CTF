<?php
// Sembunyikan warning dan notice agar user tidak melihat error
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Dashboard - CTF Bypass Admin Dashboard</title>
  <style>
    body { background-color: #001f3f; color: white; font-family: sans-serif; text-align: center; padding: 50px; }
    .container { background: #003366; padding: 20px; border-radius: 10px; display: inline-block; }
    a, h1, h2 { color: #7FDBFF; }
  </style>
</head>
<body>
  <div class="container">
    <h1>User Dashboard</h1>
    <!-- TODO: User dashboard content here -->
    <!-- comment: ini adalah dashboard user, bukan admin -->
    <p>Selamat datang di dashboard user. Silakan gunakan fitur yang tersedia.</p>
  </div>
</body>
</html>
