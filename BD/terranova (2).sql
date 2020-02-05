-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2020 a las 00:18:40
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

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
(3, 3, '136 metros'),
(4, 3, '278 lotes'),
(5, 3, 'barrio abierto'),
(6, 4, '136 metros');

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
(19, '98429503.jpeg', '1.jpg', 3, 'PRESENTACION', NULL),
(20, '58194026.jpeg', '1.jpg', 3, 'SLIDE', 0),
(21, '43954570.jpeg', '1.jpg', 3, 'SLIDE', 1),
(22, '6074673.jpeg', '1.jpg', 4, 'PRESENTACION', NULL),
(23, '28893056.jpeg', '1.jpg', 4, 'SLIDE', 0),
(24, '52943422.jpeg', '1.jpg', 4, 'SLIDE', 1);

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
(3, 3, '501 astolfi pilar'),
(4, 4, '501 astolfi pilar');

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
(2, '2018_01_29_154504_zona', 1),
(3, '2019_09_24_165755_proyectos', 1),
(4, '2019_09_24_180306_img_proyecto', 1),
(5, '2019_09_27_204926_testimonios', 1),
(6, '2019_09_27_205133_img_testimonios', 1),
(7, '2019_09_30_182728_novedad', 1),
(8, '2019_09_30_182852_img_novedad', 1),
(9, '2020_01_31_203105_proyecto_video', 1),
(10, '2020_02_03_182601_servicios', 1),
(11, '2020_02_03_185136_caracteristicas', 1),
(12, '2020_02_03_193706_lineas_colectivo', 1),
(13, '2020_02_03_202632_proyecto_masterplan', 1);

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
  `estacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `descripcion`, `titulo`, `zona_id`, `latitud`, `longitud`, `estacion`) VALUES
(3, '<h4 style=\"padding: 0px; margin: 0px 0px 20px; font-family: helvetica; letter-spacing: 1px; text-transform: uppercase; font-weight: normal; font-size: 17.5px; background-color: #ffffff;\">SE&nbsp;ENCUENTRA UBICADO EN EL PARTIDO DE&nbsp;<strong style=\"padding: 0px; margin: 0px;\">EXALTACI&Oacute;N DE LA CRUZ,</strong>&nbsp;&nbsp;A 50 MTS&nbsp;DEL KM 77 DE LA RUTA 8,&nbsp; DETR&Aacute;S DE LA CEPRAL (COOPERATIVA EL&Eacute;CTRICA DE PARADA ROBLES) EN UN ENTORNO DE GRANDES Y HERMOSAS CASAS QUINTAS DONDE PRIMA LA TRANQUILIDAD QUE TE BRINDA EL SILENCIO DE LA NATURALEZA.&nbsp; ADEM&Aacute;S, SE DESTACA POR SU CERCAN&Iacute;A AL CENTRO COMERCIAL DEL PUEBLO DE&nbsp;<strong style=\"padding: 0px; margin: 0px;\">PARADA ROBLES.&nbsp;</strong></h4>\r\n<ul style=\"padding: 0px 0px 0px 20px; margin: 0px 0px 20px; color: #6f6f6f; font-family: helvetica; font-size: 13px; background-color: #ffffff;\">\r\n<li style=\"padding: 0px; margin: 0px;\">\r\n<h4 style=\"padding: 0px; margin: 0px 0px 20px; color: #000000; letter-spacing: 1px; text-transform: uppercase; font-weight: normal; font-size: 17.5px;\">&nbsp;</h4>\r\n</li>\r\n</ul>\r\n<h4 style=\"padding: 0px; margin: 0px 0px 20px; font-family: helvetica; letter-spacing: 1px; text-transform: uppercase; font-weight: normal; font-size: 17.5px; background-color: #ffffff;\">CONTACTATE CON UN ASESOR COMERCIAL Y ANOTATE EN EL LISTADO DE INTERESADOS PARA SER UNO DE LOS PRIMEROS EN ELEGIR LA MEJOR UBICACI&Oacute;N DEL BARRIO Y APROVECHAR LOS PRECIOS PROMOCIONALES DE LANZAMIENTO.</h4>\r\n<h4 style=\"padding: 0px; margin: 0px 0px 20px; font-family: helvetica; letter-spacing: 1px; text-transform: uppercase; font-weight: normal; font-size: 17.5px; background-color: #ffffff;\"><strong style=\"padding: 0px; margin: 0px;\">&iexcl;TU OPORTUNIDAD DE SER DUE&Ntilde;O DE TU PROPIO TERRENO EN PARADA ROBLES!</strong></h4>', 'proyecto', 2, '-34.52317163581733', '-58.60034991601563', 'Estacion B. mitre'),
(4, '<p>asdasd</p>', 'Quienes SomosSSSSS', 2, '-34.548059825292164', '-58.708839906250006', 'Estacion B. mitre');

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

--
-- Volcado de datos para la tabla `proyecto_masterplan`
--

INSERT INTO `proyecto_masterplan` (`id`, `ruta`, `nombre`, `proyecto_id`) VALUES
(5, '75070716.pdf', 'Galindez_Menu_Formal.pdf', 3),
(6, '88506642.pdf', 'Colonia_marin-web.pdf', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_video`
--

CREATE TABLE `proyecto_video` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proyecto_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proyecto_video`
--

INSERT INTO `proyecto_video` (`id`, `url`, `proyecto_id`) VALUES
(5, 'Rf5lzgV8lCA', 3),
(6, 'Rf5lzgV8lCA', 3),
(9, 'Rf5lzgV8lCA', 4),
(10, 'Rf5lzgV8lCA', 4);

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
(3, 3, 'Aire acondicionado'),
(4, 3, 'agua de red'),
(5, 3, 'alumbrado público'),
(6, 3, 'Pasto moderno'),
(7, 3, 'Rock and roll'),
(8, 4, 'Aire acondicionado');

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
  ADD KEY `proyectos_zona_id_foreign` (`zona_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `img_novedad`
--
ALTER TABLE `img_novedad`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `img_proyecto`
--
ALTER TABLE `img_proyecto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `img_testimonio`
--
ALTER TABLE `img_testimonio`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lineas_colectivo`
--
ALTER TABLE `lineas_colectivo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `novedades`
--
ALTER TABLE `novedades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proyecto_masterplan`
--
ALTER TABLE `proyecto_masterplan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `proyecto_video`
--
ALTER TABLE `proyecto_video`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
