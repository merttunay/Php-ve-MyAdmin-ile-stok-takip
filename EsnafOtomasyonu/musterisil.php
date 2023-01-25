<?php 

if ($_GET) 
{

include("vt.php");

if (@$baglanti->query("DELETE FROM musteriler WHERE MusteriId =".(int)$_GET['id']))
{
	
	header("location:musteriler.php");
			$log_file = fopen('log_kayitlari.txt', 'a');
			$tarih_saat = date('Y-m-d H:i:s');
			$simdiki_zaman = date('Y-m-d H:i:s', strtotime($tarih_saat . ' +2 hours'));
			fwrite($log_file, "[$simdiki_zaman] Müşteriler tablosundan veri silindi \n");
			fclose($log_file);
		
}
}

?>