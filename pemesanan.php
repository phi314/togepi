			<table border="1">
			<tr>
				<th>no</th>
				<th>tanggal</th>
				<th>waktu berangkat</th>
				<th>waktu tiba</th>
				<th>no pesawat</th>
				<th>harga</th>
				<th>Kota Asal</th>
				<th>Kota Tujuan</th>
				<th>Aksi</th>
			</tr>
		
		<?php
include "./config/koneksi.php";
$id_jadwal = $_POST["tanggal1"];
$asal = $_POST["asal"];
$tujuan = $_POST["tujuan"];
	$sql = mysql_query("select j.id_jadwal as id_jd, j.tanggal,j.waktu_berangkat,j.waktu_tiba,p.no_pesawat,m.harga,k.nama_kota as 'asal',kt.nama_kota as 'tujuan'
	from jadwal j join pesawat p on(j.id_pesawat=p.id_pesawat) join maskapai m on(j.id_maskapai=m.id_maskapai)join rute r on
	(j.id_rute=r.id_rute) join kota k on(r.kota_asal=k.kota) join kota kt on(r.kota_tujuan=kt.kota)
	where j.tanggal='$id_jadwal' and r.kota_asal='$asal' and r.kota_tujuan='$tujuan'");
		$no = 1;
		while ($data = mysql_fetch_assoc($sql))
			{
?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $data['tanggal']; ?></td>
					<td><?php echo $data['waktu_berangkat']; ?></td>
					<td><?php echo $data['waktu_tiba']; ?></td>
					<td><?php echo $data['no_pesawat']; ?></td>
					<td><?php echo $data['harga']; ?></td>
					<td><?php echo $data['asal']; ?></td>
					<td><?php echo $data['tujuan']; ?></td>
					<td><a href ='index.php?page=pemesan&id_jd=<? echo $data['id_jd'];?>'>PESAN</td>
				</tr>
				<?php
					$no++;
					}
				?>
				</table>