<?php
	@$id_rute     = $_POST["id_rute"];
	@$kota_asal   = $_POST["kota_asal"];
	@$kota_tujuan = $_POST["kota_tujuan"];

	$sql = mysql_query("SELECT * FROM rute");
	$data = mysql_fetch_assoc($sql);
	$cek_id = $data["id_rute"];

	if (isset($_POST["update-rute"]))
	{
		if ($cek_id)
		{
			if (!empty($kota_asal))
			{
				$sql = mysql_query("UPDATE rute SET kota_asal = '$kota_asal' WHERE id_rute = '$id_rute'");
			}else{
				$sql = mysql_query("UPDATE rute SET kota_asal = '$kota_asal' WHERE id_rute = '$id_rute'");
			}
			if (!empty($kota_tujuan))
			{
				$sql = mysql_query("UPDATE rute SET kota_tujuan = '$kota_tujuan' WHERE id_rute = '$id_rute'");
			}else{
				$sql = mysql_query("UPDATE rute SET kota_tujuan = '$kota_tujuan' WHERE id_rute = '$id_rute'");
			}

?>
	<div class="alert alert-success">
		Data Rute dengan kode <?php echo $kota_asal; ?> berhasil diganti. Terima kasih!
	</div>
	<script type="text/javascript">
		setTimeout('location.href="http://localhost/supertel/admin/beranda.php?page=datarute.php"', 3000);
	</script>
<?php
		}
	}
?>