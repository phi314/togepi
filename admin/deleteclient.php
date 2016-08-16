<?php
	require "../config/koneksi.php";
require "../komponen/library.php";

	$id_client = $_GET['id_client'];

	$sql = mysql_query("DELETE FROM client WHERE id_client = '$id_client'");

	if ($sql) 
	{
        header("location:{$site_url}admin/beranda.php?page=dataclient.php");
	}
?>