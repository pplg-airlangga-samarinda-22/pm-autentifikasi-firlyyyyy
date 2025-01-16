<?php
session_start();
require 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan</title>
    <style>
        /* Gaya dasar */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        /* Header */
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

        /* Navigasi */
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

        nav a i {
            margin-right: 8px;
        }

        nav a:hover {
            background-color: #003d80;
            transform: translateY(-2px);
        }

        /* Tabel */
        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        table th,
        table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #007bff;
            color: #fff;
        }

        table tbody tr:hover {
            background-color: #f1f1f1;
        }

        table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Tombol Tambah */
        .add-btn {
            display: block;
            width: fit-content;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .add-btn:hover {
            background-color: #218838;
        }

        /* Tombol Aksi */
        .action-btn {
            padding: 5px 10px;
            background-color: #ffc107;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .action-btn:hover {
            background-color: #e0a800;
        }

        /* Responsif */
        @media (max-width: 768px) {

            table th,
            table td {
                font-size: 14px;
                padding: 10px;
            }

            .add-btn {
                font-size: 14px;
                padding: 8px 15px;
            }

            .action-btn {
                font-size: 12px;
                padding: 5px 8px;
            }

            nav {
                flex-wrap: wrap;
            }

            nav a {
                margin: 5px 10px;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>Halaman Pengaduan</h1>
    </header>
    <nav>
        <a href="index.php"><i class="fas fa-home"></i> Dashboard</a>
        <a href="aduan.php"><i class="fas fa-comment-dots"></i> Aduan</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </nav>
    <main>
        <a href="form-aduan.php" class="add-btn">Tambah Pengaduan</a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Laporan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nik = $_SESSION['nik'];
                $no = 0;
                $sql = "SELECT * FROM pengaduan WHERE nik=? ORDER BY id_pengaduan DESC";
                $pengaduan = $koneksi->execute_query($sql, [$nik])->fetch_all(MYSQLI_ASSOC);
                // var_dump($pengaduan);
                foreach ($pengaduan as $item) {
                ?>
                    <tr>
                        <td><?= ++$no; ?></td>
                        <td><?= htmlspecialchars($item['tgl_pengaduan']); ?></td>
                        <td><?= htmlspecialchars($item['isi_laporan']); ?></td>
                        <td>
                            <?= ($item['status'] == '0') ? 'Menunggu' : (($item['status'] == 'proses') ? 'Diproses' : 'Selesai') ?>
                        </td>
                        <td>
                            <a href="edit-aduan.php?id=<?= $item['id_pengaduan']; ?>" class="action-btn">Edit</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>