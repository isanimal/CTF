<?php
$host = 'db';
$user = 'root';
$pass = 'root';
$db   = 'payroll_ctf';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
