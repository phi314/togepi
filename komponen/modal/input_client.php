<div class="modal fade" id="client" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Form Input Data Client</h4>
			</div>
			<div class="modal-body">
				<form method="POST" class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2">Project Owner</label>
						<div class="col-sm-10">
							<input type="text" name="nama_client" class="form-control" required="true"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">E-mail</label>
						<div class="col-sm-10">
							<input type="email" name="email" class="form-control" required="true"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Nama Instansi</label>
						<div class="col-sm-10">
							<input type="text" name="instansi" class="form-control" required="true"/>
							<input type="hidden" name="id_client" class="form-control"/>
						</div>
					</div>
					<button type="reset" class="btn btn-warning">Reset</button>
		        	<button type="submit" name="submit" class="btn btn-success">Simpan Data</button>
				</form>
	      	</div>
		</div>
	</div>
</div>