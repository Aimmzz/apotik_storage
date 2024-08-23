<?php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $id_obat = $_GET['id_obat'];
    $queryHapus = mysqli_query($koneksi, "DELETE FROM obat WHERE id_obat='$id_obat'");
    if ($queryHapus) {
        echo "<script> alert('Data Obat Berhasil Dihapus'); window.location = '$admin_url'+'masterobat/main.php';</script>";
    } else {
        echo "<script> alert('Data Obat Gagal Dihapus'); window.location = '$admin_url'+'masterobat/main.php';</script>";

    }
?>