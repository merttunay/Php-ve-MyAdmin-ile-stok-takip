<?php
session_start();
if(!$_SESSION["dil"]){
  require("lang/tr.php");
}else{

  require("lang/".$_SESSION["dil"].".php");
}

?>


<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">

         <div class="wrapper d-flex align-items-stretch">
            <nav id="sidebar">
                <div class="custom-menu">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
        </div>
            <h1><a href="index.php" class="logo">Esnaf Otomasyonu</a></h1>
        <ul class="list-unstyled components mb-5">
            <li>
              <a href="index.php"><span class="fa fa-home mr-3"></span> <?php echo $dil["anasayfa"]; ?></a>
          </li>
          <li>

            <!-- Müşteri İşlemleri -->

            <a href="#otherSections1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" role="button" aria-controls="otherSections"><span class="fa fa-user mr-3"></span>
            <?php echo $dil["musteri_islem"]; ?>
            </a>
            <ul class="collapse list-unstyled" id="otherSections1">
                <li>
                    <a class="scroll-link" href="musteriekle.php"><?php echo $dil["musteri_ekle"]; ?></a>
                </li>
                <li>
                    <a class="scroll-link" href="musteriler.php"><?php echo $dil["musteri_listele"]; ?></a>
                </li>
            </ul>
        </li>

        <!-- Ürün İşlemleri -->

          <li>
            <a href="#otherSections" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" role="button" aria-controls="otherSections"><span class="fa fa-sticky-note mr-3"></span>
            <?php echo $dil["urun_islem"]; ?>
            </a>
            <ul class="collapse list-unstyled" id="otherSections">
                <li>
                    <a class="scroll-link" href="urunekle.php"><?php echo $dil["urun_ekle"]; ?></a>
                </li>
                <li>
                    <a class="scroll-link" href="urunler.php"><?php echo $dil["urun_listele"]; ?></a>
                </li>
            </ul>
        </li>
          <!-- Siparis İşlemleri -->

          <li>
            <a href="#otherSections2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" role="button" aria-controls="otherSections" ><span class="fa fa-shopping-basket"></span >
             <?php echo $dil["siparis_islem"]; ?>  
            </a>
            <ul class="collapse list-unstyled" id="otherSections2">
                <li>
                    <a class="scroll-link" href="satisyap.php"><?php echo $dil["siparis_ekle"]; ?></a>
                </li>
                <li>
                    <a class="scroll-link" href="siparisler.php"><?php echo $dil["siparis_listele"]; ?></a>
                </li>
            </ul>
        </li>

        <!-- Çıkış Yap -->

            <li>
            <a href="logout.php"><span class="fa fa-paper-plane mr-3"></span><?php echo $dil["cikis_yap"]; ?></a>
            </li>
        </nav>

   <div id="content">

        
        

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

<?php
?>