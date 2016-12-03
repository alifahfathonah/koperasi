<?php
include'../../class/koperasi_class.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$anggota = new anggota();
$pinjaman = new pinjaman();
$d  = $pinjaman->bacapengajuan($id_pin);
?>
     <div class="form-group">
            <label for="recipient-name" class="control-label"><span class="label label-success">NAMA ANGGOTA</span></label>
            <input type="hidden" class="form-control" name="id_pin" value="<?php echo $d['id_pin']; ?>">
            <select class="form-control" name="id_anggota" required>
            <option value="<?php echo $d['id_anggota']; ?>"><?php echo $d['id_anggota']; ?>-<?php echo $d['nama']; ?></option>
                    <?php
                      $arrayanggota=$anggota->showanggota();
                        if (count($arrayanggota)) {
                      foreach($arrayanggota as $da) {
                     ?>
                    <option value="<?php echo $da['id_anggota']?>"><?php echo $d['id_anggota'];?>- <strong><?php echo $da['nama'];?></strong></option>
                    <?php 
                        }
                      }
                    ?>
            </select>
          </div>
            <div class="form-group">
            <label for="recipient-name" class="control-label">Tanggal</label>
            <input type="text" class="form-control" name="tgl_pin" value="<?php echo $d['tgl_pin']; ?>" required>
          </div>
          <!--
           <div class="form-group">
            <label for="recipient-name" class="control-label">Tanggal Acc</label>
            <input type="text" class="form-control" name="tgl_acc" required>
          </div>
          -->
            <div class="form-group">
            <label for="recipient-name" class="control-label">Jumlah Pinjaman</label>
            <input type="text" class="form-control" name="jumlah" value="<?php echo $d['jumlah']; ?>" required>
          </div>
            <div class="form-group">
            <label for="recipient-name" class="control-label">Jumlah Acc</label>
            <input type="text" class="form-control" name="jumlah_acc" value="<?php echo $d['jumlah_acc']; ?>" required>
          </div>
               <div class="form-group">
            <label for="recipient-name" class="control-label">Jumlah Potongan</label>
            <input type="text" class="form-control" name="jumlah_pot" value="<?php echo $d['jumlah_pot']; ?>" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Jumlah Administrasi</label>
            <input type="text" class="form-control" name="jumlah_adm" value="<?php echo $d['jumlah_adm']; ?>" required>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="control-label">Keterangan</label>
            <input type="text" class="form-control" name="ket" value="<?php echo $d['ket']; ?>" required>
            <input type="hidden" class="form-control" name="acc" value="N" required>
          </div>
            <div class="form-group">
            <label for="recipient-name" class="control-label">Status</label>
            <select class="form-control" name="status" required>
            <option value="<?php echo $d['status']; ?>"><?php echo $d['status']; ?></option>
            <option value="LUNAS">LUNAS</option>
            <option value="PROSES">PROSES</option>
            <option value="BATAL">BATAL</option>
            </select>
          </div>