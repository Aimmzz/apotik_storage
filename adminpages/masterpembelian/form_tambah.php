<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    // Retrieve supplier data from the database
    $query_supplier = mysqli_query($koneksi, "SELECT * FROM supplier ORDER BY id_supplier DESC");

    $kodeBeli = mysqli_fetch_array(mysqli_query($koneksi, "SELECT id_pembelian FROM beli ORDER BY id_pembelian DESC"));
    if ($kodeBeli) {
        $nilai = substr($kodeBeli[0], 1);
        $kode = (int) $nilai;

        $kode = $kode + 1;
        $auto_kode = "L" . str_pad($kode, 3, "0", STR_PAD_LEFT);
    } else {
        $auto_kode = "L001";
    }
    include "../templates/header.php";
?>

<!-- konten halaman -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>MASTER PEMBELIAN</h3>
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
                    <br />
                    <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="aksi_tambah.php">

                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">ID Pembelian<span class="required"></span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input type="text" id="first-name" name="id_pembelian" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $auto_kode; ?>" readonly="readonly">
                            </div>

                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">ID Supplier<span class="required"></span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <!-- Use a dropdown/select element for ID Supplier -->
                                <select id="first-name" name="id_supplier" required="required" class="form-control col-md-7 col-xs-12">
                                    <option value="">Select ID Supplier</option>
                                    <?php
                                    // Loop through the supplier data and generate options
                                    while ($supplier = mysqli_fetch_array($query_supplier)) {
                                        echo "<option value='" . $supplier['id_supplier'] . "'>" . $supplier['id_supplier'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama Supplier<span class="required"></span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input type="text" id="first-name" name="nama_supplier" required="required" class="form-control col-md-7 col-xs-12">
                            </div>

                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Tanggal Beli<span class="required"></span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input type="date" id="first-name" name="tgl_beli" required="required" class="form-control col-md-7 col-xs-12">
                            </div>

                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">No Bukti<span class="required"></span>
                            </label>
                            <div class="col-md-10 col-sm-10 col-xs-12">
                                <input type="text" id="first-name" name="no_bukti" required="required" class="form-control col-md-7 col-xs-12">
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
                        <a href="<?php echo $admin_url; ?>masterpembelian/main.php"><button class="btn btn-primary"><i class="fa fa-mail-forward"></i> Kembali</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "../templates/footer.php";
} ?>
