<?php
session_start();
include 'conf.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tgl_daftar = $_POST['tgl_daftar'];
    $sls_daftar = $_POST['sls_daftar'];
    $tgl_pelatihan = $_POST['tgl_pelatihan'];
    $sls_pelatihan = $_POST['sls_pelatihan'];
    $tutor = $_POST['tutor'];
    $status_jadwal = $_POST['status_jadwal'];

    $query_insert = mysqli_query($conn, "INSERT INTO jadwal_pelatihan (tgl_daftar, sls_daftar, tgl_pelatihan, sls_pelatihan, tutor, status_jadwal) VALUES ('$tgl_daftar', '$sls_daftar', '$tgl_pelatihan', '$sls_pelatihan', '$tutor', '$status_jadwal')");

    if ($query_insert) {
        echo "<script>alert('Berhasil Menambah Data');</script>";
        echo "<script>window.location.href='index.php';</script>";
    } else {
        echo "Gagal menambah data ke database: " . mysqli_error($conn);
    }
}
?>

<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <title>Tambah Jadwal Pelatihan</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            margin: 20px auto;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px; /* Increased width */
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
        label {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <strong class="card-title">Tambah Jadwal Pelatihan</strong>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="tgl_daftar">Tanggal Daftar</label>
                            <input type="date" class="form-control" id="tgl_daftar" name="tgl_daftar" required>
                        </div>
                        <div class="form-group">
                            <label for="sls_daftar">Selesai Daftar</label>
                            <input type="date" class="form-control" id="sls_daftar" name="sls_daftar" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl_pelatihan">Tanggal Pelatihan</label>
                            <input type="date" class="form-control" id="tgl_pelatihan" name="tgl_pelatihan" required>
                        </div>
                        <div class="form-group">
                            <label for="sls_pelatihan">Selesai Pelatihan</label>
                            <input type="date" class="form-control" id="sls_pelatihan" name="sls_pelatihan" required>
                        </div>
                        <div class="form-group">
                            <label for="tutor">Nama Tutor</label>
                            <input type="text" class="form-control" id="tutor" name="tutor" required>
                        </div>
                        <div class="form-group">
                            <label for="status_jadwal">Status Jadwal</label>
                            <select id="status_jadwal" name="status_jadwal" class="form-control" required>
                                <option value="Aktif">Aktif</option>
                                <option value="Non-Aktif">Non-Aktif</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Simpan</button>
                        <a href="index.php" class="btn btn-danger btn-block">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- .row -->
</div><!-- .container -->

<script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
