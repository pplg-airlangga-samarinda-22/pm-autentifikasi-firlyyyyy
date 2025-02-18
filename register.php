<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nik = $_POST['nik'];

    $sql = 'SELECT * FROM masyarakat WHERE nik=?';
    $cek = $koneksi->execute_query($sql, [$nik]);

    if (mysqli_num_rows($cek) == 1) {
        echo "<script>alert('NIK sudah digunakan')</script>";
    } else {
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $telepon = $_POST['telp'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $sql = 'INSERT INTO masyarakat (nik, nama, telp, username, password) VALUES (?, ?, ?, ?, ?)';
        $koneksi->execute_query($sql, [$nik, $nama, $telepon, $username, $password]);
        echo "<script>alert('pendaftaran berhasil')</script>";
        header('location:login.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
        /* Gaya dasar */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Kontainer form */
        .form-container {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .form-container h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
            font-size: 22px;
        }

        .form-item {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }

        .form-item label {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .form-item input {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s;
        }

        .form-item input:focus {
            border-color: #007bff;
        }

        .form-actions {
            margin-top: 20px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Registrasi Pengguna Baru</h1>
        <form action="" method="post">
            <div class="form-item">
                <label for="nik">NIK</label>
                <input type="text" name="nik" id="nik" required>
            </div>

            <div class="form-item">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" required>
            </div>

            <div class="form-item">
                <label for="telepon">Telepon</label>
                <input type="tel" name="telp" id="telepon" maxlength="12" required>
            </div>

            <div class="form-item">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </div>

            <div class="form-item">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="form-actions">
                <button type="submit">Register</button>
                <a href="login.php">Batal</a>
            </div>
        </form>
    </div>
</body>

</html>