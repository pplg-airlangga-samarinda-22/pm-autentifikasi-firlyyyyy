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
    <title>Data Pengaduan</title>
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
    </style>
</head>

<body>
    <header>
        <h1>Data Pengaduan</h1>
    </header>
    <!-- <nav>
        <a href="index.php">Dashboard</a>
        <a href="pengaduan.php">Pengaduan</a>
        <a href="logout.php">Logout</a>
    </nav> -->
    <main>
        <a href="index.php" class="button">Kembali</a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>NIK Pelapor</th>
                    <th>Isi Laporan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                $sql = 'SELECT * FROM pengaduan';
                $rows = $koneksi->execute_query($sql)->fetch_all(MYSQLI_ASSOC);
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td><?= ++$no ?></td>
                        <td><?= $row['tgl_pengaduan'] ?></td>
                        <td><?= $row['nik'] ?></td>
                        <td><?= $row['isi_laporan'] ?></td>
                        <td><?= ($row['status'] == 0) ? 'Menunggu' : (($row['status'] == 'proses') ? 'Diproses' : 'Selesai') ?></td>
                        <td>
                            <?php
                            if ($row['status'] == 0) {
                            ?>
                                <a href="pengaduan-proses.php?id=<?= $row['id_pengaduan'] ?>" class="button">Verifikasi</a>
                            <?php
                            } elseif ($row['status'] === 'proses') {
                            ?>
                                <a href="pengaduan-selesai.php?id=<?= $row['id_pengaduan'] ?>" class="button">Tanggapi</a>
                            <?php
                            } elseif ($row['status'] === 'selesai') {
                            ?>
                                <a href="pengaduan-lihat.php?id=<?= $row['id_pengaduan'] ?>" class="button">Lihat</a>
                            <?php
                            }
                            ?>
                            <a href="pengaduan-hapus.php?id=<?= $row['id_pengaduan'] ?>" class="button" style="background-color: #dc3545;">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>

</html>