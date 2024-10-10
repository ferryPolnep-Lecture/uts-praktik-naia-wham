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

// Cek apakah ID ada dalam query string
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Cek jika form di-submit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id) {
    $sql = "DELETE FROM krs WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        $message = "Data berhasil dihapus!";
    } else {
        $message = "Error: " . $conn->error;
    }
} else if (!$id) {
    die("ID tidak ditentukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Data Mahasiswa</title>
    <link rel="stylesheet" href="styles.css"> <!-- Menggunakan file CSS eksternal -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #f0d2e7;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center; /* Memusatkan semua konten dalam container */
        }

        h1 {
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
        }

        form {
            margin-top: 20px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #d40e7b; /* Warna pink */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #d40e7b; /* Warna saat hover */
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #003366
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Hapus Data Mahasiswa</h1>
    <p>Apakah Anda yakin ingin menghapus data mahasiswa dengan ID: <?php echo $id; ?>?</p>
    <form action="delete.php?id=<?php echo $id; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit">Ya, Hapus Data</button>
    </form>
    <a href="form.html">Kembali ke Form</a>
</div>

<?php
if (isset($message)) {
    echo "<p style='text-align: center;'>" . $message . "</p>"; // Tampilkan pesan di tengah
}
?>

</body>
</html>
