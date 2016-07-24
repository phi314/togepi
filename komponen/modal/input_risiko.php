<?php
			
			$Sql="select * from resiko";
			$Query=mysql_query($Sql);
			while($rs = mysql_fetch_assoc($Query)){
			
		?>


<div class="modal fade" id="<?php echo $rs['id_proyek'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Form Input Data Risiko</h4>
			</div>
			<div class="modal-body">
				<form method="POST" class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2">Kode Proyek</label>
						<div class="col-sm-10">
							<input type="time" value="<?php echo $rs['id_proyek'];?>" name="id_proyek"  class="form-control" readonly/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Kode Risiko</label>
						<div class="col-sm-10">
							<input type="time" name="kode_resiko" class="form-control" required="true" placeholder="exp : R1" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Jenis Risiko</label>
						<div class="col-sm-10">
							<input type="time" name="jenis_resiko" class="form-control" placeholder="Input Jenis Risiko" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Deskripsi</label>
						<div class="col-sm-10">
							<input type="time" name="deskripsi_resiko" class="form-control" placeholder="Input Deskripsi Risiko" />
						</div>
					</div>
					
					<button type="reset" class="btn btn-warning">Reset</button>
		        	<button type="submit" name="submit" class="btn btn-success">Simpan Data</button>
				</form>
	      	</div>
		</div>
	</div>
</div>
<?php
}
?>