<?php
include("vt.php");

// Siparişleri sorgulayarak verileri bir diziye alın
$sorgu = $baglanti->query("SELECT * FROM musteriler INNER JOIN siparisler ON musteriler.MusteriId = siparisler.MusteriId");
$urunler = $baglanti->query("SELECT UrunFiyat,UrunAdet,siparisid FROM siparisler");
$siparis = $sorgu->fetch_all(MYSQLI_ASSOC);
require_once('fpdf/fpdf.php');
// PDF dosyasını oluşturun
$pdf = new FPDF();

// PDF dosyasının ayarlarını yapın
$pdf->SetTitle('Satislar');
$pdf->SetAuthor('Sipariş Takip Sistemi');
// PDF dosyasının ilk sayfasını oluşturun
$pdf->AddPage("P", array(260, 500));

// Siparişleri döngüyle gezerek bir tablo oluşturun ve verileri yazdırın
$pdf->SetFont('Arial','B', 12);
$pdf->Cell(35, 10, 'Siparis No');
$pdf->Cell(35, 10, 'Siparis Tarihi');
$pdf->Cell(35, 10, 'Musteri Adi');
$pdf->Cell(35, 10, 'Urun Adi');
$pdf->Cell(35, 10, 'Satilan Adet');
$pdf->Cell(35, 10, 'Satis Fiyati');
$pdf->Cell(35, 10, 'Toplam Tutar');
$pdf->Ln();

$pdf->SetFont('Arial', '', 12);

    foreach ($siparis as $siparis) {
    $pdf->Cell(35, 10, $siparis['siparisid']);
    $pdf->Cell(35, 10, $siparis['sip_zaman']);
    $pdf->Cell(35, 10, $siparis['MusteriAdi']);
    $pdf->Cell(35, 10, $siparis['UrunAd']);
    $pdf->Cell(35, 10, $siparis['UrunAdet']);
    $pdf->Cell(35, 10, $siparis['UrunFiyat']);   
    $pdf->Cell(35, 10, $toplam = $siparis['UrunAdet'] * $siparis['UrunFiyat']);
    $pdf->Ln();  
}

// PDF dosyasını tarayıcıda görüntüleyin
$pdf->Output('Siparisler.pdf', 'I');

// PDF dosyasını diske kaydedin
//$pdf->Output('Siparisler.pdf', 'F');

?>