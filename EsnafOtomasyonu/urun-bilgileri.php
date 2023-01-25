<?php
include("vt.php");

  // seçilen müşterinin bilgilerini çekiyoruz
  $Urunid = $_GET['id'];
  $sorgu = "SELECT * FROM urunler WHERE Urunid = '$Urunid'";
  $sonuc = mysqli_query($baglanti, $sorgu);

  // verileri bir dizi olarak alıyoruz
  $urun = mysqli_fetch_array($sonuc);

  // diziyi JSON formatında döndürüyoruz
  echo json_encode($urun);
?>