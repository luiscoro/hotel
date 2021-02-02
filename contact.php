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
	$destino = "luiscoronel_97@hotmail.com";


	$sql = "insert into tblcontact(Name,MobileNumber,Email,Message)values(:name,:phone,:email,:message)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':name', $name, PDO::PARAM_STR);
	$query->bindParam(':phone', $phone, PDO::PARAM_STR);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':message', $message, PDO::PARAM_STR);
	$query->execute();

	$LastInsertId = $dbh->lastInsertId();
	if ($LastInsertId > 0) {
		$asunto = "CONTACTO";
		$msg = $message . "\n" . "Mis datos son los siguientes:" . "\n" .
			"Nombre: " . $name . "\n" .
			"Número telefónico de contacto: " . $phone . "\n";;
		$header = "From: " . $email . "\r\n";
		$header .= "Reply-To: " . $email . "\r\n";
		$header .= "X-Mailer: PHP/" . phpversion();

		$mail = mail($destino, $asunto, $msg, $header);
		if ($mail) {
			$mostrar = ["Éxito!", "El mensaje ha sido enviado,gracias por comunicarse con nosotros", "success"];
		}
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

	<script type="text/javascript">
		function validateForm() {
			var msg1 = document.getElementById('msg1');
			var msg2 = document.getElementById('msg2');
			var msg3 = document.getElementById('msg3');
			var msg4 = document.getElementById('msg4');
			var nom = document.getElementById('namef');
			var num = document.getElementById('mobnof');
			var cor = document.getElementById('emailf');
			var mes = document.getElementById('messagef');

			msg1.innerText = '';
			msg2.innerText = '';
			msg3.innerText = '';
			msg4.innerText = '';
			color = '#FF0000';
			color1 = '#f1e398';
			var n = document.contact.name.value;
			var numtel = document.contact.phone.value;
			var em = document.contact.email.value;
			var mess = document.contact.message.value;


			if (n == '') {
				msg1.innerText = 'Este campo es obligatorio';
				nom.style.borderColor = color;
				return false;
			} else {
				nom.style.borderColor = color1;
			}

			if (!validateName(n)) {
				msg1.innerText = 'El nombre debe incluir sólo letras';
				nom.style.borderColor = color;
				return false;
			} else {
				nom.style.borderColor = color1;
			}

			if (numtel == '') {
				msg2.innerText = 'Este campo es obligatorio';
				num.style.borderColor = color;
				return false;
			} else {
				num.style.borderColor = color1;
			}

			if (!validateMob(numtel)) {
				msg2.innerText = 'El teléfono debe incluir sólo números';
				num.style.borderColor = color;
				return false;
			} else {
				num.style.borderColor = color1;
			}

			if (em == '') {
				msg3.innerText = 'Este campo es obligatorio';
				cor.style.borderColor = color;
				return false;
			} else {
				cor.style.borderColor = color1;
			}

			if (!validateEmail(em)) {
				msg3.innerText = 'El correo ingresado no es válido';
				cor.style.borderColor = color;
				return false;
			} else {
				cor.style.borderColor = color1;
			}

			if (mess == '') {
				msg4.innerText = 'Este campo es obligatorio';
				mes.style.borderColor = color;
				return false;
			} else {
				mes.style.borderColor = color1;
			}

			return true;
		}

		function validateName(name) {
			var re = /^[ñA-Za-z _]*[ñA-Za-z][ñA-Za-z _]*$/;
			return re.test(String(name).toLowerCase());
		}

		function validateMob(mob) {
			var re = /^([0-9])*$/;
			return re.test(String(mob));
		}

		function validateEmail(email) {
			var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(String(email).toLowerCase());
		}
	</script>

</head>

<body>
	<!--header-->
	<header class="header-area">
		<?php include_once('includes/header.php'); ?>
	</header>
	<!--header-->

	<!-- Breadcrumb Area Start -->
	<?php
	$sql = "SELECT * from tblpage where PageType='contactus'";
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
								<h2 class="page-title"><?php echo htmlentities($row->PageTitle); ?></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
	<?php $cnt = $cnt + 1;
		}
	} ?>
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
						<form method="post" onsubmit="return validateForm();" name="contact" autocomplete="off">
							<div class="row">

								<div class="col-12 wow fadeInUp" data-wow-delay="100ms">
									<h5>Nombre:</h5>
									<input type="text" name="name" id="namef" class="form-control mb-30" onchange="validateForm()">
									<span id="msg1" style="color:red"> </span>
								</div>
								<div class="col-12 wow fadeInUp" data-wow-delay="100ms">
									<h5>Número telefónico:</h5>
									<input type="text" name="phone" id="mobnof" maxlength="15" class="form-control mb-30" onchange="validateForm()">
									<span id="msg2" style="color:red"> </span>
								</div>
								<div class="col-12 wow fadeInUp" data-wow-delay="100ms" onchange="validateForm()">
									<h5>Correo electrónico:</h5>
									<input type="text" name="email" id="emailf" class="form-control mb-30">
									<span id="msg3" style="color:red"> </span>
								</div>
								<div class="col-12 wow fadeInUp" data-wow-delay="100ms">
									<h5>Mensaje:</h5>
									<textarea name="message" id="messagef" class="form-control mb-30" onchange="validateForm()"></textarea>
									<span id="msg4" style="color:red"> </span>
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