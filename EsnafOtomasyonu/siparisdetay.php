<?php
if ($_GET) {

    include("vt.php");

    $sorgu = $baglanti->query("SELECT * FROM musteriler INNER JOIN siparisler ON musteriler.MusteriId = siparisler.MusteriId where siparisid = " . $_GET['id']);
    $toplamfiyat = $baglanti->query("SELECT UrunAdet * UrunFiyat AS '[TOPLAM FİYAT]'  FROM siparisler WHERE siparisid = " . $_GET['id'])
    ?>  
<h2>MÜŞTERİ ÜRÜN SATIŞ BİLGİLERİ</h2>


<?php
    while (@$row = $sorgu->fetch_assoc() and $toplamfiyatt = $toplamfiyat->fetch_assoc()) {

       
        echo "Müşterinin Adı Soyadı: " . $row['Ad'] . " " . $row['Soyad'] . "<br>";
        echo "Telefon Numarası: " . $row['Numara'] . "<br>";
        echo "Adresi: " . $row['Adres'] . "<br>";
        echo "Satın Aldığı Ürün: " . $row['UrunAd'] . "<br>";
        echo "Kaç Adet Aldığı: " . $row['UrunAdet'] . "<br>";
        echo "Ürünün Tane Fiyatı: " . $row['UrunFiyat'] . "<br>";
        echo "Toplam Fiyat Tutarı: " . $toplamfiyatt['[TOPLAM FİYAT]'] . "<br>";

    }

}
?>