<?php
require '../koneksi.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = 'SELECT * FROM petugas WHERE username=? AND password=?';
    $row = $koneksi->execute_query($sql, [$username, $password])->fetch_assoc();

    if ($row) {
        session_start();
        $_SESSION['id'] = $row['id_petugas'];
        $_SESSION['level'] = $row['level'];
        header('location:index.php');
    } else {
        echo "<script>alert('Gagal Login')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Petugas</title>
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
        .form-login {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .form-login p {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-item {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
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
            text-align: center;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            display: inline-block;
            margin-top: 10px;
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
    <form action="" method="post" class="form-login">
        <p>Login Petugas</p>
        <div class="form-item">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>

        <div class="form-item">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="form-actions">
            <button type="submit">Login</button>
            <a href="../index.php">Kembali ke Halaman Utama</a>
        </div>
    </form>
</body>

</html>