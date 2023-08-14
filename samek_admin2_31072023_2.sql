-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-08-2023 a las 06:42:12
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `samek_admin2`
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
-- Estructura de tabla para la tabla `aux_productos`
--

CREATE TABLE `aux_productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoria` int(11) NOT NULL,
  `subcategoria` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `aux_productos`
--

INSERT INTO `aux_productos` (`id`, `categoria`, `subcategoria`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'uno', NULL, NULL),
(2, 2, 1, 'dos', NULL, NULL),
(3, 5, 3, '', NULL, NULL),
(4, 5, 3, '', NULL, NULL),
(5, 5, 2, '', NULL, NULL),
(6, 2, 1, '', NULL, NULL),
(7, 2, 4, '', NULL, NULL),
(8, 4, 2, '', NULL, NULL),
(9, 2, 1, '', NULL, NULL),
(10, 3, 2, '', NULL, NULL),
(11, 4, 3, '', NULL, NULL),
(12, 5, 4, '', NULL, NULL),
(13, 6, 1, '', NULL, NULL),
(14, 6, 4, '', NULL, NULL),
(15, 5, 3, '', NULL, NULL),
(16, 4, 2, '', NULL, NULL),
(17, 3, 1, '', NULL, NULL),
(18, 2, 1, '', NULL, NULL),
(19, 1, 3, 'sdsd', NULL, NULL),
(20, 1, 2, 'gfg', NULL, NULL),
(21, 2, 4, '', NULL, NULL);

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
(1, 'seguridad privada', 'SEKTOR seguridad', NULL, NULL, 'info@sektor.com.mx', 'jortiz@sektor.com.mx', 'alexis@wozial.com', '2P2lYvtSAZX9', 'mail.wozial.com', '465', NULL, '3331884040, 3331883180', '3318940000', '', 'https://www.facebook.com/sektoralarmas', '', NULL, NULL, NULL, NULL, NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3732.84572216016!2d-103.3837752!3d20.675854700000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428ae6d6d5fd08d%3A0x439d71abb16f0dda!2sSektor!5e0!3m2!1ses-419!2smx!4v1668797393100!5m2!1ses-419!2smx\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '', NULL, '2022-11-19 00:50:02');

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
(1, 'Sldier', NULL, NULL, NULL, 0, 1, 666, 1),
(3, 'Tienda', NULL, NULL, NULL, 0, 1, 666, 7),
(4, 'Soluciones Texto', 'Somos una empresa 100% mexicana dedicada a la comercialización de productos de impermeabilizante ofreciendo soluciones integrales por problemas de humedades', NULL, NULL, 0, 1, 666, 3),
(5, 'Nosotros texto 1', 'Somos una empresa 100% mexicana dedicada a la comercialización de productos de impermeabilizante ofreciendo soluciones integrales por problemas de humedades\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi atque maiores incidunt consequatur ad, eligendi quam cumque! Explicabo ab, vel sit tempore, odio minima veniam nobis reiciendis rem repudiandae suscipit.', NULL, NULL, 0, 1, 666, 5),
(6, 'Nosotros imagen 1', NULL, NULL, NULL, 1, 1, 666, 5),
(7, 'Misión', 'Ofrecer y comercializar productos de excelente calidad mediante capital humano capacitado y enfocado a resolver problemas de humedades brindando soluciones integrales que satisfagan las necesidades de nuestros clientes procurando mejorar sus espectativas.', NULL, NULL, 0, 1, 666, 5),
(8, 'Visión', 'Ser líderes en la venta de productos de una amplia gama de impermeabilizantes brindando asesoría técnica especializada y soluciones a nuestros clientes.', NULL, NULL, 0, 1, 666, 5),
(9, 'Misión icono', NULL, NULL, NULL, 1, 1, 666, 5),
(10, 'Visión icono', NULL, NULL, NULL, 1, 1, 666, 5),
(11, 'Nosotros imagen 2', NULL, NULL, NULL, 1, 1, 666, 5),
(12, 'Contacto', 'zccx', NULL, NULL, 0, 1, 666, 6),
(13, 'ds', NULL, NULL, NULL, 0, 1, 666, 6);

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
(19, 'Guardias especializados', '<p>Nuestros guardias de seguridad son producto de un estricto proceso, iniciando con est&aacute;ndares de selecci&oacute;n que supera los marcados por certificaciones internacionales como BASC e ISO, garantizando as&iacute; que los elementos contratados cuenten con las caracter&iacute;sticas &nbsp;necesarias para cubrir las necesidades de todos nuestros clientes.</p>\r\n<p>Para SEKTOR la capacitaci&oacute;n es esencial, por ello todos nuestros guardias de seguridad son capacitados desde el primer d&iacute;a que ingresan, reciben adem&aacute;s, revisiones y actualizaciones constantemente para cumplir siempre con las necesidades m&aacute;s estrictas de cada servicio.</p>\r\n<p>Nuestros elementos son reevaluados constante y peri&oacute;dicamente para verificar que no presenten desviaciones y se mantengan alineados con las pol&iacute;ticas y lineamientos internos establecidos para cada servicio.</p>\r\n<p>Todos nuestros guardias cuentan con soporte por medios tecnol&oacute;gicos, monitoreo dedicado y diversos tipos de controles aplicados, sabemos que cada cliente tiene necesidades espec&iacute;ficas por lo que nuestros especialistas ser&aacute;n de gran ayuda para identificar la mejor manera de proteger el patrimonio de nuestros clientes.</p>', NULL, NULL, NULL, 1, 1, 666, '2022-07-19 23:43:45', '2022-11-17 03:49:09'),
(21, 'Custodias de mercancía', '<p style=\"text-align: justify;\">Pasa SEKTOR custodiar el traslado de tu mercanc&iacute;as significa mucho m&aacute;s que simplemente \"acompa&ntilde;arlas\" durante el trayecto.</p>\r\n<p style=\"text-align: justify;\">Sabemos el valor, no s&oacute;lo econ&oacute;mico, sino estrat&eacute;gico y de oportunidad que tiene cada embarque; teniendo esto en cuenta desarrollamos estrategias de acuerdo a las caracter&iacute;sticas de cada servicio, implementando procesos operativos detallados para mantener la trazabilidad de la mercanc&iacute;a en todo momento, para ello contamos con sistemas tecnol&oacute;gicos de punta para el rastreo y monitoreo detallado de cada embarque.</p>\r\n<p style=\"text-align: justify;\">Mantenemos un monitoreo dedicado de cada custodia para detectar situaciones de riesgo y actuar de manera oportuna ante cada incidencia, manteniendo una constante comunicaci&oacute;n con clientes y autoridades desde nuestra central de monitoreo de &uacute;ltima generaci&oacute;n.</p>', NULL, NULL, NULL, 1, 1, 666, '2022-08-04 20:55:44', '2022-10-21 21:27:39'),
(22, 'Servicio de seguridad moviles', '<div>Nuestro servicio de seguridad m&oacute;vil es una excelente opci&oacute;n para peque&ntilde;os y medianos negocios, en este servicio un guardia de seguridad realiza patrullajes a un n&uacute;mero limitado de clientes, el guardia puede realizar m&uacute;ltiples consignas, desde prevenir el robo, verificar cierre de instalaciones y apagar sistemas de energ&iacute;a.</div>', NULL, NULL, NULL, 1, 1, 666, '2022-08-08 18:49:27', '2022-11-17 00:29:51'),
(23, 'Monitore de alarmas', '<p style=\"text-align: justify;\">Sektor es una empresa seria, comprometida y dedicada a la seguridad integral. Siete a&ntilde;os de experiencia nos respaldan.</p>\r\n<p style=\"text-align: justify;\">Pregunta por nuestros paquetes de monitoreo<br /><strong>Aproveche los beneficios que sektor le ofrece:</strong></p>\r\n<ul>\r\n<li style=\"text-align: justify;\">Contrataci&oacute;n de monitoreo de alarmas SIN plazos forzosos.&nbsp;</li>\r\n<li style=\"text-align: justify;\">Nuestra central de monitoreo se encuentra en <strong>GUADALAJARA</strong></li>\r\n<li style=\"text-align: justify;\">Contamos con la mejor y m&aacute;s avanzada tecnolog&iacute;a.</li>\r\n<li style=\"text-align: justify;\">Contamos con equipo de patrullaje propio.</li>\r\n<li style=\"text-align: justify;\">Ofrecemos equipos de alarma en comodato</li>\r\n<li style=\"text-align: justify;\">Nuestros sistemas de monitoreo trabajan bajo est&aacute;ndares de clase mundial.</li>\r\n</ul>', NULL, NULL, NULL, 1, 1, 666, '2022-08-08 23:51:20', '2022-11-17 00:33:08');

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
(16, 22, NULL, '8n55vmjIzHKpoWOcUux35afingnqZA.jpg', 666),
(17, 23, NULL, 'QlbB541AxzCEQt3GtQVcTSZHxNNPKR.jpg', 666),
(18, 21, NULL, 'Tmbn4wocnxS6vAFCYSxNqN1oqQY4WS.jpg', 666),
(19, 24, NULL, 'ZeUHxn65A5vq1liG0RIiyQEK9wnK33.jpg', 666),
(21, 25, NULL, 'v7CdsDroB49bSYSdblRHp3BSPmLyxP.jpg', 666),
(33, 19, NULL, 'QvQdPyE4TWADyZSdrbnbhObvNM47a4.jpg', 666),
(34, 19, NULL, 'ZIgHbxUkoMyJyGMYoIXK79dbdbF9Xc.jpg', 666),
(35, 19, NULL, '9BhI8hIA7BxH1YBtxKF5ijfFCPqwGU.jpg', 666),
(37, 21, NULL, 'V9rAxFS5QRUMcrqEYjmOLtiLRhH8JA.jpg', 666),
(38, 21, NULL, 'eD8yaW3whet2nlV2jOU42bo8gDhQgZ.jpg', 666),
(39, 21, NULL, 'WD4Pg42xTwCA6b1BBl3Urs2LlC2b0Q.jpg', 666),
(40, 22, NULL, 'cxGoJDtLDN9opAA1IQl9JrQGuYO9p0.jpg', 666),
(41, 22, NULL, 'v024JOAh6VvceMvasBui6BIS2lHgcK.jpg', 666),
(42, 23, NULL, 'YMy765RMsN2sCvJN9hFl3WFoxlJGZ7.jpg', 666),
(43, 23, NULL, 'gl9mEfOqg7VvjIqyvaE8QRPiejjVyM.jpg', 666);

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

