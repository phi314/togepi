
        <?php if(isset($_GET['message'])) : ?>
            <div class="alert alert-info">
                <?php echo $_GET['message']; ?>
            </div>
        <?php endif; ?>
		<button type="button" class="btn btn-md btn-info" data-toggle="modal" data-target="#myModal">
			<span class="glyphicon glyphicon-plus"></span> Tambah Data
		</button>

		<?php
			require_once "proses_user.php";
			require_once "proses_updateuser.php";
		?>
		<div class="table-responsive" id="table-user">
			<table class="table datatable-simple">
                <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Username</th>
<!--                    <th>Password</th>-->
                    <th>E-mail</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$sql = mysql_query("SELECT * FROM user");

					$no = 1;
					while ($data = mysql_fetch_assoc($sql))
					{
				?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $data['nip']; ?></td>
						<td><?php echo $data['nama']; ?></td>
						<td><?php echo $data['username']; ?></td>
<!--						<td>--><?php //echo $data['password']; ?><!--</td>-->
						<td><?php echo $data['email']; ?></td>
						<td><?php echo $data['status']; ?></td>
						<td>
							<a href="#edit-user" data-toggle="modal" onclick="javascript:edituser(<?php echo "'".$data['nip']."', '".$data['nama']."',".$data['id_user'].", '".$data['username']."','".$data['password']."', '".$data['email']."', '".$data['status']."'"; ?>)">Edit</a>
							|
							<a href="deleteuser.php?id_user=<?php echo $data['id_user']; ?>" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
						</td>
					</tr>
				<?php
					$no++;
					}
				?>
                </tbody>
			</table>
		</div>

