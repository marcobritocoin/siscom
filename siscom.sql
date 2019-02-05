-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2018 a las 17:28:55
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siscom`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(5) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `nombre_comp` varchar(50) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `nivel_acceso` int(2) NOT NULL,
  `cargo` varchar(25) NOT NULL,
  `zona` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `pass`, `nombre_comp`, `foto`, `nivel_acceso`, `cargo`, `zona`) VALUES
(1, 'mbrito', 'hack123', 'Ing. Marco Brito', 'foto/mbrito.jpg', 1, 'Supervisor Comercial', 'Caracas'),
(2, 'judith', 'jefa123', 'Lic. Yudith Villanueva', 'foto/yudith.jpg', 1, 'Gerente', 'Caracas'),
(3, 'admin', 'admin', 'Ing. Marco Brito', 'admin.jpg', 2, 'Comercial Interno', 'Caracas'),
(4, 'prueba', 'prueba', 'Usuario de Prueba', '', 2, 'prueba', 'prueba'),
(5, 'robinson', 'r123', 'Ing. Robinson Ayala', '', 2, 'Comercial ', 'Occidente'),
(6, 'gabriela', 'g123', 'Ing. Gabriela Ortiz', '', 2, 'Comercial', 'Occidente'),
(7, 'nohelys', 'n123', 'Ing. Nohelys Diaz', '', 2, 'Comercial', 'Oriente'),
(8, 'estefany', 'e123', 'Ing. Estefany Rinaldi', '', 2, 'Comercial', 'Oriente'),
(9, 'marti', 'm123', 'Ing. Marti Benito', '', 1, 'Gerente de Operaciones', ''),
(10, 'olga', 'o123', 'Olga Davidova', '', 1, 'Gerente de Marketing', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `id_visitas` int(100) NOT NULL,
  `id_usuario` int(5) NOT NULL,
  `fecha_hora_vis` datetime NOT NULL,
  `latitud` float NOT NULL,
  `longitud` float NOT NULL,
  `visita_efec` tinyint(1) NOT NULL,
  `motivo` varchar(100) NOT NULL,
  `cliente` varchar(40) NOT NULL,
  `nom_contacto` varchar(45) NOT NULL,
  `tlf_contacto` varchar(27) NOT NULL,
  `cargo_contacto` varchar(30) NOT NULL,
  `linea_present` varchar(50) NOT NULL,
  `km` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `visitas`
--

INSERT INTO `visitas` (`id_visitas`, `id_usuario`, `fecha_hora_vis`, `latitud`, `longitud`, `visita_efec`, `motivo`, `cliente`, `nom_contacto`, `tlf_contacto`, `cargo_contacto`, `linea_present`, `km`) VALUES
(24, 1, '2018-02-07 20:17:54', 10.482, -66.861, 0, 'jhkhhjkh', 'jjh', '0', '0', '0', '0', 0),
(25, 1, '2018-02-07 20:19:10', 10.5069, -66.8509, 0, 'No quieren', 'Pdvsa', '0', '0', '0', '0', 0),
(26, 1, '2018-02-07 20:20:40', 10.5138, -66.904, 1, '0', 'bsls', 'kskskd', 'kskskdk', 'Encargado', 'ksksksks', 0),
(28, 1, '2018-02-07 21:07:47', 10.4975, -66.8859, 1, '0', 'pdvsa', 'sada', 'asda', 'Encargado', 'asdas', 0),
(29, 2, '2018-02-07 00:00:00', 10.5558, -71.7295, 1, 'dsf', 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', 0),
(30, 2, '2018-02-07 00:00:00', 10.6602, -71.603, 1, 'dsf', 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', 0),
(31, 2, '2018-02-07 00:00:00', 10.6781, -71.7374, 1, 'asd', 'af', 'sdf', 'sdf', 'asdf', 'sdf', 0),
(32, 3, '2018-02-07 00:00:00', 10.4919, -66.9225, 1, 'sad', 'asd', 'asd', 'asd', 'asd', 'asd', 0),
(33, 1, '2018-02-07 00:00:00', 10.4843, -66.8852, 1, 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 0),
(34, 4, '2018-02-07 00:00:00', 10.4952, -66.9316, 1, '23', '123', '123', '123', '123', '123', 0),
(35, 4, '2018-02-07 00:00:00', 10.4857, -66.9343, 1, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 0),
(36, 1, '2018-02-08 03:14:04', 10.4923, -66.9326, 1, '0', 'Felicidad', 'Ing. Mendoza', '0181616', 'Encargado', 'Solusforce', 0),
(37, 1, '2018-02-08 03:16:48', 10.4923, -66.9326, 0, 'Movida', 'felicity', '0', '0', '0', '0', 0),
(38, 1, '2018-02-08 10:29:56', 10.4723, -66.8951, 1, '0', 'Siven', 'Marco brito', '04129600729', 'Encargado', 'Cosas diversas', 0),
(39, 1, '2018-02-08 11:47:01', 10.4845, -66.8856, 0, '123', 'Pdv', '0', '0', '0', '0', 0),
(40, 1, '2018-02-08 13:10:30', 10.4846, -66.9203, 0, 'No les dio la gana', 'Pdvsa', '0', '0', '0', '0', 0),
(41, 1, '2018-02-08 13:43:18', 10.4887, -66.8783, 0, 'Y', 'X', '0', '0', '0', '0', 0),
(42, 1, '2018-02-11 15:58:08', 10.4578, -68.0078, 0, 'Pdvsa', 'Pdvsa', '0', '0', '0', '0', 0),
(43, 1, '2018-02-11 21:21:36', 10.4616, -68.0298, 0, 'Pdvsa', 'Pdvsa', '0', '0', '0', '0', 0),
(44, 1, '2018-02-11 21:35:24', 10.4616, -68.0298, 0, 'Prueba', 'Pdvda', '0', '0', '0', '0', 0),
(45, 3, '2018-03-13 00:18:14', 10.4887, -66.8796, 0, 'Brito', 'Marco', '0', '0', '0', '0', 25000),
(46, 4, '2018-03-13 17:52:03', 10.197, -71.3143, 0, 'Marco', 'Marco brito', '0', '0', '0', '0', 24972),
(47, 4, '2018-03-13 17:59:25', 10.197, -71.3143, 0, 'Prueba', 'Prueba', '0', '0', '0', '0', 24973),
(48, 0, '2018-03-13 20:50:33', 10.6755, -71.6101, 0, 'Jsjs', 'Jsjs', '0', '0', '0', '0', 0),
(49, 4, '2018-03-13 20:51:15', 10.6755, -71.6101, 1, '0', 'Jsjs', 'Sjssj', 'Sjsj', 'Encargado', 'Jsjs', 7272),
(50, 3, '2018-03-14 07:50:39', 10.6756, -71.6101, 1, '0', 'PDVSA gas', 'Judith', 'Wiiw', 'Encargado', 'Soluforce', 24974),
(51, 3, '2018-03-14 09:07:22', 10.6681, -71.5998, 1, '0', 'jdjd', 'Jsjs', 'Wuuww', 'Encargado', 'Jsjsj', 0),
(52, 5, '2018-03-14 09:17:13', 10.6681, -71.5998, 1, '0', '4tubing', 'Marcos Brito', '04246671190', 'Encargado', 'ReuniÃ³n con personal', 83400),
(53, 4, '2018-03-14 09:18:34', 10.6681, -71.5998, 1, '0', 'Petro monagas', 'Teofilo hernandez', '04146317105', 'Encargado', '2 km de soluforce', 100),
(54, 6, '2018-03-14 10:52:11', 10.6681, -71.5998, 1, '0', 'Petrozamora', 'Carlo Perrone', '123', 'Encargado', 'Seguimiento protocolo de reparaciÃ³n fe lineas', 68000),
(55, 3, '2018-03-14 14:58:30', 10.6682, -71.5995, 1, '0', 'Pdvsa', 'Nansn', '17171', 'Encargado', 'Jajaj', 1717),
(56, 3, '2018-03-14 14:59:03', 10.6682, -71.5995, 0, 'Jajaj', 'Jsjsj', '0', '0', '0', '0', 0),
(57, 6, '2018-03-14 19:21:50', 10.689, -71.6652, 1, '0', 'Jsjsj', 'Ajqj', '5151', 'Encargado', 'Hahah', 51515),
(58, 6, '2018-03-14 19:28:16', 10.689, -71.6652, 0, 'Hajajaja', 'Petroquiriquirue', '0', '0', '0', '0', 0),
(59, 6, '2018-03-15 10:03:52', 10.3797, -71.4554, 1, '0', 'Sinovenezolana', 'Paul Superville', '04169669753', 'Encargado', 'Estatus de las procuras de esta mixta.\nA la espera', 67710),
(60, 6, '2018-03-15 10:13:03', 10.3797, -71.4554, 1, '0', 'Por Favor Espere', 'Por Favor Espere', 'Por Favor Espere', 'Encargado', 'Por Favor Espere', 0),
(61, 6, '2018-03-15 10:15:08', 10.3797, -71.4554, 1, '0', 'Por Favor Espere', 'Por Favor Espere', 'Por Favor Espere', 'Encargado', 'Por Favor Espere', 0),
(62, 6, '2018-03-15 10:51:35', 10.3797, -71.4554, 1, '0', 'Por Favor Espere', 'Por Favor Espere', 'Por Favor Espere', 'Encargado', 'Por Favor Espere', 0),
(63, 6, '2018-03-15 10:56:49', 10.3797, -71.4554, 1, '0', 'Por Favor Espere', 'Por Favor Espere', 'Por Favor Espere', 'Encargado', 'Por Favor Espere', 0),
(64, 6, '2018-03-15 10:56:55', 10.3797, -71.4554, 1, '0', 'Por Favor Espere', 'Por Favor Espere', 'Por Favor Espere', 'Encargado', 'Por Favor Espere', 0),
(65, 6, '2018-03-15 10:57:51', 10.3797, -71.4554, 1, '0', 'Por Favor Espere', 'Por Favor Espere', 'Por Favor Espere', 'Encargado', 'Por Favor Espere', 0),
(66, 6, '2018-03-15 10:57:51', 10.3797, -71.4554, 1, '0', 'Por Favor Espere', 'Por Favor Espere', 'Por Favor Espere', 'Encargado', 'Por Favor Espere', 0),
(67, 5, '2018-03-15 14:14:16', 10.6674, -71.6081, 1, '0', 'Baripetrol', 'JosÃ© Luis Araujo', '02617552000', 'Encargado', 'Soluforce, proceso de 27 Km. Campo JesÃºs MarÃ­a S', 77925),
(68, 6, '2018-03-15 14:32:55', 10.2152, -71.3397, 1, '0', 'PETROZAMORA', 'Yorman Sepulveda', ' 58 412-6686840', 'Encargado', 'Proyecto de 2 lÃ­neas de 6\" para tuberÃ­a de media', 67782),
(69, 6, '2018-03-15 14:35:36', 10.2152, -71.3397, 1, '0', 'Petrozamora', 'Rafael Quevedo', '0261-8064849', 'Encargado', 'Todas. Actualmente tienen varios procesos en estat', 67800),
(70, 0, '2018-03-15 22:45:35', 10.4844, -66.8853, 0, 'indcai', 'haoidsunl', '0', '0', '0', '0', 0),
(71, 0, '2018-03-15 22:46:44', 10.4844, -66.8853, 1, '0', 'fv', 'xcvzxv', 'xcvx', 'Encargado', 'vcxvz', 0),
(72, 3, '2018-03-15 22:49:13', 10.4844, -66.8853, 1, '0', 'dasda', 'ada', 'asd', 'Encargado', 'asd', 0),
(73, 6, '2018-03-15 23:47:34', 10.489, -66.8795, 1, '0', 'wrrw', 'erewr', 'wer', 'Encargado', 'werw', 32);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id_visitas`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id_visitas` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
