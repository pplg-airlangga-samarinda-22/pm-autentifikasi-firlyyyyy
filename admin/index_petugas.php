<?php
session_start();
require_once '../koneksi.php';
if (empty($_SESSION['username'])) {
    header('location:admin/login_petugas.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas - Pengaduan Masyarakat</title>
    <style>
        /* Gaya dasar untuk halaman */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        /* Gaya header */
        h1 {
            text-align: center;
            color: #fff;
            background-color: #28a745;
            padding: 20px 0;
            margin: 0;
        }

        /* Gaya navigasi */
        nav {
            display: flex;
            justify-content: center;
            background-color: #218838;
            padding: 10px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        nav a {
            text-decoration: none;
            color: #fff;
            margin: 0 15px;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #19692c;
        }

        /* Gaya konten utama */
        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Responsif */
        @media (max-width: 600px) {
            nav {
                flex-direction: column;
            }

            nav a {
                margin: 5px 0;
            }
        }
    </style>
</head>

<body>
    <h1>Selamat Datang di Dashboard Petugas</h1>
    <nav>
        <a href="index_petugas.php">Dashboard</a>
        <a href="aduan_petugas.php">Daftar Aduan</a>
        <a href="logout_petugas.php">Logout</a>
    </nav>
    <main>
        <p>
            Selamat datang, <strong>Petugas</strong>. Anda dapat mengelola pengaduan masyarakat melalui menu yang tersedia.
            Gunakan fitur ini untuk memberikan pelayanan yang terbaik.
        </p>
    </main>
</body>

</html>