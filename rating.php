<?php
header('Content-Type: text/html; charset=UTF-8');
/* Por defecto no mostraremos el mensaje */
$mostrar = false;
session_start();
error_reporting(0);

include('includes/dbconnection.php');

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $message = $_POST['message'];

    $sql = "insert into tbltestimony(Name,Testimony)values(:name,:message)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':message', $message, PDO::PARAM_STR);
    $query->execute();

    $LastInsertId = $dbh->lastInsertId();
    if ($LastInsertId > 0) {
        $mostrar = ["Éxito!", "Tu testimonio ha sido enviado en espera de su aprobación,después lo podrás ver en la página de inicio", "success"];
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
    <title>Rio Hotel | Calificaciones</title>

    <!-- Favicon -->
    <link rel="icon" href="images/logo.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/sweetalert.js"></script>

    <script type="text/javascript">
        function validateForm() {
            var msg1 = document.getElementById('msg1');
            var msg4 = document.getElementById('msg4');
            var nom = document.getElementById('namef');
            var mes = document.getElementById('messagef');

            msg1.innerText = '';
            msg4.innerText = '';
            color = '#FF0000';
            color1 = '#f1e398';
            var n = document.contact.name.value;
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
    $sql = "SELECT * from  tblmain where ID=4";
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
                                <h2 class="page-title"><?php echo $row->Title; ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php $cnt = $cnt + 1;
        }
    } ?>
    <!-- Breadcrumb Area End -->

    <!-- Blog Area Start -->

    <div class="roberto-news-area section-padding-100-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <!-- Single Blog Post Area -->

                    <?php
                    $sql = "SELECT * from  tblrating where ID=1";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($results as $row) {               ?>
                            <div class="single-blog-post d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <h5><?php echo htmlentities($row->Title1); ?></h5>
                                    <a href="#"><img src="admin/images/<?php echo $row->Image1; ?>" alt=""></a>
                                </div>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <!-- Post Content -->
                                <div class="post-thumbnail">
                                    <h5><?php echo htmlentities($row->Title2); ?></h5>
                                    <a href="#"><img src="admin/images/<?php echo $row->Image2; ?>" alt=""></a>
                                </div>
                            </div>

                            <!-- Single Blog Post Area -->
                            <div class="single-blog-post d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <h5><?php echo htmlentities($row->Title3); ?></h5>
                                    <a href="#"><img src="admin/images/<?php echo $row->Image3; ?>" alt=""></a>
                                </div>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <!-- Post Content -->
                                <div class="post-thumbnail">
                                    <h5><?php echo htmlentities($row->Title4); ?></h5>
                                    <a href="#"><img src="admin/images/<?php echo $row->Image4; ?>" alt=""></a>
                                </div>
                            </div>
                    <?php $cnt = $cnt + 1;
                        }
                    } ?>

                    <!-- Contact Form Area Start -->
                    <div class="riohotel-contact-form-area section-padding-100">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <!-- Section Heading -->
                                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                                        <h2>Déjanos tu testimonio</h2>
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
                                                    <h5>Comentario:</h5>
                                                    <textarea name="message" id="messagef" class="form-control mb-30" onchange="validateForm()"></textarea>
                                                    <span id="msg4" style="color:red"> </span>
                                                </div>
                                                <div class="col-12 text-center wow fadeInUp" data-wow-delay="100ms">
                                                    <button type="submit" name="submit" class="btn riohotel-btn mt-15">Publicar testimonio</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Contact Form Area End -->


                </div>

                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="roberto-sidebar-area pl-md-4">

                        <!-- Instagram -->
                        <div class="single-widget-area mb-100 clearfix">
                            <h4 class="widget-title mb-30">Instagram</h4>
                            <!-- Instagram Feeds -->
                            <?php
                            $sql = "SELECT * from  tblrating where ID=1";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $row) {               ?>
                                    <ul class="instagram-feeds">
                                        <?php echo $row->Ins1; ?>
                                        <?php echo $row->Ins2; ?>
                                        <?php echo $row->Ins3; ?>

                                    </ul>
                            <?php $cnt = $cnt + 1;
                                }
                            } ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Area End -->


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
            location.href = 'rating.php'
        });
    </script>
<?php
} ?>

</html>