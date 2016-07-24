<?php
	@$tanggal	  	  = $_POST['tanggal'];
	@$waktu_berangkat = $_POST['waktu_berangkat'];
	@$waktu_tiba 	  = $_POST['waktu_tiba'];
	@$id_pesawat 	  = $_POST['id_pesawat'];
	@$id_maskapai 	  = $_POST['id_maskapai'];
	@$id_rute 	  	  = $_POST['id_rute'];


	if (isset($_POST["submit"]))
	{
		$sql = mysql_query("INSERT INTO jadwal (tanggal, waktu_berangkat, waktu_tiba, id_pesawat, id_maskapai, id_rute) VALUES ('$tanggal', '$waktu_berangkat', '$waktu_tiba', '$id_pesawat', '$id_maskapai', '$id_rute')");

		if ($sql)
		{
?>
	<div class="alert alert-success">
		Data Jadwal dengan tanggal <?php echo $tanggal; ?> berhasil disimpan. Terima kasih!
	</div>
	<script type="text/javascript">
		setTimeout('location.href="http://localhost/supertel/admin/beranda.php?page=datajadwal.php"', 3000);
	</script>
<?php
		}
	}
?>
	