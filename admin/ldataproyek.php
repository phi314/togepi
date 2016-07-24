<!DOCTYPE html>
<html lang="en">
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	</head>
	<body>
		<!-- start body -->

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
					
				</tr>
				<?php
					//$sql = mysql_query("SELECT * FROM proyek");
					$Ssql="select p.id_proyek, p.id_client,p.nama_proyek,p.biaya,p.tanggal_mulai,p.tanggal_selesai,p.status,
							c.id_client,c.nama_client
							from proyek p
							join client c
							on p.id_client=c.id_client
							order by p.id_proyek";
					$query=mysql_query($Ssql);
					$no = 1;
					while ($data = mysql_fetch_assoc($query))
					{
				?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $data['id_proyek']; ?></td>
						<td><?php echo $data['nama_proyek']; ?></td>
						<td><?php echo $data['nama_client']; ?></td>
						<td><?php echo $data['biaya']; ?></td>
						<td><?php echo $data['tanggal_mulai']; ?></td>
						<td><?php echo $data['tanggal_selesai']; ?></td>
						<td><?php echo $data['status']; ?></td>
						
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