-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-01-2025 a las 09:44:34
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vinyl`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombreRol` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vinilos`
--

CREATE TABLE `vinilos` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `precio` float NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vinilos`
--

INSERT INTO `vinilos` (`id`, `name`, `descripcion`, `imagen`, `precio`, `activo`) VALUES
(1, 'Bear and breakfast Vinyl 2xLP', 'La banda sonora del compositor Andrew Landry evoca tanto el sentido lúdico de la fantasía del juego como su propensión a los secretos inesperados. En el disco uno: Un conjunto de pistas relajantes con temática diurna, perfectas para relajarse o para saltar a un trance de productividad impulsado por sintetizadores. En el disco dos: Las cosas se vuelven decididamente más espeluznantes, con un conjunto de selecciones de canciones funky pero aterradoras de la banda sonora nocturna del juego.\r\n\r\n', '/img/shop/bearNbreakfast.jpg', 41.99, 1),
(2, 'Cuphead 2xLP', 'Las islas Inkwell de Cuphead de Studio MDHR son un paisaje maravilloso dibujado y pintado a mano donde los servicios de transmisión y los documentales digitales no se ven por ningún lado. Allí, la banda sonora de la vida cotidiana gira a 33 rpm, amplificada por un fonógrafo con cuernos de cobre. Es una clase magistral de auténtica música de jazz de Kristofer Maddigan, quien parece haber viajado hacia adelante en el tiempo desde la década de 1930 para dar vida a esta gran fiesta de big band. Este es, simplemente, el \"Best Of\" Cuphead, cuidadosamente seleccionado en un 2xLP, ¡y con nuevos solos exclusivos nunca antes disponibles en vinilo!', '/img/shop/cuphead.jpg', 42.99, 1),
(3, 'Grim Fandango 2xLP', 'El jazz no ha muerto. Bueno, en realidad, en este caso, es... pero de la manera más apropiada temáticamente. Para celebrar el cuarto de siglo de la odisea de Manny a través del más allá, vamos a editar la banda sonora de vinilo Grim Fandango 2xLP, lanzada originalmente hace cinco años para el 20º cumpleaños del juego. El acto de salón de trompeta y big band del compositor Peter McConnell finalmente se puede escuchar de la manera en que siempre fue concebido: en vinilo negro vintage. En los años 90, las orquestas humanas reales rara vez se usaban para la música de videojuegos, pero en este Director\'s Cut remasterizado, cada nota fue regrabada e interpretada por personas carnosas reales. El resultado es un zapateado y relajado, convirtiendo tu salón en un auténtico club de humos (humo no incluido).\r\n\r\n', '/img/shop/grimFandango.jpg', 42.99, 1),
(4, 'Maria Calla, remastered', 'Un solo LP de edición limitada en prensado de alta calidad de 180 g, esta colección es el primer lanzamiento en vinilo del sello en 15 años, y presenta algunas de las actuaciones más duraderas de la diva, incluidas O Mio Babbino Caro, Casta Diva y Vissi d\'arte.', '/img/shop/mcRemastered.jpg', 38.23, 1),
(5, 'Mellon Collie y the infinite Sadness', 'Mellon Collie and the Infinite Sadness es el tercer álbum de estudio de la banda de rock alternativo estadounidense The Smashing Pumpkins, lanzado el 23 de octubre de 1995 por medio de la compañía discográfica Virgin Records. El álbum de veintiocho pistas se lanzó en formatos CD doble y triple vinilo y fue producido por el líder de la banda Billy Corgan junto a Flood y Alan Moulder. El álbum contiene una gran diversidad de estilos, además de incorporar más peso musical por parte de la bajista D\'arcy Wretzky y el segundo guitarrista James Iha que en los trabajos previos.', '/img/shop/mcSmashing.jpg', 150.99, 1),
(6, 'metallica Justice for all', '... And Justice for All es el cuarto álbum de estudio del grupo musical estadounidense de thrash metal Metallica, publicado el 7 de septiembre de 1988 a través de Elektra Records en Norteamérica y por Vertigo Records en Europa. Se trata del primer álbum de estudio con el bajista Jason Newsted, que sustituyó a Cliff Burton tras su muerte en 1986. Newsted ya había aparecido en el EP The $5.98 E.P.: Garage Days Re-Revisited, su primer trabajo con Metallica. El álbum ganó ocho discos de platino entregados por la RIAA el 9 de junio de 2003, tras alcanzar las ocho millones de copias vendidas', '/img/shop/mJusticeForAll.jpg', 45.99, 1),
(7, 'Neon White Soundtrack 2', 'La música de Neon White se basa en las vibraciones de la electrónica de principios de milenio, evocando flashbacks mentales de las pantallas de inicio de PlayStation 2 y Dreamcast. Es una banda sonora brillantemente construida, construida de la manera en que solo los expertos conocidos en todo el mundo como Machine Girl son capaces de hacerlo. Esta es música para freaks, por freaks, y hay que escucharla para creerla.\r\n\r\n', '/img/shop/neonWhite.jpg', 42.99, 1),
(8, 'Pink Floyd The Dark side of the moon', 'The Dark Side of the Moon es el octavo álbum de estudio de la banda de rock británica Pink Floyd, lanzado el 1 de marzo de 1973 por Harvest Records en el Reino Unido y Capitol Records en Estados Unidos. Desarrollado durante presentaciones en vivo antes de que comenzara la grabación, fue concebido como un álbum conceptual que se centraría en las presiones que enfrentó la banda durante su arduo estilo de vida y también abordaría los problemas de salud mental del exmiembro de la banda Syd Barrett, quien dejó el grupo en 1968. Se grabó material nuevo en dos sesiones en 1972 y 1973 en los estudios EMI —ahora Abbey Road Studios— en Londres.', '/img/shop/pfDarkSide.jpg', 32.89, 1),
(9, 'The beatles, Sgt. Pepper\'s Lonely Hearts Club Band', 'Sgt. Pepper\'s Lonely Hearts Club Band es el octavo álbum de estudio de la banda británica de rock, The Beatles. Publicado el 26 de mayo de 1967, es a menudo citado por la crítica como su mejor obra y el disco más importante de todos los tiempos.2​ Continuando con la maduración artística de la banda vista en Revolver (1966), se alejó bastante del pop rock convencional de la época e incorporó elementos poco comunes y muy divergentes entre sí a su música, como música hindú, música psicodélica, music hall, e influencias sinfónicas.​ Se dice que este álbum es una respuesta al aclamado Pet Sounds del grupo The Beach Boys publicado en 1966, y considerado por la crítica como superación por excelencia al dicho álbum.', '/img/shop/tbPepper.jpg', 15.99, 1),
(10, 'Tales from Topographic Oceans, yes', 'Tales from Topographic Oceans —en español: Relatos de los Océanos Topográficos— es el sexto álbum de estudio de la banda inglesa de rock progresivo Yes, lanzado en 1973 por Atlantic Records.', '/img/shop/yTalesOf.jpg', 43.99, 1),
(11, 'the Messenger 2xLP', 'La banda sonora de The Messenger es una rara joya profetizada en pergaminos antiguos. Es una odisea catártica a través de la mitología y el caos, imaginada a través de los orificios de un prolífico loco llamado Rainbowdragoneyes. Este 2xLP representa la dualidad de la narrativa del juego y su doble personalidad como álbum. El primer disco rezuma NES-talgia de 8 bits, mientras que el segundo disco nos transporta al futuro de 16 bits. Se trata de dos bandas sonoras distintas nacidas de diferentes épocas, pero unidas por el sudor ninja y la sangre demoníaca. Son ambiciosos, adictivos y totalmente increíbles.\r\n\r\n', '/img/shop/theMessenger.jpg', 19.99, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_rol` (`id_rol`);

--
-- Indices de la tabla `vinilos`
--
ALTER TABLE `vinilos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vinilos`
--
ALTER TABLE `vinilos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_id_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
