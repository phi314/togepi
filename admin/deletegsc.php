<?php
	require "../config/koneksi.php";

	$id_gsc = $_GET['id_gsc'];

	$sql = mysql_query("DELETE FROM gsc WHERE id_gsc = '$id_gsc'");

	if ($sql) 
	{
		header("location: http://localhost/nusantec/admin/beranda.php?page=datagsc.php");
	}
?>