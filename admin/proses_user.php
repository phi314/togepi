<?php

	require "../config/koneksi.php";

	@$nip 	    = $_POST['nip'];
	@$nama 	    = $_POST['nama'];
	@$username 	= $_POST['username'];
	@$password 	= $_POST['password'];
	$password   = md5($password);
	@$email 	= $_POST['email'];
	@$status 	= $_POST['status'];

	
	if (isset($_POST["submit"]))
	{
		$sql = mysql_query("INSERT INTO user (nip, nama, username, password, email, status) VALUES ('$nip', '$nama', '$username', '$password', '$email', '$status')");
		header('location:beranda.php?page=datauser.php');
	}
?>
