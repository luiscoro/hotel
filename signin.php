<?php
header('Content-Type: text/html; charset=UTF-8');
/* Por defecto no mostraremos el mensaje */
$mostrar = false;
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$sql = "SELECT ID FROM tbluser WHERE Email=:email and Password=:password";
	$sql1 = "SELECT ID FROM tbladmin WHERE Email=:email and Password=:password";
	$query = $dbh->prepare($sql);
	$query1 = $dbh->prepare($sql1);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':password', $password, PDO::PARAM_STR);
	$query1->bindParam(':email', $email, PDO::PARAM_STR);
	$query1->bindParam(':password', $password, PDO::PARAM_STR);
	$query->execute();
	$query1->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	$results1 = $query1->fetchAll(PDO::FETCH_OBJ);
	if ($query->rowCount() > 0) {
		foreach ($results as $result) {
			$_SESSION['hbmsuid'] = $result->ID;
		}
		if (!empty($_POST["remember"])) {
			//COOKIES for username
			setcookie("user_login", $_POST["email"], time() + (10 * 365 * 24 * 60 * 60));
			//COOKIES for password
			setcookie("userpassword", $_POST["password"], time() + (10 * 365 * 24 * 60 * 60));
		} else {
			if (isset($_COOKIE["user_login"])) {
				setcookie("user_login", "");
				if (isset($_COOKIE["userpassword"])) {
					setcookie("userpassword", "");
				}
			}
		}
		$_SESSION['login'] = $_POST['email'];
		echo "<script type='text/javascript'> document.location ='index.php'; </script>";
	} else {
		$mostrar = ["Error!", "Credenciales incorrectas", "error"];
	}

	if ($query1->rowCount() > 0) {
		foreach ($results1 as $result1) {
			$_SESSION['hbmsaid'] = $result1->ID;
		}

		if (!empty($_POST["remember"])) {
			//COOKIES for username
			setcookie("user_login", $_POST["email"], time() + (10 * 365 * 24 * 60 * 60));
			//COOKIES for password
			setcookie("userpassword", $_POST["password"], time() + (10 * 365 * 24 * 60 * 60));
		} else {
			if (isset($_COOKIE["user_login"])) {
				setcookie("user_login", "");
				if (isset($_COOKIE["userpassword"])) {
					setcookie("userpassword", "");
				}
			}
		}
		$_SESSION['login'] = $_POST['email'];
		echo "<script type='text/javascript'> document.location ='admin/dashboard.php'; </script>";
	} else {
		$mostrar = ["Error!", "Credenciales incorrectas", "error"];
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
	<title>Rio Hotel | Login</title>

	<!-- Favicon -->
	<link rel="icon" href="images/logo.png">

	<!-- Stylesheet -->
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/sweetalert.js"></script>
	<script type="text/javascript">
		function checklogin() {
			var patron = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
			if (document.login.email.value.search(patron) != 0) {
				document.getElementById("messageemail").innerHTML = "El correo no es válido";
				document.login.email.focus();
				return false;
			}
			if (document.login.password.value.length < 8 || document.login.password.value.length > 15) {
				document.getElementById("messagepassword").innerHTML = "La contraseña debe tener entre 8 y 15 caracteres";
				document.login.password.focus();
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
						<h2>Iniciar sesión</h2>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<!-- Form -->
					<div class="riohotel-contact-form">
						<form method="post" onsubmit="return checklogin();" name="login">
							<div class="row">
								<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
									<h5>Correo electrónico:</h5>
									<input type="email" name="email" required="true" class="form-control mb-30" value="<?php if (isset($_COOKIE["user_login"])) {
																															echo $_COOKIE["user_login"];
																														} ?>">
									<span id="messageemail" style="color:red"> </span>
								</div>
								<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
									<h5>Contraseña:</h5>
									<input type="password" name="password" required="true" class="form-control mb-30" value="<?php if (isset($_COOKIE["userpassword"])) {
																																	echo $_COOKIE["userpassword"];
																																} ?>">
									<span id="messagepassword" style="color:red"> </span>
								</div>
								<div class="col-12 col-lg-6 wow fadeInUp" data-wow-delay="100ms">
									<input type="checkbox" id="remember" name="remember" <?php if (isset($_COOKIE["user_login"])) { ?> checked <?php } ?> />
									<label for="keep_me_logged_in">Mantener la sesión iniciada</label>
								</div>
								<div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
									<button type="submit" name="login" class="btn riohotel-btn mt-15">Ingresar</button>
								</div>
								<div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
									<br>
									<a href="forgot-password.php">¿Olvidaste tu contraseña?</a>
								</div>
								<div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
									<br>
									<a href="signup.php">¿No tienes una cuenta? Regístrate</a>
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