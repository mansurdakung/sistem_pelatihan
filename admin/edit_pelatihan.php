<?php
session_start();
include 'conf.php';

// Mengecek apakah 'id_jenis_pelatihan' ada di dalam URL
if (isset($_GET['id_jenis_pelatihan'])) {
    $id_jenis_pelatihan = $_GET['id_jenis_pelatihan'];
    
    // Mengecek apakah ID valid dan query berhasil
    $query_get = mysqli_query($conn, "SELECT * FROM pelatihan WHERE id_jenis_pelatihan='$id_jenis_pelatihan'");
    if ($query_get && mysqli_num_rows($query_get) > 0) {
        $data = mysqli_fetch_assoc($query_get);
    } else {
        echo "<script>alert('Data tidak ditemukan');</script>";
        echo "<script>window.location.href='pelatihan.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('ID tidak ditemukan');</script>";
    echo "<script>window.location.href='pelatihan.php';</script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_jenis_pelatihan = $_POST['id'];
    $nama_pelatihan = $_POST['nama_pelatihan'];

    $query_update = mysqli_query($conn, "UPDATE pelatihan SET nama_pelatihan='$nama_pelatihan' WHERE id_jenis_pelatihan='$id_jenis_pelatihan'");

    if ($query_update) {
        echo "<script>alert('Berhasil Mengedit Data');</script>";
        echo "<script>window.location.href='pelatihan.php';</script>";
    } else {
        echo "Gagal mengedit data di database: " . mysqli_error($conn);
    }
}
?>

<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <title>Edit Pelatihan</title>
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
                                <strong class="card-title">Edit Pelatihan</strong>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="">
                                    <input type="hidden" name="id" value="<?php echo $data['id_jenis_pelatihan']; ?>">
                                    <div class="form-group">
                                        <label for="nama_pelatihan">Nama Pelatihan</label>
                                        <input type="text" class="form-control" id="nama_pelatihan" name="nama_pelatihan" value="<?php echo $data['nama_pelatihan']; ?>" required>
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
