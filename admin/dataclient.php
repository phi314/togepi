<!DOCTYPE html>
<html lang="en">
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	</head>
	<body>
		<!-- start body -->

		<button type="button" class="btn btn-md btn-info" data-toggle="modal" data-target="#client">
			<span class="glyphicon glyphicon-plus"></span> Tambah Data
		</button>

		<?php
			require_once "proses_client.php";
			require_once "proses_updateclient.php";
		?>

		<div class="table-responsive" id="table">
			<table class="table table-striped">
				<tr>
					<th>No</th>
					<th>Project Owner</th>
					<th>E-mail</th>
					<th>Nama Instansi</th>
					<th>Aksi</th>
				</tr>
				<?php
					$sql = mysql_query("SELECT * FROM client");

					$no = 1;
					while ($data = mysql_fetch_assoc($sql))
					{
				?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $data['nama_client']; ?></td>
						<td><?php echo $data['email']; ?></td>
						<td><?php echo $data['instansi']; ?></td>
						<td>
							<a href="#edit-client" data-toggle="modal" onclick="javascript:editclient(<?php echo $data['id_client'].",'".$data['nama_client']."','".$data['email']."','".$data['instansi']."'"; ?>)">Edit</a>
							|
							<a href="deleteclient.php?id_client=<?php echo $data['id_client']; ?>" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
						</td>
					</tr>
				<?php
					$no++;
					}
				?>
			</table>
		</div>

		<!-- end body -->
	</body>
</html>