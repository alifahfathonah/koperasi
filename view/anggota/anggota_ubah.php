<?php
include'../../class/koperasi_class.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$anggota = new anggota();
$d  = $anggota->bacaangg($id_anggota);
?>
   <div class="form-group">
            <label for="recipient-name" class="control-label"><span class="label label-success">NAMA ANGGOTA</span></label>
            <input type="hidden" class="form-control" name="id_anggota" value="<?php echo $d['id_anggota']; ?>">
            <input type="text" class="form-control" name="nama" value="<?php echo $d['nama']; ?>" required>
          </div>
            <div class="form-group">
            <label for="recipient-name" class="control-label">Nomor KTP</label>
            <input type="text" class="form-control" name="ktp" value="<?php echo $d['ktp']; ?>" required>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="control-label">Tempat Lahir</label>
            <input type="text" class="form-control" name="tmpt_lahir" value="<?php echo $d['tmpt_lahir']; ?>" required>
          </div>
            <div class="form-group">
            <label for="recipient-name" class="control-label">Tanggal Lahir</label>
            <input type="text" class="form-control" name="tgl_lahir" value="<?php echo $d['tgl_lahir']; ?>" required>
          </div>
            <div class="form-group">
            <label for="recipient-name" class="control-label">Alamat</label>
            <input type="text" class="form-control" name="alamat" value="<?php echo $d['alamat']; ?>" required>
          </div>
               <div class="form-group">
            <label for="recipient-name" class="control-label">Koordinaor</label>
            <input type="text" class="form-control" name="kordinator" value="<?php echo $d['kordinator']; ?>" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Telpon</label>
            <input type="text" class="form-control" name="telpon" value="<?php echo $d['telpon']; ?>" required>
            <input type="hidden" class="form-control" name="date_input" value="<?php echo $d['date_input']; ?>" required>
          </div>