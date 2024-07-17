<?php
session_start();
include 'conf.php';

if (isset($_GET['opsi']) && $_GET['opsi'] == 'hapus' && isset($_GET['id_jenis_pelatihan'])) {
    $id_jenis_pelatihan = $_GET['id_jenis_pelatihan'];
    $query_delete = mysqli_query($conn, "DELETE FROM pelatihan WHERE id_jenis_pelatihan='$id_jenis_pelatihan'");

    if ($query_delete) {
        echo "<script>alert('Berhasil Dihapus');</script>";
        echo "<script>window.location.href='pelatihan.php';</script>";
    } else {
        echo "Gagal hapus ke database;";
    }
}
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin </title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
        
    <?php include 'sidebar.php'; ?>

    <div id="right-panel" class="right-panel">

        <?php include 'header.php'; ?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Data Pelatihan
                            <a href="data-barang.php" class="btn btn-info btn-sm">
                                <i class="fa fa-refresh"></i>
                                Refresh
                            </a>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Data</a></li>
                            <li><a href="#">jenis</a></li>
                            <li class="active">Pelatihan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table Pelatihan</strong>
                            <a href="tambah_pelatihan.php" class="btn btn-success btn-sm" style="margin-left: 20px;">
                                <i class="fa fa-plus"></i>
                                Tambah Pelatihan
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>ID Pelatihan</th>
                                        <th>Nama Pelatihan</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $query = mysqli_query($conn, "SELECT * FROM pelatihan ORDER BY id_jenis_pelatihan ASC");
                                    $no = 1;
                                    while ($data = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo htmlspecialchars($data['id_jenis_pelatihan']); ?>
                                        <td><?php echo htmlspecialchars($data['nama_pelatihan']); ?></td>
                                        <td class="text-white">
                                            <a class="btn btn-danger btn-sm" href="?opsi=hapus&id_jenis_pelatihan=<?php echo $data['id_jenis_pelatihan']; ?>">
                                                <i class="fa fa-times"></i>
                                                Hapus
                                            </a>
                                            <a class="btn btn-info btn-sm" href="edit_pelatihan.php?id_jenis_pelatihan=<?php echo $data['id_jenis_pelatihan']; ?>">
                                                <i class="fa fa-pencil"></i>
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                <?php    
                                        $no++;
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

    </div><!-- /#right-panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table').DataTable();
        });
    </script>

</body>
</html>