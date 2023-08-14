-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 18-07-2022 a las 17:02:05
-- Versión del servidor: 10.3.34-MariaDB-0ubuntu0.20.04.1
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `admin_confiance_db`
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
(1, 'CONFIANSE', 'CONFIANSE seguros', NULL, NULL, 'yahir@wozial.com', NULL, 'desarrollo@wozial.com', 'AC2h#4(oL3oR', 'mail.wozial.com', '26', NULL, '4333333', '33333', '', 'https://www.facebook.com/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3735.26095032911!2d-100.3780338847383!3d20.57739830840845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d344c63af2b2af%3A0x8506d3bdeed8e510!2sAv.%20Luis%20Vega%20Monrroy%20901A%2C%20zona%20dos%20extendida%2C%20Plazas%20del%20Sol%201ra%20Secc%2C%2076099%20Santiago%20de%20Quer%C3%A9taro%2C%20Qro.!5e0!3m2!1ses-419!2smx!4v1635149990350!5m2!1ses-419!2smx\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>', 'Av. Luis Vega Monrroy 901A, Plazas del Sol 1ra Secc, 76099 Santiago de Querétaro, Qro.', NULL, '2022-06-07 16:42:38');

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
(1, 'Fianzas y seguros', '<div><strong><em>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </em></strong><em>Sabemos lo importante que es para ti, que cuentes con la mejor asesor&iacute;a para que tus proyectos crezcan, CONFIANSE te asesora y trabaja con las mejores afianzadoras del pa&iacute;s.</em></div>\r\n<div>&nbsp;</div>\r\n<div><em>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Somos una empresa con m&aacute;s de 15 a&ntilde;os de experiencia, brindando un servicio personalizado e integral a nuestros clientes, en todos los &aacute;mbitos del sector afianzador.</em></div>', NULL, NULL, 0, 1, 666, 1),
(2, 'por que una fianza', '<div style=\"text-align: center;\"><em>&nbsp; &nbsp; &nbsp;Por qu&eacute; nos interesa, garantizar y afianzar el &eacute;xito de tus proyectos.</em></div>\r\n<div style=\"text-align: center;\">&nbsp;</div>\r\n<div style=\"text-align: center;\"><em>&nbsp; &nbsp; &nbsp; Adquirir una fianza en Confianse te da la certeza, que tendr&aacute;s la asesor&iacute;a y servicio que tu proyecto necesita para que sea afianzado de una forma &aacute;gil y oportuna; depurando y actualizando constantemente tus l&iacute;neas de afianzamiento con las mejores afianzadoras del sector.</em></div>', NULL, NULL, 0, 1, 666, 1),
(3, 'Titulo carta 1', '<div class=\"fs-4 text-uppercase text-center fw-bold my-2\" style=\"text-align: center;\"><span style=\"color: #34495e;\">Tu seguridad es prioridad</span></div>', NULL, NULL, 0, 1, 666, 1),
(4, 'carta 1', NULL, 'Ngmzq9WuUPCVUCbJnsUgroohOT8bz4.jpg', NULL, 1, 1, 666, 1),
(5, 'descripcion carta 1', '<p style=\"text-align: center;\"><span style=\"color: #236fa1;\"><em>&nbsp; &nbsp;Afianzamos todo tipo de proyectos; Siempre brindando excelencia y calidad en el servicio.</em></span></p>', NULL, NULL, 0, 1, 666, 1),
(6, 'Titulo carta 2', '<div class=\"fs-4 text-uppercase text-center fw-bold my-2\" style=\"text-align: center;\"><span style=\"color: #34495e;\">Asesor&iacute;a personalizada</span></div>', NULL, NULL, 0, 1, 666, 1),
(7, 'carta 2', NULL, 'Witmuy2hDjpRt2o2QFiMuiLBcyYJNh.jpg', NULL, 1, 1, 666, 1),
(8, 'descripcion carta 2', '<p style=\"text-align: center;\"><span style=\"color: #236fa1;\"><em>Nos interesa acompa&ntilde;arte en todo el proceso, desde la licitaci&oacute;n de obra, hasta el proceso de entrega. Por lo que sabemos que cada Instituci&oacute;n o proyecto tienen necesidades o requerimientos espec&iacute;ficos.</em></span></p>', NULL, NULL, 0, 1, 666, 1),
(9, 'Titulo carta 3', '<div>\r\n<div class=\"fs-4 text-uppercase text-center fw-bold my-2\" style=\"text-align: center;\"><span style=\"color: #34495e;\">Soluciones </span></div>\r\n<div class=\"fs-4 text-uppercase text-center fw-bold my-2\" style=\"text-align: center;\"><span style=\"color: #34495e;\">inmediatas</span></div>\r\n</div>', NULL, NULL, 0, 1, 666, 1),
(10, 'carta 3', NULL, 'Zoz09WPz7PJrtqGQ7u2ODNOIzJ3oqM.jpg', NULL, 1, 1, 666, 1),
(11, 'descripcion carta 3', '<div style=\"text-align: center;\"><span style=\"color: #236fa1;\"><em>&nbsp; &nbsp; Juntos buscamos las mejores alternativas y soluciones para que todos tus proyectos sean afianzados con la rapidez que tu proyecto necesita.</em></span></div>', NULL, NULL, 0, 1, 666, 1),
(12, 'asesoría', '<div style=\"text-align: center;\"><em>Nos comprometemos a darte soluciones eficaces en todos tus proyectos y tengas la <strong>CONFIANZA</strong> <strong>Y CERTEZA&nbsp;</strong>&nbsp; que te estaremos acompa&ntilde;ando durante todo el proceso de tu proyecto.</em></div>\r\n<div style=\"text-align: center;\">&nbsp;</div>\r\n<div style=\"text-align: center;\"><strong><em>Envianos un mensaje, y con gusto te ayudaremos.</em></strong></div>', NULL, NULL, 0, 1, 666, 1),
(13, 'intro', '<div>&nbsp;</div>\r\n<h3 style=\"text-align: center;\"><em><strong><span style=\"color: #236fa1;\">En CONFIANSE, T&uacute; Confianza es nuestro compromiso&nbsp;&nbsp;</span></strong></em></h3>\r\n<div>&nbsp;</div>\r\n<p style=\"text-align: center; padding-left: 40px;\">&nbsp;</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<div>&nbsp;</div>', NULL, NULL, 0, 1, 666, 2),
(14, 'somos', '<p>&nbsp; &nbsp; &nbsp;Somos un despacho con 15 a&ntilde;os de experiencia en el sector afianzador; ofreciendo soluciones pr&aacute;cticas en todo momento. Somos un equipo comprometido, con pasi&oacute;n y visi&oacute;n.</p>\r\n<p>&nbsp; &nbsp; &nbsp;Y nuestro objetivo es <strong>TU CONFIANZA</strong>, y satisfacci&oacute;n</p>\r\n<div>&nbsp;</div>', NULL, NULL, 0, 1, 666, 3),
(15, 'vision', '<p>&nbsp; &nbsp; &nbsp;Ser un corporativo vanguardista para satisfacer las m&aacute;s altas exigencias de nuestro mercado.</p>', NULL, NULL, 0, 1, 666, 3),
(16, 'mision', '<p>&nbsp; &nbsp; &nbsp;Lograr una excelente relaci&oacute;n comercial donde prevalezca el respeto, la amistad y el buen servicio a nuestros clientes</p>\r\n<p>&nbsp;</p>\r\n<p><strong>AS&Iacute; PODEMOS AYUDARTE</strong></p>\r\n<ul>\r\n<li>Tr&aacute;mite de todo tipo de fianzas.</li>\r\n<li>M&uacute;ltiples opciones de afianzamiento.</li>\r\n<li>Atenci&oacute;n personalizada.</li>\r\n<li>Asesor&iacute;a con personal altamente capacitado.</li>\r\n<li>Esquemas de Afianzamiento para proveedores.</li>\r\n<li>Tr&aacute;mite de cartas de l&iacute;nea.</li>\r\n<li>Cobertura a nivel nacional (emisi&oacute;n en l&iacute;nea).</li>\r\n<li>Actualizaci&oacute;n de documentos previo vencimiento.</li>\r\n<li>Administraci&oacute;n de L&iacute;nea de Afianzamiento.</li>\r\n</ul>\r\n<p><span style=\"background-color: #ffffff; color: #131068;\"><strong>ALIANZAS ESTRAT&Eacute;GICAS</strong></span></p>\r\n<p>&nbsp; &nbsp; &nbsp;Representamos a las mejores afianzadoras y con el mejor equipo de trabajo para ofrecerte la mejor soluci&oacute;n.</p>\r\n<ul>\r\n<li>Aserta</li>\r\n<li>Fianzas Dorama</li>\r\n<li>Berkley</li>\r\n<li>Liberty Fianzas</li>\r\n<li>Mapfre Fianzas</li>\r\n<li>Ace Fianzas Monterrey</li>\r\n<li>Sofimex</li>\r\n</ul>', NULL, NULL, 0, 1, 666, 3),
(17, 'contacto', '<h3 style=\"text-align: left;\">&nbsp;</h3>\r\n<h2 style=\"text-align: center;\"><span style=\"color: #236fa1;\">EN CONFIANSE TENEMOS LA MEJOR SOLUCI&Oacute;N PARA TI</span></h2>\r\n<h3 style=\"text-align: center;\"><span style=\"color: #236fa1;\">Cont&aacute;ctanos y solicita una asesor&iacute;a</span></h3>\r\n<h4 style=\"text-align: left;\"><span style=\"color: #236fa1;\">Domicilio:</span></h4>\r\n<h5 style=\"text-align: left;\"><strong>Calder&oacute;n de la Barca No. 281 Int A, </strong></h5>\r\n<h5 style=\"text-align: left;\"><strong>Col Arcos Sur C.P.44150,</strong></h5>\r\n<h5 style=\"text-align: left;\"><strong> Guadalajara Jalisco.</strong></h5>\r\n<div style=\"text-align: left;\">&nbsp;</div>\r\n<h4 style=\"text-align: left;\"><span style=\"color: #236fa1;\">Telefono Oficina:</span></h4>\r\n<h3 style=\"text-align: left;\">&nbsp;</h3>\r\n<h4 style=\"text-align: left;\"><span style=\"color: #236fa1;\">Celular:</span></h4>\r\n<h5 style=\"text-align: left;\"><strong>Tel 331799 9398</strong></h5>\r\n<h4 style=\"text-align: left;\"><span style=\"color: #236fa1;\">Correo:</span></h4>\r\n<h3 style=\"text-align: left;\"><strong style=\"text-align: center; font-size: 14px;\"><a href=\"mailto:tramirez@confianse.com\">tramirez@confianse.com</a></strong></h3>\r\n<div style=\"text-align: left;\">&nbsp;</div>\r\n<h3 style=\"text-align: center;\">Fianzas y Seguros CONFIANSE</h3>', NULL, NULL, 0, 1, 666, 4);

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
(20, '2021_04_02_200200_create_productos_photos_table', 3);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoria` int(11) NOT NULL,
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
(1, 'fianzas de obra y proveeduria', '<div>&nbsp;</div>\r\n<div>Las fianzas de Construcci&oacute;n m&aacute;s solicitadas por nuestros clientes:</div>\r\n<ul>\r\n<li style=\"text-align: left;\">Fianza Licitaci&oacute;n</li>\r\n<li style=\"text-align: left;\">Fianza de Anticipo</li>\r\n<li style=\"text-align: left;\">Fianza Cumplimiento</li>\r\n<li style=\"text-align: left;\">Fianza de Buena calidad o Vicios Ocultos</li>\r\n</ul>\r\n<h1 style=\"text-align: left;\">&nbsp;</h1>\r\n<p><strong><span style=\"background-color: #ffffff;\">FIANZA DE LICITACION o CONCURSO</span></strong></p>\r\n<div>Garantiza la seriedad de la propuesta econ&oacute;mica previa adjudicaci&oacute;n.</div>\r\n<div>&nbsp;</div>\r\n<p><strong>FIANZA DE ANTICIPO</strong></p>\r\n<div>En esta fianza se garantiza, el buen uso del dinero otorgado.</div>\r\n<div>&nbsp;</div>\r\n<p><strong>FIANZA DE CUMPLIMIENTO</strong></p>\r\n<div>Esta fianza garantiza, la ejecuci&oacute;n total en tiempo y forma del proyecto afianzado.</div>\r\n<div>&nbsp;</div>\r\n<p><strong>FIANZA DE BUENA CALIDAD O VICIOS OCULTOS</strong></p>\r\n<div>Tiene como objetivo principal, garantizar la reparaci&oacute;n de una obra o bien inmueble, de los da&ntilde;os o vicios ocultos en un tiempo determinado.</div>\r\n<div>&nbsp;</div>\r\n<p><strong>FIANZAS DE PROVEEDURIA O SUMINISTRO</strong></p>\r\n<div>Son fianzas similares a las de obra, con la diferencia que solo garantizan la entrega en tiempo y forma.</div>', 1, 'b3PR3AgegQ1JEnFm7UzIrvoh5AJVTi.jpg', NULL, 1, 1, 1, '2022-01-28 02:11:52', '2022-06-30 18:31:05'),
(4, 'obra y proveduirÍa seguro', '<div>obra y proveduir&Iacute;a seguro</div>', 2, 'dqZAdJN0IcbsWc5AGCWZxo1aTtvHeC.jpeg', NULL, 0, 0, 2, '2022-01-28 02:39:33', '2022-06-07 16:10:13'),
(6, 'seguro fiscal', '<div>seguro fiscal</div>', 2, 'PMrepeayrHdDrr533nzVqe6mgpNVxu.jpg', NULL, 0, 0, 0, '2022-02-02 06:16:20', '2022-06-07 16:10:27'),
(8, 'fianzas judiciales', '<p><strong>FIANZAS JUDICIALES PENALES</strong></p>\r\n<p>&nbsp; &nbsp; &nbsp; Este tipo de fianzas son utilizadas en Procesos penales ya sea para:</p>\r\n<ul>\r\n<li>Libertad Provisional</li>\r\n<li>Reparaci&oacute;n de Da&ntilde;os</li>\r\n<li>Sanciones</li>\r\n</ul>\r\n<div>\r\n<p><strong>FIANZAS JUDICIALES NO PENALES</strong></p>\r\n<p>&nbsp; &nbsp; &nbsp;Este tipo de fianzas, garantizan el pago de los da&ntilde;os o perjuicios que se ocasionen<strong> </strong>al tercero, dentro de un juicio civil, mercantil o laboral. Los distintos tipos de fianzas no Penales pueden ser:</p>\r\n<ul>\r\n<li>Laboral</li>\r\n<li>Pensi&oacute;n Alimenticia</li>\r\n<li>Manejos de Albacea</li>\r\n<li>Ejecuci&oacute;n de Sentencia</li>\r\n<li>Embargos Precautorios</li>\r\n</ul>\r\n</div>', 1, 'tHfgfSukYYIVLSOMWi53Pb3vYT1n9I.jpg', NULL, 1, 1, 4, '2022-02-16 23:23:28', '2022-06-30 18:32:35'),
(9, 'fianzas empresariales', '<div>\r\n<p style=\"text-align: justify;\">&nbsp; &nbsp; &nbsp;Estas fianzas est&aacute;n dise&ntilde;adas para las empresas, que quieran garantizar la reparaci&oacute;n de cualquier da&ntilde;o patrimonial ya sea de un empleado, obrero, vendedor que pueda ocasionar a la empresa por actividades como abuso de confianza, robo, fraude. Estas fianzas pueden ser Individuales o Colectivas</p>\r\n<p style=\"text-align: justify;\">&nbsp; &nbsp; &nbsp; &nbsp;Estas fianzas son muy importantes para tu empresa ya que te da la tranquilidad, que el patrimonio de tu empresa, est&aacute; protegido.</p>\r\n</div>', 1, 'DVrguIAsp2dWJCd2nyPb0wKqI8zTFQ.jpg', NULL, 0, 1, 5, '2022-02-16 23:29:13', '2022-06-30 16:48:56'),
(10, 'fianzas fiscales', '<div>\r\n<p style=\"text-align: justify;\">&nbsp; &nbsp; &nbsp; Esta fianza est&aacute; dise&ntilde;ada para garantizar ante alguna autoridad fiscal, como puede s el SAT o IMSS o&nbsp; INFONAVIT ,el cumplimiento de obligaciones derivadas de inconformidades fiscales o convenios de pago, pago de impuestos de importaci&oacute;n&nbsp; o exportaci&oacute;n.</p>\r\n</div>', 1, 'boJTJRcpv9GxLVdq5eA2c3MnKX3UYS.jpg', NULL, 1, 1, 6, '2022-02-16 23:38:31', '2022-06-30 16:49:24'),
(11, 'fianzas de arrendamiento', '<div>\r\n<p>Esta fianza, garantiza las rentas de un bien inmueble ya sea para personas f&iacute;sicas o morales.</p>\r\n</div>', 1, 'CU6a36TJRS2kUjxz4RLOA7vlQbx23v.jpg', NULL, 0, 1, 3, '2022-02-16 23:40:52', '2022-06-30 18:31:58'),
(12, 'fianzas de credito', '<div>\r\n<p style=\"text-align: justify;\">&nbsp; &nbsp; &nbsp; Estas fianzas garantizan, las operaciones ante personas morales o dependencias de Gobierno,&nbsp; el&nbsp; pago de suministros y servicios por ejemplo, gas, energ&iacute;a el&eacute;ctrica, aeropuertos, peaje, gasolina, diesel.</p>\r\n<p style=\"text-align: justify;\">&nbsp; &nbsp; &nbsp;Comprendemos que la rapidez es un factor indispensable en tu proyecto, por lo que el tr&aacute;mite de tus l&iacute;neas de afianzamiento las gestionamos en un plazo de 24 a 48 horas, con expediente completo.</p>\r\n</div>', 1, 'LJQQIJLIdEBhJfnsOAyT7z8VXu9ZeV.jpg', NULL, 0, 1, 7, '2022-02-16 23:45:58', '2022-06-30 18:33:46'),
(13, 'responsabilidad civil', '<div>\r\n<p>&nbsp; &nbsp; &nbsp; Este seguro protege a tu empresa, frente a da&ntilde;os a terceros en sus bienes o en su persona, derivados de las mismas actividades de la empresa.</p>\r\n</div>', 2, 'HMkblIKv8q1wc9HgSviwhVi8m3WzgB.jpg', NULL, 0, 1, 8, '2022-06-03 17:30:33', '2022-06-29 19:14:40'),
(14, 'seguro empresarial', '<div>\r\n<p>&nbsp; &nbsp;Este seguro protege a tu empresa ante cualquier eventualidad, ya sea por robo, desastre natural, accidentes.</p>\r\n</div>', 2, 'Mqe2T1FIgibVM2DgDHtlGGKRmPXHCI.jpg', NULL, 0, 1, 9, '2022-06-03 17:34:50', '2022-06-29 19:15:16'),
(15, 'obra civil', '<div>\r\n<p><strong>&nbsp; &nbsp; &nbsp;</strong>Este seguro cubre la totalidad de la obra, durante la ejecuci&oacute;n de la misma.</p>\r\n</div>', 2, 'ZxAekX2eEiZoWdoLtW0XCSXScrWnYC.jpg', NULL, 0, 1, 10, '2022-06-03 17:35:51', '2022-06-30 18:34:45'),
(16, 'transportación de carga', '<div>\r\n<p>&nbsp; &nbsp; &nbsp;Este seguro responde contra los riesgos derivados de accidentes, aver&iacute;as y actos delictivos sobre las mercanc&iacute;as transportadas.</p>\r\n</div>', 2, 'uVmQ3a4MI5bNcOh1gWKarWsO3vqkYC.jpg', NULL, 0, 1, 11, '2022-06-03 17:36:43', '2022-06-30 17:24:07'),
(17, 'casa habitacion', '<div>\r\n<p>&nbsp; &nbsp; &nbsp;Este seguro ofrece la protecci&oacute;n necesaria para tu casa y los bienes que se encuentran en ella, para cubrir los gastos derivados de accidentes, que pueden darse en tu hogar</p>\r\n</div>', 2, 'WmMfwwhzSJI4rYXhrbmwYBSPJWoSVY.jpg', NULL, 0, 1, 12, '2022-06-03 17:37:16', '2022-06-30 17:24:57'),
(18, 'equipo de contratista y maquinaria', '<div>\r\n<p>&nbsp; &nbsp; &nbsp;Este seguro protege a la maquinaria o equipo pesado.</p>\r\n</div>', 2, 'Ho6wSG17kctutF1JQV5xgDCBMxStiO.jpg', NULL, 0, 1, 13, '2022-06-03 17:38:37', '2022-06-30 17:25:13');

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
(3, 'nosotros', NULL, 'aboutus'),
(4, 'contacto', NULL, 'contact');

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
-- Indices de la tabla `elementos`
--
ALTER TABLE `elementos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `elementos_seccion_foreign` (`seccion`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `politicas`
--
ALTER TABLE `politicas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `productos_photos`
--
ALTER TABLE `productos_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seccions`
--
ALTER TABLE `seccions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
