<?php
header('Content-Type: text/html; charset=UTF-8');
/* Por defecto no mostraremos el mensaje */
$mostrar = false;
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_POST['submit'])) {
	$fname = $_POST['fname'];
	$mobno = $_POST['mobno'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$ret = "select Email from tbluser where Email=:email";
	$query = $dbh->prepare($ret);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	if ($query->rowCount() == 0) {
		$sql = "Insert Into tbluser(FullName,MobileNumber,Email,Password)Values(:fname,:mobno,:email,:password)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':fname', $fname, PDO::PARAM_STR);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->bindParam(':mobno', $mobno, PDO::PARAM_INT);
		$query->bindParam(':password', $password, PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if ($lastInsertId) {
			$mostrar = ["Éxito!", "La cuenta ha sido registrada", "success"];
			header('location:signin.php');
		} else {
			$mostrar = ["Error!", "Algo salió mal. Por favor, vuelva a intentarlo", "error"];
		}
	} else {
		$mostrar = ["Advertencia!", "El correo electrónico ya existe. Por favor, vuelva a intentarlo", "warning"];
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
	<title>Rio Hotel | Registro</title>

	<!-- Favicon -->
	<link rel="icon" href="images/logo.png">

	<!-- Stylesheet -->
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/sweetalert.js"></script>

	<script type="text/javascript">
		function checksignup() {
			var patron = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
			var nomb = /^[ñA-Za-z _]*[ñA-Za-z][ñA-Za-z _]*$/;
			var num = /^([0-9])*$/;
			if (document.regis.name.value.search(nomb) == 0) {
				document.getElementById("messagename").innerHTML = "El nombre debe contener sólo letras y espacios";
				document.signup.name.focus();
				return false;
			}
			if (document.regis.email.value.search(patron) == 0) {
				document.getElementById("messageemail").innerHTML = "El correo no es válido";
				document.login.email.focus();
				return false;
			}
			if (document.regis.mobno.value.search(num) == 0) {
				document.getElementById("messagenum").innerHTML = "El número telefónico debe contener sólo  números";
				document.login.email.focus();
				return false;
			}
			if (document.regis.password.value.length < 8 || document.login.password.value.length > 15) {
				document.getElementById("messagepassword").innerHTML = "La contraseña debe tener entre 8 y 15 caracteres";
				document.login.password.focus();
				return false;
			}

			return true;
		}

		function nameChanged() {
			var strength = document.getElementById('messagename');
			var pat = /^[ñA-Za-z _]*[ñA-Za-z][ñA-Za-z _]*$/;
			var pwd = document.register.name.value;
			if (pat.test(pwd)) {
				strength.innerHTML = 'El nombre debe contener sólo letras y espacios';
			} else {
				strength.innerHTML = '';
			}

		}
		/*function passwordChanged() {
			var strength = document.getElementById('strength');
			var regex = /^(?=.*[a-z])(?=.*[A-Z])+$/;
			var strongRegex = new RegExp("^(?=.{14,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
			var mediumRegex = new RegExp("^(?=.{10,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
			var enoughRegex = new RegExp("(?=.{8,}).*", "g");
			var pwd = document.signup.password.value;
			if (pwd.length < 8 || pwd.length > 15) {
				strength.innerHTML = 'La contraseña debe tener entre 8 y 15 caracteres!';
			} else if (strongRegex.test(pwd)) {
				strength.innerHTML = '<span style="color:green">Fuerte!</span>';
			} else if (mediumRegex.test(pwd)) {
				strength.innerHTML = '<span style="color:orange">Media!</span>';
			} else {
				strength.innerHTML = '<span style="color:red">Débil!</span>';
			}
		}*/
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
						<h2>Regístrate para reservar nuestras habitaciones</h2>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<!-- Form -->
					<div class="riohotel-contact-form">
						<form method="post" name="register">
							<div class="row">
								<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
									<h5>Nombre:</h5>
									<input type="text" name="fname" required="true" class="form-control mb-30" onkeyup="return nameChanged();">
									<span id="messagename" style="color:red"> </span>
								</div>
								<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
									<h5>Número telefónico:</h5>
									<input type="text" name="mobno" required="true" class="form-control mb-30" maxlength="10">
									<span id="messagenum" style="color:red"> </span>
								</div>
								<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
									<h5>Correo electrónico:</h5>
									<input type="email" name="email" required="true" class="form-control mb-30">
									<span id="messageemail" style="color:red"> </span>
								</div>
								<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
									<h5>Contraseña:</h5>
									<input type="password" name="password" required="true" class="form-control mb-30">
									<span id="messagepassword" style="color:red"> </span>
								</div>
								<div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
									<button type="submit" name="submit" class="btn riohotel-btn mt-15">Registrarse</button>
								</div>
								<div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
									<br>
									<a href="signin.php">¿Ya creaste una cuenta? Inicia sesión</a>
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