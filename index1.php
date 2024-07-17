<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Pelatihan Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="tambahan/bootstrap-4.1.3/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="tambahan/bootstrap-4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="tambahan/font-awesome/css/font-awesome.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        .login-text {
            font-size: 20px;
        }
    </style>
</head>
<body>
    <header>
        <div class="bg-dark collapse" id="menuTop">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="text-white">Tentang Kami?</h4>
                        <p class="text-muted">Sistem Pelatihan Mahasiswa adalah aplikasi berbasis web yang dibuat untuk mempermudah mahasiswa dalam mendaftar pelatihan kegiatan sekolah.</p>
                    </div>
                    <div class="col-sm-4">
                        <h4 class="text-white">Kontak</h4>
                        <p class="text-muted">
                            <i class="fa fa-phone"></i> +62 815 5536 5579<br>
                            <i class="fa fa-envelope"></i> email@email.com
                        </p>
                        <h4 class="text-white">Login</h4>
                        <form action="proses-login.php" method="post">
                            <input class="form-control" type="text" name="username" placeholder="Username"><br>
                            <input class="form-control" type="password" name="password" placeholder="Password"><br>
                            <button type="submit" name="login" class="btn btn-primary">Login</button> 
                            <span class="text-muted"> Tidak punya akun? </span><a href="register.php">Daftar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark btn-success shadow-sm">
            <div class="container">
                <a class="navbar-brand align-items-center" style="color:#fff;">
                    <strong> </strong>
                </a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#menuTop" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>
 
    <main role="main">
        <section class="jumbotron text-center" style="background: #fff;">
            <div class="container">
                <h3 class="">Selamat Datang </h3>
                <?php 
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    echo $username;
                ?>
                    <a href="logout.php" class="btn btn-success btn-sm">Silahkan Anda Login</a><br>
                <?php
                }
                ?>
                <h1 class="jumbotron-heading" style="font-style: italic;">Selamat Pendaftaran Anda Sukses</h1>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <?php
                    include 'admin/conf.php';

                    $query = mysqli_query($conn, "SELECT * FROM pelatihan ORDER BY id ASC");
                    if ($query) {
                        while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <!-- Tampilkan data pelatihan di sini -->
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- Tombol Kembali -->
        <div class="text-center mb-4">
            <a href="login.php" class="btn btn-success login-text">Silahkan Login</a>
        </div>
    </main>

    <script type="text/javascript" src="tambahan/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="tambahan/bootstrap-4.1.3/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="tambahan/bootstrap-4.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
