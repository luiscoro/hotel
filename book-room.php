<?php
header('Content-Type: text/html; charset=UTF-8');
/* Por defecto no mostraremos el mensaje */
$mostrar = false;
$lin = "";
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['hbmsuid'] == 0)) {
	header('location:logout.php');
} else {

	if (isset($_POST['submit'])) {

		$booknum = mt_rand(100000000, 999999999);
		$rid = intval($_GET['rmid']);
		$uid = $_SESSION['hbmsuid'];
		$checkindate = $_POST['checkindate'];
		$checkoutdate = $_POST['checkoutdate'];
		$cantadult = $_POST['cantadult'];
		$cantchild = $_POST['cantchild'];

		$cdate = date('Y-m-d');
		if ($checkindate <  $cdate) {
			$mostrar = ["Error!", "La fecha de ingreso ingresada es menor a la fecha actual", "error", 3000];
		} else if ($checkindate > $checkoutdate) {
			$mostrar = ["Error!", "La fecha de salida debe ser igual o mayor a la fecha de ingreso", "error"];
		} else {
			$sql = "insert into tblbooking(RoomId,BookingNumber,UserID,CheckinDate,CheckoutDate,CantAdult,CantChild)values(:rid,:booknum,:uid,:checkindate,:checkoutdate,:cantadult,:cantchild)";
			$query = $dbh->prepare($sql);
			$query->bindParam(':rid', $rid, PDO::PARAM_STR);
			$query->bindParam(':booknum', $booknum, PDO::PARAM_STR);
			$query->bindParam(':uid', $uid, PDO::PARAM_STR);
			$query->bindParam(':checkindate', $checkindate, PDO::PARAM_STR);
			$query->bindParam(':checkoutdate', $checkoutdate, PDO::PARAM_STR);
			$query->bindParam(':cantadult', $cantadult, PDO::PARAM_STR);
			$query->bindParam(':cantchild', $cantchild, PDO::PARAM_STR);
			$query->execute();

			$LastInsertId = $dbh->lastInsertId();
			if ($LastInsertId > 0) {
				$mostrar = ["Éxito!", "Su reserva ha sido enviada.", "success"];
				$lin = "my-booking.php";
			} else {
				$mostrar = ["Error!", "Algo salió mal. Por favor, vuelva a intentarlo", "error"];
			}
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
		<title>Rio Hotel | Reserva</title>

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

		<!-- Contact Form Area Start -->
		<div class="riohotel-contact-form-area section-padding-100">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- Section Heading -->
						<div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
							<h2>Reserva de habitación</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<!-- Form -->
						<div class="riohotel-contact-form">
							<form action="#" method="post">
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
											<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
												<h5>Nombre:</h5>
												<input type="text" value="<?php echo $row->FullName; ?>" name="name" class="form-control mb-30" required="true" readonly="true">
											</div>
											<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
												<h5>Número telefónico:</h5>
												<input type="text" name="phone" class="form-control mb-30" required="true" maxlength="10" pattern="[0-9]+" value="<?php echo $row->MobileNumber; ?>" readonly="true">
											</div>
											<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
												<h5>Correo electrónico:</h5>
												<input type="email" value="<?php echo $row->Email; ?>" class="form-control mb-30" name="email" required="true" readonly="true">
											</div>
									<?php $cnt = $cnt + 1;
										}
									} ?>
									<?php
									$rid = intval($_GET['rmid']);
									$sql = "SELECT * from tblroom where tblroom.ID=:rid";
									$query = $dbh->prepare($sql);
									$query->bindParam(':rid', $rid, PDO::PARAM_STR);
									$query->execute();
									$results = $query->fetchAll(PDO::FETCH_OBJ);
									$cnt = 1;
									if ($query->rowCount() > 0) {
										foreach ($results as $row) {               ?>
											<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
												<h5>Habitación:</h5>
												<input type="text" value="<?php echo $row->RoomName; ?>" class="form-control mb-30" readonly="true">
											</div>
									<?php $cnt = $cnt + 1;
										}
									} ?>
									<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
										<h5>Fecha de ingreso:</h5>
										<input type="date" value="" class="form-control mb-30" name="checkindate" required="true">
									</div>
									<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
										<h5>Fecha de salida:</h5>
										<input type="date" value="" class="form-control mb-30" name="checkoutdate" required="true">
									</div>

									<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
										<h5>Cantidad de adultos:</h5>
										<input type="number" class="form-control mb-30" name="cantadult" min="1" required="true">
									</div>
									<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
										<h5>Cantidad de niños:</h5>
										<input type="number" class="form-control mb-30" name="cantchild" min="0" required="true">
									</div>
									<div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
										<button type="submit" name="submit" class="btn riohotel-btn mt-15">Solicitar reserva</button>
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
		<?php
		/* Si hemos definido un contenido para $mostrar, lo usamos */
		if ($mostrar !== false) {
		?><script>
				swal(
					<?= json_encode($mostrar[0]) ?>,
					<?= json_encode($mostrar[1]) ?>,
					<?= json_encode($mostrar[2]) ?>
				).then(() => {
					location.href = <?= $lin; ?>
				});
			</script>
		<?php
		} ?>
	</body>

	</html><?php }   ?>