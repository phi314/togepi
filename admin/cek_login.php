<?php
	//error_reporting(E_ALL^E_NOTICE);
	//session_start();

	include "../config/koneksi.php";
	//session_start();
	$username = isset($_POST["username"]) ? $_POST["username"] : '';
	$password = isset($_POST["password"]) ? $_POST["password"] : '';
	$password=md5($password);
	
	//$username = mysql_real_escape_string($_POST["username"]);
	//$password = mysql_real_escape_string($_POST["password"]);

		$sql = mysql_query("SELECT * FROM user WHERE username = '$username' AND password = '$password'");
		$data = mysql_fetch_assoc($sql);
		$jumlah = mysql_num_rows($sql);
		
		//$sql = mysql_query("SELECT * FROM user WHERE username = '$username' AND password = '$password'");
		//$data = mysql_fetch_assoc($sql);
		//$jumlah = mysql_num_rows($sql);

		if($data > 0 && $data['password'] == $password){
		session_start();
		$_SESSION['status'] 		= $data['status'];
		$_SESSION['username'] 	= $data['username'];
		$_SESSION['id_user'] = $data['id_user'];
		
	
				
?>
	<script type="text/javascript">
	document.location="http://localhost/nusantec/admin/beranda.php";
	</script>
<?php
			
		}else{

?>
<!--	<div class="alert alert-warning warning1">-->
<!--		-->
<!--	</div>-->
<?php
		}
	
?>