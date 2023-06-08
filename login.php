<?php
include('config.php'); // Includes Login Script
if (isset($_SESSION['login_sales_user'])) {
	header("location:  Admin/index.php"); // Redirecting To Profile Page
} else if (isset($_SESSION['login_dist_user'])) {
	header("location:  DistributorAdmin/index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Super Market Login Page</title>
	<meta name="keywords" content="super store management system" />
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<script src="js/jquery-1.11.1.min.js"></script>
	<link
		href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic'
		rel='stylesheet' type='text/css'>
	<link
		href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
		rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>

</head>

<body>
	<!-- header -->
	<?php include("./includes/topHeader.php") ?>
	<?php include("./includes/secondHeader.php") ?>
	<!-- navigation -->
	<?php include("./includes/navbar.php") ?>
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Login Page</li>
			</ol>
		</div>
	</div>
	<style>
		.nav-tabs>li {
			width: 33%;
		}
	</style>
	<div class="top-brands">
		<div class="container">
			<h2>Login</h2>
			<div class="grid_3 grid_5">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab"
								data-toggle="tab" aria-controls="expeditions" aria-expanded="true">Store</a>
						</li>
						<li role="presentation"><a href="#tours" role="tab" id="tours-tab" data-toggle="tab"
								aria-controls="tours">Distributor</a></li>
						<li role="presentation"><a href="#admin" role="tab" id="admin-tab" data-toggle="tab"
								aria-controls="admin">Admin</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions"
							aria-labelledby="expeditions-tab">
							<div class="login">
								<div class="container">
									<h2>Store Login Form</h2>
									<div style="color:red;text-align:center">
										<?php echo $error; ?>
									</div>
									<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
										<form action="" method="POST">
											<input type="text" name="lsid" placeholder="Store ID" required=" ">
											<input type="password" name="lspass" placeholder="Password" required=" ">

											<input type="submit" name="submitq" value="Login">
										</form>
									</div>

								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="tours" aria-labelledby="tours-tab">
							<div class="login">
								<div class="container">
									<h2>Distributor Login Form</h2>
									<div style="color:red;text-align:center">
										<?php echo $error; ?>
									</div>
									<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
										<form action="" method="POST">
											<input type="text" name="dsid" placeholder="Distributor ID" required=" ">
											<input type="password" name="dspass" placeholder="Password" required=" ">
											<input type="submit" name="submitd" value="Login">
										</form>
									</div>

								</div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="admin" aria-labelledby="admin-tab">
							<div class="login">
								<div class="container">
									<h2>Admin Login Form</h2>

									<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
										<form>
											<input type="text" placeholder="Admin ID" required=" ">
											<input type="password" placeholder="Password" required=" ">

											<input type="submit" value="Login">
										</form>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script src="js/bootstrap.min.js"></script>

	<script src="js/minicart.min.js"></script>


</body>

</html>