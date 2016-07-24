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
		<!-- start body -->
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
		<hr>
			<?php
			//$Ssql="select p.id_proyek, p.id_client,p.nama_proyek,p.biaya,p.tanggal_mulai,p.tanggal_selesai,p.status,
						  //c.id_client,c.nama_client
					//from proyek p
					//join client c
					//on p.id_client=c.id_client";
			$Ssql="SELECT * from proyek ";					
			if($txtproyek!='(Semua)'){
				$Ssql = $Ssql."where kode_proyek like '%$txtproyek%' ";
			}
				$Ssql =$Ssql."order by id ";

			$query=mysql_query($Ssql);
			while ($rs = mysql_fetch_array($query))
			{
		?>
				<table>
					<tr>
						<td><h4>Kode Proyek : </td>
						<td><h4><?php echo $rs['kode_proyek'];?> </td>
					</tr>
				</table>
				<button type="button" class="btn btn-md btn-info" data-toggle="modal" data-target="#<?php echo $rs['id'];?>">
					<span class="glyphicon glyphicon-plus"></span> Tambah Data
				</button>
				<div class="modal fade" id="<?php echo $rs['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				        		<h4 class="modal-title" id="myModalLabel">Form Input Data Risiko</h4>
							</div>
							<div class="modal-body">
								<form method="POST" class="form-horizontal">
									<div class="form-group">
										<label class="col-sm-2">Kode Proyek</label>
										<div class="col-sm-10">
											<input type="time" value="<?php echo $rs['kode_proyek'];?>" name="id_proyek"  class="form-control" readonly/>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2">Kode Risiko</label>
										<div class="col-sm-10">
											<input type="time" name="kode_resiko" class="form-control" required="true" placeholder="exp : R1" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2">Jenis Risiko</label>
										<div class="col-sm-10">
											<input type="time" name="jenis_resiko" class="form-control" placeholder="Input Jenis Risiko" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2">Deskripsi</label>
										<div class="col-sm-10">
											<input type="time" name="deskripsi_resiko" class="form-control" placeholder="Input Deskripsi Risiko" />
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
				require_once "proses_resiko.php";
				require_once "proses_updateresiko.php";
			?>
			<table class="table table-striped">
				<tr>
					<th>No</th>
					<th>Kode Risiko</th>
					<th>Jenis Risiko</th>
					<th>Deskripsi Risiko</th>
					<th> Update </th>
				</tr>
				<?php
					$sql = mysql_query("SELECT * FROM resiko where id_proyek='$rs[id]' order by kode_resiko");
					$no = 1;
					while ($isi = mysql_fetch_assoc($sql))
					{
				?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $isi['kode_resiko']; ?></td>
						<td><?php echo $isi['jenis_resiko']; ?></td>
						<td><?php echo $isi['deskripsi_resiko']; ?></td>

						<td>
							<!--<a href="#edit-risiko" data-toggle="modal" onclick="javascript:editrisiko(<?php echo $isi['kode_resiko'].",'".$isi['jenis_resiko']."','".$isi['deskripsi_resiko']."','".$isi['id_proyek']."','".$isi['id_resiko']."'"; ?>)">Edit</a>						
							</a>
							|-->

							<a href="#">
          						<span data-toggle="modal" data-target="#<?php echo $isi['id_resiko'];?>"> Edit </span>
       						</a>

       						| 

							<div class="modal fade" id="<?php echo $isi['id_resiko'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							        		<h4 class="modal-title" id="myModalLabel">Form Edit Data Risiko</h4>
										</div>
										<div class="modal-body">
											<form method="POST" name="feditresiko" class="form-horizontal">
												<input type="hidden" name="id_resiko" value="<?php echo $isi['kode_resiko'];?>" />
												<div class="form-group">
													<label class="col-sm-2">Kode Proyek</label>
													<div class="col-sm-10">
														<input type="time" value="<?php echo $isi['id_proyek'];?>" name="id_proyek" class="form-control" readonly="" required="true"/>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2">Kode Risiko</label>
													<div class="col-sm-10">
														<input type="time" value="<?php echo $isi['kode_resiko'];?>" name="kode_resiko" class="form-control" required="true"/>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2">Jenis Resiko</label>
													<div class="col-sm-10">
														<input type="time" value="<?php echo $isi['jenis_resiko'];?>" name="jenis_resiko" class="form-control" />
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2">Deskripsi Resiko</label>
													<div class="col-sm-10">
														<input type="time" value="<?php echo $isi['deskripsi_resiko'];?>" name="deskripsi_resiko" class="form-control" />
													</div>
												</div>
												<button type="reset" class="btn btn-warning">Reset</button>
									        	<button type="submit" name="update-resiko" class="btn btn-success">Simpan Data</button>
											</form>
								      	</div>
									</div>
								</div>
							</div>

							<a href="deleterisiko.php?id_resiko=<?php echo $isi['id_resiko']; ?>" onclick="return confirm('Apakah Anda yakin menghapus kode risiko  <?php echo $isi['kode_resiko'];?> dari <?php echo $isi['id_proyek'];?>?')">Hapus</a>
						</td>
					</tr>
				<?php
					$no++;
					}
				?>
			</table>
			<hr>
			<?php
				}
			?>
	</body>
</html>

