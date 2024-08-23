<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
include "../../lib/config_web.php";
include "../../lib/koneksi.php";

$id_user = $_GET['id_user'];
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'");

$dataUser = mysqli_fetch_array($query); 

include "../templates/header.php"; ?>
      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><small>Master User</small></h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Edit <small>Master User</small></h2>
  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
    <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="aksi_edit.php">
    <input type="hidden" name="id_user" value="<?php echo $dataUser['id_user'];?>">
    <div class="form-group">

    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">ID User <span class="required">*</span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="id_user" value="<?php echo $dataUser['id_user'];?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>

    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">User name <span class="required">*</span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="username" value="<?php echo $dataUser['username'];?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>

    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Password <span class="required"></span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="password" value="<?php echo $dataUser['password'];?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>

    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Hak akses <span class="required"></span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="hak_akses" value="<?php echo $dataUser['hak_akses'];?>" required="required" class="form-control col-md-7 col-xs-12">
    </div>

    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Level <span class="required"></span>
    </label>
    <div class="col-md-10 col-sm-10 col-xs-12">
      <input type="text" id="first-name" name="level" value="<?php echo $dataUser['level'];?>" required="required" class="form-control col-md-7 col-xs-12">
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
    <a href="<?php echo $admin_url; ?>masteruser/main.php"><button class="btn btn-primary"><i class="fa fa-mail-forward"></i> Kembali</button></a>
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