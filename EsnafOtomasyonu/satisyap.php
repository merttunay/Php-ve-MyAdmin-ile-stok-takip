<?php include("vt.php"); 
include("sidebar.php");
?>
<title>Satış Yap</title>


<form action="siparis-ekle.php" method="POST" enctype="multipart/form-data" style="margin-left: 100px; margin-top: 45px;">
<!-- veri tabanından müşterileri çekiyoruz ve drop-down menü oluşturuyoruz -->
<?php

  $sorgu = "SELECT * FROM musteriler";
  $sonuc = mysqli_query($baglanti, $sorgu);
?>
<select onchange="musterileriGoster(this.value)">
<option value="">Müşteri Seçiniz</option>
  <?php while($musteri = mysqli_fetch_array($sonuc)): ?>
    <option value="<?php echo $musteri['MusteriId']; ?>"><?php echo $musteri['Ad']." ".$musteri['Soyad'] ?></option>
  <?php endwhile; ?>
</select> <br>


<div style="float: left;">
<table><tr>
<li>Müşterinin ID'si</li>
    <input type="text" name="MusteriId" id="MusteriId" placeholder="Müşteri ID">
    <li>Müşterinin Adı</li>
    <input type="text" id="ad" name="Ad" placeholder="Ad" required>
    <li>Müşterinin Soyadı</li>
    <input type="text" id="soyad" name="Soyad" placeholder="Soyad" required> 
    <li>Müşterinin Adresi</li>
    <input type="text" id="adres" placeholder="Adres" disabled> 
    <li>Müşterinin Numarası</li>
    <input type="text" id="numara" placeholder="Numara" disabled> 
    <li>Satış Tarihi</p>
    <input name="sip_zaman" type="date" class="form-control" required>
    </tr>
    </table>
</div>

<!-- seçilen müşterinin bilgilerini çekiyoruz ve input boxlara yazdırıyoruz -->
<script>
  function musterileriGoster(MusteriId) {
    // seçilen müşterinin bilgilerini çekiyoruz
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // çekilen verileri bir dizi olarak alıyoruz
        var musteriler = JSON.parse(this.responseText);

        // çekilen verileri input boxlara yazdırıyoruz
        document.getElementById('MusteriId').value = musteriler['MusteriId'];
        document.getElementById('ad').value = musteriler['Ad'];
        document.getElementById('soyad').value = musteriler['Soyad'];
        document.getElementById('adres').value = musteriler['Adres'];
        document.getElementById('numara').value = musteriler['Numara'];
      }
    };
    xhttp.open("GET", "musteri-bilgileri.php?id=" + MusteriId, true);
    xhttp.send();
  }
</script>



<?php

  $sorgu = "SELECT * FROM urunler";
  $sonuc = mysqli_query($baglanti, $sorgu);
?>


<select style="margin-left: 50px;" onchange="urunleriGoster(this.value)">
<option value="">Ürün Seçiniz</option>
  <?php while($urun = mysqli_fetch_array($sonuc)): ?>
    <option value="<?php echo $urun['Urunid']; ?>"><?php echo $urun['UrunAd']; ?></option>
  <?php endwhile; ?>
</select> <br>


<div  style="float: left; margin-left: 50px;">
<table ><tr>
    <li>Ürünün ID'si</li>
    <input type="text" id="Urunid" name="Urunid" placeholder="Ürünün ID'si"   required>
    <li>Ürün Adı</li>
    <input type="text" id="UrunAd" name="UrunAd" placeholder="Ürün Adı"   required> 
    <li>Satış Fiyatı</li>
    <input type="text" id="UrunFiyat" name="UrunFiyat" placeholder="Satış Fiyatı"  required>  
    <li>Satış Adeti</li>
    <input type="text" id="UrunAdet" name="UrunAdet" placeholder="Satış Adeti"  required> 
    </tr>
    </table>
    </div>

<!-- seçilen müşterinin bilgilerini çekiyoruz ve input boxlara yazdırıyoruz -->
<script>
  function urunleriGoster(Urunid) {
    // seçilen müşterinin bilgilerini çekiyoruz
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // çekilen verileri bir dizi olarak alıyoruz
        var urunler = JSON.parse(this.responseText);

        // çekilen verileri input boxlara yazdırıyoruz
        document.getElementById('Urunid').value = urunler['Urunid'];
        document.getElementById('UrunAd').value = urunler['UrunAd'];
        document.getElementById('UrunFiyat').value = urunler['UrunFiyat'];
        //document.getElementById('UrunAdet').value = urunler['UrunAdet'];
      }
    };
    xhttp.open("GET", "urun-bilgileri.php?id=" + Urunid, true);
    xhttp.send();
  }
</script>



<input style="margin-top: 10cm; margin-right: 10cm;" id="kaydet" name="siparis-ekle" type="submit" value="Kaydet" class="btn btn-success"/>

</form>