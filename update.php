<?php
session_start(); // Memulai session

$servername = "localhost";
$username = "root";
$password = "";
$databasename = "uts_5a";

// Koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Cek apakah ID ada dalam query string
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    // Mendapatkan data mahasiswa berdasarkan ID
    $sql = "SELECT * FROM krs WHERE id='$id'";
    $result = $conn->query($sql);
    
    // Periksa apakah data ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Data tidak ditemukan.");
    }
} else {
    die("ID tidak ditentukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Mahasiswa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Update Data Mahasiswa</h1>
    <form action="update.php?id=<?php echo $id; ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        
        <label for="nama_mahasiswa">Nama Mahasiswa:</label>
        <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" value="<?php echo $row['nama_mahasiswa']; ?>" required>
        
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" pattern="\d{10}" value="<?php echo $row['nim']; ?>" required title="NIM harus terdiri dari 10 digit angka.">
        
        <label for="kelas">Kelas:</label>
        <select id="kelas" name="kelas" required>
            <option value="<?php echo $row['kelas']; ?>"><?php echo $row['kelas']; ?></option>
            <option value="5A">5A</option>
            <option value="5B">5B</option>
            <option value="5C">5C</option>
            <option value="5D">5D</option>
            <option value="5E">5E</option>
        </select>
        
        <label for="mata_kuliah">Mata Kuliah Pilihan:</label>
        <select id="mata_kuliah" name="mata_kuliah[]" multiple required>
            <option value="Web Application Development" <?php echo in_array("Web Application Development", explode(", ", $row['mata_kuliah_pilihan'])) ? 'selected' : ''; ?>>Web Application Development</option>
            <option value="Mobile Application Development" <?php echo in_array("Mobile Application Development", explode(", ", $row['mata_kuliah_pilihan'])) ? 'selected' : ''; ?>>Mobile Application Development</option>
            <option value="UI/UX Design" <?php echo in_array("UI/UX Design", explode(", ", $row['mata_kuliah_pilihan'])) ? 'selected' : ''; ?>>UI/UX Design</option>
            <option value="Software Engineering" <?php echo in_array("Software Engineering", explode(", ", $row['mata_kuliah_pilihan'])) ? 'selected' : ''; ?>>Software Engineering</option>
            <option value="Data Engineering" <?php echo in_array("Data Engineering", explode(", ", $row['mata_kuliah_pilihan'])) ? 'selected' : ''; ?>>Data Engineering</option>
        </select>
        
        <button type="submit">Update Data</button>
    </form>

    <?php
    // Proses pembaruan data jika form disubmit
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $nama_mahasiswa = $_POST['nama_mahasiswa'];
        $nim = $_POST['nim'];
        $kelas = $_POST['kelas'];
        <?php
        session_start(); // Memulai session
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "uts5a";
        
        // Koneksi ke database
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Cek koneksi
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Cek apakah ID ada dalam query string
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        
        if ($id) {
            // Mendapatkan data mahasiswa berdasarkan ID
            $sql = "SELECT * FROM krs WHERE id='$id'";
            $result = $conn->query($sql);
            
            // Periksa apakah data ditemukan
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } else {
                die("Data tidak ditemukan.");
            }
        } else {
            die("ID tidak ditentukan.");
        }
        ?>
        
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Update Data Mahasiswa</title>
            <link rel="stylesheet" href="styles.css">
        </head>
        <body>
            <h1>Update Data Mahasiswa</h1>
            <form action="update.php?id=<?php echo $id; ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                
                <label for="nama_mahasiswa">Nama Mahasiswa:</label>
                <input type="text" id="nama_mahasiswa" name="nama_mahasiswa" value="<?php echo $row['nama_mahasiswa']; ?>" required>
                
                <label for="nim">NIM:</label>
                <input type="text" id="nim" name="nim" pattern="\d{10}" value="<?php echo $row['nim']; ?>" required title="NIM harus terdiri dari 10 digit angka.">
                
                <label for="kelas">Kelas:</label>
                <select id="kelas" name="kelas" required>
                    <option value="<?php echo $row['kelas']; ?>"><?php echo $row['kelas']; ?></option>
                    <option value="5A">5A</option>
                    <option value="5B">5B</option>
                    <option value="5C">5C</option>
                    <option value="5D">5D</option>
                    <option value="5E">5E</option>
                </select>
                
                <label for="mata_kuliah">Mata Kuliah Pilihan:</label>
                <select id="mata_kuliah" name="mata_kuliah[]" multiple required>
                    <option value="Web Application Development" <?php echo in_array("Web Application Development", explode(", ", $row['mata_kuliah_pilihan'])) ? 'selected' : ''; ?>>Web Application Development</option>
                    <option value="Mobile Application Development" <?php echo in_array("Mobile Application Development", explode(", ", $row['mata_kuliah_pilihan'])) ? 'selected' : ''; ?>>Mobile Application Development</option>
                    <option value="UI/UX Design" <?php echo in_array("UI/UX Design", explode(", ", $row['mata_kuliah_pilihan'])) ? 'selected' : ''; ?>>UI/UX Design</option>
                    <option value="Software Engineering" <?php echo in_array("Software Engineering", explode(", ", $row['mata_kuliah_pilihan'])) ? 'selected' : ''; ?>>Software Engineering</option>
                    <option value="Data Engineering" <?php echo in_array("Data Engineering", explode(", ", $row['mata_kuliah_pilihan'])) ? 'selected' : ''; ?>>Data Engineering</option>
                </select>
                
                <button type="submit">Update Data</button>
            </form>
        
            <?php
            // Proses pembaruan data jika form disubmit
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'];
                $nama_mahasiswa = $_POST['nama_mahasiswa'];
                $nim = $_POST['nim'];
                $kelas = $_POST['kelas'];
                $mata_kuliah = implode(", ", $_POST['mata_kuliah']);
                
                $sql = "UPDATE krs SET nama_mahasiswa='$nama_mahasiswa', nim='$nim', kelas='$kelas', mata_kuliah_pilihan='$mata_kuliah' WHERE id='$id'";
        
                if ($conn->query($sql) === TRUE) {
                    $_SESSION['message'] = "Data berhasil diperbarui!"; // Menyimpan pesan dalam session
                    header("Location: confirmation.php"); // Mengalihkan ke halaman konfirmasi
                    exit();
                } else {
                    echo "Error: " . $conn->error;
                }
            }
        
            $conn->close();
            ?>
        </body>
        </html>
             $mata_kuliah = implode(", ", $_POST['mata_kuliah']);
        
        $sql = "UPDATE krs SET nama_mahasiswa='$nama_mahasiswa', nim='$nim', kelas='$kelas', mata_kuliah_pilihan='$mata_kuliah' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['message'] = "Data berhasil diperbarui!"; // Menyimpan pesan dalam session
            header("Location: confirmation.php"); // Mengalihkan ke halaman konfirmasi
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }

    $conn->close();
    ?>
</body>
</html>
