<?php
include'../../class/koperasi_class.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$anggota = new anggota();
$pinjaman = new pinjaman();
$d  = $pinjaman->bacapengajuan($id_pin);
?>
     
            <input type="hidden" class="form-control" name="id_pin" value="<?php echo $d['id_pin']; ?>">
            <input type="hidden" class="form-control" name="id_anggota" value="<?php echo $d['id_anggota']; ?>">
            <input type="hidden" class="form-control" name="tgl_pin" value="<?php echo $d['tgl_pin']; ?>" required>
            <input type="hidden" class="form-control" name="tgl_acc" value="<?php echo date('Y-m-d'); ?>" required>
            <input type="hidden" class="form-control" name="jumlah" value="<?php echo $d['jumlah']; ?>" required>
            <input type="hidden" class="form-control" name="jumlah_acc" value="<?php echo $d['jumlah_acc']; ?>" required>
            <input type="hidden" class="form-control" name="jumlah_pot" value="<?php echo $d['jumlah_pot']; ?>" required>
            <input type="hidden" class="form-control" name="jumlah_adm" value="<?php echo $d['jumlah_adm']; ?>" required>
            <input type="hidden" class="form-control" name="ket" value="<?php echo $d['ket']; ?>" required>
            <input type="hidden" class="form-control" name="acc" value="Y" required>
            <input type="hidden" class="form-control" name="status" value="PROSES" required>
           