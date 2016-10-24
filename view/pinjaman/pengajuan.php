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
        <th>ACTION</th>
        <th>ID PIN</th>
        <th>ID ANGGOTA</th>
        <th>NAMA ANGGOTA</th>
        <th>TGL PIN</th>
        <th>JUMLAH </th>
        <th>JUMLAH ACC</th>
        <th>JUMLAH POT</th>
        <th>JUMLAH ADM</th>
        <th>KET</th>
        <th>APRROVE</th>
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
                  }else if($d['acc']=='N'){
                  $a='Not App';
                  $b='warning';
                }
    ?>
      <tr>
        <td>
          <a class="btn btn-success btn-xs add-pengajuan" href="" role="button">Print</a>
          <a class="btn btn-info btn-xs ubah-pengajuan" data-id="<?php echo $d['id_pin'];?>" href="" role="button">Edit</a>
          
          </td>
        <td><?php echo $d['id_pin']; ?></td>
        <td><?php echo $d['id_anggota']; ?></td>
        <td><?php echo $d['nama']; ?></td>
        <td><?php echo DateToIndo($d['tgl_pin']); ?></td>
        <td><?php echo rupiah($d['jumlah']); ?></td>
        <td><?php echo rupiah($d['jumlah_acc']); ?></td>
        <td><?php echo rupiah($d['jumlah_pot']); ?></td>
        <td><?php echo rupiah($d['jumlah_adm']); ?></td>
        <td><?php echo $d['ket']; ?></td>
        <td>
          <a class="btn btn-<?php echo $b; ?> btn-xs" href="" role="button"><?php echo $a; ?></a>
      </td>       
      </tr>
      <?php 
  }
}
?>
    </tbody>
  </table>
 <a class="btn btn-success btn-xs add-pengajuan" href="?r=fpk&pg=fpk_form" role="button">Tambah Data</a>
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
  $_POST['acc']);
  echo"<meta http-equiv='refresh' content='0;url=?r=pinjaman&pg=pengajuan'>";
 }
?>
            </div>
        </div>
        <div class="modal fade" id="modal-detail-supplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form action="" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
                </form>
            </div>
        </div>
