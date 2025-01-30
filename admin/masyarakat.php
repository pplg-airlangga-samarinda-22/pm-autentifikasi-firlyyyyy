<?php
session_start();
require '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Masyarakat</title>
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
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #007bff;
            color: #fff;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        a.button {
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a.button:hover {
            background-color: #0056b3;
        }

        a.button-danger {
            background-color: #dc3545;
        }

        a.button-danger:hover {
            background-color: #a71d2a;
        }
    </style>
</head>

<body>
    <header>
        <h1>Data Masyarakat</h1>
    </header>
    <!-- <nav>
        <a href="index.php">Dashboard</a>
        <a href="masyarakat.php">Masyarakat</a>
        <a href="logout.php">Logout</a>
    </nav> -->
    <main>
        <a href="index.php" class="button">Kembali</a>
        <a href="masyarakat-form.php" class="button" style="margin-left: 10px;">Tambah Masyarakat</a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                $sql = 'SELECT * FROM masyarakat';
                $rows = $koneksi->execute_query($sql)->fetch_all(MYSQLI_ASSOC);
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td><?= ++$no ?></td>
                        <td><?= $row['nik'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['username'] ?></td>
                        <td><?= $row['telp'] ?></td>
                        <td>
                            <a href="masyarakat-edit.php?nik=<?= $row['nik'] ?>" class="button">Edit</a>
                            <a href="masyarakat-hapus.php?nik=<?= $row['nik'] ?>" class="button button-danger">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>

</html>