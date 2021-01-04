<?php
header('Content-Type: text/html; charset=UTF-8');
/* Por defecto no mostraremos el mensaje */
$mostrar = false;
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$newpassword = md5($_POST['newpassword']);
	$sql = "SELECT Email FROM tbluser WHERE Email=:email and MobileNumber=:mobile";
	$query = $dbh->prepare($sql);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	if ($query->rowCount() > 0) {
		$con = "update tbluser set Password=:newpassword where Email=:email and MobileNumber=:mobile";
		$chngpwd1 = $dbh->prepare($con);
		$chngpwd1->bindParam(':email', $email, PDO::PARAM_STR);
		$chngpwd1->bindParam(':mobile', $mobile, PDO::PARAM_STR);
		$chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
		$chngpwd1->execute();
		$mostrar = ["Éxito!", "La contraseña ha sido restablecida", "success"];
	} else {
		$mostrar = ["Error!", "Correo electrónico o teléfono inválido", "error"];
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
	<title>Rio Hotel | Olvido contraseña</title>

	<!-- Favicon -->
	<link rel="icon" href="images/logo.png">

	<!-- Stylesheet -->
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/sweetalert.js"></script>

	<script type="text/javascript">
		function valid() {
			if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
				swal(
					"Error!",
					"La contraseña nueva y de confirmación no coinciden",
					"error"
				);
				document.chngpwd.confirmpassword.focus();
				return false;
			}
			return true;
		}
	</script>

</head>

<body>
	<!--header-->
	<header class="header-area">
		<?php include_once('includes/header.php'); ?>
	</header>
	<!--header-->

	<!--signup-->

	<div class="riohotel-contact-form-area section-padding-100">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Section Heading -->
					<div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
						<h2>Restablecer contraseña</h2>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<!-- Form -->
					<div class="riohotel-contact-form">
						<form method="post" name="chngpwd" onSubmit="return valid();">
							<div class="row">
								<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
									<h5>Correo electrónico:</h5>
									<input type="email" name="email" required="true" class="form-control mb-30">
								</div>
								<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
									<h5>Número telefónico:</h5>
									<input type="text" name="mobile" required="true" class="form-control mb-30" maxlength="10" pattern="[0-9]+">
								</div>
								<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
									<h5>Nueva contraseña:</h5>
									<input type="password" name="newpassword" required="true" class="form-control mb-30">
								</div>
								<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
									<h5>Confirmar nueva contraseña:</h5>
									<input type="password" name="confirmpassword" required="true" class="form-control mb-30">
								</div>
								<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
									<a href="signin.php">Iniciar sesión</a>
								</div>
								<div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
									<button type="submit" name="submit" class="btn riohotel-btn mt-15">Restablecer</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--signup End-->


	<!-- Footer Area Start -->
	<footer class="footer-area section-padding-80-0">
		<?php include_once('includes/footer.php'); ?>
	</footer>
	<!-- Footer Area End -->

	<!-- **** All JS Files ***** -->
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
		);
	</script>
<?php
} ?>

</html>