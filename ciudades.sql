-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2017 a las 18:36:48
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id3642959_ciudadesgcr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbciudades`
--

CREATE TABLE `tbciudades` (
  `id` int(3) NOT NULL,
  `Ciudad` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Descripcion` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `Activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbciudades`
--

INSERT INTO `tbciudades` (`id`, `Ciudad`, `Descripcion`, `Activo`) VALUES
(1, 'Puertollano ( C.Real)', 'Puertollano se ubica en la parte central de la provincia de Ciudad Real, a 37 km de la capital provincial, Ciudad Real. Las coordenadas del municipio son 38°41′07″N y 4°06′40″O2​ Dentro del término municipal se encuentra también la pedanía de El Villar.3​ Antes llamada Puertoplano, se encuentra situada en la entrada natural más accesible del valle del río Ojailén, en el borde de Sierra Morena. Está situado entre dos cerros, el de San Sebastián (800 m) y Santa Ana (900 m). Los primeros puertollaneros fueron combatientes de la batalla de Navas de Tolosa que se establecieron en esas tierras ganadas a los sarracenos; Puertollano surgió alrededor de una iglesia no muy grande de estilo románico-gótico, situada en el centro de la villa, sobre un altozano, creándose las siguientes calles: Comendador, Duque, Santa Bárbara, Iglesia, Hospital, Tercia, Palacio y Bajada del Pilar.', 1),
(2, 'Madrid', 'Madrid es un municipio y ciudad de España. La localidad, con categoría histórica de villa,8​ es la capital del Estado9​ y de la Comunidad de Madrid. También conocida como la Villa y Corte, es la ciudad más poblada del país, con 3 165 541 habitantes empadronados según datos del INE de 2016 mientras que, con la inclusión de su área metropolitana10​ la cifra de población asciende a 6 543 031 habitantes,10​ siendo así la tercera o cuarta área metropolitana de la Unión Europea, según la fuente, por detrás de las de París y Londres, y en algunas fuentes detrás también de la Región del Ruhr, así como la tercera ciudad más poblada de la Unión Europea, por detrás de Berlín y Londres.11​12​13​14​ Madrid ocupa el puesto nº 38 en la lista Economist Intelligence Unit de ciudades con mejor calidad de vida del mundo.15​\r\n\r\nLa ciudad cuenta con un PIB Nominal de 227.411 millones USD y un pib per capita nominal de 34.425 USD, lo que representa un PIB PPA per Capita de 40.720 ,16​ siendo la 1era Area Metropolitana española en actividad económica, la novena de Europa detras de: Londres, París, Rin-Ruhr, Amsterdam, Milán, Bruselas, Moscú, Frankfurt y Munich. Madrid es también la ciudad española más visitada.17​\r\n\r\n\r\n', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbimagenes`
--

CREATE TABLE `tbimagenes` (
  `id` int(3) NOT NULL,
  `imagen` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `idciudad` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbimagenes`
--

INSERT INTO `tbimagenes` (`id`, `imagen`, `idciudad`) VALUES
(1, 'uploads/1_puertollano_01.jpg', 1),
(2, 'uploads/2_puertollano_02.jpg', 1),
(3, 'uploads/3_puertollano_03.jpg', 1),
(4, 'uploads/4_madrid_01.jpg', 2),
(5, 'uploads/5_madrid_02.jpg', 2),
(6, 'uploads/6_madrid_03.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbusuario`
--

CREATE TABLE `tbusuario` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Apellido` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Usuario` varchar(8) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Clave` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbusuario`
--

INSERT INTO `tbusuario` (`id`, `Nombre`, `Apellido`, `Usuario`, `Clave`) VALUES
(2, 'German', 'Canales', 'roki', '83691715fdc5baf20ed0742b0b85785b'),
(4, 'paplo', 'pablo', 'pablo', '7e4b64eb65e34fdfad79e623c44abd94');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbciudades`
--
ALTER TABLE `tbciudades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbimagenes`
--
ALTER TABLE `tbimagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Usuario` (`Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbciudades`
--
ALTER TABLE `tbciudades`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbimagenes`
--
ALTER TABLE `tbimagenes`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
