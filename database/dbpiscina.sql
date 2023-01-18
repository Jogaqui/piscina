-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-08-2022 a las 21:40:33
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13
drop database if exists dbpiscina;
create database dbpiscina;
use dbpiscina;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbpiscina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `idalumno` int(11) NOT NULL,
  `dni` char(11) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `edad` int(11) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `telefono` char(9) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `tipocliente` varchar(15) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`idalumno`, `dni`, `nombres`, `apellidos`, `edad`, `direccion`, `telefono`, `sexo`, `tipo`, `tipocliente`, `estado`) VALUES
(1, '08199506', 'DORIS HILDA', 'DELGADO PEREZ', 32, 'JR MANUEL PARDO 584 CDR:5 MZ :31 UR :BAR', '976454547', 'Femenino', 'Externo', 'Cliente', 1),
(2, '08199506', 'ZULLY LUZ', 'ACOSTA EVANGELISTA', 21, 'NT MURCIA CDR:16 MZ :64 MDO', '964535458', 'Femenino', 'Interno', 'Cliente', 1),
(3, '10305360', 'ENRIQUE JAVIER', 'CASTILLO DURANTE', 18, 'NT BELISARIO SUAREZ MZ :G LT :4 CV :CIUD', '974314454', 'Masculino', 'Externo', 'Cliente', 1),
(4, '07135002', 'RUDI AMALIA', 'LOLI PONCE', 12, 'CL SAN IGNACIO 340 ND :CERCADO REF:(LARE', '940382320', 'Femenino', 'Interno', 'Cliente', 1),
(5, '20147170212', 'COLEGIO DE INGENIEROS DEL PERU CDLL', '', 0, 'Francisco Borja 250 Urb, Trujillo 13008', '044340010', '', 'Externo', 'Empresa', 1),
(6, '10043049', 'MASCARO SANCHEZ', 'PEDRO ARNALDO', 32, 'AV Pumacahua 1348 Zn. Zn Cercado El P', '950328402', 'Masculino', 'Externo', 'Cliente', 1),
(7, '06060129', 'RONCEROS MEDRANO', 'SERGIO GERARDO', 32, 'PJ TUPAC AMARU 2 CDR:0 MZ :8 LT :6B PI :', '950422323', 'Masculino', 'Interno', 'Cliente', 1),
(8, '07021680', 'PANDO ALVAREZ', 'ROSA MARIA', 18, 'CL Julio C. Tello 499 Urb. Ur Urb Chimu', '930455232', 'Femenino', 'Externo', 'Cliente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `idcargo` int(11) NOT NULL,
  `cargo` varchar(40) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`idcargo`, `cargo`, `estado`) VALUES
(1, 'Director de Academia', 1),
(2, 'Docente', 1),
(3, 'Administrativo', 1),
(4, 'Preparador Fisico', 1),
(5, 'Mantenimiento y Limpieza', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `iddescuento` int(11) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `montod` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias`
--

CREATE TABLE `dias` (
  `iddia` int(11) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `idhorario` int(11) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `iddia` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `montos`
--

CREATE TABLE `montos` (
  `idmonto` int(11) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `fechainicio` date NOT NULL,
  `fechafin` date NOT NULL,
  `tipo` char(1) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `idnivel` int(11) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `idpersonal` int(11) NOT NULL,
  `dni` char(8) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `telefono` char(9) NOT NULL,
  `idcargo` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`idpersonal`, `dni`, `nombres`, `apellidos`, `direccion`, `telefono`, `idcargo`, `estado`) VALUES
(1, '75711240', 'Jose Manuel', 'Vargas Gonzales', 'Alameda 158', '987452163', 1, 1),
(2, '08099742', 'DAVILA FREDDY ROYNALL', 'VALDIVIA FERNANDEZ', 'PJ Jaime Balmes 1 Int. Puesto 24 3306 02', '44219778', 3, 1),
(3, '08003003', 'PEDRO GUSTAVO ', 'VALDIVIA FERNANDEZ', 'JR Jose De La Riva Aguero 751 ', '934834334', 2, 1),
(4, '08099742', 'BETTY DELFINA', 'VELIZ LAZO', 'CL Llanos Zapata 565 Urb. Ur Urb Chimu', '940230232', 5, 1),
(5, '06142305', 'EDUARDO AUGUSTO ', 'VERASTEGUI LARA ', 'D 209 Urb. Mdo Hermelinda', '93029232', 2, 1),
(6, '08099742', 'RAUL CESAR ', 'ALEGRIA GUERRERO', 'Mz. 21 Lt. 13 Urb. Santa Veronica Sector', '983403432', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piscinas`
--

CREATE TABLE `piscinas` (
  `idpiscina` int(11) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programaciones`
--

CREATE TABLE `programaciones` (
  `idprogramacion` int(11) NOT NULL,
  `idpiscina` int(11) NOT NULL,
  `idnivel` int(11) NOT NULL,
  `idhorario` int(11) NOT NULL,
  `idpersonal` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`idalumno`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`idcargo`);

--
-- Indices de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`iddescuento`);

--
-- Indices de la tabla `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`iddia`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`idhorario`),
  ADD KEY `idia` (`iddia`);

--
-- Indices de la tabla `montos`
--
ALTER TABLE `montos`
  ADD PRIMARY KEY (`idmonto`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`idnivel`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`idpersonal`),
  ADD KEY `idcargo` (`idcargo`);

--
-- Indices de la tabla `piscinas`
--
ALTER TABLE `piscinas`
  ADD PRIMARY KEY (`idpiscina`);

--
-- Indices de la tabla `programaciones`
--
ALTER TABLE `programaciones`
  ADD PRIMARY KEY (`idprogramacion`),
  ADD KEY `idpiscina` (`idpiscina`),
  ADD KEY `idnivel` (`idnivel`),
  ADD KEY `idpersonal` (`idpersonal`),
  ADD KEY `idhorario` (`idhorario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `idalumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `idcargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  MODIFY `iddescuento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dias`
--
ALTER TABLE `dias`
  MODIFY `iddia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `idhorario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `montos`
--
ALTER TABLE `montos`
  MODIFY `idmonto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `idnivel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `idpersonal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `piscinas`
--
ALTER TABLE `piscinas`
  MODIFY `idpiscina` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `programaciones`
--
ALTER TABLE `programaciones`
  MODIFY `idprogramacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `idia` FOREIGN KEY (`iddia`) REFERENCES `dias` (`iddia`);

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `idcargo` FOREIGN KEY (`idcargo`) REFERENCES `cargos` (`idcargo`);

--
-- Filtros para la tabla `programaciones`
--
ALTER TABLE `programaciones`
  ADD CONSTRAINT `idhorario` FOREIGN KEY (`idhorario`) REFERENCES `horarios` (`idhorario`),
  ADD CONSTRAINT `idnivel` FOREIGN KEY (`idnivel`) REFERENCES `niveles` (`idnivel`),
  ADD CONSTRAINT `idpersonal` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`idpersonal`),
  ADD CONSTRAINT `idpiscina` FOREIGN KEY (`idpiscina`) REFERENCES `piscinas` (`idpiscina`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
