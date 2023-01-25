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
		
		<td><b style="font-size: 23px;"> Sisteme Kayıtlı Müşteriler</b></td>
		
</div>

<div class="container">
<table class="table" style="background-color:darkgray; font-size: 18px;">
	
	<tr>
		<th>ID</th>
		<th>Müşteri Ad</th>
		<th>Müşteri Soyad</th>
		<th>Müşteri Adres</th>
        <th>Müşteri Numara</th>
	</tr>


<?php 

$sorgu = $baglanti->query("SELECT * FROM musteriler");

while ($sonuc = $sorgu->fetch_assoc()) { 

    $id = $sonuc['MusteriId'];
    $Ad = $sonuc['Ad'];
    $Soyad = $sonuc['Soyad'];
    $Adres = $sonuc['Adres'];
    $TelefonNumarasi = $sonuc['Numara'];

	?>
    
    
	<tr>
        <td><?php echo $id; ?></td>
		<td><?php echo $Ad; ?></td>
		<td><?php echo $Soyad; ?></td>
        <td><?php echo $Adres; ?></td>
        <td><?php echo NumarayiFormatla($TelefonNumarasi); ?></td>  
		<td><a href="musteriduzenle.php?id=<?php echo $id; ?>" class="btn btn-primary">Düzenle</a></td>
		<td><a href="musterisil.php?id=<?php echo $id; ?>" class="btn btn-danger">Sil</a></td>
		
	</tr>
   
    <?php } ?>

</table>
<?php

$select = $baglanti->query("select * from musteriler");
$rows = $select->num_rows;
echo "<b style='font-size:20px;'>Sistemde"." ". $rows. " " ."kayıtlı müşteri var</b>";

?><br>
</div>
</div>
</body>
</html>

<?php 

function NumarayiFormatla($TelefonNumarasi)
{
    $TelefonNumarasi = preg_replace('/[^0-9]/', '', $TelefonNumarasi);
    //TelefonNumarasi değişkenini tüm karakterlerden arındırıyoruz.
    if (strlen($TelefonNumarasi) > 10) {
        //TelefonNumarasi değişkeni 10 haneden büyükse
		$AlanKodu = substr($TelefonNumarasi, -10, 3);
		$SonrakiUcHane = substr($TelefonNumarasi, -7, 3);
		$SonDortHane = substr($TelefonNumarasi, -4, 4);
		//www.mucahittopal.com
		$TelefonNumarasi = '0'.' (' . $AlanKodu . ') ' . $SonrakiUcHane . '-' . $SonDortHane;
		// Oluşan Sonuç = + 90 (555) 444-3322
    } else if (strlen($TelefonNumarasi) == 10) {
        //TelefonNumarasi değişkeni 10 haneye eşitse
        $AlanKodu = substr($TelefonNumarasi, 0, 3);
        $SonrakiUcHane = substr($TelefonNumarasi, 3, 3);
        $SonDortHane = substr($TelefonNumarasi, 6, 4);
        $TelefonNumarasi = '0'.' (' . $AlanKodu . ') ' . $SonrakiUcHane . '-' . $SonDortHane;
        // Oluşan Sonuç = (555) 444-3322
    } else if (strlen($TelefonNumarasi) == 7) {
        //TelefonNumarasi değişkeni 7 haneye eşitse
        $SonrakiUcHane = substr($TelefonNumarasi, 0, 3);
        $SonDortHane = substr($TelefonNumarasi, 3, 4);
        $TelefonNumarasi = $SonrakiUcHane . '-' . $SonDortHane;
        // Oluşan Sonuç = 444-3322
    }
    return $TelefonNumarasi;
}

?>