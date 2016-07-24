<?php
	@$id_resiko  		= $_POST["id_resiko"];
	@$kode_resiko 		= $_POST["kode_resiko"];
	@$jenis_resiko 		= $_POST["jenis_resiko"];
	@$deskripsi_resiko  = $_POST["deskripsi_resiko"];
	

	$sql = mysql_query("SELECT * FROM resiko");
	$data = mysql_fetch_assoc($sql);
	$cek_id = $data["id_resiko"];

	

	if (isset($_POST["update-resiko"]))
	{
		if ($cek_id)
		{
			if (!empty($kode_resiko))
			{
				$sql = mysql_query("UPDATE resiko SET kode_resiko = '$kode_resiko' WHERE id_resiko = '$id_resiko'");
			}else{
				$sql = mysql_query("UPDATE resiko SET kode_resiko = '$kode_resiko' WHERE id_resiko = '$id_resiko'");
			}
			if (!empty($jenis_resiko))
			{
				$sql = mysql_query("UPDATE resiko SET jenis_resiko = '$jenis_resiko' WHERE id_resiko = '$id_resiko'");
			}else{
				$sql = mysql_query("UPDATE resiko SET jenis_resiko = '$jenis_resiko' WHERE id_resiko = '$id_resiko'");
			}
			if (!empty($deskripsi_resiko))
			{
				$sql = mysql_query("UPDATE resiko SET deskripsi_resiko = '$deskripsi_resiko' WHERE id_resiko = '$id_resiko'");
			}else{
				$sql = mysql_query("UPDATE resiko SET deskripsi_resiko = '$deskripsi_resiko' WHERE id_resiko = '$id_resiko'");
			}
			
		
?>
	<div class="alert alert-success">
		Data Resiko berhasil diganti. Terima kasih!
	</div>
	<script type="text/javascript">
		setTimeout('location.href="http://localhost/nusantec/admin/beranda.php?page=dataresiko.php"', 3000);
	</script>
<?php
		}
	}
?>