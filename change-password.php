<?php
header('Content-Type: text/html; charset=UTF-8');
/* Por defecto no mostraremos el mensaje */
$mostrar = false;
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['hbmsuid'] == 0)) {
	header('location:logout.php');
} else {
	if (isset($_POST['submit'])) {
		$uid = $_SESSION['hbmsuid'];
		$cpassword = md5($_POST['currentpassword']);
		$newpassword = md5($_POST['newpassword']);
		$sql = "SELECT ID FROM tbluser WHERE ID=:uid and Password=:cpassword";
		$query = $dbh->prepare($sql);
		$query->bindParam(':uid', $uid, PDO::PARAM_STR);
		$query->bindParam(':cpassword', $cpassword, PDO::PARAM_STR);
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_OBJ);

		if ($query->rowCount() > 0) {
			$con = "update tbluser set Password=:newpassword where ID=:uid";
			$chngpwd1 = $dbh->prepare($con);
			$chngpwd1->bindParam(':uid', $uid, PDO::PARAM_STR);
			$chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
			$chngpwd1->execute();

			$mostrar = ["Éxito!", "La contraseña ha sido cambiada", "success"];
		} else {
			$mostrar = ["Error!", "La contraseña actual es incorrecta", "error"];
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
		<title>Rio Hotel | Cambiar contraseña</title>

		<!-- Favicon -->
		<link rel="icon" href="images/logo.png">

		<!-- Stylesheet -->
		<link rel="stylesheet" href="style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/sweetalert.js"></script>

		<script type="text/javascript">
			function checkpass() {
				if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
					swal(
						"Error!",
						"La contraseña nueva y de confirmación no coinciden",
						"error"
					);
					document.changepassword.confirmpassword.focus();
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

		<!--signin-->

		<div class="riohotel-contact-form-area section-padding-100">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- Section Heading -->
						<div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
							<h2>Cambiar contraseña</h2>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-12">
						<!-- Form -->
						<div class="riohotel-contact-form">
							<form method="post" onsubmit="return checkpass();" name="changepassword">
								<div class="row">
									<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
										<h5>Contraseña actual:</h5>
										<input type="password" name="currentpassword" required="true" class="form-control mb-30">
									</div>
									<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
										<h5>Nueva contraseña:</h5>
										<input type="password" name="newpassword" required="true" class="form-control mb-30">
									</div>
									<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
										<h5>Confirmar nueva contraseña:</h5>
										<input type="password" name="confirmpassword" required="true" class="form-control mb-30">
									</div>
									<div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
										<button type="submit" name="submit" class="btn riohotel-btn mt-15">Cambiar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--signin End-->


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
<?php }  ?>