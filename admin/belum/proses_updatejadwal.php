<?php
	@$id_jadwal  		= $_POST["id_jadwal"];
	@$tanggal 			= $_POST["tanggal"];
	@$waktu_berangkat 	= $_POST["waktu_berangkat"];
	@$waktu_tiba   		= $_POST["waktu_tiba"];
	@$id_pesawat 		= $_POST["id_pesawat"];
	@$id_maskapai 		= $_POST["id_maskapai"];
	@$id_rute 			= $_POST["id_rute"];
	$sql = mysql_query("SELECT * FROM jadwal");
	$data = mysql_fetch_assoc($sql);
	$cek_id = $data["id_jadwal"];

	if (isset($_POST["update-jadwal"]))
	{
		if ($cek_id)
		{
			if (!empty($tanggal))
			{
				$sql = mysql_query("UPDATE jadwal SET tanggal = '$tanggal' WHERE id_jadwal = '$id_jadwal'");
			}else{
				$sql = mysql_query("UPDATE jadwal SET tanggal = '$tanggal' WHERE id_jadwal = '$id_jadwal'");
			}
			if (!empty($waktu_berangkat))
			{
				$sql = mysql_query("UPDATE jadwal SET waktu_berangkat = '$waktu_berangkat' WHERE id_jadwal = '$id_jadwal'");
			}else{
				$sql = mysql_query("UPDATE jadwal SET waktu_berangkat = '$waktu_berangkat' WHERE id_jadwal = '$id_jadwal'");
			}
			if (!empty($waktu_tiba))
			{
				$sql = mysql_query("UPDATE jadwal SET waktu_tiba = '$waktu_tiba' WHERE id_jadwal = '$id_jadwal'");
			}else{
				$sql = mysql_query("UPDATE jadwal SET waktu_tiba = '$waktu_tiba' WHERE id_jadwal = '$id_jadwal'");
			}
			if (!empty($id_pesawat))
			{
				$sql = mysql_query("UPDATE jadwal SET id_pesawat = '$id_pesawat' WHERE id_jadwal = '$id_jadwal'");
			}else{
				$sql = mysql_query("UPDATE jadwal SET id_pesawat = '$id_pesawat' WHERE id_jadwal = '$id_jadwal'");
			}
			if (!empty($id_maskapai))
			{
				$sql = mysql_query("UPDATE jadwal SET id_maskapai = '$id_maskapai' WHERE id_jadwal = '$id_jadwal'");
			}else{
				$sql = mysql_query("UPDATE jadwal SET id_maskapai = '$id_maskapai' WHERE id_jadwal = '$id_jadwal'");
			}
			if (!empty($id_rute))
			{
				$sql = mysql_query("UPDATE jadwal SET id_rute = '$id_rute' WHERE id_jadwal = '$id_jadwal'");
			}else{
				$sql = mysql_query("UPDATE jadwal SET id_rute = '$id_rute' WHERE id_jadwal = '$id_jadwal'");
			}
			
?>
	<div class="alert alert-success">
		Data Jadwal berhasil diganti. Terima kasih!
	</div>
	<script type="text/javascript">
		setTimeout('location.href="http://localhost/supertel/admin/beranda.php?page=datajadwal.php"', 3000);
	</script>
<?php
		}
	}
?>