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
<body>
<?php 

$sorgu = $baglanti->query("SELECT * FROM musteriler WHERE MusteriId =".(int)$_GET['id']);
$sonuc = $sorgu->fetch_assoc();

?>

<div class="container" style="margin-top: 150px; margin-left: 40px; font-size: large;">
<div class="container">
<h2>MÜŞTERİ BİLGİ DÜZENLEME</h2>
<form action="" method="post">
	

	<table class="table">
    
		<tr>
		    <h3>Ad</h3>
			<input type="text" name="Ad" class="form-control" value="<?php echo $sonuc['Ad']; ?>">
            <h3>Soyad</h3>
			<input type="text" name="Soyad" class="form-control" value="<?php echo $sonuc['Soyad']; ?>">
            <h3>Adres</h3>
			<input type="text" name="Adres" class="form-control" value="<?php echo $sonuc['Adres']; ?>">
            <h3>Numara</h3>
			<input type="text" name="Numara" class="form-control" value="<?php echo $sonuc['Numara']; ?>">
        </tr>
			<td><input style="font-size: 25px;" type="submit" class="btn btn-primary" value="Kaydet"></td>
		</tr>

	</table>

</form>
</div>
</div>


<?php

   
@$Ad = $_POST['Ad'];
@$Soyad = $_POST['Soyad'];
@$Adres = $_POST['Adres'];
@$Numara = $_POST['Numara'];


if (@$Ad<>"") { 
    
    if ($baglanti->query("UPDATE musteriler SET Ad = '$Ad' WHERE MusteriId =".$_GET['id']))
    {
        header("location:musteriler.php");
    }
    else
    {
        echo "Hata oluştu";
    }

}
if (@$Soyad<>"") { 
    
    if ($baglanti->query("UPDATE musteriler SET Soyad = '$Soyad' WHERE MusteriId =".$_GET['id']))
    {
        header("location:musteriler.php");
    }
    else
    {
        echo "Hata oluştu";
    }

}
if (@$Adres<>"") { 
    
    if ($baglanti->query("UPDATE musteriler SET Adres = '$Adres' WHERE MusteriId =".$_GET['id']))
    {
        header("location:musteriler.php");
    }
    else
    {
        echo "Hata oluştu";
    }

}
if (@$Numara<>"") { 
    
    if ($baglanti->query("UPDATE musteriler SET Numara = '$Numara' WHERE MusteriId =".$_GET['id']))
    {
        header("location:musteriler.php");
    }
    else
    {
        echo "Hata oluştu";
    }

}
?>
</body>
</html>

