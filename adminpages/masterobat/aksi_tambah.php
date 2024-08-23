<?php
    // untuk memasukkan file config_web.php dan file koneksi.php
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    // untuk menangkap variabel 'Nama_kategori' yang dikirim oleh form_tambah.php
    $id_obat = $_POST['id_obat'];
    $id_pembelian = $_POST['id_pembelian'];
    $nama_obat = $_POST['nama_obat'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jualsatuan = $_POST['harga_jualsatuan'];
    $stok = $_POST['stok'];

    // query untuk menyimpan ke tabel obat
    $querySimpan = mysqli_query(
        $koneksi, "INSERT INTO obat (id_obat, id_pembelian, nama_obat, harga_beli, harga_jualsatuan, stok) 
        VALUES ('$id_obat','$id_pembelian','$nama_obat','$harga_beli','$harga_jualsatuan', '$stok')");
    
    // $querySimpan = mysqli_query($koneksi, 
	// "INSERT INTO supplier (id_supplier,nama_supplier, alamat_supplier, telpon) 
	// VALUES ('$id_supplier','$nama_supplier','$alamat_supplier','$telpon')");

    // // jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar obat
    // if ($querySimpan) {
    //     echo "<script> alert('Data Obat Berhasil Masuk'); window.location = '$admin_url'+'masterobat/main.php';</script>";
    // } else {
    //     echo "<script> alert('Data Obat Gagal Dimasukkan. Error: " . mysqli_error($koneksi) . "'); window.location = '$admin_url'+'masterobat/form_tambah.php';</script>";
    // }
    // if ($querySimpan) {
	// 	echo "<script> alert('Data Obat Berhasil Masuk');
	// 	 window.location = '$admin_url'+'masteroabt/main.php';</script>";
	// 	// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
	// } else {
	// 	echo "<script> alert('Data Obat Gagal Dimasukkan'); 
	// 	window.location = '$admin_url'+'masterobat/form_tambah.php';</script>";
	// }
    if ($querySimpan) {
    echo "<script> alert('Data Obat Berhasil Masuk');
        window.location = '$admin_url'+'masterobat/main.php';</script>";
    // jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah kategori
} else {
    $errorMessage = mysqli_error($koneksi); // Ambil pesan error dari MySQL (gantilah dengan fungsi sesuai dengan database Anda)

    echo "<script> alert('Data Obat Gagal Dimasukkan. Error: " . addslashes($errorMessage) . "'); 
    window.location = '$admin_url'+'masterobat/form_tambah.php';</script>";
}
?>