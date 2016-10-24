<?php
include'../../class/supplier_class.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$supplier = new supplier();
$d  = $supplier->bacasupp($id_supp);
?>
<dl class="dl-horizontal">
  <dt><span class="label label-success">Nama Supplier</span></dt>
  <dd><?php echo $d['nm_supp']; ?></dd>
  <dt>Nama Marketing</dt>
  <dd><?php echo $d['marketing']; ?></dd>
  <dt>Alamat Lengkap</dt>
  <dd><?php echo $d['alamat']; ?></dd>
  <dt>Telpon</dt>
  <dd><?php echo $d['telp']; ?></dd>
  <dt>No Fax</dt>
  <dd><?php echo $d['fax']; ?></dd>
  <dt>Nomor Rekening</dt>
  <dd><?php echo $d['rek']; ?></dd>
  <dt>Email</dt>
  <dd><?php echo $d['email']; ?></dd>
  <dt>Date Input</dt>
  <dd><?php echo dateToindo($d['date_input']); ?></dd>  
</dl>
