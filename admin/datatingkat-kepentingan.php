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
								$select="SELECT * from proyek";
								$Qquery=mysql_query($select);
								while ($r=mysql_fetch_assoc($Qquery)) {
									//echo "<option> $r[id_proyek] </option>";
									if($txtproyek==$r['kode_proyek']){
										echo "<option selected> $r[kode_proyek] </option>";
									}else{
										echo "<option> $r[kode_proyek] </option>";
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
		<table class="table table-striped" align="center">
			<tr align="center">
				<th colspan="4" align="center"><center>Skala Resiko</center>  </th>
			</tr>
			<tr>
				<th>Resiko</th>
				<td>Rendah</td>
				<td>Sedang</td>
				<td>Tinggi</td>
			</tr>
			<tr>
				<th>Skala</th>
				<td>0 - 0.30 </td>
				<td>0.31 - 0.70 </td>
				<td>0.71 - 1.00</td>
			</tr>
		</table>
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
			while ($rs = mysql_fetch_array($query))
			{
		?>
				<table>
					<tr>
						<td><h4>Kode Proyek : </td>
						<td><h4><?php echo $rs['kode_proyek'];?> </td>
					</tr>
				</table>
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
					<th>Porbalitas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*
						&nbsp;&nbsp; Dampak 
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;=
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tingkat Kepentingan</th>

					
				</tr>
				<form action="proses-updatetingkep.php" method="post">

				<?php
					$sql = mysql_query("SELECT * FROM resiko where id_proyek='$rs[id]' ");
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
							 <input type="hidden" class="input-xlarge focused" placeholder="id_resiko" name="id_resiko[]" value='<?php echo $isi['id_resiko'];?>'>				
								<input type="text" class="input-xlarge focused" name="porbalitas[]" id="porbalitas" value="<?php echo $isi['porbalitas'];?>"> *
								<input type="text" class="input-xlarge focused" placeholder="dampak" name="dampak[]" value='<?php echo $isi['dampak'];?>'> =
								<input type="text" class="input-xlarge focused" disabled="" placeholder="tinkat_kepentingan" name="tinkat_kepentingan[]" value='<?php echo $isi['tinkat_kepentingan'];?>'>

							
						</td>

						<!--<td><?php echo $isi['tinkat_kepentingan'];?></td>-->
						
					</tr>
				<?php
					$no++;
					}
				?>
			</table>
			<div class="form-actions">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
			</form>
			<hr>
			<?php
				}
			?>
	</body>
</html>

