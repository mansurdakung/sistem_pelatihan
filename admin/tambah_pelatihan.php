<?php
session_start();
include 'conf.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_pelatihan = $_POST['nama_pelatihan'];

    $query_insert = mysqli_query($conn, "INSERT INTO pelatihan (nama_pelatihan) VALUES ('$nama_pelatihan')");

    if ($query_insert) {
        echo "<script>alert('Berhasil Menambah Data');</script>";
        echo "<script>window.location.href='pelatihan.php';</script>";
    } else {
        echo "Gagal menambah data ke database: " . mysqli_error($conn);
    }
}
?>

<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <title>Tambah Pelatihan</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            margin: 20px auto;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            border-radius: 10px 10px 0 0;
        }
        .btn-success {
            background-color: #28a745;
            border: none;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
    </style>
</head>
<body>

    <div id="right-panel" class="right-panel">
        <?php include 'header.php'; ?>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="card">
                            <div class="card-header text-center">
                                <strong class="card-title">Tambah Pelatihan</strong>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="">
                                    <div class="form-group">
                                        <label for="nama_pelatihan">Nama Pelatihan</label>
                                        <input type="text" class="form-control" id="nama_pelatihan" name="nama_pelatihan" required>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block">Simpan</button>
                                    <a href="pelatihan.php" class="btn btn-danger btn-block">Batal</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div><!-- /#right-panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
