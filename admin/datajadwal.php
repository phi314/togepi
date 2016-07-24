<?php
	if(isset($_POST['Cari'])){
		$txtproyek = $_POST["txtproyek"];
	}else{
		$txtproyek="(Semua)";
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	</head>
	<body>
	<form name="frmcari" method="post" action="">
			<table>
				<tr>
					<td><h4> Cari Id Proyek  </h4></td>
					<td><h4> &nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp; </h4></td>
					<td>
						<h4>
						<select class="form-control" name="txtproyek">
							<option>(Semua)</option>
							<?php
								$select="SELECT id_proyek from proyek";
								$Qquery=mysql_query($select);
								while ($r=mysql_fetch_assoc($Qquery)) {
									//echo "<option> $r[id_proyek] </option>";
									if($txtproyek==$r['id_proyek']){
										echo "<option selected> $r[id_proyek] </option>";
									}else{
										echo "<option> $r[id_proyek] </option>";
									}
								}
							?>
						</select>
					</td>
					<td> &nbsp;&nbsp;&nbsp;</td>
					<td><h4>
						<input type="submit" name="Cari" value="Cari" />
					</td>
				</tr>
			</table>
		</form>
		<!-- start body -->
		<?php
			//$Ssql="select p.id_proyek, p.id_client,p.nama_proyek,p.biaya,p.tanggal_mulai,p.tanggal_selesai,p.status,
						  //c.id_client,c.nama_client
					//from proyek p
					//join client c
					//on p.id_client=c.id_client";
			$Ssql="SELECT * from proyek ";					
			if($txtproyek!='(Semua)'){
				$Ssql = $Ssql."where id_proyek like '%$txtproyek%' ";
			}
				$Ssql =$Ssql."order by tgl ";

			$query=mysql_query($Ssql);
			while ($r = mysql_fetch_array($query))
			{
		?>
			<table width="100%">
				<tr>
					<td width="20%"><h4 style="background-color:cyan"> Kode Proyek  </h4></td>
					<td><h4 style="background-color:cyan"> : <?php echo $r['id_proyek']; ?></h4></td>
				</tr>
			</table>			
			<button type="button" class="btn btn-md btn-info" data-toggle="modal" data-target="#<?php echo $r['id_proyek'];?>">
				<span class="glyphicon glyphicon-plus"></span> Tambah Data
			</button>
			<div class="modal fade" id="<?php echo $r['id_proyek'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Form Input Data Jadwal</h4>
			</div>
			<div class="modal-body">
				<form method="POST" class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2">Kode Proyek</label>
						<div class="col-sm-10">
							<input type="time" value="<?php echo $r['id_proyek'];?>" name="id_proyek"  class="form-control" readonly/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Nama User</label>
						<div class="col-sm-10">
							<select name="id_user" class="form-control">
							<option selected="" disabled="">Pilih Pegawai</option>
							<?php
								require "../config/koneksi.php";
								$sql = mysql_query("select username,id_user from user");
								while($rs = mysql_fetch_assoc($sql)){
							?>							
								<option value="<?php echo $rs['id_user'];?>"> <?php echo $rs['username']; ?></option>
							<?php
								}
							?>
						</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Nama Pekerjaan</label>
						<div class="col-sm-10">
							<input type="text" name="nama_pekerjaan" class="form-control" required="true"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Tanggal Mulai</label>
						<div class="col-sm-10">
							<input type="date" name="tanggal_mulai" class="form-control" required="true"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Tanggal Selesai</label>
						<div class="col-sm-10">
							<input type="date" name="tanggal_selesai" class="form-control" required="true"/>
						</div>
					</div>
					<button type="reset" class="btn btn-warning">Reset</button>
		        	<button type="submit" name="submit" class="btn btn-success">Simpan Data</button>
				</form>
	      	</div>
		</div>
	</div>
</div>
			
		<?php
			require_once "proses_jadwal.php";
			require_once "proses_updatejadwal.php";
		?>

			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama User</th>
						<th>Nama Pekerjaan</th>
						<th>Tanggal Mulai</th>
						<th>Tanggal Selesai</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<?php
					
				//$select="SELECT * FROM jadwal where id_proyek='$data[id_proyek]' ";
					$select="SELECT j.id_jadwal,j.id_user,j.nama_pekerjaan,j.tanggal_mulai,j.tanggal_selesai,j.id_proyek,
					             u.id_user,u.username
					      from jadwal j
					      join user u
					      on j.id_user=u.id_user
					      where j.id_proyek='$r[id_proyek]'";
					$sql = mysql_query($select);
					$no = 1;
					while ($data = mysql_fetch_array($sql))
					{
				?>

				<tbody>
					<tr>
						<td><?php echo $no++;?></td>
						<td><?php echo $data['username']; ?></td>
						<td><?php echo $data['nama_pekerjaan']; ?></td>
						<td><?php echo $data['tanggal_mulai']; ?></td>
						<td><?php echo $data['tanggal_selesai']; ?></td>
						<td>
							<a href="#edit-jadwal" data-toggle="modal" onclick="javascript:editjadwal(<?php echo $data['id_jadwal'].",'".$data['id_user']."','".$data['nama_pekerjaan']."','".$data['tanggal_mulai']."','".$data['tanggal_selesai']."'"; ?>)">Edit</a>
							|
							<a href="deletejadwal.php?id_jadwal=<?php echo $data['id_jadwal']; ?>" onclick="return confirm('Apakah Anda yakin menghapus Pegawai <?php echo $data['username'];?> dari <?php echo $data['id_proyek'];?>??')">Hapus</a>
						</td>
					</tr>					
				</tbody>
				<?php
					}
				?>
			</table>
			<hr>
		<?php
				}
			?>
		<!-- end body -->
	</body>
</html>