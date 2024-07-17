<?php
session_start();
include 'conf.php';

if (isset($_GET['id_pendaftaran'])) {
    $id_pendaftaran = $_GET['id_pendaftaran'];

    // Prepare the delete statement
    $query_delete = mysqli_query($conn, "DELETE FROM pendaftaran WHERE id_pendaftaran='$id_pendaftaran'");

    if ($query_delete) {
        echo "<script>alert('Berhasil Dihapus');</script>";
        echo "<script>window.location.href='peserta.php';</script>";
    } else {
        echo "Gagal hapus ke database: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('ID tidak diberikan.');</script>";
    echo "<script>window.location.href='peserta.php';</script>";
}
?>
