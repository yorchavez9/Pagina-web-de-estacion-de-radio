-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-03-2024 a las 18:46:01
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sis_radio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anunciosa`
--

CREATE TABLE `anunciosa` (
  `id_anuncioA` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `estado` int(11) DEFAULT 1,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anunciosb`
--

CREATE TABLE `anunciosb` (
  `id_anuncioB` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `estado` int(11) DEFAULT 1,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `id_banner` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `estado` int(11) DEFAULT 1,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductores`
--

CREATE TABLE `conductores` (
  `id_conductor` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `experiencia` varchar(255) NOT NULL,
  `habilidad` text DEFAULT NULL,
  `estado` int(11) DEFAULT 1,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `conductores`
--

INSERT INTO `conductores` (`id_conductor`, `tipo`, `nombre`, `apellidos`, `correo`, `telefono`, `experiencia`, `habilidad`, `estado`, `fecha`) VALUES
(1, 'radio', 'Jorge ', 'Chavez Huincho', 'admin@gmail.com', '920468502', '2 meses', 'Saltar', 1, '2024-03-13 10:44:02'),
(2, 'tv', 'Luis', 'Ramos', 'luis@gmail.com', '920468502', '2 mese', 'comer, reir', 1, '2024-03-13 10:44:57'),
(3, 'tv', 'Gimena', 'Lopez Vitudes', 'gimena@gmail.com', '920468523', '2 años', 'Cantar, comer', 1, '2024-03-13 10:57:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id_contacto` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) NOT NULL,
  `compania` varchar(255) DEFAULT NULL,
  `mensaje` text NOT NULL,
  `estado` int(11) DEFAULT 0,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_contactos`
--

CREATE TABLE `data_contactos` (
  `id_data_contacto` int(11) NOT NULL,
  `localizacion` varchar(300) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galarias`
--

