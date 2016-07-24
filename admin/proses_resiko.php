<?php
	@$id_proyek			= $_POST['id_proyek'];
	@$kode_resiko 	= $_POST['kode_resiko'];
	@$jenis_resiko 	= $_POST['jenis_resiko'];
	@$deskripsi_resiko 		= $_POST['deskripsi_resiko'];
	


	if (isset($_POST["submit"]))
	{
		$sql = mysql_query("INSERT INTO resiko (id_resiko,id_proyek,kode_resiko, jenis_resiko, deskripsi_resiko) VALUES ('','$id_proyek','$kode_resiko','$jenis_resiko','$deskripsi_resiko')") or die(mysql_error());

		if ($sql)
		{
?>
	<div class="alert alert-success">
		<?php echo $kode_resiko; ?> berhasil disimpan. Terima kasih!
	</div>
	<script type="text/javascript">
		setTimeout('location.href="http://localhost/nusantec/admin/beranda.php?page=dataresiko.php"', 3000);
	</script>
<?php
		}
	}
?>
	