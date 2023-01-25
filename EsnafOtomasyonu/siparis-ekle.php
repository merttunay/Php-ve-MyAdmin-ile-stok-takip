<?php
include("vt.php");

if (isset($_POST['siparis-ekle'])) {


$MusteriId = ($_POST['MusteriId']);
$MusteriAd = ($_POST['Ad']);
$Urunid = ($_POST['Urunid']);
$UrunAd = ($_POST['UrunAd']);
$UrunFiyat = ($_POST['UrunFiyat']);
$UrunAdet = ($_POST['UrunAdet']);
$sip_zaman = ($_POST['sip_zaman']);



###############################################################
### Sipariş Ekle

$urunekle = $baglanti->prepare("INSERT INTO siparisler SET 
  MusteriId=?,
  MusteriAdi=?,
  UrunAd=?,
  Urunid=?,
  UrunFiyat=?,
  UrunAdet=?,
  sip_zaman=?
  ");

$urunekle->execute(array(
  $MusteriId,
  $MusteriAd,
  $UrunAd,
  $Urunid,
  $UrunFiyat,
  $UrunAdet,
  $sip_zaman
));

##################################

}


$stok_azalt = "UPDATE urunler SET UrunAdet = UrunAdet - $UrunAdet WHERE Urunid = $Urunid";
mysqli_query($baglanti, $stok_azalt);



if (@$baglanti->query("SELECT * FROM siparisler WHERE siparisid =".(int)$_GET['id']))
{
	header("location:satisyap.php");
}



/********************************************************************************/

?>
