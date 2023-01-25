<?php 

if ($_GET) 
{

include("vt.php");

$sorgu = $baglanti->query("SELECT * FROM siparisler");

	while ($sonuc = $sorgu->fetch_assoc()) {

		$Sipid = $sonuc['siparisid'];
	}

$query = "SELECT Urunid,UrunAdet FROM siparisler WHERE siparisid = $Sipid";
$result = mysqli_query($baglanti, $query);

$row = mysqli_fetch_assoc($result);

$product_id = $row['Urunid'];
$quantity = $row['UrunAdet'];


$queryy = "UPDATE urunler SET UrunAdet = UrunAdet + $quantity WHERE Urunid = $product_id";
mysqli_query($baglanti, $queryy);


if (@$baglanti->query("DELETE FROM siparisler WHERE siparisid =".(int)$_GET['id']))
{
	header("location:siparisler.php");
}
}

?>