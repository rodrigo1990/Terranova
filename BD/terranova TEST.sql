-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-02-2020 a las 23:02:03
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `terranova`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicas`
--

CREATE TABLE `caracteristicas` (
  `id` int(10) UNSIGNED NOT NULL,
  `proyecto_id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `caracteristicas`
--

INSERT INTO `caracteristicas` (`id`, `proyecto_id`, `descripcion`) VALUES
(13, 10, 'Cantidad de lotes: 210 lotes'),
(14, 10, 'Superficie promedio: 200 mts'),
(15, 10, 'Barrio abierto'),
(16, 11, 'Cantidad de lotes: 312 lotes'),
(17, 11, 'Superficie promedio: 375 mts'),
(18, 11, 'Posesión inmediata'),
(19, 11, 'Escritura'),
(20, 11, 'Barrio privado'),
(21, 12, 'Cantidad de lotes: 86'),
(22, 12, 'Superficie promedio: 1500 mts'),
(23, 13, 'Cantidad de lotes: 38'),
(24, 13, 'Superficie promedio: 2000 mts'),
(25, 14, 'Cantidad de lotes: 46'),
(26, 14, 'Superficie promedio: 1100 mts'),
(27, 14, 'Escriturado'),
(28, 15, 'Cantidad de lotes: 34 lotes'),
(29, 15, 'Superficie promedio: 630 mts'),
(30, 15, 'Barrio abierto'),
(31, 15, 'Posesión inmediata'),
(32, 15, 'Escritura inmediata'),
(33, 16, 'Cantidad de lotes: 214 lotes'),
(34, 16, 'Superficie promedio: 1500 -2200 mts'),
(35, 16, 'Barrio abierto'),
(36, 17, 'Cantidad de lotes: 697 lotes'),
(37, 17, 'Superficie promedio: 375 mts'),
(38, 17, 'Barrio abierto'),
(39, 18, 'Cantidad de lotes: 677 lotes'),
(40, 18, 'Superficie promedio: 200 mts'),
(41, 18, 'Barrio abierto'),
(42, 19, 'Cantidad de lotes: 96 lotes'),
(43, 19, 'Superficie promedio: 300 mts'),
(44, 19, 'Barrio abierto'),
(45, 20, 'Cantidad de lotes: 278 lotes'),
(46, 20, 'Superficie promedio: 200 mts'),
(47, 20, 'Barrio abierto'),
(48, 21, 'Cantidad de lotes: 220 lotes'),
(49, 21, 'Superficie promedio: 200 mts'),
(50, 21, 'Barrio abierto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `descripcion`) VALUES
(1, 'PRÓXIMOS LANZAMIENTOS'),
(2, 'ÚLTIMOS LOTES'),
(3, 'TERMINADOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img_novedad`
--

CREATE TABLE `img_novedad` (
  `id` int(10) UNSIGNED NOT NULL,
  `ruta` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `novedad_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img_proyecto`
--

CREATE TABLE `img_proyecto` (
  `id` int(10) UNSIGNED NOT NULL,
  `ruta` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proyecto_id` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `img_proyecto`
--

INSERT INTO `img_proyecto` (`id`, `ruta`, `nombre`, `proyecto_id`, `tipo`, `order`) VALUES
(39, '22188815.jpeg', 'San Alejo-1.jpg', 10, 'PRESENTACION', NULL),
(40, '46675942.jpeg', 'San Alejo-2.jpg', 10, 'SLIDE', 0),
(41, '97742971.jpeg', 'San Alejo-3.jpg', 10, 'SLIDE', 1),
(42, '73907663.jpeg', 'San Alejo-5.jpg', 10, 'SLIDE', 2),
(43, '13883239.jpeg', 'San Alejo-4.jpg', 10, 'SLIDE', 3),
(44, '66160729.jpeg', 'San Alejo-6.jpg', 10, 'SLIDE', 4),
(45, '82843645.jpeg', 'San Alejo-7.jpg', 10, 'SLIDE', 5),
(46, '27447309.jpeg', 'San Alejo-8.jpg', 10, 'SLIDE', 6),
(47, '68087932.jpeg', 'San Alejo-9.jpg', 10, 'SLIDE', 7),
(48, '42024388.jpeg', 'San Alejo-10.jpg', 10, 'SLIDE', 8),
(49, '85504059.jpeg', 'El Aljibe-7.jpg', 11, 'PRESENTACION', NULL),
(50, '14160748.jpeg', 'El Aljibe-1.jpg', 11, 'SLIDE', 0),
(51, '24274112.jpeg', 'El Aljibe-2.jpg', 11, 'SLIDE', 1),
(52, '977974.jpeg', 'El Aljibe-3.jpg', 11, 'SLIDE', 2),
(53, '74178446.jpeg', 'El Aljibe-4.jpg', 11, 'SLIDE', 3),
(54, '34999181.jpeg', 'El Aljibe-5.jpg', 11, 'SLIDE', 4),
(55, '31786529.jpeg', 'El Aljibe-6.jpg', 11, 'SLIDE', 5),
(56, '74380306.jpeg', 'El Aljibe-7.jpg', 11, 'SLIDE', 6),
(57, '63604273.jpeg', 'El Aljibe-8.jpg', 11, 'SLIDE', 7),
(58, '20188558.jpeg', 'El Aljibe-9.jpg', 11, 'SLIDE', 8),
(59, '58427161.jpeg', 'El Aljibe-10.jpg', 11, 'SLIDE', 9),
(60, '92745454.jpeg', 'El Aljibe-11.jpg', 11, 'SLIDE', 10),
(61, '74158235.jpeg', 'El Aljibe-12.jpg', 11, 'SLIDE', 11),
(62, '55477887.jpeg', 'Sakura-9.jpg', 12, 'PRESENTACION', NULL),
(63, '17324491.jpeg', 'Sakura-1.jpg', 12, 'SLIDE', 0),
(64, '17413071.jpeg', 'Sakura-2.jpg', 12, 'SLIDE', 1),
(65, '51629351.jpeg', 'Sakura-3.jpg', 12, 'SLIDE', 2),
(66, '29859888.jpeg', 'Sakura-4.jpg', 12, 'SLIDE', 3),
(67, '80700399.jpeg', 'Sakura-9.jpg', 13, 'PRESENTACION', NULL),
(68, '30077822.jpeg', 'Sakura-1.jpg', 13, 'SLIDE', 0),
(69, '17070803.jpeg', 'Sakura-2.jpg', 13, 'SLIDE', 1),
(70, '62141571.jpeg', 'Sakura-3.jpg', 13, 'SLIDE', 2),
(71, '58357530.jpeg', 'Sakura-4.jpg', 13, 'SLIDE', 3),
(72, '79482739.jpeg', 'Sakura-9.jpg', 13, 'SLIDE', 4),
(73, '47408816.jpeg', '7.jpg', 14, 'PRESENTACION', NULL),
(74, '12029587.jpeg', '1.jpg', 14, 'SLIDE', 0),
(75, '51164618.jpeg', '2.jpg', 14, 'SLIDE', 1),
(76, '81220661.jpeg', '3.jpg', 14, 'SLIDE', 2),
(77, '26092349.jpeg', '4.jpg', 14, 'SLIDE', 3),
(78, '49734769.jpeg', '5.jpg', 14, 'SLIDE', 4),
(79, '86965172.jpeg', '6.jpg', 14, 'SLIDE', 5),
(80, '99645968.jpeg', '7.jpg', 14, 'SLIDE', 6),
(81, '78317267.jpeg', '8.jpg', 14, 'SLIDE', 7),
(82, '84239843.jpeg', '9.jpg', 14, 'SLIDE', 8),
(83, '11714265.jpeg', 'Irizar4.jpg', 14, 'SLIDE', 9),
(84, '6903938.jpeg', 'DSC05726.JPG', 15, 'PRESENTACION', NULL),
(85, '30805759.jpeg', 'DSC05706.JPG', 15, 'SLIDE', 0),
(86, '25598109.jpeg', 'DSC05707.JPG', 15, 'SLIDE', 1),
(87, '33745462.jpeg', 'DSC05708 - copia.JPG', 15, 'SLIDE', 2),
(88, '89426754.jpeg', 'DSC05710.JPG', 15, 'SLIDE', 3),
(89, '57146512.jpeg', 'DSC05712.JPG', 15, 'SLIDE', 4),
(90, '86090940.jpeg', 'DSC05714 - copia.JPG', 15, 'SLIDE', 5),
(91, '79626294.jpeg', 'DSC05718 - copia.JPG', 15, 'SLIDE', 6),
(92, '56563058.jpeg', 'DSC05726.JPG', 15, 'SLIDE', 7),
(93, '31714820.jpeg', 'DSC05729.JPG', 15, 'SLIDE', 8),
(94, '25886735.jpeg', 'DSC05733.JPG', 15, 'SLIDE', 9),
(95, '89788817.jpeg', 'IMG-20170412-WA0021.jpg', 15, 'SLIDE', 10),
(96, '15616999.jpeg', 'Tortuguitas.JPG', 15, 'SLIDE', 11),
(97, '16947009.jpeg', 'Tortuguitas1.JPG', 15, 'SLIDE', 12),
(98, '17121255.jpeg', 'Tortuguitas3.JPG', 15, 'SLIDE', 13),
(99, '44155294.jpeg', 'Tortuguitas4.JPG', 15, 'SLIDE', 14),
(100, '51065699.jpeg', 'WhatsApp Image 2018-06-13 at 15.31.14.jpeg', 15, 'SLIDE', 15),
(101, '34077007.jpeg', 'WhatsApp Image 2018-06-13 at 15.31.15.jpeg', 15, 'SLIDE', 16),
(102, '56276058.jpeg', 'WhatsApp Image 2018-06-13 at 15.31.16 (1).jpeg', 15, 'SLIDE', 17),
(103, '98470362.jpeg', 'WhatsApp Image 2018-06-13 at 15.31.16.jpeg', 15, 'SLIDE', 18),
(104, '17141854.jpeg', 'Los Robles-6.jpg', 16, 'PRESENTACION', NULL),
(105, '46442058.jpeg', 'Los Robles-7.jpg', 16, 'SLIDE', 0),
(106, '23339200.jpeg', 'Los Robles-12.jpg', 16, 'SLIDE', 1),
(107, '97843129.jpeg', 'Los Robles-13.jpg', 16, 'SLIDE', 2),
(108, '78110526.jpeg', 'Los Robles-6.jpg', 16, 'SLIDE', 3),
(109, '37014488.jpeg', 'WhatsApp Image 2019-04-05 at 4.29.34 PM.jpeg', 16, 'SLIDE', 4),
(110, '68359536.jpeg', 'WhatsApp Image 2019-04-05 at 4.29.36 PM.jpeg', 16, 'SLIDE', 5),
(111, '88885540.jpeg', 'WhatsApp Image 2019-04-05 at 4.29.54 PM.jpeg', 16, 'SLIDE', 6),
(112, '12454837.jpeg', 'WhatsApp Image 2019-04-05 at 4.29.55 PM.jpeg', 16, 'SLIDE', 7),
(113, '76333457.jpeg', 'WhatsApp Image 2019-04-05 at 4.29.57 PM.jpeg', 16, 'SLIDE', 8),
(114, '66428741.jpeg', 'WhatsApp Image 2019-04-05 at 4.30.05 PM.jpeg', 16, 'SLIDE', 9),
(115, '75649986.jpeg', 'WhatsApp Image 2019-04-05 at 4.30.24 PM.jpeg', 16, 'SLIDE', 10),
(116, '46678678.jpeg', 'WhatsApp Image 2019-04-05 at 4.30.32 PM (1).jpeg', 16, 'SLIDE', 11),
(117, '96469635.jpeg', 'WhatsApp Image 2019-04-05 at 4.30.32 PM.jpeg', 16, 'SLIDE', 12),
(118, '46706916.jpeg', 'Trist+ín Su+írez-11.jpg', 17, 'PRESENTACION', NULL),
(119, '16641368.jpeg', 'Trist+ín Su+írez-2.jpg', 17, 'SLIDE', 0),
(120, '46764992.jpeg', 'Trist+ín Su+írez-11.jpg', 17, 'SLIDE', 1),
(121, '59295641.jpeg', 'Trist+ín Su+írez-1_1.jpg', 17, 'SLIDE', 2),
(122, '54248479.jpeg', 'Trist+ín Su+írez-12.jpg', 17, 'SLIDE', 3),
(123, '19705268.jpeg', 'Trist+ín Su+írez-13_1.jpg', 17, 'SLIDE', 4),
(124, '45354180.jpeg', 'Trist+ín Su+írez-14.jpg', 17, 'SLIDE', 5),
(125, '56567471.jpeg', 'Trist+ín Su+írez-15.jpg', 17, 'SLIDE', 6),
(126, '54010555.jpeg', 'Trist+ín Su+írez-16.jpg', 17, 'SLIDE', 7),
(127, '4357715.jpeg', 'Derqui-5.jpg', 18, 'PRESENTACION', NULL),
(128, '34393611.jpeg', 'Derqui-3.jpg', 18, 'SLIDE', 0),
(129, '25839594.jpeg', 'Derqui-4.jpg', 18, 'SLIDE', 1),
(130, '45987408.jpeg', 'Derqui-6.jpg', 18, 'SLIDE', 2),
(131, '48596293.jpeg', 'Derqui-7.jpg', 18, 'SLIDE', 3),
(132, '87266019.jpeg', 'DJI_0035.jpg', 18, 'SLIDE', 4),
(133, '10727262.jpeg', 'DJI_0036.jpg', 18, 'SLIDE', 5),
(134, '25915536.jpeg', 'DJI_0037.jpg', 18, 'SLIDE', 6),
(135, '45332939.jpeg', 'DJI_0040.jpg', 18, 'SLIDE', 7),
(136, '29951053.jpeg', '18362518_1560435364052710_1143093722_o.jpg', 18, 'SLIDE', 8),
(137, '32062453.jpeg', '18378884_1560435434052703_1154502960_o.jpg', 18, 'SLIDE', 9),
(138, '81231134.jpeg', '22831399_1786750648087846_1533932995_o.jpg', 18, 'SLIDE', 10),
(139, '36790904.jpeg', '27047061_1912625395500370_672898054_o.jpg', 18, 'SLIDE', 11),
(140, '84239065.jpeg', '27048342_1912625308833712_1321838876_o.jpg', 18, 'SLIDE', 12),
(141, '51572317.jpeg', 'DJI_0102.jpg', 19, 'PRESENTACION', NULL),
(142, '79531961.jpeg', 'DJI_0096.jpg', 19, 'SLIDE', 0),
(143, '61528695.jpeg', 'DJI_0101.jpg', 19, 'SLIDE', 1),
(144, '38755133.jpeg', '27835369_1938815302881379_998882426_o.jpg', 19, 'SLIDE', 2),
(145, '41100603.jpeg', '27835398_1938815419548034_867977786_o.jpg', 19, 'SLIDE', 3),
(146, '40962118.jpeg', '27836386_1938815142881395_339162127_o.jpg', 19, 'SLIDE', 4),
(147, '10215820.jpeg', '27836502_1938815112881398_784372305_o.jpg', 19, 'SLIDE', 5),
(148, '78095465.jpeg', '27946746_1938814969548079_169322259_o (1).jpg', 19, 'SLIDE', 6),
(149, '37993229.jpeg', '27946746_1938814969548079_169322259_o.jpg', 19, 'SLIDE', 7),
(150, '7092185.jpeg', 'Astolfi-2.jpg', 20, 'PRESENTACION', NULL),
(151, '70350276.jpeg', 'Astolfi-1.jpg', 20, 'SLIDE', 0),
(152, '47141850.jpeg', 'Astolfi-3.jpg', 20, 'SLIDE', 1),
(153, '78517691.jpeg', 'DJI_0030.jpg', 20, 'SLIDE', 2),
(154, '34064381.jpeg', 'DJI_0031.jpg', 20, 'SLIDE', 3),
(155, '55352626.jpeg', 'DJI_0033.jpg', 20, 'SLIDE', 4),
(156, '20591607.jpeg', 'DJI_0034.jpg', 20, 'SLIDE', 5),
(157, '43999300.jpeg', 'DJI_0037.jpg', 20, 'SLIDE', 6),
(158, '62963086.jpeg', 'DJI_0038.jpg', 20, 'SLIDE', 7),
(159, '60440207.jpeg', 'DJI_0039.jpg', 20, 'SLIDE', 8),
(160, '97407431.jpeg', 'DJI_0040.jpg', 20, 'SLIDE', 9),
(161, '21951645.jpeg', 'DJI_0041.jpg', 20, 'SLIDE', 10),
(162, '66787781.jpeg', 'DJI_0042.jpg', 20, 'SLIDE', 11),
(163, '8440177.jpeg', 'DJI_0043.jpg', 20, 'SLIDE', 12),
(164, '38282904.jpeg', 'DJI_0046.jpg', 20, 'SLIDE', 13),
(165, '74157976.jpeg', 'DJI_0059.jpg', 21, 'PRESENTACION', NULL),
(166, '77377019.jpeg', 'DJI_0049.jpg', 21, 'SLIDE', 0),
(167, '41006949.jpeg', 'DJI_0052.jpg', 21, 'SLIDE', 1),
(168, '19528013.jpeg', 'DJI_0053.jpg', 21, 'SLIDE', 2),
(169, '8557295.jpeg', 'DJI_0054.jpg', 21, 'SLIDE', 3),
(170, '69158708.jpeg', 'DJI_0055.jpg', 21, 'SLIDE', 4),
(171, '303662.jpeg', 'DJI_0056.jpg', 21, 'SLIDE', 5),
(172, '12821455.jpeg', 'DJI_0057.jpg', 21, 'SLIDE', 6),
(173, '43195677.jpeg', 'DJI_0058.jpg', 21, 'SLIDE', 7),
(174, '7716010.jpeg', 'DJI_0059.jpg', 21, 'SLIDE', 8),
(175, '53822923.jpeg', 'DJI_0061.jpg', 21, 'SLIDE', 9),
(176, '99794120.jpeg', 'DJI_0062.jpg', 21, 'SLIDE', 10),
(177, '94784684.jpeg', 'DJI_0066.jpg', 21, 'SLIDE', 11),
(178, '21556326.jpeg', 'DJI_0067.jpg', 21, 'SLIDE', 12),
(179, '37159812.jpeg', 'DJI_0072.jpg', 21, 'SLIDE', 13),
(180, '99063706.jpeg', 'DJI_0074.jpg', 21, 'SLIDE', 14),
(181, '16328379.jpeg', 'DJI_0075.jpg', 21, 'SLIDE', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `img_testimonio`
--

CREATE TABLE `img_testimonio` (
  `id` int(10) UNSIGNED NOT NULL,
  `ruta` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonio_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas_colectivo`
--

CREATE TABLE `lineas_colectivo` (
  `id` int(10) UNSIGNED NOT NULL,
  `proyecto_id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lineas_colectivo`
--

INSERT INTO `lineas_colectivo` (`id`, `proyecto_id`, `descripcion`) VALUES
(9, 10, '276 Escobar - Pilar'),
(10, 15, '228 - Puente Saavedra - Tortuguitas - Del Viso'),
(11, 16, '350 - Pilar - Robles'),
(12, 17, '306 - Spegazzini - Tristan Suares- Ezeiza - Monte Grande - Lomas de Zamora - Puente 12 - La Tablada - San Justo'),
(13, 18, '520 Est. Derqui - Zelaya - Villa Rosa'),
(14, 19, '510 - Del Viso - Pilar'),
(15, 20, '501 Astolfi - Pilar'),
(16, 21, '501 Astolfi - Pilar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2018_00_06_192944_estado', 1),
(3, '2018_01_29_154504_zona', 1),
(4, '2019_09_24_165755_proyectos', 1),
(5, '2019_09_24_180306_img_proyecto', 1),
(6, '2019_09_27_204926_testimonios', 1),
(7, '2019_09_27_205133_img_testimonios', 1),
(8, '2019_09_30_182728_novedad', 1),
(9, '2019_09_30_182852_img_novedad', 1),
(10, '2020_01_31_203105_proyecto_video', 1),
(11, '2020_02_03_182601_servicios', 1),
(12, '2020_02_03_185136_caracteristicas', 1),
(13, '2020_02_03_193706_lineas_colectivo', 1),
(14, '2020_02_03_202632_proyecto_masterplan', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedades`
--

CREATE TABLE `novedades` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zona_id` int(10) UNSIGNED NOT NULL,
  `latitud` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitud` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `descripcion`, `titulo`, `zona_id`, `latitud`, `longitud`, `estacion`, `estado_id`) VALUES
(10, '<p class=\"MsoNormal\"><span lang=\"ES\" style=\"font-size: 11pt; line-height: 15.6933px; font-family: Calibri, sans-serif;\">El barrio se encuentra ubicado en San Alejo, partido de Pilar. Tiene una excelente ubicaci&oacute;n a pocas cuadras de Ruta 25, a diez minutos del centro de Pilar y a 15 minutos del Parque&nbsp;</span><span style=\"font-family: Calibri, sans-serif; font-size: 11pt;\">Industrial de Pilar.</span></p>\r\n<p class=\"MsoNormal\"><span lang=\"ES\" style=\"font-size: 11pt; line-height: 15.6933px; font-family: Calibri, sans-serif;\">Se encuentra en una zona tranquila y de f&aacute;cil acceso, en el barrio podr&aacute;s encontrar una escuela, una sala de primeros auxilios, una cancha de Football y una plaza para que jueguen los m&aacute;s peque&ntilde;os.<br />Ideal para proyectar tu casa y disfrutarla con tu familia.</span></p>\r\n<p class=\"MsoNormal\">&nbsp;</p>\r\n<p class=\"MsoNormal\"><span lang=\"ES\">Ser&aacute; un barrio abierto por lo que no se abonar&aacute;n expensas y no tendr&aacute; reglamento de construcci&oacute;n.</span></p>', 'Los Sauces', 1, '-34.43159062460211', '-58.91245998678589', 'Estación del tren Mitre', 1),
(11, '<p class=\"MsoNormal\"><span lang=\"ES\">El barrio se encuentra ubicado en Manzanares, partido de Pilar, a pocas cuadras de Panamericana, a 55 km de CABA.&nbsp;</span></p>\r\n<p class=\"MsoNormal\"><span lang=\"ES\">El Aljibe es un barrio ideal para proyectar tu hogar junto a tu familia, cuenta salida al Rio Luj&aacute;n, el mismo contar&aacute; con un paseo ribere&ntilde;o donde podr&aacute;s disfrutar una caminata, sentarte a leer un libro o hacer ejercicio al aire libre ya que contar&aacute; con un eco gimnasio mientras disfrutas del paisaje y la tranquilidad que te ofrecemos.</span></p>\r\n<p class=\"MsoNormal\"><span lang=\"ES\">&iexcl;Cumpl&iacute; tu sue&ntilde;o! M&aacute;s de 100 familias ya se encuentran viviendo y disfrutando de la comodidad del barrio.</span></p>', 'El Aljibe', 1, '-34.4453226', '-58.9751816', NULL, 1),
(12, '<p class=\"MsoNormal\" style=\"margin-left: 14.2pt;\"><span lang=\"ES\">El barrio se encuentra ubicado en Exaltaci&oacute;n de la Cruz, a diez minutos de la ciudad de Pilar. Ubicado en un entorno tranquilo, con acceso asfaltado por el tradicional Parque Sakura, <span style=\"background: white;\">A tan solo 400 mts del Km 68 de la ruta 8.&nbsp;</span></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-left: 14.2pt;\"><span lang=\"ES\">&iexcl;86 familias cumplieron su sue&ntilde;o y hoy disfrutan de su propia casa!</span></p>', 'Barrio Parque Sakura II', 1, '-34.39714', '-59.0459343', NULL, 3),
(13, '<p class=\"MsoNormal\" style=\"margin-left: 14.2pt;\"><span lang=\"ES\">El barrio se encuentra ubicado en Exaltaci&oacute;n de la Cruz, a diez minutos de la ciudad de Pilar. Ubicado en un entorno tranquilo, con acceso asfaltado por el tradicional Parque Sakura, <span style=\"background: white;\">A tan solo 400 mts del Km 68 de la ruta 8.&nbsp;</span></span></p>\r\n<p class=\"MsoNormal\" style=\"margin-left: 14.2pt;\"><span lang=\"ES\">&iexcl;86 familias cumplieron su sue&ntilde;o y hoy disfrutan de su propia casa!</span></p>', 'Barrio Parque Sakura III', 1, '-34.39714', '-59.0459343', NULL, 3),
(14, '<p class=\"MsoNormal\" style=\"margin-left: 14.2pt;\"><span lang=\"ES\">El barrio se encuentra ubicado Irizar, a diez minutos de la ciudad de Pilar. Ubicado en un entorno tranquilo rodeado de casas quintas, con un &uacute;nico acceso por Av.Frondizi.</span></p>\r\n<p class=\"MsoNormal\" style=\"margin-left: 14.2pt;\"><span lang=\"ES\">&iexcl;Hoy m&aacute;s de 30 familias se encuentran viviendo en el barrio y disfrutando su propia casa!</span></p>', 'Rincón de Irizar', 1, '-34.3860319', '-58.97503019999999', NULL, 3),
(15, '<p class=\"MsoNormal\"><span lang=\"ES\">El barrio se encuentra ubicado en Tortuguitas partido de Malvinas Argentinas, en un exclusivo barrio de hermosas casas quintas, que se caracterizan por su a&ntilde;eja arboleda, cuenta excelente ubicaci&oacute;n a 300 metros de Ruta Nacional 8.</span></p>\r\n<p class=\"MsoNormal\"><span lang=\"ES\">El desarrollo se encuentra ubicado a muy pocas cuadras del centro comercial de Tortuguitas, un pueblo tranquilo y urbanizado, donde podr&aacute;s encontrar una escuela p&uacute;blica, y una plaza que podr&aacute;s disfrutar con los m&aacute;s peque&ntilde;os.</span></p>\r\n<p class=\"MsoNormal\">&nbsp;</p>\r\n<p class=\"MsoNormal\"><span lang=\"ES\">Es un barrio abierto por lo que no se abonan expensas y no tendr&aacute; reglamento de construcci&oacute;n.</span></p>', 'Tortuguitas', 1, '-34.4870268', '-58.7688785', 'Estación del tren Belgrano', 2),
(16, '<p class=\"MsoNormal\"><span lang=\"ES\">El barrio se encuentra ubicado en Parada Robles, partido de Exaltaci&oacute;n de La Cruz, a muy pocas cuadras de Panamericana, en un entorno residencial y tranquilo. Ideal para casas de fin de semana, para descansar, alejarte de la ciudad y conectarte con la naturaleza a tan<span style=\"mso-spacerun: yes;\">&nbsp; </span>s&oacute;lo 71 km de Capital, 11 km de Capilla del Se&ntilde;or y 25 km de Pilar.</span></p>\r\n<p class=\"MsoNormal\">&nbsp;</p>\r\n<p class=\"MsoNormal\"><span lang=\"ES\">El desarrollo se encuentra ubicado a seis cuadras del centro comercial de Parada Robles, un pueblo tranquilo, donde podr&aacute;s encontrar un jard&iacute;n maternal, un club, la capilla Nuestra Se&ntilde;ora del Rosario de San Nicol&aacute;s y una sala de primeros auxilios.&nbsp;</span></p>\r\n<p class=\"MsoNormal\">&nbsp;</p>\r\n<p class=\"MsoNormal\"><span lang=\"ES\">Es un barrio abierto por lo que no se abonan expensas y no tendr&aacute; reglamento de construcci&oacute;n.&nbsp;</span></p>', 'Robles', 1, '-34.3778749', '-59.11839959999999', 'Estación del tren Mitre', 1),
(17, '<p class=\"MsoNormal\"><span lang=\"ES\">El barrio se encuentra ubicado en Tristan Suarez, partido de Ezeiza, a 50 metros de la Ruta 205 con excelente acceso a l&iacute;neas de colectivos. Se encuentra en un entorno muy tranquilo, rodeado de casas quintas a 4 km de Ezeiza posee acceso asfaltado desde la calle Juan G&aacute;lvez.</span></p>\r\n<p class=\"MsoNormal\"><span lang=\"ES\">El desarrollo se encuentra ubicado a pocas cuadras del centro comercial de Trist&aacute;n Suarez, donde podr&aacute;s encontrar una plaza y un club, ideal para que jueguen los m&aacute;s peque&ntilde;os de la familia, un barrio ideal para proyectar tu hogar.</span></p>\r\n<p class=\"MsoNormal\"><span lang=\"ES\">Es un barrio abierto por lo que no se abonan expensas. </span></p>\r\n<p class=\"MsoNormal\"><span lang=\"ES\">M&aacute;s de 500 lotes vendidos y 40 familias construyendo &iexcl;An&iacute;mate a vivir tu sue&ntilde;o! </span></p>', 'La Esperanza', 2, '-34.8790667', '-58.55596740000001', 'Estacion del tren Roca', 1),
(18, '<p class=\"MsoNormal\"><span lang=\"ES\">El barrio se encuentra ubicado en Derqui, partido de Pilar, a 200 metros de la Ruta 234 y a tan s&oacute;lo 8 km de Jose C Paz. Cuenta acceso asfaltado desde la calle Entre R&iacute;os. </span></p>\r\n<p class=\"MsoNormal\"><span lang=\"ES\">El desarrollo se encuentra ubicado a pocas cuadras del centro comercial de Derqui un pueblo tranquilo, donde podr&aacute;s encontrar una escuela p&uacute;blica, un hospital, un club y una plaza, ideal para proyectar tu casa junto a tu familia. </span></p>\r\n<p class=\"MsoNormal\"><span lang=\"ES\">Es un barrio abierto por lo que no se abonan expensas y no tendr&aacute; reglamento de construcci&oacute;n. </span></p>', 'Derqui', 1, '-34.4988527', '-58.82809889999999', 'Estación del tren San Martin', 1),
(19, '<p class=\"MsoNormal\"><span lang=\"ES\">El barrio se encuentra ubicado en Del Viso partido de Pilar, tiene una excelente ubicaci&oacute;n a 600 metros de Ruta Nacional 8 y est&aacute; a 100 mts de la Av.Lisandro de La Torre,<span style=\"mso-spacerun: yes;\">&nbsp; </span>avenida con muy buenos accesos a l&iacute;neas de transporte, adem&aacute;s cuenta con todos sus accesos asfaltados.</span></p>\r\n<p class=\"MsoNormal\"><span lang=\"ES\">El desarrollo se encuentra ubicado a pocas cuadras del centro comercial de Del Viso, un pueblo tranquilo y urbanizado, donde podr&aacute;s encontrar una escuela p&uacute;blica, una sala de primeros auxilios y una plaza que podr&aacute;s disfrutar con los m&aacute;s peque&ntilde;os. </span></p>\r\n<p class=\"MsoNormal\"><span lang=\"ES\">&iexcl;An&iacute;mate a cumplir tu sue&ntilde;o! M&aacute;s de 30 familias ya se encuentran viviendo en el barrio y las dem&aacute;s ya se encuentran planificando su casa. </span></p>\r\n<p class=\"MsoNormal\"><span lang=\"ES\">Es un barrio abierto por lo que no se abonan expensas y no tendr&aacute; reglamento de construcci&oacute;n. </span></p>', 'Del Viso', 1, '-34.4693022', '-58.7856564', 'Estación del tren Belgrano', 2),
(20, '<p class=\"MsoNormal\"><span lang=\"ES\">El barrio se encuentra ubicado en Astolfi, partido de Pilar, en un entorno muy tranquilo, rodeado de casas quintas. Tiene una excelente ubicaci&oacute;n a tan s&oacute;lo 50 mts de la Av. Lagomarsino, avenida con muy buenos accesos a l&iacute;neas de transporte.</span></p>\r\n<p class=\"MsoNormal\"><span lang=\"ES\">El desarrollo se encuentra ubicado a pocas cuadras del centro comercial de Astolfi, un pueblo tranquilo, donde podr&aacute;s encontrar una escuela p&uacute;blica y una plaza. Es un barrio ideal para proyectar tu hogar junto con tu familia. </span></p>\r\n<p class=\"MsoNormal\"><span lang=\"ES\">Es un barrio abierto por lo que no se abonan expensas y no tendr&aacute; reglamento de construcci&oacute;n. </span></p>', 'Astolfi 2', 1, '-34.48638539999999', '-58.8838689', 'Estación del tren San Martin', 1),
(21, '<p class=\"MsoNormal\"><span lang=\"ES\">El barrio se encuentra ubicado en Astolfi, partido de Pilar, en un entorno muy tranquilo. Tiene una excelente ubicaci&oacute;n a tan tres cuadras de la estaci&oacute;n del tren San Martin</span></p>\r\n<p class=\"MsoNormal\"><a name=\"_gjdgxs\"></a><span lang=\"ES\">El desarrollo se encuentra ubicado a pocas cuadras del centro comercial de Astolfi, un pueblo tranquilo, donde podr&aacute;s encontrar una escuela p&uacute;blica y una plaza. Es un barrio ideal para proyectar tu hogar junto con tu familia. </span></p>\r\n<p class=\"MsoNormal\"><span lang=\"ES\">Es un barrio abierto por lo que no se abonan expensas y no tendr&aacute; reglamento de construcci&oacute;n. </span></p>', 'Astolfi', 1, '-34.477403', '-58.88160809999999', 'Estación del tren San Martin', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_masterplan`
--

CREATE TABLE `proyecto_masterplan` (
  `id` int(10) UNSIGNED NOT NULL,
  `ruta` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proyecto_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_video`
--

CREATE TABLE `proyecto_video` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `proyecto_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(10) UNSIGNED NOT NULL,
  `proyecto_id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `proyecto_id`, `descripcion`) VALUES
(15, 10, 'Agua de red'),
(16, 10, 'Red de cloaca'),
(17, 10, 'Alumbrado público'),
(18, 11, 'Seguridad'),
(19, 11, 'Club House'),
(20, 11, 'Área Deportiva'),
(21, 11, 'Agua de red'),
(22, 11, 'Red de cloaca'),
(23, 11, 'Gas Natural'),
(24, 11, 'Alumbrado'),
(25, 11, 'Telefonía'),
(26, 11, 'Cable'),
(27, 11, 'Red de baja tensión interna subterránea'),
(28, 11, 'Red de alumbrado interior de calles subterránea'),
(29, 11, 'Red de telefonía subterránea'),
(30, 11, 'Red TV por cable subterránea'),
(31, 12, 'Alumbrado público'),
(32, 13, 'Alumbrado público'),
(33, 14, 'Alumbrado público'),
(34, 14, 'Calles con mejorado'),
(35, 15, 'Alumbrado público'),
(36, 15, 'Calles con fresado'),
(37, 16, 'Calles con fresado'),
(38, 16, 'Alumbrado público'),
(39, 17, 'Agua de red'),
(40, 17, 'Red de cloaca'),
(41, 17, 'Alumbrado público'),
(42, 17, 'Asfalto'),
(43, 17, 'Posesión inmediata'),
(44, 18, 'Agua de red'),
(45, 18, 'Red de cloaca'),
(46, 18, 'Alumbrado público'),
(47, 18, 'Asfalto'),
(48, 19, 'Alumbrado público'),
(49, 19, 'Agua corriente'),
(50, 19, 'Asfalto'),
(51, 19, 'Posesión inmediata'),
(52, 20, 'Agua de red'),
(53, 20, 'Red de cloaca'),
(54, 20, 'Alumbrado público'),
(55, 21, 'Agua de red'),
(56, 21, 'Red de cloaca'),
(57, 21, 'Alumbrado público');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonios`
--

CREATE TABLE `testimonios` (
  `id` int(10) UNSIGNED NOT NULL,
  `link_youtube` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `testimonios`
--

INSERT INTO `testimonios` (`id`, `link_youtube`, `titulo`) VALUES
(1, 'JqZXJPbT2x8', '«VIVIR SIN ALQUILAR» – RICHARD BARRIO PARQUE ASTOLFI'),
(2, 'Ni8l_F923f0', '«PAGAR EN CUOTAS ME PERMITIÓ TENER MI TERRENO» – DIONISIO VECINO DE B. PQUE ASTOLFI'),
(3, 'DDSb4SwzqFo', 'PROPIETARIOS DE ASTOLFI NOS CUENTA SU HISTORIA'),
(4, 'lZ8McUqbPZM', 'VECINOS DE ASTOLFI: «LAS CUOTAS MÍNIMAS»'),
(5, '9g-YQJqZaJ4', 'LA FACILIDAD DE COMPRAR TU TERRENO EN CUOTAS – LEONARDO PROPIETARIO DE BARRIO PARQUE MATHEU'),
(6, '7LV0Xo6a3VI', 'TENER TU CASA ES TODO – EMANUEL, PROPIETARIO DE BARRIO PARQUE MATHEU'),
(7, 'Rf5lzgV8lCA', 'VECINAS DEL BARRIO RINCÓN DE IRIZAR – ENCONTRAR TU LUGAR'),
(8, '8JfRaagA1Hg', 'TERRENOS EN EZEIZA – UNA NUEVA OPORTUNIDAD'),
(9, '7LV0Xo6a3VI', '«TENER TU CASA ES TODO» – EMANUEL B. PQUE MATHEU'),
(10, '0JdjVGom1AI', '«EL PASO MÁS GRANDE QUE DIMOS HASTA AHORA» – CARO Y JOAQUI RINCÓN DE IRIZAR'),
(11, '9g-YQJqZaJ4', '«SUPERAR LA ETAPA DE ALQUILER» – LEONARDO LACO B. PQUE MATHEU'),
(12, 'Rf5lzgV8lCA', 'ENCONTRAR MUCHO MÁS QUE UN TERRENO – ADRIANA Y NORMA RINCÓN DE IRIZAR'),
(13, '8JfRaagA1Hg', 'TERRENOS EN EZEIZA – BARRIO PARQUE LA ESPERANZA'),
(14, 'xGCQ9DI_IkM', 'LLEGAR AL TERRENO PROPIO: 1500 SUEÑOS CUMPLIDOS'),
(15, 'wSpX8ePQ0Jg', 'Barrio Parque Los Robles - Testimonio Marcela y Ariel'),
(16, 'o8epUj4R9No', 'Barrio Parque Derqui - Testimonio Alejandro'),
(17, '4gSPgbR_L7k', 'Barrio Parque Sakura III - Testimonio Maria y Marcelo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mcd77.1990@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`id`, `descripcion`) VALUES
(1, 'ZONA NORTE'),
(2, 'ZONA SUR');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `caracteristicas_proyecto_id_foreign` (`proyecto_id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `img_novedad`
--
ALTER TABLE `img_novedad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `img_novedad_novedad_id_foreign` (`novedad_id`);

--
-- Indices de la tabla `img_proyecto`
--
ALTER TABLE `img_proyecto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `img_proyecto_proyecto_id_foreign` (`proyecto_id`);

--
-- Indices de la tabla `img_testimonio`
--
ALTER TABLE `img_testimonio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `img_testimonio_testimonio_id_foreign` (`testimonio_id`);

--
-- Indices de la tabla `lineas_colectivo`
--
ALTER TABLE `lineas_colectivo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lineas_colectivo_proyecto_id_foreign` (`proyecto_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `novedades`
--
ALTER TABLE `novedades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proyectos_zona_id_foreign` (`zona_id`),
  ADD KEY `proyectos_estado_id_foreign` (`estado_id`);

--
-- Indices de la tabla `proyecto_masterplan`
--
ALTER TABLE `proyecto_masterplan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proyecto_masterplan_proyecto_id_foreign` (`proyecto_id`);

--
-- Indices de la tabla `proyecto_video`
--
ALTER TABLE `proyecto_video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proyecto_video_proyecto_id_foreign` (`proyecto_id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servicios_proyecto_id_foreign` (`proyecto_id`);

--
-- Indices de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `img_novedad`
--
ALTER TABLE `img_novedad`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `img_proyecto`
--
ALTER TABLE `img_proyecto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT de la tabla `img_testimonio`
--
ALTER TABLE `img_testimonio`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lineas_colectivo`
--
ALTER TABLE `lineas_colectivo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `novedades`
--
ALTER TABLE `novedades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `proyecto_masterplan`
--
ALTER TABLE `proyecto_masterplan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `proyecto_video`
--
ALTER TABLE `proyecto_video`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  ADD CONSTRAINT `caracteristicas_proyecto_id_foreign` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`);

--
-- Filtros para la tabla `img_novedad`
--
ALTER TABLE `img_novedad`
  ADD CONSTRAINT `img_novedad_novedad_id_foreign` FOREIGN KEY (`novedad_id`) REFERENCES `novedades` (`id`);

--
-- Filtros para la tabla `img_proyecto`
--
ALTER TABLE `img_proyecto`
  ADD CONSTRAINT `img_proyecto_proyecto_id_foreign` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`);

--
-- Filtros para la tabla `img_testimonio`
--
ALTER TABLE `img_testimonio`
  ADD CONSTRAINT `img_testimonio_testimonio_id_foreign` FOREIGN KEY (`testimonio_id`) REFERENCES `testimonios` (`id`);

--
-- Filtros para la tabla `lineas_colectivo`
--
ALTER TABLE `lineas_colectivo`
  ADD CONSTRAINT `lineas_colectivo_proyecto_id_foreign` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`);

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `proyectos_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `proyectos_zona_id_foreign` FOREIGN KEY (`zona_id`) REFERENCES `zonas` (`id`);

--
-- Filtros para la tabla `proyecto_masterplan`
--
ALTER TABLE `proyecto_masterplan`
  ADD CONSTRAINT `proyecto_masterplan_proyecto_id_foreign` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`);

--
-- Filtros para la tabla `proyecto_video`
--
ALTER TABLE `proyecto_video`
  ADD CONSTRAINT `proyecto_video_proyecto_id_foreign` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`);

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_proyecto_id_foreign` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
