<?php
include 'config.php';

$nama = $_POST['nama'];
$keterangan = $_POST['keterangan'];

$sql = "INSERT INTO siswa (nama, keterangan) VALUES ('$nama', '$keterangan')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
