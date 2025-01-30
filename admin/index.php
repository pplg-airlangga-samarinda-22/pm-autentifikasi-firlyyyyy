<?php
session_start();
require '../koneksi.php';
if (empty($_SESSION['level'])) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pengaduan</title>
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
        header {
            background-color: #007bff;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }

        /* Gaya navigasi */
        nav {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #0056b3;
            padding: 10px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        nav a {
            text-decoration: none;
            color: #fff;
            margin: 0 15px;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            display: flex;
            align-items: center;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        nav a:hover {
            background-color: #003d80;
            transform: translateY(-2px);
        }

        /* Gaya konten utama */
        main {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        main p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        /* Kartu menu */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card {
            flex: 1 1 calc(33.333% - 20px);
            max-width: calc(33.333% - 20px);
            background-color: #f1f1f1;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }

        .card h3 {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 14px;
            color: #666;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .card {
                flex: 1 1 calc(50% - 20px);
                max-width: calc(50% - 20px);
            }
        }

        @media (max-width: 480px) {
            .card {
                flex: 1 1 100%;
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>Selamat Datang di Sistem Pengaduan Masyarakat</h1>
    </header>
    <nav>
        <a href="index.php">Dashboard</a>
        <a href="pengaduan.php">Pengaduan</a>
        <a href="masyarakat.php">Masyarakat</a>
        <?php
        if ($_SESSION['level'] == 'admin') {
        ?>
            <a href="petugas.php">Petugas</a>
        <?php } ?>
        <a href="laporan.php">Laporan</a>
        <a href="logout.php">Logout</a>
    </nav>
    <main>
        <p>
            Aplikasi ini dirancang untuk memudahkan pengelolaan pengaduan masyarakat. Gunakan menu navigasi atau fitur di bawah ini untuk menjelajahi aplikasi.
        </p>
        <!-- <div class="card-container">
            <div class="card">
                <h3>Dashboard</h3>
                <p>Kelola informasi utama sistem pengaduan.</p>
            </div>
            <div class="card">
                <h3>Pengaduan</h3>
                <p>Kelola dan tanggapi pengaduan yang masuk.</p>
            </div>
            <div class="card">
                <h3>Laporan</h3>
                <p>Hasilkan laporan terkait aktivitas pengaduan.</p>
            </div>
        </div> -->
    </main>
</body>

</html>