CREATE TABLE `galarias` (
  `id_galeria` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` text NOT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patrocinadores`
--

CREATE TABLE `patrocinadores` (
  `id_patrocinador` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `sitio_web` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programaciones_radial`
--

CREATE TABLE `programaciones_radial` (
  `id_radial` int(11) NOT NULL,
  `id_conductor` int(11) NOT NULL,
  `dia` varchar(50) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `hora` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `programaciones_radial`
--

INSERT INTO `programaciones_radial` (`id_radial`, `id_conductor`, `dia`, `titulo`, `imagen`, `hora`, `estado`) VALUES
(4, 1, 'Lunes', 'Mañanas Frescas', 'vistas/img/programacionRadial/202403141711175604.jpg', '8:00 AM a 11:00 AM', 1),
(5, 2, 'Lunes', 'Noticias al Día', 'vistas/img/programacionRadial/202403141711507211.jpg', '11:00 AM a 12:00 PM', 1),
(6, 2, 'Lunes', 'Los Clásicos de Siempre', 'vistas/img/programacionRadial/202403141712197200.png', '12:00 PM a 2:00 PM', 1),
(7, 2, 'Lunes', 'Ritmos Latinos', 'vistas/img/programacionRadial/202403141712459733.jpg', '2:00 PM a 5:00 PM', 1),
(8, 1, 'Martes', 'Música para Despertar', 'vistas/img/programacionRadial/202403141713186220.jpg', '7:00 AM a 9:00 AM', 1),
(9, 2, 'Martes', 'Charlas y Debates', 'vistas/img/programacionRadial/202403141714386439.jpg', '9:00 AM a 10:00 AM', 1),
(10, 2, 'Martes', 'Éxitos del Momento', 'vistas/img/programacionRadial/202403141715053774.jpg', '10:00 AM a 1:00 PM', 1),
(11, 3, 'Martes', 'Tarde de Relajación', 'vistas/img/programacionRadial/202403141715315669.jpg', '1:00 PM a 4:00 PM', 1),
(12, 2, 'Miercoles', 'Noticias Mañaneras-🙂', 'vistas/img/programacionRadial/202403141716039408.jpg', '6:00 AM a 8:00 AM', 1),
(13, 3, 'Miercoles', 'Entrevistas en Vivo', 'vistas/img/programacionRadial/202403141716402979.jpg', '8:00 AM a 10:00 AM', 1),
(14, 3, 'Miercoles', 'Música Variada ', 'vistas/img/programacionRadial/202403141717051278.jpg', '10:00 AM a 1:00 PM', 1),
(15, 3, 'Miercoles', 'Éxitos Populares', 'vistas/img/programacionRadial/202403141717337555.png', '1:00 PM a 4:00 PM', 1),
(16, 3, 'Jueves', 'Despertando con Energía🔥', 'vistas/img/programacionRadial/202403141719492323.jpeg', '7:30 AM a 9:30 AM', 1),
(17, 2, 'Jueves', 'Música Nacional', 'vistas/img/programacionRadial/202403141720229364.jpg', ' 9:30 AM a 11:30 AM', 1),
(18, 3, 'Jueves', 'Noticias del Entretenimiento', 'vistas/img/programacionRadial/202403141726553996.jpg', '11:30 AM a 12:30 PM', 1),
(19, 2, 'Jueves', 'Hora de Reflexión', 'vistas/img/programacionRadial/202403141727256625.jpg', '12:30 PM a 2:30 PM', 1),
(20, 3, 'Viernes', 'Retro Hits', 'vistas/img/programacionRadial/202403141727597259.jpg', '6:00 AM a 9:00 AM', 1),
(21, 3, 'Viernes', 'Música Internacional ', 'vistas/img/programacionRadial/202403141729149230.jpg', ' 9:00 AM a 12:00 PM', 1),
(22, 1, 'Viernes', 'Top 40 del Fin de Semana ', 'vistas/img/programacionRadial/202403141729361083.jpg', '12:00 PM a 3:00 PM', 1),
(23, 3, 'Sábado', 'Mañanas de Éxitos', 'vistas/img/programacionRadial/202403141730195159.jpeg', '8:00 AM a 12:00 PM', 1),
(24, 3, 'Sábado', 'Tarde de Diversión', 'vistas/img/programacionRadial/202403141730435378.jpg', '12:00 PM a 4:00 PM', 1),
(25, 2, 'Sábado', 'Noches Románticas', 'vistas/img/programacionRadial/202403141731129665.jpg', '4:00 PM a 8:00 PM', 1),
(26, 2, 'Domingo', 'Desayuno Musical ', 'vistas/img/programacionRadial/202403141731419791.jpg', '9:00 AM a 11:00 AM', 1),
(27, 2, 'Domingo', 'Domingo Familiar', 'vistas/img/programacionRadial/202403141732031744.jpg', '11:00 AM a 2:00 PM', 1),
(28, 3, 'Domingo', 'Relax y Música ', 'vistas/img/programacionRadial/202403141732245859.jpg', '2:00 PM a 6:00 PM', 1),
(29, 2, 'Domingo', 'Hora de los Clásicos', 'vistas/img/programacionRadial/202403141732452999.jpg', '6:00 PM a 9:00 PM', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programaciones_tv`
--

CREATE TABLE `programaciones_tv` (
  `id_tv` int(11) NOT NULL,
  `id_conductor` int(11) NOT NULL,
  `dia` varchar(50) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `hora` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `programaciones_tv`
--

INSERT INTO `programaciones_tv` (`id_tv`, `id_conductor`, `dia`, `titulo`, `imagen`, `hora`, `estado`) VALUES
(2, 1, 'Jueves', 'Programacion tv 02 ', 'vistas/img/programacionTV/202403131257286962.jpg', '14:02:00', 1),
(3, 3, 'Lunes', 'Programcio tv ntocias 😎', 'vistas/img/programacionTV/202403131310356988.jpg', '9:00 AM hasta 10:00 AM', 1),
(4, 3, 'Lunes', 'Notica el dial', 'vistas/img/programacionTV/202403150835479148.png', '10:00 AM a 1:00 PM', 1),
(5, 1, 'Martes', 'yepeta🔥🔥🔥😎😎', 'vistas/img/programacionTV/202403150836047624.jpg', '11:00 AM a 12:00 PM', 1),
(6, 3, 'Martes', 'Los Clásicos de Siempre', 'vistas/img/programacionTV/202403150836235183.jpg', '2:00 PM a 5:00 PM', 1),
(7, 3, 'Miercoles', 'Los Clásicos de Siempre', 'vistas/img/programacionTV/202403150836392461.jpg', '2:00 PM a 5:00 PM', 1),
(8, 3, 'Jueves', 'Ritmos Latinos', 'vistas/img/programacionTV/202403150836527199.jpg', '11:00 AM a 12:00 PM', 1),
(9, 2, 'Viernes', 'Mañanas Frescas', 'vistas/img/programacionTV/202403150837109955.png', '2:00 PM a 5:00 PM', 1),
(10, 2, 'Sábado', 'Música para Despertar', 'vistas/img/programacionTV/202403150837265980.jpg', '10:00 AM a 1:00 PM', 1),
(11, 3, 'Domingo', 'Mañanas Frescas', 'vistas/img/programacionTV/202403150837377441.png', '1:00 PM a 4:00 PM', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ranking`
--

CREATE TABLE `ranking` (
  `id_ranking` int(11) NOT NULL,
  `puesto` int(11) NOT NULL,
  `cancion` varchar(255) NOT NULL,
  `artista` varchar(255) NOT NULL,
  `letra` text DEFAULT NULL,
  `video_url` varchar(300) NOT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redes_sociales`
--

CREATE TABLE `redes_sociales` (
  `id_redes` int(11) NOT NULL,
  `facebook` varchar(300) DEFAULT NULL,
  `whatsapp` varchar(300) DEFAULT NULL,
  `youtube` varchar(300) DEFAULT NULL,
  `linkedin` varchar(300) DEFAULT NULL,
  `twitter` varchar(300) DEFAULT NULL,
  `tiktok` varchar(300) DEFAULT NULL,
  `instagram` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sobrenosotros`
--

CREATE TABLE `sobrenosotros` (
  `id_sobre_nosotros` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscriptores`
--

CREATE TABLE `suscriptores` (
  `id_suscribir` int(11) NOT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `perfil` varchar(100) DEFAULT 'usuario',
  `correo` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `perfil`, `correo`, `password`, `estado`, `fecha`) VALUES
(1, 'Jorge ', 'Chávez Huincho', 'administrador', 'admin@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auRxLZy3JpdoIysOxMPPZtlw1Gg/ea1Zi', 1, '2024-03-13 10:07:47'),
(2, 'Juan ', 'Lopez Sanches', 'ayudante', 'juan@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auFxqrwzBR0RPCx/v9BOmOyImsyarRs7G', 1, '2024-03-13 10:10:00'),
(3, 'Ginena', 'Chavez Huincho', 'usuario', 'gimena@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auqNEcw2BTG2u2Da2yrwFHsy7ldd46TUq', 1, '2024-03-13 10:10:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id_video` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `video_url` varchar(300) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `id_visita` int(11) NOT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anunciosa`
--
ALTER TABLE `anunciosa`
  ADD PRIMARY KEY (`id_anuncioA`);

--
-- Indices de la tabla `anunciosb`
--
ALTER TABLE `anunciosb`
  ADD PRIMARY KEY (`id_anuncioB`);

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `conductores`
--
ALTER TABLE `conductores`
  ADD PRIMARY KEY (`id_conductor`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `data_contactos`
--
ALTER TABLE `data_contactos`
  ADD PRIMARY KEY (`id_data_contacto`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indices de la tabla `galarias`
--
ALTER TABLE `galarias`
  ADD PRIMARY KEY (`id_galeria`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `patrocinadores`
--
ALTER TABLE `patrocinadores`
  ADD PRIMARY KEY (`id_patrocinador`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `programaciones_radial`
--
ALTER TABLE `programaciones_radial`
  ADD PRIMARY KEY (`id_radial`),
  ADD KEY `id_conductor` (`id_conductor`);

--
-- Indices de la tabla `programaciones_tv`
--
ALTER TABLE `programaciones_tv`
  ADD PRIMARY KEY (`id_tv`),
  ADD KEY `id_conductor` (`id_conductor`);

--
-- Indices de la tabla `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id_ranking`);

--
-- Indices de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  ADD PRIMARY KEY (`id_redes`);

--
-- Indices de la tabla `sobrenosotros`
--
ALTER TABLE `sobrenosotros`
  ADD PRIMARY KEY (`id_sobre_nosotros`);

--
-- Indices de la tabla `suscriptores`
--
ALTER TABLE `suscriptores`
  ADD PRIMARY KEY (`id_suscribir`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id_video`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id_visita`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anunciosa`
--
ALTER TABLE `anunciosa`
  MODIFY `id_anuncioA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `anunciosb`
--
ALTER TABLE `anunciosb`
  MODIFY `id_anuncioB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `conductores`
--
ALTER TABLE `conductores`
  MODIFY `id_conductor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `data_contactos`
--
ALTER TABLE `data_contactos`
  MODIFY `id_data_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `galarias`
--
ALTER TABLE `galarias`
  MODIFY `id_galeria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `patrocinadores`
--
ALTER TABLE `patrocinadores`
  MODIFY `id_patrocinador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `programaciones_radial`
--
ALTER TABLE `programaciones_radial`
  MODIFY `id_radial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `programaciones_tv`
--
ALTER TABLE `programaciones_tv`
  MODIFY `id_tv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id_ranking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  MODIFY `id_redes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sobrenosotros`
--
ALTER TABLE `sobrenosotros`
  MODIFY `id_sobre_nosotros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `suscriptores`
--
ALTER TABLE `suscriptores`
  MODIFY `id_suscribir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id_visita` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `programaciones_radial`
--
ALTER TABLE `programaciones_radial`
  ADD CONSTRAINT `programaciones_radial_ibfk_1` FOREIGN KEY (`id_conductor`) REFERENCES `conductores` (`id_conductor`);

--
-- Filtros para la tabla `programaciones_tv`
--
ALTER TABLE `programaciones_tv`
  ADD CONSTRAINT `programaciones_tv_ibfk_1` FOREIGN KEY (`id_conductor`) REFERENCES `conductores` (`id_conductor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
