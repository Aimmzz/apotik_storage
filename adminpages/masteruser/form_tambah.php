<?php 
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['level'])) {
  echo "<center>Untuk mengakses halaman, Anda harus login <br>";
  echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
  include "../../lib/config_web.php";
  include "../../lib/koneksi.php";



error_reporting(E_ALL); // Menampilkan semua pesan kesalahan (errors), termasuk E_NOTICE, E_WARNING, dll.
ini_set('display_errors', 1);

$query= mysqli_query($koneksi, "select id_user from user order by id_user desc");

$kodeUser=mysqli_fetch_array($query);
if($kodeUser){
  $nilai=substr($kodeUser[0], 1);
  $kode = (int) $nilai;

  $kode=$kode + 1;
  $auto_kode= "AD".str_pad($kode, 3,"0", STR_PAD_LEFT);
}else{
  $auto_kode="AD01";
}

include "../templates/header.php"; ?>

      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Manajemen <small>Master User</small></h3>
              </div>

            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Tambah <small>Data User</small></h2>
  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
          <form method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="aksi_tambah.php">

                      <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">ID User<span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="first-name" name="id_user" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
						
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">User name<span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="first-name" name="username" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
						
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Password<span class="required"></span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <input type="text" id="first-name" name="password" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
						
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Hak akses<span class="required">*</span>
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                          <select id="first-name" name="hak_akses" required="required" class="form-control col-md-7 col-xs-12">
                              <option value="Pimpinan">Pimpinan</option>
                              <option value="Admin">Admin</option>
                              <option value="Petugas">Petugas Obat</option>
                            </select>
                        </div>

                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Level<span class="required">*</span>
                        </label>
                          <div class="col-md-10 col-sm-10 col-xs-12">
                            <select id="first-name" name="level" required="required" class="form-control col-md-7 col-xs-12">
                              <option value="A">A</option>
                              <option value="B">B</option>
                              <option value="C">C</option>
                            </select>
                        </div>
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
                        <a href="<?php echo $admin_url; ?>masteruser/main.php"><button class="btn btn-primary"><i class="fa fa-mail-forward"></i> Kembali</button></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		<?php include "../templates/footer.php";

}		?>