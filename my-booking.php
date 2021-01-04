<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
if (strlen($_SESSION['hbmsuid'] == 0)) {
	header('location:logout.php');
} else {
?>
	<!DOCTYPE HTML>
	<html>

	<head>
		<meta charset="UTF-8">
		<meta name="description" content="">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Title -->
		<title>Rio Hotel | Reservas</title>

		<!-- Favicon -->
		<link rel="icon" href="images/logo.png">

		<!-- Stylesheet -->

		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
		<link rel="stylesheet" href="style.css">
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />



	</head>

	<body>
		<!--header-->
		<header class="header-area">
			<?php include_once('includes/header.php'); ?>
		</header>
		<!--header-->

		<div class="riohotel-contact-form-area section-padding-100">
			<div class="container">

				<!-- typography -->
				<div class="typography">
					<!-- container-wrap -->
					<div class="container">
						<div class="typography-info">
							<h2 class="type">Mis Reservas</h2>
						</div>

						<div class="bs-docs-example">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th>Número de Reserva:</th>
										<th>Estado:</th>
										<th>Comentario del administrador:</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$uid = $_SESSION['hbmsuid'];
									$sql = "SELECT tbluser.*,tblbooking.BookingNumber,tblbooking.Status,tblbooking.Remark,tblbooking.ID as bid from tblbooking join tbluser on tblbooking.UserID=tbluser.ID where UserID=:uid";

									$query = $dbh->prepare($sql);
									$query->bindParam(':uid', $uid, PDO::PARAM_STR);
									$query->execute();
									$results = $query->fetchAll(PDO::FETCH_OBJ);

									$cnt = 1;
									if ($query->rowCount() > 0) {
										foreach ($results as $row) {               ?>
											<tr>
												<td><?php echo htmlentities($cnt); ?></td>
												<td><?php echo htmlentities($row->BookingNumber); ?></td>
												<?php if ($row->Status == "") { ?>
													<td><?php echo "Pendiente"; ?></td>
												<?php } else { ?> <td><?php echo htmlentities($row->Status); ?>
													</td>
												<?php } ?>
												<td><?php echo htmlentities($row->Remark); ?></td>
												</td>
											</tr>
									<?php $cnt = $cnt + 1;
										}
									} ?>

								</tbody>
							</table>
						</div>

					</div>
					<!-- //container-wrap -->
				</div>
				<!-- //typography -->
			</div>
		</div>

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

	</html><?php }  ?>