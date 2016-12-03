<?php
include'../../class/koperasi_class.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$pinjaman = new pinjaman();
$angsuran = new angsuran();
$d  = $pinjaman->bacapengajuan($id_pin);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="print">
  <tr>
    <td width="20%"><strong>No Pinjaman</strong></td>
    <td width="3%">:</td>
    <td width="77%"><?php echo $d['id_pin']; ?></td>
  </tr>
   <tr>
    <td><strong>Nama </strong></td>
    <td>:</td>
    <td><strong><?php echo $d['nama']; ?> / <?php echo $d['id_anggota']; ?></td>
    </tr>
  <tr>
    <td><strong>Tanggal</strong></td>
    <td>:</td>
    <td><?php echo DateToIndo($d['tgl_pin']); ?></td>
    </tr>
      <tr>
  <tr>
    <td><strong>Jumlah </strong></td>
    <td>:</td>
    <td><?php echo rupiah($d['jumlah_acc']); ?></td>
  </tr>
      <td><strong>Terbilang</strong></td>
    <td>:</td>
    <td><?php echo terbilang($d['jumlah_acc']); ?></td>
    </tr>
</table>
<hr />
<div class="row">
  <div class="col-md-6"><table class="table table-hover">
    <thead>
      <tr>
       
        <th class="info">NO</th>
        <th class="info">TANGGAL</th>
        <th class="info">JUMLAH</th>
        <th class="info">SISA</th>
        <th class="info">KET</th>
        <th class="info">AKSI</th>
      </tr>
    </thead>
    <tbody>
         <?php
      $arrayangsuran=$angsuran->showangsuran();
      if (count($arrayangsuran)) {
      foreach($arrayangsuran as $da) {
        $jumlah+=$da['jum_ang'];
                
    ?>
      <tr>
        <td><?php echo $c=$c+1;?></td>
        <td><?php echo DateToIndo($da['tgl_ang']); ?></td>
        <td><?php echo rupiah($da['jum_ang']); ?></td>
        <td></td>
        <td><?php echo $da['ket']; ?></td>
        <td><button type="button" class="btn btn-success btn-xs ubah-angsuran" data-id="<?php echo $da['id_pin']; ?>">
          <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>
          </button></td>
        </tr>
      <?php 
  }
}
?>
    </tbody>
    <thead>
      <tr>
       
        <th class="info"></th>
        <th class="info">JUMLAH</th>
        <th class="info"><?php echo rupiah($jumlah); ?></th>
        <th class="info"><?php echo rupiah($sisa=$d['jumlah_acc']-$jumlah); ?></th>
        <th class="info"></th>
        <th class="info"></th>
      </tr>
    </thead>
  </table></div>
  <div class="col-md-6"></div>
</div>
 
 <a class="btn btn-success btn-xs add-angsuran" href="" data-id="<?php echo $d['id_pin']; ?>" role="button">Tambah</a>
<!-- MODAL FORM SUPPLIER -->
<div class="modal fade" id="modal-add-angsuran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <form action="" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="simpan_angsuran" value="Simpan" class="btn btn-success" >
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
                </form>
<?php
 if($_POST['simpan_angsuran']){
  $angsuran->addangsuran(
  $_POST['id_ang'],
  $_POST['id_pin'],  
  $_POST['tgl_ang'],
  $_POST['jum_ang'],
  $_POST['ket']);
 }
?>
            </div>
        </div>

        <!-- MODAL UBAH DATA SUPPLIER -->
<div class="modal fade" id="modal-ubah-pengajuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form action="" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="update_pinjaman" value="Update data" class="btn btn-success" >
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
                </form>
<?php
 if($_POST['update_pinjaman']){
  $pinjaman->updatepengajuan(
  $_POST['id_pin'],  
  $_POST['id_anggota'],
  $_POST['tgl_pin'],
  $_POST['tgl_acc'],
  $_POST['jumlah'],
  $_POST['jumlah_acc'],
  $_POST['jumlah_pot'],
  $_POST['jumlah_adm'],
  $_POST['ket'],
  $_POST['acc'],
  $_POST['status']);
  echo"<meta http-equiv='refresh' content='0;url=?r=pinjaman&pg=pengajuan'>";
 }
?>
            </div>
        </div>
        <div class="modal fade" id="modal-approve-pengajuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form action="" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="approve_pinjaman" value="Approve Pengajuan" class="btn btn-success" >
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
                </form>
                <?php
 if($_POST['approve_pinjaman']){
  $pinjaman->updatepengajuan(
  $_POST['id_pin'],  
  $_POST['id_anggota'],
  $_POST['tgl_pin'],
  $_POST['tgl_acc'],
  $_POST['jumlah'],
  $_POST['jumlah_acc'],
  $_POST['jumlah_pot'],
  $_POST['jumlah_adm'],
  $_POST['ket'],
  $_POST['acc'],
  $_POST['status']);
  echo"<meta http-equiv='refresh' content='0;url=?r=pinjaman&pg=pengajuan'>";
 }
?>
            </div>
        </div>
