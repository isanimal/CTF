<?php
/* HPP via alternate separator ;ip=... */
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

echo "<h1>Dashboard B</h1>";

if (str_starts_with($uri, '/b/panel')) {
    $raw = $_SERVER['QUERY_STRING'] ?? '';
    // Accept both & and ; as separators
    $pairs = preg_split('/[&;]/', $raw);

    $firstIp = null;
    foreach ($pairs as $p) {
        if (str_starts_with($p, 'ip=')) {
            $firstIp = urldecode(substr($p, 3));
            break;
        }
    }
    if ($firstIp === '127.0.0.1') {
        $token = getenv('TOKEN_B') ?: 'token-b';
        echo "<p>Allowlist OK (ip=$firstIp)</p>";
        echo "<p>Token B: ".htmlspecialchars($token)."</p>";
        echo "<p>Next: <a href='/c'>Dashboard C</a></p>";
    } else {
        http_response_code(403);
        echo "Blocked: need ip=127.0.0.1 (try ;ip=...)";
    }
    exit;
}

echo "<p>Access panel: /b/panel?ip=</p>";
echo "<p>Hint: /b/panel?ip=127.0.0.1;ip=10.0.0.1</p>";
