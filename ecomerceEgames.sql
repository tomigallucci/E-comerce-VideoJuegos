-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2020 a las 21:30:21
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecomerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `merchandise`
--

CREATE TABLE `merchandise` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` bigint(20) NOT NULL,
  `title` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `purchase_price` double(10,2) NOT NULL,
  `sale_price` double(10,2) NOT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `merchandise`
--

INSERT INTO `merchandise` (`id`, `code`, `title`, `stock`, `purchase_price`, `sale_price`, `image`, `created_at`, `updated_at`) VALUES
(6, 1, 'TAZA LUCIERNÁGAS- THE LAST OF US PART II', 5, 20.00, 1391.50, 'storage/img/merchandise/1/1585143613.jpg', '2020-03-25 16:40:13', '2020-03-25 16:40:13'),
(7, 2, 'DECORACIÓN MURAL ESCUDO HYLIANO - THE LEGEND OF ZELDA', 10, 100.00, 6957.50, 'storage/img/merchandise/2/1585143704.jpeg', '2020-03-25 16:41:44', '2020-03-25 16:41:44'),
(8, 3, 'RÉPLICA 1/1 PISTOLA DE PLASMA - FALLOUT', 15, 150.00, 10436.25, 'storage/img/merchandise/3/1585143744.jpg', '2020-03-25 16:42:24', '2020-03-25 16:42:24'),
(9, 4, 'PELUCHE CREEPER 27 CM - MINECRAFT', 25, 80.00, 5566.00, 'storage/img/merchandise/4/1585143786.jpeg', '2020-03-25 16:43:06', '2020-03-25 16:43:06'),
(10, 5, 'PELUCHE SNORLAX 60CM - POKEMON', 60, 250.00, 17393.75, 'storage/img/merchandise/5/1585143821.jpeg', '2020-03-25 16:43:41', '2020-03-25 16:43:41'),
(11, 6, 'PENGUÍN DAB - LIGA DE LEYENDAS', 100, 60.00, 4174.50, 'storage/img/merchandise/6/1585143972.jpeg', '2020-03-25 16:46:12', '2020-03-25 16:46:12');

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
(1, '2020_03_13_014327_create_products_table', 1),
(2, '2020_03_13_014802_create_products_categories_table', 1),
(3, '2020_03_13_015040_create_products_languages_table', 1),
(4, '2020_03_13_015113_create_products_offerdays_table', 1),
(5, '2020_03_13_015128_create_products_trademarks_table', 1),
(6, '2020_03_13_020948_add_foreign_key_in_products_offerdays_to_products', 1),
(7, '2020_03_14_000000_create_users_table', 1),
(8, '2020_03_14_100000_create_password_resets_table', 1),
(33, '2020_03_13_014327_create_products_table', 1),
(34, '2020_03_13_014802_create_products_categories_table', 1),
(35, '2020_03_13_015040_create_products_languages_table', 1),
(36, '2020_03_13_015113_create_products_offerdays_table', 1),
(37, '2020_03_13_015128_create_products_trademarks_table', 1),
(38, '2020_03_13_020948_add_foreign_key_in_products_offerdays_to_products', 1),
(39, '2020_03_14_000000_create_users_table', 1),
(40, '2020_03_14_100000_create_password_resets_table', 1),
(41, '2020_03_25_040851_create_merchandise_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('tomifno1@gmail.com', '$2y$10$xl1M20H1SuebTzoObU1qzeksT4SGU.jM4DGP0nVUxjEw8xtHK8DDi', '2020-03-25 22:51:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` bigint(20) NOT NULL,
  `title` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `purchase_price` double(10,2) NOT NULL,
  `sale_price` double(10,2) NOT NULL,
  `languages` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `trademarks` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `isDlc` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `code`, `title`, `description`, `stock`, `purchase_price`, `sale_price`, `languages`, `image`, `categories`, `trademarks`, `release_date`, `isDlc`, `created_at`, `updated_at`) VALUES
