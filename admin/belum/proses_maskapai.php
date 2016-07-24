<?php
	@$id_rute = $_POST['id_rute'];
	@$harga	  = $_POST['harga'];

	if (isset($_POST["submit"]))
	{
		$sql = mysql_query("INSERT INTO maskapai (id_rute, harga) VALUES ('$id_rute', '$harga' )");

		if ($sql)
		{
?>
	<div class="alert alert-success">
		ID Maskapai dengan harga <?php echo $harga; ?> berhasil disimpan. Terima kasih!
	</div>
	<script type="text/javascript">
		setTimeout('location.href="http://localhost/supertel/admin/beranda.php?page=datamaskapai.php"', 3000);
	</script>
<?php
		}
	}
?>
	