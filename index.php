<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<script type="text/javascript" src="jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=fakultas>
  $("#nama_fakultas").change(function(){
    var nama_fakultas = $("#nama_fakultas").val();
    $.ajax({
        url: "ambilprodi.php",
        data: "nama_fakultas="+nama_fakultas,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=jurusan>
            $("#nama_prodi").html(msg);
        }
    });
  });
  /*$("#nama_jurusan").change(function(){
    var nama_jurusan = $("#nama_jurusan").val();
    $.ajax({
        url: "ambilprodi.php",
        data: "nama_jurusan="+nama_jurusan,
        cache: false,
        success: function(msg){
            $("#nama_prodi").html(msg);
        }
    });
  });*/
  $("#nama_propinsi").change(function(){
    var nama_propinsi = $("#nama_propinsi").val();
    $.ajax({
        url: "ambilkab.php",
        data: "nama_propinsi="+nama_propinsi,
        cache: false,
        success: function(msg){
            $("#nama_kabupaten").html(msg);
        }
    });
  });
 /* $("#nama_kabupaten").change(function(){
    var nama_kabupaten = $("#nama_kabupaten").val();
    $.ajax({
        url: "ambilsma.php",
        data: "nama_kabupaten="+nama_kabupaten,
        cache: false,
        success: function(msg){
            $("#nama_sma").html(msg);
        }
    });
  });*/
  $("#jenjang").change(function()
        {
            if($(this).val() == "S2")
        {
            $("#add_asal_pt_s1").show();
			$("#add_asal_pt_s2").hide();
        }
		
            else if($(this).val() == "S3")
        {
            $("#add_asal_pt_s2").show();
			$("#add_asal_pt_s1").hide();
        }
        else 
		{
			$("#add_asal_pt_s1").hide();
$("#add_asal_pt_s2").hide();
		}
		
            });
$("#add_asal_pt_s1").hide();
$("#add_asal_pt_s2").hide();
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#previewHolder').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#upload_foto").change(function() {
  readURL(this);
});
});

 
</script>
</head>

<body>
<?php  include ("koneksi.php");
		
// require_once('Connections/connect.php'); 
		//$nim=$_POST['username'];
		$nim="12121";
		$jenjang="s1";
		$ipk=3.0;
		?>
<form action="insert_data_wisuda.php" method="POST" enctype="multipart/form-data">
  <table width="751" border="0">
 <tr>
    <td>Tahun Wisuda</td>
    <td>:</td>
    <td><label for="tahun_wisuda">
      <select name="tahun_wisuda"><option>--Pilih Periode--</option><?php

	$perQ="SELECT id_periode, nama_periode FROM periode ORDER BY id_periode";
	$perQ2 = mysql_query($perQ) or die(mysql_error());;
	
	while($perF=mysql_fetch_array($perQ2)){	
	echo "<option value=\"$perF[id_periode]\">$perF[nama_periode]</option>\n";
	}
