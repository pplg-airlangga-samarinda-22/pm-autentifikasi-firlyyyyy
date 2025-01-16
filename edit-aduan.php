<?php
session_start();
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id_pengaduan = $_GET['id'];

    $sql = 'SELECT * FROM pengaduan WHERE id_pengaduan = ?';
    $row = $koneksi->execute_query($sql, [$id_pengaduan])->fetch_assoc();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tanggal = date('Y-m-d');
    $id_pengaduan = $_GET['id'];
    $laporan = $_POST['laporan'];
    $foto = (isset($_FILES['foto'])) ? $_FILES['foto']['name'] : "";

    $sql = 'UPDATE pengaduan SET tgl_pengaduan=?, isi_laporan=?, foto=? WHERE id_pengaduan=?';
    $row = $koneksi->execute_query($sql, [$tanggal, $laporan, $foto, $id_pengaduan]);

    if (!empty($foto)) {
        move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/' . $_FILES['foto']['name']);
    }

    if ($row) {
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
    <title>Edit Aduan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
        }

        main {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-item {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        img {
            max-width: 100%;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            text-decoration: none;
            color: #007bff;
            margin-left: 10px;
            font-size: 16px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <header>
        <h1>Edit Aduan</h1>
    </header>
    <main>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-item">
                <label for="laporan">Isi Laporan</label>
                <textarea name="laporan" id="laporan" required><?= htmlspecialchars($row['isi_laporan']) ?></textarea>
            </div>

            <div class="form-item">
                <label for="foto">Foto Pendukung</label>
                <?php if (!empty($row['foto'])): ?>
                    <img src="gambar/<?= htmlspecialchars($row['foto']) ?>" alt="Foto Pendukung">
                <?php endif; ?>
                <input type="file" name="foto" id="foto">
            </div>

            <button type="submit">Simpan Perubahan</button>
            <a href="aduan.php">Batal</a>
        </form>
    </main>
</body>

</html>