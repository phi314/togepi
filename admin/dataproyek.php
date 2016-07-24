<!DOCTYPE html>
<html lang="en">
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	</head>
	<body>
		<!-- start body -->

		<button type="button" class="btn btn-md btn-info" data-toggle="modal" data-target="#proyek">
			<span class="glyphicon glyphicon-plus"></span> Tambah Data
		</button>

		<?php
			require_once "proses_proyek.php";
			require_once "proses_updateproyek.php";
		?>

		<div class="table-responsive" id="table">
			<table class="table table-striped">
				<tr>
					<th>No</th>
					<th>Kode Proyek</th>
					<th>Nama Proyek</th>
					<th>Nama Client</th>
					<th>Biaya</th>
					<th>Tanggal Mulai</th>
					<th>Tanggal Selesai</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
				<?php
				
					$Ssql="select p.*, c.id_client, c.nama_client
							from proyek p
							join client c
							on p.id_client=c.id_client
							order by p.created_at desc";
					$query=mysql_query($Ssql);
					$no = 1;
					while ($data = mysql_fetch_assoc($query))
					{
				?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $data['kode_proyek']; ?></td>
						<td><?php echo $data['nama_proyek']; ?></td>
						<td><?php echo $data['nama_client']; ?></td>
						<td><?php echo $data['biaya']; ?></td>
						<td><?php echo $data['tanggal_mulai']; ?></td>
						<td><?php echo $data['tanggal_selesai']; ?></td>
						<td><?php echo $data['status']; ?></td>
						<td>
							<a href="beranda.php?page=detailproyek.php&id=<?php echo $data['id']; ?>">Detail</a>
							<a href="deleteproyek.php?id_proyek=<?php echo $data['id']; ?>" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
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