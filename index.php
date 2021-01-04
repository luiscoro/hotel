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

	<!-- About Us Area Start -->
	<section class="riohotel-about-area section-padding-100-0">
		<!-- Hotel Search Form Area 
		<div class="hotel-search-form-area">
			<div class="container-fluid">
				<div class="hotel-search-form">
					<form action="#" method="post">
						<div class="row justify-content-between align-items-end">
							<div class="col-6 col-md-2 col-lg-3">
								<label for="checkIn">Fecha Ingreso</label>
								<input type="date" class="form-control" id="checkIn" name="checkin-date">
							</div>
							<div class="col-6 col-md-2 col-lg-3">
								<label for="checkOut">Fecha Salida</label>
								<input type="date" class="form-control" id="checkOut" name="checkout-date">
							</div>
							<div class="col-4 col-md-1">
								<label for="adults">Adultos</label>
								<select name="adults" id="adults" class="form-control">
									<option value="01">01</option>
									<option value="02">02</option>
									<option value="03">03</option>
									<option value="04">04</option>
									<option value="05">05</option>
									<option value="06">06</option>
								</select>
							</div>
							<div class="col-4 col-md-2 col-lg-1">
								<label for="children">Niños</label>
								<select name="children" id="children" class="form-control">
									<option value="01">01</option>
									<option value="02">02</option>
									<option value="03">03</option>
									<option value="04">04</option>
									<option value="05">05</option>
									<option value="06">06</option>
								</select>
							</div>
							<div class="col-12 col-md-3">
								<button type="submit" class="form-control btn riohotel-btn w-100">Verificar disponibilidad</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>-->

		<div class="container mt-100">
			<div class="row align-items-center">
				<div class="col-12 col-lg-6">
					<!-- Section Heading -->
					<div class="section-heading wow fadeInUp" data-wow-delay="100ms">
						<h2>Rio Hotel</h2>
					</div>
					<div class="about-us-content mb-100">
						<h5 class="wow fadeInUp" data-wow-delay="300ms">Es un bonito y acogedor hotel de estilo colonial, ubicado en el centro histórico de Riobamba adornado con pintorescos balcones, a dos cuadras de la Estación del Tren y del Parque Sucre. Contamos con habitaciones cómodas y elegantes desde donde se puede apreciar la arquitectura de la urbe y la majestuosidad de los nevados de la cordillera de los Andes, ideal para turistas o viajeros de negocios.</h5>
					</div>
				</div>

				<div class="col-12 col-lg-6">
					<div class="about-us-thumbnail mb-100 wow fadeInUp" data-wow-delay="700ms">
						<div class="row no-gutters">
							<div class="col-6">
								<div class="single-thumb">
									<img src="images/about1.jpg" alt="">
								</div>
								<div class="single-thumb">
									<img src="images/about2.jpg" alt="">
								</div>
							</div>
							<div class="col-6">
								<div class="single-thumb">
									<img src="images/about3.jpg" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-12 col-lg-6">
					<!-- Section Heading -->
					<div class="section-heading wow fadeInUp" data-wow-delay="100ms">
						<h2>Riobamba</h2>
					</div>
					<div class="about-us-content mb-100">
						<h5 class="wow fadeInUp" data-wow-delay="300ms">Capital de la provincia de Chimborazo, ubicada en el centro geográfico del país a 2.764 metros sobre el nivel del mar, caracterizada por la cultura y amabilidad de su gente. Tiene varios atractivos turísticos entre ellos el volcán Chimborazo, el recorrido del tren, el museo de arte religioso, así como joyas arquitectónicas en toda la ciudad.</h5>
					</div>
				</div>

				<div class="col-12 col-lg-6">
					<div class="about-us-thumbnail mb-100 wow fadeInUp" data-wow-delay="200ms">
						<div class="row no-gutters">
							<div class="col-6">
								<div class="single-thumb">
									<img src="images/about4.jpg" alt="">
								</div>
							</div>
							<div class="col-6">
								<div class="single-thumb">
									<img src="images/about5.jpg" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- About Us Area End -->

	<!-- Service Area Start -->
	<div class="riohotel-service-area">
		<div class="container">
			<div class="row">
				<h2>Servicios</h2>
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
		<!-- Service Area End -->

		<!-- Testimonials Area Start -->
		<section class="roberto-testimonials-area section-padding-100-0">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-12 col-md-6">
						<div class="testimonial-thumbnail owl-carousel mb-100">
							<img src="admin/images/tes.jpg" alt="">
						</div>
					</div>

					<div class="col-12 col-md-6">
						<!-- Section Heading -->
						<div class="section-heading">
							<h2>Testimonios</h2>
						</div>
						<!-- Testimonial Slide -->
						<div class="testimonial-slides owl-carousel mb-100">

							<!-- Single Testimonial Slide -->
							<?php
							$sql = "SELECT * from  tbltestimony";
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