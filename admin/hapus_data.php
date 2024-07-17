<?php
session_start();
include 'conf.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data dari database
    $query = "DELETE FROM jadwal_pelatihan WHERE id='$id'";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil dihapus!');</script>";
        echo "<script>window.location.href='permintaan.php';</script>";
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('ID tidak ditemukan!');</script>";
    echo "<script>window.location.href='permintaan.php';</script>";
}
?>
