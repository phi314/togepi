<?php
	/*require "../config/koneksi.php";

	$id_proyek = $_GET['id_proyek'];

	$sql = mysql_query("DELETE FROM proyek WHERE id_proyek = '$id_proyek'");

	if ($sql) 
	{
		header("location: http://localhost/nusantec/admin/beranda.php?page=dataproyek.php");
	}*/
	require "../config/koneksi.php";
require "../komponen/library.php";

	$id_proyek = $_GET['id_proyek'];

	$sql = mysql_query("DELETE FROM proyek WHERE id = '$id_proyek'");
//	$sql1 = mysql_query("DELETE FROM resiko WHERE id_proyek = '$id_proyek'");
//	$sql2 = mysql_query("DELETE FROM kompleksitas WHERE id_proyek = '$id_proyek'");
//	$sql3 = mysql_query("DELETE FROM proyek_pekerjaan WHERE id_proyek = '$id_proyek'");
//	$sql4 = mysql_query("DELETE FROM proyek_pekerjaan WHERE id_proyek = '$id_proyek'");

	if ($sql) 
	{
		header("location:{$site_url}admin/beranda.php?page=dataproyek.php");
	}
?>