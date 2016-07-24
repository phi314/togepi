<?php
	@$id_maskapai   = $_POST["id_maskapai"];
	@$id_rute 		= $_POST["id_rute"];
	@$harga 		= $_POST["harga"];

	$sql = mysql_query("SELECT * FROM maskapai");
	$data = mysql_fetch_assoc($sql);
	$cek_id = $data["id_maskapai"];

	if (isset($_POST["update-maskapai"]))
	{
		if ($cek_id)
		{
			if (!empty($id_maskapai))
			{
				$sql = mysql_query("UPDATE maskapai SET id_maskapai = '$id_maskapai' WHERE id_maskapai = '$id_maskapai'");
			}else{
				$sql = mysql_query("UPDATE maskapai SET id_maskapai = '$id_maskapai' WHERE id_maskapai = '$id_maskapai'");
			}
			if (!empty($id_rute))
			{
				$sql = mysql_query("UPDATE maskapai SET id_rute = '$id_rute' WHERE id_maskapai = '$id_maskapai'");
			}else{
				$sql = mysql_query("UPDATE maskapai SET id_rute = '$id_rute' WHERE id_maskapai = '$id_maskapai'");
			}
			if (!empty($harga))
			{
				$sql = mysql_query("UPDATE maskapai SET harga = '$harga' WHERE id_maskapai = '$id_maskapai'");
			}else{
				$sql = mysql_query("UPDATE maskapai SET harga = '$harga' WHERE id_maskapai = '$id_maskapai'");
			}
?>
	<div class="alert alert-success">
		Data berhasil diganti. Terima kasih!
	</div>
	<script type="text/javascript">
		setTimeout('location.href="http://localhost/supertel/admin/beranda.php?page=datamaskapai.php"', 3000);
	</script>
<?php
		}
	}
?>