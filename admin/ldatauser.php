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
					<th>Username</th>
					<th>Password</th>
					<th>E-mail</th>
					<th>Status</th>
				</tr>
				<?php
					$sql = mysql_query("SELECT * FROM user");

					$no = 1;
					while ($data = mysql_fetch_assoc($sql))
					{
				?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $data['username']; ?></td>
						<td><?php echo $data['password']; ?></td>
						<td><?php echo $data['email']; ?></td>
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