<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include ("koneksi.php");
$propinsi = $_GET['nama_propinsi'];

$kabupaten = mysql_query("SELECT id_kabupaten,nama_kabupaten FROM kabupaten WHERE provinsi_id_provinsi='$propinsi' order by id_kabupaten");
echo "<option>-- Pilih Kabupaten/Kota --</option>";
while($kab = mysql_fetch_array($kabupaten)){
    echo "<option value=\"".$kab['id_kabupaten']."\">".$kab['nama_kabupaten']."</option>\n";
}
?>
</body>
</html>