<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "uts_5a";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Menjalankan query untuk mendapatkan data
$sql = "SELECT * FROM krs";
$result = $conn->query($sql);

// Menampilkan data dalam tabel
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="styles.css"> <!-- Menggunakan file CSS eksternal -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #d40e7b; /* Warna hijau */
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* Warna latar belakang baris genap */
        }

        tr:hover {
            background-color: #ddd; /* Efek hover pada baris */
        }

        h1 {
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Data Mahasiswa</h1>

    <?php
    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Nama Mahasiswa</th><th>NIM</th><th>Kelas</th><th>Mata Kuliah Pilihan</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["nama_mahasiswa"]."</td><td>".$row["nim"]."</td><td>".$row["kelas"]."</td><td>".$row["mata_kuliah_pilihan"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Tidak ada hasil.</p>";
    }
    ?>
</div>

</body>
</html>

<?php
$conn->close();
?>
