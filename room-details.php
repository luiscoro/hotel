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
    <title>Rio Hotel | Detalles</title>

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
    <?php
    $cid = intval($_GET['catid']);
    $sql = "SELECT tblroom.*,tblroom.id as rmid , tblroom.Price,tblcategory.ID,tblcategory.CategoryName from tblroom 
join tblcategory on tblroom.RoomType=tblcategory.ID 
where tblroom.RoomType=:cid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':cid', $cid, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    $cnt = 1;
    if ($query->rowCount() > 0) {
        foreach ($results as $row) {               ?>
            <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(admin/images/<?php echo $row->Image2; ?>);">
                <div class="container h-100">
                    <div class="row h-100 align-items-end">
                        <div class="col-12">
                            <div class="breadcrumb-content d-flex align-items-center justify-content-between pb-5">
                                <h2 class="room-title"> <?php echo htmlentities($row->RoomName); ?></h2>
                                <h2 class="room-price">$<?php echo htmlentities($row->Price); ?></h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    <?php $cnt = $cnt + 1;
        }
    } ?>
    <!-- Breadcrumb Area End -->

    <!-- Rooms Area Start -->
    <div class="riohotel-rooms-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <!-- Single Room Details Area -->
                    <div class="single-room-details-area mb-50">
                        <!-- Room Thumbnail Slides -->
                        <div class="room-thumbnail-slides mb-50">
                            <?php
                            $cid = intval($_GET['catid']);
                            $sql = "SELECT tblroom.*,tblroom.id as rmid,tblcategory.ID,tblcategory.CategoryName from tblroom 
join tblcategory on tblroom.RoomType=tblcategory.ID 
where tblroom.RoomType=:cid";
                            $query = $dbh->prepare($sql);
                            $query->bindParam(':cid', $cid, PDO::PARAM_STR);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);

                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $row) {               ?>
                                    <div id="room-thumbnail--slide" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="admin/images/<?php echo $row->Image; ?>" class="d-block w-100" alt="">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="admin/images/<?php echo $row->Image1; ?>" class="d-block w-100" alt="">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="admin/images/<?php echo $row->Image2; ?>" class="d-block w-100" alt="">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="admin/images/<?php echo $row->Image3; ?>" class="d-block w-100" alt="">
                                            </div>
                                        </div>

                                        <ol class="carousel-indicators">
                                            <li data-target="#room-thumbnail--slide" data-slide-to="0" class="active">
                                                <img src="admin/images/<?php echo $row->Image; ?>" class="d-block w-100" alt="">
                                            </li>
                                            <li data-target="#room-thumbnail--slide" data-slide-to="1">
                                                <img src="admin/images/<?php echo $row->Image1; ?>" class="d-block w-100" alt="">
                                            </li>
                                            <li data-target="#room-thumbnail--slide" data-slide-to="2">
                                                <img src="admin/images/<?php echo $row->Image2; ?>" class="d-block w-100" alt="">
                                            </li>
                                            <li data-target="#room-thumbnail--slide" data-slide-to="3">
                                                <img src="admin/images/<?php echo $row->Image3; ?>" class="d-block w-100" alt="">
                                            </li>
                                        </ol>
                                    </div>
                            <?php $cnt = $cnt + 1;
                                }
                            } ?>
                        </div>
                        <h4>Servicios en la habitación:</h4>
                        <ul>
                            <?php
                            $cid = intval($_GET['catid']);
                            $sql = "SELECT tblroom.*,tblroom.id as rmid,tblcategory.ID,tblcategory.CategoryName from tblroom 
join tblcategory on tblroom.RoomType=tblcategory.ID 
where tblroom.RoomType=:cid";
                            $query = $dbh->prepare($sql);
                            $query->bindParam(':cid', $cid, PDO::PARAM_STR);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);

                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $row) {
                                    $cad = $row->RoomFacility;
                                    $cad1 = explode(",", $cad);
                                    foreach ($cad1 as $values) { ?>
                                        <li><i class="fa fa-check"></i><?php echo htmlentities($values); ?></li>
                            <?php }
                                    $cnt = $cnt + 1;
                                }
                            } ?>
                        </ul>
                    </div>

                </div>

                <div class="col-12 col-lg-4">
                    <!-- Hotel Reservation Area -->
                    <div class="hotel-reservation--area mb-100">
                        <?php
                        $cid = intval($_GET['catid']);
                        $sql = "SELECT tblroom.*,tblroom.id as rmid,tblcategory.ID,tblcategory.CategoryName from tblroom 
join tblcategory on tblroom.RoomType=tblcategory.ID 
where tblroom.RoomType=:cid";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':cid', $cid, PDO::PARAM_STR);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);

                        $cnt = 1;
                        if ($query->rowCount() > 0) {
                            foreach ($results as $row) {               ?>
                                <h4>Descripción:</h4>
                                <p><?php echo $row->RoomDesc; ?>"</p>
                        <?php $cnt = $cnt + 1;
                            }
                        } ?>
                        <div class="form-group">
                            <a href="book-room.php?rmid=<?php echo $row->rmid; ?>" class="riohotel-btn">Solicitar reserva</a>
                        </div>
                    </div>
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