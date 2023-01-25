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

<div class="container" style="margin-top: 2cm;">
		
		<td><b style="font-size: 23px;"> Sisteme Kayıtlı Ürünler</b></td>
		
</div>

<div class="container">
<table class="table"  style="background-color: darkgray;">
	
	<tr>
		<th>ID</th>
		<th>Ürün Adı</th>
		<th>Ürün Fiyatı</th>
		<th>Ürün Adedi</th>
	</tr>


<?php 

$sorgu = $baglanti->query("SELECT * FROM urunler");

while ($sonuc = $sorgu->fetch_assoc()) { 

    $id = $sonuc['Urunid'];
    $UrunAd = $sonuc['UrunAd'];
    $UrunFiyat = $sonuc['UrunFiyat'];
    $UrunAdet = $sonuc['UrunAdet'];

	?>
    
    
	<tr>
        <td><?php echo $id; ?></td>
		<td><?php echo $UrunAd; ?></td>
		<td><?php echo $UrunFiyat; ?></td>
        <td><?php echo $UrunAdet; ?></td>
		<td><a href="urunduzenle.php?id=<?php echo $id; ?>" class="btn btn-primary">Düzenle</a></td>
		<td><a href="urunsil.php?id=<?php echo $id; ?>" class="btn btn-danger">Sil</a></td>
		
	</tr>
   
    <?php } ?>

</table>
<?php

$select = $baglanti->query("select * from urunler");
$rows = $select->num_rows;
echo "<b style='font-size:20px;'> Sistemde"." ". $rows. " " ."kayıtlı ürün var </b>";

?>



</div>
</div>
</body>
</html>