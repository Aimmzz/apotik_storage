<?php 
session_start();
include "../../lib/config_web.php";
include "../../lib/koneksi.php";
include "../templates/header.php";

// Query untuk mengambil data total user dari database
$query_user = "SELECT COUNT(*) AS total_user FROM user";
$result = mysqli_query($koneksi, $query_user);
$row = mysqli_fetch_assoc($result);
$totalUser = $row['total_user'];

// Query untuk mengambil data total obat dari database
$query_obat = "SELECT COUNT(*) AS total_obat FROM obat";
$result = mysqli_query($koneksi, $query_obat);
$row = mysqli_fetch_assoc($result);
$totalObat = $row['total_obat'];

// Query untuk mengambil data total supplier dari database
$query_supplier = "SELECT COUNT(*) AS total_supplier FROM supplier";
$result = mysqli_query($koneksi, $query_supplier);
$row = mysqli_fetch_assoc($result);
$totalSupplier = $row['total_supplier'];

// Query untuk mengambil data total pembelian dari database
$query_beli = "SELECT COUNT(*) AS total_pembelian FROM beli";
$result = mysqli_query($koneksi, $query_beli);
$row = mysqli_fetch_assoc($result);
$totalPembelian = $row['total_pembelian'];

// Query untuk mengambil data total penjualan dari database
$query_transaksi = "SELECT COUNT(*) AS total_penjualan FROM transaksi";
$result = mysqli_query($koneksi, $query_transaksi);
$row = mysqli_fetch_assoc($result);
$totalPenjualan = $row['total_penjualan'];

// Query untuk mengambil data total stok obat dari database
$query_total_obat = "SELECT SUM(stok) AS total_jumlah_obat FROM obat";
$result = mysqli_query($koneksi, $query_total_obat);
$row = mysqli_fetch_assoc($result);
$totalJumlahObat = $row['total_jumlah_obat'];

// Query untuk mengambil data obat yang stok nya kosong dari database
$query_obat_stok_nol = "SELECT id_obat, nama_obat, stok AS stok FROM obat WHERE stok = 0";
$result_obat_stok_nol = mysqli_query($koneksi, $query_obat_stok_nol);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="row tile_count">
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total User</span>
      <div class="count"><?php echo $totalUser; ?></div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i> From last Mount</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-clock-o"></i> Total Obat</span>
      <div class="count"><?php echo $totalObat; ?></div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i> From last Mounth</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Supplier</span>
      <div class="count"><?php echo $totalSupplier; ?></div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i> From last Mounth</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Pembelian</span>
      <div class="count"><?php echo $totalPembelian; ?></div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i> From last Mounth</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Penjualan</span>
      <div class="count"><?php echo $totalPenjualan; ?></div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i> From last Mounth</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Stock Obat</span>
      <div class="count"><?php echo $totalJumlahObat; ?></div>
      <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i></i> From last Mounth</span>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Daftar Obat dengan Stok Kosong</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Obat</th>
                <th>Stok</th>
                <!-- <th>Tambah Stok</th> -->
              </tr>
            </thead>
            <tbody>
            <?php
            $no = 1;
            while ($row_obat_stok_nol = mysqli_fetch_assoc($result_obat_stok_nol)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . $row_obat_stok_nol['nama_obat'] . "</td>";
            echo "<td>" . $row_obat_stok_nol['stok'] . "</td>";
            // echo "<td><a href='tambah_stok.php?id_obat=" . $row_obat_stok_nol['id_obat'] . "'><button type='submit' class='btn btn-primary'>Tambah</button></a></td>";
            echo "</tr>";
            }
            ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
<?php include "../templates/footer.php"; ?>
