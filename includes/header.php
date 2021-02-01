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
                <?php
                $sql = "SELECT * from tblpage where PageType='contactus'";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);

                $cnt = 1;
                if ($query->rowCount() > 0) {
                    foreach ($results as $row) {               ?>
                        <div class="top-header-content">
                            <!-- Top Social Area -->
                            <div class="top-social-area ml-auto">
                                <a href="<?php echo htmlentities($row->Facebook); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="<?php echo htmlentities($row->Twitter); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="<?php echo htmlentities($row->Instagram); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </div>
                        </div>
                <?php $cnt = $cnt + 1;
                    }
                } ?>
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
                <?php
                $sql = "SELECT Logo from tblabout";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);

                $cnt = 1;
                if ($query->rowCount() > 0) {
                    foreach ($results as $row) {               ?>
                        <a class="nav-brand" href="./"><img src="admin/images/<?php echo $row->Logo; ?>" width="80" height="75" alt=""></a>
                <?php $cnt = $cnt + 1;
                    }
                } ?>

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
                        </ul>

                        <!-- Book Now -->
                        <div class="book-now-btn ml-2 ml-lg-3">
                            <a href="./room.php">RESERVAR</a>
                        </div>

                        <!-- Book Now -->

                        <?php
                        $sql = "SELECT Whatsapp from tblpage where PageType='contactus'";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);

                        $cnt = 1;
                        if ($query->rowCount() > 0) {
                            foreach ($results as $row) {               ?>
                                <div class="book-now-btn ml-2 ml-lg-3">
                                    <a href="<?php echo htmlentities($row->Whatsapp); ?>"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
                                </div>
                        <?php $cnt = $cnt + 1;
                            }
                        } ?>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</div>