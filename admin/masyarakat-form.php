<?php
session_start();
require '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nik = $_POST['nik'];
    $sql = 'SELECT * FROM masyarakat WHERE nik=?';
    $cek = $koneksi->execute_query($sql, [$nik]);

    if ($cek->num_rows == 1) {
        echo "<script>alert('NIK sudah digunakan');</script>";
    } else {
        $nama = $_POST['nama'];
        $telepon = $_POST['telepon'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $sql = 'INSERT INTO masyarakat (nik, nama, telp, username, password) VALUES (?, ?, ?, ?, ?)';
        $row = $koneksi->execute_query($sql, [$nik, $nama, $telepon, $username, $password]);
        echo "<script>alert('Pendaftaran berhasil');</script>";
        header('location:masyarakat.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Masyarakat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .form-item {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        input {
            width: 380px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            outline: none;
        }

        input:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
        }

        button {
            margin-left: 10px;
            width: 380px;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .cancel {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }

        .cancel:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Tambah Data Masyarakat</h1>
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

            <button type="submit">Register</button>
            <a href="masyarakat.php" class="cancel">Batal</a>
        </form>
    </div>
</body>

</html>