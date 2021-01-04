<?php
header('Content-Type: text/html; charset=UTF-8');
/* Por defecto no mostraremos el mensaje */
$mostrar = false;
session_start();
error_reporting(0);

include('includes/dbconnection.php');

if (isset($_POST['submit'])) {

	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	$sql = "insert into tblcontact(Name,MobileNumber,Email,Message)values(:name,:phone,:email,:message)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':name', $name, PDO::PARAM_STR);
	$query->bindParam(':phone', $phone, PDO::PARAM_STR);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':message', $message, PDO::PARAM_STR);
	$query->execute();

	$LastInsertId = $dbh->lastInsertId();
	if ($LastInsertId > 0) {
		$mostrar = ["Éxito!", "El mensaje ha sido enviado", "success"];
	} else {
		$mostrar = ["Error!", "Algo salió mal. Inténtelo de nuevo", "error"];
	}
}
?>
<!DOCTYPE HTML>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Title -->
	<title>Rio Hotel | Contacto</title>

	<!-- Favicon -->
	<link rel="icon" href="images/logo.png">

	<!-- Stylesheet -->
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/sweetalert.js"></script>

</head>

<body>
	<!--header-->
	<header class="header-area">
		<?php include_once('includes/header.php'); ?>
	</header>
	<!--header-->

	<!-- Breadcrumb Area Start -->
	<div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(admin/images/galeria/contacto.jpg);">
		<div class="container h-100">
			<div class="row h-100 align-items-center">
				<div class="col-12">
					<div class="breadcrumb-content text-center">
						<h2 class="page-title">Contáctanos</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcrumb Area End -->


	<!-- Google Maps & Contact Info Area Start -->
	<section class="google-maps-contact-info">
		<div class="container-fluid">
			<div class="google-maps-contact-content">
				<?php
				$sql = "SELECT * from tblpage where PageType='contactus'";
				$query = $dbh->prepare($sql);
				$query->execute();
				$results = $query->fetchAll(PDO::FETCH_OBJ);

				$cnt = 1;
				if ($query->rowCount() > 0) {
					foreach ($results as $row) {               ?>
						<div class="row">
							<!-- Single Contact Info -->
							<div class="col-6 col-lg-3">
								<div class="single-contact-info">
									<i class="fa fa-phone" aria-hidden="true"></i>
									<h4>Teléfonos</h4>
									<p><?php echo htmlentities($row->MobileNumber); ?></p>
								</div>
							</div>

							<div class="col-6 col-lg-6">
								<div class="single-contact-info">
									<i class="fa fa-map-marker" aria-hidden="true"></i>
									<h4>Dirección</h4>
									<p><?php echo htmlentities($row->PageDescription); ?></p>
								</div>
							</div>

							<div class="col-6 col-lg-3">
								<div class="single-contact-info">
									<i class="fa fa-envelope-o" aria-hidden="true"></i>
									<h4>Email</h4>
									<p><?php echo htmlentities($row->Email); ?></p>
								</div>
							</div>
						</div>
				<?php $cnt = $cnt + 1;
					}
				} ?>

				<!-- Google Maps -->
				<div class="google-maps">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3988.1217843724467!2d-78.652099!3d-1.670929!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d3a8260ef8fbb3%3A0xb1830cc2887b881a!2s10%20de%20Agosto%20%26%20Pichincha%2C%20Riobamba!5e0!3m2!1ses-419!2sec!4v1607618428161!5m2!1ses-419!2sec" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</section>
	<!-- Google Maps & Contact Info Area End -->

	<!-- Contact Form Area Start -->
	<div class="riohotel-contact-form-area section-padding-100">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Section Heading -->
					<div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
						<h2>Envíanos un mensaje</h2>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<!-- Form -->
					<div class="riohotel-contact-form">
						<form action="#" method="post">
							<div class="row">
								<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
									<h5>Nombre:</h5>
									<input type="text" name="name" class="form-control mb-30" required="true">
								</div>
								<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
									<h5>Número telefónico:</h5>
									<input type="text" name="phone" required="true" maxlength="10" pattern="[0-9]+" class="form-control mb-30">
								</div>
								<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
									<h5>Correo electrónico:</h5>
									<input type="email" name="email" required="true" class="form-control mb-30">
								</div>
								<div class="col-12 wow fadeInUp" data-wow-delay="100ms">
									<h5>Mensaje:</h5>
									<textarea name="message" required="true" class="form-control mb-30"></textarea>
								</div>
								<div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
									<button type="submit" name="submit" class="btn riohotel-btn mt-15">Enviar mensaje</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Contact Form Area End -->

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

<?php
/* Si hemos definido un contenido para $mostrar, lo usamos */
if ($mostrar !== false) {
?><script>
		swal(
			<?= json_encode($mostrar[0]) ?>,
			<?= json_encode($mostrar[1]) ?>,
			<?= json_encode($mostrar[2]) ?>
		).then(() => {
			location.href = 'contact.php'
		});
	</script>
<?php
} ?>

</html>