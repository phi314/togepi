<? 
session_start();
$_SESSION['id_jds']=$_GET['id_jd'];
$id_jadwal = $_SESSION['id_jds'];
?>
 <article class="col2 pad_left1">
 <h2>Data Diri</h2>
<div class="wrapper">
	<form id="ContactForm" method='post' name='input' action="">
        <div>
          <div class="wrapper">
            <div class="bg">
              <input required='true' type="text" name="no_ktp" class="input" />
            </div>
            No KTP<br />
          </div>
		  <div class="wrapper">
            <div class="bg">
              <input required='true' type="text" name="nama" class="input" />
            </div>
            Nama<br />
          </div>
		  <div class="wrapper">
            <div class="bg">
              <input type="text" required='true' name="alamat" class="input" />
            </div>
            Alamat<br />
          </div>
		  <div class="wrapper">
            <div class="bg">
              <input type="text" required='true' name="kota" class="input" />
            </div>
            Kota<br />
          </div>
          <div class="wrapper">
            <div class="bg">
              <input required='true' type="text" name="email" class="input" />
            </div>
            E-mail<br />
          </div>
          <div class="wrapper">
            <div class="bg">
              <input type="number" required='true' name="tel" class="input" />
            </div>
            Telepon<br />
          </div>
          <INPUT name="sumbit" type= "submit" class="button1" value='Next' ></input>
      </form>
</div>
</article>


<?php

include "./config/koneksi.php";
if(isset($_POST['sumbit'])){
$no_ktp = $_POST['no_ktp'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$kota = $_POST['kota'];
$email = $_POST['email'];
$tel = $_POST['telepon'];
$id_jadwal = $_SESSION['id_jds'];
$_SESSION['no_ktp']= $_POST['no_ktp'];
	$sql = mysql_query("INSERT INTO pemesan (no_ktp, nama, alamat, kota, email, telepon, id_jadwal) 
             VALUES('$no_ktp','$nama','$alamat','$kota','$email','$tel','$id_jadwal')");
if($sql){
			 ?> 
<script language='javascript'>alert('Data Berhasil Masuk');
document.location='index.php?page=tiket'
</script>
<? }
			 
			 }
else{
unset($_POST['sumbit']);
}
?>