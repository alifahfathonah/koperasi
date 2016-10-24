<?php
include'../../class/class_5u.php';
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
<div class="table-responsive"> 
 <table class="table table-striped table-bordered" id="example">
    <thead>
      <tr>
        <th>No</th>
        <th>Id</th>
        <th>Title</th>
        <th>folder</th>
        <th>Link</th>
        <th>Level</th>
        <th>Parent</th>
        <th>Icon</th>
        <th>Urut</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $arraymenu=$menu->tampilmenu();
      if (count($arraymenu)) {
      foreach($arraymenu as $data) {
    ?>
      <tr>
        <td><?php echo $c=$c+1;?></td>
         <td><?php echo $data['id_menu']; ?></td>
        <td><?php echo $data['title']; ?></td>
        <td><?php echo $data['folder']; ?></td>
        <td><?php echo $data['link']; ?></td>
        <td><?php echo $data['level']; ?></td>
        <td><?php echo $data['parent']; ?></td>
        <td><span class="glyphicon <?php echo $data['icon']; ?>" aria-hidden="true"></span>&nbsp;<?php echo $data['icon']; ?></td>
        <td><?php echo $data['urut']; ?></td>
        <td><a href="?r=menu&pg=menu_edit&id_menu=<?php echo $data['id_menu']; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
      </tr>
<?php
}
}
?>

    </tbody>
  </table>
</div>
 <a class="btn btn-info btn-xs" href="?r=menu&pg=menu_form" role="button">Tambah Menu</a>