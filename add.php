<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $kelas = $_POST['kelas'];

    $query = "INSERT INTO siswa (id, nama, nisn, kelas) VALUES ('$id', '$nama', '$nisn', '$kelas')";
    $sql = mysqli_query($conn, $query);

    if ($sql){
        header('Location: list.php?input=sukses');
    } else {
        echo "<script>alert('Data Gagal Ditambahkan')</script>";
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
    <table>
        <form method="post">
            <tr>
                <td>No</td>
                <td>:</td>
                <td><input type="text" placeholder="Masukkan ID" name="id"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" placeholder="Masukkan Nama..." name="nama"></td>
            </tr>
            <tr>
                <td>NISN</td>
                <td>:</td>
                <td><input type="text" placeholder="Masukkan NISN..." name="nisn"></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><input type="text" placeholder="Masukkan Kelas..." name="kelas"></td>
            </tr>
            <button type="submit" name="submit">DAFTAR</button>
        </form>
    </table>
</body>
</html>