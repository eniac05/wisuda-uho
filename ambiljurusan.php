<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include ("koneksi.php");
$fakultas = $_GET['nama_fakultas'];

$jurusan = mysql_query("SELECT id_jurusan,nama_jurusan FROM jurusan WHERE fakultas_id_fakultas='$fakultas' order by nama_jurusan");
echo "<option>-- Pilih Jurusan --</option>";
while($j = mysql_fetch_array($jurusan)){
    echo "<option value=\"".$j['id_jurusan']."\">".$j['nama_jurusan']."</option>\n";
}
?>
</body>
</html>