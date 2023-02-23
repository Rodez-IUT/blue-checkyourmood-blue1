-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 19 Décembre 2022 à 18:10
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `checkyourmood`
--

-- --------------------------------------------------------

--
-- Structure de la table `emotion`
--

CREATE TABLE `emotion` (
  `ID_EMOTION` int(11) NOT NULL,
  `EMOJI` varchar(500) NOT NULL,
  `NOM` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `emotion`
--

INSERT INTO `emotion` (`ID_EMOTION`, `EMOJI`, `NOM`) VALUES
(1, '&#129321', 'Admiration'),
(2, '&#128525', 'Adoration'),
(3, '&#128522', 'Appréciation esthétique'),
(4, '&#129395', 'Amusement'),
(5, '&#128545', 'Colère'),
(6, '&#128560', 'Anxiété'),
(7, '&#128535', 'Émerveillement'),
(8, '&#128563', 'Malaise (embarrassement)'),
(9, '&#128530', 'Ennui'),
(10, '&#128528', 'Calme (sérénité)'),
(11, '&#128533', 'Confusion'),
(12, '&#129316', 'Envie (craving)'),
(13, '&#129314', 'Dégoût'),
(14, '&#128543', 'Douleur empathique'),
(15, '&#128562', 'Intérêt étonné, intrigué'),
(16, '&#129327', 'Excitation (montée d’adrénaline)'),
(17, '&#128552', 'Peur'),
(18, '&#128561', 'Horreur'),
(19, '&#129300', 'Intérêt'),
(20, '&#128516', 'Joie'),
(21, '&#129488', 'Nostalgie'),
(22, '&#128524', 'Soulagement'),
(23, '&#129392', 'Romance'),
(24, '&#128546', 'Tristesse'),
(25, '&#129303', 'Satisfaction'),
(26, '&#129397', 'Désir sexuel'),
(27, '&#128558', 'Surprise');

-- --------------------------------------------------------

--
-- Structure de la table `humeur`
--

CREATE TABLE `humeur` (
  `ID_HUMEUR` int(11) NOT NULL,
  `DESCRIPTION` varchar(3000) DEFAULT NULL,
  `DATE_HEURE` datetime NOT NULL,
  `FICHIER` varchar(500) DEFAULT NULL,
  `CODE_UTILISATEUR` int(11) NOT NULL,
  `CODE_EMOTION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `humeur`
--

INSERT INTO `humeur` (`ID_HUMEUR`, `DESCRIPTION`, `DATE_HEURE`, `FICHIER`, `CODE_UTILISATEUR`, `CODE_EMOTION`) VALUES
(1, NULL, '2022-04-25 12:00:54', NULL, 14, 19),
(2, 'Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem. Sed sagittis.', '2022-11-04 09:14:32', 'Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue.', 17, 25),
(3, NULL, '2022-03-23 11:18:35', NULL, 13, 11),
(4, NULL, '2021-09-20 05:03:32', NULL, 17, 8),
(5, NULL, '2022-08-18 19:11:29', NULL, 15, 25),
(6, 'Etiam faucibus cursus urna. Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi. Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.', '2021-12-24 08:39:24', 'Curabitur in libero ut massa volutpat convallis.', 11, 1),
(7, NULL, '2022-07-19 14:27:31', NULL, 8, 13),
(8, NULL, '2021-12-09 16:57:21', NULL, 18, 17),
(9, 'Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat. In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius.', '2021-10-26 05:21:59', 'Nunc purus.', 17, 5),
(10, NULL, '2022-09-05 20:42:05', NULL, 2, 20),
(11, 'Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla.', '2022-11-02 00:55:58', 'Aenean lectus.', 12, 16),
(12, 'Morbi a ipsum.', '2022-04-07 21:03:20', 'Morbi non quam nec dui luctus rutrum.', 15, 8),
(13, NULL, '2022-04-16 00:12:15', NULL, 16, 20),
(14, 'Etiam faucibus cursus urna. Ut tellus.', '2022-01-04 05:55:15', 'Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.', 5, 20),
(15, 'Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia.', '2021-11-01 13:00:27', 'Nulla ac enim.', 3, 10),
(16, 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', '2022-10-19 07:25:09', 'Vivamus in felis eu sapien cursus vestibulum.', 12, 15),
(17, 'Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim.', '2022-01-25 03:43:17', 'Praesent blandit.', 19, 18),
(18, NULL, '2022-03-03 20:34:26', NULL, 16, 12),
(19, 'Nullam sit amet turpis elementum ligula vehicula consequat.', '2022-01-27 02:33:18', 'Nam nulla.', 17, 21),
(20, NULL, '2022-07-17 12:25:59', NULL, 18, 7),
(21, 'Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem. Duis aliquam convallis nunc.', '2022-07-31 23:09:22', 'Cras pellentesque volutpat dui.', 4, 6),
(22, NULL, '2022-05-30 07:21:16', NULL, 17, 11),
(23, 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', '2022-06-08 19:36:37', 'Aliquam quis turpis eget elit sodales scelerisque.', 5, 23),
(24, 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2022-11-04 04:37:00', 'Nulla ac enim.', 15, 23),
(25, 'Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', '2022-05-23 04:21:24', 'Nulla ut erat id mauris vulputate elementum.', 6, 5),
(26, NULL, '2022-07-30 20:26:08', NULL, 7, 4),
(27, NULL, '2021-09-10 23:29:54', NULL, 9, 20),
(28, 'Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla.', '2022-04-20 07:02:26', 'Pellentesque eget nunc.', 6, 4),
(29, NULL, '2022-05-22 23:40:39', NULL, 6, 4),
(30, NULL, '2022-09-02 10:20:44', NULL, 12, 22),
(31, NULL, '2022-03-03 09:25:39', NULL, 8, 15),
(32, 'Nulla facilisi. Cras non velit nec nisi vulputate nonummy.', '2022-02-23 14:32:15', 'Maecenas tincidunt lacus at velit.', 7, 26),
(33, NULL, '2021-11-21 01:21:31', NULL, 8, 18),
(34, NULL, '2022-01-07 08:06:36', NULL, 3, 19),
(35, NULL, '2022-07-25 20:33:16', NULL, 7, 2),
(36, NULL, '2022-08-14 10:46:46', NULL, 8, 20),
(37, 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis.', '2022-01-19 23:43:16', 'Quisque id justo sit amet sapien dignissim vestibulum.', 16, 17),
(38, NULL, '2021-11-10 13:09:54', NULL, 8, 3),
(39, NULL, '2021-09-18 21:13:02', NULL, 17, 4),
(40, NULL, '2022-10-23 20:49:37', NULL, 12, 24),
(41, NULL, '2022-05-02 19:05:51', NULL, 2, 12),
(42, NULL, '2022-06-20 02:06:13', NULL, 8, 8),
(43, 'Suspendisse accumsan tortor quis turpis. Sed ante. Vivamus tortor.', '2022-04-28 10:05:04', 'Donec quis orci eget orci vehicula condimentum.', 3, 7),
(44, 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.', '2022-04-14 16:57:33', 'Morbi porttitor lorem id ligula.', 6, 23),
(45, 'Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros.', '2021-12-18 20:14:10', 'In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.', 4, 21),
(46, NULL, '2021-10-18 02:53:33', NULL, 18, 1),
(47, NULL, '2022-02-02 01:06:43', NULL, 6, 26),
(48, NULL, '2022-05-19 22:43:48', NULL, 6, 1),
(49, 'Nulla facilisi. Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis. Donec semper sapien a libero.', '2022-04-06 18:12:36', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo.', 10, 26),
(50, NULL, '2021-10-11 14:18:29', NULL, 20, 23),
(51, 'Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.', '2022-05-23 18:50:44', 'Vivamus in felis eu sapien cursus vestibulum.', 5, 24),
(52, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus. Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.', '2022-02-04 02:10:33', 'Morbi quis tortor id nulla ultrices aliquet.', 11, 22),
(53, NULL, '2022-08-17 15:45:54', NULL, 15, 12),
(54, NULL, '2022-07-10 22:38:53', NULL, 12, 25),
(55, 'Etiam faucibus cursus urna. Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi. Cras non velit nec nisi vulputate nonummy.', '2021-11-30 22:12:59', 'Sed sagittis.', 2, 14),
(56, NULL, '2022-08-05 05:09:31', NULL, 19, 6),
(57, 'Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', '2021-12-28 13:18:06', 'Proin risus.', 7, 25),
(58, NULL, '2022-10-31 21:33:06', NULL, 19, 5),
(59, NULL, '2022-04-09 21:22:13', NULL, 12, 6),
(60, 'Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices.', '2021-12-28 02:12:27', 'Suspendisse potenti.', 18, 10),
(61, NULL, '2021-10-24 08:46:10', NULL, 5, 21),
(62, NULL, '2022-08-14 13:59:25', NULL, 4, 5),
(63, 'Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus.', '2022-01-08 15:04:28', 'Ut tellus.', 5, 11),
(64, 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', '2022-03-08 16:38:07', 'Aenean sit amet justo.', 1, 13),
(65, NULL, '2022-07-22 12:09:24', NULL, 6, 8),
(66, NULL, '2021-11-19 11:51:48', NULL, 18, 10),
(67, 'Nunc purus.', '2022-11-04 00:08:55', 'Praesent id massa id nisl venenatis lacinia.', 13, 2),
(68, 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus.', '2022-03-04 08:00:12', 'Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci.', 18, 9),
(69, 'Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', '2021-09-17 00:01:09', 'Donec quis orci eget orci vehicula condimentum.', 18, 17),
(70, NULL, '2022-06-27 07:13:05', NULL, 6, 7),
(71, NULL, '2022-04-16 01:11:49', NULL, 3, 26),
(72, NULL, '2021-09-13 22:50:44', NULL, 18, 19),
(73, 'Nunc purus. Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis.', '2022-01-20 12:07:29', 'Morbi quis tortor id nulla ultrices aliquet.', 19, 19),
(74, 'Aliquam erat volutpat. In congue. Etiam justo.', '2022-07-31 10:23:46', 'Aenean fermentum.', 10, 1),
(75, NULL, '2022-03-22 19:39:20', NULL, 16, 3),
(76, NULL, '2022-05-29 06:47:24', NULL, 13, 16),
(77, 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst.', '2022-11-01 23:37:49', 'Sed accumsan felis.', 11, 8),
(78, NULL, '2022-09-13 13:00:29', NULL, 5, 25),
(79, 'Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', '2022-11-07 02:42:12', 'Pellentesque ultrices mattis odio.', 6, 24),
(80, 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', '2022-01-31 07:30:06', 'Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', 3, 2),
(81, NULL, '2022-10-12 21:35:13', NULL, 11, 19),
(82, 'Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', '2022-10-17 16:29:42', 'Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue.', 5, 25),
(83, NULL, '2022-01-22 03:46:04', NULL, 10, 22),
(84, NULL, '2022-03-23 05:06:29', NULL, 16, 23),
(85, 'Mauris sit amet eros. Suspendisse accumsan tortor quis turpis. Sed ante. Vivamus tortor.', '2022-03-02 21:50:23', 'Nullam porttitor lacus at turpis.', 4, 4),
(86, NULL, '2021-10-06 03:34:20', NULL, 19, 12),
(87, 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros.', '2021-12-02 07:52:01', 'Nullam porttitor lacus at turpis.', 20, 13),
(88, NULL, '2021-10-02 08:20:24', NULL, 19, 22),
(89, NULL, '2022-09-25 17:40:36', NULL, 16, 15),
(90, NULL, '2022-06-17 14:19:52', NULL, 11, 20),
(91, NULL, '2022-05-01 18:55:20', NULL, 10, 4),
(92, NULL, '2021-10-12 05:16:26', NULL, 20, 20),
(93, NULL, '2022-09-12 20:14:11', NULL, 11, 4),
(94, 'Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci.', '2022-02-01 15:44:48', 'Proin at turpis a pede posuere nonummy.', 14, 26),
(95, NULL, '2022-07-06 20:18:10', NULL, 19, 20),
(96, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus.', '2022-02-02 07:56:59', 'Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', 4, 20),
(97, 'Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', '2022-09-22 14:21:02', 'Curabitur at ipsum ac tellus semper interdum.', 8, 18),
(98, 'Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', '2022-05-01 02:25:41', 'Ut tellus.', 15, 13),
(99, 'Nullam molestie nibh in lectus.', '2022-02-19 22:24:46', 'Etiam faucibus cursus urna.', 4, 6),
(100, NULL, '2022-09-19 02:55:04', NULL, 9, 24),
(101, NULL, '2022-07-06 12:34:03', NULL, 12, 26),
(102, 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', '2021-12-31 23:18:55', 'Suspendisse ornare consequat lectus.', 3, 13),
(103, NULL, '2022-09-22 20:40:47', NULL, 15, 21),
(104, NULL, '2022-06-29 10:47:10', NULL, 12, 14),
(105, 'In hac habitasse platea dictumst.', '2021-09-18 20:51:09', 'Aliquam non mauris.', 7, 9),
(106, NULL, '2021-12-14 14:55:05', NULL, 19, 6),
(107, NULL, '2022-02-05 02:46:20', NULL, 12, 21),
(108, 'Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa.', '2022-08-01 09:35:32', 'Curabitur at ipsum ac tellus semper interdum.', 12, 12),
(109, 'Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo.', '2021-11-22 15:19:05', 'Cras pellentesque volutpat dui.', 12, 1),
(110, NULL, '2022-05-30 17:48:52', NULL, 2, 27),
(111, 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl.', '2022-04-06 07:23:21', 'Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', 20, 26),
(112, NULL, '2022-03-03 07:17:08', NULL, 19, 9),
(113, NULL, '2021-11-28 08:56:25', NULL, 5, 14),
(114, 'Cras non velit nec nisi vulputate nonummy.', '2021-11-19 09:59:03', 'In hac habitasse platea dictumst.', 8, 14),
(115, 'Sed vel enim sit amet nunc viverra dapibus.', '2022-08-21 21:44:35', 'Duis ac nibh.', 5, 27),
(116, 'Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus.', '2022-09-20 12:04:45', 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla.', 20, 21),
(117, 'Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem.', '2021-11-09 04:17:41', 'Proin eu mi.', 7, 5),
(118, NULL, '2021-12-21 08:26:15', NULL, 17, 5),
(119, 'Nunc purus. Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis.', '2022-02-22 10:46:55', 'Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue.', 5, 15),
(120, 'Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum.', '2022-05-21 20:29:59', 'Aliquam non mauris.', 9, 11),
(121, NULL, '2022-01-29 00:27:10', NULL, 3, 24),
(122, NULL, '2022-01-15 09:18:41', NULL, 3, 3),
(123, NULL, '2022-08-03 14:54:46', NULL, 6, 4),
(124, NULL, '2022-10-13 10:30:05', NULL, 10, 12),
(125, 'Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', '2022-01-04 12:09:33', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est.', 4, 26),
(126, NULL, '2022-03-29 11:28:08', NULL, 19, 2),
(127, NULL, '2022-01-08 03:50:34', NULL, 7, 15),
(128, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat. In congue. Etiam justo. Etiam pretium iaculis justo.', '2022-09-08 16:00:57', 'Vestibulum rutrum rutrum neque.', 1, 19),
(129, NULL, '2022-08-28 00:11:27', NULL, 4, 4),
(130, NULL, '2022-08-07 16:44:05', NULL, 20, 27),
(131, NULL, '2022-08-01 14:50:00', NULL, 2, 26),
(132, 'Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.', '2021-10-27 13:12:49', 'Nulla suscipit ligula in lacus.', 14, 2),
(133, 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem. Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', '2022-02-04 21:16:17', 'Suspendisse potenti.', 16, 20),
(134, NULL, '2022-03-14 20:09:50', NULL, 2, 5),
(135, 'Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti. In eleifend quam a odio.', '2022-08-16 07:50:05', 'Quisque ut erat.', 1, 19),
(136, 'Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam. Nam tristique tortor eu pede.', '2022-03-26 21:18:00', 'Integer tincidunt ante vel ipsum.', 1, 4),
(137, NULL, '2022-05-14 02:51:20', NULL, 5, 3),
(138, NULL, '2021-09-30 20:20:55', NULL, 10, 20),
(139, NULL, '2022-08-04 02:30:47', NULL, 8, 10),
(140, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus.', '2022-08-16 19:02:48', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi.', 16, 22),
(141, NULL, '2021-10-23 13:53:58', NULL, 10, 10),
(142, 'Proin at turpis a pede posuere nonummy. Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum.', '2022-11-04 03:43:45', 'Integer ac leo.', 19, 25),
(143, 'Fusce consequat. Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus.', '2021-12-14 05:41:41', 'Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.', 6, 10),
(144, 'Suspendisse potenti. Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo.', '2022-01-25 20:15:34', 'Donec posuere metus vitae ipsum.', 3, 26),
(145, 'Aenean auctor gravida sem.', '2022-08-11 02:23:26', 'Nulla facilisi.', 3, 1),
(146, NULL, '2022-08-27 11:20:17', NULL, 10, 25),
(147, NULL, '2022-09-27 10:48:34', NULL, 12, 1),
(148, NULL, '2022-07-06 04:26:50', NULL, 6, 11),
(149, 'In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.', '2022-05-27 06:36:02', 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla.', 9, 26),
(150, NULL, '2022-05-04 07:38:59', NULL, 2, 1),
(151, NULL, '2022-01-25 10:34:39', NULL, 14, 14),
(152, 'Sed ante. Vivamus tortor. Duis mattis egestas metus. Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique.', '2021-09-09 01:11:19', 'Duis at velit eu est congue elementum.', 15, 12),
(153, NULL, '2021-11-27 07:20:11', NULL, 1, 6),
(154, 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem. Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus. Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2021-10-06 06:13:27', 'Integer non velit.', 10, 14),
(155, 'Nullam molestie nibh in lectus. Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2022-03-10 15:10:07', 'Duis mattis egestas metus.', 10, 8),
(156, NULL, '2022-09-10 20:24:27', NULL, 18, 26),
(157, 'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi. Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.', '2022-01-19 21:49:00', 'Sed vel enim sit amet nunc viverra dapibus.', 12, 16),
(158, NULL, '2022-05-07 18:20:50', NULL, 7, 8),
(159, NULL, '2022-11-02 06:35:58', NULL, 18, 27),
(160, 'Vivamus tortor. Duis mattis egestas metus. Aenean fermentum.', '2021-09-13 00:15:23', 'Donec dapibus.', 17, 22),
(161, NULL, '2021-10-30 08:28:35', NULL, 18, 10),
(162, 'Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis. Sed ante. Vivamus tortor. Duis mattis egestas metus.', '2021-10-20 08:41:46', 'Donec quis orci eget orci vehicula condimentum.', 14, 8),
(163, 'Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus.', '2022-02-07 11:21:12', 'Morbi ut odio.', 17, 24),
(164, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', '2022-03-19 09:57:40', 'Maecenas ut massa quis augue luctus tincidunt.', 2, 17),
(165, NULL, '2022-07-23 14:10:01', NULL, 13, 19),
(166, 'Mauris ullamcorper purus sit amet nulla.', '2021-12-27 13:06:20', 'Nulla mollis molestie lorem.', 3, 13),
(167, NULL, '2022-03-26 05:51:15', NULL, 5, 12),
(168, 'Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.', '2021-12-11 21:30:42', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 1, 23),
(169, 'Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis.', '2022-08-21 06:47:57', 'Pellentesque viverra pede ac diam.', 11, 13),
(170, 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum. Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.', '2021-11-11 23:30:40', 'Donec quis orci eget orci vehicula condimentum.', 3, 14),
(171, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique.', '2022-03-08 07:14:24', 'Vestibulum sed magna at nunc commodo placerat.', 7, 2),
(172, NULL, '2022-09-30 15:45:40', NULL, 20, 8),
(173, NULL, '2021-10-27 11:15:49', NULL, 10, 17),
(174, NULL, '2022-07-29 11:19:03', NULL, 13, 9),
(175, NULL, '2021-12-09 02:28:49', NULL, 1, 19),
(176, 'Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem. Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue.', '2022-04-14 16:45:44', 'In hac habitasse platea dictumst.', 13, 18),
(177, NULL, '2022-01-25 06:56:05', NULL, 12, 3),
(178, 'Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', '2022-08-13 10:46:01', 'Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla.', 17, 1),
(179, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', '2021-10-08 09:12:12', 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo.', 18, 16),
(180, NULL, '2022-07-24 11:58:44', NULL, 17, 24),
(181, 'Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus.', '2022-06-19 22:52:23', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc.', 20, 19),
(182, 'Praesent lectus. Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis. Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', '2022-01-29 08:28:36', 'In blandit ultrices enim.', 8, 27),
(183, 'Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', '2021-11-18 12:48:20', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 10, 25),
(184, 'Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus.', '2022-05-03 06:10:20', 'Suspendisse potenti.', 15, 5),
(185, 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl.', '2022-07-21 17:29:25', 'Mauris sit amet eros.', 13, 25),
(186, 'Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', '2022-03-14 08:51:04', 'Ut tellus.', 13, 4),
(187, NULL, '2021-09-16 12:49:06', NULL, 2, 5),
(188, NULL, '2022-08-20 05:25:11', NULL, 5, 21),
(189, NULL, '2021-12-14 12:38:59', NULL, 1, 7),
(190, NULL, '2022-05-27 08:03:12', NULL, 7, 22),
(191, 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet.', '2021-09-17 09:51:17', 'Proin eu mi.', 4, 15),
(192, 'Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum.', '2021-10-23 11:57:16', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante.', 6, 23),
(193, NULL, '2022-07-08 03:30:12', NULL, 19, 27),
(194, NULL, '2022-01-24 03:33:53', NULL, 8, 7),
(195, NULL, '2021-09-21 17:07:18', NULL, 14, 26),
(196, 'Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat.', '2022-07-07 05:18:13', 'Duis consequat dui nec nisi volutpat eleifend.', 11, 17),
(197, 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', '2022-05-02 06:13:20', 'Proin eu mi.', 10, 19),
(198, NULL, '2022-08-09 03:24:43', NULL, 15, 2),
(199, NULL, '2022-08-15 00:43:18', NULL, 4, 24),
(200, NULL, '2022-05-04 07:51:21', NULL, 9, 15),
(201, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio.', '2022-07-16 17:01:06', 'Curabitur convallis.', 2, 20),
(202, NULL, '2022-08-23 19:52:21', NULL, 16, 4),
(203, NULL, '2022-05-28 15:13:19', NULL, 2, 9),
(204, NULL, '2022-03-29 09:46:53', NULL, 10, 7),
(205, NULL, '2022-09-02 10:36:02', NULL, 11, 10),
(206, 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem. Sed sagittis.', '2021-12-01 11:17:28', 'Quisque porta volutpat erat.', 10, 21),
(207, NULL, '2021-10-20 07:06:59', NULL, 17, 8),
(208, 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum.', '2022-03-05 07:49:31', 'Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.', 14, 23),
(209, 'Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla.', '2022-01-03 00:35:58', 'Nam tristique tortor eu pede.', 1, 16),
(210, 'Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum. Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.', '2022-07-20 21:00:31', 'Vestibulum sed magna at nunc commodo placerat.', 18, 21),
(211, 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien.', '2022-09-12 21:51:02', 'Donec ut mauris eget massa tempor convallis.', 19, 6),
(212, 'Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus.', '2022-09-17 06:23:39', 'Suspendisse ornare consequat lectus.', 18, 8),
(213, 'Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus.', '2022-10-05 14:58:44', 'Nunc nisl.', 14, 22),
(214, 'Donec posuere metus vitae ipsum. Aliquam non mauris.', '2022-02-22 09:54:39', 'Aenean sit amet justo.', 18, 26),
(215, NULL, '2022-06-03 03:47:53', NULL, 16, 13),
(216, NULL, '2022-04-19 14:16:05', NULL, 1, 18),
(217, 'Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim.', '2022-09-03 12:26:02', 'Nam dui.', 13, 3),
(218, NULL, '2021-09-27 03:26:47', NULL, 18, 10),
(219, 'In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.', '2021-11-03 12:21:50', 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo.', 16, 25),
(220, NULL, '2022-04-01 07:13:51', NULL, 2, 11),
(221, NULL, '2022-05-20 12:22:20', NULL, 3, 9),
(222, 'Fusce consequat. Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.', '2022-04-30 03:30:45', 'Proin at turpis a pede posuere nonummy.', 10, 10),
(223, 'Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', '2022-09-10 06:26:28', 'Morbi ut odio.', 8, 19),
(224, NULL, '2021-10-24 17:28:11', NULL, 7, 23),
(225, NULL, '2021-11-22 18:13:12', NULL, 7, 5),
(226, 'Suspendisse accumsan tortor quis turpis. Sed ante. Vivamus tortor. Duis mattis egestas metus.', '2022-06-10 02:35:07', 'Integer ac neque.', 17, 27),
(227, 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', '2022-02-01 11:55:36', 'Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.', 19, 12),
(228, NULL, '2022-06-28 22:01:04', NULL, 12, 6),
(229, NULL, '2021-09-03 06:03:44', NULL, 16, 10),
(230, 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus. Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2021-10-17 19:24:53', 'In sagittis dui vel nisl.', 9, 21),
(231, 'Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque.', '2022-07-30 01:33:25', 'Phasellus sit amet erat.', 15, 4),
(232, NULL, '2022-09-22 00:18:51', NULL, 6, 12),
(233, 'Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque.', '2022-11-01 15:46:10', 'Vestibulum sed magna at nunc commodo placerat.', 4, 7),
(234, NULL, '2021-10-28 00:34:56', NULL, 3, 3),
(235, NULL, '2021-12-22 21:59:47', NULL, 12, 15),
(236, 'Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat.', '2021-12-08 17:44:12', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis.', 17, 18),
(237, 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo.', '2021-10-28 21:30:05', 'Phasellus sit amet erat.', 15, 18),
(238, NULL, '2022-08-12 03:29:16', NULL, 18, 13),
(239, NULL, '2021-11-01 19:53:27', NULL, 14, 7),
(240, NULL, '2021-12-10 08:14:07', NULL, 3, 27),
(241, NULL, '2022-04-20 01:13:20', NULL, 11, 2),
(242, NULL, '2021-11-17 07:59:54', NULL, 16, 8),
(243, 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', '2022-03-22 17:03:39', 'Nam tristique tortor eu pede.', 20, 24),
(244, NULL, '2021-11-26 19:45:38', NULL, 15, 21),
(245, NULL, '2021-12-28 05:27:33', NULL, 14, 14),
(246, 'Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus.', '2022-01-31 18:18:01', 'Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci.', 4, 24),
(247, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue.', '2021-12-30 17:08:04', 'Etiam vel augue.', 12, 26),
(248, NULL, '2021-11-03 23:48:06', NULL, 15, 14),
(249, NULL, '2022-01-03 11:34:35', NULL, 7, 25),
(250, NULL, '2021-10-31 14:04:39', NULL, 14, 14),
(251, NULL, '2021-11-09 00:35:01', NULL, 15, 22),
(252, NULL, '2022-05-27 15:04:42', NULL, 6, 1),
(253, NULL, '2022-02-22 06:49:15', NULL, 10, 26),
(254, 'Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus.', '2021-12-09 12:27:37', 'Cras pellentesque volutpat dui.', 3, 17),
(255, NULL, '2022-09-14 00:41:09', NULL, 18, 3),
(256, 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem. Sed sagittis.', '2022-02-03 21:08:15', 'Pellentesque viverra pede ac diam.', 11, 6),
(257, NULL, '2022-07-05 04:57:36', NULL, 20, 11),
(258, NULL, '2022-02-12 21:40:57', NULL, 13, 5),
(259, NULL, '2022-10-13 10:39:38', NULL, 15, 11),
(260, 'Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.', '2022-08-09 15:08:27', 'Morbi quis tortor id nulla ultrices aliquet.', 8, 4),
(261, NULL, '2022-05-25 20:47:32', NULL, 3, 6),
(262, NULL, '2022-06-29 08:16:33', NULL, 13, 25),
(263, NULL, '2022-10-03 14:01:24', NULL, 12, 24),
(264, 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.', '2022-03-13 01:15:55', 'Proin interdum mauris non ligula pellentesque ultrices.', 3, 15),
(265, NULL, '2022-01-19 02:01:39', NULL, 15, 11),
(266, 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2022-02-28 08:33:01', 'Praesent lectus.', 6, 14),
(267, NULL, '2021-09-12 05:55:38', NULL, 17, 10),
(268, NULL, '2022-03-13 20:20:00', NULL, 6, 7),
(269, 'Vivamus in felis eu sapien cursus vestibulum. Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem. Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi.', '2022-01-18 16:27:35', 'Proin risus.', 17, 6),
(270, NULL, '2022-03-23 15:44:55', NULL, 5, 16),
(271, 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien.', '2021-09-24 00:17:53', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante.', 13, 17),
(272, NULL, '2022-09-10 02:33:15', NULL, 18, 25),
(273, NULL, '2022-08-23 09:08:01', NULL, 9, 14),
(274, 'Aliquam non mauris. Morbi non lectus.', '2022-09-18 01:31:50', 'Morbi porttitor lorem id ligula.', 2, 24),
(275, NULL, '2022-05-23 10:42:28', NULL, 9, 26),
(276, NULL, '2022-10-28 05:54:20', NULL, 16, 3),
(277, NULL, '2022-02-26 14:37:03', NULL, 17, 5),
(278, 'Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', '2022-01-15 07:16:02', 'Nunc purus.', 13, 6),
(279, NULL, '2022-04-15 18:23:17', NULL, 2, 6),
(280, NULL, '2022-03-07 11:56:29', NULL, 3, 24),
(281, NULL, '2022-05-01 00:02:10', NULL, 4, 19),
(282, NULL, '2022-10-13 13:38:39', NULL, 6, 12),
(283, 'Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', '2022-05-23 01:43:54', 'Praesent blandit.', 19, 5),
(284, 'Nullam varius.', '2022-04-03 07:53:04', 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla.', 9, 27),
(285, 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', '2021-10-08 17:59:46', 'Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', 9, 26),
(286, NULL, '2022-05-24 00:00:17', NULL, 9, 5),
(287, 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.', '2022-10-21 07:33:08', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc.', 11, 23),
(288, 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.', '2022-05-12 02:16:28', 'Duis bibendum.', 4, 3),
(289, 'In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem.', '2022-06-09 01:57:54', 'Proin risus.', 19, 12),
(290, NULL, '2021-11-03 00:07:36', NULL, 13, 15),
(291, NULL, '2021-09-16 00:00:55', NULL, 6, 5),
(292, 'Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', '2022-05-03 18:11:52', 'Proin at turpis a pede posuere nonummy.', 1, 11),
(293, 'Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem.', '2022-03-04 00:23:24', 'Duis ac nibh.', 3, 15),
(294, 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem.', '2022-10-29 22:04:27', 'In est risus, auctor sed, tristique in, tempus sit amet, sem.', 2, 1),
(295, 'Sed accumsan felis.', '2022-10-08 12:33:52', 'In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.', 7, 17),
(296, 'Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus.', '2022-11-04 23:47:08', 'Morbi quis tortor id nulla ultrices aliquet.', 1, 27),
(297, 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.', '2022-01-19 20:47:19', 'Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', 13, 14),
(298, 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', '2022-07-15 18:16:58', 'Phasellus in felis.', 15, 14);
INSERT INTO `humeur` (`ID_HUMEUR`, `DESCRIPTION`, `DATE_HEURE`, `FICHIER`, `CODE_UTILISATEUR`, `CODE_EMOTION`) VALUES
(299, 'Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis.', '2021-10-20 22:23:53', 'Cras non velit nec nisi vulputate nonummy.', 6, 12),
(300, NULL, '2022-07-13 20:18:22', NULL, 4, 27);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID_UTILISATEUR` int(11) NOT NULL,
  `NOM` varchar(80) NOT NULL,
  `PRENOM` varchar(80) NOT NULL,
  `NOM_UTILISATEUR` varchar(80) NOT NULL,
  `MOT_DE_PASSE` varchar(300) NOT NULL,
  `MAIL` varchar(200) NOT NULL,
  `GENRE` varchar(150) DEFAULT NULL,
  `DATE_DE_NAISSANCE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_UTILISATEUR`, `NOM`, `PRENOM`, `NOM_UTILISATEUR`, `MOT_DE_PASSE`, `MAIL`, `GENRE`, `DATE_DE_NAISSANCE`) VALUES
(1, 'Aspy', 'Timothy', 'taspy0', 'IHiEeG6rxFA', 'taspy0@webeden.co.uk', 'Autre', '1955-02-11'),
(2, 'Ribchester', 'Priscilla', 'pribchester1', 'DLJwxUXLuF', 'pribchester1@yahoo.co.jp', 'Female', '1949-01-08'),
(3, 'Ocheltree', 'Bibbie', 'bocheltree2', 'VokWspmRCPrr', 'bocheltree2@mediafire.com', 'Autre', '1985-05-18'),
(4, 'Offin', 'Chloette', 'coffin3', 'JlOYkLVK2Ea', 'coffin3@ca.gov', 'Female', '1983-04-18'),
(5, 'Hauger', 'Willyt', 'whauger4', 'nMNjZPWd', 'whauger4@prweb.com', 'Female', '2008-03-26'),
(6, 'Brokenbrow', 'Augustina', 'abrokenbrow5', '7u9URTVuZnCE', 'abrokenbrow5@oracle.com', 'Autre', NULL),
(7, 'O\'Lahy', 'Mathew', 'molahy6', 'jVxZdf5XX', 'molahy6@netlog.com', 'Male', '2020-03-30'),
(8, 'Gun', 'Junie', 'jgun7', 'rzSkaeVn', 'jgun7@chicagotribune.com', 'Female', '1976-12-05'),
(9, 'M\'Quharge', 'Vito', 'vmquharge8', 'SKZLVdp79G', 'vmquharge8@friendfeed.com', 'Autre', NULL),
(10, 'Ayres', 'Curtice', 'cayres9', 'QYw23uPGL', 'cayres9@wp.com', 'Male', '1959-01-02'),
(11, 'Kempson', 'Lilith', 'lkempsona', 'IFRjkmg', 'lkempsona@yahoo.com', 'Female', '1900-07-09'),
(12, 'De Bischof', 'Aura', 'adebischofb', '666Hp7FyAm', 'adebischofb@tripadvisor.com', 'Female', '1979-09-23'),
(13, 'Davioud', 'Ediva', 'edavioudc', 'lURuZZQh', 'edavioudc@hhs.gov', 'Autre', NULL),
(14, 'Ruppeli', 'Selestina', 'sruppelid', '7yIqNIT', 'sruppelid@amazon.com', 'Female', '1922-10-16'),
(15, 'Sempill', 'Kamillah', 'ksempille', 'vmJIrE', 'ksempille@unblog.fr', 'Autre', NULL),
(16, 'Pietrzyk', 'Bowie', 'bpietrzykf', 'oyS5AAGlq2V', 'bpietrzykf@elpais.com', 'Male', NULL),
(17, 'Pirouet', 'Talbot', 'tpirouetg', '05XYUjnxVtF', 'tpirouetg@amazonaws.com', 'Male', '2016-10-18'),
(18, 'Stronach', 'Missy', 'mstronachh', 's5XIhl00tA', 'mstronachh@umn.edu', 'Female', NULL),
(19, 'Turle', 'Rafi', 'rturlei', 'adJ5or4B03L', 'rturlei@list-manage.com', 'Male', '1931-12-30'),
(20, 'Broe', 'Lisetta', 'lbroej', 'b6odHBKoXQky', 'lbroej@com.com', 'Female', '1960-06-25'),
(46, 'LAUNAY', 'Simon', 'Simon', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'launay.simon@outlook.com', 'Homme', '2023-01-03');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `emotion`
--
ALTER TABLE `emotion`
  ADD PRIMARY KEY (`ID_EMOTION`);

--
-- Index pour la table `humeur`
--
ALTER TABLE `humeur`
  ADD PRIMARY KEY (`ID_HUMEUR`),
  ADD KEY `fkhumeurutilisateur` (`CODE_UTILISATEUR`),
  ADD KEY `fkhumeuremotion` (`CODE_EMOTION`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID_UTILISATEUR`),
  ADD UNIQUE KEY `NOM_UTILISATEUR` (`NOM_UTILISATEUR`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `emotion`
--
ALTER TABLE `emotion`
  MODIFY `ID_EMOTION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `humeur`
--
ALTER TABLE `humeur`
  MODIFY `ID_HUMEUR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID_UTILISATEUR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `humeur`
--
ALTER TABLE `humeur`
  ADD CONSTRAINT `fkhumeuremotion` FOREIGN KEY (`CODE_EMOTION`) REFERENCES `emotion` (`ID_EMOTION`),
  ADD CONSTRAINT `fkhumeurutilisateur` FOREIGN KEY (`CODE_UTILISATEUR`) REFERENCES `utilisateur` (`ID_UTILISATEUR`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
