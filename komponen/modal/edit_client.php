<script type="text/javascript">
function editclient(id_client, nama_client, email, instansi)
{
	var id_clientstr 		= id_client;
	var nama_clientstr		= nama_client;
	var emailstr 			= email;
	var instansistr 		= instansi;

	document.feditclient.id_client.value 	= id_clientstr;
	document.feditclient.nama_client.value 	= nama_clientstr;
	document.feditclient.email.value 		= emailstr;
	document.feditclient.instansi.value 	= instansistr;
}
</script>

<div class="modal fade" id="edit-client" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Form Edit Project Owner</h4>
			</div>
			<div class="modal-body">
				<form method="POST" name="feditclient" class="form-horizontal">
					<input type="hidden" name="id_client" value="" />
					<div class="form-group">
						<label class="col-sm-2">Project Owner</label>
						<div class="col-sm-10">
							<input type="text" name="nama_client" class="form-control"required="true" />
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
						</div>
					</div>
					<button type="reset" class="btn btn-warning">Reset</button>
		        	<button type="submit" name="update-client" class="btn btn-success">Simpan Data</button>
				</form>
	      	</div>
		</div>
	</div>
</div>