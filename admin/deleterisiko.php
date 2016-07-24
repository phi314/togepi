<?php
	require "../config/koneksi.php";

	$id_resiko = $_GET['id_resiko'];

	$sql = mysql_query("DELETE FROM resiko WHERE id_resiko = '$id_resiko'");

	if ($sql) 
	{
		header("location: http://localhost/nusantec/admin/beranda.php?page=dataresiko.php");
	}
?>