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
	$sql = "SELECT Email FROM tbladmin WHERE Email=:email and MobileNumber=:mobile";
	$query = $dbh->prepare($sql);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	if ($query->rowCount() > 0) {
		$con = "update tbladmin set Password=:newpassword where Email=:email and MobileNumber=:mobile";
		$chngpwd1 = $dbh->prepare($con);
		$chngpwd1->bindParam(':email', $email, PDO::PARAM_STR);
		$chngpwd1->bindParam(':mobile', $mobile, PDO::PARAM_STR);
		$chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
		$chngpwd1->execute();
		$mostrar = ["Éxito!", "La contraseña ha sido restablecida", "success"];
	} else {
		$mostrar = ["Error!", "Correo electrónico o el teléfono no existe", "error"];
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
			var msg1 = document.getElementById('msg1');
			var msg2 = document.getElementById('msg2');
			var msg3 = document.getElementById('msg3');
			var msg4 = document.getElementById('msg4');

			var cor = document.getElementById('emailf');
			var num = document.getElementById('mobnof');
			var pas = document.getElementById('newpf');
			var con = document.getElementById('conpf');

			msg1.innerText = '';
			msg2.innerText = '';
			msg3.innerText = '';
			msg4.innerText = '';

			color = '#FF0000';
			color1 = '#f1e398';


			var em = document.chngpwd.email.value;
			var numtel = document.chngpwd.mobile.value;
			var paswd = document.chngpwd.newpassword.value;
			var cpasw = document.chngpwd.confirmpassword.value;

			if (em == '') {
				msg1.innerText = 'Este campo es obligatorio';
				cor.style.borderColor = color;
				return false;
			} else {
				cor.style.borderColor = color1;
			}

			if (!validateEmail(em)) {
				msg1.innerText = 'El correo ingresado no es válido';
				cor.style.borderColor = color;
				return false;
			} else {
				cor.style.borderColor = color1;
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

			if (paswd == '') {
				msg3.innerText = 'Este campo es obligatorio';
				pas.style.borderColor = color;
				return false;
			} else {
				pas.style.borderColor = color1;
			}

			if (paswd.length < 8 || paswd.length > 15) {
				msg3.innerText = 'La contraseña debe tener entre 8 y 15 caracteres';
				pas.style.borderColor = color;
				return false;
			} else {
				pas.style.borderColor = color1;
			}

			if (!validatePassword(paswd)) {
				msg3.innerText = 'La contraseña debe incluir al menos:1 letra mayúscula, 1 letra minúscula y 1 número';
				pas.style.borderColor = color;
				return false;
			} else {
				pas.style.borderColor = color1;
			}

			if (paswd != cpasw) {
				msg4.innerText = 'Las contraseñas no coinciden';
				pas.style.borderColor = color;
				con.style.borderColor = color;
				return false;
			} else {
				pas.style.borderColor = color1;
				con.style.borderColor = color1;
			}


			return true;
		}

		function validateMob(mob) {
			var re = /^([0-9])*$/;
			return re.test(String(mob));
		}

		function validateEmail(email) {
			var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(String(email).toLowerCase());
		}

		function validatePassword(password) {
			var re = /^(?=.*\d)(?=.*[a-záéíóúüñ]).*[A-ZÁÉÍÓÚÜÑ]/;
			return re.test(String(password));
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
						<form method="post" name="chngpwd" onsubmit="return valid();" autocomplete="off">
							<div class="row">
								<div class="col-12 wow fadeInUp" data-wow-delay="100ms">
									<h5>Correo electrónico:</h5>
									<input type="email" name="email" id="emailf" class="form-control mb-30" onchange="valid()">
									<span id="msg1" style="color:red"> </span>
								</div>
								<div class="col-12 wow fadeInUp" data-wow-delay="100ms">
									<h5>Número telefónico:</h5>
									<input type="text" name="mobile" id="mobnof" class="form-control mb-30" maxlength="15" onchange="valid()">
									<span id="msg2" style="color:red"> </span>
								</div>
								<div class="col-12 wow fadeInUp" data-wow-delay="100ms">
									<h5>Nueva contraseña:</h5>
									<input type="password" name="newpassword" id="newpf" class="form-control mb-30" onchange="valid()">
									<span id="msg3" style="color:red"> </span>
								</div>
								<div class="col-12 wow fadeInUp" data-wow-delay="100ms">
									<h5>Confirmar nueva contraseña:</h5>
									<input type="password" name="confirmpassword" id="conpf" class="form-control mb-30" onchange="valid()">
									<span id="msg4" style="color:red"> </span>
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
		).then(() => {
			location.href = 'signin.php'
		});
	</script>
<?php
} ?>

</html>