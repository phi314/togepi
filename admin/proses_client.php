<?php
	
	@$nama_client 	= $_POST['nama_client'];
	@$email 		= $_POST['email'];
	@$instansi 		= $_POST['instansi'];
	@$id_client		= $_SESSION['id_client'];

	if (isset($_POST["submit"]))
	{
		$sql = mysql_query("INSERT INTO client (nama_client,id_client, email, instansi) VALUES ('$nama_client','$id_client','$email','$instansi')");

		if ($sql)
		{
?>
	<div class="alert alert-success">
		<?php echo $nama_client; ?> berhasil disimpan. Terima kasih!
	</div>
	<script type="text/javascript">
		setTimeout('location.href="http://localhost/nusantec/admin/beranda.php?page=dataclient.php"', 3000);
	</script>
<?php
		}
	}
?>
	