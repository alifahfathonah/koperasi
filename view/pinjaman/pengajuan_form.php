<?php
include'../../class/koperasi_class.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$anggota = new anggota();
$pinjaman = new pinjaman();
?>
   <div class="form-group">
            <label for="recipient-name" class="control-label"><span class="label label-success">NAMA ANGGOTA</span></label>
            <input type="hidden" class="form-control" name="id_pin" value="<?php echo kdauto("pinjaman","0514"); ?>">
            <select class="form-control" name="id_anggota" required>
            <option value="">Pilih Anggota</option>
                    <?php
                      $arrayanggota=$anggota->showanggota();
                        if (count($arrayanggota)) {
                      foreach($arrayanggota as $d) {
                     ?>
                    <option value="<?php echo $d['id_anggota']?>"><?php echo $d['id_anggota'];?>- <strong><?php echo $d['nama'];?></strong></option>
                    <?php 
                        }
                      }
                    ?>
             
            </select>
          </div>
            <div class="form-group">
            <label for="recipient-name" class="control-label">Tanggal</label>
            <input type="text" class="form-control" name="tgl_pin" value="<?php echo date('Y-m-d'); ?>" required>
          </div>
          <!--
           <div class="form-group">
            <label for="recipient-name" class="control-label">Tanggal Acc</label>
            <input type="text" class="form-control" name="tgl_acc" required>
          </div>
          -->
            <div class="form-group">
            <label for="recipient-name" class="control-label">Jumlah Pinjaman</label>
            <input type="text" class="form-control" name="jumlah" required>
          </div>
            <div class="form-group">
            <label for="recipient-name" class="control-label">Jumlah Acc</label>
            <input type="text" class="form-control" name="jumlah_acc" required>
          </div>
               <div class="form-group">
            <label for="recipient-name" class="control-label">Jumlah Potongan</label>
            <input type="text" class="form-control" name="jumlah_pot" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Jumlah Administrasi</label>
            <input type="text" class="form-control" name="jumlah_adm" required>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="control-label">Keterangan</label>
            <input type="text" class="form-control" name="ket" required>
            <input type="hidden" class="form-control" name="acc" value="N" required>
          </div>