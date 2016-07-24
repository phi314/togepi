<?php
	@$id_jadwal   		= $_POST["id_jadwal"];
	@$id_user	 		= $_POST["id_user"];
	@$nama_pekerjaan 	= $_POST["nama_pekerjaan"];
	@$tanggal_mulai   	= $_POST["tanggal_mulai"];
	@$tanggal_selesai   = $_POST["tanggal_selesai"];

	$sql = mysql_query("SELECT * FROM jadwal");
	$data = mysql_fetch_assoc($sql);
	$cek_id = $data["id_jadwal"];

	if (isset($_POST["update-jadwal"]))
	{
		if ($cek_id)
		{
			if (!empty($id_user))
			{
				$sql = mysql_query("UPDATE jadwal SET id_user = '$id_user' WHERE id_jadwal = '$id_jadwal'");
			}else{
				$sql = mysql_query("UPDATE jadwal SET id_user = '$id_user' WHERE id_jadwal = '$id_jadwal'");
			}
			if (!empty($nama_pekerjaan))
			{
				$sql = mysql_query("UPDATE jadwal SET nama_pekerjaan = '$nama_pekerjaan' WHERE id_jadwal = '$id_jadwal'");
			}else{
				$sql = mysql_query("UPDATE jadwal SET nama_pekerjaan = '$nama_pekerjaan' WHERE id_jadwal = '$id_jadwal'");
			}
			if (!empty($tanggal_mulai))
			{
				$sql = mysql_query("UPDATE jadwal SET tanggal_mulai = '$tanggal_mulai' WHERE id_jadwal = '$id_jadwal'");
			}else{
				$sql = mysql_query("UPDATE jadwal SET tanggal_mulai = '$tanggal_mulai' WHERE id_jadwal = '$id_jadwal'");
			}
			if (!empty($tanggal_selesai))
			{
				$sql = mysql_query("UPDATE jadwal SET tanggal_selesai = '$tanggal_selesai' WHERE id_jadwal = '$id_jadwal'");
			}else{
				$sql = mysql_query("UPDATE jadwal SET tanggal_selesai = '$tanggal_selesai' WHERE id_jadwal = '$id_jadwal'");
			}
			
?>
	<div class="alert alert-success">
		Data jadwal berhasil diganti. Terima kasih!
	</div>
	<script type="text/javascript">
		setTimeout('location.href="http://localhost/nusantec/admin/beranda.php?page=datajadwal.php"', 3000);
	</script>
<?php
		}
	}
?>