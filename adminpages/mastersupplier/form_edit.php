<?php
session_start();

if (empty($_SESSION['username']) && empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else {
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $id_supplier = $_GET['id_supplier'];
    $query = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id_supplier='$id_supplier'");
    $dataSupplier = mysqli_fetch_array($query);

    include "../templates/header.php";
?>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3><small>Master Supplier</small></h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Form Edit <small>Master Supplier</small></h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="aksi_edit.php">
                                <input type="hidden" name="id_supplier" value="<?php echo $dataSupplier['id_supplier'];?>">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="id-supplier">ID Supplier <span class="required">*</span></label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                        <input type="text" id="id-supplier" name="id_supplier" value="<?php echo $dataSupplier['id_supplier'];?>" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>

                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="nama-supplier">Nama Supplier <span class="required">*</span></label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                        <input type="text" id="nama-supplier" name="nama_supplier" value="<?php echo $dataSupplier['nama_supplier'];?>" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>

                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="alamat-supplier">Alamat Supplier</label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                        <input type="text" id="alamat-supplier" name="alamat_supplier" value="<?php echo $dataSupplier['alamat_supplier'];?>" class="form-control col-md-7 col-xs-12">
                                    </div>

                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="telpon">No Telpon</label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                        <input type="text" id="telpon" name="telpon" value="<?php echo $dataSupplier['telpon'];?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-2">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>Simpan</button>
                                    </div>
                                </div>
                            </form>

                            <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-2">
                                <a href="<?php echo $admin_url; ?>mastersupplier/main.php"><button type="submit" class="btn btn-primary">Batal</button></a>
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
