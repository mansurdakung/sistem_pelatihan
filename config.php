<?php
$connect = mysqli_connect("localhost", "root", "") or die("Gagal Koneksi");

if (mysqli_select_db($connect, "pelatihan")) {
    // echo "DATABASE TERPILIH: pelatihan";
} else {
    die("Gagal memilih database: " . mysqli_error($connect));
}
?>
