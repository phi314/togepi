<?php
	@$id_user   = $_POST["id_user"];
    @$nip       = $_POST["nip"];
	@$nama   = $_POST["nama"];
	@$username 	= $_POST["username"];
//	@$password 	= $_POST["password"];
	$password=md5($password);
	@$email 	= $_POST["email"];
	@$status   	= $_POST["status"];


	$sql = mysql_query("SELECT * FROM user");
	$data = mysql_fetch_assoc($sql);
	$cek_id = $data["id_user"];

	if (isset($_POST["update-user"]))
	{
		if ($cek_id)
		{
            if (!empty($nama))
            {
                $sql = mysql_query("UPDATE user SET nama = '$nama' WHERE id_user = '$id_user'");
            }else{
                $sql = mysql_query("UPDATE user SET nama = '$nama' WHERE id_user = '$id_user'");
            }
			if (!empty($username))
			{
				$sql = mysql_query("UPDATE user SET username = '$username' WHERE id_user = '$id_user'");
			}else{
				$sql = mysql_query("UPDATE user SET username = '$username' WHERE id_user = '$id_user'");
			}
//			if (!empty($password))
//			{
//				$sql = mysql_query("UPDATE user SET password = '$password' WHERE id_user = '$id_user'");
//			}else{
//				$sql = mysql_query("UPDATE user SET password = '$password' WHERE id_user = '$id_user'");
//			}
            if (!empty($nip))
            {
                $sql = mysql_query("UPDATE user SET nip = '$nip' WHERE id_user = '$id_user'");
            }else{
                $sql = mysql_query("UPDATE user SET nip = '$nip' WHERE id_user = '$id_user'");
            }
			if (!empty($email))
			{
				$sql = mysql_query("UPDATE user SET email = '$email' WHERE id_user = '$id_user'");
			}else{
				$sql = mysql_query("UPDATE user SET email = '$email' WHERE id_user = '$id_user'");
			}
			if (!empty($status))
			{
				$sql = mysql_query("UPDATE user SET status = '$status' WHERE id_user = '$id_user'");
			}else{
				$sql = mysql_query("UPDATE user SET status = '$status' WHERE id_user = '$id_user'");
			}
			
?>
	<div class="alert alert-success">
		Data user berhasil diganti. Terima kasih!
	</div>
	<script type="text/javascript">
		setTimeout('location.href="http://localhost/nusantec/admin/beranda.php?page=datauser.php"', 3000);
	</script>
<?php
		}
	}
?>