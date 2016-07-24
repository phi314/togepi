<!DOCTYPE html>
<html lang="en">
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	</head>
	<body>
		<!-- start body -->



		<?php
			require_once "proses_gsc.php";
			require_once "proses_updategsc.php";
		?>

		<div class="table-responsive" id="table">
			<table class="table table-striped">
				<tr>
					<th>No</th>
					<th>Nama GSC</th>
					<th>Aksi</th>
				</tr>
				<?php
					$sql = mysql_query("SELECT * FROM gsc");

					$no = 1;
					while ($data = mysql_fetch_assoc($sql))
					{
				?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $data['nama_gsc']; ?></td>
						<td>
							<a href="#edit-gsc" data-toggle="modal" onclick="javascript:editgsc(<?php echo $data['id'].", '".$data['nama_gsc']."', '".$data['nilai_gsc']."'"; ?>)">Edit</a>
							|
							<a href="deletegsc.php?id_gsc=<?php echo $data['id']; ?>" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
						</td>
					</tr>
				<?php
					$no++;
					}
				?>
<!--				<tfoot>-->
<!--					<tr>-->
<!--						--><?php
//							$sql="SELECT sum(nilai_gsc) from gsc";
//							$Query=mysql_query($sql);
//							$isi=mysql_fetch_assoc($Query);
//						?><!--	-->
<!--						<th colspan="2">Total RCAF</th>-->
<!--						<th>--><?php //echo $isi['sum(nilai_gsc)'];?><!--</th>-->
<!--						<th></th>-->
<!--					</tr>-->
<!--				</tfoot>-->
			</table>
		</div>
		

		<!-- end body -->
	</body>
</html>