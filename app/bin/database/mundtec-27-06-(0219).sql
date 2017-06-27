-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-06-2017 a las 07:18:29
-- Versión del servidor: 10.1.22-MariaDB
-- Versión de PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mundtec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `caption` varchar(255) COLLATE utf8_bin NOT NULL,
  `bg` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`id`, `title`, `caption`, `bg`) VALUES
(1, 'Titulo 1', 'Descripcion del titulo 1', 'musimundo.jpg'),
(2, 'Titulo 2', 'Descripcion del titulo 2', 'Musimundo-Hotsale.png'),
(3, 'Titulo 3', 'Descripción del titulo 3', 'fravega2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(120) COLLATE utf8_bin NOT NULL,
  `icon` varchar(120) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`) VALUES
(1, 'Netbooks', 'fa-laptop'),
(2, 'Celulares', 'fa-mobile'),
(3, 'Televisores', 'fa-television');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catmarc`
--

CREATE TABLE `catmarc` (
  `id` int(11) NOT NULL,
  `catId` int(11) NOT NULL,
  `marcId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `catmarc`
--

INSERT INTO `catmarc` (`id`, `catId`, `marcId`) VALUES
(1, 1, 7),
(2, 1, 8),
(3, 1, 9),
(4, 1, 10),
(5, 1, 11),
(6, 2, 1),
(7, 2, 2),
(8, 2, 3),
(9, 2, 4),
(10, 2, 5),
(11, 2, 6),
(12, 2, 12),
(13, 3, 1),
(14, 3, 4),
(15, 3, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `name` varchar(120) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `name`) VALUES
(1, 'lg'),
(2, 'sony'),
(3, 'motorola'),
(4, 'samsung'),
(5, 'huawei'),
(6, 'admiral'),
(7, 'compaq'),
(8, 'hp'),
(9, 'lenovo'),
(10, 'acer'),
(11, 'positivo-bgh'),
(12, 'lumia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `myhistory`
--

CREATE TABLE `myhistory` (
  `id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `ProducId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `fecha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `myproducts`
--

CREATE TABLE `myproducts` (
  `id` int(11) NOT NULL,
  `ProducId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `cant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producimgs`
--

CREATE TABLE `producimgs` (
  `id` int(11) NOT NULL,
  `carpet` text COLLATE utf8_bin NOT NULL,
  `url` text COLLATE utf8_bin NOT NULL,
  `type` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `producimgs`
--

INSERT INTO `producimgs` (`id`, `carpet`, `url`, `type`) VALUES
(1, '57eecf96a3455', '57eecf96a3729.jpg', 'max'),
(2, '57eecf96a3455', '57eecf96bf95f.jpg', 'max'),
(3, '57eecf96a3455', '57eecf96de08e.jpg', 'max'),
(4, '57eecf96a3455', '57eecf970a162.jpg', 'max'),
(5, '57eecf96a3455', '57eecf9727c1c.jpg', 'max'),
(6, '57eecf96a3455', '57eecf97bc4e4.jpg', 'min'),
(7, '57eecf96a3455', '57eecf97c3ca9.jpg', 'min'),
(8, '57eecf96a3455', '57eecf97cc673.jpg', 'min'),
(9, '57eecf96a3455', '57eecf97d7fb1.jpg', 'min'),
(10, '57eecf96a3455', '57eecf97e08e2.jpg', 'min'),
(11, '57eed62cb2bd2', '57eed62cb2e96.jpg', 'max'),
(12, '57eed62cb2bd2', '57eed62cd0fa0.jpg', 'max'),
(13, '57eed62cb2bd2', '57eed62cf158d.jpg', 'max'),
(14, '57eed62cb2bd2', '57eed62d1dc2e.jpg', 'max'),
(15, '57eed62cb2bd2', '57eed62d3882b.jpg', 'max'),
(16, '57eed62cb2bd2', '57eed62e015e4.jpg', 'min'),
(17, '57eed62cb2bd2', '57eed62e0a8cd.jpg', 'min'),
(18, '57eed62cb2bd2', '57eed62e13e18.jpg', 'min'),
(19, '57eed62cb2bd2', '57eed62e1d12f.jpg', 'min'),
(20, '57eed62cb2bd2', '57eed62e5440a.jpg', 'min'),
(21, '57f059cbec646', '57f059cc05343.jpg', 'max'),
(22, '57f059cbec646', '57f059cc31850.jpg', 'max'),
(23, '57f059cbec646', '57f059cc5eed4.jpg', 'max'),
(24, '57f059cbec646', '57f059ccc600e.jpg', 'min'),
(25, '57f059cbec646', '57f059ccdb17e.jpg', 'min'),
(26, '57f059cbec646', '57f059cd04cd2.jpg', 'min'),
(27, '57f05a7f12562', '57f05a7f128c7.jpg', 'max'),
(28, '57f05a7f12562', '57f05a7f41432.jpg', 'max'),
(29, '57f05a7f12562', '57f05a7f75f47.jpg', 'max'),
(30, '57f05a7f12562', '57f05a8006a87.jpg', 'min'),
(31, '57f05a7f12562', '57f05a801c229.jpg', 'min'),
(32, '57f05a7f12562', '57f05a8040f7f.jpg', 'min'),
(33, '57f05af3693bf', '57f05af3697b8.jpg', 'max'),
(34, '57f05af3693bf', '57f05af38d75a.jpg', 'max'),
(35, '57f05af3693bf', '57f05af3b697f.jpg', 'max'),
(36, '57f05af3693bf', '57f05af3dd223.jpg', 'max'),
(37, '57f05af3693bf', '57f05af4560c8.jpg', 'min'),
(38, '57f05af3693bf', '57f05af464889.jpg', 'min'),
(39, '57f05af3693bf', '57f05af47fcb1.jpg', 'min'),
(40, '57f05af3693bf', '57f05af49af70.jpg', 'min'),
(41, '57f05b640fa6e', '57f05b642fda9.jpg', 'max'),
(42, '57f05b640fa6e', '57f05b645492f.jpg', 'max'),
(43, '57f05b640fa6e', '57f05b647870d.jpg', 'max'),
(44, '57f05b640fa6e', '57f05b64a0f43.jpg', 'max'),
(45, '57f05b640fa6e', '57f05b65232f0.jpg', 'min'),
(46, '57f05b640fa6e', '57f05b6536ea3.jpg', 'min'),
(47, '57f05b640fa6e', '57f05b653f462.jpg', 'min'),
(48, '57f05b640fa6e', '57f05b6559772.jpg', 'min'),
(49, '57f05beae48a2', '57f05beae9b86.jpg', 'max'),
(50, '57f05beae48a2', '57f05beb1a612.jpg', 'max'),
(51, '57f05beae48a2', '57f05beb48197.jpg', 'max'),
(52, '57f05beae48a2', '57f05bebc97e4.jpg', 'min'),
(53, '57f05beae48a2', '57f05bebdb107.jpg', 'min'),
(54, '57f05beae48a2', '57f05bebe45c3.jpg', 'min'),
(55, '57f05c866a902', '57f05c8679fb0.jpg', 'max'),
(56, '57f05c866a902', '57f05c86a2dfc.jpg', 'max'),
(57, '57f05c866a902', '57f05c86d82d6.jpg', 'max'),
(58, '57f05c866a902', '57f05c871971b.jpg', 'max'),
(59, '57f05c866a902', '57f05c8786820.jpg', 'min'),
(60, '57f05c866a902', '57f05c879007a.jpg', 'min'),
(61, '57f05c866a902', '57f05c879e424.jpg', 'min'),
(62, '57f05c866a902', '57f05c87c24e7.jpg', 'min'),
(63, '57f0669ac52d7', '57f0669ad29d8.jpg', 'max'),
(64, '57f0669ac52d7', '57f0669aebc2a.jpg', 'max'),
(65, '57f0669ac52d7', '57f0669b11ccf.jpg', 'max'),
(66, '57f0669ac52d7', '57f0669b2a8b2.jpg', 'max'),
(67, '57f0669ac52d7', '57f0669b437b4.jpg', 'max'),
(68, '57f0669ac52d7', '57f0669b5c75d.jpg', 'max'),
(69, '57f0669ac52d7', '57f0669bc08bd.jpg', 'min'),
(70, '57f0669ac52d7', '57f0669bd13a8.jpg', 'min'),
(71, '57f0669ac52d7', '57f0669bdc416.jpg', 'min'),
(72, '57f0669ac52d7', '57f0669be69f3.jpg', 'min'),
(73, '57f0669ac52d7', '57f0669bf03b9.jpg', 'min'),
(74, '57f0669ac52d7', '57f0669c04aa5.jpg', 'min'),
(75, '57f06930e15c8', '57f06931005cd.jpg', 'max'),
(76, '57f06930e15c8', '57f0693124016.jpg', 'max'),
(77, '57f06930e15c8', '57f06931464ce.jpg', 'max'),
(78, '57f06930e15c8', '57f069315fa33.jpg', 'max'),
(79, '57f06930e15c8', '57f0693177c21.jpg', 'max'),
(80, '57f06930e15c8', '57f0693191310.jpg', 'max'),
(81, '57f06930e15c8', '57f06932108fd.jpg', 'min'),
(82, '57f06930e15c8', '57f06932247d4.jpg', 'min'),
(83, '57f06930e15c8', '57f069322dbf3.jpg', 'min'),
(84, '57f06930e15c8', '57f069323a9ef.jpg', 'min'),
(85, '57f06930e15c8', '57f0693241fe5.jpg', 'min'),
(86, '57f06930e15c8', '57f069324ad9f.jpg', 'min'),
(87, '57f069d27d692', '57f069d287bbd.jpg', 'max'),
(88, '57f069d27d692', '57f069d29fbb9.jpg', 'max'),
(89, '57f069d27d692', '57f069d2b9fbf.jpg', 'max'),
(90, '57f069d27d692', '57f069d30f3a3.jpg', 'min'),
(91, '57f069d27d692', '57f069d31bb54.jpg', 'min'),
(92, '57f069d27d692', '57f069d323ddd.jpg', 'min'),
(93, '57f06cafde778', '57f06cafe910f.jpg', 'max'),
(94, '57f06cafde778', '57f06cb011936.jpg', 'max'),
(95, '57f06cafde778', '57f06cb02e6c0.jpg', 'max'),
(96, '57f06cafde778', '57f06cb047cff.jpg', 'max'),
(97, '57f06cafde778', '57f06cb05fee0.jpg', 'max'),
(98, '57f06cafde778', '57f06cb0b493e.jpg', 'min'),
(99, '57f06cafde778', '57f06cb0c6655.jpg', 'min'),
(100, '57f06cafde778', '57f06cb0cef62.jpg', 'min'),
(101, '57f06cafde778', '57f06cb0d5fb8.jpg', 'min'),
(102, '57f06cafde778', '57f06cb0dcc92.jpg', 'min'),
(103, '57f06e7893be1', '57f06e78a582b.jpg', 'max'),
(104, '57f06e7893be1', '57f06e78c0f90.jpg', 'max'),
(105, '57f06e7893be1', '57f06e78dfb20.jpg', 'max'),
(106, '57f06e7893be1', '57f06e79076e4.jpg', 'max'),
(107, '57f06e7893be1', '57f06e79227a1.jpg', 'max'),
(108, '57f06e7893be1', '57f06e793eb20.jpg', 'max'),
(109, '57f06e7893be1', '57f06e79b10e0.jpg', 'min'),
(110, '57f06e7893be1', '57f06e79bdbd2.jpg', 'min'),
(111, '57f06e7893be1', '57f06e79c7271.jpg', 'min'),
(112, '57f06e7893be1', '57f06e79ce2ce.jpg', 'min'),
(113, '57f06e7893be1', '57f06e79d4da7.jpg', 'min'),
(114, '57f06e7893be1', '57f06e79dd358.jpg', 'min'),
(115, '57f06ebbb4176', '57f06ebbbec99.jpg', 'max'),
(116, '57f06ebbb4176', '57f06ebbd9985.jpg', 'max'),
(117, '57f06ebbb4176', '57f06ebbf24c3.jpg', 'max'),
(118, '57f06ebbb4176', '57f06ebc17175.jpg', 'max'),
(119, '57f06ebbb4176', '57f06ebc31bda.jpg', 'max'),
(120, '57f06ebbb4176', '57f06ebc8d37c.jpg', 'min'),
(121, '57f06ebbb4176', '57f06ebc96556.jpg', 'min'),
(122, '57f06ebbb4176', '57f06ebc9dc20.jpg', 'min'),
(123, '57f06ebbb4176', '57f06ebca5089.jpg', 'min'),
(124, '57f06ebbb4176', '57f06ebcad10d.jpg', 'min'),
(125, '57f06f653bda4', '57f06f6546739.jpg', 'max'),
(126, '57f06f653bda4', '57f06f656235e.jpg', 'max'),
(127, '57f06f653bda4', '57f06f657d786.jpg', 'max'),
(128, '57f06f653bda4', '57f06f6596c55.jpg', 'max'),
(129, '57f06f653bda4', '57f06f65ee1ed.jpg', 'min'),
(130, '57f06f653bda4', '57f06f6602aa5.jpg', 'min'),
(131, '57f06f653bda4', '57f06f660b5f8.jpg', 'min'),
(132, '57f06f653bda4', '57f06f6613f1c.jpg', 'min'),
(133, '57f075543e7aa', '57f0755452d68.jpg', 'max'),
(134, '57f075543e7aa', '57f075546e5e8.jpg', 'max'),
(135, '57f075543e7aa', '57f0755489219.jpg', 'max'),
(136, '57f075543e7aa', '57f07554a1f7d.jpg', 'max'),
(137, '57f075543e7aa', '57f07554bad58.jpg', 'max'),
(138, '57f075543e7aa', '57f07555157eb.jpg', 'min'),
(139, '57f075543e7aa', '57f075551e04d.jpg', 'min'),
(140, '57f075543e7aa', '57f0755527006.jpg', 'min'),
(141, '57f075543e7aa', '57f075552ed39.jpg', 'min'),
(142, '57f075543e7aa', '57f07555367c9.jpg', 'min'),
(143, '57f0759cd9db6', '57f0759ce4e0c.jpg', 'max'),
(144, '57f0759cd9db6', '57f0759d0a6b0.jpg', 'max'),
(145, '57f0759cd9db6', '57f0759d249e4.jpg', 'max'),
(146, '57f0759cd9db6', '57f0759d77b5b.jpg', 'min'),
(147, '57f0759cd9db6', '57f0759d87433.jpg', 'min'),
(148, '57f0759cd9db6', '57f0759d8e878.jpg', 'min'),
(149, '57f0774bd64f5', '57f0774be8536.jpg', 'max'),
(150, '57f0774bd64f5', '57f0774c0f3bd.jpg', 'max'),
(151, '57f0774bd64f5', '57f0774c31b9f.jpg', 'max'),
(152, '57f0774bd64f5', '57f0774c4fb15.jpg', 'max'),
(153, '57f0774bd64f5', '57f0774c67c35.jpg', 'max'),
(154, '57f0774bd64f5', '57f0774cd3ae9.jpg', 'min'),
(155, '57f0774bd64f5', '57f0774ce588a.jpg', 'min'),
(156, '57f0774bd64f5', '57f0774cef5a5.jpg', 'min'),
(157, '57f0774bd64f5', '57f0774d0373c.jpg', 'min'),
(158, '57f0774bd64f5', '57f0774d0aad6.jpg', 'min'),
(159, '57f0774d69f3f', '57f0774d747c9.jpg', 'max'),
(160, '57f0774d69f3f', '57f0774d9063b.jpg', 'max'),
(161, '57f0774d69f3f', '57f0774dac0c5.jpg', 'max'),
(162, '57f0774d69f3f', '57f0774dc6183.jpg', 'max'),
(163, '57f0774d69f3f', '57f0774de1bfd.jpg', 'max'),
(164, '57f0774d69f3f', '57f0774e5f170.jpg', 'min'),
(165, '57f0774d69f3f', '57f0774e6ff8b.jpg', 'min'),
(166, '57f0774d69f3f', '57f0774e79c6e.jpg', 'min'),
(167, '57f0774d69f3f', '57f0774e8223e.jpg', 'min'),
(168, '57f0774d69f3f', '57f0774e891f4.jpg', 'min'),
(169, '57f077be90fe6', '57f077be99de6.jpg', 'max'),
(170, '57f077be90fe6', '57f077beb53be.jpg', 'max'),
(171, '57f077be90fe6', '57f077becf957.jpg', 'max'),
(172, '57f077be90fe6', '57f077bee816b.jpg', 'max'),
(173, '57f077be90fe6', '57f077bf0cb94.jpg', 'max'),
(174, '57f077be90fe6', '57f077bf26577.jpg', 'max'),
(175, '57f077be90fe6', '57f077bf82013.jpg', 'min'),
(176, '57f077be90fe6', '57f077bf91a67.jpg', 'min'),
(177, '57f077be90fe6', '57f077bf9e18a.jpg', 'min'),
(178, '57f077be90fe6', '57f077bfa5cf0.jpg', 'min'),
(179, '57f077be90fe6', '57f077bfaefb9.jpg', 'min'),
(180, '57f077be90fe6', '57f077bfb7fe2.jpg', 'min'),
(181, '57f07857b780d', '57f07857c2175.jpg', 'max'),
(182, '57f07857b780d', '57f07857dd6a5.jpg', 'max'),
(183, '57f07857b780d', '57f0785811c93.jpg', 'max'),
(184, '57f07857b780d', '57f078582e52a.jpg', 'max'),
(185, '57f07857b780d', '57f07858aeaff.jpg', 'min'),
(186, '57f07857b780d', '57f07858be7af.jpg', 'min'),
(187, '57f07857b780d', '57f07858cd44c.jpg', 'min'),
(188, '57f07857b780d', '57f07858d851d.jpg', 'min'),
(189, '57f078590e0f9', '57f0785919fc0.jpg', 'max'),
(190, '57f078590e0f9', '57f0785935966.jpg', 'max'),
(191, '57f078590e0f9', '57f0785958708.jpg', 'max'),
(192, '57f078590e0f9', '57f0785974706.jpg', 'max'),
(193, '57f078590e0f9', '57f07859b7892.jpg', 'min'),
(194, '57f078590e0f9', '57f07859c7f3e.jpg', 'min'),
(195, '57f078590e0f9', '57f07859d219f.jpg', 'min'),
(196, '57f078590e0f9', '57f07859db1dd.jpg', 'min'),
(197, '57f078aa85e3b', '57f078aa907f3.jpg', 'max'),
(198, '57f078aa85e3b', '57f078aaabeb5.jpg', 'max'),
(199, '57f078aa85e3b', '57f078aac809e.jpg', 'max'),
(200, '57f078aa85e3b', '57f078ab28904.jpg', 'min'),
(201, '57f078aa85e3b', '57f078ab39b09.jpg', 'min'),
(202, '57f078aa85e3b', '57f078ab427c3.jpg', 'min'),
(203, '57f07973a45ad', '57f07973acce6.jpg', 'max'),
(204, '57f07973a45ad', '57f07973c88e8.jpg', 'max'),
(205, '57f07973a45ad', '57f07973e3f57.jpg', 'max'),
(206, '57f07973a45ad', '57f079740d564.jpg', 'max'),
(207, '57f07973a45ad', '57f0797427598.jpg', 'max'),
(208, '57f07973a45ad', '57f0797488427.jpg', 'min'),
(209, '57f07973a45ad', '57f0797494869.jpg', 'min'),
(210, '57f07973a45ad', '57f079749d780.jpg', 'min'),
(211, '57f07973a45ad', '57f07974a9bcb.jpg', 'min'),
(212, '57f07973a45ad', '57f07974b486c.jpg', 'min'),
(213, '57f07acf3b713', '57f07acf4369e.jpg', 'max'),
(214, '57f07acf3b713', '57f07acf5f2cf.jpg', 'max'),
(215, '57f07acf3b713', '57f07acf7c7c3.jpg', 'max'),
(216, '57f07acf3b713', '57f07acf998ff.jpg', 'max'),
(217, '57f07acf3b713', '57f07acfb25f8.jpg', 'max'),
(218, '57f07acf3b713', '57f07ad012fd7.jpg', 'min'),
(219, '57f07acf3b713', '57f07ad024440.jpg', 'min'),
(220, '57f07acf3b713', '57f07ad02e8cb.jpg', 'min'),
(221, '57f07acf3b713', '57f07ad03689e.jpg', 'min'),
(222, '57f07acf3b713', '57f07ad03d48a.jpg', 'min'),
(223, '57f07b8c876ce', '57f07b8c92a8e.jpg', 'max'),
(224, '57f07b8c876ce', '57f07b8cadf44.jpg', 'max'),
(225, '57f07b8c876ce', '57f07b8ccd1cd.jpg', 'max'),
(226, '57f07b8c876ce', '57f07b8ce7740.jpg', 'max'),
(227, '57f07b8c876ce', '57f07b8d4429b.jpg', 'min'),
(228, '57f07b8c876ce', '57f07b8d54f31.jpg', 'min'),
(229, '57f07b8c876ce', '57f07b8d5df60.jpg', 'min'),
(230, '57f07b8c876ce', '57f07b8d698dc.jpg', 'min'),
(231, '57f07d5dc4e5f', '57f07d5dd89bb.jpg', 'max'),
(232, '57f07d5dc4e5f', '57f07d5df4134.jpg', 'max'),
(233, '57f07d5dc4e5f', '57f07d5e1badb.jpg', 'max'),
(234, '57f07d5dc4e5f', '57f07d5e36247.jpg', 'max'),
(235, '57f07d5dc4e5f', '57f07d5e8071f.jpg', 'min'),
(236, '57f07d5dc4e5f', '57f07d5e912d9.jpg', 'min'),
(237, '57f07d5dc4e5f', '57f07d5e9ac75.jpg', 'min'),
(238, '57f07d5dc4e5f', '57f07d5ea3af7.jpg', 'min'),
(239, '57f07e3214a0e', '57f07e32245e3.jpg', 'max'),
(240, '57f07e3214a0e', '57f07e323f6c7.jpg', 'max'),
(241, '57f07e3214a0e', '57f07e325ae41.jpg', 'max'),
(242, '57f07e3214a0e', '57f07e3275103.jpg', 'max'),
(243, '57f07e3214a0e', '57f07e328f9b2.jpg', 'max'),
(244, '57f07e3214a0e', '57f07e32a9494.jpg', 'max'),
(245, '57f07e3214a0e', '57f07e334cc8e.jpg', 'min'),
(246, '57f07e3214a0e', '57f07e335a46b.jpg', 'min'),
(247, '57f07e3214a0e', '57f07e336371a.jpg', 'min'),
(248, '57f07e3214a0e', '57f07e336aa1e.jpg', 'min'),
(249, '57f07e3214a0e', '57f07e337258e.jpg', 'min'),
(250, '57f07e3214a0e', '57f07e337bfbc.jpg', 'min'),
(251, '57f08113b5b40', '57f08113c89d6.jpg', 'max'),
(252, '57f08113b5b40', '57f08113e6f83.jpg', 'max'),
(253, '57f08113b5b40', '57f08114115a5.jpg', 'max'),
(257, '57f08113b5b40', '57f08114c9183.jpg', 'min'),
(258, '57f08113b5b40', '57f08114d9565.jpg', 'min'),
(259, '57f08113b5b40', '57f08114e2807.jpg', 'min'),
(263, '57f0848a96f58', '57f0848ab234c.jpg', 'max'),
(264, '57f0848a96f58', '57f0848ad0a05.jpg', 'max'),
(265, '57f0848a96f58', '57f0848aec457.jpg', 'max'),
(266, '57f0848a96f58', '57f0848b12231.jpg', 'max'),
(267, '57f0848a96f58', '57f0848b2c4ed.jpg', 'max'),
(268, '57f0848a96f58', '57f0848b919a4.jpg', 'min'),
(269, '57f0848a96f58', '57f0848b9a0be.jpg', 'min'),
(270, '57f0848a96f58', '57f0848ba3b62.jpg', 'min'),
(271, '57f0848a96f58', '57f0848babf36.jpg', 'min'),
(272, '57f0848a96f58', '57f0848bb560f.jpg', 'min'),
(273, '57f085e7f0c65', '57f085e80807f.jpg', 'max'),
(274, '57f085e7f0c65', '57f085e82297d.jpg', 'max'),
(275, '57f085e7f0c65', '57f085e83fc74.jpg', 'max'),
(276, '57f085e7f0c65', '57f085e8592ce.jpg', 'max'),
(277, '57f085e7f0c65', '57f085e872d99.jpg', 'max'),
(278, '57f085e7f0c65', '57f085e909f9c.jpg', 'min'),
(279, '57f085e7f0c65', '57f085e91e4f2.jpg', 'min'),
(280, '57f085e7f0c65', '57f085e928287.jpg', 'min'),
(281, '57f085e7f0c65', '57f085e9307a6.jpg', 'min'),
(282, '57f085e7f0c65', '57f085e93949e.jpg', 'min'),
(283, '57f09a7483399', '57f09a7490395.jpg', 'max'),
(284, '57f09a7483399', '57f09a74b094b.jpg', 'max'),
(285, '57f09a7483399', '57f09a74d208c.jpg', 'max'),
(286, '57f09a7483399', '57f09a74f3411.jpg', 'max'),
(287, '57f09a7483399', '57f09a75d1d0a.jpg', 'min'),
(288, '57f09a7483399', '57f09a75dc91e.jpg', 'min'),
(289, '57f09a7483399', '57f09a75ec840.jpg', 'min'),
(290, '57f09a7483399', '57f09a7607991.jpg', 'min'),
(291, '57f16c173adea', '57f16c174d657.jpg', 'max'),
(292, '57f16c173adea', '57f16c1767f5c.jpg', 'max'),
(293, '57f16c173adea', '57f16c1784c16.jpg', 'max'),
(294, '57f16c173adea', '57f16c179d012.jpg', 'max'),
(295, '57f16c173adea', '57f16c1805ece.jpg', 'min'),
(296, '57f16c173adea', '57f16c1816b3c.jpg', 'min'),
(297, '57f16c173adea', '57f16c1827de6.jpg', 'min'),
(298, '57f16c173adea', '57f16c183004e.jpg', 'min'),
(299, '57f16d0ca3aa3', '57f16d0cae4d3.jpg', 'max'),
(300, '57f16d0ca3aa3', '57f16d0cc8f2c.jpg', 'max'),
(301, '57f16d0ca3aa3', '57f16d0ce4880.jpg', 'max'),
(302, '57f16d0ca3aa3', '57f16d0d0a2fb.jpg', 'max'),
(303, '57f16d0ca3aa3', '57f16d0d22aa9.jpg', 'max'),
(304, '57f16d0ca3aa3', '57f16d0d9db5f.jpg', 'min'),
(305, '57f16d0ca3aa3', '57f16d0daf564.jpg', 'min'),
(306, '57f16d0ca3aa3', '57f16d0db8484.jpg', 'min'),
(307, '57f16d0ca3aa3', '57f16d0dc4af0.jpg', 'min'),
(308, '57f16d0ca3aa3', '57f16d0dd016b.jpg', 'min'),
(309, '57f16dcc3dfff', '57f16dcc59590.jpg', 'max'),
(310, '57f16dcc3dfff', '57f16dcc79195.jpg', 'max'),
(311, '57f16dcc3dfff', '57f16dcc98ac9.jpg', 'max'),
(312, '57f16dcc3dfff', '57f16dccb59c3.jpg', 'max'),
(313, '57f16dcc3dfff', '57f16dccce706.jpg', 'max'),
(314, '57f16dcc3dfff', '57f16dcce92af.jpg', 'max'),
(315, '57f16dcc3dfff', '57f16dcd674fa.jpg', 'min'),
(316, '57f16dcc3dfff', '57f16dcd75316.jpg', 'min'),
(317, '57f16dcc3dfff', '57f16dcd7e56f.jpg', 'min'),
(318, '57f16dcc3dfff', '57f16dcd8640d.jpg', 'min'),
(319, '57f16dcc3dfff', '57f16dcd8dbe4.jpg', 'min'),
(320, '57f16dcc3dfff', '57f16dcd9689b.jpg', 'min'),
(321, '57f16ea5b88b4', '57f16ea5c3aa2.jpg', 'max'),
(322, '57f16ea5b88b4', '57f16ea5de283.jpg', 'max'),
(323, '57f16ea5b88b4', '57f16ea606764.jpg', 'max'),
(324, '57f16ea5b88b4', '57f16ea65dcdc.jpg', 'min'),
(325, '57f16ea5b88b4', '57f16ea66d978.jpg', 'min'),
(326, '57f16ea5b88b4', '57f16ea67772d.jpg', 'min'),
(327, '57f16f870dcd1', '57f16f871cd86.jpg', 'max'),
(328, '57f16f870dcd1', '57f16f8736b71.jpg', 'max'),
(329, '57f16f870dcd1', '57f16f87505c4.jpg', 'max'),
(330, '57f16f870dcd1', '57f16f878d444.jpg', 'min'),
(331, '57f16f870dcd1', '57f16f879f667.jpg', 'min'),
(332, '57f16f870dcd1', '57f16f87a8a05.jpg', 'min'),
(333, '57f17083510c5', 'Invalid.sql', 'max'),
(334, '57f17083510c5', 'Invalid.rar', 'max'),
(335, '57f17083510c5', 'Invalid.docx', 'max'),
(336, '57f17083510c5', 'Invalid.sql', 'min'),
(337, '57f17083510c5', 'Invalid.rar', 'min'),
(338, '57f17083510c5', 'Invalid.docx', 'min'),
(339, '57f17396a57fa', '57f173971e5eb.jpg', 'max'),
(340, '57f17396a57fa', '57f173974315f.jpg', 'max'),
(341, '57f17396a57fa', '57f17397616da.jpg', 'max'),
(342, '57f17396a57fa', '57f1739781f9e.jpg', 'max'),
(343, '57f17396a57fa', '57f173979c773.jpg', 'max'),
(344, '57f17396a57fa', '57f1739817d81.jpg', 'min'),
(345, '57f17396a57fa', '57f1739829305.jpg', 'min'),
(346, '57f17396a57fa', '57f1739832c6c.jpg', 'min'),
(347, '57f17396a57fa', '57f173983c239.jpg', 'min'),
(348, '57f17396a57fa', '57f1739844ed8.jpg', 'min'),
(349, '57f176d004fd8', '57f176d00fd3c.jpg', 'max'),
(350, '57f176d004fd8', '57f176d02dc2f.jpg', 'max'),
(351, '57f176d004fd8', '57f176d04a2ce.jpg', 'max'),
(352, '57f176d004fd8', '57f176d065616.jpg', 'max'),
(353, '57f176d004fd8', '57f176d082dce.jpg', 'max'),
(354, '57f176d004fd8', '57f176d0a7253.jpg', 'max'),
(355, '57f176d004fd8', '57f176d113ddf.jpg', 'min'),
(356, '57f176d004fd8', '57f176d12114a.jpg', 'min'),
(357, '57f176d004fd8', '57f176d12a683.jpg', 'min'),
(358, '57f176d004fd8', '57f176d133989.jpg', 'min'),
(359, '57f176d004fd8', '57f176d13e56b.jpg', 'min'),
(360, '57f176d004fd8', '57f176d148811.jpg', 'min'),
(361, '57f178aff2d24', '57f178b0276a9.jpg', 'max'),
(362, '57f178aff2d24', '57f178b0437c0.jpg', 'max'),
(363, '57f178aff2d24', '57f178b05f8e4.jpg', 'max'),
(364, '57f178aff2d24', '57f178b0a307c.jpg', 'min'),
(365, '57f178aff2d24', '57f178b0b5601.jpg', 'min'),
(366, '57f178aff2d24', '57f178b0be5eb.jpg', 'min'),
(367, '57f17a0ac56f7', '57f17a0aea5b3.jpg', 'max'),
(368, '57f17a0ac56f7', '57f17a0b1cb9d.jpg', 'max'),
(369, '57f17a0ac56f7', '57f17a0b42e7f.jpg', 'max'),
(370, '57f17a0ac56f7', '57f17a0b6597e.jpg', 'max'),
(371, '57f17a0ac56f7', '57f17a0b8044c.jpg', 'max'),
(372, '57f17a0ac56f7', '57f17a0b9a638.jpg', 'max'),
(373, '57f17a0ac56f7', '57f17a0c0d184.jpg', 'min'),
(374, '57f17a0ac56f7', '57f17a0c21139.jpg', 'min'),
(375, '57f17a0ac56f7', '57f17a0c2abfc.jpg', 'min'),
(376, '57f17a0ac56f7', '57f17a0c399ae.jpg', 'min'),
(377, '57f17a0ac56f7', '57f17a0c427d7.jpg', 'min'),
(378, '57f17a0ac56f7', '57f17a0c53756.jpg', 'min'),
(379, '57f17ba0694b8', '57f17ba076795.jpg', 'max'),
(380, '57f17ba0694b8', '57f17ba098ac1.jpg', 'max'),
(381, '57f17ba0694b8', '57f17ba0b5464.jpg', 'max'),
(382, '57f17ba0694b8', '57f17ba0d1151.jpg', 'max'),
(384, '57f17ba0694b8', '57f17ba1098fb.jpg', 'max'),
(385, '57f17ba0694b8', '57f17ba126db8.jpg', 'max'),
(386, '57f17ba0694b8', '57f17ba145b34.jpg', 'max'),
(387, '57f17ba0694b8', '57f17ba1bb96e.jpg', 'min'),
(388, '57f17ba0694b8', '57f17ba1c72aa.jpg', 'min'),
(389, '57f17ba0694b8', '57f17ba1d0b78.jpg', 'min'),
(390, '57f17ba0694b8', '57f17ba1d9a14.jpg', 'min'),
(392, '57f17ba0694b8', '57f17ba1e64d6.jpg', 'min'),
(393, '57f17ba0694b8', '57f17ba1efd74.jpg', 'min'),
(394, '57f17ba0694b8', '57f17ba2072b8.jpg', 'min'),
(395, '57f17d4769414', '57f17d477690f.jpg', 'max'),
(396, '57f17d4769414', '57f17d479988c.jpg', 'max'),
(397, '57f17d4769414', '57f17d47bce91.jpg', 'max'),
(398, '57f17d4769414', '57f17d47db783.jpg', 'max'),
(399, '57f17d4769414', '57f17d48480e5.jpg', 'min'),
(400, '57f17d4769414', '57f17d485b21d.jpg', 'min'),
(401, '57f17d4769414', '57f17d48640ca.jpg', 'min'),
(402, '57f17d4769414', '57f17d4870d44.jpg', 'min'),
(403, '57f17e152c890', '57f17e1539491.jpg', 'max'),
(404, '57f17e152c890', '57f17e1556ed7.jpg', 'max'),
(405, '57f17e152c890', '57f17e15739c6.jpg', 'max'),
(406, '57f17e152c890', '57f17e15ae1ee.jpg', 'min'),
(407, '57f17e152c890', '57f17e15b81e8.jpg', 'min'),
(408, '57f17e152c890', '57f17e15c1c5b.jpg', 'min'),
(409, '57f181751a03c', '57f18175345ca.jpg', 'max'),
(410, '57f181751a03c', '57f181756a11d.jpg', 'max'),
(411, '57f181751a03c', '57f181758b904.jpg', 'max'),
(412, '57f181751a03c', '57f18175acb3f.jpg', 'max'),
(413, '57f181751a03c', '57f18175cb08c.jpg', 'max'),
(414, '57f181751a03c', '57f18175e7282.jpg', 'max'),
(415, '57f181751a03c', '57f1817611064.jpg', 'max'),
(416, '57f181751a03c', '57f181763088c.jpg', 'max'),
(417, '57f181751a03c', '57f18176953be.jpg', 'min'),
(418, '57f181751a03c', '57f18176a798d.jpg', 'min'),
(419, '57f181751a03c', '57f18176b364b.jpg', 'min'),
(420, '57f181751a03c', '57f18176be6d1.jpg', 'min'),
(421, '57f181751a03c', '57f18176c898d.jpg', 'min'),
(422, '57f181751a03c', '57f18176d307a.jpg', 'min'),
(423, '57f181751a03c', '57f18176dd792.jpg', 'min'),
(424, '57f181751a03c', '57f18176e7ac6.jpg', 'min'),
(425, '57f1822c210cd', '57f1822c2e2c0.jpg', 'max'),
(426, '57f1822c210cd', '57f1822c4e21a.jpg', 'max'),
(427, '57f1822c210cd', '57f1822c79270.jpg', 'max'),
(428, '57f1822c210cd', '57f1822c996a6.jpg', 'max'),
(429, '57f1822c210cd', '57f1822d147e7.jpg', 'min'),
(430, '57f1822c210cd', '57f1822d239bc.jpg', 'min'),
(431, '57f1822c210cd', '57f1822d30070.jpg', 'min'),
(432, '57f1822c210cd', '57f1822d3bf1d.jpg', 'min'),
(433, '57f1832a2f3b7', '57f1832a7ece8.jpg', 'max'),
(434, '57f1832a2f3b7', '57f1832a993f3.jpg', 'max'),
(435, '57f1832a2f3b7', '57f1832adad42.jpg', 'min'),
(436, '57f1832a2f3b7', '57f1832ae5467.jpg', 'min'),
(437, '57f1848701b1c', 'Invalid.', 'max'),
(438, '57f1848701b1c', 'Invalid.', 'max'),
(439, '57f1848701b1c', 'Invalid.', 'min'),
(440, '57f1848701b1c', 'Invalid.', 'min'),
(441, '57f1877979cd3', '57f187798f5d8.jpg', 'max'),
(442, '57f1877979cd3', '57f18779f0c19.jpg', 'max'),
(443, '57f1877979cd3', '57f1877a29773.jpg', 'max'),
(444, '57f1877979cd3', '57f1877a4d82c.jpg', 'max'),
(445, '57f1877979cd3', '57f1877a67d1f.jpg', 'max'),
(446, '57f1877979cd3', '57f1877a830d2.jpg', 'max'),
(447, '57f1877979cd3', '57f1877a9cd1e.jpg', 'max'),
(448, '57f1877979cd3', '57f1877ab56b7.jpg', 'max'),
(449, '57f1877979cd3', '57f1877b2f36e.jpg', 'min'),
(450, '57f1877979cd3', '57f1877b42696.jpg', 'min'),
(451, '57f1877979cd3', '57f1877b4d80c.jpg', 'min'),
(452, '57f1877979cd3', '57f1877b5a58f.jpg', 'min'),
(453, '57f1877979cd3', '57f1877b63bba.jpg', 'min'),
(454, '57f1877979cd3', '57f1877b6bf1b.jpg', 'min'),
(455, '57f1877979cd3', '57f1877b741af.jpg', 'min'),
(456, '57f1877979cd3', '57f1877b7cb5e.jpg', 'min'),
(457, '57f18a31c6cca', '57f18a3209e6a.jpg', 'max'),
(458, '57f18a31c6cca', '57f18a32332fb.jpg', 'max'),
(459, '57f18a31c6cca', '57f18a3252cd2.jpg', 'max'),
(460, '57f18a31c6cca', '57f18a328c6f6.jpg', 'min'),
(461, '57f18a31c6cca', '57f18a3298b84.jpg', 'min'),
(462, '57f18a31c6cca', '57f18a32a4129.jpg', 'min'),
(463, '57f18b29c84fe', '57f18b29d4dca.jpg', 'max'),
(464, '57f18b29c84fe', '57f18b29f1ef8.jpg', 'max'),
(465, '57f18b29c84fe', '57f18b2a1b2fa.jpg', 'max'),
(466, '57f18b29c84fe', '57f18b2a36b21.jpg', 'max'),
(467, '57f18b29c84fe', '57f18b2a5b357.jpg', 'max'),
(468, '57f18b29c84fe', '57f18b2a7b6cd.jpg', 'max'),
(469, '57f18b29c84fe', '57f18b2a95c71.jpg', 'max'),
(470, '57f18b29c84fe', '57f18b2ab38b5.jpg', 'max'),
(471, '57f18b29c84fe', '57f18b2b3381d.jpg', 'min'),
(472, '57f18b29c84fe', '57f18b2b42e0e.jpg', 'min'),
(473, '57f18b29c84fe', '57f18b2b4d42a.jpg', 'min'),
(474, '57f18b29c84fe', '57f18b2b5727a.jpg', 'min'),
(475, '57f18b29c84fe', '57f18b2b5f949.jpg', 'min'),
(476, '57f18b29c84fe', '57f18b2b6a5b9.jpg', 'min'),
(477, '57f18b29c84fe', '57f18b2b73fc3.jpg', 'min'),
(478, '57f18b29c84fe', '57f18b2b82988.jpg', 'min'),
(479, '57f18bfd0840b', '57f18bfd1c474.jpg', 'max'),
(480, '57f18bfd0840b', '57f18bfd38f74.jpg', 'max'),
(481, '57f18bfd0840b', '57f18bfd54d3a.jpg', 'max'),
(482, '57f18bfd0840b', '57f18bfd6e46c.jpg', 'max'),
(483, '57f18bfd0840b', '57f18bfd8a041.jpg', 'max'),
(484, '57f18bfd0840b', '57f18bfda6e68.jpg', 'max'),
(485, '57f18bfd0840b', '57f18bfe32e6c.jpg', 'min'),
(486, '57f18bfd0840b', '57f18bfe486e5.jpg', 'min'),
(487, '57f18bfd0840b', '57f18bfe53ed7.jpg', 'min'),
(488, '57f18bfd0840b', '57f18bfe5c60b.jpg', 'min'),
(489, '57f18bfd0840b', '57f18bfe66e07.jpg', 'min'),
(490, '57f18bfd0840b', '57f18bfe721f6.jpg', 'min'),
(491, '57f18e08713fd', '57f18e087cdca.jpg', 'max'),
(492, '57f18e08713fd', '57f18e089ca3c.jpg', 'max'),
(493, '57f18e08713fd', '57f18e08bdf68.jpg', 'max'),
(494, '57f18e08713fd', '57f18e08d874d.jpg', 'max'),
(495, '57f18e08713fd', '57f18e08f3bec.jpg', 'max'),
(496, '57f18e08713fd', '57f18e0920a98.jpg', 'max'),
(497, '57f18e08713fd', '57f18e093f744.jpg', 'max'),
(498, '57f18e08713fd', '57f18e09622c3.jpg', 'max'),
(499, '57f18e08713fd', '57f18e09c2610.jpg', 'min'),
(500, '57f18e08713fd', '57f18e09d59e5.jpg', 'min'),
(501, '57f18e08713fd', '57f18e09de000.jpg', 'min'),
(502, '57f18e08713fd', '57f18e09e59ae.jpg', 'min'),
(503, '57f18e08713fd', '57f18e09ee72f.jpg', 'min'),
(504, '57f18e08713fd', '57f18e0a04065.jpg', 'min'),
(505, '57f18e08713fd', '57f18e0a0da57.jpg', 'min'),
(506, '57f18e08713fd', '57f18e0a1743c.jpg', 'min'),
(507, '57f45f74673e5', '57f45f74753ea.jpg', 'max'),
(508, '57f45f74673e5', '57f45f74992b0.jpg', 'max'),
(509, '57f45f74673e5', '57f45f74b5d59.jpg', 'max'),
(510, '57f45f74673e5', '57f45f74d0e90.jpg', 'max'),
(511, '57f45f74673e5', '57f45f74f20f7.jpg', 'max'),
(512, '57f45f74673e5', '57f45f757a0ab.jpg', 'min'),
(513, '57f45f74673e5', '57f45f7588e24.jpg', 'min'),
(514, '57f45f74673e5', '57f45f759459d.jpg', 'min'),
(515, '57f45f74673e5', '57f45f759c144.jpg', 'min'),
(516, '57f45f74673e5', '57f45f75a8b34.jpg', 'min'),
(517, '57f46015ee545', '57f460160592c.jpg', 'max'),
(518, '57f46015ee545', '57f4601641031.jpg', 'max'),
(519, '57f46015ee545', '57f46016680fe.jpg', 'max'),
(520, '57f46015ee545', '57f4601688788.jpg', 'max'),
(521, '57f46015ee545', '57f460173ea73.jpg', 'min'),
(522, '57f46015ee545', '57f460174ad57.jpg', 'min'),
(523, '57f46015ee545', '57f460175563d.jpg', 'min'),
(524, '57f46015ee545', '57f4601761451.jpg', 'min'),
(525, '57f4607f8dcf7', '57f4607fcb93b.jpg', 'max'),
(526, '57f4607f8dcf7', '57f4607fecda7.jpg', 'max'),
(527, '57f4607f8dcf7', '57f460801a415.jpg', 'max'),
(528, '57f4607f8dcf7', '57f4608045052.jpg', 'max'),
(529, '57f4607f8dcf7', '57f460806368e.jpg', 'max'),
(530, '57f4607f8dcf7', '57f46082b0b98.jpg', 'min'),
(531, '57f4607f8dcf7', '57f46082c3258.jpg', 'min'),
(532, '57f4607f8dcf7', '57f46082e4ace.jpg', 'min'),
(533, '57f4607f8dcf7', '57f4608304859.jpg', 'min'),
(534, '57f4607f8dcf7', '57f460832cddc.jpg', 'min'),
(535, '57f461fff10a9', '57f4620013a41.jpg', 'max'),
(536, '57f461fff10a9', '57f462002eb78.jpg', 'max'),
(537, '57f461fff10a9', '57f462004b037.jpg', 'max'),
(538, '57f461fff10a9', '57f4620067b60.jpg', 'max'),
(539, '57f461fff10a9', '57f4620080a28.jpg', 'max'),
(540, '57f461fff10a9', '57f462009f5db.jpg', 'max'),
(541, '57f461fff10a9', '57f46200bad79.jpg', 'max'),
(542, '57f461fff10a9', '57f462015e6c5.jpg', 'min'),
(543, '57f461fff10a9', '57f46201701fb.jpg', 'min'),
(544, '57f461fff10a9', '57f4620189daa.jpg', 'min'),
(545, '57f461fff10a9', '57f4620195fcb.jpg', 'min'),
(546, '57f461fff10a9', '57f462019e76a.jpg', 'min'),
(547, '57f461fff10a9', '57f46201a8ca8.jpg', 'min'),
(548, '57f461fff10a9', '57f46201b2ef0.jpg', 'min'),
(549, '57f46326501bb', '57f463265c556.jpg', 'max'),
(550, '57f46326501bb', '57f4632677edb.jpg', 'max'),
(551, '57f46326501bb', '57f46326921ba.jpg', 'max'),
(552, '57f46326501bb', '57f46326ac3b4.jpg', 'max'),
(553, '57f46326501bb', '57f46326f0061.jpg', 'min'),
(554, '57f46326501bb', '57f463270606f.jpg', 'min'),
(555, '57f46326501bb', '57f463270df8b.jpg', 'min'),
(556, '57f46326501bb', '57f4632717583.jpg', 'min'),
(557, '57f467d5e1f39', '57f467d5f32d1.jpg', 'max'),
(558, '57f467d5e1f39', '57f467d61a3a3.jpg', 'max'),
(559, '57f467d5e1f39', '57f467d679c20.jpg', 'min'),
(560, '57f467d5e1f39', '57f467d6849c5.jpg', 'min'),
(561, '57f4680fc6723', '57f4680fd20ee.jpg', 'max'),
(562, '57f4680fc6723', '57f4681011552.jpg', 'max'),
(563, '57f4680fc6723', '57f468109a94b.jpg', 'min'),
(564, '57f4680fc6723', '57f46810c1e75.jpg', 'min'),
(565, '57f46958c3028', '57f46958cbc75.jpg', 'max'),
(566, '57f46958c3028', '57f46959052ef.jpg', 'max'),
(567, '57f46958c3028', '57f469595ba0e.jpg', 'min'),
(568, '57f46958c3028', '57f469597b308.jpg', 'min'),
(569, '57f473fe6717e', '57f473fe7f842.jpg', 'max'),
(570, '57f473fe6717e', '57f473febc3ea.jpg', 'max'),
(571, '57f473fe6717e', '57f473ff1e968.jpg', 'min'),
(572, '57f473fe6717e', '57f473ff45d74.jpg', 'min'),
(573, '57f4749e0d365', '57f4749e42196.jpg', 'max'),
(574, '57f4749e0d365', '57f4749e6bdec.jpg', 'max'),
(575, '57f4749e0d365', '57f4749e96a06.jpg', 'max'),
(576, '57f4749e0d365', '57f4749edd3e8.jpg', 'min'),
(577, '57f4749e0d365', '57f4749f07723.jpg', 'min'),
(578, '57f4749e0d365', '57f4749f22dda.jpg', 'min'),
(579, '57f4756897663', '57f47568c5bba.jpg', 'max'),
(580, '57f4756897663', '57f475690ab91.jpg', 'max'),
(581, '57f4756897663', '57f475693a006.jpg', 'max'),
(582, '57f4756897663', '57f47569775f2.jpg', 'min'),
(583, '57f4756897663', '57f47569acb49.jpg', 'min'),
(584, '57f4756897663', '57f47569beb0f.jpg', 'min'),
(585, '57f4772d7ee1e', '57f4772d9e872.jpg', 'max'),
(586, '57f4772d7ee1e', '57f4772dcdb6d.jpg', 'max'),
(587, '57f4772d7ee1e', '57f4772e00f75.jpg', 'max'),
(588, '57f4772d7ee1e', '57f4772e56ab1.jpg', 'min'),
(589, '57f4772d7ee1e', '57f4772e678a1.jpg', 'min'),
(590, '57f4772d7ee1e', '57f4772e8caff.jpg', 'min'),
(591, '57f6bc1553520', '57f6bc1560227.jpg', 'max'),
(592, '57f6bc1553520', '57f6bc158530f.jpg', 'max'),
(593, '57f6bc1553520', '57f6bc15ab42d.jpg', 'max'),
(594, '57f6bc1553520', '57f6bc1607ab0.jpg', 'min'),
(595, '57f6bc1553520', '57f6bc162bc51.jpg', 'min'),
(596, '57f6bc1553520', '57f6bc1646790.jpg', 'min'),
(597, '57f6bd5056f85', '57f6bd505ef2a.jpg', 'max'),
(598, '57f6bd5056f85', '57f6bd508ee4a.jpg', 'max'),
(599, '57f6bd5056f85', '57f6bd50c1c10.jpg', 'max'),
(600, '57f6bd5056f85', '57f6bd513cf7b.jpg', 'min'),
(601, '57f6bd5056f85', '57f6bd5154cf8.jpg', 'min'),
(602, '57f6bd5056f85', '57f6bd517df1b.jpg', 'min'),
(606, '58069bed4c4f1', '58069bedd2880.jpg', 'min'),
(607, '58071a8ad654e', '58071a8ada29a_1.jpg', 'max'),
(608, '58071a8ad654e', '58071a8b01266_2.jpg', 'max'),
(609, '58071a8ad654e', '58071a8b1e3b2_3.jpg', 'max'),
(610, '58071a8ad654e', '58071a8b6fda9_1.jpg', 'min'),
(611, '58071a8ad654e', '58071a8b7b0ec_2.jpg', 'min'),
(612, '58071a8ad654e', '58071a8b895d4_3.jpg', 'min'),
(639, '58069bed4c4f1', '580730329a7c4_1.jpg', 'max'),
(640, '58069bed4c4f1', '58073032be554_1.jpg', 'min'),
(641, '581547dc5f383', '581547dc8bb3d_1.jpg', 'max'),
(642, '581547dc5f383', '581547dcadcec_2.jpg', 'max'),
(644, '581547dc5f383', '581547dd0d6fc_1.jpg', 'min'),
(645, '581547dc5f383', '581547dd18070_2.jpg', 'min'),
(647, '581547dc5f383', '5815481376aec_1.jpg', 'max'),
(648, '581547dc5f383', '581548138f4b5_2.jpg', 'max'),
(649, '581547dc5f383', '58154813c19c5_1.jpg', 'min'),
(650, '581547dc5f383', '58154813c502d_2.jpg', 'min');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `descri` text COLLATE utf8_bin NOT NULL,
  `precio` decimal(9,0) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `marca` int(11) NOT NULL,
  `portada` text COLLATE utf8_bin NOT NULL,
  `carpet` text COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descri`, `precio`, `category_id`, `marca`, `portada`, `carpet`, `created_at`, `updated_at`) VALUES
(1, 'Celular Libre MOTOROLA MOTO G 3ra Generación', '<h2 style=\"outline: 0px; list-style: none;\" open=\"\" sans\",=\"\" sans-serif;\"=\"\"><em style=\"outline: 0px; list-style: none;\"><strong style=\"outline: 0px; list-style: none;\"><u><font face=\"verdana\" size=\"3\" color=\"#33cccc\">Descripción</font></u></strong></em></h2><p style=\"outline: 0px; list-style: none; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 12px;\"=\"\"><font face=\"verdana\" color=\"#33cccc\">Poderoso y accesible, el nuevo&nbsp;<strong style=\"outline: 0px; list-style: none;\">Moto G</strong>&nbsp;es un smartphone en el que podes confiar. Es resistente al agua, por lo que no te va a decepcionar. Y al venir equipado con un software innovador, una cámara de 13 Mp y la velocidad de 4G LTE, está listo para todo. Todo en un espectacular diseño que ofrece una sensación tan buena como su apariencia.</font></p><p style=\"outline: 0px; list-style: none; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 12px;\"=\"\"><font face=\"verdana\" color=\"#33cccc\"><br></font></p><h2 style=\"outline: 0px; list-style: none;\" open=\"\" sans\",=\"\" sans-serif;\"=\"\"><em style=\"outline: 0px; list-style: none;\"><strong style=\"outline: 0px; list-style: none;\"><u><font face=\"verdana\" size=\"3\" color=\"#33cccc\">Cámara</font></u></strong></em></h2><p style=\"outline: 0px; list-style: none; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 12px;\"=\"\"><font face=\"verdana\" color=\"#33cccc\"><strong style=\"outline: 0px; list-style: none;\">El Moto G&nbsp;</strong>tiene una&nbsp;<strong style=\"outline: 0px; list-style: none;\">cámara trasera de 13 Mp y frontal de 5 Mp</strong>:&nbsp;Captura&nbsp;fotos de gran nitidez con la cámara de 13 MP de tu&nbsp;<strong style=\"outline: 0px; list-style: none;\">Moto G</strong>, que incluye un flash LED doble de balance de color, y una cámara frontal de 5 MP.</font></p><font face=\"verdana\" color=\"#33cccc\"><br style=\"outline: 0px; list-style: none; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 12px;\"=\"\"></font><h2 style=\"outline: 0px; list-style: none;\" open=\"\" sans\",=\"\" sans-serif;\"=\"\"><em style=\"outline: 0px; list-style: none;\"><strong style=\"outline: 0px; list-style: none;\"><u><font face=\"verdana\" size=\"3\" color=\"#33cccc\">Batería</font></u></strong></em></h2><p style=\"outline: 0px; list-style: none; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 12px;\"=\"\"><font face=\"verdana\" color=\"#33cccc\">Batería para todo tu día: Seguí con tu día sin detenerte a recargar.</font></p><font face=\"verdana\" color=\"#33cccc\"><br style=\"outline: 0px; list-style: none; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 12px;\"=\"\"></font><h2 style=\"outline: 0px; list-style: none;\" open=\"\" sans\",=\"\" sans-serif;\"=\"\"><em style=\"outline: 0px; list-style: none;\"><strong style=\"outline: 0px; list-style: none;\"><u><font face=\"verdana\" size=\"3\" color=\"#33cccc\">Pantalla</font></u></strong></em></h2><p style=\"outline: 0px; list-style: none; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 12px;\"=\"\"><font face=\"verdana\" color=\"#33cccc\">El&nbsp;<strong style=\"outline: 0px; list-style: none;\">Moto G</strong>&nbsp;tiene una pantalla HD de 5 pulgadas: Con la nítida pantalla HD de 5 pulgadas, obten el máximo de cada foto, cada&nbsp;vídeo&nbsp;y cada juego.</font></p><font face=\"verdana\" color=\"#33cccc\"><br style=\"outline: 0px; list-style: none; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 12px;\"=\"\"></font><h2 style=\"outline: 0px; list-style: none;\" open=\"\" sans\",=\"\" sans-serif;\"=\"\"><em style=\"outline: 0px; list-style: none;\"><strong style=\"outline: 0px; list-style: none;\"><u><font face=\"verdana\" size=\"3\" color=\"#33cccc\">Conectividad</font></u></strong></em></h2><p style=\"outline: 0px; list-style: none; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 12px;\"=\"\"><font face=\"verdana\" color=\"#33cccc\">Velocidad 4G / 4G LTE: Navega en internet, transmití música, juga y&nbsp;mira&nbsp;vídeos&nbsp;a gran velocidad.<br style=\"outline: 0px; list-style: none;\"><br style=\"outline: 0px; list-style: none;\">Como cualquier smartphone, si compras un&nbsp;<a href=\"http://www.fravega.com/smart-tv\" style=\"outline: 0px; list-style: none;\">Smart TV</a>&nbsp;o un dongle estilo Chromecast, vas a poder disfrutar tus contenidos de tu celular en tu TV.</font></p><h2 style=\"outline: 0px; list-style: none;\" open=\"\" sans\",=\"\" sans-serif;\"=\"\"><em style=\"outline: 0px; list-style: none;\"><strong style=\"outline: 0px; list-style: none;\"><u><font face=\"verdana\" size=\"3\" color=\"#33cccc\">Características especiales</font></u></strong></em></h2><p style=\"outline: 0px; list-style: none; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 12px;\"=\"\"><font face=\"verdana\" color=\"#33cccc\">Resistencia avanzada al agua. La protección de categoría IPX7 mantiene tu teléfono a salvo de salpicaduras y caídas accidentales al agua.*<br style=\"outline: 0px; list-style: none;\"><br style=\"outline: 0px; list-style: none;\">*Diseñado para resistir inmersiones de hasta 1 metro (3 pies) de profundidad durante un máximo de 30 minutos, siempre que la cubierta trasera esté bien sellada. No está diseñado para funcionar bajo el agua. No lo uses al nadar ni lo expongas a corrientes de agua con presión. No es a prueba de polvo. Consulta <a href=\"http://motorola.com\" title=\"Página web Motorola\" target=\"_blank\">Motorola.com</a> para obtener detalles.</font></p>', '7000', 2, 3, '580cce9802df8_1.jpg', '57f08113b5b40', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Celular Libre SAMSUNG GALAXY J5 2016 BLACK', '<div><span style=\"font-size: 12px;\"><font face=\"verdana\"><br></font></span></div><font face=\"verdana\"><font size=\"3\"><b>Pura elegancia</b></font><br style=\"outline: 0px; list-style: none; font-size: 12px;\"><span style=\"font-size: 12px;\">Elegancia y robustez a partes iguales. Su marco metálico protegerá tu Smartphone para que puedas admirar la belleza de tu Galaxy J5 por más tiempo.</span><br style=\"outline: 0px; list-style: none; font-size: 12px;\"><span style=\"font-size: 12px;\">Con luz propia</span></font><div><font face=\"verdana\"><span style=\"font-size: 12px;\">Disfruta de fotos lo más nítidas posible incluso con poca luz, y todo gracias al objetivo luminoso F1.9 de su cámara delantera y trasera. Y para que no te pierdas ningún momento, accede a la cámara haciendo doble clic en el botón de inicio.</span><br style=\"outline: 0px; list-style: none; font-size: 12px;\"><span style=\"font-size: 12px;\">Muestra siempre tu mejor cara</span><br style=\"outline: 0px; list-style: none; font-size: 12px;\"><span style=\"font-size: 12px;\">Con Galaxy J5 no tendrás perfil malo. Gracias a su LED frontal y al modo belleza, siempre saldrás perfecto. Además, con el reconocimiento de saludo podrás hacer el selfie perfecto en cuestión de segundos.</span><br style=\"outline: 0px; list-style: none; font-size: 12px;\"><span style=\"font-size: 12px;\">Mayor autonomía</span><br style=\"outline: 0px; list-style: none; font-size: 12px;\"><span style=\"font-size: 12px;\">Disfruta de tu smartphone y sus aplicaciones de forma totalmente fluida por más tiempo gracias a su batería de gran duración y el modo ultrahorro de energía.</span></font><br></div>', '6000', 2, 4, '580cc6fec4e15_1.jpg', '57f0848a96f58', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Celular Libre SAMSUNG GALAXY J7 4G negro', '<h2 style=\"outline: 0px; list-style: none; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\"><font face=\"verdana\"><em style=\"outline: 0px; list-style: none;\"><strong style=\"outline: 0px; list-style: none;\">Pantalla</strong></em>&nbsp;</font></h2><h2 style=\"outline: 0px; list-style: none; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\"><u><font size=\"4\" face=\"verdana\">Experimenta Galaxy&nbsp; J7</font></u></h2><p style=\"outline: 0px; list-style: none; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 12px;\"=\"\"><font face=\"verdana\">El nuevo&nbsp;<strong style=\"outline: 0px; list-style: none;\">Samsung J7</strong>&nbsp;te dará una&nbsp;Increíble funcionalidad en tus manos. Disfruta excelentes fotos y videos en su cristalina&nbsp;<strong style=\"outline: 0px; list-style: none;\">pantalla Super AMOLED 5.5”</strong>, desempeño sobresaliente y versátiles cámaras.</font></p><font face=\"verdana\"><br style=\"outline: 0px; list-style: none; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 12px;\"=\"\"></font><h2 style=\"outline: 0px; list-style: none; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\"><font size=\"4\" face=\"verdana\"><u>Una gran experiencia visual</u></font></h2><p style=\"outline: 0px; list-style: none; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 12px;\"=\"\"><font face=\"verdana\">Con su pantalla Super AMOLED, el nuevo&nbsp;<strong style=\"outline: 0px; list-style: none;\">Samsung&nbsp;Galaxy J7</strong>&nbsp;te permite disfrutar de contenido vívido y enriquecido como nunca antes. Ahora es posible ver fotos, videos o jugar con colores cercanos a la realidad y con un contraste mejorado para lograr negros más intensos.</font></p><p style=\"outline: 0px; list-style: none; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 12px;\"=\"\"><font face=\"verdana\"><br></font></p><h2 style=\"outline: 0px; list-style: none; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\"><em style=\"outline: 0px; list-style: none;\"><strong style=\"outline: 0px; list-style: none;\"><font face=\"verdana\">Cámara</font></strong></em></h2><h2 style=\"outline: 0px; list-style: none; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\"><font size=\"4\" face=\"verdana\"><u>Cámara mejorada</u></font></h2><p style=\"outline: 0px; list-style: none; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 12px;\"=\"\"><font face=\"verdana\">Con tu&nbsp;<strong style=\"outline: 0px; list-style: none;\">Samsung J7</strong>&nbsp;obtendrás fotos y videos más brillantes y nítidos gracias a la cámara trasera de 13 MP y apertura focal&nbsp;F1.9, que tienen los&nbsp;<strong style=\"outline: 0px; list-style: none;\">Galaxy Serie J</strong>. El valor agregado de este smartphone es que posee&nbsp;flash en la cámara frontal, que te permitirá&nbsp;hacer brillantes capturas incluso en condiciones de poca luz.</font></p><font face=\"verdana\"><br style=\"outline: 0px; list-style: none; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 12px;\"=\"\"></font><h2 style=\"outline: 0px; list-style: none; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\"><em style=\"outline: 0px; list-style: none;\"><strong style=\"outline: 0px; list-style: none;\"><font face=\"verdana\">Rendimiento</font></strong></em></h2><h2 style=\"outline: 0px; list-style: none; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\"><font size=\"4\" face=\"verdana\"><u>Gran desempeño</u></font></h2><p style=\"outline: 0px; list-style: none; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 12px;\"=\"\"><font face=\"verdana\">Rápida navegación web, videojuegos, video HD y ágil multitarea gracias al poderoso procesador de Samsung Galaxy J7.</font></p><font face=\"verdana\"><br style=\"outline: 0px; list-style: none; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 12px;\"=\"\"></font><h2 style=\"outline: 0px; list-style: none; color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" sans-serif;\"=\"\"><u><font size=\"4\" face=\"verdana\">Mayor batería</font></u></h2><p style=\"outline: 0px; list-style: none; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 12px;\"=\"\"><font face=\"verdana\">Saca el máximo provecho de Galaxy Serie J con su batería de alta capacidad. Películas, música, juegos o navegar en Internet por más tiempo.</font></p>', '9700', 2, 4, '580cc7468d9d7_1.jpg', '57f085e7f0c65', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Celular Libre HUAWEI P8 LITE negro', '<pre style=\"outline: 0px; list-style: none; color: rgb(0, 0, 0);\"><font face=\"verdana\" size=\"3\"><u><b>Diseño minimalista</b></u></font></pre><p style=\"outline: 0px; list-style: none; font-size: 12px;\"><font face=\"verdana\">Con una superficie lisa, un grosor de tan solo 7.7 mm y unas líneas impecables, Huawei P8 lite se adapta perfectamente a la palma de tu mano. Huawei P8 lite integra un diseño conceptual sin excesivos componentes curvos eliminando, por ejemplo, la protuberancia de la cámara y obteniendo una superficie lisa y una sensación elegante.</font></p><font face=\"verdana\"><br style=\"outline: 0px; list-style: none; font-size: 12px;\"></font><h2 style=\"outline: 0px; list-style: none; color: rgb(0, 0, 0);\"><font face=\"verdana\" size=\"3\"><b><u>Fotografías para enmarcar</u></b></font></h2><p style=\"outline: 0px; list-style: none; font-size: 12px;\"><font face=\"verdana\">El P8 lite tiene excepcionales capacidades fotográficas gracias a su cámara de 13 Mp y sus especificaciones profesionales.<br style=\"outline: 0px; list-style: none;\"><br style=\"outline: 0px; list-style: none;\">Cuenta con una fantástica cámara frontal de 5 Mp por lo que podrás tomar fotografías con una calidad excelente en ambos sentidos, y tus selfies te quedarán perfectos.</font></p><font face=\"verdana\"><br style=\"outline: 0px; list-style: none; font-size: 12px;\"></font><h2 style=\"outline: 0px; list-style: none; color: rgb(0, 0, 0);\"><font face=\"verdana\" size=\"3\"><b><u>Haz brillar tus selfies</u></b></font></h2><p style=\"outline: 0px; list-style: none;\"><font face=\"verdana\"><span style=\"font-size: 12px;\">El arte de hacer selfies evoluciona a un nuevo nivel con el modo Mejorar Selfie, reconoce automáticamente el rostro del usuario aplicando un efecto de embellecimiento&nbsp;pre-configurado, mientras que los demás rostros aparecen en la imagen de un modo estándar.</span><br style=\"outline: 0px; list-style: none;\"><br style=\"outline: 0px; list-style: none;\"><span style=\"font-size: 12px;\">Esta función resalta el encanto único del usuario que hace, de cada selfie, un recuerdo que guardar.</span></font></p><font face=\"verdana\"><br style=\"outline: 0px; list-style: none; font-size: 12px;\"></font><h2 style=\"outline: 0px; list-style: none; color: rgb(0, 0, 0);\"><font face=\"verdana\" size=\"3\"><b><u>Fotografías brillantes día y noche</u></b></font></h2><p style=\"outline: 0px; list-style: none; font-size: 12px;\"><font face=\"verdana\">Captura fotografías extraordinarias en condiciones de baja luminosidad, con una precisión y claridad extraordinaria.<br style=\"outline: 0px; list-style: none;\"><br style=\"outline: 0px; list-style: none;\">Los detalles son nítidos, los colores brillantes y cada fotografía se ve natural, incluso en las condiciones más difíciles. Además Huawei P8 lite, incorpora un flash de doble color que permite tomar fotografías de retratos sin el efecto de ojos rojos y proporciona una luz flash más natural.</font></p><font face=\"verdana\" size=\"3\"><b><u><br style=\"outline: 0px; list-style: none;\"></u></b></font><h2 style=\"outline: 0px; list-style: none; color: rgb(0, 0, 0);\"><font face=\"verdana\" size=\"3\"><b><u>Velocidad máxima en tu celular</u></b></font></h2><font face=\"verdana\"><br style=\"outline: 0px; list-style: none; font-size: 12px;\"></font><p style=\"outline: 0px; list-style: none; font-size: 12px;\"><font face=\"verdana\">Gracias a un procesador de ocho núcleos Kirin 620 de 64 bit, Huawei P8 lite proporciona una conexión 4G ultra rápida y una velocidad de descarga de 150 Mbps.<br style=\"outline: 0px; list-style: none;\"><br style=\"outline: 0px; list-style: none;\">Si a esto añadimos una memoria RAM de 2GB y un almacenamiento de 16GB y microSD, no tendrás problemas para instalar cualquier aplicación o jugar a cualquier juego.</font></p>', '7000', 2, 5, '580cc770b17f8_1.jpg', '57f09a7483399', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Celular Libre MOTOROLA MOTO E 4G LTE XT1527', '<p style=\"margin-top: 10px; margin-bottom: 10px; line-height: 19px; font-size: 13px;\"><font face=\"verdana\">El&nbsp;<strong>Motorola Moto E 2015 4G XT1527</strong>&nbsp;es un&nbsp;<strong>móvil Android</strong>&nbsp;bueno con procesador de 1200Mhz e 4-cores que permite ejecutar juegos y aplicaciones pesadas.</font></p><p style=\"margin-top: 10px; margin-bottom: 10px; line-height: 19px; font-size: 13px;\"><font face=\"verdana\">Con una ranura para tarjeta SIM, el Motorola Moto E 2015 4G XT1527 permite download hasta 150 Mbps para la navegación por Internet, pero esto también depende del operador móvil.</font></p><p style=\"margin-top: 10px; margin-bottom: 10px; line-height: 19px; font-size: 13px;\"><font face=\"verdana\">Buena conectividad de este terminal que incluye Bluetooth Versión 4.0 con A2DP, Wi-Fi 802.11 b/g/n, pero carece de conexión NFC.</font></p><p style=\"margin-top: 10px; margin-bottom: 10px; line-height: 19px; font-size: 13px;\"><font face=\"verdana\">Terminal con 145 gramos incluyendo la batería. El móvil Motorola Moto E 2015 4G XT1527 es relativamente delgado con 12,3 mm de espesor.</font></p>', '3500', 2, 3, '580cc7bd762b6_1.jpg', '57f16c173adea', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Celular Libre ADMIRAL 410', '<div><font face=\"verdana\" size=\"3\"><b><u>Pantalla</u></b></font></div><font face=\"verdana\" size=\"2\">Pantalla de 4 pulgadas<br style=\"outline: 0px; list-style: none;\">Tipo de pantalla WVGA IPS<br style=\"outline: 0px; list-style: none;\">Resolución&nbsp;de pantalla 800 x 480</font><div><font face=\"verdana\" style=\"background-color: rgb(255, 255, 255);\"><b><u><font size=\"3\">Sistema<br style=\"outline: 0px; list-style: none;\"></font></u></b><font size=\"2\">Procesador&nbsp;MTK6572M Dual core 1.0 GHZ</font><br style=\"outline: 0px; list-style: none;\"></font><span style=\"font-family: verdana;\">Sistema operativo Android KitKat 4.4.2</span><font face=\"verdana\" style=\"background-color: rgb(255, 255, 255);\"><br><font size=\"2\">Memoria RAM 512 MB</font><br style=\"outline: 0px; list-style: none;\"><font size=\"2\">Memoria interna 4 GB</font><br style=\"outline: 0px; list-style: none;\"><font size=\"2\">Expandible a 32 GB</font></font></div><div><font face=\"verdana\"><b><u><font size=\"3\">Especifícaciones</font></u></b><br style=\"outline: 0px; list-style: none;\"><font size=\"2\">Dimensiones 125.8 x 65.3 x 9.95 mm</font><br style=\"outline: 0px; list-style: none;\"><font size=\"2\">Peso 133g</font><br style=\"outline: 0px; list-style: none;\"><font size=\"2\">Camara (Delantera/Trasera) 0.3 Mp + 5 Mp</font><br style=\"outline: 0px; list-style: none;\"><font size=\"2\">Bateria 1500mAh</font><br style=\"outline: 0px; list-style: none;\"><font size=\"2\">Wifi Si</font><br style=\"outline: 0px; list-style: none;\"><font size=\"2\">Bluetooth Si</font><br style=\"outline: 0px; list-style: none;\"><font size=\"2\">3G Si</font><br style=\"outline: 0px; list-style: none;\"><font size=\"2\">Bandas GSM 850/900/1800/1900Mhz</font><br style=\"outline: 0px; list-style: none;\"><font size=\"2\">WCDMA 850/1900</font><br style=\"outline: 0px; list-style: none;\"><font size=\"2\">LTE No</font><br style=\"outline: 0px; list-style: none;\"><font size=\"2\">Dual sim Si</font><br style=\"outline: 0px; list-style: none;\"><font size=\"2\">Puerto Micro USB</font><br style=\"outline: 0px; list-style: none;\"><font size=\"2\">Sensores G-Sensors:L-Sensors;proximity Sensors</font><br style=\"outline: 0px; list-style: none;\"><font size=\"2\">GPS Si</font><br style=\"outline: 0px; list-style: none;\"><font size=\"2\">Audio 3.5 mm</font></font><br></div>', '1700', 2, 6, '580cc807b2d42_1.jpg', '57f16d0ca3aa3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Celular Libre MOTOROLA MOTO X PLAY', '<font face=\"verdana\"><font color=\"#003333\"><span itemprop=\"description\">El&nbsp;<strong>Motorola Moto X Play</strong>&nbsp;posee una pantalla 1080p de 5.5 pulgadas, procesador octa-core Snapdragon 615 a 1.7GHz, 2GB de RAM, 16GB o 32GB de almacenamiento expandible vía microSD, batería de 3630 mAh, cámara de 21 megapixels con flash LED dual, cámara frontal de 5 megapixels y corre Android 5.1 Lollipop.</span><br></font></font><div><span itemprop=\"description\"><div class=\"specifications_title specifications-summary-title\" style=\"line-height: 38px; margin-top: 40px; margin-bottom: 30px;\"><div class=\"field field-name-field-specifications-title field-type-text field-label-hidden\"><div class=\"field-items\"><div class=\"field-item even\"><font face=\"verdana\" size=\"4\" color=\"#003333\">Especificaciones</font></div></div></div></div><div class=\"specifications-summary-list\" style=\"font-size: 12px;\"><div class=\"specifications-summary-wrapper\"><font face=\"verdana\" color=\"#003333\"><div class=\"field field-name-field-specifications-summary-lft field-type-text-long field-label-hidden\" style=\"float: none; width: 317.984px; display: inline-block; vertical-align: top;\"><div class=\"field-items\"><div class=\"field-item even\"><h5 style=\"line-height: 20px; margin-top: 10px; margin-bottom: 5px; font-size: 14px;\">Batería para 2 días</h5><p style=\"margin-bottom: 10px;\">Seguí hasta dos días enteros sin detenerte a recargar<span style=\"font-size: 9px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;\">*</span></p><h5 style=\"line-height: 20px; margin-top: 10px; margin-bottom: 5px; font-size: 14px;\">Cámara de 21 MP</h5><p style=\"margin-bottom: 10px;\">Capturá imágenes claras, incluso con poca luz</p><h5 style=\"line-height: 20px; margin-top: 10px; margin-bottom: 5px; font-size: 14px;\">Pantalla full HD de 5,5”</h5><p>Mirá imágenes y videos con nitidez</p></div></div></div>&nbsp; &nbsp; &nbsp;</font><div class=\"field field-name-field-specifications-summary-rgt field-type-text-long field-label-hidden\" style=\"float: none; width: 317.984px; display: inline-block; vertical-align: top; margin-left: 58.6406px;\"><div class=\"field-items\"><div class=\"field-item even\"><h5 style=\"line-height: 20px; margin-top: 10px; margin-bottom: 5px; font-size: 14px;\"><font face=\"verdana\" color=\"#003333\">Recubrimiento que repele el agua</font></h5><p style=\"margin-bottom: 10px;\"><font face=\"verdana\" color=\"#003333\">Nunca permitas que derrames, salpicaduras o algo de lluvia se interpongan en tu camino<span style=\"font-size: 9px; line-height: 0; position: relative; vertical-align: baseline; top: -0.5em;\">†</span></font></p><h5 style=\"line-height: 20px; margin-top: 10px; margin-bottom: 5px; font-size: 14px;\"><font face=\"verdana\" color=\"#003333\">Experiencia Android™ pura y software fantástico</font></h5><p><font face=\"verdana\" color=\"#003333\">Disfrutá Android sin aplicaciones adicionales y con un software que aprende cómo ayudarte</font></p></div></div></div></div></div></span></div>', '11000', 2, 3, '580cc88936b8c_1.jpg', '57f16dcc3dfff', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Celular Libre SAMSUNG GRAND PRIME WHITE 4G', '<div><font color=\"#1a1a1a\" size=\"4\" face=\"trebuchet ms\"><b><u>Diseño</u></b></font></div><div><font color=\"#1a1a1a\" size=\"3\" face=\"trebuchet ms\">El Samsung Galaxy Grand Prime pesa 156 g y tiene un grosor de 8.6 mm, mientras que mide 144.8 mm de alto y 72.1 mm de ancho.</font></div><div><font color=\"#1a1a1a\" size=\"3\" face=\"trebuchet ms\"><br></font></div><div><font color=\"#1a1a1a\" size=\"4\" face=\"trebuchet ms\"><b><u>Pantalla</u></b></font></div><div><font color=\"#1a1a1a\" size=\"3\" face=\"trebuchet ms\">El Samsung Galaxy Grand Prime tiene un tamaño de pantalla de 5 pulgadas, con una resolución de 540x960. La pantalla es de tipo TFT. Tiene una densidad de píxeles de 220 ppp.</font></div><div><font color=\"#1a1a1a\" size=\"4\" face=\"trebuchet ms\"><br></font></div><div><font color=\"#1a1a1a\" size=\"4\" face=\"trebuchet ms\"><b><u>Hardware y rendimiento</u></b></font></div><div><font color=\"#1a1a1a\" size=\"3\" face=\"trebuchet ms\">El Samsung Galaxy Grand Prime trabaja con un cpu Cortex A53 de 4 núcleos que alcanza una velocidad de reloj de 1.2 GHz. Más características técnicas: en el apartado de memoria, contamos con 1.5 GB de memoria RAM y 8 GB para almacenamiento de archivos, apps y datos. La memoria de almacenamiento se puede ampliar vía microSD.</font></div><div><font color=\"#1a1a1a\" size=\"3\" face=\"trebuchet ms\"><br></font></div><div><font color=\"#1a1a1a\" size=\"4\" face=\"trebuchet ms\"><b><u>Software</u></b></font></div><div><font color=\"#1a1a1a\" size=\"3\" face=\"trebuchet ms\">El Samsung Galaxy Grand Prime cuenta con Android como sistema operativo, y en su lanzamiento corre la versión 4.4.2.</font></div><div><font color=\"#1a1a1a\" size=\"3\" face=\"trebuchet ms\"><br></font></div><div><font color=\"#1a1a1a\" size=\"4\" face=\"trebuchet ms\"><b><u>Cámara</u></b></font></div><div><font color=\"#1a1a1a\" size=\"3\" face=\"trebuchet ms\">La cámara trasera del Galaxy Grand Prime tiene una resolución de 8 megapíxeles. Cuenta con LED Flash. Además, puede grabar vídeo Full HD 1080p. El Galaxy Grand Prime también cuenta con cámara frontal, de 5 megapíxeles.</font></div><div><font face=\"trebuchet ms\"><br></font></div><div><font color=\"#1a1a1a\" size=\"4\" face=\"trebuchet ms\"><b><u>Batería</u></b></font></div><div><font color=\"#1a1a1a\" size=\"3\" face=\"trebuchet ms\">Además, ten en cuenta que la batería es extraíble, por lo que puedes intercambiarla por una de repuesto en cualquier momento. La capacidad de la batería del Galaxy Grand Prime es de 2600 mAh.</font></div><div><font color=\"#1a1a1a\" size=\"3\" face=\"trebuchet ms\"><br></font></div><div><font color=\"#1a1a1a\" size=\"4\" face=\"trebuchet ms\"><b><u>Conectividad</u></b></font></div><div><font color=\"#1a1a1a\" size=\"3\" face=\"trebuchet ms\">NFC SÍ</font></div><div><font color=\"#1a1a1a\" size=\"3\" face=\"trebuchet ms\">Bluetooth v4.0, A2DP</font></div><div><font color=\"#1a1a1a\" size=\"3\" face=\"trebuchet ms\">WiFi 802.11 b/g/n</font></div><div><font color=\"#1a1a1a\" size=\"3\" face=\"trebuchet ms\">USB microUSB v2.0</font></div><div><font color=\"#1a1a1a\" size=\"3\" face=\"trebuchet ms\">Carga inalámbrica NO</font></div><div><font color=\"#1a1a1a\" size=\"3\" face=\"trebuchet ms\">Tipo de tarjeta SIM microsim</font></div><div><font color=\"#1a1a1a\" size=\"3\" face=\"trebuchet ms\">Dual Sim SÍ</font></div><div><font color=\"#1a1a1a\" size=\"3\" face=\"trebuchet ms\">Redes 2G (GSM) 850 / 900 / 1800 / 1900</font></div><div><font color=\"#1a1a1a\" size=\"3\" face=\"trebuchet ms\">Redes 3G (HSDPA) 850 / 900 / 1900 / 2100</font></div><div><font color=\"#1a1a1a\" size=\"3\" face=\"trebuchet ms\">Redes 4G (LTE) 2100</font></div><div><font face=\"trebuchet ms\" size=\"3\"><span style=\"color: rgb(26, 26, 26);\">Samsung Galaxy Grand Prime utiliza una tarjeta microsim. Es además Dual SIM, por lo que puedes utilizar dos tarjetas al mismo tiempo. Este</span><span style=\"-webkit-font-smoothing: antialiased; color: rgb(26, 26, 26);\">Samsung&nbsp;Galaxy Grand Prime</span><span style=\"color: rgb(26, 26, 26);\">&nbsp;es compatible con las redes 4G en España. Cuenta también con conexión NFC</span></font><br></div>', '6000', 2, 4, '580cc8ad24fcb_1.jpg', '57f16ea5b88b4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Celular Libre HUAWEI G8 DORADO', '<div><font face=\"verdana\" size=\"4\"><b><u>Diseño</u></b></font></div><div><font face=\"verdana\" size=\"3\">El Huawei G8 pesa 167 g y tiene un grosor de 7.50 mm, mientras que mide 152.00 mm de alto y 76.50 mm de ancho.</font></div><div><font face=\"verdana\" size=\"3\"><br></font></div><div><font face=\"verdana\" size=\"4\"><b><u>Pantalla</u></b></font></div><div><font face=\"verdana\" size=\"3\">El Huawei G8 cuenta con una pantalla IPS de 5.5 pulgadas, con resolución 1920x1080. Alcanza una densidad de píxeles de 401 ppp. Además, cuenta con protección Corning Gorilla Glass 2.5 contra arañazos y golpes.</font></div><div><font face=\"verdana\" size=\"3\"><br></font></div><div><font face=\"verdana\" size=\"4\"><b><u>Hardware y rendimiento</u></b></font></div><div><font face=\"verdana\" size=\"3\">El Huawei G8 cuenta con 3 GB de memoria RAM y 32 GB para almacenamiento de apps, vídeos, fotos y datos en general. Completando sus características técnicas, en sus tripas encontraremos un procesador Cortex A53 de 4 núcleos a 1.50 GHz de velocidad. La memoria de almacenamiento se puede ampliar vía microSD.</font></div><div><font face=\"verdana\" size=\"3\"><br></font></div><div><font face=\"verdana\" size=\"4\"><b><u>Software</u></b></font></div><div><font face=\"verdana\" size=\"3\">El Huawei G8 corre la versión 5.1.1 Lollipop de Android.</font></div><div><font face=\"verdana\" size=\"3\"><br></font></div><div><font face=\"verdana\" size=\"4\"><b><u>Cámara</u></b></font></div><div><font face=\"verdana\" size=\"3\">En el G8 contamos con una cámara principal –o trasera- con una resolución de 13.0 megapíxeles. Es capaz de grabar vídeo Full HD 1080p. Además, contamos también con cámara frontal o secundaria , que tiene una resolución de 5.0 megapíxeles.</font></div><div><font face=\"verdana\" size=\"4\"><br></font></div><div><font face=\"verdana\" size=\"4\"><b><u>Batería</u></b></font></div><div><font face=\"verdana\" size=\"3\">La batería no es extraíble, por lo que no puedes reemplazarla si se desgasta o estropea. La capacidad de la batería del G8 es de 3000 mAh.</font></div><div><font face=\"verdana\" size=\"4\"><b><u><br></u></b></font></div><div><font face=\"verdana\" size=\"4\"><b><u>Conectividad</u></b></font></div><div><font face=\"verdana\" size=\"3\">NFC SÍ</font></div><div><font face=\"verdana\" size=\"3\">Bluetooth v4.0, A2DP</font></div><div><font face=\"verdana\" size=\"3\">WiFi v4.1, A2DP, EDR, LE</font></div><div><font face=\"verdana\" size=\"3\">USB microUSB v2.0</font></div><div><font face=\"verdana\" size=\"3\">Carga inalámbrica NO</font></div><div><font face=\"verdana\" size=\"3\">Tipo de tarjeta SIM nanosim</font></div><div><font face=\"verdana\" size=\"3\">Dual Sim SÍ</font></div><div><font face=\"verdana\" size=\"3\">Dual SIM 4G SÍ</font></div><div><font face=\"verdana\" size=\"3\">Redes 2G (GSM) 850 / 900 / 1800 / 1900</font></div><div><font face=\"verdana\" size=\"3\">Redes 3G (HSDPA) 850 / 900 / 2100</font></div><div><font face=\"verdana\" size=\"3\">Redes 4G (LTE) 800 / 850 / 900 / 1800 / 2100 / 2600 / 2300 / 2600 / 700</font></div><div><font face=\"verdana\" size=\"3\"><br></font></div><div><font face=\"verdana\" size=\"3\">En cuanto a conectividad, y además de las especificaciones técnicas que tienes a la izquierda, podemos contarte que el Huawei G8 utiliza una tarjeta nanosim. Es además Dual SIM, por lo que puedes utilizar dos tarjetas al mismo tiempo. Es además Dual SIM 4G, por lo que puedes utilizar dos tarjetas con datos 4G al mismo tiempo. Este Huawei G8 es compatible con las redes 4G en España. Cuenta también con conexión NFC.</font></div>', '11000', 2, 5, '580cc8bd9dfcb_1.jpg', '57f16f870dcd1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Celular Libre SAMSUNG GALAXY NOTE 5 PLATEADO', '<div style=\"border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none; color: rgb(51, 51, 51);\"><b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\"><font face=\"verdana\" size=\"3\">Fotos únicas</font></b></div><div style=\"border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none; color: rgb(51, 51, 51);\"><font face=\"verdana\" size=\"3\">Captura<b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\">&nbsp;imágenes increíbles</b>&nbsp;incluso en condiciones de poca luz &nbsp;gracias a los 13 megapíxeles de la cámara, el flash y la lente ultrarápida. Además obtene las mejores<b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\">selfies</b>&nbsp;con la cámara frontal de 5 megapíxeles.</font></div><div style=\"border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none; color: rgb(51, 51, 51);\"><font face=\"verdana\" size=\"3\"><br></font></div><div style=\"border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none; color: rgb(51, 51, 51);\"><b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\"><font face=\"verdana\" size=\"3\">Batería para todo el día</font></b></div><div style=\"border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none; color: rgb(51, 51, 51);\"><font face=\"verdana\" size=\"3\">La batería de 2470 mA de tu&nbsp;<b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\">Moto G 3ra Generación</b>&nbsp;te permite disfrutarlo al máximo en todo momento y lugar y llegar a casa aún con carga suficiente.</font></div><div style=\"border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none; color: rgb(51, 51, 51);\"><font face=\"verdana\" size=\"3\"><br></font></div><div style=\"border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none; color: rgb(51, 51, 51);\"><b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\"><font face=\"verdana\" size=\"3\">Todo Terreno</font></b></div><div style=\"border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none; color: rgb(51, 51, 51);\"><font face=\"verdana\" size=\"3\">Disfruta de tu&nbsp;<b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\">Moto</b><b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\">rola</b><b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\">&nbsp;G</b>&nbsp;al máximo gracias a la clasificación IPX7 de&nbsp;<b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\">resistencia al agua</b>&nbsp;que lo protege contra salpicaduras. Además la&nbsp;<b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\">pantalla</b>&nbsp;Corning&nbsp;<b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\">Gorilla Glass</b>&nbsp;<b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\">cuida</b>&nbsp;a tu celular de rayaduras y marcas.</font></div><div style=\"border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none; color: rgb(51, 51, 51);\"><font face=\"verdana\" size=\"3\"><br></font></div><div style=\"border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none; color: rgb(51, 51, 51);\"><b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\"><font face=\"verdana\" size=\"3\">Pantalla HD con colores reales&nbsp;</font></b></div><div style=\"border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none; color: rgb(51, 51, 51);\"><font face=\"verdana\" size=\"3\">Viví los&nbsp;<b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\">colores reales</b>&nbsp;de tus&nbsp;<b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\">fotos y videos</b>&nbsp;en todo tipo de condiciones de luz, incluso al&nbsp;<b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\">aire libre.</b></font></div><div style=\"border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none; color: rgb(51, 51, 51);\"><font face=\"verdana\" size=\"3\"><br></font></div><div style=\"border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none; color: rgb(51, 51, 51);\"><font face=\"verdana\" size=\"3\"><b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\">Memoria expandible</b>&nbsp;</font></div><div style=\"border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none; color: rgb(51, 51, 51);\"><font face=\"verdana\" size=\"3\">Si la memoria interna de 8GB no es suficiente para todos tus contenidos podes expandir la memoria&nbsp;<b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\">hasta 32 GB</b>&nbsp;y almacenar más fotos, música y videos.&nbsp;</font></div><div style=\"border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none; color: rgb(51, 51, 51);\"><b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\"><font face=\"verdana\" size=\"3\"><br></font></b></div><div style=\"border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none; color: rgb(51, 51, 51);\"><b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\"><font face=\"verdana\" size=\"3\">Velocidad de Internet&nbsp;</font></b></div><div style=\"border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none; color: rgb(51, 51, 51);\"><font face=\"verdana\" size=\"3\">Con&nbsp;<b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\">4G</b>&nbsp;podes navegar, escuchar musica y ver videos online a gran&nbsp;<b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\">velocidad de internet&nbsp;</b>con una calidad increíble y sin interrupciones.&nbsp;</font></div><div style=\"border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none; color: rgb(51, 51, 51);\"><font face=\"verdana\" size=\"3\"><br></font></div><div style=\"border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none; color: rgb(51, 51, 51);\"><b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\"><font face=\"verdana\" size=\"3\">Tu estilo</font></b></div><div style=\"border: 0px; font-variant-numeric: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none; color: rgb(51, 51, 51);\"><font face=\"verdana\" size=\"3\">Con las&nbsp;<b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\">carcasas intercambiables</b>&nbsp;elegí tu color favorito y dale a tu celular un&nbsp;<b style=\"border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: inherit; vertical-align: baseline; outline: none;\">toque personal y único.&nbsp;</b></font></div>', '8000', 2, 4, '580cc8f031720_1.jpg', '57f17396a57fa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Celular Libre LG NEXUS 5X LGH791 Negro', '<h3 style=\"-webkit-font-smoothing: antialiased; margin-bottom: 15px; line-height: 20px; clear: both; color: rgb(26, 26, 26);\"><font face=\"verdana\" size=\"3\"><b><u>Diseño y pantalla</u></b></font></h3><p style=\"-webkit-font-smoothing: antialiased; margin-bottom: 15px; line-height: 20px; color: rgb(26, 26, 26);\"><font face=\"verdana\" size=\"3\">El&nbsp;<span style=\"-webkit-font-smoothing: antialiased;\">Nexus 5X</span>&nbsp;cuenta con un exterior compacto, bastante similar a su predecesor, y posee un grosor de 7,9 mm, así como un peso de 136 gramos, lo que implica que es un dispositivo bastante ligero.</font></p><p style=\"-webkit-font-smoothing: antialiased; margin-bottom: 15px; line-height: 20px; color: rgb(26, 26, 26);\"><font face=\"verdana\" size=\"3\">La gran novedad de su diseño es que el móvil cuenta con&nbsp;<span class=\"bold\" style=\"-webkit-font-smoothing: antialiased;\">lector de huellas&nbsp;</span>en la parte trasera, que nos permitirá desbloquear la pantalla con nuestro dedo, así como utilizarlo para Android Pay.</font></p><p style=\"-webkit-font-smoothing: antialiased; margin-bottom: 15px; line-height: 20px; color: rgb(26, 26, 26);\"><font face=\"verdana\" size=\"3\">Viene con una pantalla IPS de&nbsp;<span class=\"bold\" style=\"-webkit-font-smoothing: antialiased;\">5,2 pulgadas con resolución Full HD</span>&nbsp;(1.920 x 1.080 píxeles), que supone una densidad de píxeles 424 ppp. Gracias a ella podremos ver los contenidos a una calidad más que aceptable. El panel se encuentra protegido por un&nbsp;<span class=\"bold\" style=\"-webkit-font-smoothing: antialiased;\">Corning Gorilla Glass 3</span>, que le protegerá contra golpes y arañazos.</font></p><h3 style=\"-webkit-font-smoothing: antialiased; margin-bottom: 15px; line-height: 20px; clear: both; color: rgb(26, 26, 26);\"><font face=\"verdana\" size=\"3\"><b><u>Hardware y conectividad</u></b></font></h3><p style=\"-webkit-font-smoothing: antialiased; margin-bottom: 15px; line-height: 20px; color: rgb(26, 26, 26);\"><font face=\"verdana\" size=\"3\">En su interior monta un procesador&nbsp;<span class=\"bold\" style=\"-webkit-font-smoothing: antialiased;\">Qualcomm Snapdragon 808</span>&nbsp;de seis núcleos funcionando a 1,8 GHz. Este chip, con arquitectura de 64 bits, nos es bastante familiar, ya que es el que incoporó LG a su buque insignia, el&nbsp;<a href=\"https://www.amazon.es/dp/B00WMPBRM6?tag=comphoy-21&amp;camp=3634&amp;creative=24822&amp;linkCode=as4&amp;creativeASIN=B00WMPBRM6&amp;adid=0TQJDQRQP5BSFTCGT4Q4&amp;\" rel=\"nofollow\" target=\"_blank\" style=\"-webkit-font-smoothing: antialiased; background: transparent; text-decoration: underline; cursor: pointer; color: rgb(222, 2, 34); display: inline;\">G4</a>&nbsp;y, por lo que hemos podido comprobar, está dando muy buenos resultados.&nbsp;</font></p><p style=\"-webkit-font-smoothing: antialiased; margin-bottom: 15px; line-height: 20px; color: rgb(26, 26, 26);\"><font face=\"verdana\" size=\"3\">A este le acompañará una<span class=\"bold\" style=\"-webkit-font-smoothing: antialiased;\">&nbsp;Adreno 418&nbsp;</span>para los gráficos y<span class=\"bold\" style=\"-webkit-font-smoothing: antialiased;\">&nbsp;2 GB de RAM</span>. Su memoria interna será de&nbsp;<span class=\"bold\" style=\"-webkit-font-smoothing: antialiased;\">16 ó 32 GB</span>, dependiendo de las preferencias del usuario, pero no se podrá ampliar mediante microSD. Eso sí, tendremos la posibilidad ampliar la capacidad del terminal con un servicio de almacenamiento en la nube, como DropBox o Google Drive.</font></p><p style=\"-webkit-font-smoothing: antialiased; margin-bottom: 15px; line-height: 20px; color: rgb(26, 26, 26);\"><font face=\"verdana\" size=\"3\">Una de las&nbsp;<span style=\"-webkit-font-smoothing: antialiased;\">características por las que más destaca el Nexus 5X&nbsp;</span>es porque incorpora un USB Type-C reversible. Éste se puede insertar en cualquier dirección, por lo que terminará con décadas de frustración a la hora de introducir al revés un USB en el móvil. Además es el doble de rápido que los actuales, alcanzando velocidades de&nbsp;<span class=\"bold\" style=\"-webkit-font-smoothing: antialiased;\">10 Gbts/sg</span>. &nbsp;Por si fuera poco, el equipo vendrá con&nbsp;<font color=\"#de0222\"><span style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; cursor: pointer;\"><u>Quick Charge 2.0</u></span></font>, que permitirá cargar el equipo al 60% en sólo 30 minutos.</font></p><p style=\"-webkit-font-smoothing: antialiased; margin-bottom: 15px; line-height: 20px; color: rgb(26, 26, 26);\"><font face=\"verdana\" size=\"3\">También poseerá otro tipo de conexiones más básicas como&nbsp;<span class=\"bold\" style=\"-webkit-font-smoothing: antialiased;\">Bluetooth 4.1, NFC o GPS</span>.</font></p><h3 style=\"-webkit-font-smoothing: antialiased; margin-bottom: 15px; line-height: 20px; clear: both; color: rgb(26, 26, 26);\"><font face=\"verdana\" size=\"3\"><b><u>Cámara y batería</u></b></font></h3><p style=\"-webkit-font-smoothing: antialiased; margin-bottom: 15px; line-height: 20px; color: rgb(26, 26, 26); text-align: justify;\"><font face=\"verdana\" size=\"3\">La cámara del&nbsp;<span style=\"-webkit-font-smoothing: antialiased;\">Nexus 5X</span><span class=\"bold\" style=\"-webkit-font-smoothing: antialiased;\">&nbsp;contará con un sensor de 12,3 megapíxeles</span>&nbsp;con Flash LED Dual, con la que podremos realizar unas fotos decentes. Aunque, aparentemente, posee una resolución más baja que la de otros terminales de gama alta, cuenta con píxeles de&nbsp;<span class=\"bold\" style=\"-webkit-font-smoothing: antialiased;\">1,55&nbsp;</span><span style=\"-webkit-font-smoothing: antialiased; border: 0px; outline: 0px; vertical-align: baseline; color: rgb(70, 69, 69); line-height: 19.5px;\">µ</span><span class=\"bold\" style=\"-webkit-font-smoothing: antialiased;\">m</span>, lo que implica que son más grandes de lo habitual y, por lo tanto, son capaces de capturar más cantidad de luz.</font></p><p style=\"-webkit-font-smoothing: antialiased; margin-bottom: 15px; line-height: 20px; color: rgb(26, 26, 26); text-align: justify;\"><font face=\"verdana\" size=\"3\">Esto mejorará los resultados en condiciones de poca luz. Siguiendo la tendencia, el sensor cuenta con una&nbsp;<span class=\"bold\" style=\"-webkit-font-smoothing: antialiased;\">lente de apertura f/2.0, doble flash LED y es capaz de capturar vídeos en 4K</span>.&nbsp;</font></p><p style=\"-webkit-font-smoothing: antialiased; margin-bottom: 15px; line-height: 20px; color: rgb(26, 26, 26);\"><font face=\"verdana\" size=\"3\">Su frontal será de&nbsp;<span class=\"bold\" style=\"-webkit-font-smoothing: antialiased;\">5 megapíxeles con f/2.2</span>, perfecta para hacer selfies.&nbsp;</font></p><p style=\"-webkit-font-smoothing: antialiased; margin-bottom: 15px; line-height: 20px; color: rgb(26, 26, 26);\"><font face=\"verdana\" size=\"3\">Por su parte, la&nbsp;<span class=\"bold\" style=\"-webkit-font-smoothing: antialiased;\">batería del equipo será de 2.700 mAh</span>, que supondrá una autonomía de un día completo, aproximadamente. Esto implica que cuenta con un 20% más de batería que el 5.</font></p>', '12000', 2, 1, '580ccb7ae7a74_1.jpg', '57f176d004fd8', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `productos` (`id`, `nombre`, `descri`, `precio`, `category_id`, `marca`, `portada`, `carpet`, `created_at`, `updated_at`) VALUES
(13, 'Celular Libre MICROSOFT LUMIA 640', '<h2 style=\"outline: 0px; list-style: none;\"><font face=\"verdana\" size=\"4\" color=\"#333399\">Microsoft Lumia 640</font></h2><p style=\"outline: 0px; list-style: none;\"><font size=\"3\" face=\"verdana\">Nunca sabés cuándo vas a tener tu próxima gran idea. Por eso, ahora podés estar listo para capturar ese momento de creatividad con un teléfono que tiene todo lo necesario para convertir la inspiración en acción.</font></p><font size=\"3\" face=\"verdana\"><br style=\"outline: 0px; list-style: none;\"></font><h2 style=\"outline: 0px; list-style: none; color: rgb(0, 0, 0);\"><font size=\"3\" face=\"verdana\"><b><u>La vida más cómoda</u></b></font></h2><p style=\"outline: 0px; list-style: none;\"><font size=\"3\" face=\"verdana\">Abrí la caja y prepará a tu Microsoft Lumia 640 para disfrutar de toda la gama de servicios gratuitos de Microsoft que ya vienen incorporados y están listos para ser usados. Conectate con amigos y familiares a través de Skype, aprovechá el acceso instantáneo a tus fotos y música con OneDrive y editá archivos con Microsoft Office donde quiera que estés. Equilibrar tu vida laboral y personal, ahora es mucho más fácil.</font></p><font size=\"3\" face=\"verdana\"><br style=\"outline: 0px; list-style: none;\"></font><h2 style=\"outline: 0px; list-style: none; color: rgb(0, 0, 0);\"><font size=\"3\" face=\"verdana\"><b><u>Rendimiento generado por potencia</u></b></font></h2><p style=\"outline: 0px; list-style: none;\"><font size=\"3\" face=\"verdana\">Toda la potencia que necesitás, el Microsoft Lumia 640 funciona tan rápido y en forma eficiente como vos. Con su procesador Qualcomm Snapdragon y Microsoft Office ya incorporados, te permite concentrarte mucho más en lo que estás haciendo. Mantenete conectado y disfrutando de tu Lumia por más tiempo gracias a su gran batería de 2500 mAh.</font></p><font size=\"3\" face=\"verdana\"><br style=\"outline: 0px; list-style: none;\"><b><u><br style=\"outline: 0px; list-style: none;\"></u></b></font><h2 style=\"outline: 0px; list-style: none; color: rgb(0, 0, 0);\"><font size=\"3\" face=\"verdana\"><b><u>Capturá tu mundo con claridad</u></b></font></h2><p style=\"outline: 0px; list-style: none;\"><font size=\"3\" face=\"verdana\">¿Quieres revivir tus momentos favoritos? Captúralos a todos con excelente calidad y facilidad con la aplicación Lumia Camera y la cámara posterior de 8 MP, luego cárgalos a tu almacenamiento gratuito en nube OneDrive para recuperar el momento. Y con la cámara frontal con un gran angular, deja que tu familia y amigos vean con mayor claridad tu entorno en tus videollamadas gratuitas de alta definición por Skype.</font></p><br style=\"outline: 0px; list-style: none; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 12px;\"=\"\">', '3500', 2, 12, '580ccbd89e97a_1.jpg', '57f178aff2d24', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Notebook COMPAQ 21-N121AR', '<h2 class=\"¿\" style=\"vertical-align: baseline; font-weight: bold; outline: 0px; margin-bottom: 8px; border: 0px; width: 497px;\"><font face=\"verdana\" size=\"3\" color=\"#003399\">Notebook N121AR</font></h2><h3 style=\"vertical-align: baseline; font-weight: bold; outline: 0px; margin-top: 10px; margin-bottom: 8px; margin-left: 10px; border: 0px; width: 497px;\"><font face=\"verdana\" size=\"3\" style=\"background-color: rgb(255, 255, 255);\" color=\"#003399\">CARACTERÍSTICAS DEL PRODUCTO</font></h3><ul style=\"vertical-align: baseline; outline: 0px; border: 0px; list-style: none outside none; color: rgb(51, 51, 51);\"><li style=\"vertical-align: baseline; font-weight: inherit; font-style: inherit; outline: 0px; padding-left: 10px; margin-bottom: 5px; border: 0px; background: url(\" ..=\"\" site=\"\" common=\"\" bulflecha3.gif\")=\"\" 0px=\"\" 4px=\"\" no-repeat=\"\" scroll=\"\" rgba(0,=\"\" 0,=\"\" 0);=\"\" line-height:=\"\" 14px;=\"\" list-style:=\"\" none=\"\" outside=\"\" none;\"=\"\"><font face=\"verdana\" size=\"3\">Marca: Compaq</font></li><li style=\"vertical-align: baseline; font-weight: inherit; font-style: inherit; outline: 0px; padding-left: 10px; margin-bottom: 5px; border: 0px; background: url(\" ..=\"\" site=\"\" common=\"\" bulflecha3.gif\")=\"\" 0px=\"\" 4px=\"\" no-repeat=\"\" scroll=\"\" rgba(0,=\"\" 0,=\"\" 0);=\"\" line-height:=\"\" 14px;=\"\" list-style:=\"\" none=\"\" outside=\"\" none;\"=\"\"><font face=\"verdana\" size=\"3\">Modelo: N121AR</font></li><li style=\"vertical-align: baseline; font-weight: inherit; font-style: inherit; outline: 0px; padding-left: 10px; margin-bottom: 5px; border: 0px; background: url(\" ..=\"\" site=\"\" common=\"\" bulflecha3.gif\")=\"\" 0px=\"\" 4px=\"\" no-repeat=\"\" scroll=\"\" rgba(0,=\"\" 0,=\"\" 0);=\"\" line-height:=\"\" 14px;=\"\" list-style:=\"\" none=\"\" outside=\"\" none;\"=\"\"><font face=\"verdana\" size=\"3\">Procesador: Intel Bay-trail-M N2840</font></li><li style=\"vertical-align: baseline; font-weight: inherit; font-style: inherit; outline: 0px; padding-left: 10px; margin-bottom: 5px; border: 0px; background: url(\" ..=\"\" site=\"\" common=\"\" bulflecha3.gif\")=\"\" 0px=\"\" 4px=\"\" no-repeat=\"\" scroll=\"\" rgba(0,=\"\" 0,=\"\" 0);=\"\" line-height:=\"\" 14px;=\"\" list-style:=\"\" none=\"\" outside=\"\" none;\"=\"\"><font face=\"verdana\" size=\"3\">Memoria RAM: 4GB</font></li><li style=\"vertical-align: baseline; font-weight: inherit; font-style: inherit; outline: 0px; padding-left: 10px; margin-bottom: 5px; border: 0px; background: url(\" ..=\"\" site=\"\" common=\"\" bulflecha3.gif\")=\"\" 0px=\"\" 4px=\"\" no-repeat=\"\" scroll=\"\" rgba(0,=\"\" 0,=\"\" 0);=\"\" line-height:=\"\" 14px;=\"\" list-style:=\"\" none=\"\" outside=\"\" none;\"=\"\"><font face=\"verdana\" size=\"3\">Disco duro: 500GB</font></li><li style=\"vertical-align: baseline; font-weight: inherit; font-style: inherit; outline: 0px; padding-left: 10px; margin-bottom: 5px; border: 0px; background: url(\" ..=\"\" site=\"\" common=\"\" bulflecha3.gif\")=\"\" 0px=\"\" 4px=\"\" no-repeat=\"\" scroll=\"\" rgba(0,=\"\" 0,=\"\" 0);=\"\" line-height:=\"\" 14px;=\"\" list-style:=\"\" none=\"\" outside=\"\" none;\"=\"\"><font face=\"verdana\" size=\"3\">Tarjeta de video: gráficos Intel HD</font></li><li style=\"vertical-align: baseline; font-weight: inherit; font-style: inherit; outline: 0px; padding-left: 10px; margin-bottom: 5px; border: 0px; background: url(\" ..=\"\" site=\"\" common=\"\" bulflecha3.gif\")=\"\" 0px=\"\" 4px=\"\" no-repeat=\"\" scroll=\"\" rgba(0,=\"\" 0,=\"\" 0);=\"\" line-height:=\"\" 14px;=\"\" list-style:=\"\" none=\"\" outside=\"\" none;\"=\"\"><font face=\"verdana\" size=\"3\">Tamaño de pantalla: 14\"</font></li><li style=\"vertical-align: baseline; font-weight: inherit; font-style: inherit; outline: 0px; padding-left: 10px; margin-bottom: 5px; border: 0px; background: url(\" ..=\"\" site=\"\" common=\"\" bulflecha3.gif\")=\"\" 0px=\"\" 4px=\"\" no-repeat=\"\" scroll=\"\" rgba(0,=\"\" 0,=\"\" 0);=\"\" line-height:=\"\" 14px;=\"\" list-style:=\"\" none=\"\" outside=\"\" none;\"=\"\"><font face=\"verdana\" size=\"3\">Tipo de pantalla: LED Backlight LCD</font></li><li style=\"vertical-align: baseline; font-weight: inherit; font-style: inherit; outline: 0px; padding-left: 10px; margin-bottom: 5px; border: 0px; background: url(\" ..=\"\" site=\"\" common=\"\" bulflecha3.gif\")=\"\" 0px=\"\" 4px=\"\" no-repeat=\"\" scroll=\"\" rgba(0,=\"\" 0,=\"\" 0);=\"\" line-height:=\"\" 14px;=\"\" list-style:=\"\" none=\"\" outside=\"\" none;\"=\"\"><font face=\"verdana\" size=\"3\">Sistema operativo: Windows 10</font></li><li style=\"vertical-align: baseline; font-weight: inherit; font-style: inherit; outline: 0px; padding-left: 10px; margin-bottom: 5px; border: 0px; background: url(\" ..=\"\" site=\"\" common=\"\" bulflecha3.gif\")=\"\" 0px=\"\" 4px=\"\" no-repeat=\"\" scroll=\"\" rgba(0,=\"\" 0,=\"\" 0);=\"\" line-height:=\"\" 14px;=\"\" list-style:=\"\" none=\"\" outside=\"\" none;\"=\"\"><font face=\"verdana\" size=\"3\">Entradas HDMI: 1</font></li><li style=\"vertical-align: baseline; font-weight: inherit; font-style: inherit; outline: 0px; padding-left: 10px; margin-bottom: 5px; border: 0px; background: url(\" ..=\"\" site=\"\" common=\"\" bulflecha3.gif\")=\"\" 0px=\"\" 4px=\"\" no-repeat=\"\" scroll=\"\" rgba(0,=\"\" 0,=\"\" 0);=\"\" line-height:=\"\" 14px;=\"\" list-style:=\"\" none=\"\" outside=\"\" none;\"=\"\"><font face=\"verdana\" size=\"3\">Puertos USB: USB 2.0 x 2 + USB 3.0</font></li><li style=\"vertical-align: baseline; font-weight: inherit; font-style: inherit; outline: 0px; padding-left: 10px; margin-bottom: 5px; border: 0px; background: url(\" ..=\"\" site=\"\" common=\"\" bulflecha3.gif\")=\"\" 0px=\"\" 4px=\"\" no-repeat=\"\" scroll=\"\" rgba(0,=\"\" 0,=\"\" 0);=\"\" line-height:=\"\" 14px;=\"\" list-style:=\"\" none=\"\" outside=\"\" none;\"=\"\"><font face=\"verdana\" size=\"3\">Conexión Bluetooth: sí</font></li><li style=\"vertical-align: baseline; font-weight: inherit; font-style: inherit; outline: 0px; padding-left: 10px; margin-bottom: 5px; border: 0px; background: url(\" ..=\"\" site=\"\" common=\"\" bulflecha3.gif\")=\"\" 0px=\"\" 4px=\"\" no-repeat=\"\" scroll=\"\" rgba(0,=\"\" 0,=\"\" 0);=\"\" line-height:=\"\" 14px;=\"\" list-style:=\"\" none=\"\" outside=\"\" none;\"=\"\"><font face=\"verdana\" size=\"3\">Color: negro</font></li><li style=\"vertical-align: baseline; font-weight: inherit; font-style: inherit; outline: 0px; padding-left: 10px; margin-bottom: 5px; border: 0px; background: url(\" ..=\"\" site=\"\" common=\"\" bulflecha3.gif\")=\"\" 0px=\"\" 4px=\"\" no-repeat=\"\" scroll=\"\" rgba(0,=\"\" 0,=\"\" 0);=\"\" line-height:=\"\" 14px;=\"\" list-style:=\"\" none=\"\" outside=\"\" none;\"=\"\"><font face=\"verdana\" size=\"3\">Peso: 1,5 kg</font></li><li style=\"vertical-align: baseline; font-weight: inherit; font-style: inherit; outline: 0px; padding-left: 10px; margin-bottom: 5px; border: 0px; background: url(\" ..=\"\" site=\"\" common=\"\" bulflecha3.gif\")=\"\" 0px=\"\" 4px=\"\" no-repeat=\"\" scroll=\"\" rgba(0,=\"\" 0,=\"\" 0);=\"\" line-height:=\"\" 14px;=\"\" list-style:=\"\" none=\"\" outside=\"\" none;\"=\"\"><font face=\"verdana\" size=\"3\">Webcam 1.0MP HD</font></li><li style=\"vertical-align: baseline; font-weight: inherit; font-style: inherit; outline: 0px; padding-left: 10px; margin-bottom: 5px; border: 0px; background: url(\" ..=\"\" site=\"\" common=\"\" bulflecha3.gif\")=\"\" 0px=\"\" 4px=\"\" no-repeat=\"\" scroll=\"\" rgba(0,=\"\" 0,=\"\" 0);=\"\" line-height:=\"\" 14px;=\"\" list-style:=\"\" none=\"\" outside=\"\" none;\"=\"\"><font face=\"verdana\" size=\"3\">Conectividad: Wi-Fi b/g/n</font></li><li style=\"vertical-align: baseline; font-weight: inherit; font-style: inherit; outline: 0px; padding-left: 10px; margin-bottom: 5px; border: 0px; background: url(\" ..=\"\" site=\"\" common=\"\" bulflecha3.gif\")=\"\" 0px=\"\" 4px=\"\" no-repeat=\"\" scroll=\"\" rgba(0,=\"\" 0,=\"\" 0);=\"\" line-height:=\"\" 14px;=\"\" list-style:=\"\" none=\"\" outside=\"\" none;\"=\"\"><font face=\"verdana\" size=\"3\">Origen: Argentina</font></li><li style=\"vertical-align: baseline; font-weight: inherit; font-style: inherit; outline: 0px; padding-left: 10px; margin-bottom: 5px; border: 0px; background: url(\" ..=\"\" site=\"\" common=\"\" bulflecha3.gif\")=\"\" 0px=\"\" 4px=\"\" no-repeat=\"\" scroll=\"\" rgba(0,=\"\" 0,=\"\" 0);=\"\" line-height:=\"\" 14px;=\"\" list-style:=\"\" none=\"\" outside=\"\" none;\"=\"\"><font face=\"verdana\" size=\"3\">Garantía del proveedor: 12 meses</font></li></ul><p style=\"vertical-align: baseline; font-weight: bold; outline: 0px; margin-bottom: 16px; border: 0px; color: rgb(51, 51, 51); line-height: 15px; width: 497px;\"><font face=\"verdana\" size=\"3\">&nbsp;</font></p><h4 style=\"vertical-align: baseline; outline: 0px; margin-top: 8px; margin-bottom: 4px; border: 0px; width: 497px;\"><font face=\"verdana\" size=\"3\"><font color=\"#666666\" style=\"font-weight: bold;\">&nbsp; </font><font style=\"background-color: rgb(255, 255, 255);\" color=\"#003399\"><b>MEDIDAS</b></font></font></h4><ul style=\"vertical-align: baseline; outline: 0px; border: 0px; list-style: none outside none; color: rgb(51, 51, 51);\"><li style=\"vertical-align: baseline; font-weight: inherit; font-style: inherit; outline: 0px; padding-left: 10px; margin-bottom: 5px; border: 0px; background: url(\" ..=\"\" site=\"\" common=\"\" bulflecha3.gif\")=\"\" 0px=\"\" 4px=\"\" no-repeat=\"\" scroll=\"\" rgba(0,=\"\" 0,=\"\" 0);=\"\" line-height:=\"\" 14px;=\"\" list-style:=\"\" none=\"\" outside=\"\" none;\"=\"\"><font face=\"verdana\" size=\"3\">Alto: 1,8 cm<span style=\"vertical-align: baseline; font-weight: inherit; font-style: inherit; outline: 0px; border: 0px; color: black;\"><br></span></font></li><li style=\"vertical-align: baseline; font-weight: inherit; font-style: inherit; outline: 0px; padding-left: 10px; margin-bottom: 5px; border: 0px; background: url(\" ..=\"\" site=\"\" common=\"\" bulflecha3.gif\")=\"\" 0px=\"\" 4px=\"\" no-repeat=\"\" scroll=\"\" rgba(0,=\"\" 0,=\"\" 0);=\"\" line-height:=\"\" 14px;=\"\" list-style:=\"\" none=\"\" outside=\"\" none;\"=\"\"><font face=\"verdana\" size=\"3\">Largo: 34 cm</font></li><li style=\"vertical-align: baseline; font-weight: inherit; font-style: inherit; outline: 0px; padding-left: 10px; margin-bottom: 5px; border: 0px; background: url(\" ..=\"\" site=\"\" common=\"\" bulflecha3.gif\")=\"\" 0px=\"\" 4px=\"\" no-repeat=\"\" scroll=\"\" rgba(0,=\"\" 0,=\"\" 0);=\"\" line-height:=\"\" 14px;=\"\" list-style:=\"\" none=\"\" outside=\"\" none;\"=\"\"><font face=\"verdana\" size=\"3\">Ancho: 23,4 cm</font></li></ul><p style=\"vertical-align: baseline; font-weight: bold; outline: 0px; margin-bottom: 16px; border: 0px; color: rgb(51, 51, 51); line-height: 15px; width: 497px;\"><font face=\"verdana\" size=\"3\">&nbsp;</font></p>', '8999', 1, 7, '580ccbf7a0a8f_1.jpg', '57f17a0ac56f7', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Notebook POSITIVO-BGH E-965X', '<div><div><font color=\"#003399\" size=\"4\"><b>NOTEBOOK POSITIVO BGH E965X</b></font></div><div><font size=\"3\" face=\"verdana\"><br></font></div><div><font size=\"3\" face=\"verdana\">La Notebook Positivo BGH E965x tiene pantalla 14 pulgadas y cuenta con tecnología LED WXGA (GLARE) 1366 x 768 pixeles, para brindar la mejor calidad de imagen. Con mouse multi Touch. Su procesador es Intel® Core™ i3 5005U de 5ta generación. Posee memoria RAM de 4GB y tiene un disco de 500 GB SATA. Con Sistema Operativo Windows 10 Home. Tiene 3 puertos USB y VGA + HDMI. Con Web Cam incorporada HD de 1,3 Pixeles. Con batería de 4 celdas. Esta Notebook tiene garantía oficial de Positivo BGH por un año.</font></div><div><font size=\"3\" face=\"verdana\">Modelo, pantalla y resolución</font></div><div><font size=\"3\" face=\"verdana\">La Notebook Positivo BGH E965x, tiene pantalla de 14\" Led y cuenta con tecnología LED WXGA (GLARE) 1366 x 768 pixeles para brindar la mejor calidad de imagen.</font></div><div><font size=\"3\" face=\"verdana\"><br></font></div><div><font size=\"3\" face=\"verdana\"><u><b>Sistema Operativo y Procesador</b></u></font></div><div><font size=\"3\" face=\"verdana\">Está equipada con el procesador Intel® Core™ i3 5005U de 5ta generación y video integrado Intel® HD Graphics Soporta Microsoft® DirectX 11.</font></div><div><font size=\"3\" face=\"verdana\"><br></font></div><div><font size=\"3\" face=\"verdana\"><b><u>Más Comunicación</u></b></font></div><div><font size=\"3\" face=\"verdana\">Cuenta con Webcam incorporada HD de 1,3 Mpx, lo que te permite realizar video llamadas y estar más conectado.</font></div><div><font size=\"3\" face=\"verdana\"><br></font></div><div><font size=\"3\" face=\"verdana\"><b><u>Otras Funciones</u></b></font></div><div><font size=\"3\" face=\"verdana\">Conectividad</font></div><div><font size=\"3\" face=\"verdana\">Posee conectividad 802.11 b/g/N + Bluetooth. Vas a poder transferir datos de manera más ágil, desde cualquier lugar con los puertos USB, HDMI y lectores de memoria 9 en 1. Posee 1 puerto USB 2.0 y 2 puertos USB 3.0 y Salida Video: VGA + HDMI</font></div><div><font size=\"3\" face=\"verdana\"><b><u><br></u></b></font></div><div><font size=\"3\" face=\"verdana\"><b><u>Capacidad</u></b></font></div><div><font size=\"3\" face=\"verdana\">Posee memoria RAM de 4GB y un disco rígido de 500GB SATA. Su Sistema Operativo es Windows 10 Home.</font></div><div><font size=\"3\" face=\"verdana\"><br></font></div><div><font size=\"3\" face=\"verdana\"><b><u>Batería</u></b></font></div><div><font size=\"3\" face=\"verdana\">La Notebook Positivo BGH E965x, posee una batería de 4 celdas.</font></div><div><br></div></div>', '11999', 1, 11, '580ccc1c07bd4_1.jpg', '57f17ba0694b8', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Notebook COMPAQ 21-N122AR', '<h4></h4><h5><span style=\"font-weight: normal;\"><font color=\"#003366\" size=\"2\" face=\"verdana\">Procesador:&nbsp;Intel Bay-trail-M N3540<br>Windows 10 Home&nbsp;<br>Memoria Ram:&nbsp;4 GB<br>Disco Rígido:&nbsp;500 GB<br>Pantalla:&nbsp;14“ Led Backlight LCD<br>Conectividad inalámbrica:&nbsp;Wi-Fi b/g/n<br>Gráficos Intel HD, Webcam 1.0MP HD<br>USB 2.0 x 2 + USB 3.0 x 1 + HDMI x 1</font></span></h5><div><span style=\"font-weight: normal;\"><font color=\"#003366\" size=\"2\" face=\"verdana\"><br></font></span></div><font color=\"#003366\" size=\"2\" face=\"verdana\"><u><b>Máxima potencia</b></u><br>Equipada con la nueva interfaz del sistema operativo Windows 10 Home, cuenta además con toda la potencia del procesador Intel Bay-trail-M N3540 y una memoria RAM de 4GB, permitiéndote procesar con la mayor velocidad todos los programas, música,&nbsp;vídeo&nbsp;y cualquier tipo de contenido.<br><b><u>Todo el equipamiento</u></b><br>Cuenta con conexión bluetooth, para que puedas transmitir el sonido de una película o toda tu música a cualquier equipo de audio con bluetooth sin necesitar conectarte a través de cables. Incluye además una webcam 1.0 MP HD que te permitirá realizar&nbsp;vídeo&nbsp;llamadas en alta definición, conectividad inalámbrica Wi-Fi b/g/n y gráficos Intel HD, que te brindarán una excelente calidad de imagen.<br><b><u>Capacidad de almacenamiento</u></b><br>Posee un Disco Rígido de 500GB, para que puedas almacenar todos tus programas y grandes volúmenes de información como imágenes,&nbsp;vídeos, música y todo tipo de archivos. Además cuenta con una entrada HDMI para conectarla directamente a una TV y reproducir música, series, películas y todo tipo de contenidos audiovisuales, una entrada USB 3.0 y 2 entradas USB 2.0 con i-Power, para transferir archivos a máxima velocidad.</font>', '9999', 1, 7, '580ccc55e325e_1.jpg', '57f17d4769414', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Notebook HP HP 14-AC129LA', '<div><font face=\"verdana\" size=\"3\"><font color=\"#003399\">Notebook HP HP 14-AC129LA</font><br></font></div><div><font face=\"verdana\" size=\"3\">Esta notebook HP presenta la combinación perfecta de diseño, confiabilidad y recursos. Estilo y productividad, al tiempo que piensas en tu presupuesto, algo que te encantará.</font></div><div><font face=\"verdana\" size=\"3\">Windows 10 Home u otros sistemas operativos disponibles</font></div><div><font face=\"verdana\" size=\"3\"><br></font></div><div><font face=\"verdana\" size=\"3\"><b><u>Características adecuadas, precio adecuado</u></b></font></div><div><font face=\"verdana\" size=\"3\">Almacenamiento y alimentación fiables para una relación calidad precio insuperable.</font></div><div><font face=\"verdana\" size=\"3\"><br></font></div><div><font face=\"verdana\" size=\"3\"><b><u>Opciones coloridas</u></b></font></div><div><font face=\"verdana\" size=\"3\">Una amplia gama de colores intensos y una cubierta a prueba de huellas digitales con textura le ofrecen un estilo moderno para lucirse.1</font></div><div><font face=\"verdana\" size=\"3\"><br></font></div><div><font face=\"verdana\" size=\"3\"><b><u>Mayor duración de la batería</u></b></font></div><div><font face=\"verdana\" size=\"3\">Una batería más duradera significa más tiempo fuera y más tiempo en tus viajes.</font></div><div><br></div><div><font face=\"verdana\" size=\"3\"><b><u>Potencia de procesamiento confiable</u></b></font></div><div><font face=\"verdana\" size=\"3\">Con procesadores líderes en la industria, obtenga el rendimiento confiable que espera y calidad en la que puede confiar.</font></div><div><font face=\"verdana\" size=\"3\"><br></font></div><div><font face=\"verdana\" size=\"3\"><b><u>Windows 10 Home</u></b></font></div><div><font face=\"verdana\" size=\"3\">Llegó Windows 10 Home. Haga grandes cosas.</font></div><div><font face=\"verdana\" size=\"3\"><br></font></div><div><font face=\"verdana\" size=\"3\"><b><u>Pantalla de alta definición</u></b></font></div><div><font face=\"verdana\" size=\"3\">Disfrute de su entretenimiento con una claridad impresionante gracias a esta pantalla HD nítida 3.</font></div><div><font face=\"verdana\" size=\"3\"><br></font></div><div><font face=\"verdana\" size=\"3\"><b><u>Audio DTS Sound+</u></b></font></div><div><font face=\"verdana\" size=\"3\">Disfrute de matices de audio dinámicos y sonidos de calidad con DTS Sound +.4</font></div><div><font face=\"verdana\" size=\"3\"><br></font></div><div><font face=\"verdana\" size=\"3\"><b><u>Gráficos asombrosos</u></b></font></div><div><font face=\"verdana\" size=\"3\">Disfrute de películas, juegos y mucho más con gráficos Intel®.</font></div><div><font face=\"verdana\" size=\"3\"><br></font></div><div><font face=\"verdana\" size=\"3\"><b><u>Unidad de estado sólido híbrido</u></b></font></div><div><font face=\"verdana\" size=\"3\">Inicie y ejecute aplicaciones en segundos con una unidad que se ajusta a sus necesidades.</font></div><div><font face=\"verdana\" size=\"3\"><br></font></div><div><font face=\"verdana\" size=\"3\"><b><u>Siga adelante con una batería que resiste más</u></b></font></div><div><font face=\"verdana\" size=\"3\">Aproveche su día durante más tiempo sin la necesidad de recargas 5.</font></div><div><font face=\"verdana\" size=\"3\"><br></font></div><div><font face=\"verdana\" size=\"3\"><b><u>Elija su color</u></b></font></div><div><font face=\"verdana\" size=\"3\">Elija el color que mejor combine con su estilo 6.</font></div><div><font face=\"verdana\" size=\"3\"><br></font></div><div><font face=\"verdana\" size=\"3\"><b><u>Cámara web HP TrueVision HD</u></b></font></div><div><font face=\"verdana\" size=\"3\">Capture todos los detalles con gran claridad, incluso en situaciones de poca luz.</font></div><div><font face=\"verdana\" size=\"3\"><br></font></div><div><font face=\"verdana\" size=\"3\"><b><u>Repleta de puertos</u></b></font></div><div><font face=\"verdana\" size=\"3\">Conéctese con facilidad.</font></div><div><font face=\"verdana\" size=\"3\"><br></font></div><div><font face=\"verdana\" size=\"3\"><b><u>Unidad de DVD regrabable</u></b></font></div><div><font face=\"verdana\" size=\"3\">Mire películas en DVD.7 O grabe sus propios discos.</font></div><div><font face=\"verdana\" size=\"3\"><br></font></div><div><font face=\"verdana\" size=\"3\"><b><u>Diseño elegante</u></b></font></div><div><font face=\"verdana\" size=\"3\">Lleve este notebook a cualquier parte, gracias a su diseño delgado y liviano.</font></div>', '18800', 1, 8, '580ccc6c3b192_1.jpg', '57f17e152c890', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Notebook LENOVO IP300-80Q7008B', '<font face=\"verdana\" size=\"3\">Procesador: Intel Core i5 6200U<br style=\"outline: 0px; list-style: none;\">Velocidad del procesador: 1.6 Ghz<br style=\"outline: 0px; list-style: none;\">Memoria ram: 4 GB<br style=\"outline: 0px; list-style: none;\">Unidad óptica: DVD +/- R<br style=\"outline: 0px; list-style: none;\">Sistema operativo: Windows 10<br style=\"outline: 0px; list-style: none;\">Capacidad disco rígido: 1TB<br style=\"outline: 0px; list-style: none;\">Tamaño de pantalla: 15.6\"<br style=\"outline: 0px; list-style: none;\">USB 2.0: x 2<br style=\"outline: 0px; list-style: none;\">USB 3.0: x 1</font><br>', '18000', 1, 9, '580cccb55a75e_1.jpg', '57f181751a03c', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Notebook ACER E5-573-574S CI5', '<font size=\"3\" face=\"trebuchet ms\">Procesador Intel core i5 5200U<br style=\"outline: 0px; list-style: none;\">Memoria RAM 6GB DDR3L<br style=\"outline: 0px; list-style: none;\">Disco Rigido 1TB Sata<br style=\"outline: 0px; list-style: none;\">Pantalla 15.6 HD 1366x768<br style=\"outline: 0px; list-style: none;\">Placa de Video Intel HD Graphics 4400<br style=\"outline: 0px; list-style: none;\">Card Reader<br style=\"outline: 0px; list-style: none;\">Web Cam<br style=\"outline: 0px; list-style: none;\">Puerto HDMI, USB 3.0 , USB 2.0<br style=\"outline: 0px; list-style: none;\">Bateria Li-On 2500 mAh , 4 celdas<br style=\"outline: 0px; list-style: none;\">Peso 2.4 Kg ULTRA SLIM COLOR NEGRO&nbsp;<br style=\"outline: 0px; list-style: none;\">Sistema Operativo Windows 10</font><br>', '19000', 1, 10, '580ccd1911622_1.jpg', '57f1822c210cd', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Notebook POSITIVO-BGH FX1000', '<font face=\"verdana\" size=\"3\">Procesador: Intel Core M-5Y10c<br style=\"outline: 0px; list-style: none;\">Sistema operativo: Windows 10 home<br style=\"outline: 0px; list-style: none;\">Memoria: 4 GB&nbsp;<br style=\"outline: 0px; list-style: none;\">Disco: 128 GB SSD&nbsp;<br style=\"outline: 0px; list-style: none;\">Pantalla: 14\' FULL HD (1900*1080 IPS)&nbsp;<br style=\"outline: 0px; list-style: none;\">Webcam: Incorporada 1 HD megapixel&nbsp;<br style=\"outline: 0px; list-style: none;\">Video:Integrado Intel HD Graphics 5300&nbsp;<br style=\"outline: 0px; list-style: none;\">Audio: Realtek ALC269Q&nbsp;<br style=\"outline: 0px; list-style: none;\">WLAN: 802.11 b/g/N&nbsp;<br style=\"outline: 0px; list-style: none;\">Puertos: 2 x USB 3.0&nbsp;<br style=\"outline: 0px; list-style: none;\">Salida video: Mini HDMI&nbsp;<br style=\"outline: 0px; list-style: none;\">Micrófono y parlantes: incorporado&nbsp;<br style=\"outline: 0px; list-style: none;\">Mouse: multitouch&nbsp;<br style=\"outline: 0px; list-style: none;\">Peso: 1.3 kg.&nbsp;<br style=\"outline: 0px; list-style: none;\">AC Adapter: AC 110-240V,50-60Hz,DC 12V 2A&nbsp;<br style=\"outline: 0px; list-style: none;\">Batería: batería de polímero - 10400mAh&nbsp;<br style=\"outline: 0px; list-style: none;\">Salida de parlantes externos: SIsi<br style=\"outline: 0px; list-style: none;\">Entrada para micrófono: si&nbsp;<br style=\"outline: 0px; list-style: none;\">Garantía del fabricante: 12 meses</font><br>', '11000', 1, 11, '580ccd4129e77_1.jpg', '57f1832a2f3b7', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Notebook Lenovo Y700-15ISK 80NV003SAR', '<div class=\"specs_element\" style=\"padding: 3px; clear: left; overflow: hidden; color: rgb(23, 23, 23);\"><div class=\"specs\" style=\"font-weight: bold; float: left; margin-right: 10px;\"><font face=\"verdana\" size=\"3\">Procesador</font></div><div class=\"specs_details\" style=\"float: left; max-width: 80%;\"><font face=\"verdana\" size=\"3\"><a href=\"http://www.notebookcheck.org/Intel-Core-i7-6700HQ-Notebook-Processor.156193.0.html\" style=\"color: rgb(138, 9, 26);\">Intel Core i7-6700HQ</a>&nbsp;2.6&nbsp;GHz</font></div></div><div class=\"specs_element\" style=\"padding: 3px; clear: left; overflow: hidden; color: rgb(23, 23, 23);\"><div class=\"specs\" style=\"font-weight: bold; float: left; margin-right: 10px;\"><font face=\"verdana\" size=\"3\">Adaptador gráfico</font></div><div class=\"specs_details\" style=\"float: left; max-width: 80%;\"><font face=\"verdana\" size=\"3\"><a href=\"http://www.notebookcheck.org/NVIDIA-GeForce-GTX-960M.143366.0.html\" style=\"color: rgb(138, 9, 26);\">NVIDIA GeForce GTX 960M</a>&nbsp;- 4096 MB, Núcleo: 1097&nbsp;MHz, Memoría: 5010&nbsp;MHz, 359.00, Optimus</font></div></div><div class=\"specs_element\" style=\"padding: 3px; clear: left; overflow: hidden; color: rgb(23, 23, 23);\"><div class=\"specs\" style=\"font-weight: bold; float: left; margin-right: 10px;\"><font face=\"verdana\" size=\"3\">Memoría</font></div><div class=\"specs_details\" style=\"float: left; max-width: 80%;\"><font face=\"verdana\" size=\"3\">16384&nbsp;MB&nbsp;&nbsp;<div class=\"specs_indicator\" style=\"border: 1px solid rgb(170, 170, 170); width: 8px; height: 10px; display: inline-block;\"><div class=\"specs_indicator_rest\" style=\"width: 8px; height: 0px;\"></div><div class=\"specs_indicator_color\" style=\"width: 8px; height: 10px; background-color: rgb(0, 255, 0);\"></div></div>, DDR4-2132, PC4-17000, 1066.1 MHz, Dual-Channel, 15-15-15-36</font></div></div><div class=\"specs_element\" style=\"padding: 3px; clear: left; overflow: hidden; color: rgb(23, 23, 23);\"><div class=\"specs\" style=\"font-weight: bold; float: left; margin-right: 10px;\"><font face=\"verdana\" size=\"3\">pantalla</font></div><div class=\"specs_details\" style=\"float: left; max-width: 80%;\"><font face=\"verdana\" size=\"3\">15.6 pulgadas 16:9, 1920x1080 pixels, capacitiva multitáctil , LG Philips, IPS, Model: LP156WF6-SPK1, ID: LGD04A7, lustroso: si</font></div></div><div class=\"specs_element\" style=\"padding: 3px; clear: left; overflow: hidden; color: rgb(23, 23, 23);\"><div class=\"specs\" style=\"font-weight: bold; float: left; margin-right: 10px;\"><font face=\"verdana\" size=\"3\">Placa base</font></div><div class=\"specs_details\" style=\"float: left; max-width: 80%;\"><font face=\"verdana\" size=\"3\">Intel HM170 (Skylake PCH-H)</font></div></div><div class=\"specs_element\" style=\"padding: 3px; clear: left; overflow: hidden; color: rgb(23, 23, 23);\"><div class=\"specs\" style=\"font-weight: bold; float: left; margin-right: 10px;\"><font face=\"verdana\" size=\"3\">Disco duro</font></div><div class=\"specs_details\" style=\"float: left; max-width: 80%;\"><font face=\"verdana\" size=\"3\">Samsung MZNLN128HCGR-000L2, 128&nbsp;GB&nbsp;&nbsp;<div class=\"specs_indicator\" style=\"border: 1px solid rgb(170, 170, 170); width: 8px; height: 10px; display: inline-block;\"><div class=\"specs_indicator_rest\" style=\"width: 8px; height: 8.71875px;\"></div><div class=\"specs_indicator_color\" style=\"width: 8px; height: 1.26563px; background-color: rgb(255, 0, 0);\"></div></div>, Secundario: Western Digital WD10SPCX 1 TB HDD</font></div></div><div class=\"specs_element\" style=\"padding: 3px; clear: left; overflow: hidden; color: rgb(23, 23, 23);\"><div class=\"specs\" style=\"font-weight: bold; float: left; margin-right: 10px;\"><font face=\"verdana\" size=\"3\">Tarjeta de sonido</font></div><div class=\"specs_details\" style=\"float: left; max-width: 80%;\"><font face=\"verdana\" size=\"3\">Intel Skylake PCH-H High Definition Audio Controller</font></div></div><div class=\"specs_element\" style=\"padding: 3px; clear: left; overflow: hidden; color: rgb(23, 23, 23);\"><div class=\"specs\" style=\"font-weight: bold; float: left; margin-right: 10px;\"><font face=\"verdana\" size=\"3\">Conexiones</font></div><div class=\"specs_details\" style=\"float: left; max-width: 80%;\"><font face=\"verdana\" size=\"3\">1 USB 2.0, 2 USB 3.0, 1 HDMI, 1 Kensington Lock, Audio Conexiones: clavija combinada de audio, Card Reader: 4-en-1 SD</font></div></div><div class=\"specs_element\" style=\"padding: 3px; clear: left; overflow: hidden; color: rgb(23, 23, 23);\"><div class=\"specs\" style=\"font-weight: bold; float: left; margin-right: 10px;\"><font face=\"verdana\" size=\"3\">Equipamento de red</font></div><div class=\"specs_details\" style=\"float: left; max-width: 80%;\"><font face=\"verdana\" size=\"3\">Realtek RTL8168B/8111B Family PCI-E Gigabit Ethernet NIC (10/100/1000MBit), Intel Dual Band Wireless-AC 8260 (a/b/g/n/ac), Bluetooth 4.0</font></div></div><div class=\"specs_element\" style=\"padding: 3px; clear: left; overflow: hidden; color: rgb(23, 23, 23);\"><div class=\"specs\" style=\"font-weight: bold; float: left; margin-right: 10px;\"><font face=\"verdana\" size=\"3\">Tamaño</font></div><div class=\"specs_details\" style=\"float: left; max-width: 80%;\"><font face=\"verdana\" size=\"3\">Alto x ancho x profundidad (en mm): 25.95 x 387 x 277</font></div></div><div class=\"specs_element\" style=\"padding: 3px; clear: left; overflow: hidden; color: rgb(23, 23, 23);\"><div class=\"specs\" style=\"font-weight: bold; float: left; margin-right: 10px;\"><font face=\"verdana\" size=\"3\">Battería</font></div><div class=\"specs_details\" style=\"float: left; max-width: 80%;\"><font face=\"verdana\" size=\"3\">60 Wh Litio-Polimero</font></div></div><div class=\"specs_element\" style=\"padding: 3px; clear: left; overflow: hidden; color: rgb(23, 23, 23);\"><div class=\"specs\" style=\"font-weight: bold; float: left; margin-right: 10px;\"><font face=\"verdana\" size=\"3\">Sistema Operativo</font></div><div class=\"specs_details\" style=\"float: left; max-width: 80%;\"><font face=\"verdana\" size=\"3\">Microsoft Windows 10 Home 64 Bit</font></div></div><div class=\"specs_element\" style=\"padding: 3px; clear: left; overflow: hidden; color: rgb(23, 23, 23);\"><div class=\"specs\" style=\"font-weight: bold; float: left; margin-right: 10px;\"><font face=\"verdana\" size=\"3\">Camera</font></div><div class=\"specs_details\" style=\"float: left; max-width: 80%;\"><font face=\"verdana\" size=\"3\">Webcam: HD 720p</font></div></div><div class=\"specs_element\" style=\"padding: 3px; clear: left; overflow: hidden; color: rgb(23, 23, 23);\"><div class=\"specs\" style=\"font-weight: bold; float: left; margin-right: 10px;\"><font face=\"verdana\" size=\"3\">Características adicionales</font></div><div class=\"specs_details\" style=\"float: left; max-width: 80%;\"><font face=\"verdana\" size=\"3\">Altavoces: 2W altavoces estéreo + subwoofer 3 W, Teclado: Chiclet, Luz de Teclado: si, Lenovo Companion 3.0, ID, Photo Master 2.0, SHAREit, Solution Center, McAfee LifeSafe (prueba), 12 Meses Garantía</font></div></div><div class=\"specs_element\" style=\"padding: 3px; clear: left; overflow: hidden; color: rgb(23, 23, 23); font-family: arial, sans-serif;\"></div>', '33000', 1, 9, '580ccd504fd1e_1.jpg', '57f1877979cd3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Smart Tv SAMSUNG 48 UN48JU6700', '<font face=\"verdana\" size=\"3\">Samsung desarrolló una tecnología de color especial para nuestro TV UHD Curvo, llamada PurColor, que ofrece un abanico más amplio de colores y tonos que son tan parecidos a la vida real como es posible, lo que te acerca más a lo que la naturaleza creó. Con los 8 millones de píxeles que tiene la pantalla UHD (cuatro veces más que la pantalla de Full HD), necesitas más puntos de ajuste de color para crear imágenes detalladas. Los televisores UHD convencionales tienen alrededor de 27 puntos de ajuste de color, pero PurColour aumenta en gran medida esa cantidad siete veces más, lo que brinda colores y tonos más ricos y definidos.<br style=\"outline: 0px; list-style: none;\">El revolucionario televisor Curvo te sumerge en un nuevo mundo de visualización envolvente y te hace sentir como si estuvieras en medio de la acción. La pantalla tiene una curva en el ángulo correcto para ofrecer la mejor distancia de visualización en tu sala de estar. Además, esta pantalla ligeramente curva ofrece una visión equilibrada y uniforme desde cualquier zona de la pantalla. Contempla la mejor calidad de imagen, profundidad y detalle que una pantalla puede ofrecer.</font><br>', '22000', 3, 4, '580ccd6231cf3_1.jpg', '57f18a31c6cca', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Smart Tv SAMSUNG 40 UN40J5300', '<font face=\"verdana\" size=\"3\">Colores más vibrantes para obtener mejores imágenes<br style=\"outline: 0px; list-style: none;\">Wide Color Enhancer Plus de Samsung utiliza un algoritmo avanzado para la mejora de la calidad de la imagen, lo que optimiza increíblemente la calidad de cualquier imagen y saca a la luz los detalles ocultos. Ahora puedes ver los colores del modo en que se deben ver con Wide Color Enhancer.<br style=\"outline: 0px; list-style: none;\">Mirá películas desde tu USB<br style=\"outline: 0px; list-style: none;\">Gracias a ConnectShare Movie, tan solo tenés que conectar tu memoria USB o HDD al televisor y al instante podrás disfrutar películas, fotos o música. Ahora podés disfrutar de una gran variedad de contenido en tu televisor en la comodidad de tu sala de estar.<br style=\"outline: 0px; list-style: none;\">Accedé a Internet sin cables<br style=\"outline: 0px; list-style: none;\">Gracias al Wireless LAN integrado, tus posibilidades de conectividad del televisor serán más eficientes. No necesitarás agregar más dispositivos externos y mantendrás su diseño atractivo.<br style=\"outline: 0px; list-style: none;\">Disfrutá de aplicaciones enriquecedoras en tu Smart TV<br style=\"outline: 0px; list-style: none;\">El contenido lo es todo y el Smart TV de Samsung tiene todo lo que precisas. Disfruta de cientos de aplicaciones y navega por la web para encontrar tu contenido favorito sin problemas y del modo más intuitivo posible. Tan solo deslízate hacia la izquierda o la derecha para ver recomendaciones personalizadas de aplicaciones, nuevas aplicaciones destacadas y más con solo echar un vistazo. Incluso tiene una aplicación de navegador web mejorada que te brinda acceso rápido a páginas web populares de tu región con tan solo el clic de un botón y sin tener que tipear la URL.</font><br>', '13000', 3, 4, '580ccd7ad2390_1.jpg', '57f18b29c84fe', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Smart Tv LG 32 32LF585B', '<p style=\"outline: 0px; list-style: none;\"><font face=\"verdana\" size=\"3\">Este TV LED LG de 32 pulgadas es ideal para compartir momentos con las características de pantalla compartida y Content Share que te permiten acceder a todo el contenido desde distintos dispositivos; además cuenta con un Magic Remote que permite una navegabilidad mucho más sencilla y amigable.</font></p><font face=\"verdana\" size=\"3\"><br style=\"outline: 0px; list-style: none;\"></font><h2 style=\"outline: 0px; list-style: none; color: rgb(0, 0, 0);\"><font face=\"verdana\" size=\"3\"><u>Panel IPS</u></font></h2><p style=\"outline: 0px; list-style: none;\"><font face=\"verdana\" size=\"3\">El secreto detrás del ángulo de visión superior y la calidad del LG TV es el panel. Al igual que la calidad de los granos determina la calidad del café, la calidad del panel determina la calidad del televisor. El Panel IPS utilizado por LG es la razón de por qué los LG TVs tienen pantallas más claras, más consistentes y resistentes.</font></p><font face=\"verdana\" size=\"3\"><br style=\"outline: 0px; list-style: none;\"></font><h2 style=\"outline: 0px; list-style: none; color: rgb(0, 0, 0);\"><font face=\"verdana\" size=\"3\"><u>Ángulo de visión amplio</u></font></h2><p style=\"outline: 0px; list-style: none;\"><font face=\"verdana\" size=\"3\">ULTRA IPS muestra el color y el contraste más consistentes desde todos los ángulos entre los paneles competitivos, así podrás disfrutar de un color de nivel más profesional desde cada asiento de tu hogar.</font></p><font face=\"verdana\" size=\"3\"><u><br style=\"outline: 0px; list-style: none;\"></u></font><h2 style=\"outline: 0px; list-style: none; color: rgb(0, 0, 0);\"><font face=\"verdana\" size=\"3\"><u>Blur-Free Clarity</u></font></h2><p style=\"outline: 0px; list-style: none;\"><font face=\"verdana\" size=\"3\">IPS es definitivamente superior a los paneles convencionales en cuanto a claridad de imagen durante escenas con movimientos rápidos, permitiendo que las imágenes sean más claras y sin borrones.<br style=\"outline: 0px; list-style: none;\"><br style=\"outline: 0px; list-style: none;\">(Antecedentes Tecnológicos: Debido a la avanzada estructura del cristal liquido. La tecnología IPS puede generar imágenes en movimiento precisas con poca distorsión.)</font></p><font face=\"verdana\" size=\"3\"><br style=\"outline: 0px; list-style: none;\"></font><h2 style=\"outline: 0px; list-style: none; color: rgb(0, 0, 0);\"><font face=\"verdana\" size=\"3\"><u>Pantalla Estable</u></font></h2><p style=\"outline: 0px; list-style: none;\"><font face=\"verdana\" size=\"3\">Los paneles IPS son estables, firmes y resistentes al daño, a diferencia de los paneles de la competencia; solo con tocarlos podrás comprobarlo por ti mismo.<br style=\"outline: 0px; list-style: none;\"><br style=\"outline: 0px; list-style: none;\">(Antecedentes Tecnológicos: El panel VA, debido a la disposición del cristal liquido, se demora un poco para recuperarse cuando el panel recibe un choque. El panel IPS puede recuperarse más rápido que un panel VA debido a la disposición única horizontal del LCD).</font></p><font face=\"verdana\" size=\"3\">&nbsp;<br style=\"outline: 0px; list-style: none;\"></font><h2 style=\"outline: 0px; list-style: none; color: rgb(0, 0, 0);\"><font face=\"verdana\" size=\"3\"><u>LG TV REMOTE APP &nbsp;</u>&nbsp;<img alt=\"\" src=\"http://www.lg.com/ar/images/imagen-y-sonido/features/lg-tv-remote-logo.jpg\" style=\"outline: 0px; list-style: none;\"></font></h2><p style=\"outline: 0px; list-style: none;\"><font face=\"verdana\" size=\"3\">Con la aplicación LG TV Remote, controlá tu TV desde tu Smartphone.<br style=\"outline: 0px; list-style: none;\"><br style=\"outline: 0px; list-style: none;\">- Manejá todas las funciones básicas del TV.<br style=\"outline: 0px; list-style: none;\"><br style=\"outline: 0px; list-style: none;\">- Buscá y seleccioná contenidos.<br style=\"outline: 0px; list-style: none;\"><br style=\"outline: 0px; list-style: none;\">- Usá el puntero como un Magic Remote para acceder más simple<br style=\"outline: 0px; list-style: none;\"><br style=\"outline: 0px; list-style: none;\"><br style=\"outline: 0px; list-style: none;\">El teclado de tu smartphone es tu teclado!</font></p>', '8000', 3, 1, '580ccdb43bb54_1.jpg', '57f18bfd0840b', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Smart Tv ADMIRAL 43 AD43SM718', '<h2 style=\"outline: 0px; list-style: none; color: rgb(0, 0, 0);\"><font face=\"verdana\" size=\"3\"><u>Conecta dispositivos</u></font></h2><font face=\"verdana\" size=\"3\"><br style=\"outline: 0px; list-style: none;\"></font><p style=\"outline: 0px; list-style: none;\"><font face=\"verdana\" size=\"3\">El Admiral Smart TV puede conectarse a dispositivos externos como videocámaras, PC,&nbsp;<strong style=\"outline: 0px; list-style: none;\">reproductor de dvd</strong>,&nbsp;<strong style=\"outline: 0px; list-style: none;\">Blu Ray</strong>&nbsp;o&nbsp;<strong style=\"outline: 0px; list-style: none;\">consolas de juegos</strong>, ya que cuenta con entrada de componente / AV, RCA, RGB, salida CVBS Y SPDIF para conexión a sistemas de audio digital, puertos&nbsp;<strong style=\"outline: 0px; list-style: none;\">USB</strong>&nbsp;y entradas&nbsp;<strong style=\"outline: 0px; list-style: none;\">HDMI</strong>.</font></p><font face=\"verdana\" size=\"3\"><br style=\"outline: 0px; list-style: none;\"></font><p style=\"outline: 0px; list-style: none;\"><font face=\"verdana\" size=\"3\">Además, posee un&nbsp;<strong style=\"outline: 0px; list-style: none;\">puerto LAN</strong>&nbsp;para conectarlo directamente a&nbsp;<strong style=\"outline: 0px; list-style: none;\">internet</strong>&nbsp;y puedas navegar desde el browser incorporado, reproducir peliculas online o compartir video llamadas.</font></p><font face=\"verdana\" size=\"3\"><br style=\"outline: 0px; list-style: none;\"></font><h2 style=\"outline: 0px; list-style: none; color: rgb(0, 0, 0);\"><font face=\"verdana\" size=\"3\"><u>Descarga aplicaciones</u></font></h2><font face=\"verdana\" size=\"3\"><br style=\"outline: 0px; list-style: none;\"></font><p style=\"outline: 0px; list-style: none;\"><font face=\"verdana\" size=\"3\">Su sistema operativo Android 4.2 permite&nbsp;<strong style=\"outline: 0px; list-style: none;\">descargar tus aplicaciones</strong>&nbsp;preferidas como&nbsp;<strong style=\"outline: 0px; list-style: none;\">Netflix</strong>&nbsp;y Youtube a través de google play store y controlar tus redes sociales desde sus aplicaciones incorporadas como&nbsp;<strong style=\"outline: 0px; list-style: none;\">Twitter o Facebook</strong></font></p><font face=\"verdana\" size=\"3\"><br style=\"outline: 0px; list-style: none;\"></font><h2 style=\"outline: 0px; list-style: none; color: rgb(0, 0, 0);\"><font face=\"verdana\" size=\"3\"><u>Disfruta Full HD</u></font></h2><font face=\"verdana\" size=\"3\"><br style=\"outline: 0px; list-style: none;\"></font><p style=\"outline: 0px; list-style: none;\"><font face=\"verdana\" size=\"3\">El Admiral Smart TV tiene una pantalla de visualización&nbsp;<strong style=\"outline: 0px; list-style: none;\">LED TFT de 43”</strong>&nbsp;con una relación ancho:alto o relación de aspecto 16:9 widescreen. Esta relación permite reproducir videos de hasta&nbsp;<strong style=\"outline: 0px; list-style: none;\">1920 x 1080</strong>&nbsp;correspondiente a un formato panorámico de&nbsp;<strong style=\"outline: 0px; list-style: none;\">resolución HD Full</strong>.</font></p>', '10000', 3, 6, '580ccdc79531a_1.jpg', '57f18e08713fd', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'SMART TV LG 49 49LF6450 3D', '<font face=\"verdana\" size=\"3\">El <b>Smart TV LG</b> de 49 pulgadas incorpora el sistema de sonido <b>3D Sound Zooming</b> para que tus películas se escuchen con la más alta claridad. Con la función Time Machine II no te pierdas más de tus programas favoritos o la repetición de un gol; pone pausa o retrocede en vivo y nunca más te pierdas lo importante</font><br>', '18000', 3, 1, '580ccdde4b42e_1.jpg', '57f45f74673e5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'SMART TV SAMSUNG 55 UN55J5500', '<font face=\"verdana\" size=\"3\">El portal hacia la nueva experiencia de TV más inteligente está justo en el borde inferior de la pantalla, para que nunca pierdas de vista lo que estás mirando. La barra del menú del Smart TV te brinda un acceso más ágil, rápido y verdaderamente intuitivo a tu contenido preferido. Ya no tienes que pasar por todos los canales buscando el contenido que deseas: el TV recuerda tu historial y pone el contenido que más utilizas a la vista, en la barra del menú, para que encontrar tu contenido favorito sea más fácil que nunca. Incluso puedes explorar otros tipos de contenido, ya que el Smart TV de Samsung te recomienda continuamente contenidos nuevos y destacados que podrían interesarte. Descubre la experiencia Smart TV más sencilla hasta el momento.<br style=\"outline: 0px; list-style: none;\">El contenido lo es todo y el Smart TV de Samsung tiene todo lo que precisas. Disfruta de cientos de aplicaciones y navega por la web para encontrar tu contenido favorito sin problemas y del modo más intuitivo posible. Tan solo deslízate hacia la izquierda o la derecha para ver recomendaciones personalizadas de aplicaciones, nuevas aplicaciones destacadas y más con solo echar un vistazo. Incluso tiene una aplicación de navegador web mejorada que te brinda acceso rápido a páginas web populares de tu región con tan solo el clic de un botón y sin tener que tipear la URL.<br style=\"outline: 0px; list-style: none;\">Gracias a su procesador Quad Core, tu Smart TV de Samsung te ofrece un mayor rendimiento. La diferencia se nota de inmediato, ya que ejecutar múltiples tareas y pasar del contenido a la navegación web es más rápido, y la interacción es más ágil. Esta potencia adicional hace que tu experiencia de entretenimiento sea mucho más placentera, con menos tiempo de espera y más visualización.</font><br>', '27000', 3, 4, '580ccdf1d4a06_1.jpg', '57f46015ee545', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'LED SAMSUNG 32 UN32J4000', '<font size=\"3\" face=\"verdana\">Colores más vibrantes para obtener mejores imágenes<br style=\"outline: 0px; list-style: none;\">Wide Color Enhancer Plus de Samsung utiliza un algoritmo avanzado para la mejora de la calidad de la imagen, lo que optimiza increíblemente la calidad de cualquier imagen y saca a la luz los detalles ocultos. Ahora puedes ver los colores del modo en que se deben ver con Wide Color Enhancer.<br style=\"outline: 0px; list-style: none;\">Una experiencia multimedia completa para tu living<br style=\"outline: 0px; list-style: none;\">Gracias a las entradas de la Interfaz Multimedia de Alta Definición (HDMI), el televisor de Samsung transformará tu sala de estar en un centro de entretenimiento multimedia. HDMI brinda una transmisión de alta velocidad de los datos digitales de alta definición a partir de múltiples dispositivos hacia tu televisor de forma directa.<br style=\"outline: 0px; list-style: none;\">Mirá películas desde tu USB<br style=\"outline: 0px; list-style: none;\">Gracias a ConnectShare Movie, tan solo tenés que conectar tu memoria USB o HDD al televisor y al instante podrás disfrutar películas, fotos o música. Ahora podés disfrutar de una gran variedad de contenido en tu televisor en la comodidad de tu sala de estar.</font><br>', '7000', 3, 4, '580cce036cddb_1.jpg', '57f4607f8dcf7', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `productos` (`id`, `nombre`, `descri`, `precio`, `category_id`, `marca`, `portada`, `carpet`, `created_at`, `updated_at`) VALUES
(30, 'LED LG 43 43LF5410', '<div><font face=\"verdana\" size=\"3\"><u><b>Descripción</b></u></font></div><div><font face=\"verdana\" size=\"3\">El procesador de imágenes Triple XD Engine de última generación de la TV LED LG de 43 pulgadas, creado por LG, es el único que te va a permitir disfrutar del más alto nivel de calidad en colores y brillos. La pantalla de 43 pulgadas, única en su segmento, es el complemento ideal para que la experiencia de uso sea completa.</font></div><div><font face=\"verdana\" size=\"3\"><br></font></div><div><font face=\"verdana\" size=\"3\"><u><b>Sonido</b></u></font></div><div><font face=\"verdana\" size=\"3\">Parlantes 2</font></div><div><font face=\"verdana\" size=\"3\">Potencia de Parlantes (RMS) 10 W</font></div><div><font face=\"verdana\" size=\"3\">Modos de Sonido Dolby, Mono, SAP, Stereo</font></div><div><font face=\"verdana\" size=\"3\">Función de Sonido Surround</font></div><div><font face=\"verdana\" size=\"3\"><u><b><br></b></u></font></div><div><font face=\"verdana\" size=\"3\"><u><b>Conectividad</b></u></font></div><div><font face=\"verdana\" size=\"3\">HDMI 1</font></div><div><font face=\"verdana\" size=\"3\">USB 1</font></div><div><font face=\"verdana\" size=\"3\">Puerto de Red No</font></div><div><font face=\"verdana\" size=\"3\">VGA No</font></div><div><font face=\"verdana\" size=\"3\">Audio y Video (A/V) No</font></div><div><font face=\"verdana\" size=\"3\">Video Compuesto No</font></div><div><font face=\"verdana\" size=\"3\">NFC No</font></div><div><font face=\"verdana\" size=\"3\">Sintonizador Digital Sí (ISDBT)</font></div><div><font face=\"verdana\" size=\"3\">Salida para Auriculares No</font></div><div><font face=\"verdana\" size=\"3\"><br></font></div><div><font face=\"verdana\" size=\"3\"><b><u>Características especiales</u></b></font></div><div><font face=\"verdana\" size=\"3\">Smart TV No</font></div><div><font face=\"verdana\" size=\"3\">YouTube No</font></div><div><font face=\"verdana\" size=\"3\">Skype No</font></div><div><font face=\"verdana\" size=\"3\">3D No</font></div><div><font face=\"verdana\" size=\"3\">Control por movimiento No</font></div><div><font face=\"verdana\" size=\"3\">Control por voz No</font></div><div><font face=\"verdana\" size=\"3\">Juegos Sí</font></div><div><font face=\"verdana\" size=\"3\">Compatibilidad con Teclado y Mouse USB No</font></div><div><font face=\"verdana\" size=\"3\">Compartir Archivos No</font></div><div><font face=\"verdana\" size=\"3\">Dual Gaming No</font></div><div><font face=\"verdana\" size=\"3\">Formatos de Rep. de Video/Imagen MP4, JPEG, AVI</font></div><div><font face=\"verdana\" size=\"3\">Formatos de Rep. de Audio MP3, AAC</font></div><div><font face=\"verdana\" size=\"3\"><br></font></div><div><font face=\"verdana\" size=\"3\"><u><b>Dimensiones</b></u></font></div><div><font face=\"verdana\" size=\"3\">Medidas sin base</font></div><div><font face=\"verdana\" size=\"3\">Alto 57.5 cm</font></div><div><font face=\"verdana\" size=\"3\">Ancho 97.1 cm</font></div><div><font face=\"verdana\" size=\"3\">Profundidad 14.9 cm</font></div><div><br></div><div><font face=\"verdana\" size=\"3\">Medidas con base</font></div><div><font face=\"verdana\" size=\"3\">Alto (con Base) 62.4 cm</font></div><div><font face=\"verdana\" size=\"3\">Ancho (con base) 97.1 cm</font></div><div><font face=\"verdana\" size=\"3\">Profundidad (con base) 19.8 cm</font></div><div><br></div>', '10000', 3, 1, '580cce242435c_1.jpg', '57f461fff10a9', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'LED LG 43 43LF5410', '<font face=\"verdana\" size=\"3\">TV Personal (TV + Monitor): El monitor TV LG 24MT45D te permite disfrutar del mayor entretenimiento multimedia: es posible ver películas en DVD, acceder a Internet, visualizar fotos y jugar videojuegos. Con la calidad de imagen HD tu diversión está garantizada.Parlantes Estéreo (5w x 2): Viví el sonido de tus películas y videojuegos al máximo. Con los parlantes estéreo incorporados, ya no es necesario que conectés ningún parlante extra a tu monitor.Time Machine Ready: Conectando el dispositivo de almacenamiento externo, podés grabar tu programa de TV favorito y volver al punto donde quieras verlo nuevamente. No te pierdas nada! (Requiere la compra adicional de una memoria externa)</font><br>', '4000', 3, 1, '580cce4843682_1.jpg', '57f46326501bb', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'El culalar prro gggg izi', '<font color=\"#660066\">El culalar prro gggg iziEl culalar prro gggg iziEl culalar prro gggg iziEl culalar prro gggg iziEl culalar prro gggg iziEl culalar prro gggg iziEl culalar prro gggg iziEl culalar prro gggg iziEl culalar prro gggg iziEl culalar prro gggg iziEl culalar p</font>rro gggg izi<br>', '5000', 1, 0, '581548081e743_1.jpg', '581547dc5f383', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_comment`
--

CREATE TABLE `product_comment` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `coment` varchar(150) COLLATE utf8_bin NOT NULL,
  `fecha` varchar(11) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subs`
--

CREATE TABLE `subs` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `date` varchar(11) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(155) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(155) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `gender` varchar(25) COLLATE utf8_bin NOT NULL,
  `dni` int(8) NOT NULL,
  `phone` varchar(12) COLLATE utf8_bin NOT NULL,
  `rank` int(1) NOT NULL,
  `cash` int(11) NOT NULL,
  `dateuser` varchar(55) COLLATE utf8_bin NOT NULL,
  `img` text COLLATE utf8_bin NOT NULL,
  `newlatter` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `password`, `email`, `gender`, `dni`, `phone`, `rank`, `cash`, `dateuser`, `img`, `newlatter`) VALUES
(1, 'Marcos', 'Gin', '$2y$10$1sB5n8IBa42tBtjhUipMW.vW/ASa9OwbxZM1Ixde1Je363QxCUovu', 'marcosgin@gmail.com', 'Masculino', 42270070, '1533445690', 0, 0, '30/05/1999', 'none.jpg', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_activate`
--

CREATE TABLE `users_activate` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `users_activate`
--

INSERT INTO `users_activate` (`id`, `user_id`, `token`) VALUES
(1, 1, 'b0921649428b79615f190af76418554a1759f934c0793bc52857cac4b19d65925dc5235549b1fd63');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catmarc`
--
ALTER TABLE `catmarc`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `myhistory`
--
ALTER TABLE `myhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `myproducts`
--
ALTER TABLE `myproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producimgs`
--
ALTER TABLE `producimgs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product_comment`
--
ALTER TABLE `product_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subs`
--
ALTER TABLE `subs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_activate`
--
ALTER TABLE `users_activate`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `catmarc`
--
ALTER TABLE `catmarc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `myhistory`
--
ALTER TABLE `myhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `myproducts`
--
ALTER TABLE `myproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `producimgs`
--
ALTER TABLE `producimgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=651;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `product_comment`
--
ALTER TABLE `product_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `users_activate`
--
ALTER TABLE `users_activate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
