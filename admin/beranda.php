<?php
	 //error_reporting(E_ALL^E_NOTICE);
		session_start();

	require "../config/koneksi.php";

    include "../komponen/library.php";
	
	$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Variabel belum terbentuk';

	if ($_SESSION['username'])
	{
		$sql = mysql_query("SELECT * FROM user WHERE username = '$username'");
		$data = mysql_fetch_array($sql);

	//$sql = mysql_query("SELECT * FROM user WHERE username = '$_SESSION[username]'");
	//$data = mysql_fetch_array($sql);


	//if ($_SESSION["username"]){
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <link rel="icon" href="../../favicon.ico">

	    <title>Nusantech</title>

	    <!-- Bootstrap core CSS -->
	    <link href="../assets/css/bootstrap.css" rel="stylesheet">

	    <!-- Custom styles for this template -->
	    <link href="../assets/css/dashboard.css" rel="stylesheet">

        <!-- Datepicker CSS -->
	    <link href="../assets/css/bootstrap-datepicker.css" rel="stylesheet">

	    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
	    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	    <script src="../assets/js/ie-emulation-modes-warning.js"></script>

	    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>

	    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	    <script type="text/javascript" src="../assets/js/jquery.js"></script>
	    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
	    <script type="text/javascript" src="../assets/js/bootstrap-datepicker.js"></script>

	</head>
	<body>
		<!-- start body -->

		<div class="container-fluid">
			<!-- start container-fluid -->

			<div class="row">
				<!-- start -->

				<div class="col-sm-3 col-md-2 sidebar">
					<!-- start -->

					<ul class="nav nav-sidebar">
					
							<li class="active"><a href="?page=beranda.php">Halaman Utama</a></li>
							<?php if($data['status'] == "MANAGER" ){ ?>
							<li><a href="?page=datauser.php">Manajemen Pengguna</a></li>
							<li><a href="?page=dataclient.php">Manajemen Project Owner</a></li>
							<li><a href="?page=dataproyek.php">Data Proyek</a></li>
<!--							<li><a href="?page=datajadwal.php">Jadwal Kerja</a></li>-->
<!--							<li><a href="#">Kompleksitas</a>-->
<!--								<ul><a href="?page=datacfp.php">Data CFP</a></ul>-->
<!--								<ul><a href="?page=datagsc.php">Data GSC</a></ul>-->
<!--								<ul><a href="?page=nilaikomplek.php">Nilai Kompleksitas</a></ul>-->
<!--							</li>-->
<!--							<li><a href="#">Manajemen Resiko</a></li>-->
<!--                            <ul><a href="?page=dataresiko.php">Identifikasi</a></ul>-->
<!--                            <ul><a href="?page=tingkat-kepentingan.php">Tingkat Kepentingan</a></ul>-->
<!--                            <ul><a href="?page=datamitigasi.php">Mitigasi</a></ul>-->

							<li><a href="?page=dataproyek.php">Lihat Progres</a></li>
						
						<?php } else if($data['status'] == "CEO" ){ ?>
							<li><a href="?page=ldatauser.php">Lihat Data Pengguna</a></li>
							<li><a href="?page=ldataclient.php">Lihat Data Project Owner</a></li>
							<li><a href="?page=ldataproyek.php">Lihat Data Proyek</a></li>
							<li><a href="?page=datajadwal.php">Lihat Jadwal Kerja</a></li>
							<li><a href="?page=dataproyek.php">Lihat Kompleksitas</a>
							<li><a href="?page=dataproyek.php">Lihat Manajemen Resiko</a></li>
							<li><a href="?page=dataprogres.php">Lihat Progres</a></li>
							
						<?php } else if($data['status'] == "DEVELOPER" ){ ?>
							<li><a href="?page=ldatauser.php">Lihat Data Pengguna</a></li>
							<li><a href="?page=ldataclient.php">Lihat Data Project Owner</a></li>
							<li><a href="?page=ldataproyek.php">Lihat Data Proyek</a></li>
							<li><a href="?page=datajadwal.php">Jadwal Kerja</a></li>
							<li><a href="?page=dataproyek.php">Kompleksitas</a>
							<li><a href="?page=dataproyek.php">Manajemen Resiko</a></li>
							<li><a href="?page=dataprogres.php">Lihat Progres</a></li>
						
						<?php } ?>
							<li><a href="logout.php">Keluar</a></li>
			        </ul>

					<!-- end -->
				</div>

				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <div class="alert alert-success">
                        <h5 class="page-header">Selamat Datang, <?php echo $data['nama'];?></h5>
                    </div>
					<?php
						@$page=$_GET["page"];
						
						switch($page)
						{
							
							case "dataclient.php" : include "dataclient.php";break;
							// case "proses_client.php" : include "proses_client.php";break;
							case "ldataclient.php" : include "ldataclient.php";break;
							
							case "dataproyek.php" : include "dataproyek.php";break;
							// case "proses_proyek.php" : include "proses_proyek.php";break;

							case "ldataproyek.php" : include "ldataproyek.php";break;
							
							case "datauser.php" : include "datauser.php";break;
							// case "proses_user.php" : include "proses_user.php";break;
							case "ldatauser.php" : include "ldatauser.php";break;
							
							case "datagsc.php" : include "datagsc.php";break;
							// case "proses_gsc.php" : include "proses_gsc.php";break;
							
							case "datacfp.php" : include "datacfp.php";break;
							// case "proses_cfp.php" : include "proses_cfp.php";break;
							case "nilaikomplek.php" : include "nilaikomplek.php";break;
							
							case "datajadwal.php" : include "datajadwal.php";break;

							case "dataresiko.php" : include "dataresiko.php";break;

							case "tingkat-kepentingan.php" : include "datatingkat-kepentingan.php";break;
							case "datamitigasi.php" : include "datamitigasi.php";break;
							// case "proses_jadwal.php" : include "proses_jadwal.php";break;
							// default : include "content.php";

                            case "detailproyek.php" : include "detailproyek.php"; break;
                            case "detailproyek_kompleksitas.php" : include "detailproyek_kompleksitas.php"; break;

                            case "dataprogres.php" : include "dataprogres.php"; break;
                        }
					?>
				</div>

				<!-- end -->
			</div>

			<!-- end container-fluid -->
		</div>

		<?php
			include_once ".././komponen/modal/input_user.php";
			include_once ".././komponen/modal/edit_user.php";
			include_once ".././komponen/modal/input_client.php";
			include_once ".././komponen/modal/edit_client.php";
			include_once ".././komponen/modal/input_proyek.php";
			include_once ".././komponen/modal/edit_proyek.php";
			include_once ".././komponen/modal/input_gsc.php";
			include_once ".././komponen/modal/edit_gsc.php";
			include_once ".././komponen/modal/input_cfp.php";
			include_once ".././komponen/modal/edit_cfp.php";
			include_once ".././komponen/modal/input_jadwal.php";
			include_once ".././komponen/modal/edit_jadwal.php";
			//include_once ".././komponen/modal/input_risiko.php";
			include_once ".././komponen/modal/edit_resiko.php";
		?>

		<!-- end body -->
        <script type="text/javascript">
            var base_url = "http://localhost/nusantec/";

            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd'
            });
        </script>
	</body>
</html>
<?php
	}
?>