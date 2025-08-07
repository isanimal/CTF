<?php
session_start();
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    http_response_code(403);
    die("<h1 style='color:white'>Forbidden</h1>");
}
echo "<pre style='color:#59a1ff;font-size:1.5em;'>" . getenv('FLAG') . "</pre>";
?>
