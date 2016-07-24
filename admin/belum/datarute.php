<!DOCTYPE html>
<html lang="en">
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	</head>
	<body>
		<!-- start body -->

		<button type="button" class="btn btn-md btn-info" data-toggle="modal" data-target="#rute">
			<span class="glyphicon glyphicon-plus"></span> Tambah Data
		</button>

		<?php
			require_once "proses_rute.php";
			require_once "proses_updaterute.php";
		?>

		<div class="table-responsive" id="table">
			<table class="table table-striped">
				<tr>
					<th>No</th>
					<th>Kota Asal</th>
					<th>Kota Tujuan</th>
					<th>Aksi</th>
				</tr>
				<?php
					$sql = mysql_query("SELECT * FROM rute");

					$no = 1;
					while ($data = mysql_fetch_assoc($sql))
					{
				?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $data['kota_asal']; ?></td>
						<td><?php echo $data['kota_tujuan']; ?></td>
						<td>
							<a href="#edit-rute" data-toggle="modal" onclick="javascript:editrute(<?php echo $data['id_rute'].", '".$data['kota_asal']."', '".$data['kota_tujuan']."'"; ?>)">Edit</a>
							|
							<a href="deleterute.php?id_rute=<?php echo $data['id_rute']; ?>" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
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