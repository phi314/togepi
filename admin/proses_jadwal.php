<?php
	@$id_proyek			= $_POST['id_proyek'];
	@$id_user		  	= $_POST['id_user'];
	@$nama_pekerjaan 	= $_POST['nama_pekerjaan'];
	@$tanggal_mulai	  	= $_POST['tanggal_mulai'];
	@$tanggal_selesai 	= $_POST['tanggal_selesai'];

	if (isset($_POST["submit"]))
	{
		$sql = mysql_query("INSERT INTO jadwal (id_user,id_proyek, nama_pekerjaan, tanggal_mulai, tanggal_selesai) VALUES ('$id_user','$id_proyek','$nama_pekerjaan', '$tanggal_mulai', '$tanggal_selesai')");

		if ($sql)
		{
?>
	<div class="alert alert-success">
		Nama Pekerjaan <?php echo $nama_pekerjaan; ?> berhasil disimpan. Terima kasih!
	</div>
	<script type="text/javascript">
		setTimeout('location.href="http://localhost/nusantec/admin/beranda.php?page=datajadwal.php"', 3000);
	</script>
<?php
		}
	}
?>
	