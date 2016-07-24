<?php
	@$id_kompleksitas   = $_POST["id_kompleksitas"];
	@$komponen_sistem 	= $_POST["komponen_sistem"];
	@$nama_kegiatan 	= $_POST["nama_kegiatan"];
	@$sederhana   		= $_POST["sederhana"];
	@$menengah   		= $_POST["menengah"];
	@$komplek   		= $_POST["komplek"];

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


	$sql = mysql_query("SELECT * FROM kompleksitas");
	$data = mysql_fetch_assoc($sql);
	$cek_id = $data["id_kompleksitas"];

	

	if (isset($_POST["update-cfp"]))
	{
		if ($cek_id)
		{
			if (!empty($komponen_sistem))
			{
				$sql = mysql_query("UPDATE kompleksitas SET komponen_sistem = '$komponen_sistem', total='$total' WHERE id_kompleksitas = '$id_kompleksitas'");
			}else{
				$sql = mysql_query("UPDATE kompleksitas SET komponen_sistem = '$komponen_sistem', total='$total' WHERE id_kompleksitas = '$id_kompleksitas'");
			}
			if (!empty($nama_kegiatan))
			{
				$sql = mysql_query("UPDATE kompleksitas SET nama_kegiatan = '$nama_kegiatan', total='$total' WHERE id_kompleksitas = '$id_kompleksitas'");
			}else{
				$sql = mysql_query("UPDATE kompleksitas SET nama_kegiatan = '$nama_kegiatan', total='$total' WHERE id_kompleksitas = '$id_kompleksitas'");
			}
			if (!empty($sederhana))
			{
				$sql = mysql_query("UPDATE kompleksitas SET sederhana = '$sederhana', total='$total' WHERE id_kompleksitas = '$id_kompleksitas'");
			}else{
				$sql = mysql_query("UPDATE kompleksitas SET sederhana = '$sederhana', total='$total' WHERE id_kompleksitas = '$id_kompleksitas'");
			}
			if (!empty($menengah))
			{
				$sql = mysql_query("UPDATE kompleksitas SET menengah = '$menengah', total='$total' WHERE id_kompleksitas = '$id_kompleksitas'");
			}else{
				$sql = mysql_query("UPDATE kompleksitas SET menengah = '$menengah', total='$total' WHERE id_kompleksitas = '$id_kompleksitas'");
			}
			if (!empty($komplek))
			{
				$sql = mysql_query("UPDATE kompleksitas SET komplek = '$komplek', total='$total' WHERE id_kompleksitas = '$id_kompleksitas'");
			}else{
				$sql = mysql_query("UPDATE kompleksitas SET komplek = '$komplek', total='$total' WHERE id_kompleksitas = '$id_kompleksitas'");
			}
		
?>
	<div class="alert alert-success">
		Data user berhasil diganti. Terima kasih!
	</div>
	<script type="text/javascript">
		setTimeout('location.href="http://localhost/nusantec/admin/beranda.php?page=datacfp.php"', 3000);
	</script>
<?php
		}
	}
?>