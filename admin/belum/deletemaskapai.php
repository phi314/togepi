<?php
	require "../config/koneksi.php";

	$id_maskapai = $_GET['id_maskapai'];

	$sql = mysql_query("DELETE FROM maskapai WHERE id_maskapai = '$id_maskapai'");

	if ($sql) 
	{
		header("location: http://localhost/supertel/admin/beranda.php?page=datamaskapai.php");
	}
?>