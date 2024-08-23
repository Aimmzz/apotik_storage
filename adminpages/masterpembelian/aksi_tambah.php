<?php
// untuk memasukkan file config_web.php dan file koneksi.php
include "../../lib/config_web.php";
include "../../lib/koneksi.php";

// Tes koneksi ke database
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// untuk menangkap variabel 'Nama_kategori' yang dikirim oleh form_tambah.php
$id_pembelian = $_POST['id_pembelian'];
$id_supplier = $_POST['id_supplier'];
$nama_supplier = $_POST['nama_supplier'];
$tgl_beli = $_POST['tgl_beli'];
$no_bukti = $_POST['no_bukti'];

// Persiapkan query dengan prepared statements
$querySimpan = mysqli_prepare($koneksi, "INSERT INTO beli (id_pembelian, id_supplier, nama_supplier, tgl_beli, no_bukti) VALUES (?, ?, ?, ?, ?)");

// Periksa apakah prepared statement berhasil dibuat
if ($querySimpan === false) {
    die("Error in SQL query: " . mysqli_error($koneksi));
}

// Bind parameter ke prepared statement
mysqli_stmt_bind_param($querySimpan, "sssss", $id_pembelian, $id_supplier, $nama_supplier, $tgl_beli, $no_bukti);

// Jalankan prepared statement
$executeResult = mysqli_stmt_execute($querySimpan);

// Periksa apakah prepared statement berhasil dieksekusi
if ($executeResult === false) {
    die("Error in SQL execution: " . mysqli_error($koneksi));
}

echo "<script> alert('Data Pembelian Berhasil Masuk'); window.location = '$admin_url'+'masterpembelian/main.php';</script>";

// Tutup prepared statement
mysqli_stmt_close($querySimpan);
?>
