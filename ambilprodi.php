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
$prodi = mysql_query("SELECT id_program_studi,nama_program_studi FROM program_studi WHERE fakultas_id_fakultas='$fakultas' order by id_program_studi");
echo "<option>-- Pilih Progrdam Studi --</option>";
while($p = mysql_fetch_array($prodi)){
    echo "<option value=\"".$p['id_program_studi']."\">".$p['nama_program_studi']."</option>\n";
}
?>
</body>
</html>