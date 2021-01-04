<!-- Top Header Area Start -->
<div class="top-header-area">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <?php
                $sql = "SELECT * from tblpage where PageType='contactus'";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);

                $cnt = 1;
                if ($query->rowCount() > 0) {
                    foreach ($results as $row) {               ?>
                        <div class="top-header-content">
                            <a><i class="icon_phone"></i> <span><?php echo htmlentities($row->MobileNumber); ?></span></a>
                            <a><i class="icon_mail"></i> <span><?php echo htmlentities($row->Email); ?></span></a>
                        </div>
                <?php $cnt = $cnt + 1;
                    }
                } ?>
            </div>

            <div class="col-6">
                <div class="top-header-content">
                    <!-- Top Social Area -->
                    <div class="top-social-area ml-auto">
                        <a href="https://www.facebook.com/riohotel.ec/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="https://twitter.com/riohotelecuador?lang=es"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="https://wa.me/593939172156?text=Deseo%20hacer%20una%20reserva%20para%20el%20dia"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                        <a href="https://www.instagram.com/riohotel.ec/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Top Header Area End -->

<!-- Main Header Start -->
<div class="main-header-area">
    <div class="classy-nav-container breakpoint-off">
        <div class="container">
            <!-- Classy Menu -->
            <nav class="classy-navbar justify-content-between" id="robertoNav">

                <!-- Logo -->
                <a class="nav-brand" href="./"><img src="images/logoheader.jpeg" alt=""></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">
                    <!-- Menu Close Button -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul id="nav">
                            <li class="active"><a href="./">INICIO</a></li>
                            <li><a href="./room.php">HABITACIONES</a></li>
                            <li><a href="#">GALERÍA</a>
                                <ul class="dropdown">
                                    <li><a href="./gallery.php">HABITACIONES</a></li>
                                    <li><a href="./galleryhotel.php">HOTEL</a></li>
                                </ul>
                            </li>
                            <li><a href="./contact.php">CONTACTO</a></li>
                            <li><a href="./rating.php">CALIFICACIONES</a></li>
                            <?php if (strlen($_SESSION['hbmsuid'] == 0)) { ?>
                                <li><a href="#">CUENTA</a>
                                    <ul class="dropdown">
                                        <li><a href="./signin.php">INICIAR SESIÓN</a></li>
                                        <li><a href="./signup.php">REGISTRARSE</a></li>
                                    </ul>
                                </li>
                            <?php } ?>

                            <?php if (strlen($_SESSION['hbmsuid'] != 0)) { ?>
                                <li><a href="#">CUENTA</a>
                                    <ul class="dropdown">
                                        <li><a href="./profile.php">PERFIL</a></li>
                                        <li><a href="./my-booking.php">MIS RESERVAS</a></li>
                                        <li><a href="./change-password.php">CAMBIAR CONTRASEÑA</a></li>
                                        <li><a href="./logout.php">CERRAR SESIÓN</a></li>
                                    </ul>
                                </li><?php } ?>
                        </ul>

                        <!-- Book Now -->
                        <div class="book-now-btn ml-3 ml-lg-5">
                            <a href="./room.php">RESERVAR</a>
                        </div>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</div>