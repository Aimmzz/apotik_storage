<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'id_obat' dan 'id_obat' yang dikirim oleh form_edit.php
	$id_obat = $_POST['id_obat'];
	$id_pembelian=$_POST['id_pembelian'];
	$nama_obat = $_POST['nama_obat'];
	$harga_beli = $_POST['harga_beli'];
	$harga_jualsatuan = $_POST['harga_jualsatuan'];
	$stok = $_POST['stok'];
	
	// query untuk mengubah ke tabel tbl obat
	
	$querySimpan = mysqli_query($koneksi, "UPDATE obat SET id_obat='$id_obat',id_pembelian='$id_pembelian',nama_obat='$nama_obat', harga_beli='$harga_beli', harga_jualsatuan='$harga_jualsatuan', stok='$stok' WHERE id_obat='$id_obat'");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar anggota
	if ($querySimpan) {
		echo "<script> alert('Data obat Berhasil Diubah'); window.location = '$admin_url'+'masterobat/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form edit anggota
	} else {
		echo "<script> alert('Data Obat Gagal Diubah'); window.location = '$admin_url'+'masterobat/form_edit.php?id_obat=$id_obat';</script>";
	}
?>