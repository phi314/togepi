<div class="modal fade" id="maskapai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Form Input Data Maskapai</h4>
			</div>
			<div class="modal-body">
				<form method="POST" class="form-horizontal">
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
					<div class="form-group">
						<label class="col-sm-2">Harga</label>
						<div class="col-sm-10">
							<input type="text" name="harga" class="form-control" />
						</div>
					</div>
					
					<button type="reset" class="btn btn-warning">Reset</button>
		        	<button type="submit" name="submit" class="btn btn-success">Simpan Data</button>
				</form>
	      	</div>
		</div>
	</div>
</div>