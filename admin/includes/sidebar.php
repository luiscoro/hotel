    <div class="sidebar-menu" style="background-color: #180A01">
      <header class="logo1">
        <span style="color:#000; font-size:26px; font-weight:bold"></span>
        <a href="#" class="sidebar-icon"><span class="fa fa-bars"></span> </a>
      </header>
      <div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
      <div class="menu">
        <?php
        $sql = "SELECT * from tblabout";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        $cnt = 1;
        if ($query->rowCount() > 0) {
          foreach ($results as $row) {               ?>
            <div class="logoHotel">
              <img src="images/<?php echo $row->Logo; ?>" style="width:100px; height:100px;margin-left:3.5em">
            </div>
        <?php $cnt = $cnt + 1;
          }
        } ?>
        <ul id="menu">
          <li><a href="dashboard.php"><i class="fa fa-tachometer"></i> <span>Inicio</span></a></li>

          <li id="menu-academico"><a href="#"><i class="fa fa-picture-o"></i> <span>Carrusel</span> <span class="fa fa-angle-right" style="float: right"></span></a>
            <ul id="menu-academico-sub">
              <li id="menu-academico-avaliacoes"><a href="add-slider.php">Agregar slider</a></li>
              <li id="menu-academico-avaliacoes"><a href="manage-slider.php">Gestionar slider</a></li>
            </ul>
          </li>

          <li id="menu-academico"><a href="#"><i class="fa fa-table"></i> <span>Categorías</span> <span class="fa fa-angle-right" style="float: right"></span></a>
            <ul id="menu-academico-sub">
              <li id="menu-academico-avaliacoes"><a href="add-category.php">Agregar categoría</a></li>
              <li id="menu-academico-avaliacoes"><a href="manage-category.php">Gestionar categoría</a></li>
            </ul>
          </li>

          <li id="menu-academico"><a href="#"><i class="lnr lnr-pencil"></i> <span>Habitaciones</span> <span class="fa fa-angle-right" style="float: right"></span></a>
            <ul id="menu-academico-sub">
              <li id="menu-academico-avaliacoes"><a href="add-room.php">Agregar habitación</a></li>
              <li id="menu-academico-boletim"><a href="manage-room.php">Gestionar habitación</a></li>

            </ul>
          </li>

          <li id="menu-academico"><a href="#"><i class="lnr lnr-layers"></i> <span>Servicios</span> <span class="fa fa-angle-right" style="float: right"></span></a>
            <ul id="menu-academico-sub">
              <li id="menu-academico-avaliacoes"><a href="add-facility.php">Agregar servicio</a></li>
              <li id="menu-academico-boletim"><a href="manage-facility.php">Gestionar servicio</a></li>

            </ul>
          </li>

          <li id="menu-academico"><a href="#"><i class="lnr lnr-book"></i> <span>Reservas</span> <span class="fa fa-angle-right" style="float: right"></span></a>
            <ul id="menu-academico-sub">
              <li id="menu-academico-avaliacoes"><a href="all-booking.php">Todas las reservas</a></li>
              <li id="menu-academico-boletim"><a href="new-booking.php">Reservas pendientes</a></li>
              <li id="menu-academico-boletim"><a href="approved-booking.php">Reservas aprobadas</a></li>
              <li id="menu-academico-boletim"><a href="cancelled-booking.php">Reservas canceladas</a></li>

            </ul>
          </li>

          <li id="menu-academico"><a href="#"><i class="lnr lnr-book"></i> <span>Contenido</span> <span class="fa fa-angle-right" style="float: right"></span></a>
            <ul id="menu-academico-sub">
              <li id="menu-academico-avaliacoes"><a href="rating.php">Información calificaciones</a></li>
              <li id="menu-academico-boletim"><a href="manage-main.php">Información portadas</a></li>
              <li id="menu-academico-boletim"><a href="about.php">Información principal</a></li>
              <li id="menu-academico-boletim"><a href="contactus.php">Información de contacto</a></li>

            </ul>
          </li>

          <li id="menu-academico"><a href="#"><i class="fa fa-picture-o"></i> <span>Galería</span> <span class="fa fa-angle-right" style="float: right"></span></a>
            <ul id="menu-academico-sub">
              <li id="menu-academico-avaliacoes"><a href="add-gallery.php">Agregar imagen a galería de habitaciones</a></li>
              <li id="menu-academico-avaliacoes"><a href="manage-gallery.php">Gestionar galería de habitaciones</a></li>
              <li id="menu-academico-avaliacoes"><a href="add-galleryh.php">Agregar imagen a galería de hotel</a></li>
              <li id="menu-academico-avaliacoes"><a href="manage-galleryh.php">Gestionar galería de hotel</a></li>
            </ul>
          </li>
          <li id="menu-academico"><a href="#"><i class="lnr lnr-book"></i> <span>Consultas de usuarios</span> <span class="fa fa-angle-right" style="float: right"></span></a>
            <ul id="menu-academico-sub">
              <li id="menu-academico-avaliacoes"><a href="read-enquiry.php">Leer consulta</a></li>
              <li id="menu-academico-boletim"><a href="unread-enquiry.php">Consulta no leída</a></li>

            </ul>
          </li>
          <li id="menu-academico"><a href="#"><i class="fa fa-file-text-o"></i> <span>Buscar</span> <span class="fa fa-angle-right" style="float: right"></span></a>
            <ul id="menu-academico-sub">
              <li id="menu-academico-avaliacoes"><a href="search-enquiry.php">Buscar consulta</a></li>
              <li id="menu-academico-boletim"><a href="search-booking.php">Buscar reserva</a></li>

            </ul>
          </li>


          <li id="menu-academico"><a href="#"><i class="lnr lnr-layers"></i> <span>Reportes</span> <span class="fa fa-angle-right" style="float: right"></span></a>
            <ul id="menu-academico-sub">
              <li id="menu-academico-avaliacoes"><a href="enquiry-betdates-reports.php">Reporte consultas</a></li>
              <li id="menu-academico-boletim"><a href="booking-betdates-reports.php">Reporte reservas</a></li>

            </ul>
          </li>

        </ul>
      </div>
    </div>