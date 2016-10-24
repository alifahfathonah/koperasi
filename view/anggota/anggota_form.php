<?php
include'../../class/koperasi_class.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$anggota = new anggota();
?>
   <div class="form-group">
            <label for="recipient-name" class="control-label"><span class="label label-success">NAMA ANGGOTA</span></label>
            <input type="hidden" class="form-control" name="id_anggota" value="<?php echo kdauto("anggota","9205"); ?>">
            <input type="text" class="form-control" name="nama" required>
          </div>
            <div class="form-group">
            <label for="recipient-name" class="control-label">Nomor KTP</label>
            <input type="text" class="form-control" name="ktp" required>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="control-label">Tempat Lahir</label>
            <input type="text" class="form-control" name="tmpt_lahir" required>
          </div>
            <div class="form-group">
            <label for="recipient-name" class="control-label">Tanggal Lahir</label>
            <input type="text" class="form-control" name="tgl_lahir" required>
          </div>
            <div class="form-group">
            <label for="recipient-name" class="control-label">Alamat</label>
            <input type="text" class="form-control" name="alamat" required>
          </div>
               <div class="form-group">
            <label for="recipient-name" class="control-label">Koordinaor</label>
            <input type="text" class="form-control" name="kordinator" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Telpon</label>
            <input type="text" class="form-control" name="telpon" required>
            <input type="hidden" class="form-control" name="date_input" value="<?php echo date('y-m-d'); ?>" required>
          </div>