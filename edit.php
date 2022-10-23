<?php 
include 'koneksi.php';

if ($_GET['id']) {
    $id=$_GET['id'];
    $query = "SELECT * FROM siswa WHERE id=$id";
    $sql = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($sql);
    if (mysqli_num_rows($sql) < 1) {
        echo "<script>alert('Data Tidak Ditemukan')</script>";
    }

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $kelas = $_POST['kelas'];

    $query = mysqli_query($conn, "UPDATE siswa SET nama='$nama', nisn='$nisn', kelas=$'kelas' WHERE id='$id'");

    if ($query) {
        header('Location: list.php');
    } else {
        echo "<script>alert('Data Gagal Diedit')</script>";
    }
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
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
        </tr>
        <tr>
            <td>NISN</td>
            <td>:</td>
            <td><input type="text" name="nisn" value="<?php echo $data['nisn']; ?>"></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><input type="text" name="kelas" value="<?php echo $data['kelas']; ?>"></td>
        </tr>
        <button type="submit" name="submit">SIMPAN</button>
    </form>
</table>
</body>
</html>