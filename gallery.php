<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE HTML>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Title -->
	<title>Galería | Habitaciones</title>

	<!-- Favicon -->
	<link rel="icon" href="images/logo.png">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />


	<!-- Stylesheet -->
	<link rel="stylesheet" href="style.css">

</head>

<body>

	<!--header-->
	<header class="header-area">
		<?php include_once('includes/header.php'); ?>
	</header>
	<!--header-->

	<!-- Breadcrumb Area Start -->
	<div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(admin/images/galeria/por.jpg);">
		<div class="container h-100">
			<div class="row h-100 align-items-center">
				<div class="col-12">
					<div class="breadcrumb-content text-center">
						<h2 class="page-title">Galería Habitaciones</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcrumb Area End -->
	<br><br><br>
	<div class="container">
		<div class="row no-gutters gallerys">
			<div style='float: left; margin: 0px 0px 0px 0px; padding: 5px;' class="col-lg-4 col-md-4 col-sm-6 col-12">
				<a href="admin/images/galeria/1.jpg" target="_blank">
					<img src="admin/images/galeria/1.jpg" class="img-fluid">
				</a>
			</div>
			<aside></aside>
			<div style='float: left; margin: 0px 0px 0px 0px; padding: 5px;' class="col-lg-4 col-md-4 col-sm-6 col-12">
				<a href="admin/images/galeria/2.jpg" target="_blank">
					<img src="admin/images/galeria/2.jpg" class="img-fluid">
				</a>
			</div>

			<div style='float: left; margin: 0px 0px 0px 0px; padding: 5px;' class="col-lg-4 col-md-4 col-sm-6 col-12">
				<a href="admin/images/galeria/3.jpg" target="_blank">
					<img src="admin/images/galeria/3.jpg" class="img-fluid">
				</a>
			</div>

			<div style='float: left; margin: 0px 0px 0px 0px; padding: 5px;' class="col-lg-4 col-md-4 col-sm-6 col-12">
				<a href="admin/images/galeria/4.jpg" target="_blank">
					<img src="admin/images/galeria/4.jpg" class="img-fluid">
				</a>
			</div>

			<div style='float: left; margin: 0px 0px 0px 0px; padding: 5px;' class="col-lg-4 col-md-4 col-sm-6 col-12">
				<a href="admin/images/galeria/5.jpg" target="_blank">
					<img src="admin/images/galeria/5.jpg" class="img-fluid">
				</a>
			</div>

			<div style='float: left; margin: 0px 0px 0px 0px; padding: 5px;' class="col-lg-4 col-md-4 col-sm-6 col-12">
				<a href="admin/images/galeria/6.jpg" target="_blank">
					<img src="admin/images/galeria/6.jpg" class="img-fluid">
				</a>
			</div>

			<div style='float: left; margin: 0px 0px 0px 0px; padding: 5px;' class="col-lg-4 col-md-4 col-sm-6 col-12">
				<a href="admin/images/galeria/7.jpg" target="_blank">
					<img src="admin/images/galeria/7.jpg" class="img-fluid">
				</a>
			</div>

			<div style='float: left; margin: 0px 0px 0px 0px; padding: 5px;' class="col-lg-4 col-md-4 col-sm-6 col-12">
				<a href="admin/images/galeria/8.jpg" target="_blank">
					<img src="admin/images/galeria/8.jpg" class="img-fluid">
				</a>
			</div>

			<div style='float: left; margin: 0px 0px 0px 0px; padding: 5px;' class="col-lg-4 col-md-4 col-sm-6 col-12">
				<a href="admin/images/galeria/9.jpg" target="_blank">
					<img src="admin/images/galeria/9.jpg" class="img-fluid">
				</a>
			</div>

			<div style='float: left; margin: 0px 0px 0px 0px; padding: 5px;' class="col-lg-4 col-md-4 col-sm-6 col-12">
				<a href="admin/images/galeria/10.jpg" target="_blank">
					<img src="admin/images/galeria/10.jpg" class="img-fluid">
				</a>
			</div>

			<div style='float: left; margin: 0px 0px 0px 0px; padding: 5px;' class="col-lg-4 col-md-4 col-sm-6 col-12">
				<a href="admin/images/galeria/11.jpg" target="_blank">
					<img src="admin/images/galeria/11.jpg" class="img-fluid">
				</a>
			</div>

			<div style='float: left; margin: 0px 0px 0px 0px; padding: 5px;' class="col-lg-4 col-md-4 col-sm-6 col-12">
				<a href="admin/images/galeria/12.jpg" target="_blank">
					<img src="admin/images/galeria/12.jpg" class="img-fluid">
				</a>
			</div>
		</div>
	</div>

	<br><br>
	<!-- Footer Area Start -->
	<footer class="footer-area section-padding-80-0">
		<?php include_once('includes/footer.php'); ?>
	</footer>
	<!-- Footer Area End -->

	<!-- **** All JS Files ***** -->
	<!-- jQuery 2.2.4 -->
	<script src="js/jquery.min.js"></script>
	<!-- Popper -->
	<script src="js/popper.min.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- All Plugins -->
	<script src="js/roberto.bundle.js"></script>
	<!-- Active -->
	<script src="js/default-assets/active.js"></script>
	<script src="js/custom.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

	<script>
		$(document).ready(function() {
			$(' .gallerys').magnificPopup({
				type: 'image',
				delegate: 'a',
				gallery: {
					enabled: true
				}
			});
		});
	</script>
</body>

</html>