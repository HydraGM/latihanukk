<?php 
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM siswa WHERE id=$id";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        header('Location: list.php?hapus=sukses');
    } else {
        echo "<script>alert('Data Gagal Dihapus')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><a href="add.php">[+]Tambah baru</a></p>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NISN</th>
            <th>Kelas</th>
            <th>Tindakan</th>
        </tr>
            <?php 
            $query = mysqli_query($conn, "SELECT * FROM siswa");
            while ($data = mysqli_fetch_array($query)){
            ?>
                <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['nisn']; ?></td>
                    <td><?php echo $data['kelas']; ?></td>
                    <td><a href='edit.php?id="<?= $data['id']?>"'>Edit</a>|<a href='list.php?id=<?= $data['id']?>"'">Hapus</a></td>
                </tr>
            <?php
            }
            ?>
    </table>
    <p>Total : <?php echo mysqli_num_rows($query) ?></p>
</body>
</html>