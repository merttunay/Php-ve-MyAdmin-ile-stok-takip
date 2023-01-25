<?php
include("vt.php");

$KullaniciAdi = $_POST['KullaniciAdi'];
$Sifre = $_POST['Sifre'];

if (isset($_POST['submit'])) {

  $query = "SELECT * FROM admin WHERE KullaniciAdi = '$KullaniciAdi' AND Sifre = '$Sifre'";
  $result = mysqli_query($baglanti, $query);
  $user = mysqli_fetch_assoc($result);

  if ($user) {
    header("location:index.php");
    exit;
  } else {

    echo "Kullanıcı Adı veya Şifreniz Yanlış <br>"; 
        echo "<a href='login.php'>Giriş Yap Sayfasına Geri Dön</a>";
  }
}?>

