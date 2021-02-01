<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
$images = get_imgs();
?>
<!DOCTYPE HTML>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Title -->
	<title>Rio Hotel | Inicio</title>

	<!-- Favicon -->
	<link rel="icon" href="images/logo.png">

	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />

	<!-- Stylesheet -->
	<link rel="stylesheet" href="style.css">

</head>

<body>

	<!-- Preloader -->
	<div id="preloader">
		<div class="loader"></div>
	</div>
	<!-- /Preloader -->

	<!--header-->
	<header class="header-area">
		<?php include_once('includes/header.php'); ?>
	</header>
	<!--header-->

	<!-- Welcome Area Start -->
	<section class="welcome-area">
		<div class="welcome-slides owl-carousel">
			<!-- Single Welcome Slide -->
			<?php foreach ($images as $img) : ?>
				<div class="single-welcome-slide bg-img bg-overlay" style="background-image: url(<?php echo 'admin/' . $img->folder . $img->src; ?>);" data-img-url="<?php echo 'admin/' . $img->folder . $img->src; ?>">
					<!-- Welcome Content -->
					<div class="welcome-content h-100">
						<div class="container h-100">
							<div class="row h-100 align-items-center">
								<!-- Welcome Text -->
								<div class="col-12">
									<div class="welcome-text text-center">
										<h2 data-animation="fadeInLeft" data-delay="500ms"><?php echo $img->title; ?></h2>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
	<!-- Welcome Area End -->

	<?php
	$sql = "SELECT * from  tblabout where ID=1";
	$query = $dbh->prepare($sql);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	$cnt = 1;
	if ($query->rowCount() > 0) {
		foreach ($results as $row) {               ?>
			<div class="container mt-100">
				<div class="row align-items-center">
					<div class="col-12 col-lg-6">
						<!-- Section Heading -->
						<div class="section-heading wow fadeInUp" data-wow-delay="100ms">
							<h2><?php echo $row->Title1; ?></h2>
						</div>
						<div class="about-us-content mb-100">
							<h5 class="wow fadeInUp" data-wow-delay="300ms"><?php echo $row->Desc1; ?></h5>
						</div>
					</div>

					<div class="col-12 col-lg-6">
						<div class="about-us-thumbnail mb-100 wow fadeInUp" data-wow-delay="700ms">
							<div class="row no-gutters">
								<div class="col-6">
									<div class="single-thumb">
										<img src="admin/images/<?php echo $row->Image1; ?>" alt="">
									</div>
									<div class="single-thumb">
										<img src="admin/images/<?php echo $row->Image2; ?>" alt="">
									</div>
								</div>
								<div class="col-6">
									<div class="single-thumb">
										<img src="admin/images/<?php echo $row->Image3; ?>" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-12 col-lg-6">
						<!-- Section Heading -->
						<div class="section-heading wow fadeInUp" data-wow-delay="100ms">
							<h2><?php echo $row->Title2; ?></h2>
						</div>
						<div class="about-us-content mb-100">
							<h5 class="wow fadeInUp" data-wow-delay="300ms"><?php echo $row->Desc2; ?></h5>
						</div>
					</div>

					<div class="col-12 col-lg-6">
						<div class="about-us-thumbnail mb-100 wow fadeInUp" data-wow-delay="200ms">
							<div class="row no-gutters">
								<div class="col-6">
									<div class="single-thumb">
										<img src="admin/images/<?php echo $row->Image4; ?>" alt="">
									</div>
								</div>
								<div class="col-6">
									<div class="single-thumb">
										<img src="admin/images/<?php echo $row->Image5; ?>" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	<?php $cnt = $cnt + 1;
		}
	} ?>
	</section>
	<!-- About Us Area End -->

	<!-- Service Area Start -->
	<?php
	$sql = "SELECT Title3 from  tblabout where ID=1";
	$query = $dbh->prepare($sql);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	$cnt = 1;
	if ($query->rowCount() > 0) {
		foreach ($results as $row) {               ?>
			<div class="riohotel-service-area">
				<div class="container">
					<div class="row">
						<h2><?php echo $row->Title3; ?></h2>
						<div class="col-12">

							<div class=" service-content d-flex align-items-center justify-content-between">
								<!-- Single Service Area -->

								<?php
								$sql = "SELECT * from tblfacility LIMIT 0, 5";
								$query = $dbh->prepare($sql);
								$query->execute();
								$results = $query->fetchAll(PDO::FETCH_OBJ);
								if ($query->rowCount() > 0) {
									foreach ($results as $row) {               ?>
										<div class=" single-service--area mb-100 wow fadeInUp" data-wow-delay="100ms">
											<img src="admin/images/<?php echo $row->Image; ?>" alt="">
											<h5 display: inline-block; vertical-align: top;><?php echo htmlentities($row->FacilityTitle); ?></h5>
										</div>
								<?php
									}
								} ?>
							</div>

							<div class=" service-content d-flex align-items-center justify-content-between">
								<!-- Single Service Area -->

								<?php
								$sql = "SELECT * from tblfacility LIMIT 5, 10";
								$query = $dbh->prepare($sql);
								$query->execute();
								$results = $query->fetchAll(PDO::FETCH_OBJ);
								if ($query->rowCount() > 0) {
									foreach ($results as $row) {               ?>
										<div class=" single-service--area mb-100 wow fadeInUp" data-wow-delay="100ms">
											<img src="admin/images/<?php echo $row->Image; ?>" alt="">
											<h5 display: inline-block; vertical-align: top;><?php echo htmlentities($row->FacilityTitle); ?></h5>
										</div>
								<?php
									}
								} ?>
							</div>

							<div class=" service-content d-flex align-items-center justify-content-between">
								<!-- Single Service Area -->

								<?php
								$sql = "SELECT * from tblfacility LIMIT 10, 15";
								$query = $dbh->prepare($sql);
								$query->execute();
								$results = $query->fetchAll(PDO::FETCH_OBJ);
								if ($query->rowCount() > 0) {
									foreach ($results as $row) {               ?>
										<div class=" single-service--area mb-100 wow fadeInUp" data-wow-delay="100ms">
											<img src="admin/images/<?php echo $row->Image; ?>" alt="">
											<h5 display: inline-block; vertical-align: top;><?php echo htmlentities($row->FacilityTitle); ?></h5>
										</div>
								<?php
									}
								} ?>
							</div>
						</div>


					</div>
				</div>

		<?php $cnt = $cnt + 1;
		}
	} ?>
		<!-- Service Area End -->

		<!-- Testimonials Area Start -->

		<?php
		$sql = "SELECT * from  tblabout where ID=1";
		$query = $dbh->prepare($sql);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_OBJ);
		$cnt = 1;
		if ($query->rowCount() > 0) {
			foreach ($results as $row) {               ?>
				<section class="roberto-testimonials-area section-padding-100-0">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-12 col-md-6">
								<div class="testimonial-thumbnail owl-carousel mb-100">
									<img src="admin/images/<?php echo $row->Image6; ?>" alt="">
								</div>
							</div>

							<div class="col-12 col-md-6">
								<!-- Section Heading -->
								<div class="section-heading">
									<h2><?php echo $row->Title4; ?></h2>
								</div>
								<!-- Testimonial Slide -->
								<div class="testimonial-slides owl-carousel mb-100">

									<!-- Single Testimonial Slide -->
									<?php
									$sql = "SELECT * from  tbltestimony WHERE Status=1";
									$query = $dbh->prepare($sql);
									$query->execute();
									$results = $query->fetchAll(PDO::FETCH_OBJ);
									$cnt = 1;
									if ($query->rowCount() > 0) {
										foreach ($results as $row) {               ?>
											<div class="single-testimonial-slide">
												<h5>"<?php echo htmlentities($row->Testimony); ?>"</h5>
												<div class="rating-title">
													<h6><?php echo htmlentities($row->Name); ?> <span>/ <?php echo htmlentities($row->Date); ?></span></h6>
												</div>
											</div>
									<?php $cnt = $cnt + 1;
										}
									} ?>

								</div>
							</div>
						</div>
					</div>
				</section>

		<?php $cnt = $cnt + 1;
			}
		} ?>
		<!-- Testimonials Area End -->

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
</body>

</html>