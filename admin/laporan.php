<?php
session_start();
require '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
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

        /* Gaya tombol */
        .button {
            display: inline-block;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .button-print {
            margin: 20px auto;
            display: block;
            width: max-content;
        }

        /* Gaya tabel */
        .table-container {
            padding: 0 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 30px 0;
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
    </style>
</head>

<body>
    <header>
        <h1>Laporan Pengaduan Masyarakat</h1>
    </header>

    <a href="javascript:window.print();" class="button button-print">Cetak Laporan</a>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>NIK Pelapor</th>
                    <th>Isi Laporan</th>
                    <th>Status</th>
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
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>