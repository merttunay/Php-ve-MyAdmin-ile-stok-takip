<?php

$baglanti = new mysqli('localhost', 'root', '', 'esnafotomasyon');
	if(mysqli_connect_error())
	{
		echo mysqli_connect_error();
		exit;
	}


$baglanti->set_charset("utf8");

?>