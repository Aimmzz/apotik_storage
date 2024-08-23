<?php
	// untuk memasukkan file config_web.php dan file koneksi.php
	include "../../lib/config_web.php";
	include "../../lib/koneksi.php";

	// untuk menangkap variabel 'id_user' dan 'id_user' yang dikirim oleh form_edit.php
	$id_user = $_POST['id_user'];
	$user_name = $_POST['username'];
	$password = $_POST['password'];
	$hak_akses = $_POST['hak_akses'];
	$level = $_POST['level'];
	
	// query untuk mengubah ke tabel tbl obat
	
	$querySimpan = mysqli_query($koneksi, "UPDATE user SET id_user='$id_user',username='$user_name', password='$password', hak_akses='$hak_akses' , level='$level' WHERE id_user='$id_user'");

	// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar anggota
	if ($querySimpan) {
		echo "<script> alert('Data Supplier Berhasil Diubah'); window.location = '$admin_url'+'masteruser/main.php';</script>";
		// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form edit anggota
	} else {
		echo "<script> alert('Data User Gagal Diubah'); window.location = '$admin_url'+'masteruser/form_edit.php?id_user=$id_user';</script>";
	}
?>