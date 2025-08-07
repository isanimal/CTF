<?php
session_start();
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    http_response_code(403);
    die("<h1 style='color:white'>Access Denied</h1>");
}
echo "<h1 style='color:#59a1ff'>Welcome, Admin!</h1>";
echo "<p><a href='flag.php'>View the Flag</a></p>";
?>