<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['hbmsaid'] == 0)) {
	header('location:logout.php');
} else {
	if (isset($_POST['submit'])) {

		$hbmsaid = $_SESSION['hbmsaid'];
		$roomtype = $_POST['roomtype'];
		$roomname = $_POST['roomname'];
		$maxadult = $_POST['maxadult'];
		$maxchild = $_POST['maxchild'];
		$roomfac = implode(',', $_POST['roomfac']);
		$roomdes = $_POST['roomdes'];
		$nobed = $_POST['nobed'];
		$price = $_POST['price'];

		$img = $_FILES["image"]["name"];
		$img1 = $_FILES["image1"]["name"];
		$img2 = $_FILES["image2"]["name"];
		$img3 = $_FILES["image3"]["name"];
		$extension = substr($img, strlen($img) - 4, strlen($img));
		$extension1 = substr($img1, strlen($img1) - 4, strlen($img1));
		$extension2 = substr($img2, strlen($img2) - 4, strlen($img2));
		$extension3 = substr($img3, strlen($img3) - 4, strlen($img3));
		$allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
		if (!in_array($extension, $allowed_extensions)) {
			echo "<script>alert('Imágen con formato inválido. Solo jpg / jpeg/ png /gif formatos permitidos');</script>";
		} else {

			$img = md5($img) . time() . $extension;
			$img1 = md5($img1) . time() . $extension1;
			$img2 = md5($img2) . time() . $extension2;
			$img3 = md5($img3) . time() . $extension3;
			move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $img);
			move_uploaded_file($_FILES["image1"]["tmp_name"], "images/" . $img1);
			move_uploaded_file($_FILES["image2"]["tmp_name"], "images/" . $img2);
			move_uploaded_file($_FILES["image3"]["tmp_name"], "images/" . $img3);
			$sql = "insert into tblroom(RoomType,RoomName,MaxAdult,MaxChild,RoomDesc,NoofBed,Image,Image1,Image2,image3,RoomFacility,Price)values(:roomtype,:roomname,:maxadult,:maxchild,:roomdes,:nobed,:img,:img1,:img2,:img3,:roomfac,:price)";
			$query = $dbh->prepare($sql);
			$query->bindParam(':roomtype', $roomtype, PDO::PARAM_STR);
			$query->bindParam(':roomname', $roomname, PDO::PARAM_STR);
			$query->bindParam(':maxadult', $maxadult, PDO::PARAM_STR);
			$query->bindParam(':maxchild', $maxchild, PDO::PARAM_STR);
			$query->bindParam(':roomdes', $roomdes, PDO::PARAM_STR);
			$query->bindParam(':nobed', $nobed, PDO::PARAM_STR);
			$query->bindParam(':price', $price, PDO::PARAM_STR);
			$query->bindParam(':roomfac', $roomfac, PDO::PARAM_STR);
			$query->bindParam(':img', $img, PDO::PARAM_STR);
			$query->bindParam(':img1', $img1, PDO::PARAM_STR);
			$query->bindParam(':img2', $img2, PDO::PARAM_STR);
			$query->bindParam(':img3', $img3, PDO::PARAM_STR);
			$query->execute();

			$LastInsertId = $dbh->lastInsertId();
			if ($LastInsertId > 0) {
				echo '<script>alert("La habitación ha sido agregada.")</script>';
				echo "<script>window.location.href ='add-room.php'</script>";
			} else {
				echo '<script>alert("Something Went Wrong. Please try again")</script>';
			}
		}
	}
