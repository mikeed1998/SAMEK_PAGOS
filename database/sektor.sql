-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2022 a las 22:18:52
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sektor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL,
  `menu_display` tinyint(1) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `user`, `email`, `password`, `role`, `menu_display`, `activo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@wozial.com', '$2a$10$4RkbKKmavc66IzEvXM6Ek.gH9H.aqsX9F4HWL75ts0ydOChZWvSKy', 1, 1, 1, '7bcbWneSubNyaE2pGrIcVCozYm8yAXH4dmNiQyaBOYKJuQxNGFQQdNWIMgQU', '2020-10-14 23:24:37', '2020-10-14 23:24:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrusels`
--

CREATE TABLE `carrusels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT 666
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carrusels`
--

INSERT INTO `carrusels` (`id`, `titulo`, `subtitulo`, `image`, `url`, `video`, `orden`) VALUES
(3, NULL, NULL, '0jAcePKvAJNI5EFoIBkK2qwfvUcn9o.jpg', NULL, NULL, 13),
(20, NULL, NULL, 'DDgpC337KkEdhwKWyOeOs38n2UAfDI.jpg', NULL, NULL, 1),
(21, NULL, NULL, 'nxIsKMKwxuYr1VvoQfdvVP3dd4odSO.jpg', NULL, NULL, 11),
(22, NULL, NULL, 'jEJGrG9uL528X1WIc48YDcpKA84wfH.jpg', NULL, NULL, 7),
(23, NULL, NULL, 'FNDudXjjW6ttl7oKiDKHXJMHune8zn.jpg', NULL, NULL, 6),
(26, NULL, NULL, 'BtKIGsTIsfun3dE9J3w2ySQixmMhuq.jpg', NULL, NULL, 12),
(27, NULL, NULL, 'DdhoTTR3XF4X86b2xhq2zjiEOBsIEL.jpg', NULL, NULL, 10),
(28, NULL, NULL, 'LzGPME0sAI8WxnfFlpHvaPV7hC6EHt.jpg', NULL, NULL, 0),
(29, NULL, NULL, '65GySGByw7v10eWxveTEgsnMZ32879.jpg', NULL, NULL, 3),
(30, NULL, NULL, 'A3MyLsvZRd4RB1JI4jcPRJyLfkA95y.jpg', NULL, NULL, 4),
(31, NULL, NULL, 'naUwApZyzCgDCbM72eOUUBSYfx42l3.jpg', NULL, NULL, 2),
(32, NULL, NULL, '2t6FMflHrUtmrSSEIrkUGhd8dt0BLd.jpg', NULL, NULL, 5),
(35, NULL, NULL, 'PXkFO6vRwMfDvJeY4NxHZckAXVarbN.png', NULL, NULL, 0),
(37, NULL, NULL, 'ScZZfJXdbmQ0De67h3gmwwSHWTQm4h.png', NULL, NULL, 6),
(39, NULL, NULL, 'Kbu9Oolrpwjzry7PCytuqQzfqY5bHU.png', NULL, NULL, 1),
(40, NULL, NULL, '4NDnSgSm8ZsLN7DxXAQ6TEtyeVr9k2.png', NULL, NULL, 4),
(41, NULL, NULL, 'aBc4Gn9XOC4vwKxob3vskEo7v6aQlM.png', NULL, NULL, 2),
(42, NULL, NULL, '2REJC23RKVXgHsJRaOiVRSRfgVKbKU.png', NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int(11) NOT NULL DEFAULT 0,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `orden` int(11) NOT NULL DEFAULT 666
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `slug`, `parent`, `activo`, `orden`) VALUES
(1, 'Fianzas', 'fianzas', 0, 1, 666),
(2, 'Seguros', 'seguros', 0, 1, 666);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracions`
--

CREATE TABLE `configuracions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodspag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypalemail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destinatario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destinatario2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remitente` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remitentepass` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remitentehost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remitenteport` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remitenteseguridad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `envio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `envioglobal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iva` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `incremento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mapa` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `configuracions`
--

