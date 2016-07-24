<?php
	@$id_gsc   		= $_POST["id_gsc"];
	@$nama_gsc 		= $_POST["nama_gsc"];
	@$nilai_gsc 	= $_POST["nilai_gsc"];


	$sql = mysql_query("SELECT * FROM gsc");
	$data = mysql_fetch_assoc($sql);
	$cek_id = $data["id_gsc"];

	if (isset($_POST["update-gsc"]))
	{
		if ($cek_id)
		{
			if (!empty($nama_gsc))
			{
				$sql = mysql_query("UPDATE gsc SET nama_gsc = '$nama_gsc' WHERE id_gsc = '$id_gsc'");
			}else{
				$sql = mysql_query("UPDATE gsc SET nama_gsc = '$nama_gsc' WHERE id_gsc = '$id_gsc'");
			}
			if (!empty($nilai_gsc))
			{
				$sql = mysql_query("UPDATE gsc SET nilai_gsc = '$nilai_gsc' WHERE id_gsc = '$id_gsc'");
			}else{
				$sql = mysql_query("UPDATE gsc SET nilai_gsc = '$nilai_gsc' WHERE id_gsc = '$id_gsc'");
			}
			
?>
	<div class="alert alert-success">
		Data user berhasil diganti. Terima kasih!
	</div>
	<script type="text/javascript">
		setTimeout('location.href="http://localhost/nusantec/admin/beranda.php?page=datagsc.php"', 3000);
	</script>
<?php
		}
	}
?>