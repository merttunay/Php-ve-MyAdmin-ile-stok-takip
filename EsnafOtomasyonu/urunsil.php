<?php 

if ($_GET) 
{

include("vt.php");

if ($baglanti->query("DELETE FROM urunler WHERE Urunid =".(int)$_GET['id']))
{
	header("location:urunler.php");
}
}

?>