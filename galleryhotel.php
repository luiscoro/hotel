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
	<title>Galería | Hotel</title>

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
	<?php
	$sql = "SELECT * from  tblmain where ID=3";
	$query = $dbh->prepare($sql);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	$cnt = 1;
	if ($query->rowCount() > 0) {
		foreach ($results as $row) {               ?>
			<div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(admin/images/<?php echo $row->Image; ?>);">
				<div class="container h-100">
					<div class="row h-100 align-items-center">
						<div class="col-12">
							<div class="breadcrumb-content text-center">
								<h2 class="page-title"><?php echo $row->Title; ?></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
	<?php $cnt = $cnt + 1;
		}
	} ?>
	<!-- Breadcrumb Area End -->
	<br><br><br>
	<div class="container">
		<div class="row no-gutters gallerys">
			<?php
			$sql = "SELECT * from tblgalleryh";
			$query = $dbh->prepare($sql);
			$query->execute();
			$results = $query->fetchAll(PDO::FETCH_OBJ);
			$cnt = 1;
			if ($query->rowCount() > 0) {
				foreach ($results as $row) {               ?>
					<div style='float: left; margin: 0px 0px 0px 0px; padding: 5px;' class="col-lg-4 col-md-4 col-sm-6 col-12">
						<a href="admin/images/<?php echo $row->Image; ?>" target="_blank">
							<img src="admin/images/<?php echo $row->Image; ?>" class="img-fluid">
						</a>
					</div>
					<aside></aside>
			<?php $cnt = $cnt + 1;
				}
			} ?>
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