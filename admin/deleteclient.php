<?php
	require "../config/koneksi.php";

	$id_client = $_GET['id_client'];

	$sql = mysql_query("DELETE FROM client WHERE id_client = '$id_client'");

	if ($sql) 
	{
		header("location: http://localhost/nusantec/admin/beranda.php?page=dataclient.php");
	}
?>