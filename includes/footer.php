<!-- Main Footer Area -->
<div class="main-footer-area">
	<div class="container">
		<div class="row align-items-baseline justify-content-between">
			<!-- Single Footer Widget Area -->
			<div class="col-12 col-sm-6 col-lg-4">
				<?php
				$sql = "SELECT * from tblpage where PageType='contactus'";
				$query = $dbh->prepare($sql);
				$query->execute();
				$results = $query->fetchAll(PDO::FETCH_OBJ);

				$cnt = 1;
				if ($query->rowCount() > 0) {
					foreach ($results as $row) {               ?>
						<div class="single-footer-widget mb-80">
							<!-- Widget Title -->
							<h5 class="widget-title"><?php echo htmlentities($row->PageTitle); ?></h5>
							<i class="fa fa-envelope-o" style="font-size:24px;color: #F1E398"></i><span><?php echo htmlentities($row->Email); ?></span>
							<i class="fa fa-phone" style="font-size:24px;color: #F1E398"></i><span><?php echo htmlentities($row->MobileNumber); ?></span>
							<i class="fa fa-map-marker" style="font-size:24px;color: #F1E398"></i><span><?php echo htmlentities($row->PageDescription); ?></span>
							<a href="signin.php" style="font-size:14px;color: #f1e398;">Acceder</a>
						</div>
				<?php $cnt = $cnt + 1;
					}
				} ?>
			</div>

			<!-- Single Footer Widget Area -->
			<div class="col-12 col-sm-6 col-lg-4">
				<?php
				$sql = "SELECT * from tblabout";
				$query = $dbh->prepare($sql);
				$query->execute();
				$results = $query->fetchAll(PDO::FETCH_OBJ);

				$cnt = 1;
				if ($query->rowCount() > 0) {
					foreach ($results as $row) {               ?>
						<div class="single-footer-widget mb-80">
							<!-- Footer Logo -->
							<br>
							<a href="./" class="footer-logo" style="text-align:center"><img src="admin/images/<?php echo $row->Logo; ?>" width="140" height="175" alt=""></a>
							<!-- Widget Title -->
							<h5 class="widget-title" style="text-align:center"><?php echo htmlentities($row->Title5); ?></h5>
						</div>
				<?php $cnt = $cnt + 1;
					}
				} ?>
			</div>

			<!-- Single Footer Widget Area -->
			<div class="col-12 col-sm-6 col-lg-4">
				<div class="single-footer-widget mb-80">
					<!-- Widget Title -->
					<h5 class="widget-title">Ubicación</h5>
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3988.1217843724467!2d-78.652099!3d-1.670929!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d3a8260ef8fbb3%3A0xb1830cc2887b881a!2s10%20de%20Agosto%20%26%20Pichincha%2C%20Riobamba!5e0!3m2!1ses-419!2sec!4v1607618428161!5m2!1ses-419!2sec" width="300" height="155" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Copywrite Area -->
<div class="container">
	<div class="copywrite-content">
		<div class="row align-items-center">
			<div class="col-12 col-md-8">
				<!-- Copywrite Text -->
				<div class="copywrite-text">
					<p>
						Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script> Todos los derechos reservados | Rio Hotel</a>
					</p>
				</div>
			</div>
			<div class="col-12 col-md-4">
				<!-- Social Info -->
				<?php
				$sql = "SELECT * from tblpage where PageType='contactus'";
				$query = $dbh->prepare($sql);
				$query->execute();
				$results = $query->fetchAll(PDO::FETCH_OBJ);

				$cnt = 1;
				if ($query->rowCount() > 0) {
					foreach ($results as $row) {               ?>
						<div class="social-info">
							<a href="<?php echo htmlentities($row->Facebook); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="<?php echo htmlentities($row->Twitter); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							<a href="<?php echo htmlentities($row->Instagram); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						</div>
				<?php $cnt = $cnt + 1;
					}
				} ?>
			</div>
		</div>
	</div>
</div>