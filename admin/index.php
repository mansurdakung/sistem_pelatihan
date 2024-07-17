<?php
session_start();
include '../config.php';

if (!isset($_SESSION['email'])) {
    header("location: ../index.php");
    exit();
}
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - Daftar Peserta Pelatihan</title>
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
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script>
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div id="right-panel" class="right-panel">
        <?php include 'header.php'; ?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count">
                                <?php
                                $query_user = mysqli_query($connect, "SELECT COUNT(*) AS total_user FROM user");
                                if ($query_user) {
                                    $total_user = mysqli_fetch_array($query_user);
                                    echo $total_user['total_user'];
                                }
                                ?>  
                            </span>
                        </h4>
                        <p class="text-light">User Terdaftar</p>
                        <a href="data-user.php" class="btn btn-success btn-sm">Lihat</a>
                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart1"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count">
                                <?php
                                $query_barang = mysqli_query($connect, "SELECT SUM(stok_barang) AS stok FROM pelatihan");
                                if ($query_barang) {
                                    $total_barang = mysqli_fetch_array($query_barang);
                                    echo $total_barang['stok'];
                                }
                                ?>
                            </span>
                        </h4>
                        <p class="text-light">Data Pelatihan</p>
                        <a href="Pelatihan.php" class="btn btn-success btn-sm">Lihat</a>
                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count">
                                <?php
                                $query_request = mysqli_query($connect, "SELECT COUNT(*) AS total_req_pinjam FROM tbl_request");
                                if ($query_request) {
                                    $total_request = mysqli_fetch_array($query_request);
                                    echo $total_request['total_req_pinjam'];
                                }
                                ?>  
                            </span>
                        </h4>
                        <p class="text-light">Jadwal Pelatihan</p>
                        <a href="permintaan.php" class="btn btn-success btn-sm">Lihat</a>
                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart3"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count">
                                <?php
                                $query_barang_pinjam = mysqli_query($connect, "SELECT SUM(jml_barang) AS jml_barang FROM tbl_pinjam");
                                if ($query_barang_pinjam) {
                                    $total_barang_pinjam = mysqli_fetch_array($query_barang_pinjam);
                                    echo $total_barang_pinjam['jml_barang'];
                                }
                                ?>
                            </span>
                        </h4>
                        <p class="text-light">Status Pelatihan</p>
                        <a href="status.php" class="btn btn-success btn-sm">Lihat</a>
                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>
</body>
</html>
