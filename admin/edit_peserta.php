<?php
session_start();
include 'conf.php';

if (isset($_GET['id_pendaftaran'])) {
    $id = $_GET['id_pendaftaran'];

    // Fetch the current data
    $query = mysqli_query($conn, "SELECT * FROM pendaftaran WHERE id_pendaftaran='$id'");
    $data = mysqli_fetch_array($query);

    // Check if data is found
    if (!$data) {
        echo "<script>alert('Data tidak ditemukan.');</script>";
        echo "<script>window.location.href='peserta.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('ID tidak diberikan.');</script>";
    echo "<script>window.location.href='peserta.php';</script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pendaftaran = $_POST['id_pendaftaran'];
    $id_user = $_POST['id_user'];
    $id_jadwal = $_POST['id_jadwal'];
    $tanggal_daftar = $_POST['tanggal_daftar'];

    // Update the record
    $query_update = mysqli_query($conn, "UPDATE pendaftaran SET id_user='$id_user', id_jadwal='$id_jadwal', tanggal_daftar='$tanggal_daftar' WHERE id_pendaftaran='$id_pendaftaran'");

    if ($query_update) {
        echo "<script>alert('Berhasil Mengupdate Data');</script>";
        echo "<script>window.location.href='peserta.php';</script>";
    } else {
        echo "Gagal mengupdate data ke database: " . mysqli_error($conn);
    }
}
?>
<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <title>Edit Peserta</title>
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
            max-width: 500px;
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

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <strong class="card-title">Edit Peserta</strong>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="id_pendaftaran">ID Pendaftaran</label>
                            <input type="text" class="form-control" id="id_pendaftaran" name="id_pendaftaran" value="<?php echo $data['id_pendaftaran']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="id_user">ID User</label>
                            <input type="text" class="form-control" id="id_user" name="id_user" value="<?php echo $data['id_user']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="id_jadwal">ID Jadwal</label>
                            <input type="text" class="form-control" id="id_jadwal" name="id_jadwal" value="<?php echo $data['id_jadwal']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_daftar">Tanggal Daftar</label>
                            <input type="date" class="form-control" id="tanggal_daftar" name="tanggal_daftar" value="<?php echo $data['tanggal_daftar']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Update</button>
                        <a href="peserta.php" class="btn btn-danger btn-block">Batal</a>
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