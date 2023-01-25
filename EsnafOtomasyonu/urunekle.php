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


<div class="container" style="margin-top: 150px; margin-left: 40px; font-size: large;">
<div class="col-md-6">
<form action="" method="post">
	<b>
	<table class="table">
		<tr>
		    <h3>Ürün Adı</h3>
			<input type="text" name="UrunAd" class="container" >
            <h3>Ürün Fiyatı</h3>
			<input type="text" name="UrunFiyat" class="container" >
            <h3>Ürün Adeti</h3>
			<input type="text" name="UrunAdet" class="container" >
        </tr>
		<tr>
			<td><input class="btn btn-primary" style="font-size: 25px;"  type="submit" value="Ekle"></td>
		</tr>
</b>
	</table>

</form>



<?php
if ($_POST) {

    @$UrunAd = $_POST['UrunAd'];
    @$UrunFiyat = $_POST['UrunFiyat'];
    @$UrunAdet = $_POST['UrunAdet'];
}

?>

<?php

    if (@$UrunAd<>""&&@$UrunFiyat<>""&&@$UrunAdet<>""){
		
		if ($baglanti->query("INSERT INTO urunler (UrunAd,UrunFiyat,UrunAdet) VALUES ('$UrunAd','$UrunFiyat','$UrunAdet') ")) 
		{
			echo "Veri Eklendi";
		}
		else
		{
			echo "Hata oluştu";
		}

	}


?>
</div>

</div>
</body>
</html>