<?php
session_start();

// Bad practice: include config langsung dari folder admin (sengaja untuk simulasi).
$config = include __DIR__ . '/admin/config.php';

$error = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = $_POST['username'] ?? '';
    $p = $_POST['password'] ?? '';

    // Default credentials (sesuai skenario) -> admin:admin123
    if ($u === $config['admin_user'] && $p === $config['admin_pass']) {
        $_SESSION['user'] = 'admin';
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Invalid credentials";
    }
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Login</title></head>
<body>
  <link rel="stylesheet" href="stylelink.css">
  <div class="container" style="text-align:center;max-width:400px;margin:48px auto;">
    <h2>Login</h2>
    <?php if ($error): ?><p style="color:red"><?php echo htmlspecialchars($error); ?></p><?php endif; ?>
    <form method="post" style="margin-top:24px;">
      <div style="margin-bottom:16px;"><label>Username <input name="username"></label></div>
      <div style="margin-bottom:16px;"><label>Password <input name="password" type="password"></label></div>
      <button type="submit" class="btn">Login</button>
    </form>
    <p style="color:#888;margin-top:24px;">Hint (training): Periksa direktori <code>/admin/</code> dan file backup.</p>
  </div>
</body>
</html>
