<?php
	require "../config/koneksi.php";
require "../komponen/library.php";

	$id_resiko = $_GET['id_resiko'];

	$sql = mysql_query("DELETE FROM resiko WHERE id_resiko = '$id_resiko'");

	if ($sql) 
	{
        header("location:{$site_url}admin/beranda.php?page=dataresiko.php");
	}
?>