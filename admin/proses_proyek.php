<?php
	@$kode_proyek 		= $_POST['kode_proyek'];
	@$nama_proyek	  	= $_POST['nama_proyek'];
	@$biaya 			= $_POST['biaya'];
	@$tanggal_mulai	  	= $_POST['tanggal_mulai'];
	@$tanggal_selesai 	= $_POST['tanggal_selesai'];
	//@$status	  		= $_POST['status'];
	@$id_client			= $_POST['id_client'];

	if (isset($_POST["submit"]))
	{
		$sql = mysql_query("
		    INSERT INTO proyek (kode_proyek, id_client, nama_proyek, biaya, tanggal_mulai, tanggal_selesai, status)
		    VALUES ('$kode_proyek','$id_client', '$nama_proyek', '$biaya', '$tanggal_mulai', '$tanggal_selesai', 'Proses' )
		    ")or die(mysql_error());
		header('location:beranda.php?page=dataproyek.php');
	}
?>
	