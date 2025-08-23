<?php
/* Scope gate: needs 'read'. If 'elevated' also present (via scope[]), unlock proxy to /internal */
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

echo "<h1>Dashboard C</h1>";

function scopes_from_query(): array {
    $raw = $_SERVER['QUERY_STRING'] ?? '';
    $scopes = [];

    if (isset($_GET['scope'])) {
        if (is_array($_GET['scope'])) $scopes = array_merge($scopes, $_GET['scope']);
        else $scopes[] = $_GET['scope'];
    }
    foreach (explode('&', $raw) as $pair) {
        if (str_starts_with($pair, 'scope%5B%5D=') || str_starts_with($pair, 'scope[]=')) {
            $val = urldecode(substr($pair, strpos($pair, '=')+1));
            $scopes[] = $val;
        }
    }
    return array_values(array_unique($scopes));
}

if ($uri === '/c/report') {
    $scopes = scopes_from_query();
    echo "<p>Scopes: ".htmlspecialchars(json_encode($scopes))."</p>";

    if (!in_array('read', $scopes, true)) {
        http_response_code(403);
        echo "Need scope=read";
        exit;
    }

    echo "<p>Read access granted.</p>";
    if (in_array('elevated', $scopes, true)) {
        echo "<p>Elevated scope active → you may proxy internal.</p>";
        echo "<p>Try: <a href='/c/proxy?path=/internal/flag'>Proxy to /internal/flag</a></p>";
    } else {
        echo "<p>Hint: add scope[]=elevated</p>";
    }
    exit;
}

if ($uri === '/c/proxy') {
    $scopes = scopes_from_query();
    if (!in_array('elevated', $scopes, true)) {
        http_response_code(403);
        echo "Need elevated scope.";
        exit;
    }
    $path = $_GET['path'] ?? '';
    if ($path !== '/internal/flag') {
        http_response_code(403);
        echo "Blocked path.";
        exit;
    }
    $base = getenv('INTERNAL_BASE') ?: 'http://internal-server';
    $ctx = stream_context_create([
        'http' => [
            'method' => 'GET',
            'header' => "X-From: dashboard-c\r\n"
        ]
    ]);
    $res = @file_get_contents($base.$path, false, $ctx);
    if ($res === false) {
        http_response_code(502);
        echo "Upstream error";
        exit;
    }
    header('Content-Type: text/plain');
    echo $res;
    exit;
}

echo "<p>Use /c/report?scope=read</p>";
echo "<p>Hint: /c/report?scope=read&scope[]=elevated then /c/proxy?path=/internal/flag</p>";
