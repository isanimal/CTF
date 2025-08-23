<?php
/* Intentional insecure demo of HPP duplicate key handling */
session_start();

function guard_is_admin() {
    // Read the LAST role from raw query string
    $raw = $_SERVER['QUERY_STRING'] ?? '';
    $lastRole = null;
    foreach (explode('&', $raw) as $pair) {
        if (str_starts_with($pair, 'role=')) {
            $lastRole = urldecode(substr($pair, 5));
        }
    }
    return $lastRole === 'admin';
}

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (str_starts_with($uri, '/a/login')) {
    // PHP merges duplicate keys; typically first wins
    $_SESSION['user'] = $_GET['user'] ?? 'guest';
    $_SESSION['role'] = $_GET['role'] ?? 'user';
    echo "<h1>Dashboard A</h1>";
    echo "<p>Logged as: ".htmlspecialchars($_SESSION['user'])." (role: ".htmlspecialchars($_SESSION['role']).")</p>";
    echo "<p>Hint: duplicate ?role=user&role=admin</p>";
    echo "<p>Try <a href='/a/admin'>/a/admin</a></p>";
    exit;
}

if ($uri === '/a/admin') {
    if (guard_is_admin()) {
        $token = getenv('TOKEN_A') ?: 'token-a';
        echo "<h1>Dashboard A - Admin</h1>";
        echo "<p>Token A: ".htmlspecialchars($token)."</p>";
        echo "<p>Next: <a href='/b'>Dashboard B</a></p>";
    } else {
        http_response_code(403);
        echo "Forbidden: need admin (HPP?)";
    }
    exit;
}

echo "<h1>Dashboard A</h1>";
echo "<p>Login via query: /a/login?user=&role= (insecure)</p>";
echo "<p>Example: <a href='/a/login?user=guest&role=user'>/a/login?user=guest&role=user</a></p>";
