<?php
session_start();
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Dashboard</title>
  <link rel="stylesheet" href="stylelink.css">
</head>
<body>
  <div class="container" style="text-align:center;max-width:400px;margin:48px auto;">
    <h2>Dashboard</h2>
    <ul style="list-style:none;padding:0;">
        <p>ada flile backup-config.php.bak di /admin</p>
      <li style="margin-bottom:16px;"><a href="/admin/" class="btn">Admin Area (directory listing)</a></li>
      <p>Flag.txt</p>
      <li><a href="/admin/flag.txt" class="btn">Flag (admin area)</a></li>
    </ul>
  </div>
</body>
</html>
