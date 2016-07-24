<?php
	require "../config/koneksi.php";

	$id_kompleksitas = $_GET['id_kompleksitas'];

	$sql = mysql_query("DELETE FROM kompleksitas WHERE id_kompleksitas = '$id_kompleksitas'");

	if ($sql) 
	{
		header("location: http://localhost/nusantec/admin/beranda.php?page=datacfp.php");
	}
?>