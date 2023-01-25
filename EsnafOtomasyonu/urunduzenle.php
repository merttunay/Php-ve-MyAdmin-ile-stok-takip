<?php 
include("vt.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Otomasyon Ödevi</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<?php 

$sorgu = $baglanti->query("SELECT * FROM urunler WHERE Urunid =".(int)$_GET['id']);
$sonuc = $sorgu->fetch_assoc();

?>
<div class="container" style="margin-top: 150px; margin-left: 40px; font-size: large;">
<div class="container">
<h2>Ürün Bilgi Güncelleme</h2>
<form action="" method="post">
	
	<table class="table">
		
		<tr>
		    <h3>Ürün Adı</h3>
			<input type="text" name="UrunAd" class="container" value="<?php echo $sonuc['UrunAd']; ?>">
            <h3>Ürün Fiyatı</h3>
			<input type="text" name="UrunFiyat" class="container" value="<?php echo $sonuc['UrunFiyat']; ?>">
            <h3>Ürün Adedi</h3>
			<input type="text" name="UrunAdet" class="container" value="<?php echo $sonuc['UrunAdet']; ?>">           
        </tr>
			<td><input type="submit" style="font-size: 25px;" class="btn btn-primary" value="Kaydet"></td>
		</tr>

	</table>

</form>
</div>
</div>

<?php

@$UrunAd = $_POST['UrunAd'];
@$UrunFiyat = $_POST['UrunFiyat'];
@$UrunAdet = $_POST['UrunAdet'];


if (@$UrunAd<>"") { 
    
    if ($baglanti->query("UPDATE urunler SET UrunAd = '$UrunAd' WHERE Urunid =".$_GET['id']))
    {
        header("location:urunler.php");
    }
    else
    {
        echo "Hata oluştu";
    }

}
if (@$UrunFiyat<>"") { 
    
    if ($baglanti->query("UPDATE urunler SET UrunFiyat = '$UrunFiyat' WHERE Urunid =".$_GET['id']))
    {
        header("location:urunler.php");
    }
    else
    {
        echo "Hata oluştu";
    }

}
if (@$UrunAdet<>"") { 
    
    if ($baglanti->query("UPDATE urunler SET UrunAdet = '$UrunAdet' WHERE Urunid =".$_GET['id']))
    {
        header("location:urunler.php");
    }
    else
    {
        echo "Hata oluştu";
    }

}

?>

</body>
</html>