--
-- Volcado de datos para la tabla `producto_relacions`
--

INSERT INTO `producto_relacions` (`id`, `producto`, `otroProducto`) VALUES
(1, 24, 21);

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
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `seccions`
--

INSERT INTO `seccions` (`id`, `seccion`, `portada`, `icon`, `slug`) VALUES
(1, 'inicio', NULL, 'fa fa-home', 'home'),
(3, 'soluciones', NULL, 'fas fa-sliders-h	', 'solutios'),
(5, 'nosotros', NULL, 'fas fa-info-circle', 'about-us'),
(6, 'contacto', NULL, 'fas fa-mail-bulk', 'contact'),
(7, 'tienda', NULL, 'fas fa-shopping-bag', 'store'),
(8, 'Inicio', NULL, 'fa fa-home', 'home');

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
-- Estructura de tabla para la tabla `s_categorias`
--

CREATE TABLE `s_categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `s_categorias`
--

INSERT INTO `s_categorias` (`id`, `categoria`, `created_at`, `updated_at`) VALUES
(1, 'Categoría 0001', NULL, '2023-08-01 01:03:26'),
(2, 'Categoría 02', NULL, NULL),
(4, 'Categoría 04', NULL, NULL),
(5, 'Categoría 05', NULL, NULL),
(6, 'Categoría 06', NULL, NULL),
(7, 'tipo 87', '2023-08-01 00:38:53', '2023-08-01 00:38:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `s_clientes`
--

CREATE TABLE `s_clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagen` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `s_clientes`
--

INSERT INTO `s_clientes` (`id`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'annGiW03ZVsar6rwfk2XkIR2BSDuDy.png', '2023-08-01 08:37:59', '2023-08-01 08:37:59'),
(2, 'c2sV9OoaZR2tFufa5qC86rLRq1VoeL.png', '2023-08-01 08:38:22', '2023-08-01 08:38:22'),
(3, 'dygPXSdS2ODQZT6Od4apjTt0Z0R0jS.png', '2023-08-01 08:38:35', '2023-08-01 08:38:35'),
(5, 'AXhSH9C0ULDuJeNWJCWNA4G2uD3TXW.png', '2023-08-01 08:44:06', '2023-08-01 08:44:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `s_galeria_productos`
--

CREATE TABLE `s_galeria_productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto` int(11) DEFAULT NULL,
  `imagen` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `s_galeria_productos`
--

INSERT INTO `s_galeria_productos` (`id`, `producto`, `imagen`, `created_at`, `updated_at`) VALUES
(2, 1, 'QKiL8pyzLOOOSZlROAt08Acya3U2dq.jpg', '2023-08-01 04:04:15', '2023-08-01 04:04:15'),
(3, 1, '0QRJb3HMb3TiqN2M1fkWnlSm9pBy5j.webp', '2023-08-01 04:15:53', '2023-08-01 04:15:53'),
(4, 1, 'quNprf3ycvdtJqdKHyzGVeQFsg4mpG.jpg', '2023-08-01 04:16:01', '2023-08-01 04:16:01'),
(5, NULL, NULL, '2023-08-01 04:16:07', '2023-08-01 04:16:07'),
(6, 1, 'vXM9SCQAHf7CqXgKcGUNDhZFLeGdIG.jpg', '2023-08-01 04:16:34', '2023-08-01 04:16:34'),
(7, 1, 'Qwza3oJN53lYvt7bnBZDAsqUNUaBKx.jpg', '2023-08-01 04:16:45', '2023-08-01 04:16:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `s_productos`
--

CREATE TABLE `s_productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoria` int(11) NOT NULL,
  `subcategoria` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio` float(10,0) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `inicio` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `s_productos`
