<?php
session_start();

if (empty($_SESSION['username']) && empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else {
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $query = mysqli_query($koneksi, "SELECT id_supplier FROM supplier ORDER BY id_supplier DESC");

    $kodeSupplier = mysqli_fetch_array($query);

    if ($kodeSupplier) {
        $nilai = substr($kodeSupplier[0], 1);
        $kode = (int) $nilai;
        $kode = $kode + 1;
        $auto_kode = "S" . str_pad($kode, 3, "0", STR_PAD_LEFT);
    } else {
        $auto_kode = "S001";
    }

    include "../templates/header.php";
?>

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manajemen <small>Master Supplier</small></h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Form Tambah <small>Data Supplier</small></h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="aksi_tambah.php">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">ID Supplier<span class="required">*</span>
                                    </label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                        <input type="text" id="first-name" name="id_supplier" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $auto_kode;?>" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama Supplier<span class="required">*</span>
                                    </label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                        <input type="text" id="first-name" name="nama_supplier" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Alamat Supplier<span class="required"></span>
                                    </label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                        <input type="text" id="first-name" name="alamat_supplier" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">No Telfon<span class="required">*</span>
                                    </label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                        <input type="text" id="first-name" name="telpon" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-2">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-2">
                            <a href="<?php echo $admin_url; ?>mastersupplier/main.php"><button class="btn btn-primary"><i class="fa fa-mail-forward"></i> Kembali</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "../templates/footer.php";
}
?>
