<?php
session_start(); // Memulai session

// Ambil pesan dari session
$message = isset($_SESSION['message']) ? $_SESSION['message'] : null;

// Hapus pesan setelah ditampilkan
unset($_SESSION['message']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembaruan</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Konfirmasi Pembaruan Data</h1>
    <?php if ($message): ?>
        <p><?php echo $message; ?></p> <!-- Tampilkan pesan -->
    <?php else: ?>
        <p>Tidak ada pesan untuk ditampilkan.</p>
    <?php endif; ?>
    <a href="form.html">Kembali ke Form</a> <!-- Tautan kembali ke form -->
</body>
</html>
