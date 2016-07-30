<script type="text/javascript">
function edituser(nama, id_user, username,password, email, status)
{
	var id_userstr 		= id_user;
	var nama		= nama;
	var usernamestr		= username;
	var passwordstr		= password;
	var emailstr 		= email;
	var statusstr 		= status;

	document.fedituser.id_user.value 	= id_userstr;
	document.fedituser.nama.value 	= nama;
	document.fedituser.username.value 	= usernamestr;
	document.fedituser.password.value 	= passwordstr;
	document.fedituser.email.value 		= emailstr;
	document.fedituser.status.value 	= statusstr;
}
</script>
<div class="modal fade" id="edit-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Form Edit Data User</h4>
			</div>
			<div class="modal-body">

				<form method="POST" name="fedituser" class="form-horizontal">
					<input type="hidden" name="id_user" value="" />
                    <div class="form-group">
                        <label class="col-sm-2">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama" class="form-control" required="true"/>
                        </div>
                    </div>
					<div class="form-group">
						<label class="col-sm-2">Username</label>
						<div class="col-sm-10">
							<input type="text" name="username" class="form-control" required="true"/>
						</div>
					</div>
<!--					<div class="form-group">-->
<!--						<label class="col-sm-2">Password</label>-->
<!--						<div class="col-sm-10">-->
<!--							<input type="text" name="password" type="password" class="form-control" required="true"/>-->
<!--						</div>-->
<!--					</div>-->
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
								<!--<option selected="" disabled="">Pilih Status Username</option>-->
								<option>MANAGER</option>
								<option>CEO</option>
								<option>DEVELOPER</option>
							</select>
						</div>
					</div>
					<button type="reset" class="btn btn-warning">Reset</button>
		        	<button type="submit" name="update-user" class="btn btn-success">Simpan Data</button>
				</form>
	      	</div>
		</div>
	</div>
</div>