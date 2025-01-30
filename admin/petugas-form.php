<?php
    session_start();
    require '../koneksi.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $telepon = $_POST['telepon'];
        $level = $_POST['level'];
        $sql = 'INSERT INTO petugas (nama_petugas, username, password, telp, level) VALUE (?, ?, ?, ?, ?)';
        $row = $koneksi->execute_query($sql, [$nama, $username, $password, $telepon, $level]);

        if ($row) {
            header('location:petugas.php');
        } else {
            echo "<script>alert('Gagal Menambahkan Petugas')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Petugas Baru</title>
</head>
<body>
    <h1>Tambah Petugas Baru</h1>
    <form action="" method="post">
        <div class="form-item">
            <label for="level">Level Akses</label>
            <select name="level" id="level">
                <option value="" disabled selected>Pilih Level Akses</option>
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
            </select>
        </div>

        <div class="form-item">
            <label for="nama">Nama Petugas</label>
            <input type="text" name="nama" id="nama" required>
        </div>

        <div class="form-item">
            <label for="telepon">Telepon</label>
            <input type="tel" name="telepon" id="telepon" required>
        </div>

        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>

        <div class="form-item">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Kirim</button>
        <a href="petugas.php">Batal</a>
    </form>
</body>
</html>