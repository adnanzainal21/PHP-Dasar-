<!DOCTYPE html>
<html>
<head>
    <title>CRUD Siswa</title>
</head>
<body>
    <h2>CRUD Siswa Kelas</h2>

    <form method="post" action="create.php">
        <label>Nama Siswa:</label>
        <input type="text" name="nama" required>
        <label>Keterangan:</label>
        <input type="text" name="keterangan" required>
        <button type="submit">Tambah Siswa</button>
    </form>

    <h3>Daftar Siswa:</h3>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        <?php
        include 'config.php';
        $no = 1;
        $sql = "SELECT * FROM siswa";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['keterangan'] . "</td>";
            echo "<td><a href='edit.php?id=".$row['id']."'>Edit</a> | <a href='delete.php?id=".$row['id']."'>Hapus</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
