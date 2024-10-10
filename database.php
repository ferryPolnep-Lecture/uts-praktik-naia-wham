<?php
$servername = "localhost";
$username = "root"; // Ganti jika perlu
$password = ""; // Ganti jika perlu
$databasename = "uts_5a";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
