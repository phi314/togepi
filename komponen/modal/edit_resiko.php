<script type="text/javascript">
function editrisiko(id_resiko,kode_resiko, jenis_resiko, deskripsi_resiko, id_proyek)
{
	var id_resiko = id_resiko;
	var kode_resikostr 	= kode_resiko;
	var id_proyekstr 	    = id_proyek;
	var jenis_resikostr	= jenis_resiko;
	var deskripsi_resikostr 	= deskripsi_resiko;
	
	document.feditresiko.id_resiko.value = id_resiko;
	document.feditresiko.kode_resiko.value 	= kode_resikostr;
	document.feditresiko.id_proyek.value 	        = id_proyekstr;
	document.feditresiko.jenis_resiko.value 	= jenis_resikostr;
	document.feditresiko.deskripsi_resiko.value 		= deskripsi_resikostr;
	
}
</script>

<div class="modal fade" id="edit-risiko" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Form Edit Data Risiko</h4>
			</div>
			<div class="modal-body">
				<form method="POST" name="feditresiko" class="form-horizontal">
					<input type="hidden" name="id_resiko" value="" />

					

					<div class="form-group">
						<label class="col-sm-2">Kode Risiko</label>
						<div class="col-sm-10">
							<input type="time" name="kode_resiko" class="form-control" required="true"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Jenis Resiko</label>
						<div class="col-sm-10">
							<input type="time" name="jenis_resiko" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Deskripsi Resiko</label>
						<div class="col-sm-10">
							<input type="time" name="deskripsi_resiko" class="form-control" />
						</div>
					</div>
					<button type="reset" class="btn btn-warning">Reset</button>
		        	<button type="submit" name="update-resiko" class="btn btn-success">Simpan Data</button>
				</form>
	      	</div>
		</div>
	</div>
</div>