<?php
/* Only accept if proxied from dashboard-c with header and not directly */
$from = $_SERVER['HTTP_X_FROM'] ?? '';
if ($from !== 'dashboard-c') {
    http_response_code(403);
    echo "Forbidden.";
    exit;
}

$flag = getenv('FLAG_NCLP') ?: 'NCLP{missing-flag}';
if (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === '/internal/flag') {
    header('Content-Type: text/plain');
    echo $flag . "\n";
    exit;
}

echo "Internal service";
