<?php
error_reporting(E_ALL); // Menampilkan semua pesan kesalahan (errors), termasuk E_NOTICE, E_WARNING, dll.
ini_set('display_errors', 1);

include "../../lib/config_web.php";
include "../../lib/koneksi.php";

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

session_start();


// Untuk menangkap variabel 'Nama_kategori' yang dikirim oleh form_tambah.php
$id_user = $_POST['id_user'];
$user_name = $_POST['username'];
$password = $_POST['password'];
$hak_akses = $_POST['hak_akses'];
$level = $_POST['level'];

// Query untuk menyimpan ke tabel anggota
$querySimpan = mysqli_query($koneksi, "INSERT INTO user (id_user, username, password, hak_akses, level) VALUES ('$id_user','$user_name','$password','$hak_akses','$level')");

if ($querySimpan) {
    echo "<script>alert('Data User Berhasil Masuk'); window.location = '$admin_url'+'masteruser/main.php';</script>";
} else {
    echo "<script>alert('Data User Gagal Dimasukkan: " . mysqli_error($koneksi) . "');</script>";
}
?>
