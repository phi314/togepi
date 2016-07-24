<script type="text/javascript">
function editgsc(id_gsc, nama_gsc, nilai_gsc)
{
	var id_gscstr 		= id_gsc;
	var nama_gscstr		= nama_gsc;
	var nilai_gscstr 	= nilai_gsc;
	

	document.feditgsc.id_gsc.value 			= id_gscstr;
	document.feditgsc.nama_gsc.value 		= nama_gscstr;
	document.feditgsc.nilai_gsc.value 		= nilai_gscstr;
	
}
</script>

<div class="modal fade" id="edit-gsc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Form Edit Data GSC</h4>
			</div>
			<div class="modal-body">
				<form method="POST" name="feditgsc" class="form-horizontal">
					<input type="hidden" name="id_gsc" value="" />
					<div class="form-group">
						<label class="col-sm-2">Nama GSC</label>
						<div class="col-sm-10">
							<input type="text" name="nama_gsc" class="form-control" required="true" readonly="" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Nilai GSC</label>
						<div class="col-sm-10">
							<input type="time" name="nilai_gsc" class="form-control" required="true"/>
						</div>
					</div>
					<button type="reset" class="btn btn-warning">Reset</button>
		        	<button type="submit" name="update-gsc" class="btn btn-success">Simpan Data</button>
				</form>
	      	</div>
		</div>
	</div>
</div>