?>
	<!DOCTYPE HTML>
	<html>

	<head>
		<meta charset="UTF-8">
		<meta name="description" content="">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Rio Hotel | Agregar Habitación</title>
		<!-- Favicon -->
		<link rel="icon" href="../images/logo.png">

		<script type="application/x-javascript">
			addEventListener("load", function() {
				setTimeout(hideURLbar, 0);
			}, false);

			function hideURLbar() {
				window.scrollTo(0, 1);
			}
		</script>
		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<!-- Custom CSS -->
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<!-- Graph CSS -->
		<link href="css/font-awesome.css" rel="stylesheet">
		<!-- jQuery -->
		<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
		<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<!-- lined-icons -->
		<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
		<script src="js/simpleCart.min.js"> </script>
		<script src="js/amcharts.js"></script>
		<script src="js/serial.js"></script>
		<script src="js/light.js"></script>
		<!-- //lined-icons -->
		<script src="js/jquery-1.10.2.min.js"></script>
		<!--pie-chart--->
		<script src="js/pie-chart.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#demo-pie-1').pieChart({
					barColor: '#3bb2d0',
					trackColor: '#eee',
					lineCap: 'round',
					lineWidth: 8,
					onStep: function(from, to, percent) {
						$(this.element).find('.pie-value').text(Math.round(percent) + '%');
					}
				});

				$('#demo-pie-2').pieChart({
					barColor: '#fbb03b',
					trackColor: '#eee',
					lineCap: 'butt',
					lineWidth: 8,
					onStep: function(from, to, percent) {
						$(this.element).find('.pie-value').text(Math.round(percent) + '%');
					}
				});

				$('#demo-pie-3').pieChart({
					barColor: '#ed6498',
					trackColor: '#eee',
					lineCap: 'square',
					lineWidth: 8,
					onStep: function(from, to, percent) {
						$(this.element).find('.pie-value').text(Math.round(percent) + '%');
					}
				});


			});
		</script>
	</head>

	<body>
		<div class="page-container">
			<!--/content-inner-->
			<div class="left-content">
				<div class="inner-content">
					<!-- header-starts -->
					<?php include_once('includes/header.php'); ?>

					<!--content-->
					<div class="content">
						<div class="women_main">
							<!-- start content -->
							<div class="grids">
								<div class="panel panel-widget forms-panel">
									<div class="forms">
										<div class="form-grids widget-shadow" data-example-id="basic-forms">
											<div class="form-title">
												<h4>Agregar habitación</h4>
											</div>
											<div class="form-body">

												<form method="post" enctype="multipart/form-data">
													<div class="form-group"> <label for="exampleInputEmail1">Tipo de habitación o categoría:</label> <select type="text" name="roomtype" id="roomtype" value="" class="form-control" required="true">
															<option value="">Seleccione el tipo de habitación</option>
															<?php

															$sql2 = "SELECT * from   tblcategory ";
															$query2 = $dbh->prepare($sql2);
															$query2->execute();
															$result2 = $query2->fetchAll(PDO::FETCH_OBJ);

															foreach ($result2 as $row) {
															?>
																<option value="<?php echo htmlentities($row->ID); ?>"><?php echo htmlentities($row->CategoryName); ?></option>
															<?php } ?>


														</select> </div>
													<div class="form-group"> <label for="exampleInputEmail1">Nombre:</label> <input type="text" class="form-control" name="roomname" value="" required='true'> </div>
													<div class="form-group"> <label for="exampleInputEmail1">Número máximo de adultos:</label> <input type="text" class="form-control" name="maxadult" value="" required='true'> </div>
													<div class="form-group"> <label for="exampleInputEmail1">Número máximo de niños:</label> <input type="text" class="form-control" name="maxchild" value="" required='true'> </div>
													<div class="form-group"> <label for="exampleInputEmail1">Descripción:</label> <textarea type="text" class="form-control" name="roomdes" value=""></textarea> </div>
													<div class="form-group"> <label for="exampleInputEmail1">Número de camas:</label> <input type="text" class="form-control" name="nobed" value="" required='true'> </div>
													<div class="form-group"> <label for="exampleInputEmail1">Precio:</label> <input type="text" class="form-control" name="price" value="" required='true'> </div>
													<div class="form-group"> <label for="exampleInputEmail1">Imagen:</label> <input type="file" class="form-control" name="image" value="" required='true'> </div>
													<div class="form-group"> <label for="exampleInputEmail1">Imagen 1:</label> <input type="file" class="form-control" name="image1" value="" required='true'> </div>
													<div class="form-group"> <label for="exampleInputEmail1">Imagen 2:</label> <input type="file" class="form-control" name="image2" value="" required='true'> </div>
													<div class="form-group"> <label for="exampleInputEmail1">Imagen 3:</label> <input type="file" class="form-control" name="image3" value="" required='true'> </div>
													<div class="form-group"> <label for="exampleInputEmail1">Servicios:</label> <select type="text" name="roomfac[]" id="roomfac" value="" class="form-control" required="true" multiple="multiple">
															<option value="">Seleccione los servicios de la habitación</option>
															<?php


															$sql2 = "SELECT * from   tblfacility ";
															$query2 = $dbh->prepare($sql2);
															$query2->execute();
															$result2 = $query2->fetchAll(PDO::FETCH_OBJ);

															foreach ($result2 as $row) {
															?>
																<option value="<?php echo htmlentities($row->FacilityTitle); ?>"><?php echo htmlentities($row->FacilityTitle); ?></option>
															<?php } ?>


														</select> </div>


													<button type="submit" class="btn btn-default" name="submit">Agregar</button>
												</form>
											</div>
										</div>
									</div>
								</div>


							</div>

							<!-- end content -->

							<?php include_once('includes/footer.php'); ?>
						</div>

					</div>
					<!--content-->
				</div>
			</div>
			<!--//content-inner-->
			<!--/sidebar-menu-->
			<?php include_once('includes/sidebar.php'); ?>
			<div class="clearfix"></div>
		</div>
		<script>
			var toggle = true;

			$(".sidebar-icon").click(function() {
				if (toggle) {
					$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
					$("#menu span").css({
						"position": "absolute"
					});
				} else {
					$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
					setTimeout(function() {
						$("#menu span").css({
							"position": "relative"
						});
					}, 400);
				}

				toggle = !toggle;
			});
		</script>
		<!--js -->
		<script src="js/scripts.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>
		<!-- /Bootstrap Core JavaScript -->
		<!-- real-time -->
		<script language="javascript" type="text/javascript" src="js/jquery.flot.js"></script>
		<script type="text/javascript">
			$(function() {

				// We use an inline data source in the example, usually data would
				// be fetched from a server

				var data = [],
					totalPoints = 300;

				function getRandomData() {

					if (data.length > 0)
						data = data.slice(1);

					// Do a random walk

					while (data.length < totalPoints) {

						var prev = data.length > 0 ? data[data.length - 1] : 50,
							y = prev + Math.random() * 10 - 5;

						if (y < 0) {
							y = 0;
						} else if (y > 100) {
							y = 100;
						}

						data.push(y);
					}

					// Zip the generated y values with the x values

					var res = [];
					for (var i = 0; i < data.length; ++i) {
						res.push([i, data[i]])
					}

					return res;
				}

				// Set up the control widget

				var updateInterval = 30;
				$("#updateInterval").val(updateInterval).change(function() {
					var v = $(this).val();
					if (v && !isNaN(+v)) {
						updateInterval = +v;
						if (updateInterval < 1) {
							updateInterval = 1;
						} else if (updateInterval > 2000) {
							updateInterval = 2000;
						}
						$(this).val("" + updateInterval);
					}
				});

				var plot = $.plot("#placeholder", [getRandomData()], {
					series: {
						shadowSize: 0 // Drawing is faster without shadows
					},
					yaxis: {
						min: 0,
						max: 100
					},
					xaxis: {
						show: false
					}
				});

				function update() {

					plot.setData([getRandomData()]);

					// Since the axes don't change, we don't need to call plot.setupGrid()

					plot.draw();
					setTimeout(update, updateInterval);
				}

				update();

				// Add the Flot version string to the footer

				$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
			});
		</script>
		<!-- /real-time -->
		<script src="js/jquery.fn.gantt.js"></script>
		<script>
			$(function() {

				"use strict";

				$(".gantt").gantt({
					source: [{
						name: "Sprint 0",
						desc: "Analysis",
						values: [{
							from: "/Date(1320192000000)/",
							to: "/Date(1322401600000)/",
							label: "Requirement Gathering",
							customClass: "ganttRed"
						}]
					}, {
						name: " ",
						desc: "Scoping",
						values: [{
							from: "/Date(1322611200000)/",
							to: "/Date(1323302400000)/",
							label: "Scoping",
							customClass: "ganttRed"
						}]
					}, {
						name: "Sprint 1",
						desc: "Development",
						values: [{
							from: "/Date(1323802400000)/",
							to: "/Date(1325685200000)/",
							label: "Development",
							customClass: "ganttGreen"
						}]
					}, {
						name: " ",
						desc: "Showcasing",
						values: [{
							from: "/Date(1325685200000)/",
							to: "/Date(1325695200000)/",
							label: "Showcasing",
							customClass: "ganttBlue"
						}]
					}, {
						name: "Sprint 2",
						desc: "Development",
						values: [{
							from: "/Date(1326785200000)/",
							to: "/Date(1325785200000)/",
							label: "Development",
							customClass: "ganttGreen"
						}]
					}, {
						name: " ",
						desc: "Showcasing",
						values: [{
							from: "/Date(1328785200000)/",
							to: "/Date(1328905200000)/",
							label: "Showcasing",
							customClass: "ganttBlue"
						}]
					}, {
						name: "Release Stage",
						desc: "Training",
						values: [{
							from: "/Date(1330011200000)/",
							to: "/Date(1336611200000)/",
							label: "Training",
							customClass: "ganttOrange"
						}]
					}, {
						name: " ",
						desc: "Deployment",
						values: [{
							from: "/Date(1336611200000)/",
							to: "/Date(1338711200000)/",
							label: "Deployment",
							customClass: "ganttOrange"
						}]
					}, {
						name: " ",
						desc: "Warranty Period",
						values: [{
							from: "/Date(1336611200000)/",
							to: "/Date(1349711200000)/",
							label: "Warranty Period",
							customClass: "ganttOrange"
						}]
					}],
					navigate: "scroll",
					scale: "weeks",
					maxScale: "months",
					minScale: "days",
					itemsPerPage: 10,
					onItemClick: function(data) {
						alert("Item clicked - show some details");
					},
					onAddClick: function(dt, rowId) {
						alert("Empty space clicked - add an item!");
					},
					onRender: function() {
						if (window.console && typeof console.log === "function") {
							console.log("chart rendered");
						}
					}
				});

				$(".gantt").popover({
					selector: ".bar",
					title: "I'm a popover",
					content: "And I'm the content of said popover.",
					trigger: "hover"
				});

				prettyPrint();

			});
		</script>
		<script src="js/menu_jquery.js"></script>
	</body>

	</html><?php }  ?>