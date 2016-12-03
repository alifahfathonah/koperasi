<?php
include'../../class/koperasi_class.php';
include'../../class/function.php';
$db = new Database();
$db->connectMySQL();
$anggota = new anggota();
$pinjaman = new pinjaman();
$d  = $pinjaman->bacapengajuan($id_pin);
?>
<!-- Stack the columns on mobile by making one full-width and the other half-width -->
<h3><u>FORMULIR PENGAJUAN KOPERASI LEMBAR I</u></h3><p>
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="print">
  <tr>
    <td width="20%"><strong>No Pinjaman</strong></td>
    <td width="3%">:</td>
    <td width="77%"><?php echo $d['id_pin']; ?></td>
  </tr>
   <tr>
    <td><strong>ID Peminjam</strong></td>
    <td>:</td>
    <td><?php echo $d['id_anggota']; ?></td>
    </tr>
  <tr>
    <td><strong>Nama Peminjam</strong></td>
    <td>:</td>
    <td><strong><?php echo $d['nama']; ?></strong></td>
    </tr>
  <tr>
    <td><strong>Tanggal</strong></td>
    <td>:</td>
    <td><?php echo DateToIndo($d['tgl_pin']); ?></td>
    </tr>
  <tr>
    <td><strong>Jumlah Pengajuan</strong></td>
    <td>:</td>
    <td><?php echo rupiah($d['jumlah']); ?></td>
    </tr>
      <tr>
  <tr>
    <td><strong>Jumlah Disetujui</strong></td>
    <td>:</td>
    <td><?php echo rupiah($d['jumlah_acc']); ?></td>
  </tr>
      <td><strong>Terbilang</strong></td>
    <td>:</td>
    <td><?php echo terbilang($d['jumlah_acc']); ?></td>
    </tr>
  <tr>
    <td><strong>Jumlah Potongan</strong></td>
    <td>:</td>
    <td><?php echo rupiah($d['jumlah_pot']); ?></td>
  </tr>
</table>
<hr />
<table width="100%" border="0">
  <tr>
    <td height="99" valign="top">KOPERASI</td>
    <td valign="top">MENYETUJUI</td>
    <td valign="top">KOORDINATOR</td>
    <td valign="top">PENERIMA</td>
  </tr>
  <tr>
    <td><strong>HENDRI / LUTHER</strong></td>
    <td><strong>KUSAINI</strong></td>
    <td><strong><?php echo $d['kordinator']; ?></strong></td>
    <td><strong><?php echo $d['nama']; ?></strong></td>
  </tr>
</table>
<hr />
<br /><p>

