<?php
include 'config/db.php';

$id = $_GET['id']; // 🔥 VULNERABLE

$query = "SELECT s.*, u.username FROM slip_gaji s
          JOIN users u ON u.id = s.user_id
          WHERE s.id = $id";
$result = $conn->query($query);
$data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Slip Gaji</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <h2>Slip Gaji <?= $data['nama']; ?></h2>
    <p>Jabatan: <?= $data['jabatan']; ?></p>
    <p>Gaji Pokok: Rp <?= number_format($data['gaji_pokok']); ?></p>
    <p>Tunjangan: Rp <?= number_format($data['tunjangan']); ?></p>
    <p>Potongan: Rp <?= number_format($data['potongan']); ?></p>
    <hr>
    <p><strong>Total: Rp <?= number_format($data['gaji_pokok'] + $data['tunjangan'] - $data['potongan']); ?></strong></p>
    <?php if ($data['flag']) { echo '<hr><p><strong>FLAG: '.$data['flag'].'</strong></p>'; } ?>
</div>
</body>
</html>
