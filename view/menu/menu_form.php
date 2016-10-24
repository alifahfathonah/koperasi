<?php
include'../../class/class_5u.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$menu = new menu();

#cegah akses tanpa melalui login
$user = new User();
$id_kelompok = $_SESSION['id_kelompok'];
if (!$user->get_sesi())
{
header("location:index.html");
}
#close akses tanpa login

?>

 <form role="form" action="" method="post" class="form-horizontal col-md-4">
    <div class="form-group">
    <label>Title</label>
    <input name="id_menu" type="hidden" value="<?php echo kdauto("menu",""); ?>" class="form-control" required>
    <input name="title" type="text" class="form-control" required>
  </div>
  <div class="form-group">
    <label>Folder</label>
    <input name="folder" type="text" class="form-control" required>
  </div>
<div class="form-group">
    <label>Link</label>
    <input name="link" type="text" class="form-control" required>
  </div>

  <div class="form-group">
    <label>Level Menu</label>
    <select required class="form-control" name="level">
    <option value="HRD">HRD</option>
    <option value="DIVISI">DIVISI</option>
    <option value="PESERTA">PESERTA</option>
    <option value="ADMIN">ADMIN</option>
  </select>
  </div>
  <div class="form-group">
    <label>Parent</label>
    <select required class="form-control" name="parent">
	  <option value="0">Pilih Parent</option>
	  					<?php	
						$arrayParent = $menu->comboParent();
						if(isset($arrayParent) && $arrayParent !=Null){
							foreach ($arrayParent as $data) {
					?>
					<option value="<?php echo $data['id_menu']?>"><?php echo $data['id_menu'].'-'.$data['title']?></option>
					<?php 
							}
						}
					?>
	 
	</select>
  </div>
  <div class="form-group">
    <label>Icon</label>
    <input name="icon" type="text" class="form-control" required>
  </div>
  <div class="form-group">
    <label>Urutan</label>
    <input type="text" name="urut" class="form-control" required>
  </div>
   
  <div class="form-group">
    <input type="submit" name="simpan" value="Simpan" class="btn btn-info">
    &nbsp;
     <input type="button" name="batal" value="Batal"  onClick="history.back()" class="btn btn-danger">
  </div>
</form>

<?php
  if($_POST['simpan']){
  $menu->tambahMenu(
  $_POST['id_menu'],  
  $_POST['title'],
  $_POST['folder'],
  $_POST['link'],
  $_POST['level'],
  $_POST['parent'],
  $_POST['icon'],
  $_POST['urut']);
   echo"<meta http-equiv='refresh' content='0;url=?r=menu&pg=menu'>";
  }
?>
