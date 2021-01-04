<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
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
    <title>Rio Hotel | Detalles Reserva</title>

    <!-- Favicon -->
    <link rel="icon" href="images/logo.png">
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

    <!-- typography -->
    <div class="typography">
      <!-- container-wrap -->
      <div class="container">
        <div class="typography-info">
          <h2 class="type">My Hotel Booking Detail</h2>
        </div>

        <div class="bs-docs-example">
          <?php
          $vid = $_GET['viewid'];

          $sql = "SELECT tblbooking.BookingNumber,tbluser.FullName,tbluser.MobileNumber,tbluser.Email,tblbooking.ID as tid,tblbooking.IDType,tblbooking.Gender,tblbooking.Address,tblbooking.CheckinDate,tblbooking.CheckoutDate,tblbooking.BookingDate,tblbooking.Remark,tblbooking.Status,tblbooking.UpdationDate,tblcategory.CategoryName,tblcategory.Description,tblcategory.Price,tblroom.RoomName,tblroom.MaxAdult,tblroom.MaxChild,tblroom.RoomDesc,tblroom.NoofBed,tblroom.Image,tblroom.RoomFacility 
from tblbooking 
join tblroom on tblbooking.RoomId=tblroom.ID 
join tblcategory on tblcategory.ID=tblroom.RoomType 
join tbluser on tblbooking.UserID=tbluser.ID  
where tblbooking.ID=:vid";
          $query = $dbh->prepare($sql);
          $query->bindParam(':vid', $vid, PDO::PARAM_STR);
          $query->execute();
          $results = $query->fetchAll(PDO::FETCH_OBJ);

          $cnt = 1;
          if ($query->rowCount() > 0) {
            foreach ($results as $row) {               ?>
              <table border="1" class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                <tr>
                  <th colspan="4" style="color: red;font-weight: bold;text-align: center;font-size: 20px"> Booking Number: <?php echo $row->BookingNumber; ?></th>
                </tr>
                <tr>
                  <th colspan="4" style="color: blue;font-weight: bold;font-size: 15px"> Booking Detail:</th>
                </tr>
                <tr>
                  <th>Customer Name</th>
                  <td><?php echo $row->FullName; ?></td>
                  <th>Mobile Number</th>
                  <td><?php echo $row->MobileNumber; ?></td>
                </tr>


                <tr>

                  <th>Email</th>
                  <td><?php echo $row->Email; ?></td>
                  <th>ID Type</th>
                  <td><?php echo $row->IDType; ?></td>
                </tr>
                <tr>

                  <th>Gender</th>
                  <td><?php echo $row->Gender; ?></td>
                  <th>Address</th>
                  <td><?php echo $row->Address; ?></td>
                </tr>
                <tr>
                  <th>Check in Date</th>
                  <td><?php echo $row->CheckinDate; ?></td>
                  <th>Check out Date</th>
                  <td><?php echo $row->CheckoutDate; ?></td>
                </tr>

                <tr>
                <tr>
                  <th colspan="4" style="color: blue;font-weight: bold;font-size: 15px"> Room Detail:</th>
                </tr>
                <th>Room Type</th>
                <td><?php echo $row->CategoryName; ?></td>
                <th>Room Price(perday)</th>
                <td>$<?php echo $row->Price; ?></td>
                </tr>

                <tr>

                  <th>Room Name</th>
                  <td><?php echo $row->RoomName; ?></td>
                  <th>Room Description</th>
                  <td><?php echo $row->RoomDesc; ?></td>
                </tr>
                <tr>

                  <th>Max Adult</th>
                  <td><?php echo $row->MaxAdult; ?></td>
                  <th>Max Child</th>
                  <td><?php echo $row->MaxChild; ?></td>
                </tr>
                <tr>

                  <th>No.of Bed</th>
                  <td><?php echo $row->NoofBed; ?></td>
                  <th>Room Image</th>
                  <td><img src="admin/images/<?php echo $row->Image; ?>" width="100" height="100" value="<?php echo $row->Image; ?>"></td>
                </tr>
                <tr>

                  <th>Room Facility</th>
                  <td><?php echo $row->RoomFacility; ?></td>
                  <th>Booking Date</th>
                  <td><?php echo $row->BookingDate; ?></td>
                </tr>
                <tr>
                  <th colspan="4" style="color: blue;font-weight: bold;font-size: 15px"> Admin Remarks:</th>
                </tr>
                <tr>

                  <th>Order Final Status</th>

                  <td> <?php $status = $row->Status;

                        if ($row->Status == "Approved") {
                          echo "Su reserva ha sido aprobada";
                        }

                        if ($row->Status == "Cancelled") {
                          echo "Su reserva ha sido cancelada";
                        }


                        if ($row->Status == "") {
                          echo "No respondida aún";
                        }; ?></td>
                  <th>Admin Remark</th>
                  <?php if ($row->Status == "") { ?>

                    <td><?php echo "No actualizada aún"; ?></td>
                  <?php } else { ?> <td><?php echo htmlentities($row->Status); ?>
                    </td>
                  <?php } ?>
                </tr>


            <?php $cnt = $cnt + 1;
            }
          } ?>

              </table>
              <a href="invoice.php?invid=<?php echo htmlentities($row->tid); ?>" class="btn btn-success">Invoice</a>
        </div>

      </div>
      <!-- //container-wrap -->
    </div>
    <!-- //typography -->

    <!-- Footer Area Start -->
    <footer class="footer-area section-padding-80-0">
      <?php include_once('includes/footer.php'); ?>
    </footer>
    <!-- Footer Area End -->

  </body>

  </html><?php }  ?>