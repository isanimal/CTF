<?php
session_start();
$logged = isset($_SESSION['user']);
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Internal Payroll Portal (Testing)</title>
</head>
<body>
    <link rel="stylesheet" href="stylelink.css">
  <div class="container" style="text-align:center;">
    <h1>Internal Payroll Portal (Testing)</h1>
    <p>Silahkan Login terlebih dahulu.</p>
    <a href="/login.php"><button class="btn">Login</button></a>
    <?php if ($logged): ?>
      <p>You are logged in as <b><?php echo htmlspecialchars($_SESSION['user']); ?></b>.</p>
    <?php else: ?>
    <?php endif; ?>
  </div>
  </ul>
</body>
</html>
