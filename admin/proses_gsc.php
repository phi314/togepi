<?php
	@$nama_gsc 		= $_POST['nama_gsc'];
	@$nilai_gsc 	= $_POST['nilai_gsc'];
	

	
	if (isset($_POST["submit"]))
	{
		$sql = mysql_query("INSERT INTO gsc (nama_gsc, nilai_gsc) VALUES ('$nama_gsc', '$nilai_gsc')");

		if ($sql)
		{
?>
	<div class="alert alert-success">
		Data GSC dengan Nama Kegiatan <?php echo $nama_gsc; ?> berhasil disimpan. Terima kasih!
	</div>
	<script type="text/javascript">
		setTimeout('location.href="http://localhost/nusantec/admin/beranda.php?page=datagsc.php"', 3000);
	</script>
<?php
		}
	}
?>
	