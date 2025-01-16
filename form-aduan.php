<?php
session_start();
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // var_dump($_POST);
    $tanggal = date('Y-m-d');
    $nik = $_SESSION['nik'];
    $laporan = $_POST['laporan'];
    $foto = (isset($_FILES['foto'])) ? $_FILES['foto']['name'] : "";
    $status = 0;

    $sql = 'INSERT INTO pengaduan (tgl_pengaduan, nik, isi_laporan, foto, status) VALUES (?, ?, ?, ?, ?)';
    $row = $koneksi->execute_query($sql, [$tanggal, $nik, $laporan, $foto, $status]);
    // var_dump($_POST);

    if (!empty($foto)) {
        move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/' . $_FILES['foto']['name']);
    }

    if ($row) {
        // var_dump($row);
        echo "<script>alert('Pengaduan baru telah berhasil disimpan')</script>";
        header('location:aduan.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Aduan</title>
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

        /* Formulir */
        form {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-item {
            margin-bottom: 20px;
        }

        .form-item label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-item textarea,
        .form-item input[type="file"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-item textarea {
            height: 150px;
            resize: none;
        }

        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #218838;
        }

        /* Responsif */
        @media (max-width: 768px) {
            form {
                padding: 15px;
            }

            button[type="submit"] {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>Tambah Aduan</h1>
    </header>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-item">
            <label for="laporan">Isi Laporan</label>
            <textarea name="laporan" id="laporan" placeholder="Tuliskan pengaduan Anda di sini..."></textarea>
        </div>

        <div class="form-item">
            <label for="foto">Foto Pendukung</label>
            <input type="file" name="foto" id="foto">
        </div>

        <button type="submit">Kirim Laporan</button>
    </form>
</body>

</html>