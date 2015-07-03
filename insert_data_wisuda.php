<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include ("koneksi.php");
$nim=$_GET['nim'];
$nama_mhs=$_GET['nama_mahasiswa'];
$tempat_lahir=$_GET['tempat_lahir'];
$tanggal_lahir = $_GET['thn_lahir']."-".$_GET['bln_lahir']."-".$_GET['tgl_lahir'];
$jenis_kelamin=$_GET['jenis_kelamin'];
$alamat=$_GET['alamat'];
$no_hp=$_GET['no_hp'];
$nama_orang_tua=$_GET['nama_orang_tua'];
$alamat_orang_tua=$_GET['alamat_orang_tua'];
$nama_sma=$_GET['nama_sma'];
//tahun tamat
$thn_wisuda=$_GET['tahun_wisuda'];
//waktu_daftar
$prodi = $_GET['nama_prodi'];


$query_insert = "insert into wisudawan (nim, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, no_hp, nama_orang_tua, alamat_orang_tua, nama_sma, periode_id_periode, program_studi_id_program_studi) values('$nim','$nama_mhs', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$alamat','$no_hp', '$nama_orang_tua', '$alamat_orang_tua', '$nama_sma','$thn_wisuda','$prodi');";
$insert = mysql_query($query_insert);
if( $insert )
{ ?>
	<script language="JavaScript">
    	alert ('data mahasiswa berhail diinput');
        document.location='index.php';
       </script>
<?php
}
else {
  die('Gagal Tambah Data: ' . mysql_error());
}
?>
<?php


$asal_s1=$_GET['asal_s1'];
//nim udah dari ata
$jenjang=$_GET['jenjang'];
$judul_judul_skripsi_tesis=$_GET['judul_skripsi_tesis'];
$ipk=$_GET['ipk'];
$nilai_yudisium = $_GET['nilai_yudisium'];
//kategori yudiium
$tanggal_yudisium = $_GET['thn_yudisium']."-".$_GET['bln_yudisium']."-".$_GET['tgl_yudisium'];


$query_insert = "insert into perguruan_tinggi_has_wisudawan (perguruan_tinggi_id_perguruan_tinggi,wisudawan_nim,jenjang,judul_ta,ipk,nilai_yudisium, tanggal_yudisium)  values('$asal_s1','$nim', '$jenjang', '$judul_judul_skripsi_tesis','$ipk', '$nilai_yudisium','$tanggal_yudisium');";
$insert = mysql_query($query_insert);
if( $insert )
{ ?>
	<script language="JavaScript">
    	alert ('data perguruan_tinggi_ha_wi diinput');
        document.location='index.php';
       </script>
<?php
}
else {
  die('Gagal Tambah Data perguruan_tinggi_ha_wi: ' . mysql_error());
}
?>
</body>
</html>