<?php
include'../../class/koperasi_class.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$anggota = new anggota();
?>
 <table id="example" class="table table-hover">
    <thead>
      <tr>
        
        <th>ID ANGGOTA</th>
        <th>NAMA</th>
        <th>NO KTP</th>
        <th>TMPT LAHIR</th>
        <th>TGL LAHIR</th>
        <th>KOORDINATOR</th>
        <th>TELPON</th>
        
        <th>AKSI</th>
      </tr>
    </thead>
    <tbody>
         <?php
      $arrayanggota=$anggota->showanggota();
      if (count($arrayanggota)) {
      foreach($arrayanggota as $d) {
    ?>
      <tr>
        
        <td>
           <button type="button" class="btn btn-info btn-xs d-supplier" data-id="<?php echo $d['id_supp']; ?>">
          <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
          </button>
          <?php echo $d['id_anggota']; ?></td>
        <td>
        
          <button type="button" class="btn btn-success btn-xs">
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
          </button>
          <?php echo $d['nama']; ?></td>
        <td>
          <?php echo $d['ktp']; ?></td>
        <td>
          <button type="button" class="btn btn-info btn-xs">
          <span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span>
          </button>
          <?php echo $d['tmpt_lahir']; ?></td>
        <td><?php echo $d['tgl_lahir']; ?></td>
        
        <td><?php echo $d['kordinator']; ?></td>
        <td><?php echo $d['telpon']; ?></td>
        <td>
           <button type="button" class="btn btn-info btn-xs ubah-anggota" data-id="<?php echo $d['id_anggota']; ?>">
          <span class="glyphicon glyphicon-link" aria-hidden="true"></span>
          </button>        
      </tr>
      <?php 
  }
}
?>
    </tbody>
  </table>
 <a class="btn btn-success btn-xs add-anggota" href="?r=fpk&pg=fpk_form" role="button">Tambah Data</a>
<!-- MODAL FORM SUPPLIER -->
<div class="modal fade" id="modal-anggota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
  $anggota->addangg(
  $_POST['id_anggota'],  
  $_POST['nama'],
  $_POST['ktp'],
  $_POST['tmpt_lahir'],
  $_POST['tgl_lahir'],
  $_POST['alamat'],
  $_POST['kordinator'],
  $_POST['telpon'],
  $_POST['date_input']);
  echo"<meta http-equiv='refresh' content='0;url=?r=anggota&pg=anggota'>";
 }
?>
            </div>
        </div>

        <!-- MODAL UBAH DATA SUPPLIER -->
<div class="modal fade" id="modal-ubah-anggota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form action="" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="update_anggota" value="Update data" class="btn btn-success" >
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
                </form>
<?php
 if($_POST['update_anggota']){
  $anggota->updateangg(
  $_POST['id_anggota'],  
  $_POST['nama'],
  $_POST['ktp'],
  $_POST['tmpt_lahir'],
  $_POST['tgl_lahir'],
  $_POST['alamat'],
  $_POST['kordinator'],
  $_POST['telpon'],
  $_POST['date_input']);
  echo"<meta http-equiv='refresh' content='0;url=?r=anggota&pg=anggota'>";
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
