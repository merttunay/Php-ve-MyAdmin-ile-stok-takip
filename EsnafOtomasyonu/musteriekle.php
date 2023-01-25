<?php 
include("vt.php");
include("sidebar.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Otomasyon Ödevi</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

<div class="container"  style="margin-top: 150px; margin-left: 40px; font-size: large;">
<div class="col-md-6">
<form action="" method="post">
	
	<table class="table">
		<tr>
			<h3>Ad</h3>
			<input type="text" name="Ad" class="container" >
            <h3>Soyad</h3>
			<input type="text" name="Soyad" class="container" >
            <h3>Adres</h3>
			<input type="text" name="Adres" class="container" >
            <h3>Numara</h3>
			<input type="text" name="Numara" class="container" >

        </tr>
		<tr>
			<td><input style="font-size:25px;" class="btn btn-primary"  type="submit" value="Ekle"></td>
		</tr>

	</table>

</form>


</div>

</div>
</body>
</html>


<?php
if ($_POST) {

    $Ad = $_POST['Ad'];
    $Soyad = $_POST['Soyad'];
    $Adres = $_POST['Adres'];
    $Numara = $_POST['Numara'];
}

?>

<?php

    if (@$Ad<>""&&@$Soyad<>""&&@$Adres<>""&&@$Numara<>""){
		
		if ($baglanti->query("INSERT INTO musteriler (Ad,Soyad,Adres,Numara) VALUES ('$Ad','$Soyad','$Adres','$Numara') ")) 
		{
			echo "Veri Eklendi"; 
			$log_file = fopen('log_kayitlari.txt', 'a');
			$tarih_saat = date('Y-m-d H:i:s');
			$simdiki_zaman = date('Y-m-d H:i:s', strtotime($tarih_saat . ' +2 hours'));
			fwrite($log_file, "[$simdiki_zaman] Müşteriler tablosuna veri eklendi\n");
			fclose($log_file);
		}
		else
		{
			echo "Hata oluştu";
		}

	}


?>