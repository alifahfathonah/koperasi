<?php
include'../../class/koperasi_class.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$angsuran = new angsuran();
?>
            <div class="form-group ">
            <label for="recipient-name" class="control-label">Tanggal</label>
            <input type="hidden" class="form-control" name="id_ang" value="<?php echo kdauto("angsuran","16"); ?>" required>
            <input type="hidden" class="form-control" name="id_pin" value="<?php echo $_GET['id_pin'] ?>" required>
            <input type="text" class="form-control" name="tgl_ang" value="<?php echo date('Y-m-d'); ?>" required>
          </div>
            <div class="form-group">
            <label for="recipient-name" class="control-label">Jumlah Angsuran</label>
            <input type="text" class="form-control" name="jum_ang" value="100000" required>
          </div>
            <div class="form-group">
            <label for="recipient-name" class="control-label">Keterangan</label>
            <input type="text" class="form-control" name="ket">
          </div>