<?php
// Koneksi ke basis data MySQL
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "Belajar_croud";

$conn = new mysqli($Belajar_croud, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Fungsi untuk membuat entri baru
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    $sql = "INSERT INTO biodata (nama, alamat, telepon) VALUES ('$nama', '$alamat', '$telepon')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fungsi untuk menghapus entri
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM biodata WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fungsi untuk mendapatkan data dari basis data
$sql = "SELECT * FROM biodata";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD dengan PHP dan MySQL</title>
</head>
<body>
    <h2>Input Biodata</h2>
    <form method="post" action="">
        <label>Nama:</label>
        <input type="text" name="nama" required><br><br>
        <label>Alamat:</label>
        <textarea name="alamat" required></textarea><br><br>
        <label>Telepon:</label>
        <input type="text" name="telepon" required><br><br>
        <input type="submit" name="submit" value="Simpan">
    </form>

    <h2>Daftar Biodata</h2>
    <table>
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['nama'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['telepon'] . "</td>";
                echo "<td><a href='?delete=" . $row['id'] . "'>Hapus</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada data.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
