<?php
	require "../config/koneksi.php";

	$id_user = $_GET['id_user'];

	$sql = mysql_query("DELETE FROM user WHERE id_user = '$id_user'");

	if ($sql) 
	{
		header("location: http://localhost/nusantec/admin/beranda.php?page=datauser.php");
	}
?>