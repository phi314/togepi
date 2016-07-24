<!DOCTYPE html>
<html lang="en">
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	</head>
	<body>
		<!-- start body -->

		<button type="button" class="btn btn-md btn-info" data-toggle="modal" data-target="#jadwal">
			<span class="glyphicon glyphicon-plus"></span> Tambah Data
		</button>

		<?php
			require_once "proses_jadwal.php";
			require_once "proses_updatejadwal.php";
		?>

		<div class="table-responsive" id="table">
			<table class="table table-striped">
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Waktu Berangkat</th>
					<th>Waktu Tiba</th>
					<th>ID Pesawat</th>
					<th>ID Maskapai</th>
					<th>ID Rute</th>

					<th>Aksi</th>
				</tr>
				<?php
					$sql = mysql_query("SELECT * FROM jadwal");

					$no = 1;
					while ($data = mysql_fetch_assoc($sql))
					{
				?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $data['tanggal']; ?></td>
						<td><?php echo $data['waktu_berangkat']; ?></td>
						<td><?php echo $data['waktu_tiba']; ?></td>
						<td><?php echo $data['id_pesawat']; ?></td>
						<td><?php echo $data['id_maskapai']; ?></td>
						<td><?php echo $data['id_rute']; ?></td>
						<td>
							<a href="#edit-jadwal" data-toggle="modal" onclick="javascript:editjadwal(<?php echo $data['id_jadwal'].", '".$data['tanggal']."', '".$data['waktu_berangkat']."', '".$data['waktu_tiba']."', '".$data['id_pesawat']."', '".$data['id_maskapai']."', '".$data['id_rute']."'"; ?>)">Edit</a>
							|
							<a href="deletejadwal.php?id_jadwal=<?php echo $data['id_jadwal']; ?>" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
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