INSERT INTO `configuracions` (`id`, `title`, `description`, `prodspag`, `paypalemail`, `destinatario`, `destinatario2`, `remitente`, `remitentepass`, `remitentehost`, `remitenteport`, `remitenteseguridad`, `telefono`, `whatsapp`, `whatsapp2`, `facebook`, `instagram`, `youtube`, `linkedin`, `envio`, `envioglobal`, `iva`, `incremento`, `mapa`, `direccion`, `created_at`, `updated_at`) VALUES
(1, 'seguridad privada', 'SEKTOR seguridad', NULL, NULL, 'alexis@wozial.com', NULL, 'desarrollo@wozial.com', 'AC2h#4(oL3oR', 'mail.wozial.com', '26', NULL, '3333333333', '', '', 'https://www.facebook.com/', '', NULL, NULL, NULL, NULL, NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3735.26095032911!2d-100.3780338847383!3d20.57739830840845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d344c63af2b2af%3A0x8506d3bdeed8e510!2sAv.%20Luis%20Vega%20Monrroy%20901A%2C%20zona%20dos%20extendida%2C%20Plazas%20del%20Sol%201ra%20Secc%2C%2076099%20Santiago%20de%20Quer%C3%A9taro%2C%20Qro.!5e0!3m2!1ses-419!2smx!4v1635149990350!5m2!1ses-419!2smx\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', '', NULL, '2022-08-08 18:42:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilios`
--

CREATE TABLE `domicilios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numext` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numint` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entrecalles` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colonia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Mexico',
  `favorito` tinyint(1) DEFAULT NULL,
  `user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elementos`
--

CREATE TABLE `elementos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `elemento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contenido` tinyint(1) NOT NULL DEFAULT 0,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `orden` int(11) NOT NULL DEFAULT 666,
  `seccion` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `elementos`
--

INSERT INTO `elementos` (`id`, `elemento`, `texto`, `imagen`, `url`, `contenido`, `activo`, `orden`, `seccion`) VALUES
(1, 'Seguridad privada', '<div>Para nosotros prestar servicios de vigilancia es hablar de an&aacute;lisis de riesgos, economizaci&oacute;n mediante tecnolog&iacute;a, formaci&oacute;n espec&iacute;fica para cada puesto, ayuda continua desde nuestros servicios de supervisi&oacute;n y de contacto cercano con cada cliente.</div>', NULL, NULL, 0, 1, 666, 1),
(2, 'Portada principal', NULL, 'usUvfZqfExmpaaAofPIiukDLUJviLD.jpg', NULL, 1, 1, 666, 1),
(3, 'Servicio integral', '<div style=\"text-align: center;\">Nuestra estrategia esta enfocada en ser diferentes a nuestra competencia y ofrecer a nuestros clientes valor agregado en todas nuestras soluciones de seguridad.</div>', NULL, NULL, 0, 1, 666, 1),
(4, 'Titulo contacto', '<div>\r\n<div>\r\n<div>SOLICITA TU COTIZACION</div>\r\n</div>\r\n</div>', NULL, NULL, 0, 1, 666, 1),
(5, 'Productos disponibles', '<div style=\"text-align: left;\">Nuestra experiencia en seguridad incluye una amplia gama de&nbsp; industrias y negocios&nbsp; que conf&iacute;an en Sektor sus plantas industriales, su patrimonio, sus mercanc&iacute;a y la integridad f&iacute;sica de sus empleados.</div>', NULL, NULL, 0, 1, 666, 1),
(6, 'productos disponible', NULL, 'Xoyl45a5o5pYlL36DDtWVvMzl9LyFW.jpg', NULL, 1, 1, 666, 1),
(7, 'Soluciones', '<div>Para nosotros prestar&nbsp;<strong>servicios de vigilancia</strong>&nbsp;es hablar de an&aacute;lisis de riesgos, economizaci&oacute;n mediante tecnolog&iacute;a, formaci&oacute;n espec&iacute;fica para cada puesto, ayuda cont&iacute;nua desde nuestros servicios de supervisi&oacute;n y de contacto cercano con cada cliente.</div>', NULL, NULL, 0, 1, 666, 3),
(8, 'Carta solucion 1 - titulo', '<div>Alarmas recidenciales y comerciales</div>', NULL, NULL, 0, 1, 666, 3),
(9, 'Carta solucion 1 - descripcion', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti nesciunt ipsum ab amet harum vitae provident architecto iure. Libero, reprehenderit! Laudantium odit blanditiis doloribus nesciunt, velit sint nam necessitatibus ad?&nbsp;</div>', NULL, NULL, 0, 1, 666, 3),
(10, 'Carta solucion 1', NULL, 'CYSF3ZkiQMPuZL3SgxHlXJJ638haYr.jpg', NULL, 1, 1, 666, 3),
(11, 'Carta solucion 2 - titulo', '<div>\r\n<div>\r\n<div>Sistema de video vigilancia..</div>\r\n</div>\r\n</div>', NULL, NULL, 0, 1, 666, 3),
(12, 'Carta solucion 2 - descripcion', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti nesciunt ipsum ab amet harum vitae provident architecto iure. Libero, reprehenderit! Laudantium odit blanditiis doloribus nesciunt, velit sint nam necessitatibus ad? In, optio.</div>', NULL, NULL, 0, 1, 666, 3),
(13, 'Carta solucion 2', NULL, '0kKLdOxz7XJke5dv9wZSpFgX61jwl0.jpg', NULL, 1, 1, 666, 3),
(14, 'Carta solucion 3 - titulo', '<div>Control de accesos</div>', NULL, NULL, 0, 1, 666, 3),
(15, 'Carta solucion 3 - descripcion', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti nesciunt ipsum ab amet harum vitae provident architecto iure. Libero, reprehenderit! Laudantium odit blanditiis doloribus nesciunt, velit sint nam necessitatibus ad? In, optio.</div>', NULL, NULL, 0, 1, 666, 3),
(16, 'Carta solucion 3', NULL, 'gPzfSFjvPF38f954C6AWodqmz7Yvuv.jpg', NULL, 1, 1, 666, 3),
(17, 'Carta solucion 4 - titulo', '<div>Geolocalizacion</div>', NULL, NULL, 0, 1, 666, 3),
(18, 'Carta solucion 4 - descripcion', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti nesciunt ipsum ab amet harum vitae provident architecto iure. Libero, reprehenderit! Laudantium odit blanditiis doloribus nesciunt, velit sint nam necessitatibus ad? In, optio.</div>', NULL, NULL, 0, 1, 666, 3),
(19, 'Carta solucion 4', NULL, '0HXDi3iQKUUMpc6H05J3TS1hAEY4DO.jpg', NULL, 1, 1, 666, 3),
(20, 'Carta solucion 5 - titulo', '<div>Alarmas contra incendios</div>', NULL, NULL, 0, 1, 666, 3),
(21, 'Carta solucion 5 - descripcion', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti nesciunt ipsum ab amet harum vitae provident architecto iure. Libero, reprehenderit! Laudantium odit blanditiis doloribus nesciunt, velit sint nam necessitatibus ad? In, optio.</div>', NULL, NULL, 0, 1, 666, 3),
(22, 'Carta solucion 5', NULL, 'fZD4RalPbpvZgW4gDPOo4Nzu4RDiQV.jpg', NULL, 1, 1, 666, 3),
(23, 'Carta solucion 6 - titulo', '<div>Otros</div>', NULL, NULL, 0, 1, 666, 3),
(24, 'Carta solucion 6 - descripcion', '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti nesciunt ipsum ab amet harum vitae provident architecto iure. Libero, reprehenderit! Laudantium odit blanditiis doloribus nesciunt, velit sint nam necessitatibus ad? In, optio.</div>', NULL, NULL, 0, 1, 666, 3),
(25, 'Carta solucion 6', NULL, 'FzNFZ3R7UckGAV8mlL0guJSbxHRcx0.jpg', NULL, 1, 1, 666, 3),
(26, 'Carta solucion 7 - titulo', NULL, NULL, NULL, 0, 1, 666, 3),
(27, 'Carta solucion 7 - descripcion', NULL, NULL, NULL, 0, 1, 666, 3),
(28, 'Carta solucion 7', NULL, NULL, NULL, 1, 1, 666, 3),
(29, 'Carta solucion 8 - titulo', NULL, NULL, NULL, 0, 1, 666, 3),
(30, 'Carta solucion 8 - descripcion', NULL, NULL, NULL, 0, 1, 666, 3),
(31, 'Carta solucion 8', NULL, NULL, NULL, 1, 1, 666, 3),
(32, 'Carta solucion 9 - titulo', NULL, NULL, NULL, 0, 1, 666, 3),
(33, 'Carta solucion 9 - descripcion', NULL, NULL, NULL, 0, 1, 666, 3),
(34, 'Carta solucion 9', NULL, NULL, NULL, 1, 1, 666, 3),
(35, 'Vacantes disponibles', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam reprehenderit incidunt eum magni', NULL, NULL, 0, 1, 666, 4),
(36, 'Nosotros txt 1', '<div style=\"text-align: justify;\">En Sektor contamos con un amplio rango de especialistas en servicios de seguridad fisica y electronica para satisfacer las necesidades de nuestros clientes.</div>\r\n<div style=\"text-align: justify;\">&nbsp;</div>\r\n<div style=\"text-align: justify;\">Creemos en la mejora continua asi que invertimos fuertemenete en capacitacion y nueva tecnologia para asegurarnos de estar a la vanguardia de nuestra industria.</div>', NULL, NULL, 0, 1, 666, 5),
(37, 'Nostros txt 2', '¿Es posible vivir apasionado por la seguridad? Bueno, asi vivimos en Secktor, nuestro equipo de directores han pasado toda su vida laboral en el ramo de la seguridad y poseen una amplia experiencia en sus respectivas areas. Sektor se establecio en 2005 asi que podemos ofrecer nuestra experiencia e innovacion a nuestros clientes', NULL, NULL, 0, 1, 666, 5),
(38, 'Vision', '<div style=\"text-align: justify;\">&iquest;Es posible vivir apasionado por la seguridad? Bueno, as&iacute; vivimos en Sektor, nuestro equipo de directores han pasado toda su vida laboral en el ramo de la seguridad y poseen una amplia experiencia en sus respectivas &aacute;reas. Sektor se estableci&oacute; en 2005 as&iacute; que podemos ofrecer nuestra experiencia e innovaci&oacute;n a nuestros clientes.</div>', NULL, NULL, 0, 1, 666, 5),
(39, 'Mision', '<div style=\"text-align: justify;\">Estamos enfocados en entender las necesidades de nuestros clientes y satisfacerlas. Nuestra compa&ntilde;&iacute;a ha crecido de forma constante cada a&ntilde;o, pero siempre nos hemos asegurado que los est&aacute;ndares de calidad y servicio se mantengan en todas las cosas que hacemos.</div>', NULL, NULL, 0, 1, 666, 5),
(40, 'Valores', '<div style=\"text-align: justify;\">Sentimos pasi&oacute;n al ayudar a nuestros clientes a proteger de forma eficiente sus casas y negocios con lo mejor en tecnolog&iacute;a, sistemas y el personal mas altamente calificado y entrenado.</div>', NULL, NULL, 0, 1, 666, 5),
(41, 'Certificacion', 'En Sektor contamos con un amplio rango de especialistas en servicios de seguridad fisica y electronica para satisfacer las necesidades de nuestros clientes, Creemos en la mejora.', NULL, NULL, 0, 1, 666, 5),
(42, 'Certificacion carta num', '350', NULL, NULL, 0, 1, 666, 5),
(43, 'Certificacion carta titulo', 'CLIENTES SEGUROS', NULL, NULL, 0, 1, 666, 5),
(44, 'Certificacion carta texto', 'En Sektor contamos con un amplio rango de especialistas en servicios de seguridad.', NULL, NULL, 0, 1, 666, 5),
(45, 'Certificacion carta num - 2', '350', NULL, NULL, 0, 1, 666, 5),
(46, 'Certificacion carta titulo - 2', 'CLIENTES SEGUROS', NULL, NULL, 0, 1, 666, 5),
(47, 'Certificacion carta texto - 2', 'En Sektor contamos con un amplio rango de especialistas en servicios de seguridad.', NULL, NULL, 0, 1, 666, 5),
(48, 'Certificacion carta num - 3', '350', NULL, NULL, 0, 1, 666, 5),
(49, 'Certificacion carta titulo - 3', 'CLIENTES SEGUROS', NULL, NULL, 0, 1, 666, 5),
(50, 'Certificacion carta texto - 3', 'En Sektor contamos con un amplio rango de especialistas en servicios de seguridad.', NULL, NULL, 0, 1, 666, 5),
(51, 'Portada soluciones', NULL, 'PawdzA9KY5Tbt5H8OwG8TKENNTODpv.jpg', NULL, 1, 1, 666, 3),
(52, 'Portada vacantes', NULL, 'rgYL8RJTa0n24VLmLwQ9pMS9puRDvJ.jpg', NULL, 1, 1, 666, 4),
(53, 'Portada solicita tu cotizacion', NULL, '7C5HueB4Xgi4g3hYdhZ4DVDpxj8k8t.jpg', NULL, 1, 1, 666, 1),
(57, 'Portada nosotros', NULL, '5Hae9ThpEz5WS5xJQVxPnvrIO9QYtG.jpg', NULL, 1, 1, 666, 5),
(58, '', NULL, NULL, NULL, 0, 1, 666, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rfc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `razon_social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numext` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numint` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colonia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `municipio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pregunta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `respuesta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden` int(11) NOT NULL DEFAULT 666,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_13_163806_create_admins_table', 1),
(5, '2020_10_14_181530_create_configuracions_table', 1),
(6, '2020_12_08_170359_create_carrusels_table', 1),
(7, '2020_12_09_193424_create_politicas_table', 1),
(8, '2020_12_16_000636_create_faqs_table', 1),
(9, '2021_02_02_175759_create_seccions_table', 1),
(10, '2021_02_02_175823_create_elementos_table', 1),
(13, '2021_10_27_064531_create_categorias_table', 2),
(19, '2021_04_01_184932_create_productos_table', 3),
(20, '2021_04_02_200200_create_productos_photos_table', 3),
(24, '2022_07_18_203052_create_vacantes_table', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatus` int(11) DEFAULT NULL,
  `guia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkguia` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicilio` bigint(20) UNSIGNED NOT NULL,
  `factura` tinyint(1) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `importe` double(9,2) NOT NULL,
  `iva` double(9,2) NOT NULL,
  `total` double(9,2) NOT NULL,
  `envio` double(9,2) DEFAULT NULL,
  `comprobante` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cupon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelado` tinyint(1) DEFAULT 0,
  `usuario` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `envia_resp` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_detalles`
--

CREATE TABLE `pedido_detalles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double(9,2) NOT NULL,
  `importe` double(9,2) NOT NULL,
  `total` double(9,2) NOT NULL,
  `pedido` bigint(20) UNSIGNED NOT NULL,
  `producto` bigint(20) UNSIGNED NOT NULL,
  `color` bigint(20) UNSIGNED DEFAULT NULL,
  `log` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `politicas`
--

CREATE TABLE `politicas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `archivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `politicas`
--

INSERT INTO `politicas` (`id`, `titulo`, `descripcion`, `archivo`, `created_at`, `updated_at`) VALUES
(1, 'aviso de privacidad', NULL, NULL, NULL, '2022-03-31 17:19:19'),
(2, 'metodos de pago', NULL, NULL, NULL, NULL),
(3, 'devoluciones', NULL, NULL, NULL, NULL),
(4, 'terminos y condiciones', NULL, NULL, NULL, NULL),
(5, 'garantias', NULL, NULL, NULL, NULL),
(6, 'politicas de envio', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `portada` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inicio` tinyint(1) NOT NULL DEFAULT 0,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `orden` int(11) NOT NULL DEFAULT 666,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `categoria`, `portada`, `pdf`, `inicio`, `activo`, `orden`, `created_at`, `updated_at`) VALUES
(19, 'Guardias especializados', '<p style=\"text-align: justify;\">Nuestros guardias de seguridad son producto de un estricto proceso de selecci&oacute;n que supera los est&aacute;ndares marcados por las certificadoras internacionales (BASC, ISO) y son reevaluados peri&oacute;dicamente para verificar que no presenten desviaciones.</p>\r\n<p style=\"text-align: justify;\">Para nosotros la capacitaci&oacute;n es esencial por lo que nuestros guardias de seguridad la reciben constantemente para cumplir siempre con las necesidades de cada cliente.</p>\r\n<p style=\"text-align: justify;\">Este servicio puede contar con soporte tecnol&oacute;gico, monitoreo o diferentes tipos de controles, sabemos que cada cliente tiene necesidades distintas por lo que nuestros especialistas detectaran la mejor forma de proteger su patrimonio.</p>', NULL, NULL, NULL, 1, 1, 666, '2022-07-19 23:43:45', '2022-08-08 23:46:18'),
(21, 'Custodias de mercancía', '<p style=\"text-align: justify;\">Pasa nosotros custodiar el traslado de mercanc&iacute;as significa mucho m&aacute;s que simplemente \"acompa&ntilde;arlas\" durante el trayecto.<br />Sabemos el valor, no s&oacute;lo econ&oacute;mico, sino estrat&eacute;gico y de oportunidad que tiene cada embarque; teniendo esto en cuenta desarrollamos estrategias de acuerdo a las caracter&iacute;sticas de cada cliente implement&aacute;ndolas con procesos detallados y tecnolog&iacute;a de punta</p>', NULL, NULL, NULL, 1, 1, 666, '2022-08-04 20:55:44', '2022-08-08 23:49:25'),
(22, 'Servicio de seguridad móviles', '<div>Nuestro servicio de seguridad m&oacute;vil es una excelente opci&oacute;n para peque&ntilde;os y medianos negocios, en este servicio un guardia de seguridad realiza patrullajes a un n&uacute;mero limitado de clientes, el guardia puede realizar m&uacute;ltiples consignas, desde prevenir el robo, verificar cierre de instalaciones y apagar sistemas de energ&iacute;a.</div>', NULL, NULL, NULL, 1, 1, 666, '2022-08-08 18:49:27', '2022-08-08 23:50:01'),
(23, 'Monitore de alarmas', '<p style=\"text-align: justify;\">Sektor es una empresa seria y comprometida, dedicada a la seguridad integral. Siete a&ntilde;os de experiencia nos respaldan.<br /><strong>Aproveche los beneficios que sektor le ofrece:<br /></strong>Contrataci&oacute;n de monitoreo de alarmas SIN plazos forzosos. ( v&aacute;lido en la compra del equipo)<br />Nuestra central de monitoreo se encuentra en&nbsp;<strong>GUADALAJARA<br /></strong>Contamos con la mejor y m&aacute;s avanzada tecnolog&iacute;a.<br />Contamos con equipo de patrullaje propio.<br />Ofrecemos equipos de alarma en comodato<br />Nuestros sistemas de monitoreo trabajan bajo est&aacute;ndares de clase mundial.</p>', NULL, NULL, NULL, 1, 1, 666, '2022-08-08 23:51:20', '2022-08-10 00:36:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_photos`
--

CREATE TABLE `productos_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT 666
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos_photos`
--

INSERT INTO `productos_photos` (`id`, `producto`, `titulo`, `image`, `orden`) VALUES
(14, 19, NULL, '1vzHMEiCSrMSk9poMBXWxxTZKqVmrC.jpg', 666),
(15, 21, NULL, 'AG4sNo26AihxlYfYJYdoqF9k0Wemch.jpg', 666),
(16, 22, NULL, '8n55vmjIzHKpoWOcUux35afingnqZA.jpg', 666),
(17, 23, NULL, 'QlbB541AxzCEQt3GtQVcTSZHxNNPKR.jpg', 666);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_presentacions`
--

CREATE TABLE `producto_presentacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tamanio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_relacions`
--

CREATE TABLE `producto_relacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto` bigint(20) UNSIGNED NOT NULL,
  `otroProducto` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_sizes`
--

CREATE TABLE `producto_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tamanio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_variantes`
--

CREATE TABLE `producto_variantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto` bigint(20) UNSIGNED NOT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `presentacion` bigint(20) UNSIGNED NOT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descuento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `orden` int(11) NOT NULL DEFAULT 666,
  `tipo_envio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peso` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `largo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ancho` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccions`
--

CREATE TABLE `seccions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `portada` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `seccions`
--

INSERT INTO `seccions` (`id`, `seccion`, `portada`, `slug`) VALUES
(1, 'inicio', NULL, 'index'),
(2, 'servicios', NULL, 'services'),
(3, 'soluciones', NULL, 'solutios'),
(4, 'vacantes', NULL, 'vacant'),
(5, 'nosotros', NULL, 'about-us'),
(6, 'contacto', NULL, 'contact');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inicio` tinyint(1) NOT NULL DEFAULT 0,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `orden` int(11) NOT NULL DEFAULT 666,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_photos`
--

CREATE TABLE `servicios_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `servicio` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int(11) NOT NULL DEFAULT 666
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empresa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rfc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nivel` tinyint(4) NOT NULL DEFAULT 0,
  `puntos` int(11) NOT NULL,
  `distr_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referido_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `distribuidor` tinyint(1) NOT NULL DEFAULT 0,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `role` int(11) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `username`, `email`, `email_verified_at`, `telefono`, `facebook`, `empresa`, `avatar`, `rfc`, `nivel`, `puntos`, `distr_code`, `referido_by`, `distribuidor`, `profile`, `activo`, `role`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'yahir', 'lopez', '', 'yahir@wozial.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '', NULL, 0, NULL, 1, NULL, '$2y$10$ixFvI1ajnMzpjT8EhK0KsOzC/I8X5prS5vUZLKCsh2eOf7zllQPim', NULL, '2022-02-28 18:49:39', '2022-02-28 23:10:39', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacantes`
--

CREATE TABLE `vacantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `portada` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oferta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `requisitos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vacantesdisp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inicio` tinyint(1) NOT NULL DEFAULT 0,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `orden` int(11) NOT NULL DEFAULT 666,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vacantes`
--

INSERT INTO `vacantes` (`id`, `portada`, `titulo`, `subtitulo`, `oferta`, `requisitos`, `vacantesdisp`, `salario`, `inicio`, `activo`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'zlidnodXw0kt1bD9KLmjVE4uyZGl9d.jpg', 'Reclutamiento para guardia de seguridad', '$,8000 a $9,000 Libres', '<div>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium odit ducimus sed deserunt consectetur quas quis quos commodi vero quo corporis nisi necessitatibus aliquid aperiam modi beatae, eos, numquam adipisci, sit quod voluptates eaque et quasi! Veritatis aut corporis placeat cumque quae. Autem totam iste temporibus voluptate velit possimus nam.</div>', 'Educacion minima: Educacion secundaria; Menos de un año de experiencia; Edad entre 18 y 45 años; Disponibilidad de viajar: No', '5', '$,8000 a $9,000 Libres', 0, 1, 666, NULL, '2022-08-08 23:39:17'),
(2, 'GtvsaKFx8jnvsb34VihHTkGwDPeKOs.jpg', 'Guardia medio turno', '$9000 - $10000000 libres', '<div>asdlaskjdlkas salkjd lkasjd klsajd klasj dlksja dlkjsalkdj salkjd lsja dlksa dlksa jdlksaj dklj aslkdj aslkjd lkasjd</div>', 'hola', '5', '$9000 - $10000000 libres', 0, 1, 666, '2022-07-21 00:04:40', '2022-08-08 23:57:08'),
(4, 'Hq8srghiM2arQy0W1tCZTvzgeZMtCe.jpg', 'Guardia medio turno', '$9000 - $10000000 libres', '<div>asdlaskjdlkas salkjd lkasjd klsajd klasj dlksja dlkjsalkdj salkjd lsja dlksa dlksa jdlksaj dklj aslkdj aslkjd lkasjd</div>', 'hola', '5', '$9000 - $10000000 libres', 0, 1, 666, '2022-07-21 00:06:48', '2022-08-08 23:57:21'),
(5, NULL, 'Gurdia medio turno', '$9000 - $10000000 libres', '<div>asdlaskjdlkas salkjd lkasjd klsajd klasj dlksja dlkjsalkdj salkjd lsja dlksa dlksa jdlksaj dklj aslkdj aslkjd lkasjd</div>', 'hola', '5', '$9000 - $10000000 libres', 0, 0, 666, '2022-07-21 00:08:12', '2022-08-08 23:39:54'),
(6, 'xLh30SU2ywk3pyeiJoEEtb1FOx07na.jpg', 'guardias 1', 'excelente ambiente', '<div>excelente ambienteexcelente ambienteexcelente ambienteexcelente ambienteexcelente ambienteexcelente ambienteexcelente ambiente</div>', 'excelente ambiente; excelente ambiente: excelente ambiente :', '5', '2000 a 3000', 0, 0, 666, '2022-08-08 18:55:52', '2022-08-08 23:39:57');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_user_unique` (`user`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indices de la tabla `carrusels`
--
ALTER TABLE `carrusels`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categorias_slug_unique` (`slug`);

--
-- Indices de la tabla `configuracions`
--
ALTER TABLE `configuracions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `domicilios_user_foreign` (`user`);

--
-- Indices de la tabla `elementos`
--
ALTER TABLE `elementos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `elementos_seccion_foreign` (`seccion`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `facturas_rfc_unique` (`rfc`),
  ADD UNIQUE KEY `facturas_mail_unique` (`mail`),
  ADD KEY `facturas_user_foreign` (`user`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `politicas`
--
ALTER TABLE `politicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_photos`
--
ALTER TABLE `productos_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_photos_producto_foreign` (`producto`);

--
-- Indices de la tabla `producto_relacions`
--
ALTER TABLE `producto_relacions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seccions`
--
ALTER TABLE `seccions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seccions_slug_unique` (`slug`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_distr_code_unique` (`distr_code`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indices de la tabla `vacantes`
--
ALTER TABLE `vacantes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `carrusels`
--
ALTER TABLE `carrusels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `configuracions`
--
ALTER TABLE `configuracions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `elementos`
--
ALTER TABLE `elementos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `politicas`
--
ALTER TABLE `politicas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `productos_photos`
--
ALTER TABLE `productos_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `producto_relacions`
--
ALTER TABLE `producto_relacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `seccions`
--
ALTER TABLE `seccions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vacantes`
--
ALTER TABLE `vacantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `elementos`
--
ALTER TABLE `elementos`
  ADD CONSTRAINT `elementos_seccion_foreign` FOREIGN KEY (`seccion`) REFERENCES `seccions` (`id`);

--
-- Filtros para la tabla `productos_photos`
--
ALTER TABLE `productos_photos`
  ADD CONSTRAINT `productos_photos_producto_foreign` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
