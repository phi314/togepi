<?php
	require "../config/koneksi.php";

	$id_rute = $_GET['id_rute'];

	$sql = mysql_query("DELETE FROM rute WHERE id_rute = '$id_rute'");

	if ($sql) 
	{
		header("location: http://localhost/supertel/admin/beranda.php?page=datarute.php");
	}
?>