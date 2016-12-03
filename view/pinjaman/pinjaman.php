<?php
include'../../class/koperasi_class.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$pinjaman = new pinjaman();
?>
<script type="text/javascript">
var d = document.getElementById("myLink");
d.className = d.className + " disabled";
</script>
 <table id="example" class="table table-hover">
    <thead>
      <tr>
       
        <th class="info">ID PIN</th>
        <th class="info">ID ANGGOTA</th>
        <th class="info">NAMA ANGGOTA</th>
        <th class="info">TGL PIN</th>
        <th class="info">JUMLAH </th>
        <th class="info">JUMLAH ACC</th>
        <th class="info">JUMLAH POT</th>
        <th class="info">SISA POT</th>
        <th class="info">KET</th>
        <th class="info">APRROVE</th>
        <th class="info">STATUS</th>
      </tr>
    </thead>
    <tbody>
         <?php
      $arraypinjaman=$pinjaman->showpinjam();
      if (count($arraypinjaman)) {
      foreach($arraypinjaman as $d) {
        if($d['acc']=='Y'){
                  $a='Approve';
                  $b='success';
                  $c='disabled';
                  }else if($d['acc']=='N'){
                  $a='Not App';
                  $b='warning';
                  $c='';
                }
    ?>
      <tr>
        <td><?php echo $d['id_pin']; ?></td>
        <td><?php echo $d['id_anggota']; ?></td>
        <td><a href="?r=angsuran&pg=angsuran&id_pin=<?php echo $d['id_pin']; ?>&id_anggota=<?php echo $d['id_anggota']; ?>"><?php echo $d['nama']; ?></a></td>
        <td><?php echo DateToIndo($d['tgl_pin']); ?></td>
        <td><?php echo rupiah($d['jumlah']); ?></td>
        <td class="info"><?php echo rupiah($d['jumlah_acc']); ?></td>
        <td class="success">  <button type="button" class="btn btn-success btn-xs d-supplier" data-id="<?php echo $d['id_supp']; ?>">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
          </button>&nbsp;<?php echo rupiah($d['jumlah_pot']); ?>
        </td>
        <td class="danger"><?php echo rupiah($d['jumlah_adm']); ?></td>
        <td><?php echo $d['ket']; ?></td>
        <td><a class="btn btn-<?php echo $b; ?> btn-xs approve-pengajuan <?php echo $c; ?>" data-id="<?php echo $d['id_pin']; ?>" href="" role="button"><?php echo $a; ?></a></td>       
        <td><?php echo $d['status']; ?></td>
      </tr>
      <?php 
  }
}
?>
    </tbody>
  </table>
 
<!-- MODAL FORM SUPPLIER -->
<div class="modal fade" id="modal-pengajuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form action="" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-success" >
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
                </form>
<?php
 if($_POST['simpan']){
  $pinjaman->addpengajuan(
  $_POST['id_pin'],  
  $_POST['id_anggota'],
  $_POST['tgl_pin'],
  $_POST['tgl_acc'],
  $_POST['jumlah'],
  $_POST['jumlah_acc'],
  $_POST['jumlah_pot'],
  $_POST['jumlah_adm'],
  $_POST['ket'],
  $_POST['acc']);
  echo"<meta http-equiv='refresh' content='0;url=?r=pinjaman&pg=pengajuan'>";
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
