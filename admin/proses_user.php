<?php

	require "../config/koneksi.php";

	@$nama 	= $_POST['nama'];
	@$username 	= $_POST['username'];
	@$password 	= $_POST['password'];
	$password=md5($password);
	@$email 	= $_POST['email'];
	@$status 	= $_POST['status'];

	
	if (isset($_POST["submit"]))
	{
		$sql = mysql_query("INSERT INTO user (nama, username, password, email, status) VALUES ('$nama', '$username', '$password', '$email', '$status')");
		header('location:beranda.php?page=datauser.php');
	}
?>
