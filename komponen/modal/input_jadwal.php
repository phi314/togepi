<div class="modal fade" id="jadwal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Form Input Data Jadwal</h4>
			</div>
			<div class="modal-body">
				<form method="POST" class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2">Nama User</label>
						<div class="col-sm-10">
							<select name="id_user" class="form-control">
							<option selected="" disabled="">Pilih Pegawai</option>
							<?php
								require "../config/koneksi.php";
								$sql = mysql_query("select username,id_user from user");
								while($data = mysql_fetch_assoc($sql)){
							?>							
								<option value="<?php echo $data['id_user'];?>"> <?php echo $data['username']; ?></option>
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
		        	<button type="submit" name="submit" class="btn btn-success">Simpan Data</button>
				</form>
	      	</div>
		</div>
	</div>
</div>