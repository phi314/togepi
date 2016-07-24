<!DOCTYPE html>
<html lang="en">
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	</head>
	<body>
		<!-- start body -->

		<button type="button" class="btn btn-md btn-info" data-toggle="modal" data-target="#maskapai">
			<span class="glyphicon glyphicon-plus"></span> Tambah Data
		</button>

		<?php
			require_once "proses_maskapai.php";
			require_once "proses_updatemaskapai.php";
		?>

		<div class="table-responsive" id="table">
			<table class="table table-striped">
				<tr>
					<th>No</th>
					<th>ID Rute</th>
					<th>Harga</th>
					<th>Aksi</th>
				</tr>
				<?php
					$sql = mysql_query("SELECT * FROM maskapai");

					$no = 1;
					while ($data = mysql_fetch_assoc($sql))
					{
				?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $data['id_rute']; ?></td>
						<td><?php echo $data['harga']; ?></td>
						<td>
							<a href="#edit-maskapai" data-toggle="modal" onclick="javascript:editmaskapai(<?php echo $data['id_maskapai'].", '".$data['id_rute']."', '".$data['harga']."'"; ?>)">Edit</a>
							|
							<a href="deletemaskapai.php?id_maskapai=<?php echo $data['id_maskapai']; ?>" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
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