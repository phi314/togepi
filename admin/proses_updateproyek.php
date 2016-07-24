<?php
	@$id_proyek 		= $_POST['id_proyek'];
	@$nama_proyek	  	= $_POST['nama_proyek'];
    @$tujuan            = $_POST['tujuan'];
    @$asal_muasal       = $_POST['asal_muasal'];
    @$fase              = $_POST['fase'];
	@$biaya 			= $_POST['biaya'];
//	@$tanggal_mulai	  	= $_POST['tanggal_mulai'];
//	@$tanggal_selesai 	= $_POST['tanggal_selesai'];
//	@$status	  		= $_POST['status'];

	if (isset($_POST["update-proyek"]))
	{
		mysql_query("UPDATE proyek SET
		    nama_proyek='$nama_proyek',
		    tujuan='$tujuan',
		    asal_muasal='$fase',
		    biaya='$biaya'
		    WHERE id='$id_proyek'");
?>
	<div class="alert alert-success">
		Data berhasil diganti. Terima kasih!
	</div>
	<script type="text/javascript">
		setTimeout('location.href="http://localhost/nusantec/admin/beranda.php?page=detailproyek.php&id=<?php echo $id_proyek; ?>"', 3000);
	</script>
<?php
	}
?>