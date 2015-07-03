<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include ("koneksi.php");
$kabupaten= $_GET['nama_kabupaten'];

$sma = mysql_query("SELECT id_sma,nama_sma FROM sma WHERE kabupaten_id_kabupaten='$kabupaten' order by id_sma");
echo "<option>-- Pilih Asal SMTA --</option>";
while($smaq = mysql_fetch_array($sma)){
    echo "<option value=\"".$smaq['id_sma']."\">".$smaq['nama_sma']."</option>\n";
}
?>
</body>
</html>