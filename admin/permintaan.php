<?php
session_start();
include 'conf.php';
?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Peserta Pelatihan</title>
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
                        <h1>Jadwal Pelatihan
                            <a href="permintaan.php" class="btn btn-info btn-sm">
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
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Jadwal</a></li>
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
                            <strong class="card-title">Jadwal Pelatihan</strong>
                            <a href="tambah_data.php" class="btn btn-success btn-sm" style="margin-left: 15px;">
                                <i class="fa fa-plus"></i> Tambah Data
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tggl Daftar</th>
                                        <th>Selesai Daftar</th>
                                        <th>Tggl Pelatihan</th>
                                        <th>Selesai Pelatihan</th>
                                        <th>Nama Tutor</th> 
                                        <th>Status Jadwal</th>                            
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT * FROM jadwal_pelatihan ORDER BY id DESC");
                                    
                                    if ($query) {
                                        $no = 1;
                                        while ($data = mysqli_fetch_array($query)) {
                                            $id = $data['id'];
                                            $tgl_daftar = $data['tgl_daftar'];
                                            $sls_daftar = $data['sls_daftar'];
                                            $tgl_pelatihan = $data['tgl_pelatihan'];
                                            $sls_pelatihan = $data['sls_pelatihan'];
                                            $tutor = $data['tutor'];
                                            $status_jadwal = $data['status_jadwal'];
                                    ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo htmlspecialchars($tgl_daftar); ?></td>
                                                <td><?php echo htmlspecialchars($sls_daftar); ?></td>
                                                <td><?php echo htmlspecialchars($tgl_pelatihan); ?></td>
                                                <td><?php echo htmlspecialchars($sls_pelatihan); ?></td>
                                                <td><?php echo htmlspecialchars($tutor); ?></td>
                                                <td><?php echo htmlspecialchars($status_jadwal); ?></td>                                  
                                                <td>
                                                    <div class="btn-group">
                                                        <a class="btn btn-danger btn-sm" href="hapus_data.php?id=<?php echo $data['id']; ?>">
                                                            <i class="fa fa-times"></i>
                                                            Hapus
                                                        </a>
                                                        <a class="btn btn-info btn-sm" href="edit_data.php?id=<?php echo $data['id']; ?>">
                                                            <i class="fa fa-pencil"></i>
                                                            Edit
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php   
                                            $no++;
                                        }
                                    } else {
                                    ?>
                                        <tr>
                                            <td colspan="8">Data Kosong</td>
                                        </tr>                        
                                    <?php
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
