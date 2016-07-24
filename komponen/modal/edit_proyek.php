<script type="text/javascript">
function editproyek(id_proyek, nama_proyek, biaya, tanggal_mulai, tanggal_selesai, status)
{
	var id_proyekstr 			= id_proyek;
	
	var nama_proyekstr 			= nama_proyek;
	var biayastr 				= biaya;
	var tanggal_mulaistr 		= tanggal_mulai;
	var tanggal_selesaistr 		= tanggal_selesai;
	var statusstr 				= status;

	document.feditproyek.id_proyek.value   		= id_proyekstr;

	document.feditproyek.nama_proyek.value 		= nama_proyekstr;
	document.feditproyek.biaya.value 			= biayastr;
	document.feditproyek.tanggal_mulai.value   	= tanggal_mulaistr;
	document.feditproyek.tanggal_selesai.value 	= tanggal_selesaistr;
	document.feditproyek.status.value 			= statusstr;


}
</script>
<div class="modal fade" id="edit-proyek" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Form Edit Data Proyek</h4>
			</div>
			<div class="modal-body">

				<form method="POST" name="feditproyek" class="form-horizontal">
					<input type="hidden" name="id_proyek" value="" />

					<div class="form-group">
						<label class="col-sm-2">Kode Proyek</label>
						<div class="col-sm-10">
							<input type="text" name="id_proyek" class="form-control" required="true"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Nama Proyek</label>
						<div class="col-sm-10">
							<input type="text" name="nama_proyek" class="form-control" required="true"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Biaya</label>
						<div class="col-sm-10">
							<input type="text" name="biaya" class="form-control" required="true"/>
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
					<div class="form-group">
						<label class="col-sm-2">Status</label>
						<div class="col-sm-10">
							<input type="text" name="status" class="form-control" required="true"/>
						</div>
					</div>
					
					<button type="reset" class="btn btn-warning">Reset</button>
		        	<button type="submit" name="update-proyek" class="btn btn-success">Simpan Data</button>
				</form>
	      	</div>
		</div>
	</div>
</div>
