-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 08, 2024 at 04:57 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuponerabd`
--

-- --------------------------------------------------------

--
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
CREATE TABLE IF NOT EXISTS `carrito` (
  `ID_carrito` int NOT NULL AUTO_INCREMENT,
  `ID_usuario` int NOT NULL,
  `ID_cupon` int NOT NULL,
  `cantidad` int NOT NULL,
  PRIMARY KEY (`ID_carrito`),
  KEY `FK_ID_usuario` (`ID_usuario`),
  KEY `FK_ID_cupon` (`ID_cupon`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `ID_categoria` int NOT NULL AUTO_INCREMENT,
  `Categoria` varchar(25) NOT NULL,
  PRIMARY KEY (`ID_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`ID_categoria`, `Categoria`) VALUES
(1, 'Comida'),
(2, 'Alojamiento'),
(3, 'Servicios'),
(4, 'Otros');

-- --------------------------------------------------------

--
-- Table structure for table `codigos_emitidos`
--

DROP TABLE IF EXISTS `codigos_emitidos`;
CREATE TABLE IF NOT EXISTS `codigos_emitidos` (
  `ID_codigo` int NOT NULL AUTO_INCREMENT,
  `FK_factura` int NOT NULL,
  `FK_cupon` int NOT NULL,
  `Codigo` varchar(25) NOT NULL,
  PRIMARY KEY (`ID_codigo`),
  KEY `FK_factura` (`FK_factura`),
  KEY `FK_cupon` (`FK_cupon`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `codigos_emitidos`
--

INSERT INTO `codigos_emitidos` (`ID_codigo`, `FK_factura`, `FK_cupon`, `Codigo`) VALUES
(1, 1, 2, '666483a5e0913'),
(2, 2, 2, '66648482cebad'),
(3, 4, 2, '666486e7a1574'),
(4, 5, 2, '6664898a9013f'),
(5, 6, 2, '66648c63da071'),
(6, 6, 3, '66648c63db094');

-- --------------------------------------------------------

--
-- Table structure for table `cupones`
--

DROP TABLE IF EXISTS `cupones`;
CREATE TABLE IF NOT EXISTS `cupones` (
  `ID_cupon` int NOT NULL AUTO_INCREMENT,
  `FK_empresa` int NOT NULL,
  `Titulo_cupon` varchar(50) NOT NULL,
  `Precio_regular` decimal(5,2) NOT NULL,
  `Precio_oferta` decimal(5,2) NOT NULL,
  `Fecha_inicio_oferta` date NOT NULL,
  `Fecha_fin_oferta` date NOT NULL,
  `Fecha_limite_canje` date NOT NULL,
  `Cantidad_cupones` int DEFAULT NULL,
  `Descripcion` varchar(150) NOT NULL,
  `Imagen` varchar(250) NOT NULL,
  `FK_categoria` int NOT NULL,
  `FK_estado_oferta` int NOT NULL,
  PRIMARY KEY (`ID_cupon`),
  KEY `FK_empresa` (`FK_empresa`),
  KEY `FK_estado_oferta` (`FK_estado_oferta`),
  KEY `FK_categoria` (`FK_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `cupones`
--

INSERT INTO `cupones` (`ID_cupon`, `FK_empresa`, `Titulo_cupon`, `Precio_regular`, `Precio_oferta`, `Fecha_inicio_oferta`, `Fecha_fin_oferta`, `Fecha_limite_canje`, `Cantidad_cupones`, `Descripcion`, `Imagen`, `FK_categoria`, `FK_estado_oferta`) VALUES
(1, 2, 'Promo Junio', 25.00, 20.00, '2024-06-07', '2024-06-15', '2024-06-15', 5, ' test de cupon dollarcity sv', '../Imagenes/WhatsApp Image 2022-09-28 at 7.00.17 PM.jpeg', 4, 1),
(2, 2, 'Promo dc', 15.00, 10.00, '2024-06-08', '2024-06-30', '2024-06-30', 0, ' promo testing', '../Imagenes/Ninten_Front.png', 1, 1),
(3, 2, '30% off alojamiento', 125.00, 100.00, '2024-06-08', '2024-06-30', '2024-06-30', 4, ' Prueba de cupon alojamiento', '../Imagenes/alojamiento.jpg', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `ID_empresa` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `NIT` varchar(18) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Telefono` int NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Usuario` varchar(25) NOT NULL,
  `Contrasena` varchar(250) NOT NULL,
  `FK_estado_aprobacion` int NOT NULL,
  `Comision` int NOT NULL,
  PRIMARY KEY (`ID_empresa`),
  KEY `FK_estado_aprobacion` (`FK_estado_aprobacion`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`ID_empresa`, `Nombre`, `NIT`, `Direccion`, `Telefono`, `Email`, `Usuario`, `Contrasena`, `FK_estado_aprobacion`, `Comision`) VALUES
(1, 'Apple', '1111-111111-111-1', 'Cupertino', 22101587, 'apple@apple.com', 'Apple', '$2y$10$0gGo/5RZymMBQes25zYuPud37wMLpY4mL/nDbnBfwjuIxr7fciBdW', 2, 5),
(2, 'Dollarcity', '0614-240795-101-9', 'Text', 75757575, 'ronald@dollarcity.com', 'ronald-dc', '$2y$10$Qxb8qO62WaMfdOjiLDp07euZQzyTQOW1qvLq4rIN6FjWhSR6Wzqve', 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `estado_aprobacion`
--

DROP TABLE IF EXISTS `estado_aprobacion`;
CREATE TABLE IF NOT EXISTS `estado_aprobacion` (
  `ID_estado_aprobacion` int NOT NULL AUTO_INCREMENT,
  `Estado_aprobacion` varchar(25) NOT NULL,
  PRIMARY KEY (`ID_estado_aprobacion`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `estado_aprobacion`
--

INSERT INTO `estado_aprobacion` (`ID_estado_aprobacion`, `Estado_aprobacion`) VALUES
(1, 'Pendiente'),
(2, 'Aprobado'),
(3, 'Desaprobado');

-- --------------------------------------------------------

--
-- Table structure for table `estado_cupon`
--

DROP TABLE IF EXISTS `estado_cupon`;
CREATE TABLE IF NOT EXISTS `estado_cupon` (
  `ID_estado` int NOT NULL AUTO_INCREMENT,
  `Estado` varchar(15) NOT NULL,
  PRIMARY KEY (`ID_estado`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `estado_cupon`
--

INSERT INTO `estado_cupon` (`ID_estado`, `Estado`) VALUES
(1, 'Disponible'),
(2, 'No disponible');

-- --------------------------------------------------------

--
-- Table structure for table `facturas`
--

DROP TABLE IF EXISTS `facturas`;
CREATE TABLE IF NOT EXISTS `facturas` (
  `ID_factura` int NOT NULL AUTO_INCREMENT,
  `FK_usuario` int NOT NULL,
  `Fecha_compra` date NOT NULL,
  `Monto` decimal(5,2) NOT NULL,
  PRIMARY KEY (`ID_factura`),
  KEY `FK_usuario` (`FK_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `facturas`
--

INSERT INTO `facturas` (`ID_factura`, `FK_usuario`, `Fecha_compra`, `Monto`) VALUES
(1, 3, '2024-06-08', 1.00),
(2, 3, '2024-06-08', 1.00),
(3, 3, '2024-06-08', 0.00),
(4, 3, '2024-06-08', 1.00),
(5, 3, '2024-06-08', 1.00),
(6, 3, '2024-06-08', 1.00);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `ID_rol` int NOT NULL AUTO_INCREMENT,
  `Rol` varchar(25) NOT NULL,
  PRIMARY KEY (`ID_rol`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`ID_rol`, `Rol`) VALUES
(1, 'Usuario'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID_usuario` int NOT NULL AUTO_INCREMENT,
  `Nombres` varchar(25) NOT NULL,
  `Apellidos` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Usuario` varchar(25) NOT NULL,
  `Contrasena` varchar(250) NOT NULL,
  `DUI` varchar(10) NOT NULL,
  `Fecha_nacimiento` date NOT NULL,
  `FK_rol` int NOT NULL,
  PRIMARY KEY (`ID_usuario`),
  KEY `FK_rol` (`FK_rol`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`ID_usuario`, `Nombres`, `Apellidos`, `Email`, `Usuario`, `Contrasena`, `DUI`, `Fecha_nacimiento`, `FK_rol`) VALUES
(1, 'Admin', 'Admin', 'Admin@admin.com', 'Admin', '$2y$10$kEZEcwiqOunK/.CItPePl.7CKCvog0lW422SHTOVmAWS15HCdM5WO', '00000000-0', '2001-01-01', 2),
(2, 'Usuario', 'Usuario', 'Usuario@usuario.com', 'Usuario', '$2y$10$lPifSWjXifXarQp71/FNLePyjWGcrrAvrqH3crgmAnTdhrGGP2cJ6', '11111111-1', '2002-02-02', 1),
(3, 'Ronald Ernesto', 'Renderos Ramos', 'ronald@mail.com', 'ronald-user', '$2y$10$JxkQYgsTYAoZ8BZunI4cb.jBpG/9wDMhfJXwMSB25VqpcSj4hDzQK', '0557788995', '1997-05-24', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
