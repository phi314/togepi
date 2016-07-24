<script type="text/javascript">
function editjadwal(id_jadwal, id_user, nama_pekerjaan, tanggal_mulai, tanggal_selesai)
{
	//var id_proyekstr		= id_proyek
	var id_jadwalstr 		= id_jadwal;
	var id_userstr			= id_user;
	var nama_pekerjaanstr 	= nama_pekerjaan;
	var tanggal_mulaistr 	= tanggal_mulai;
	var tanggal_selesaistr 	= tanggal_selesai;

	//document.feditjadwal.id_proyek.value		= id_proyekstr;
	document.feditjadwal.id_jadwal.value 		= id_jadwalstr;
	document.feditjadwal.id_user.value 			= id_userstr;
	document.feditjadwal.nama_pekerjaan.value 	= nama_pekerjaanstr;
	document.feditjadwal.tanggal_mulai.value 	= tanggal_mulaistr;
	document.feditjadwal.tanggal_selesai.value 	= tanggal_selesaistr;
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
						<label class="col-sm-2">Nama User</label>
						<div class="col-sm-10">
							<select name="id_user"  class="form-control" >
							<option></option>
							<?php
								$sql = mysql_query("SELECT id_user,username FROM user");
								while($data = mysql_fetch_assoc($sql)){
							?>
								
								<option value=<?php echo $data['id_user']; ?>><?php echo $data['username']; ?></option>
							<?php
								}
							?>
						</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Nama Pekerjaan</label>
						<div class="col-sm-10">
							<input type="text" name="nama_pekerjaan" class="form-control" required="true"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Tanggal Mulai</label>
						<div class="col-sm-10">
							<input type="date" name="tanggal_mulai" class="form-control" required="true"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Tanggal Selesai</label>
						<div class="col-sm-10">
							<input type="date" name="tanggal_selesai" class="form-control" required="true"/>
						</div>
					</div>
					<button type="reset" class="btn btn-warning">Reset</button>
		        	<button type="submit" name="update-jadwal" class="btn btn-success">Simpan Data</button>
				</form>
	      	</div>
		</div>
	</div>
</div>