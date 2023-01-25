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
<div class="container" style="margin-top:2cm;">
		
		<td><b style="font-size: 23px;"> Sisteme Kayıtlı Siparisler</b></td>
		
		
</div>
<div class="container" >

	
<table class="table" style="background-color: darkgrey;">
	
	<tr>
		<th>Satış ID</th>
		<th>Satış Tarihi</th>
		<th>Müşteri Adı</th>
		<th>Ürün Adı</th>
		<th>Satış Fiyatı</th>
		<th>Satılan Adet</th>
		
	</tr>


<?php 

$sorgu = $baglanti->query("SELECT * FROM siparisler");

while ($sonuc = $sorgu->fetch_assoc()) { 

	$Sipid = $sonuc['siparisid'];
    $id = $sonuc['Urunid'];
	$sip_zaman = $sonuc['sip_zaman'];
	$MusteriAdi = $sonuc['MusteriAdi'];
    $UrunAd = $sonuc['UrunAd'];
    $UrunFiyat = $sonuc['UrunFiyat'];
    $UrunAdet = $sonuc['UrunAdet'];

	?>
    
    
	<tr>
        <td><?php echo $Sipid; ?></td>
		<th><?php echo $sip_zaman; ?></th>
		<th><?php echo $MusteriAdi; ?></th>
		<td><?php echo $UrunAd; ?></td>
		<td><?php echo $UrunFiyat; ?></td>
        <td><?php echo $UrunAdet; ?></td>
		<td><a href="siparisdetay.php?id=<?php echo $Sipid; ?>"  class="btn btn-primary">Sipariş Detay</a></td>
		<td><a href="siparissil.php?id=<?php echo $Sipid; ?>" id="sip_id" name="sip_id" class="btn btn-danger">Sil</a></td>
		
	</tr>
   
    <?php } ?>

</table>
<?php

$select = $baglanti->query("select * from siparisler");
$rows = $select->num_rows;
echo "<b style='font-size:20px;'>Sistemde "."toplam"." ". $rows. " " ." satış var</b>";

?><br>
<td><button class="btn btn-primary" type="button" onClick="parent.location='cikti.php'">PDF Çıktısı Al</button></td>

</div>
</div>
</div>
</body>
</html>