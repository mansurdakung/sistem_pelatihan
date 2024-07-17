<!-- Add this CSS in the <head> section of your HTML or in a separate CSS file -->
<style>
    .left-panel {
        background-color: blue;
    }
    .navbar-default .navbar-nav > li > a {
        color: white; /* To ensure the text is visible on the blue background */
        font-size: 15px; /* Set font size to 20px */
        font-weight: bold; /* Make text bold */
    }
    .navbar-default .navbar-nav > li.active > a {
        background-color: darkblue; /* Highlight active menu item */
    }
</style>

<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./">Daftar Peserta Pelatihan</a>
            <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>                                                                           
                <li><a href="pelatihan.php"><i class="menu-icon fa fa-tasks"></i>Pelatihan</a></li>
                <li><a href="permintaan.php"><i class="menu-icon fa fa-tasks"></i>Jadwal Pelatihan</a></li>
                <li><a href="peserta.php"><i class="menu-icon fa fa-tasks"></i>Daftar Peserta</a></li>                                                               
                <li><a href="data-user.php"><i class="menu-icon fa fa-tasks"></i>Data User</a></li>
                <!--li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Tambah User</a></li-->                           

                <li class="active">
                    <a href="logout.php"> <i class="menu-icon fa fa-sign-out"></i>Logout </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->
