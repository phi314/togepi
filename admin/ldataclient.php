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
					<th>Project Owner</th>
					<th>E-mail</th>
					<th>Nama Instansi</th>
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