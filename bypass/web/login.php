
<?php
// Sembunyikan warning dan notice agar user tidak melihat error session_start
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
ini_set('display_errors', 0);
session_start();
$loginSuccess = false;
$loginSuccess = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['user'] = $_POST['username'];
    $loginSuccess = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - CTF Bypass Admin Dashboard</title>
  <style>
    body {
      background-color: #001f3f;
      color: white;
      font-family: sans-serif;
      min-height: 100vh;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .container {
      background: #003366;
      padding: 32px 32px 24px 32px;
      border-radius: 12px;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-width: 320px;
      box-shadow: 0 4px 24px rgba(0,0,0,0.2);
    }
    a, h1, h2 { color: #7FDBFF; }
    .btn {
      background:#7FDBFF;
      color:#001f3f;
      padding:10px 24px;
      border:none;
      border-radius:5px;
      cursor:pointer;
      font-size:1em;
      margin:10px 5px 0 5px;
      text-decoration:none;
      display:inline-block;
      font-weight:bold;
      transition: background 0.2s;
    }
    .btn:hover { background: #39c3ff; }
    input {
      padding:10px;
      border-radius:5px;
      border:none;
      margin:8px 0 16px 0;
      width: 100%;
      max-width: 260px;
      font-size:1em;
      box-sizing: border-box;
    }
    label {
      display:block;
      margin-top:10px;
      margin-bottom:5px;
      text-align:left;
      color:#7FDBFF;
      font-weight:bold;
      width:100%;
      max-width:260px;
    }
    form { margin-top: 10px; width:100%; display:flex; flex-direction:column; align-items:center; }
  </style>
</head>
<body>
  <div class="container">
    <h1>Login ke CTF Bypass Admin Dashboard</h1>
    <p>Masukkan username dan password untuk login ke portal CTF ini.</p>
    <?php if ($loginSuccess): ?>
      <h2>Logged in as <?= htmlspecialchars($_SESSION['user']) ?></h2>
      <a class='btn' href='dashboard-user.php'>Go to dashboard</a>
    <?php else: ?>
      <form method="post" autocomplete="on">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Masukkan username" required autofocus><br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Masukkan password" required><br>
        <button class="btn" type="submit">Login</button>
      </form>
      <p>Belum punya akun? <a href="register.php">Register</a></p>
    <?php endif; ?>
  </div>
</body>
</html>
