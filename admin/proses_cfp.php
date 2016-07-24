<?php
	@$id_proyek			= $_POST['id_proyek'];
	@$komponen_sistem 	= $_POST['komponen_sistem'];
	@$nama_kegiatan 	= $_POST['nama_kegiatan'];
	@$sederhana 		= $_POST['sederhana'];
	@$menengah 			= $_POST['menengah'];
	@$komplek 			= $_POST['komplek'];
	//$total				= $sederhana+$menengah+$komplek;
	if($komponen_sistem=="INPUT"){
		$total = $sederhana*3+$menengah*4+$komplek*6;
	}elseif ($komponen_sistem=="OUTPUT") {
		$total = $sederhana*4+$menengah*5+$komplek*7;
	}elseif ($komponen_sistem=="FILE LOGIC") {
		$total = $sederhana*7+$menengah*10+$komplek*15;
	}elseif($komponen_sistem=="INQUERY"){
		$total = $sederhana*3+$menengah*4+$komplek*6;
	}else{
		$total = $sederhana*5+$menengah*7+$komplek*10;
	}


	if (isset($_POST["submit"]))
	{
		$sql = mysql_query("INSERT INTO kompleksitas (id_proyek,komponen_sistem, nama_kegiatan, sederhana, menengah, komplek,total) VALUES ('$id_proyek','$komponen_sistem','$nama_kegiatan','$sederhana','$menengah','$komplek','$total')") or die(mysql_error());

		if ($sql)
		{
?>
	<div class="alert alert-success">
		<?php echo $nama_kegiatan; ?> berhasil disimpan. Terima kasih!
	</div>
	<script type="text/javascript">
		setTimeout('location.href="http://localhost/nusantec/admin/beranda.php?page=datacfp.php"', 3000);
	</script>
<?php
		}
	}
?>
	