(3, 3, 'StarCraft 2: Wings of Liberty', 'Tras más de diez años, el legendario Starcraft regresa en una segunda parte dividida en tres juegos. Éste es el primero, Wings of Liberty, cuya campaña narra la historia de los Terran, los humanos lanzados a la conquista del espacio que inevitablemente se ven las caras en el camino con los Zerg y con los Protoss. Además de un completo modo campaña, Starcraft II incluye un modo multijugador lleno de posibilidades gracias a la conexión con Battle.net. Cuenta además con un potente editor de mapas con el que compartir contenido a través del sistema online de Blizzard.', 50, 20.00, 1391.50, '[{\"id\":1,\"language\":\"Español\"},{\"id\":3,\"language\":\"Ingles\"}]', 'storage/img/products/3/893.jpg', '[{\"id\":2,\"category\":\"Aventura\"},{\"id\":1,\"category\":\"Accion\"},{\"id\":5,\"category\":\"Ciencia Ficcion\"}]', '3', '2010-07-17', 0, '2020-02-18 19:11:10', '2020-03-25 16:01:31'),
(4, 4, 'Divinity: Original Sin II', 'Divinity: Original Sin II es la secuela del exitoso juego de rol de corte clásico y vista aérea que Larian Studios lanzó en 2014. Al igual que su primera parte, este nuevo juego ha sido financiado mediante crowdfunding en una exitosa campaña de Kickstarter que alcanzó todos sus objetivos extras de financiación tras superar los dos millones de dólares. Esta nueva aventura será mucho más grande y ambiciosa que su primera parte, aunque las bases jugables se mantendrán intactas, permitiéndonos librar complejos combates estratégicos por turnos en los que podremos interactuar con el entorno de muchas formas distintas. Esta vez ofrecerá multijugador, tanto cooperativo como competitivo, para hasta cuatro jugadores.', 50, 44.99, 3130.18, '[{\"id\":1,\"language\":\"Español\"},{\"id\":3,\"language\":\"Ingles\"}]', 'storage/img/products/4/412.jpg', '[{\"id\":2,\"category\":\"Aventura\"}]', '12', '2017-09-14', 1, '2020-02-18 19:24:28', '2020-03-25 08:56:46'),
(6, 6, 'Final Fantasy 14', 'Final Fantasy XIV: Shadowbringers es una nueva expansión de contenido para el juego de rol multijugador de Square Enix de consolas y PC. Shadowbringers es la tercera expansión de Final Fantasy XIV y aumenta el límite de nivel hasta 80, incluyendo como es habitual una nueva y elaborada historia y nuevos escenarios. También cuenta clases nuevas, como los Gunbreakers, la primera clase anunciada, portadores de espadas pistola, como la que vimos de Squall en Final Fantasy VIII. Esta clase cumple el rol de tanque en los equipos.', 50, 59.00, 4104.92, '[{\"id\":3,\"language\":\"Ingles\"}]', 'storage/img/products/6/633.jpg', '[{\"id\":2,\"category\":\"Aventura\"}]', '11', '2019-07-02', 1, '2020-02-18 22:32:27', '2020-03-25 08:56:31'),
(7, 7, 'The Witcher 3: Wild Hunt', 'The Witcher 3 es la tercera entrega de la saga The Witcher desarrollada por CD Projekt para PS4, Xbox One y Pc. Se trata de un videojuego que mezcla elementos de aventura, acción y rol en un mundo abierto épico basado en la fantasía. El jugador controlará una vez más a Geralt de Rivia, el afamado cazador de monstruos, (también conocido como el Lobo Blanco) y se enfrentará a un diversificadísimo bestiario y a unos peligros de unas dimensiones nunca vistas hasta el momento en la serie, mientras recorre los reinos del Norte. Durante su aventura, tendrá que hacer uso de un gran arsenal de armas, armaduras y todo tipo de magias para enfrentarse al que hasta ahora ha sido su mayor desafío, la cacería salvaje. Este videojuego ha sido galardonado como el mejor juego del año 2015 tanto por críticos especializados como por galas de premios como los Golden Joystick Awards, Game Developers Choice Awards y The Game Awards. Además cuenta con 2 DLC o Expansiones: Blood and wine, y Hearts of Stone.', 50, 60.00, 4174.50, '[{\"id\":1,\"language\":\"Español\"},{\"id\":3,\"language\":\"Ingles\"}]', 'storage/img/products/7/907.jpg', '[{\"id\":5,\"category\":\"Ciencia Ficcion\"},{\"id\":17,\"category\":\"Aventura narrativa\"},{\"id\":13,\"category\":\"Mundo abierto\"}]', '10', '2015-05-19', 1, '2020-02-18 22:36:55', '2020-03-25 08:40:58'),
(8, 8, 'Star Wars Jedi: Fallen Order', 'Star Wars Jedi: Fallen Order es un juego de acción y aventura para un jugador en tercera persona que nos trasladará a una época convulsa en la cronología de Star Wars. Desarrollado por EA y Respawn Entertainment, nos invita a encarnar a un Jedi que ha permanecido oculto a la exterminación de su religión tras la Orden 66. Nuestra misión será la de sobrevivir al recién fundado Imperio Galáctico, combatiendo contra los Inquisidores y descubriendo más de la fragmentada y proscrita Orden Jedi.', 50, 50.00, 3478.75, '[{\"id\":\"1\",\"language\":\"Español\"},{\"id\":\"3\",\"language\":\"Ingles\"}]', 'storage/img/products/8/732.jpg', '[{\"id\":\"1\",\"category\":\"Accion\"},{\"id\":\"2\",\"category\":\"Aventura\"}]', '1', '2019-11-15', 1, '2020-02-18 19:38:09', NULL),
(9, 9, 'Warcraft III: Reforged', 'Warcraft III: Reforged es la nueva versión del aclamado videojuego de estrategia en tiempo real Warcraft III, todo un clásico del género. Desarrollado por Blizzard, supone una adaptación técnica y jugable, pues además de ofrecer un nuevo aspecto gráfico acorde a los tiempos incluye una serie de cambios en las mecánicas para hacer el título más disfrutables en PC.', 50, 30.00, 2087.25, '[{\"id\":\"1\",\"language\":\"Español\"},{\"id\":\"3\",\"language\":\"Ingles\"}]', 'storage/img/products/9/774.jpg', '[{\"id\":\"8\",\"category\":\"RTS\"}]', '3', '2020-01-29', 0, '2020-02-18 22:46:08', NULL),
(10, 10, 'Los Sims 4', 'Los Sims 4 es la nueva entrega de la serie de simulación social de Maxis que nos propone controlar a estos seres virtuales y hacer que evolucionen en sus vidas. Esta cuarta entrega incluye mayor libertad que nunca para construir la vivienda de nuestros Sims, con más opciones de diseño, y un sistema de elecciones que hará que las decisiones que tomen nuestros seres virtuales afecten a su vida.', 50, 60.00, 4174.50, '[{\"id\":\"1\",\"language\":\"Español\"},{\"id\":\"3\",\"language\":\"Ingles\"}]', 'storage/img/products/10/559.jpg', '[{\"id\":\"10\",\"category\":\"Simulador social\"},{\"id\":\"9\",\"category\":\"Simulacion\"}]', '1', '2014-09-04', 1, '2020-02-18 22:47:14', NULL),
(11, 11, 'ARK: Survival Evolved', 'ARK: Survival Evolved para PC es un nuevo juego de supervivencia y mundo abierto. A lo largo de la aventura tendremos que cazar para sobrevivir, crear objetos, mejorar nuestra tecnología, construir refugios, etcétera. Todo ello mientras exploramos una gigantesca isla repleta de dinosaurios, lo que se perfila como uno de sus mayores atractivos.', 50, 50.00, 3478.75, '[{\"id\":\"1\",\"language\":\"Español\"},{\"id\":\"3\",\"language\":\"Ingles\"}]', 'storage/img/products/11/552.jpg', '[{\"id\":\"11\",\"category\":\"Aventura de accion\"},{\"id\":\"12\",\"category\":\"MMO\"},{\"id\":\"13\",\"category\":\"Mundo abierto\"},{\"id\":\"14\",\"category\":\"Supervivencia\"}]', '9', '0000-00-00', 1, '2020-02-18 22:48:36', NULL),
(12, 12, 'DOOM Eternal', 'DOOM Eternal es la secuela del éxito de 2016, DOOM. Ahondando de nuevo en las raíces clásicas del género de acción en primera persona, la segunda parte desarrollada por id Software y Bethesda sigue apostando por la guerra sin cuartel contra los demonios en Xbox One, PS4, PC y Nintendo Switch.', 50, 60.00, 4174.50, '[{\"id\":\"3\",\"language\":\"Ingles\"},{\"id\":\"1\",\"language\":\"Español\"}]', 'storage/img/products/12/322.jpg', '[{\"id\":\"15\",\"category\":\"Shooter en primera persona\"}]', '8', '0000-00-00', 0, '2020-02-18 22:49:47', NULL),
(13, 13, 'GTA 5', 'La quinta parte de Grand Theft Auto para PC vuelve a la costa oeste americana, ambientándose en la ciudad de Los Santos (Los Ángeles) y sus alrededores, con una historia ambientada en la actualidad, especialmente en las consecuencias de la crisis económica. Está protagonizada por Michael, Franklin y Trevor, tres criminales con diferentes habilidades, pudiendo cambiar de personaje en todo momento y vivir cada una de sus vidas, así como aprovechar sus habilidades en las misiones.', 50, 60.00, 4174.50, '[{\"id\":\"3\",\"language\":\"Ingles\"},{\"id\":\"1\",\"language\":\"Español\"}]', 'storage/img/products/13/112.jpg', '[{\"id\":\"1\",\"category\":\"Accion\"},{\"id\":\"2\",\"category\":\"Aventura\"}]', '7', '0000-00-00', 1, '2020-02-18 22:51:16', NULL),
(14, 14, 'Red Dead Redemption 2', 'Red Dead Redemption 2 es la secuela del aclamado Red Dead Redemption de 2010 y tercera parte de la saga Red Dead, que se inició en 2004 con Red Dead Revolver. De nuevo nos lleva al salvaje oeste para proponernos convertirnos en un pistolero forajido en un gran escenario de juego. El título está previsto para Xbox One y PS4.', 50, 60.00, 4174.50, '[{\"id\":\"3\",\"language\":\"Ingles\"},{\"id\":\"1\",\"language\":\"Español\"}]', 'storage/img/products/14/846.jpg', '[{\"id\":\"13\",\"category\":\"Mundo abierto\"},{\"id\":\"11\",\"category\":\"Aventura de accion\"},{\"id\":\"14\",\"category\":\"Supervivencia\"}]', '7', '0000-00-00', 1, '2020-02-18 22:52:38', NULL),
(15, 15, 'Overwatch', 'Es la nueva saga de Blizzard esta vez en forma de multijugador online en primera persona ambientado en un mundo futurista. Habrá muchos personajes distintos y cada uno de ellos hará uso de sus propias armas y amplificadores. Destacar que cada uno de ellos cumplirá un rol diferente dentro del equipo, como Defensa, Tanque, Apoyo y Ataque.', 50, 40.00, 2783.00, '[{\"id\":\"3\",\"language\":\"Ingles\"},{\"id\":\"1\",\"language\":\"Español\"}]', 'storage/img/products/15/988.jpg', '[{\"id\":\"15\",\"category\":\"Shooter en primera persona\"},{\"id\":\"16\",\"category\":\"Shooter multijugador\"}]', '3', '0000-00-00', 1, '2020-02-18 22:53:54', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_categories`
--

CREATE TABLE `products_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products_categories`
--

INSERT INTO `products_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Accion', '2020-02-15 12:37:37', NULL),
(2, 'Aventura', '2020-02-15 13:14:44', NULL),
(5, 'Ciencia Ficcion', '2020-02-18 22:03:35', NULL),
(7, 'RPG', '2020-02-18 22:15:45', NULL),
(8, 'RTS', '2020-02-18 22:16:15', NULL),
(9, 'Simulacion', '2020-02-18 22:18:06', NULL),
(10, 'Simulador social', '2020-02-18 22:18:13', NULL),
(11, 'Aventura de accion', '2020-02-18 22:18:25', NULL),
(12, 'MMO', '2020-02-18 22:18:36', NULL),
(13, 'Mundo abierto', '2020-02-18 22:18:49', NULL),
(14, 'Supervivencia', '2020-02-18 22:18:59', NULL),
(15, 'Shooter en primera persona', '2020-02-18 22:19:10', NULL),
(16, 'Shooter multijugador', '2020-02-18 22:19:25', NULL),
(17, 'Aventura narrativa', '2020-02-18 22:19:49', NULL),
(18, 'Plataformas 2D', '2020-02-18 22:19:56', NULL),
(19, 'Plataformas de puzles', '2020-02-18 22:20:05', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_languages`
--

CREATE TABLE `products_languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products_languages`
--

INSERT INTO `products_languages` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Español', '2020-02-18 05:56:25', NULL),
(2, 'Aleman', '2020-02-18 05:56:41', NULL),
(3, 'Ingles', '2020-02-18 05:56:50', NULL),
(4, 'Portuges', '2020-02-18 05:57:46', NULL),
(7, 'Frances', '2020-02-18 06:00:55', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_offerdays`
--

CREATE TABLE `products_offerdays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price_discount` double(10,2) NOT NULL,
  `discount` double(80,2) NOT NULL,
  `offerOn` tinyint(1) NOT NULL,
  `date_limit` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products_offerdays`
--

INSERT INTO `products_offerdays` (`id`, `product_id`, `price_discount`, `discount`, `offerOn`, `date_limit`, `created_at`, `updated_at`) VALUES
(3, 3, 1363.67, 2.00, 1, '2020-03-31 15:00:00', '2020-03-31 19:39:58', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_trademarks`
--

CREATE TABLE `products_trademarks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products_trademarks`
--

INSERT INTO `products_trademarks` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Electronics Arts', '2020-02-15 13:55:08', NULL),
(2, 'UBISOFT', '2020-02-15 13:55:21', NULL),
(3, 'Blizzard', '2020-02-18 22:03:59', NULL),
(4, 'Devolver Digital', '2020-02-18 22:20:19', NULL),
(5, 'Private Division', '2020-02-18 22:20:26', NULL),
(6, 'Wicked Witch y Forgotten Empires y Xbox Game Studios', '2020-02-18 22:21:59', NULL),
(7, 'Rockstar games', '2020-02-18 22:22:10', NULL),
(8, 'Bethesda', '2020-02-18 22:22:18', NULL),
(9, 'Wildcard', '2020-02-18 22:22:23', NULL),
(10, 'CD Projeckt', '2020-02-18 22:22:40', NULL),
(11, 'Inglrd', '2020-02-18 22:22:50', NULL),
(12, 'Larian Studios', '2020-02-18 22:22:57', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `tyc` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `image`, `birthday`, `tyc`, `status`, `isAdmin`, `email_verified_at`, `password`, `remember_token`, `last_login`, `created_at`, `updated_at`) VALUES
(3, 'Tomas', 'Gallucci', 'tomifno1@gmail.com', 'storage/img/users/tomifno1@gmail.com/1585058546.png', '1998-12-10', 1, 1, 1, NULL, '$2y$10$nngRa/t2jYFzDQw35ZgDLuT378qwR7YsRViJg7Hf3/Sf3NN1b51zO', NULL, '2020-03-26 14:22:51', '2020-03-24 19:17:53', '2020-03-26 17:22:51'),
(4, 'Lucio', 'Gallucci', 'luciogalo@gmail.com', '', '2003-05-02', 1, 1, NULL, NULL, '$2y$10$.61d6hPIPWaMr1KgryAYQeso8vaHJrEb8xWJrhPXpMZQtOH5WNFvG', NULL, NULL, '2020-03-25 03:16:26', '2020-03-25 16:35:44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `merchandise`
--
ALTER TABLE `merchandise`
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
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products_languages`
--
ALTER TABLE `products_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products_offerdays`
--
ALTER TABLE `products_offerdays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_offerdays_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `products_trademarks`
--
ALTER TABLE `products_trademarks`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `merchandise`
--
ALTER TABLE `merchandise`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `products_languages`
--
ALTER TABLE `products_languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `products_offerdays`
--
ALTER TABLE `products_offerdays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `products_trademarks`
--
ALTER TABLE `products_trademarks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products_offerdays`
--
ALTER TABLE `products_offerdays`
  ADD CONSTRAINT `products_offerdays_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
