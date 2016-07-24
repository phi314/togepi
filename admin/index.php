<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <link rel="icon" href="./assets/favicon/favicon diskom-jawabarat.ico">

	    <title>Nusantech</title>

	    <!-- Bootstrap core CSS -->
	    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
	    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

	    <!-- Custom styles for this template -->
	    <link href="../assets/css/signin.css" rel="stylesheet">

	    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
	    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	    <script src="../assets/js/ie-emulation-modes-warning.js"></script>

	    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>

	    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
	      	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      	script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	    <script type="text/javascript" src="../assets/js/jquery.js"></script>
	    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
	</head>
	<body>
		<!-- start body -->

		<div class="container-fluid">
			<!-- start container-fluid -->

			<div class="form-signin">
				<!-- start form-signin -->

				<div id="signin">
					<div id="logo"><img src="../assets/img/login.png"></div>
					<center>Login Area<center></div>

					<div class="row">
						<!-- start -->

						<div class="col-xs-3 col-sm-3">
							<!-- start -->

								<form method="POST">
									<div class="form-group">
										<input type="text" name="username" class="form-control" placeholder="Username Anda"/>
									</div>
									
									<div class="form-group">
										<input type="password" name="password" class="form-control" placeholder="Password Anda"/>
									</div>
									<button type="reset" class="btn btn-lg btn-warning reset">Reset</button>
									<button type="submit" name="submit" class="btn btn-lg btn-success submit">Masuk</button>
									
								</form>

								<?php
									require_once "cek_login.php";
								?>

							<!-- end -->
						</div>



						<!-- end -->
					</div>

				<!-- end form-signin -->
			</div>

			<!-- end container-fluid -->
		</div>

		<!-- end body -->
	</body>
</html>