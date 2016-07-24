<?php
	@$kota_asal 	= $_POST['kota_asal'];
	@$kota_tujuan 	= $_POST['kota_tujuan'];

	if (isset($_POST["submit"]))
	{
		$sql = mysql_query("INSERT INTO rute (kota_asal, kota_tujuan) VALUES ('$kota_asal', '$kota_tujuan')");

		if ($sql)
		{
?>
	<div class="alert alert-success">
		Data Rute dengan kota <?php echo $kota_asal; ?> berhasil disimpan. Terima kasih!
	</div>
	<script type="text/javascript">
		setTimeout('location.href="http://localhost/supertel/admin/beranda.php?page=datarute.php"', 3000);
	</script>
<?php
		}
	}
?>
	