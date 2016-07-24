<script type="text/javascript">
function editmaskapai(id_maskapai, id_rute, harga)
{
	var id_maskapaistr 		= id_maskapai;
	var id_rutestr 			= id_rute;
	var hargastr 			= harga;

	document.feditmaskapai.id_maskapai.value   	= id_maskapaistr;
	document.feditmaskapai.id_rute.value 		= id_rutestr;
	document.feditmaskapai.harga.value 			= hargastr;
}
</script>

<div class="modal fade" id="edit-maskapai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Form Edit Data Maskapai</h4>
			</div>
			<div class="modal-body">
				<form method="POST" name="feditmaskapai" class="form-horizontal">
					<input type="hidden" name="id_maskapai" value="" />
					<div class="form-group">
						<label class="col-sm-2">ID Rute</label>
						<div class="col-sm-10">
							<input type="text" name="id_rute" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Harga</label>
						<div class="col-sm-10">
							<input type="text" name="harga" class="form-control" />
						</div>
					</div>
					
					<button type="reset" class="btn btn-warning">Reset</button>
		        	<button type="submit" name="update-maskapai" class="btn btn-success">Simpan Data</button>
				</form>
	      	</div>
		</div>
	</div>
</div>