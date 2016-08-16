<?php
	require "../config/koneksi.php";
    require "../komponen/library.php";

	$id_gsc = $_GET['id_gsc'];

	$sql = mysql_query("DELETE FROM gsc WHERE id_gsc = '$id_gsc'");

	if ($sql) 
	{
        header("location:{$site_url}admin/beranda.php?page=datagsc.php");
	}
?>