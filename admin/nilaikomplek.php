<!DOCTYPE html>
<html lang="en">
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	</head>
	<body>
	<form method="post" action="">
	<div class="col-sm-4">
		<select class="form-control" name="qcari">
			<option selected="" disabled="">-Pilih Proyek-</option>
			<?php
				$sql="select distinct(id_proyek) from proyek";
				$query=mysql_query($sql);
				while ($rs=mysql_fetch_assoc($query)) {
			?>
				<option value="<?php echo $rs['id_proyek'];?>"><?php echo $rs['id_proyek'];?> </option>
			<?php		
				}
			?>
		</select>		
	</div>
		<input type='submit' value='cari'>
	</form>
	<hr>
	 <table class="table table-striped table-bordered table-hover">
    <tr>
        <td class="center" rowspan="3" valign="middle" align="center"><b>Komponen Sistem</b></td>
        <td class="center" colspan="9" align="center"><b>Level Kompleksitas</b></td>
        <td class="center" rowspan="2" valign="middle" align="center"><b>Nilai CFP</b></td>
    </tr>
    <tr>
        
        <td class="center"  colspan="3" align="center"><b>Sederhana</b></td>
        <td class="center"  colspan="3" align="center"><b>Menengah</b></td>
        <td class="center"  colspan="3" align="center"><b>Komplek</b></td>       
    </tr>
    <tr>       
        <td>A</td>
        <td>B</td>
        <td>C=AxB</td>
        <td>D</td>
        <td>E</td>
        <td>F=DxE</td>
        <td>G</td>
        <td>H</td>
        <td>I=GxH</td>
        <td>C+F+I=CFP</td>
    </tr>
    <?php
	    	if(isset($_POST['qcari'])){
			$qcari=$_POST['qcari'];
			if($qcari !="-Pilih Proyek-"){
			$query1="SELECT * FROM  kompleksitas where id_proyek like '%$qcari%' group by komponen_sistem";
			}else{
				echo "string";
			}
			}
			@$result=mysql_query($query1);
			$no=1; //penomoran 
			while(@$data=mysql_fetch_assoc($result)){
		?>
		<tr>
			<!-- komponen Sistem -->
	        <td><?php echo $data['komponen_sistem'];?></td>

	        <!--Jumlah sederhana -->
	        <?php
	        	$Ssql="SELECT sum(sederhana) as jsederhana from kompleksitas where id_proyek='$data[id_proyek]' and komponen_sistem='$data[komponen_sistem]' ";
	        	$Query=mysql_query($Ssql);
	        	$js=mysql_fetch_assoc($Query);
	        ?>
	        <td><?php echo $js['jsederhana'];?></td>

	        <!-- Ketentuan Perusahaan (Sederhana) -->
	        <?php
				if($data['komponen_sistem']=='INPUT'){
			?>
				<td>3</td>
			<?php
				}elseif($data['komponen_sistem']=='OUTPUT'){
			?>
				<td>4</td>
			<?php
				}elseif($data['komponen_sistem']=='FILE LOGIC'){
			?>
				<td>7</td>
			<?php
				}elseif($data['komponen_sistem']=='INTERFACE EXTERNAL'){
			?>
				<td>5</td>
			<?php
				}else{
			?>
				<td>3</td>
			<?php
				}
			?>

			<!-- Hasil Kali jumlah dg ketentuan perusahaan (sederhana) -->
	        <?php
				if($data['komponen_sistem']=='INPUT'){
			?>
				<td><?php echo $js['jsederhana']*3;?></td>
			<?php
				}elseif($data['komponen_sistem']=='OUTPUT'){
			?>
				<td><?php echo $js['jsederhana']*4;?></td>
			<?php
				}elseif($data['komponen_sistem']=='FILE LOGIC'){
			?>
				<td><?php echo $js['jsederhana']*7;?></td>
			<?php
				}elseif($data['komponen_sistem']=='INTERFACE EXTERNAL'){
			?>
				<td><?php echo $js['jsederhana']*5;?></td>
			<?php
				}else{
			?>
				<td><?php echo $js['jsederhana']*3;?></td>
			<?php
				}
			?>


	         <!--Jumlah menengah -->
	        <?php
	        	$Ssql="SELECT sum(menengah) as jmenengah from kompleksitas where id_proyek='$data[id_proyek]' and komponen_sistem='$data[komponen_sistem]' ";
	        	$Query=mysql_query($Ssql);
	        	$jm=mysql_fetch_assoc($Query);
	        ?>
	        <td><?php echo $jm['jmenengah'];?></td>

	         <!-- Ketentuan Perusahaan (Menengah) -->
	        <?php
				if($data['komponen_sistem']=='INPUT'){
			?>
				<td>4</td>
			<?php
				}elseif($data['komponen_sistem']=='OUTPUT'){
			?>
				<td>5</td>
			<?php
				}elseif($data['komponen_sistem']=='FILE LOGIC'){
			?>
				<td>10</td>
			<?php
				}elseif($data['komponen_sistem']=='INTERFACE EXTERNAL'){
			?>
				<td>7</td>
			<?php
				}else{
			?>
				<td>4</td>
			<?php
				}
			?>

			<!-- Hasil Kali jumlah dg ketentuan perusahaan (menengah) -->
	        <?php
				if($data['komponen_sistem']=='INPUT'){
			?>
				<td><?php echo $jm['jmenengah']*4;?></td>
			<?php
				}elseif($data['komponen_sistem']=='OUTPUT'){
			?>
				<td><?php echo $jm['jmenengah']*5;?></td>
			<?php
				}elseif($data['komponen_sistem']=='FILE LOGIC'){
			?>
				<td><?php echo $jm['jmenengah']*10;?>0</td>
			<?php
				}elseif($data['komponen_sistem']=='INTERFACE EXTERNAL'){
			?>
				<td><?php echo $jm['jmenengah']*7;?></td>
			<?php
				}else{
			?>
				<td><?php echo $jm['jmenengah']*4;?></td>
			<?php
				}
			?>

	        <!--Jumlah Kompleks -->
	         <?php
	        	$Ssql="SELECT sum(komplek) as jkompleks from kompleksitas where id_proyek='$data[id_proyek]' and komponen_sistem='$data[komponen_sistem]' ";
	        	$Query=mysql_query($Ssql);
	        	$jk=mysql_fetch_assoc($Query);
	        ?>
	        <td><?php echo $jk['jkompleks'];?></td>

	        <!-- Ketentuan Perusahaan (Kompleks) -->
	        <?php
				if($data['komponen_sistem']=='INPUT'){
			?>
				<td>6</td>
			<?php
				}elseif($data['komponen_sistem']=='OUTPUT'){
			?>
				<td>7</td>
			<?php
				}elseif($data['komponen_sistem']=='FILE LOGIC'){
			?>
				<td>15</td>
			<?php
				}elseif($data['komponen_sistem']=='INTERFACE EXTERNAL'){
			?>
				<td>10</td>
			<?php
				}else{
			?>
				<td>6</td>
			<?php
				}
			?>

			<!-- Hasil Kali jumlah dg ketentuan perusahaan (menengah) -->
	        <?php
				if($data['komponen_sistem']=='INPUT'){
			?>
				<td><?php echo $jk['jkompleks']*6;?></td>
			<?php
				}elseif($data['komponen_sistem']=='OUTPUT'){
			?>
				<td><?php echo $jk['jkompleks']*7;?></td>
			<?php
				}elseif($data['komponen_sistem']=='FILE LOGIC'){
			?>
				<td><?php echo $jk['jkompleks']*15;?></td>
			<?php
				}elseif($data['komponen_sistem']=='INTERFACE EXTERNAL'){
			?>
				<td><?php echo $jk['jkompleks']*10;?></td>
			<?php
				}else{
			?>
				<td><?php echo $jk['jkompleks']*6;?></td>
			<?php
				}
			?>

	        <!-- Total Perbaris -->
	        <td><?php echo $data['total'];?></td>
	        
	    </tr>
 		<?php
			}
		?>
		<tr>
			<?php
				if(!isset($_POST['qcari'])){
					$qcari=0;
				}else{
					$qcari=$_POST['qcari'];
					$sql="SELECT sum(total) from kompleksitas where id_proyek like '%$qcari%'";
					$query=mysql_query($sql);
					$isi=mysql_fetch_array($query)
			?>	
				<th colspan="10" >Total CFP</th>
				<th><?php echo $isi['sum(total)'];?></th>
			<?php
		}
		?>
		</tr>
    