?> 
      </select>
    </label></td>
  </tr>
  <tr>
    <td width="172">Nama</td>
    <td width="11">:</td>
    <td width="546"><input name="nama_mahasiswa" type="text" maxlength="100" /></td>
  </tr>
  <tr>
    <td>Tempat Lahir</td>
    <td>:</td>
    <td><input name="tempat_lahir" type="text" maxlength="45" /></td>
  </tr>
  <tr>
    <td>Nim</td>
    <td>:</td>
    <td><label for="nim"></label> <input name="nim"  id= "nim" type="text"  maxlength="45"   <?php echo "value=\"$nim\"" ?>  />
     
    </td>
  </tr>
  <tr>
    <td>Tanggal Lahir</td>
    <td>:</td>
    <td><select name="tgl_lahir" size="1" id="tgl_lahir">
      <?php
	          echo "<option >Tanggal</option>";
             for ($i=1;$i<=31;$i++)
             {
               
                    echo "<option value=".$i.">".$i."</option>";
              
             }
          ?>
    </select>
      <select name="bln_lahir" size="1" id="bln_lahir">
        <?php
             $namabulan=array("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
			         echo "<option >Bulan</option>";
             for ($i=1;$i<=12;$i++)
             {
               
                    echo "<option value=".$i.">".$namabulan[$i]."</option>";
               
             }
          ?>
      </select>
      <select name="thn_lahir" size="1" id="thn_lahir">
        <?php
              echo "<option >Tahun</option>";
             for ($i=1985;$i<=2000;$i++)
             {
                
                    echo "<option value=".$i.">".$i."</option>";
              
             }
          ?>
      </select></td>
  </tr>
  <tr>
    <td>Fakultas</td>
    <td>:</td>
    <td><select name="nama_fakultas" id ="nama_fakultas"> <option>--Pilih Fakultas--</option><?php
	//mengambil nama-nama FAKULTAS yang ada di database
	$queryku="SELECT * FROM fakultas  ORDER BY id_fakultas";
	$fakultas = mysql_query($queryku) or die(mysql_error());;
	
	while($f=mysql_fetch_array($fakultas)){	
	echo "<option value=\"$f[id_fakultas]\">$f[nama_fakultas]</option>\n";
	}
?> </select> </td>
  </tr>
  <tr>
    <td>Program Studi</td>
    <td>:</td>
    <td><select name="nama_prodi" id ="nama_prodi"> <option>--Pilih Prodi--</option>
      
      </select></td>
  </tr>
  <tr>
    <td>IPK</td>
    <td>:</td>
    <td><label for="ipk"></label>
      <input type="text" name="ipk" id="ipk" /></td>
  </tr>
  <tr>
    <td>Jenjang</td>
    <td>:</td>
    <td><select name="jenjang" id="jenjang" >
    <option>--Pilih Jenjang--</option>
    <option value="D3">D3</option>
    <option value="S1">S1</option>
    <option value="S2">S2</option>
    <option value="S3">S3</option>
    </select> <div id="add_asal_pt_s1">
    Asal Perguruan Tinggi s1:
    <input type="text" name="add_asal_pt_s1" id="add_asal_pt_s1">
 </div>​
 <div id="add_asal_pt_s2">
    Asal Perguruan Tinggi s2:
    <input type="text" name="add_asal_pt_s2" id="add_asal_pt_s2">
 </div></td>
  </tr>
  <tr>
    <td>Tanggal Yudisium</td>
    <td>:</td>
    <td><select name="tgl_yudisium" size="1" id="tgl_yudisium">
      <?php         echo "<option >Tanggal</option>";
             for ($i=1;$i<=31;$i++)
             {
               
                    echo "<option value=".$i.">".$i."</option>";
                             }
          ?>
      </select>
      <select name="bln_yudisium" size="1" id="bln_yudisium">
        <?php
		          echo "<option >Bulan</option>";
             $namabulan=array("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
             for ($i=1;$i<=12;$i++)
             {
                    echo "<option value=".$i.">".$namabulan[$i]."</option>";
               
             }
          ?>
        </select>
      <select name="thn_yudisium" size="1" id="thn_yudisium">
        <?php
                      echo "<option >Tahun</option>";
             for ($i=2015;$i<=2040;$i++)
             {
               
                    echo "<option value=".$i.">".$i."</option>";
                
             }
          ?>
      </select></td>
  </tr>
  <tr>
    <td>Nilai Yudisium</td>
    <td>:</td>
    <td><label for="nilai_yudisium"></label>
      <input type="text" name="nilai_yudisium" id="nilai_yudisium" /></td>
  </tr>
  <tr>
    <td>Jenis Kelamin</td>
    <td>:</td>
     <td>Laki-Laki
       <input name="jenis_kelamin" id="jenis_kelamin" type="radio" value="L" >
         
              Perempuan
              <input name="jenis_kelamin" id="jenis_kelamin" type="radio" value="P" >
               </td>
  </tr>
  <tr>
    <td height="110">Asal SMTA</td>
    <td>:</td>
    <td><table width="200" border="0">
      <tr>
        <td>Propinsi</td>
        <td>:</td>
        <td><select name="nama_propinsi" id="nama_propinsi"><option>--Pilih Propinsi--</option> 
		<?php
	$propinsi = mysql_query("SELECT * FROM provinsi ORDER BY id_provinsi");
	while($pro=mysql_fetch_array($propinsi)){
	echo "<option value=\"$pro[id_provinsi]\">$pro[nama_provinsi]</option>\n";
}
?>
        </select></td>
      </tr>
      <tr>
        <td>Kabupaten/ Kota</td>
        <td>:</td>
        <td><select name="nama_kabupaten" id="nama_kabupaten"> <option>--Pilih Kabupaten/Kota--</option> <?php
	$kabupaten = mysql_query("SELECT * FROM kabupaten ORDER BY id_kabupaten");
	while($kab=mysql_fetch_array($kabupaten)){
	echo "<option value=\"$kab[id_kabupaten]\">$kab[nama_kabupaten]</option>\n";
}
?>
        </select></td>
      </tr>
      <tr>
        <td>Nama Sekolah</td>
        <td>:</td>
        <td><input name="nama_sma" id="nama_sma" type="text" />
        </select></td>
      </tr>
    </table></td>
  </tr> <?php 
   
  if ($jenjang=="s2") 
  {
 echo " <tr>
    <td>Asal S1 (wisudawan Pascasarjana)</td>
    <td>:</td>
    <td><select name=\"asal_s1\"> <option>--Pilih Perguruan Tinggi--</option> >"; 
	$ptQ = mysql_query("SELECT * FROM perguruan_tinggi ORDER BY id_perguruan_tinggi");
	while($ptF=mysql_fetch_array($ptQ)){
	echo "<option value=\"$ptFid_perguruan_tinggi]\">$ptF[nama_perguruan_tinggi]</option>\n";
}

  echo  "    </select></td>
  </tr> ";
  }
  else
  {
	echo "<input name=\"asal_s1\" type=\"hidden\"  value=\"1\"";    
  }
  ?>
  
  <tr>
    <td>Tahun Tamat SMTA</td>
    <td>:</td>
    <td><select name="tahun_tamat_sma">  <?php
                      echo "<option >--Pilih Tahun Tamat SMTA--</option>";
             for ($i=2010;$i<=2020;$i++)
             {
               
                    echo "<option value=".$i.">".$i."</option>";
                
             }
          ?></select>&nbsp;</td>
  </tr>
  <tr>
    <td>Alamat Sekarang</td>
    <td>:</td>
    <td><label for="alamat"></label>
      
    <textarea name="alamat" id="alamat" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td>Nomor Hp</td>
    <td>:</td>
    <td><input type="text" name="no_hp" id="no_hp" /></td>
  </tr>
  <tr>
    <td>Nama Orang Tua/Wali</td>
    <td>:</td>
    <td><label for="nama_orang_tua"></label>
      <input type="text" name="nama_orang_tua" id="nama_orang_tua" /></td>
  </tr>
  <tr>
    <td>Alamat Orang Tua/Wali</td>
    <td>:</td>
    <td><label for="alamat_orang_tua"></label>
      <input type="text" name="alamat_orang_tua" id="alamat_orang_tua" /></td>
  </tr>
  <tr>
    <td>Judul Skripsi</td>
    <td>:</td>
    <td><label for="judul_skripsi_tesis"></label>
      <textarea name="judul_skripsi_tesis" id="judul_skripsi_tesis" cols="45" rows="5"></textarea></td>
  </tr>
  <tr>
    <td>Foto</td>
    <td>:</td>
    <td>  <img id="previewHolder" alt="Foto Preview" width="100px" height="100px"/> <p><input name="upload_foto" type="file" id="upload_foto" /> </p>
</td>
  </tr>
   <tr>
    <td>
	 </td>
    <td></td>
    <td><input name="upload_data" type="submit" value="Upload Data" /></td>
  </tr>
</table>

</form>
</body>
</html>