<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Form Input Data User</h4>
			</div>
			<div class="modal-body">
				<form action="proses_user.php" method="POST" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2">NIP</label>
                        <div class="col-sm-10">
                            <input type="text" name="nip" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama" class="form-control" />
                        </div>
                    </div>
					<div class="form-group">
						<label class="col-sm-2">Username</label>
						<div class="col-sm-10">
							<input type="text" name="username" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Password</label>
						<div class="col-sm-10">
							<input type="password" name="password"  class="form-control" required="true"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">E-mail</label>
						<div class="col-sm-10">
							<input type="email" name="email" class="form-control" required="true"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Status</label>
						<div class="col-sm-10">
							<!--<input type="text" name="status" class="form-control" required="true"/>-->
							<select name="status" class="form-control" required="true">
								<option selected="" disabled="">Pilih Status Username</option>
								<option>manager</option>
								<option>ceo</option>
								<option>developer</option>
							</select>
						</div>
					</div>
					<button type="reset" class="btn btn-warning">Reset</button>
		        	<button type="submit" name="submit" class="btn btn-success">Simpan Data</button>
				</form>
	      	</div>
		</div>
	</div>
</div>