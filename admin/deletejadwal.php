<?php
	require "../config/koneksi.php";

	$id_jadwal = $_GET['id_jadwal'];

	$sql = mysql_query("DELETE FROM jadwal WHERE id_jadwal = '$id_jadwal'");
	if ($sql) 
	{
		header("location: http://localhost/nusantec/admin/beranda.php?page=datajadwal.php");
	}
?>