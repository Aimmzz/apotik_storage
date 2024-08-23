<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
    include "../../lib/config_web.php";
    include "../../lib/koneksi.php";

    $id_obat = $_GET['id_obat'];
    $query = mysqli_query($koneksi, "SELECT * FROM obat WHERE id_obat='$id_obat'");
    $dataObat = mysqli_fetch_array($query); 

    include "../templates/header.php";
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><small>Master Obat</small></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Tambah <small>Master Obat</small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="aksi_edit.php">
                            <input type="hidden" name="id_obat" value="<?php echo $dataObat['id_obat'];?>">
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">ID Obat <span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <input type="text" id="first-name" name="id_obat" value="<?php echo $dataObat['id_obat'];?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>

                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">ID Pembelian <span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <input type="text" id="first-name" name="id_pembelian" value="<?php echo $dataObat['id_pembelian'];?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>

                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama Obat <span class="required">*</span>
                                </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <input type="text" id="first-name" name="nama_obat" value="<?php echo $dataObat['nama_obat'];?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>

                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Harga Beli <span class="required"></span>
                                </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <input type="text" id="first-name" name="harga_beli" value="<?php echo $dataObat['harga_beli'];?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>

                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Harga Jual Satuan <span class="required"></span>
                                </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <input type="text" id="first-name" name="harga_jualsatuan" value="<?php echo $dataObat['harga_jualsatuan'];?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>

                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Stok <span class="required"></span>
                                </label>
                                <div class="col-md-10 col-sm-10 col-xs-12">
                                    <input type="text" id="first-name" name="stok" value="<?php echo $dataObat['stok'];?>" required="required" class="form-control col-md-7 col-xs-12">
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
                            <a href="<?php echo $admin_url; ?>masterobat/main.php"><button type="submit" class="btn btn-primary">Batal</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "../templates/footer.php"; 
}
?>
