<?php
include("vt.php");

  // seçilen müşterinin bilgilerini çekiyoruz
  $musteriId = $_GET['id'];
  $sorgu = "SELECT * FROM musteriler WHERE MusteriId = '$musteriId'";
  $sonuc = mysqli_query($baglanti, $sorgu);

  // verileri bir dizi olarak alıyoruz
  $musteri = mysqli_fetch_array($sonuc);

  // diziyi JSON formatında döndürüyoruz
  echo json_encode($musteri);
?>