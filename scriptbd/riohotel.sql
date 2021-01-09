-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-01-2021 a las 04:40:30
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `riohotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'admin', 5689784592, 'admin@gmail.com', '91f5167c34c400758115c2a6826ec2e3', '2020-02-27 07:25:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblbooking`
--

CREATE TABLE `tblbooking` (
  `ID` int(10) NOT NULL,
  `RoomId` int(5) DEFAULT NULL,
  `UserID` int(5) NOT NULL,
  `CheckinDate` varchar(200) DEFAULT NULL,
  `CheckoutDate` varchar(200) DEFAULT NULL,
  `CantAdult` int(5) DEFAULT NULL,
  `CantChild` int(5) DEFAULT NULL,
  `BookingDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(50) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(10) NOT NULL,
  `CategoryName` varchar(120) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `Date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `CategoryName`, `Description`, `Date`) VALUES
(1, 'Habitación Simple', '', '2020-12-30 03:48:30'),
(2, 'Habitación Doble', '', '2020-12-30 03:48:41'),
(3, 'Habitación Triple', '', '2020-12-30 03:48:50'),
(4, 'Habitación Matrimonial', '', '2020-12-30 03:49:03'),
(5, 'Habitación Superior', '', '2020-12-30 03:49:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int(10) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `MobileNumber` varchar(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `EnquiryDate` timestamp NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblfacility`
--

CREATE TABLE `tblfacility` (
  `ID` int(10) NOT NULL,
  `FacilityTitle` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblfacility`
--

INSERT INTO `tblfacility` (`ID`, `FacilityTitle`, `Description`, `Image`, `CreationDate`) VALUES
(1, 'Atención Personalizada', '', '4dac15c0644edeae3a3ff74e2958bac71607984385.png', '2020-12-14 22:19:45'),
(2, 'Recepción las 24 horas', '', '1c42ca50990b387d68ae9f53b5d8aaf51607985733.png', '2020-12-14 22:42:13'),
(3, 'Habitaciones confortables', '', '757aa8accd2886e22de5c66558ff744f1607986061.png', '2020-12-14 22:47:41'),
(4, 'TV por cable', '', 'cd04de3710efb93386166c79aa342ae01607986665.png', '2020-12-14 22:57:45'),
(5, 'Desayuno Americano', '', '381f2bb97f5cd112f459e6ecc9d531d21607987240.png', '2020-12-14 23:07:20'),
(6, 'Internet-Wifi', '', '3054dba7c0030c691310052e5c410ce01607987284.png', '2020-12-14 23:08:04'),
(7, 'Baño privado', '', '6191551f3b2fffb2a6a2c88655ff26571607987421.png', '2020-12-14 23:10:21'),
(8, 'Teléfono', '', 'a6c410c495389f62e7af918641e4dee81607988265.png', '2020-12-14 23:24:25'),
(9, 'Parqueadero', '', '3c3914c898d3a21bb7a0373d093849b31607988708.png', '2020-12-14 23:31:48'),
(10, 'Agua Caliente', '', '414922d6f3f307496cb49d86b04f84041608004300.png', '2020-12-15 03:51:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(120) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` varchar(25) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'contactus', 'Contáctenos', 'Pichincha 21-56 y 10 de Agosto (esquina)', 'reservas@riohotelecuador.com', '(03) 2968157 - 0939172156', '2021-01-08 15:33:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblroom`
--

CREATE TABLE `tblroom` (
  `ID` int(10) NOT NULL,
  `RoomType` int(10) DEFAULT NULL,
  `RoomName` varchar(200) DEFAULT NULL,
  `MaxAdult` int(5) DEFAULT NULL,
  `MaxChild` int(5) DEFAULT NULL,
  `RoomDesc` mediumtext DEFAULT NULL,
  `NoofBed` int(5) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `Image1` varchar(200) DEFAULT NULL,
  `Image2` varchar(200) DEFAULT NULL,
  `Image3` varchar(200) DEFAULT NULL,
  `RoomFacility` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `Price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblroom`
--

INSERT INTO `tblroom` (`ID`, `RoomType`, `RoomName`, `MaxAdult`, `MaxChild`, `RoomDesc`, `NoofBed`, `Image`, `Image1`, `Image2`, `Image3`, `RoomFacility`, `CreationDate`, `Price`) VALUES
(1, 1, 'Habitación Individual', 1, 0, 'Está equipada con televisor de pantalla plana, Tv Cable, Wi-Fi, teléfono, baño privado, agua caliente, incluye 1 desayuno. Precio total por 1 persona.\r\nApreciado cliente, después de realizar su reserva el hotel se comunicará con usted para confirmar o no la respectiva disponibilidad.', 1, '1780c59c828f67727dd111be38b5bb921609388797.jpg', '9646db3b264e0626b9799b654442bb851609388814.jpg', 'debf377c899755e773f5fb725ba3215c1609388825.jpg', 'aaff5a599dc0b29518af048986bd1e3a1609388835.jpg', 'Atención Personalizada,Recepción las 24 horas,TV por cable,Desayuno Americano,Internet-Wifi,Baño privado,Teléfono,Parqueadero,Agua Caliente', '2020-12-31 00:58:16', 22),
(2, 2, 'Habitación Doble', 2, 0, 'Está equipada con televisor de pantalla plana, Tv Cable, Wi-Fi, teléfono, baño privado, agua caliente, incluye 2 desayunos. Precio total por 2 personas.\r\nApreciado cliente, después de realizar su reserva el hotel se comunicará con usted para confirmar o no la respectiva disponibilidad.', 2, 'c3d5d156e1da74802850b17029e582911609388881.jpg', 'edcecdf2f276b06b0822a3698329e31f1609388898.jpg', 'a029711a38c7da622c04d63e4bad28251609388908.jpg', '1e309443baf22bd233113b4e6f15f1de1609388928.jpg', 'Atención Personalizada,Recepción las 24 horas,TV por cable,Desayuno Americano,Internet-Wifi,Baño privado,Teléfono,Parqueadero,Agua Caliente', '2020-12-31 02:57:55', 39),
(3, 3, 'Habitación Triple', 3, 0, 'Está equipada con televisor de pantalla plana, Tv Cable, Wi-Fi, teléfono, baño privado, agua caliente, incluye 3 desayunos. Precio total por 3 personas.\r\nApreciado cliente, después de realizar su reserva el hotel se comunicará con usted para confirmar o no la respectiva disponibilidad.', 3, 'f99bef74af423255ef83ea281fbbdd8c1609388960.jpg', '236129a82ca778079051d886e6a79fff1609388972.jpg', '3d0f7046ce5eb0bcb88926b2bb2591c01609388988.jpg', '13e7b0a743bd49555e6a56792b7c4a2a1609388999.jpg', 'Atención Personalizada,Recepción las 24 horas,Habitaciones confortables,TV por cable,Desayuno Americano,Internet-Wifi,Baño privado,Teléfono,Parqueadero,Agua Caliente', '2020-12-31 03:00:22', 56),
(4, 4, 'Habitación Matrimonial', 2, 0, 'Está equipada con televisor de pantalla plana, Tv Cable, Wi-Fi, teléfono, baño privado, agua caliente, incluye 2 desayunos. Precio total por 2 personas.\r\nApreciado cliente, después de realizar su reserva el hotel se comunicará con usted para confirmar o no la respectiva disponibilidad.', 1, '4328d439fc8c1a75c36435c1d2e024631609389083.jpg', 'ff03e8e9cd07ef7854293ad54b8abc021609389098.jpg', 'd2ee814788b04fb5d688e0b7bca90db01609389112.jpg', 'ff5e006abaeb767de0b1af7798ab8fb81609389122.jpg', 'Atención Personalizada,Recepción las 24 horas,TV por cable,Desayuno Americano,Internet-Wifi,Baño privado,Teléfono,Parqueadero,Agua Caliente', '2020-12-31 03:05:46', 39),
(5, 5, 'Habitación Superior', 2, 0, 'Está diseñada para su completa comodidad y satisfacción con amplios espacios, dos balcones, está equipada con televisor de pantalla plana, Tv Cable, Wi-Fi, teléfono, baño privado, agua caliente, incluye 2 desayunos. Precio total por 2 personas.\r\nApreciado cliente, después de realizar su reserva el hotel se comunicará con usted para confirmar o no la respectiva disponibilidad.\r\n\r\n', 1, 'cfe9f22b7b3910753ae0d88e7a6a31a21609389139.jpg', 'b229eecdb45ae68092f95ca2fd197a691609389148.jpg', '2344ea9516441e816be4c49d97cdc1681609389157.jpg', '8db39aaf1853c1a9399f445559e17dbc1609389166.jpg', 'Atención Personalizada,Recepción las 24 horas,TV por cable,Desayuno Americano,Internet-Wifi,Baño privado,Teléfono,Parqueadero,Agua Caliente', '2020-12-31 03:08:10', 61);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblslider`
--

CREATE TABLE `tblslider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `folder` varchar(255) DEFAULT NULL,
  `src` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblslider`
--

INSERT INTO `tblslider` (`id`, `title`, `folder`, `src`, `created_at`) VALUES
(1, 'Confort y Servicio', 'uploads/', 'sl_05.jpg', '2020-12-13 17:59:48'),
(2, 'Servicio Incomparable', 'uploads/', 'sl_06.jpg', '2020-12-13 18:00:35'),
(3, 'Recepción las 24 horas', 'uploads/', 'sl_08.jpg', '2020-12-13 18:00:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltestimony`
--

CREATE TABLE `tbltestimony` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Testimony` mediumtext NOT NULL,
  `Date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbltestimony`
--

INSERT INTO `tbltestimony` (`ID`, `Name`, `Testimony`, `Date`) VALUES
(1, 'Edison Ramirez', 'El hotel es muy bonito, de aspecto colonial, el personal muy atento, y la ubicación espectacular, todo está cerca, como los parques y la parada del tren, precio muy conveniente, de seguro regresaré cuando viaje a Riobamba.', '2020-04-01 02:35:00'),
(2, 'Marcela C.', 'Las personas que nos atendieron lo hicieron de forma amigable colaborándonos y dando solución a nuestras peticiones.\r\nEl hotel muy bien ubicado, lindas instalaciones, limpias y cómodas.\r\nCon agua caliente, ventilación.', '2020-04-02 03:14:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `MobileNumber` varchar(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indices de la tabla `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tblfacility`
--
ALTER TABLE `tblfacility`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tblroom`
--
ALTER TABLE `tblroom`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `RoomType` (`RoomType`);

--
-- Indices de la tabla `tblslider`
--
ALTER TABLE `tblslider`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbltestimony`
--
ALTER TABLE `tbltestimony`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tblfacility`
--
ALTER TABLE `tblfacility`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tblroom`
--
ALTER TABLE `tblroom`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tblslider`
--
ALTER TABLE `tblslider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tbltestimony`
--
ALTER TABLE `tbltestimony`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