--

INSERT INTO `s_productos` (`id`, `categoria`, `subcategoria`, `nombre`, `precio`, `cantidad`, `descripcion`, `imagen`, `inicio`, `created_at`, `updated_at`) VALUES
(1, 5, 17, 'Producto 1', 350, 0, 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.', 'MLpwMCChp9YTYSyTZF9MfJ25KvN1PR.jpg', 1, '2023-08-01 03:18:44', '2023-08-01 07:52:11'),
(2, 5, 17, 'daadas', 200, 0, 'dasd', 'ZbAmBGYdrKAywSQnT4PB9qwoZwI87k.jpg', 1, '2023-08-01 07:56:04', '2023-08-01 07:58:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `s_slider_principals`
--

CREATE TABLE `s_slider_principals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `s_slider_principals`
--

INSERT INTO `s_slider_principals` (`id`, `titulo`, `imagen`, `created_at`, `updated_at`) VALUES
(2, 'Slider 2', 'clJaLToaTN5XkRPaAi2vuHjjbTzTqo.png', '2023-08-01 08:22:08', '2023-08-01 08:22:29'),
(3, 'Otro', 'Xa4nwxIMDUnCfB8oKaTjUyWUPaA7l5.png', '2023-08-01 10:19:24', '2023-08-01 10:19:35'),
(4, 'Tercero', 'RShm5FawwsET0nwzqslS05d8h1EqCa.png', '2023-08-01 10:19:42', '2023-08-01 10:19:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `s_soluciones`
--

CREATE TABLE `s_soluciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icono` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inicio` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `s_soluciones`
--

INSERT INTO `s_soluciones` (`id`, `titulo`, `descripcion`, `imagen`, `icono`, `inicio`, `created_at`, `updated_at`) VALUES
(3, 'Impermeabilizantes 2', '22Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam voluptatibus praesentium quae? Ut quis unde eaque corrupti quia distinctio esse ratione hic maxime cupiditate rem temporibus, veniam minus aperiam quaerat?', '18PPpobWGbTYPadKmRuL31U7KddfVg.png', NULL, 1, '2023-08-01 09:34:38', '2023-08-01 09:56:52'),
(4, 'Pinturas y Esmaltes', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam voluptatibus praesentium quae? Ut quis unde eaque corrupti quia distinctio esse ratione hic maxime cupiditate rem temporibus, veniam minus aperiam quaerat?', 'KUZfDskMjynb9cOwb7bieQyjMZQjt2.png', NULL, 1, '2023-08-01 09:35:26', '2023-08-01 09:35:26'),
(5, 'Selladores', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam voluptatibus praesentium quae? Ut quis unde eaque corrupti quia distinctio esse ratione hic maxime cupiditate rem temporibus, veniam minus aperiam quaerat?', 'IXZ0oV9WTOmutZ99zZYmAgRGrZUnRx.png', NULL, 1, '2023-08-01 09:35:46', '2023-08-01 09:35:46'),
(6, 'solucion 04', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam voluptatibus praesentium quae? Ut quis unde eaque corrupti quia distinctio esse ratione hic maxime cupiditate rem temporibus, veniam minus aperiam quaerat?', 'BqfduQBkdXqfvrsoXX0cfG7nK5uYrO.png', NULL, 0, '2023-08-01 09:36:08', '2023-08-01 09:36:08'),
(7, 'solucion 05', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam voluptatibus praesentium quae? Ut quis unde eaque corrupti quia distinctio esse ratione hic maxime cupiditate rem temporibus, veniam minus aperiam quaerat?', 'p8r8hB5kuhrnlby23uFiGiooIgifo0.png', NULL, 0, '2023-08-01 09:36:30', '2023-08-01 09:36:30'),
(8, 'solucion 06', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam voluptatibus praesentium quae? Ut quis unde eaque corrupti quia distinctio esse ratione hic maxime cupiditate rem temporibus, veniam minus aperiam quaerat?', '2K1ntORMyMHTWPSMqeeT0xAiyO5gci.png', NULL, 0, '2023-08-01 09:36:49', '2023-08-01 09:36:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `s_sub_categorias`
--

CREATE TABLE `s_sub_categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoria` int(11) NOT NULL,
  `subcategoria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `s_sub_categorias`
--

INSERT INTO `s_sub_categorias` (`id`, `categoria`, `subcategoria`, `created_at`, `updated_at`) VALUES
(1, 1, 'subcategoria 01', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'subcategoria 02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 'subcategoria 03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 'subcategoria 04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 2, 'subcategoria 01', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 2, 'subcategoria 02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 2, 'subcategoria 04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 3, 'subcategoria 01', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 3, 'subcategoria 02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 3, 'subcategoria 03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 3, 'subcategoria 04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 4, 'subcategoria 01', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 4, 'subcategoria 02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 4, 'subcategoria 03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 4, 'subcategoria 04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 5, 'subcategoria 01', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 5, 'subcategoria 02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 5, 'subcategoria 03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 5, 'subcategoria 04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 6, 'subcategoria 01', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 6, 'subcategoria 02', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 6, 'subcategoria 03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 6, 'subcategoria 04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 7, 'tipo 1', '2023-08-01 00:47:38', '2023-08-01 00:47:38');

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
(1, 'zlidnodXw0kt1bD9KLmjVE4uyZGl9d.jpg', 'Guardia de Seguridad', 'Excelente oportunidad', '<ul>\r\n<li>TURNOS DE 8HRS</li>\r\n<li>TRANSPORTE Y COMEDOR</li>\r\n<li>PAGO QUINCENAL BANORTE</li>\r\n<li>UNIFORMES SIN COSTO</li>\r\n<li>SEGURO SOCIAL DESDE EL PRIMER DIA</li>\r\n<li>PRESTACIONES DE LEY</li>\r\n</ul>', '20 a 55 años; Secundaria terminada; Disponibilidad de horario; Documentación básica', '5', '$8,000 a $9,500', 0, 1, 666, NULL, '2022-11-17 23:13:41'),
(2, 'vCxiroFkU4gNJrjoVNoY2nRkfdZmIN.jpg', 'Custodio Carretero', 'Sueldo base mas comisiones', '<div>\r\n<p><strong>PAGO: SUELDO BASE MAS COMISIONES POR KM. BANORTE.</strong><strong>&nbsp;<br /></strong><strong>PRESTACIONES DE LEY </strong></p>\r\n</div>', '24 a 45 años; Secundaria o preparatoria terminada; Conocimiento en carreteras federales; Licencia de chofer vigente; Manejar STD ; Cartilla o Pre cartilla; Disponibilidad de horario; Estable', '5', 'Base mas comisiones', 0, 1, 666, '2022-07-21 00:04:40', '2022-10-21 21:49:28'),
(4, 'xtuLYDKWRo8Hgq0wBohEV0IyEhN2e6.jpg', 'Monitoristas', '$9000 - $10000000 libres', '<div>\r\n<p><strong>PAGO QUINCENAL NOMINA BANORTE<br /></strong><strong>ESTABILIDAD LABORAL.<br /></strong><strong>PRESTACIONES DE LEY<br /></strong><strong>$9,000 MENSUAL</strong></p>\r\n</div>', '24 a 45 años; Preparatoria terminada; Disponibilidad de horarias; Experiencia CCTV y/o GPS; Atención al cliente; Estable', '5', '$9,000', 0, 1, 666, '2022-07-21 00:06:48', '2022-10-21 21:50:13'),
(5, 'byftULI9aK8jZqwU2p8fqjvpFF9r0u.jpg', 'Técnico Instalador', '$9000 - $10000000 libres', '<div>\r\n<p><strong>*BASE MAS COMISIONES </strong></p>\r\n<p><strong>*PAGO QUINCENAL NOMINA BANORTE</strong></p>\r\n<p><strong>*PRESTACIONES DE LEY</strong></p>\r\n<p><strong>*CONOCIMIENTO DE LA CIUDAD </strong></p>\r\n<p><strong>*LIC. DE CHOFER VIGENTE, MANEJAR STD</strong></p>\r\n</div>', '24 a 45 años; Preparatoria y/o carrera técnica  en electrónica y/o a fin; Experiencia comprobable; Manejo de herramientas manuales; Manejo de computadora', '5', 'Sueldo base más comisiones', 0, 1, 666, '2022-07-21 00:08:12', '2022-10-21 21:53:57'),
(6, 'x8DstmATXRfYZIFzSJZjYNmA3JeQOy.jpg', 'Supervisor de guardias', 'Sueldo atractivo', '<div>\r\n<p><strong>SUELDO COMPETITIVO<br /></strong><strong>PAGO QUINCENAL NOMINA BANORTE<br /></strong><strong>PRESTACIONES DE LEY<br /></strong><strong>BONOS POR DESEMPE&Ntilde;O</strong></p>\r\n</div>', '25 a 48 años; Preparatoria terminada; Disponibilidad de horario; Paquete office; Licencia de chofer vigente; Manejo de STD; Cursos básicos de seguridad privada; Experiencia en manejo de personal', '5', 'Sueldo atractivo', 0, 1, 666, '2022-08-08 18:55:52', '2022-10-21 21:54:33'),
(9, 'JRtZYCWEpzphBCdtnpYGKUmqfV3bQp.jpg', 'Asesor Comercial', 'Excelente esquema de comisiones', '<div>turno de 8 Horas</div>\r\n<div>Comisiones por ventas</div>\r\n<div>&nbsp;</div>', 'Excelente presentación; Pro activo; Vehículo Propio', '3', '$8000 a $20000', 0, 0, 666, '2022-11-17 23:06:01', '2022-11-17 23:06:31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aux_productos`
--
ALTER TABLE `aux_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carrusels`
--
ALTER TABLE `carrusels`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_photos`
--
ALTER TABLE `productos_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto_relacions`
--
ALTER TABLE `producto_relacions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seccions`
--
ALTER TABLE `seccions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `s_categorias`
--
ALTER TABLE `s_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `s_clientes`
--
ALTER TABLE `s_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `s_galeria_productos`
--
ALTER TABLE `s_galeria_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `s_productos`
--
ALTER TABLE `s_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `s_slider_principals`
--
ALTER TABLE `s_slider_principals`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `s_soluciones`
--
ALTER TABLE `s_soluciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `s_sub_categorias`
--
ALTER TABLE `s_sub_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vacantes`
--
ALTER TABLE `vacantes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aux_productos`
--
ALTER TABLE `aux_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `elementos`
--
ALTER TABLE `elementos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `productos_photos`
--
ALTER TABLE `productos_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `producto_relacions`
--
ALTER TABLE `producto_relacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `s_categorias`
--
ALTER TABLE `s_categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `s_clientes`
--
ALTER TABLE `s_clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `s_galeria_productos`
--
ALTER TABLE `s_galeria_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `s_productos`
--
ALTER TABLE `s_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `s_slider_principals`
--
ALTER TABLE `s_slider_principals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `s_soluciones`
--
ALTER TABLE `s_soluciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `s_sub_categorias`
--
ALTER TABLE `s_sub_categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `vacantes`
--
ALTER TABLE `vacantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
