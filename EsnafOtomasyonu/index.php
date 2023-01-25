<?php
include("vt.php");
include("sidebar.php");




$musteriler = $baglanti->query("SELECT * FROM musteriler ");
$urunler = $baglanti->query("SELECT * FROM urunler ");
$siparisler = $baglanti->query("SELECT * FROM siparisler ");

$GünlükTarih = date("Y-m-d");
$GünlükSatis = $baglanti->query("SELECT UrunAdet FROM siparisler WHERE sip_zaman = '$GünlükTarih'");
$toplamfiyat = $baglanti->query("SELECT SUM(UrunFiyat*UrunAdet) as tfiyat FROM siparisler WHERE sip_zaman = '$GünlükTarih' ");


$rowsmusteriler = $musteriler->num_rows;
$rowsurunler = $urunler->num_rows;
$rowssiparisler = $siparisler->num_rows;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Paneli</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
	<link rel="stylesheet" href="css/style.css">
  </head>
  <body style="background-color:cadetblue">


<div class="dil"  style="float: right;">
<a  style="color:red" href="dil.php?dil=tr" ><?php echo $dil["tr"]; ?></a>|<a  style="color:red" href="dil.php?dil=en"><?php echo $dil["en"]; ?></a>
</div>


    <div class="grid-container" style="margin-right:10cm">

	

      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <h2> <?php echo $dil["bilgipanel"]; ?></h2>
          
        </div>

        <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <h3><?php echo $dil["topurun"]; ?></h3>
              <span class="material-icons-outlined">inventory</span>
            </div>
            <h1><?php echo $rowsurunler ?></h1>
          </div>
          

          <div class="card">
            <div class="card-inner">
              <h3><?php echo $dil["topsatis"]; ?></h3>
              <span class="material-icons-outlined">sell</span>
            </div>
            <h1><?php echo $rowssiparisler ?></h1>
          </div>



          <div class="card">
            <div class="card-inner">
              <h3><?php echo $dil["topmusteri"]; ?></h3>
              <span class="material-icons-outlined">groups</span>
            </div>
            <h1><?php echo $rowsmusteriler ?></h1>
          </div>


          <div class="card">
            <div class="card-inner">
              <h3><?php echo $dil["gunluksatis"]; ?></h3>
              <span class="material-icons-outlined">sell</span>
            </div>
            <h1><?php $tgunluksatis = 0;
                    while($gsatis = mysqli_fetch_assoc($GünlükSatis)) {
                      $tgunluksatis += $gsatis['UrunAdet'];
              echo $tgunluksatis; } ?></h1>

          </div>


          <div class="card">
            <div class="card-inner">
              <h3><?php echo $dil["topkazanc"]; ?></h3>
              <span class="material-icons-outlined" style="color: black;">currency_lira</span>
            </div>

            <h1>
                <?php while ($tfiyat = mysqli_fetch_assoc($toplamfiyat)) {
                    // Toplam fiyatı ekrana yazdırın
                    echo $tfiyat['tfiyat'];
                }        ?>
            </h1>
          </div>
          
        </div>

        </div>
        
      </main>
      <!-- End Main -->

    </div>


  </body>

</html>
