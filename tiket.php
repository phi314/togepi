<? 
session_start();
include "./config/koneksi.php";
$ktp = $_SESSION['no_ktp'];
$id_j= $_SESSION['id_jds'];

$query=mysql_query("select * from pemesan where no_ktp ='$ktp' ");
while($data=mysql_fetch_array($query)){
$ktp=$data['no_ktp'];
$nama=$data['nama'];
$alamat=$data['alamat'];
$kota=$data['kota'];
$no_ktp=$data['no_ktp'];
$email=$data['email'];
$telpon=$data['telepon'];
}
?>

      <h2>Data pemesan </h2>
      <table>
      <tr><td>Nama           </td><td> : <b><? echo $nama ; ?></b> </td></tr>
      <tr><td>Alamat Lengkap </td><td> : <? echo $alamat ; ?> </td></tr>
      <tr><td>Telpon         </td><td> : <? echo $telpon ; ?> </td></tr>
      <tr><td>E-mail         </td><td> : <? echo $email ; ?> </td></tr></table>
	<h2>Data Penerbangan</h2>  
	  <table border="1">
			<tr>
				<th>tanggal</th>
				<th>waktu berangkat</th>
				<th>waktu tiba</th>
				<th>no pesawat</th>
				<th>harga</th>
				<th>Kota Asal</th>
				<th>Kota Tujuan</th>
			</tr>
<?
$query1=mysql_query("select j.id_jadwal as id_jd, j.tanggal,j.waktu_berangkat,j.waktu_tiba,p.no_pesawat,m.harga,k.nama_kota as 'asal',kt.nama_kota as 'tujuan'
	from jadwal j join pesawat p on(j.id_pesawat=p.id_pesawat) join maskapai m on(j.id_maskapai=m.id_maskapai)join rute r on
	(j.id_rute=r.id_rute) join kota k on(r.kota_asal=k.kota) join kota kt on(r.kota_tujuan=kt.kota)
	where j.id_jadwal='$id_j' ");
while($row=mysql_fetch_array($query1)){ ?>
<tr>
					
					<td><?php echo $row['tanggal']; ?></td>
					<td><?php echo $row['waktu_berangkat']; ?></td>
					<td><?php echo $row['waktu_tiba']; ?></td>
					<td><?php echo $row['no_pesawat']; ?></td>
					<td><?php echo 'Rp '.number_format($harga = $row['harga']); ?></td>
					<td><?php echo $row['asal']; ?></td>
					<td><?php echo $row['tujuan']; ?></td>
					
				</tr>
</table><br>				
				<?
} 
$pajak = 0.1 * $harga ;
$total = $harga + $pajak;?>
<table>
      <tr><td>Pajak       </td><td> : <b><? echo 'Rp '.number_format($pajak) ; ?></b> </td></tr>
      <tr><td>Total Bayar      </td><td> : <? echo 'Rp '.number_format($total) ; ?> </td></tr></table><br />
      