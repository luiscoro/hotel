<?php
header('Content-Type: text/html; charset=UTF-8');
/* Por defecto no mostraremos el mensaje */
$mostrar = false;
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['hbmsuid'] == 0)) {
	header('location:logout.php');
} else {
	if (isset($_POST['submit'])) {
		$uid = $_SESSION['hbmsuid'];
		$AName = $_POST['fname'];
		$mobno = $_POST['mobno'];
		$email = $_POST['email'];
		$sql = "update tbluser set FullName=:name,MobileNumber=:mobilenumber,Email=:email where ID=:uid";
		$query = $dbh->prepare($sql);
		$query->bindParam(':name', $AName, PDO::PARAM_STR);
		$query->bindParam(':mobilenumber', $mobno, PDO::PARAM_STR);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->bindParam(':uid', $uid, PDO::PARAM_STR);
		$query->execute();

		$mostrar = ["Éxito!", "El perfil ha sido actualizado", "success"];
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
		<title>Rio Hotel | Perfil</title>

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

		<!--profile-->

		<div class="riohotel-contact-form-area section-padding-100">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- Section Heading -->
						<div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
							<h2>Actualiza tu perfil</h2>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-12">
						<!-- Form -->
						<div class="riohotel-contact-form">
							<form method="post">
								<div class="row">
									<?php
									$uid = $_SESSION['hbmsuid'];
									$sql = "SELECT * from  tbluser where ID=:uid";
									$query = $dbh->prepare($sql);
									$query->bindParam(':uid', $uid, PDO::PARAM_STR);
									$query->execute();
									$results = $query->fetchAll(PDO::FETCH_OBJ);
									$cnt = 1;
									if ($query->rowCount() > 0) {
										foreach ($results as $row) {               ?>
											<div class="col-12 wow fadeInUp" data-wow-delay="100ms">
												<h5>Nombre:</h5>
												<input type="text" value="<?php echo $row->FullName; ?>" name="fname" class="form-control mb-30">
											</div>
											<div class="col-12 wow fadeInUp" data-wow-delay="100ms">
												<h5>Número telefónico:</h5>
												<input type="text" name="mobno" class="form-control mb-30" maxlength="10" pattern="[0-9]+" value="<?php echo $row->MobileNumber; ?>">
											</div>
											<div class=" col-12 wow fadeInUp" data-wow-delay="100ms">
												<h5>Correo electrónico:</h5>
												<input type="email" name="email" value="<?php echo $row->Email; ?>" class="form-control mb-30" placeholder="Correo electrónico">
											</div>
											<div class="col-12 wow fadeInUp" data-wow-delay="100ms">
												<h5>Fecha de registro:</h5>
												<input type="text" value="<?php echo $row->RegDate; ?>" class="form-control mb-30" readonly="true">
											</div>
									<?php $cnt = $cnt + 1;
										}
									} ?>
									<div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
										<button type="submit" name="submit" class="btn riohotel-btn mt-15">Actualizar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--profile End-->


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