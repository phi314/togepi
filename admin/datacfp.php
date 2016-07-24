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
				$Ssql =$Ssql."order by kode_proyek ";

			$query=mysql_query($Ssql);
			while ($data = mysql_fetch_array($query))
			{
		?>
			<table width="100%">
				<tr>
					<td width="20%"><h4 style="background-color:cyan"> Kode Proyek  </h4></td>
					<td><h4 style="background-color:cyan"> : <?php echo $data['kode_proyek']; ?></h4></td>
				</tr>
			</table>			
			<button type="button" class="btn btn-md btn-info" data-toggle="modal" data-target="#<?php echo $data['id_proyek'];?>">
				<span class="glyphicon glyphicon-plus"></span> Tambah Data
			</button>

			<div class="modal fade" id="<?php echo $data['kode_proyek'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        		<h4 class="modal-title" id="myModalLabel">Form Input Data CFP</h4>
			</div>
			<div class="modal-body">
				<form method="POST" class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2">Kode Proyek</label>
						<div class="col-sm-10">
							<input type="time" value="<?php echo $data['id_proyek'];?>" name="id_proyek"  class="form-control" readonly/>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2">Komponen Sistem</label>
						<div class="col-sm-10">
							<!--<input type="text" name="komponen_sistem" class="form-control" required="true"/>-->
							<select name="komponen_sistem" class="form-control">
								<option selected="" disabled="">Pilih Komponen</option>
								<option>INPUT</option>
								<option>OUTPUT</option>
								<option>FILE LOGIC</option>
								<option>INTERFACE EXTERNAL</option>
								<option>INQUERY</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Nama_kegiatan</label>
						<div class="col-sm-10">
							<input type="time" name="nama_kegiatan" class="form-control" required="true"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Sederhana</label>
						<div class="col-sm-10">
							<input type="time" name="sederhana" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Menengah</label>
						<div class="col-sm-10">
							<input type="time" name="menengah" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2">Komplek</label>
						<div class="col-sm-10">
							<input type="time" name="komplek" class="form-control" />
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
				require_once "proses_cfp.php";
				require_once "proses_updatecfp.php";
			?>
			<table class="table table-striped">
				<tr>
					<th>No</th>
					<th>Komponen Sistem</th>
					<th>Nama Kegiatan</th>
					<th>Sederhana</th>
					<th>Menengah</th>
					<th>Komplek</th>
					<th>Total CFP</th>
					<th>Action</th>
				</tr>
				<?php
					$sql = mysql_query("SELECT * FROM kompleksitas where id_proyek='$data[id_proyek]' ");
					$no = 1;
					while ($isi = mysql_fetch_assoc($sql))
					{
				?>
					<tr>
						<td><?php echo $no;?></td>
						<td><?php echo $isi['komponen_sistem']; ?></td>
						<td><?php echo $isi['nama_kegiatan']; ?></td>

					<?php
							if($isi['komponen_sistem']=='INPUT'){
						?>
						<td><?php echo $isi['sederhana']." X 3* "; ?></td>
						<td><?php echo $isi['menengah']." X 4*"; ?></td>
						<td><?php echo $isi['komplek']." X 6*"; ?></td>
						<?php
							}elseif($isi['komponen_sistem']=='OUTPUT'){
						?>
						<td><?php echo $isi['sederhana']." X 4*"; ?></td>
						<td><?php echo $isi['menengah']." X 5*"; ?></td>
						<td><?php echo $isi['komplek']." X 7*"; ?></td>
						<?php
							}elseif($isi['komponen_sistem']=='FILE LOGIC'){
						?>
						<td><?php echo $isi['sederhana']." X 7*"; ?></td>
						<td><?php echo $isi['menengah']." X 10*"; ?></td>
						<td><?php echo $isi['komplek']." X 15*"; ?></td>
						<?php
							}elseif($isi['komponen_sistem']=='INTERFACE EXTERNAL'){
						?>
						<td><?php echo $isi['sederhana']." X 5*"; ?></td>
						<td><?php echo $isi['menengah']." X 7*"; ?></td>
						<td><?php echo $isi['komplek']." X 10*"; ?></td>
						<?php
							}else{
						?>
						<td><?php echo $isi['sederhana']." X 3*"; ?></td>
						<td><?php echo $isi['menengah']." X 4*"; ?></td>
						<td><?php echo $isi['komplek']." X 6*"; ?></td>

						<?php
							}
						?>

						<td><?php echo $isi['total'];?></td>
						<td>
							<!--<a href="#edit-cfp" data-toggle="modal" onclick="javascript:editcfp(<?php echo $isi['id_kompleksitas'].",'".$isi['komponen_sistem']."','".$isi['nama_kegiatan']."','".$isi['sederhana']."','".$isi['menengah']."','".$isi['komplek']."','".$isi['id_proyek']."'"; ?>)">Edit</a>
							
								
							</a>-->							

							<a href="#">
          						<span data-toggle="modal" data-target="#<?php echo $isi['id_kompleksitas'];?>"> Edit </span>
       						</a>
       						|
							
							<div class="modal fade" id="<?php echo $isi['id_kompleksitas'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							        		<h4 class="modal-title" id="myModalLabel">Form Edit Data CFP</h4>
										</div>
										<div class="modal-body">
											<form method="POST" name="feditcfp" class="form-horizontal">
												<input type="hidden" name="id_kompleksitas" value="<?php echo $isi['id_kompleksitas'];?>" />

												<div class="form-group">
													<label class="col-sm-2">Kode Proyek</label>
													<div class="col-sm-10">
														<input type="text" value="<?php echo $isi['id_proyek'];?>" name="id_proyek" class="form-control" readonly="" />
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2">Komponen Sistem</label>
													<div class="col-sm-10">
														<!--<input type="text" name="komponen_sistem" class="form-control" required="true"/>-->
														<select name="komponen_sistem" class="form-control">
															<option selected="" disabled=""><?php echo $isi['komponen_sistem'];?></option>
															<option>INPUT</option>
															<option>OUTPUT</option>
															<option>FILE LOGIC</option>
															<option>INTERFACE EXTERNAL</option>
															<option>INQUERY</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2">Nama Kegiatan</label>
													<div class="col-sm-10">
														<input type="time" value="<?php echo $isi['nama_kegiatan'];?>" name="nama_kegiatan" class="form-control" required="true"/>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2">Sederhana</label>
													<div class="col-sm-10">
														<input type="time" value="<?php echo $isi['sederhana'];?>" name="sederhana" class="form-control" />
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2">Menengah</label>
													<div class="col-sm-10">
														<input type="time" value="<?php echo $isi['menengah'];?>" name="menengah" class="form-control" />
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2">Komplek</label>
													<div class="col-sm-10">
														<input type="time" value="<?php echo $isi['komplek'];?>" name="komplek" class="form-control" />
													</div>
												</div>
												<button type="reset" class="btn btn-warning">Reset</button>
									        	<button type="submit" name="update-cfp" class="btn btn-success">Simpan Data</button>
											</form>
								      	</div>
									</div>
								</div>
							</div>

							</a>

							<a href="deletecfp.php?id_kompleksitas=<?php echo $isi['id_kompleksitas']; ?>" onclick="return confirm('Apakah Anda yakin menghapus komponen sistem  <?php echo $isi['komponen_sistem'];?> dari <?php echo $isi['id_proyek'];?>?')">Hapus</a>
						</td>
					</tr>
				<?php
					$no++;
					}
				?>
				<tfoot>
					<tr>
						<?php
							$sql1="SELECT sum(total) from kompleksitas where id_proyek='$data[id_proyek]'";
							$query1=mysql_query($sql1);
							$rs=mysql_fetch_array($query1)
						?>	
						<th colspan="6">Total</th>
						<th><?php echo $rs['sum(total)'];?></th>
						
					</tr>
				</tfoot>
			</table>
			<hr>
		<?php
			}
		?>
		

		<!-- end body -->
	</body>
</html>

