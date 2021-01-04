<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Rio Hotel | Habitaciones</title>

    <!-- Favicon -->
    <link rel="icon" href="images/logo.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <!--header-->
    <header class="header-area">
        <?php include_once('includes/header.php'); ?>
    </header>
    <!--header-->

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(admin/images/galeria/2.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">Habitaciones</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Rooms Area Start -->
    <div class="riohotel-rooms-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <!-- Single Room Area -->
                    <?php
                    $sql = "SELECT * from tblroom LIMIT 0, 3";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($results as $row) {               ?>
                            <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                                <!-- Room Thumbnail -->
                                <div class="room-thumbnail">
                                    <img src="admin/images/<?php echo $row->Image; ?>" alt="">
                                </div>
                                <!-- Room Content -->
                                <div class="room-content">
                                    <h2><?php echo htmlentities($row->RoomName); ?></h2>
                                    <h4>$<?php echo htmlentities($row->Price); ?></h4>
                                    <div class="room-feature">
                                        <h6>Descripción: <span><?php echo substr($row->RoomDesc, 0, 20); ?>...</span></h6>
                                    </div>
                                    <a href="room-details.php?catid=<?php echo htmlentities($row->RoomType) ?>" class=" btn view-detail-btn">Ver Detalles <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                    <?php $cnt = $cnt + 1;
                        }
                    } ?>
                </div>

                <div class="col-12 col-lg-6">
                    <!-- Single Room Area -->
                    <?php
                    $sql = "SELECT * from tblroom LIMIT 3, 5";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($results as $row) {               ?>
                            <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                                <!-- Room Thumbnail -->
                                <div class="room-thumbnail">
                                    <img src="admin/images/<?php echo $row->Image; ?>" alt="">
                                </div>
                                <!-- Room Content -->
                                <div class="room-content">
                                    <h2><?php echo htmlentities($row->RoomName); ?></h2>
                                    <h4>$<?php echo htmlentities($row->Price); ?></h4>
                                    <div class="room-feature">
                                        <h6>Descripción: <span><?php echo substr($row->RoomDesc, 0, 20); ?>...</span></h6>
                                    </div>
                                    <a href="room-details.php?catid=<?php echo htmlentities($row->RoomType) ?>" class=" btn view-detail-btn">Ver Detalles <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                    <?php $cnt = $cnt + 1;
                        }
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Rooms Area End -->

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
    <script src="js/custom.js"></script>
</body>

</html>