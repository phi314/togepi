<?php
	@$id_client   	= $_POST["id_client"];
	@$nama_client 	= $_POST["nama_client"];
	@$email 		= $_POST["email"];
	@$instansi   	= $_POST["instansi"];


	$sql = mysql_query("SELECT * FROM client");
	$data = mysql_fetch_assoc($sql);
	$cek_id = $data["id_client"];

	if (isset($_POST["update-client"]))
	{
		if ($cek_id)
		{
			if (!empty($nama_client))
			{
				$sql = mysql_query("UPDATE client SET nama_client = '$nama_client' WHERE id_client = '$id_client'");
			}else{
				$sql = mysql_query("UPDATE client SET nama_client = '$nama_client' WHERE id_client = '$id_client'");
			}
			if (!empty($email))
			{
				$sql = mysql_query("UPDATE client SET email = '$email' WHERE id_client = '$id_client'");
			}else{
				$sql = mysql_query("UPDATE client SET email = '$email' WHERE id_client = '$id_client'");
			}
			if (!empty($instansi))
			{
				$sql = mysql_query("UPDATE client SET instansi = '$instansi' WHERE id_client = '$id_client'");
			}else{
				$sql = mysql_query("UPDATE client SET instansi = '$instansi' WHERE id_client = '$id_client'");
			}
			
?>
	<div class="alert alert-success">
		Data user berhasil diganti. Terima kasih!
	</div>
	<script type="text/javascript">
		setTimeout('location.href="http://localhost/nusantec/admin/beranda.php?page=dataclient.php"', 3000);
	</script>
<?php
		}
	}
?>