</table>
	<hr>
		<i>Keterangan:<br>
			1.	Kolom A,D dan G adalah jumlah dari setiap komponen sistem<br>
			2.	Kolom B,E dan H adalah nilai bobot dari setiap komponen sistem. Nilai tersebut adalah konstanta yang dibuat oleh Function Point International User Group(IFPUG), atau dengan kata lain ketetapan dari perusahaan.<br>
			3.	Kolom C,F dan I adalah hasil dari perkalian jumlah setiap komponen sistem dengan bobot dari setiap komponen sistem.<br>
			4.	Nilai CFP adalah hasil dari penambahan kolom C,F dan I untuk setiap komponennya.<br>
			5.	Total CFP adalah hasil dari penjumlahan setiap nilai CFP.</i>

    <hr>
    <center>
    <table class="table table-striped" align="center">
		<tr>
			<th>Nama GSC</th>
			<th>Nilai GSC</th>
		</tr>
		<?php
			$sql = mysql_query("SELECT * FROM gsc");
			while ($data = mysql_fetch_assoc($sql))
			{
		?>
		<tr>
			<td><?php echo $data['nama_gsc']; ?></td>
			<td><?php echo $data['nilai_gsc']; ?></td>
		</tr>
		<?php
			}
		?>
		<tfoot>
		<tr>
		<?php
			$sql="SELECT sum(nilai_gsc) from gsc";
			$Query=mysql_query($sql);
			$r=mysql_fetch_assoc($Query);
		?>	
			<th>Total RCAF</th>
			<th><?php echo $r['sum(nilai_gsc)'];?></th>
		</tr>
		</tfoot>
	</table>
	</center>
	<hr>
	<p> Hasil Perhitungan Kompleksitas Proyek
		<p> <b>FP = CFP * ( 0.65 + 0.01 * RCAF )</b>
	 
		<?php
				if(!isset($_POST['qcari'])){
					$qcari=0;
				}else{
					$qcari=$_POST['qcari'];
					$sql="SELECT sum(total),id_proyek from kompleksitas where id_proyek like '%$qcari%'";
					$query=mysql_query($sql);
					$isi=mysql_fetch_array($query)
			?>	
				
				<?php 
					echo " <br>&nbsp;&nbsp;&nbsp;&nbsp; = " .$isi['sum(total)']." * ( 0.65 + 0.01 * " .$r['sum(nilai_gsc)'].")";
					$tot=0.62+0.01*$r['sum(nilai_gsc)'];
					//echo "<br>&nbsp;&nbsp;&nbsp;&nbsp; = <b>".$isi['sum(total)']*$tot. " FP</b>";
				?>
				<hr>
				<center>Hasil Perhitungan Proyek <b><?php echo $isi['id_proyek'];?></b> adalah sebeser <br>
			<?php
			$ha=$isi['sum(total)']*$tot;
			echo "<b>".$isi['sum(total)']*$tot. " FP</b><br>";
			if($ha<300){
				echo "<center><b>Sederhana</b></center>";
			}elseif($ha>600){
				echo "<center><b>Kompleks</b></center>";
			}else{
				echo "<center><b>Menengah</b></center>";
			}
		}
		?>
		<hr>
	</body>
</html>