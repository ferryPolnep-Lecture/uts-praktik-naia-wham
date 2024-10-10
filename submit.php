<?php
// File: submit.php
$servername = "localhost";
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$databasename = "uts_5a";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $databasename);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$nama_mahasiswa = $_POST['nama_mahasiswa'];
$nim = $_POST['nim'];
$kelas = $_POST['kelas'];
$mata_kuliah = implode(", ", $_POST['mata_kuliah']);

// SQL untuk menyimpan data
$sql = "INSERT INTO krs (nama_mahasiswa, nim, kelas, mata_kuliah_pilihan) VALUES ('$nama_mahasiswa', '$nim', '$kelas', '$mata_kuliah')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
