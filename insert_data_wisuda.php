<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
//upload foto
$nim=$_POST['nim'];
$tarPOST_dir = "uploads/";
$tarPOST_file = $tarPOST_dir . $nim."_".basename($_FILES["upload_foto"]["name"]);
$nama_file_foto=$nim."_".basename($_FILES["upload_foto"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($tarPOST_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = POSTimagesize($_FILES["upload_foto"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($tarPOST_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["upload_foto"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["upload_foto"]["tmp_name"], $tarPOST_file)) {
        echo "The file ". basename( $_FILES["upload_foto"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


?>
<?php
	include ("koneksi.php");
	
	$nama_mhs=$_POST['nama_mahasiswa'];
	$tempat_lahir=$_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['thn_lahir']."-".$_POST['bln_lahir']."-".$_POST['tgl_lahir'];
	$jenis_kelamin=$_POST['jenis_kelamin'];
	$alamat=$_POST['alamat'];
	$no_hp=$_POST['no_hp'];
	$nama_orang_tua=$_POST['nama_orang_tua'];
	$alamat_orang_tua=$_POST['alamat_orang_tua'];
	$nama_sma=$_POST['nama_sma'];
	$tahun_tamat_sma=$_POST['tahun_tamat_sma'];
	$thn_wisuda=$_POST['tahun_wisuda'];
	date_default_timezone_set('Asia/Makassar');
	$waktu_daftar=date('Y-m-d H:i:s'); ;
	echo"$waktu_daftar";
	//$waktu_daftar=$ambil_waktu['year'];
	$prodi = $_POST['nama_prodi'];


$query_insert = "insert into wisudawan (nim, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, no_hp, nama_orang_tua, alamat_orang_tua,foto, nama_sma, tahun_tamat_sma, periode_id_periode,waktu_daftar,program_studi_id_program_studi) values('$nim','$nama_mhs', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$alamat','$no_hp', '$nama_orang_tua', '$alamat_orang_tua','$nama_file_foto','$nama_sma','$tahun_tamat_sma','$thn_wisuda','$waktu_daftar','$prodi');";
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


$asal_s1=$_POST['asal_s1'];
//nim udah dari atas
$jenjang=$_POST['jenjang'];
$judul_judul_skripsi_tesis=$_POST['judul_skripsi_tesis'];
$ipk=$_POST['ipk'];
$nilai_yudisium = $_POST['nilai_yudisium'];
//kategori yudiium
$tanggal_yudisium = $_POST['thn_yudisium']."-".$_POST['bln_yudisium']."-".$_POST['tgl_yudisium'];

if ($jenjang!="S1") {
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
}
?>
<?php /*
//upload foto
$tarPOST_dir = "uploads/";
$tarPOST_file = $tarPOST_dir . $nim."_".basename($_FILES["upload_foto"]["name"]);
$nama_file_foto=$nim."_".basename($_FILES["upload_foto"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($tarPOST_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = POSTimagesize($_FILES["upload_foto"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($tarPOST_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["upload_foto"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["upload_foto"]["tmp_name"], $tarPOST_file)) {
        echo "The file ". basename( $_FILES["upload_foto"]["name"]). " has been uploaded.";
		
		//masukan nama file foto ke database
		$query_insert_foto = "insert into wisudawan (foto)  values('$nama_file_foto') where nim=$nim;";
		$insert = mysql_query($query_insert_foto);
		if( $insert )
		{ ?>
			<script language="JavaScript">
    		alert ('data foto ke data base');
        	document.location='index.php';
       	</script>
		<?php
		}
		else {
  		die('Gagal Tambahfoto: ' . mysql_error());
		}
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
*/

?>
</body>
</html>