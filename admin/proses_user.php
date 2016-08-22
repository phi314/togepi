<?php

	require "../config/koneksi.php";

	@$nip 	    = $_POST['nip'];
	@$nama 	    = $_POST['nama'];
	@$username 	= $_POST['username'];
	@$password 	= $_POST['password'];
	$password   = md5($password);
	@$email 	= $_POST['email'];
	@$status 	= $_POST['status'];

    $q_cek_nip = mysql_query("SELECT * FROM user WHERE nip='$nip' LIMIT 1");
    if(mysql_num_rows($q_cek_nip) > 0)
    {
        header("location: {$site_url}beranda.php?page=datauser.php&message=Nip: {$nip} sudah Ada");
    }
	else if (isset($_POST["submit"]))
	{
		$sql = mysql_query("INSERT INTO user (nip, nama, username, password, email, status) VALUES ('$nip', '$nama', '$username', '$password', '$email', '$status')");
		header("location:{$site_url}beranda.php?page=datauser.php&message=Berhasil tambah user");
	}
?>
