<script type="text/javascript">
function editjadwal(id_jadwal, tanggal, waktu_berangkat, waktu_tiba, id_pesawat, id_maskapai)
{
	var id_jadwalstr 		= id_jadwal;
	var tanggalstr			= tanggal;
	var waktu_berangkatstr 	= waktu_berangkat;
	var waktu_tibastr 		= waktu_tiba;
	var id_pesawatstr		= id_pesawat;
	var id_maskapaistr 		= id_maskapai;
	var id_rutestr 			= id_rute;

	document.feditjadwal.id_jadwal.value 		= id_jadwalstr;
	document.feditjadwal.tanggal.value 	 		= tanggalstr;
	document.feditjadwal.waktu_berangkat.value  = waktu_berangkatstr;
	document.feditjadwal.waktu_tiba.value 	    = waktu_tibastr;
	document.feditjadwal.id_pesawat.value 		= id_pesawatstr;
	document.feditjadwal.id_maskapai.value 		= id_maskapaistr;
	document.feditjadwal.id_rute.value 			= id_rutestr;
}
</script>

<div class="modal fade" id="edit-jadwal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Form Edit Data Jadwal</h4>
			</div>
			<div class="modal-body">
				<form method="POST" name="feditjadwal" class="form-horizontal">
					<input type="hidden" name="id_jadwal" value="" />
					<div class="form-group">
						<label class="col-sm-2">Tanggal</label>
						<div class="col-sm-10">
							<input type="date" name="tanggal" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Waktu Berangkat</label>
						<div class="col-sm-10">
							<input type="time" name="waktu_berangkat" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Waktu Tiba</label>
						<div class="col-sm-10">
							<input type="time" name="waktu_tiba" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">ID Pesawat</label>
						<div class="col-sm-10">
							<select name="id_pesawat">
							<option></option>
							<?php
								$sql = mysql_query("SELECT * FROM pesawat");
								while($data = mysql_fetch_assoc($sql)){
							?>
								<option value=<?php echo $data['id_pesawat']; ?>><?php echo $data['id_pesawat']; ?></option>
							<?php
								}
							?>
						</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">ID Maskapai</label>
						<div class="col-sm-10">
							<select name="id_maskapai">
							<option></option>
							<?php
								$sql = mysql_query("SELECT * FROM maskapai");
								while($data = mysql_fetch_assoc($sql)){
							?>
								
								<option value=<?php echo $data['id_maskapai']; ?>><?php echo $data['id_maskapai']; ?></option>
							<?php
								}
							?>
						</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">ID Rute</label>
						<div class="col-sm-10">
							<select name="id_rute">
							<option></option>
							<?php
								$sql = mysql_query("SELECT * FROM rute");
								while($data = mysql_fetch_assoc($sql)){
							?>
								
								<option value=<?php echo $data['id_rute']; ?>><?php echo $data['id_rute']; ?></option>
							<?php
								}
							?>
						</select>
						</div>
					</div>
					<button type="reset" class="btn btn-warning">Reset</button>
		        	<button type="submit" name="update-jadwal" class="btn btn-success">Simpan Data</button>
				</form>
	      	</div>
		</div>
	</div>
</div>