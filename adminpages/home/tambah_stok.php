<?php 
session_start();
include "../../lib/config_web.php";
include "../../lib/koneksi.php";
include "../templates/header.php";

if (isset($_GET['id_obat'])) {
  $id_obat = $_GET['id_obat'];

  // Query untuk mendapatkan data obat berdasarkan id
  $query_obat = "SELECT * FROM obat WHERE id_obat = '$id_obat'";
  $result_obat = mysqli_query($koneksi, $query_obat);
  $data_obat = mysqli_fetch_assoc($result_obat);

  if (!$data_obat) {
    echo "Data obat tidak ditemukan.";
    exit();
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $tambah_stok = $_POST['tambah_stok'];
  $query_update_stok = "UPDATE obat SET stok = stok + $tambah_stok WHERE id_obat = '$id_obat'";
  $result_update_stok = mysqli_query($koneksi, $query_update_stok);

  if ($result_update_stok) {
    echo "<script>alert('Stok obat berhasil ditambahkan.'); window.location.href = 'main.php';</script>";
  } else {
    echo "Gagal menambahkan stok obat.";
  }
}
?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="x_panel">
        <div class="x_title">
          <h2>Tambah Stok Obat</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <form method="post">
            <div class="form-group">
              <label for="tambah_stok">Tambah Stok</label>
              <input type="number" class="form-control" id="tambah_stok" name="tambah_stok" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Stok</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include "../templates/footer.php"; ?>
