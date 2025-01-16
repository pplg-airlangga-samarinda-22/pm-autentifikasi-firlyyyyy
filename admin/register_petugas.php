<?php
require '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];

    // Cek apakah username sudah digunakan
    $sql = 'SELECT * FROM petugas WHERE username=?';
    $cek = $koneksi->execute_query($sql, [$username]);

    if (mysqli_num_rows($cek) == 1) {
        echo "<script>alert('Username sudah digunakan')</script>";
    } else {
        // Ambil data dari form
        $nama_petugas = $_POST['nama_petugas'];
        $telepon = $_POST['telp'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $level = $_POST['level'];

        // Query untuk insert data petugas
        $sql = 'INSERT INTO petugas (nama_petugas, username, password, telp, level) VALUES (?, ?, ?, ?, ?)';
        $koneksi->execute_query($sql, [$nama_petugas, $username, $password, $telepon, $level]);

        echo "<script>alert('Pendaftaran berhasil')</script>";
        header('location:login_petugas.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Petugas</title>
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
        }

        .form-item {
            margin-bottom: 15px;
        }

        .form-item label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .form-item input,
        .form-item select {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s;
        }

        .form-item input:focus,
        .form-item select:focus {
            border-color: #007bff;
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
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Registrasi Petugas Baru</h1>
        <form action="" method="post">
            <div class="form-item">
                <label for="nama_petugas">Nama Petugas</label>
                <input type="text" name="nama_petugas" id="nama_petugas" required>
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

            <div class="form-item">
                <label for="level">Level</label>
                <select name="level" id="level" required>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                </select>
            </div>

            <button type="submit">Register</button>
            <a href="login_petugas.php">Batal</a>
        </form>
    </div>
</body>

</html>