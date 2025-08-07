<?php
session_start();
$userAgent = $_SERVER['HTTP_USER_AGENT'];
if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
}
$_SESSION['counter']++;
$is_admin = false;
if (strpos($userAgent, 'Admin') !== false) {
    $_SESSION['is_admin'] = true;
    $is_admin = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Redeem Voucher</title>
  <style>
    body { background-color: #0b1f3a; color: white; font-family: sans-serif; text-align: center; padding: 100px; }
    a, h1, h2 { color: #59a1ff; }
    .container { background: #132c4c; padding: 20px; border-radius: 10px; display: inline-block; }
    .btn { background:#59a1ff; color:white; padding:10px 20px; border:none; border-radius:5px; cursor:pointer; font-size:1em; text-decoration:none; display:inline-block; margin-top:10px; }
  </style>
</head>
<body>
  <div class="container">
    <?php if ($is_admin): ?>
      <h2>Admin access granted via User-Agent!</h2>
      <a class='btn' href='admin.php'>Go to Admin Page</a>
    <?php else: ?>
      <h2>Voucher redeemed successfully! (Attempt #<?= $_SESSION['counter'] ?>)</h2>
      <p>Try again?</p>
      <a class='btn' href='redeem-vocher.php'>Redeem Again</a>
    <?php endif; ?>
  </div>
</body>
</html>