<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 8/16/16
 * Time: 10:07 PM
 */
?>
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

        <!-- Datatables -->
        <link href="../assets/css/datatable.css" rel="stylesheet">

        <link href="../css/fullcalendar/fullcalendar.css" rel="stylesheet">

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
        <script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>


    </head>
    <body>
    <!-- start body -->

    <div class="container-fluid">
        <!-- start container-fluid -->

        <div class="row">
            <!-- start -->

            <div class="col-sm-12">
                <div class="alert alert-success ">
                    <h5 class="page-header">Selamat Datang, <?php echo $data['nama'];?></h5>
                    <a href="beranda.php?page=detailproyek.php&id=<?php echo $_GET['id']; ?>" class="btn btn-primary">Kembali</a>
                </div>

                <?php include "../komponen/kalender_pekerjaan_v3.php"; ?>


            </div>

            <!-- end -->
        </div>

        <!-- end container-fluid -->
    </div>

    <!-- end body -->



    <script type="text/javascript">
        var base_url = "http://localhost/nusantech/";

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });

        $('.datatable-simple').dataTable({
            bFilter: true,
            bInfo: true,
            "oLanguage": {
                "sZeroRecords": "Data Tidak Ditemukan",
                "sEmptyTable": "Tidak Ada Data Tersedia"
            }
        });

    </script>
    </body>
    </html>
<?php
}
?>