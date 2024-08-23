<?php 
session_start();

if (empty($_SESSION['username']) && empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $query = mysqli_query($koneksi, "SELECT id_obat from obat order by id_obat desc");

    $query_pembelian = mysqli_query($koneksi, "SELECT * FROM beli ORDER BY id_pembelian DESC");

    $kodeobat = mysqli_fetch_array($query);
    if ($kodeobat) {
        $nilai = substr($kodeobat[0], 1);
        $kode = (int) $nilai;

        $kode = $kode + 1;
        $auto_kode = "B" . str_pad($kode, 3, "0", STR_PAD_LEFT);
    } else {
        $auto_kode = "B001";
    }

    include "../templates/header.php"; 
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Master Obat</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Tambah</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="aksi_tambah.php">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="id_obat">ID Obat<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <input type="text" id="id_obat" name="id_obat" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $auto_kode;?>" readonly="readonly">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="id_pembelian">ID Pembelian<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                <select id="first-name" name="id_pembelian" required="required" class="form-control col-md-7 col-xs-12">
                                    <option value="">Select ID Pembelian</option>
                                    <?php
                                    // Loop through the supplier data and generate options
                                    while ($pembeli = mysqli_fetch_array($query_pembelian)) {
                                        echo "<option value='" . $pembeli['id_pembelian'] . "'>" . $pembeli['id_pembelian'] . "</option>";
                                    }
                                    ?>
                                </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="nama_obat">Nama Obat<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <input type="text" id="nama_obat" name="nama_obat" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="harga_beli">Harga Beli<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <input type="number" id="harga_beli" name="harga_beli" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="harga_jualsatuan">Harga Jual Satuan<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <input type="number" id="harga_jualsatuan" name="harga_jualsatuan" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="stok">Stok Obat<span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <input type="number" id="stok" name="stok" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-2">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                </div>
                            </div>
                        </form>
                        <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-2">
                            <a href="<?php echo $admin_url; ?>masterobat/main.php"><button class="btn btn-primary"><i class="fa fa-mail-forward"></i> Kembali</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    include "../templates/footer.php";
} 
?>
