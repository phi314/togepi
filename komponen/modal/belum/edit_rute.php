<script type="text/javascript">
function editrute(id_rute, kota_asal, kota_tujuan, kode_rute)
{
	var id_rutestr 		= id_rute;
	var kota_asalstr	= kota_asal;
	var kota_tujuanstr 	= kota_tujuan;
	var kode_rutestr 	= kode_rute;

	document.feditrute.id_rute.value = id_rutestr;
	document.feditrute.kota_asal.value = kota_asalstr;
	document.feditrute.kota_tujuan.value = kota_tujuanstr;
	document.feditrute.kode_rute.value = kode_rutestr;
}
</script>

<div class="modal fade" id="edit-rute" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Form Edit Data Rute</h4>
			</div>
			<div class="modal-body">
				<form method="POST" name="feditrute" class="form-horizontal">
					<input type="hidden" name="id_rute" value="" />
					<div class="form-group">
						<label class="col-sm-2">Kota Asal</label>
						<div class="col-sm-10">
							<select name="kota_asal">
							<option></option>
							<?php
								$sql = mysql_query("SELECT * FROM kota");
								while($data = mysql_fetch_assoc($sql)){
							?>
								
								<option value=<?php echo $data['kota']; ?>><?php echo $data['kota']; ?></option>
							<?php
								}
							?>
						</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Kota Tujuan</label>
						<div class="col-sm-10">
							<select name="kota_tujuan">
							<option></option>
							<?php
								$sql = mysql_query("SELECT * FROM kota");
								while($data = mysql_fetch_assoc($sql)){
							?>
								
								<option value=<?php echo $data['kota']; ?>><?php echo $data['kota']; ?></option>
							<?php
								}
							?>
						</select>
						</div>
					</div>
					
					<button type="reset" class="btn btn-warning">Reset</button>
		        	<button type="submit" name="update-rute" class="btn btn-success">Simpan Data</button>
				</form>
	      	</div>
		</div>
	</div>
</div>