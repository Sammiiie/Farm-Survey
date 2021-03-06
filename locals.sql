-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2021 at 12:23 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekanisy_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `locals`
--

CREATE TABLE `locals` (
  `local_id` int(11) NOT NULL,
  `state_id` varchar(40) NOT NULL,
  `local_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locals`
--

INSERT INTO `locals` (`local_id`, `state_id`, `local_name`) VALUES
(1, 'Abia State', 'Aba North'),
(2, 'Abia State', 'Aba South'),
(3, 'Abia State', 'Arochukwu'),
(4, 'Abia State', 'Bende'),
(5, 'Abia State', 'Ikwuano'),
(6, 'Abia State', 'Isiala Ngwa North'),
(7, 'Abia State', 'Isiala Ngwa South'),
(8, 'Abia State', 'Isuikwuato'),
(9, 'Abia State', 'Obi Ngwa'),
(10, 'Abia State', 'Ohafia'),
(11, 'Abia State', 'Osisioma'),
(12, 'Abia State', 'Ugwunagbo'),
(13, 'Abia State', 'Ukwa East'),
(14, 'Abia State', 'Ukwa West'),
(15, 'Abia State', 'Umuahia North'),
(16, 'Abia State', 'Umuahia South'),
(17, 'Abia State', 'Umu Nneochi'),
(18, 'Adamawa State', 'Demsa'),
(19, 'Adamawa State', 'Fufure'),
(20, 'Adamawa State', 'Ganye'),
(21, 'Adamawa State', 'Gayuk'),
(22, 'Adamawa State', 'Gombi'),
(23, 'Adamawa State', 'Grie'),
(24, 'Adamawa State', 'Hong'),
(25, 'Adamawa State', 'Jada'),
(26, 'Adamawa State', 'Lamurde'),
(27, 'Adamawa State', 'Madagali'),
(28, 'Adamawa State', 'Maiha'),
(29, 'Adamawa State', 'Mayo Belwa'),
(30, 'Adamawa State', 'Michika'),
(31, 'Adamawa State', 'Mubi North'),
(32, 'Adamawa State', 'Mubi South'),
(33, 'Adamawa State', 'Numan'),
(34, 'Adamawa State', 'Shelleng'),
(35, 'Adamawa State', 'Song'),
(36, 'Adamawa State', 'Toungo'),
(37, 'Adamawa State', 'Yola North'),
(38, 'Adamawa State', 'Yola South'),
(39, 'Akwa Ibom State', 'Abak'),
(40, 'Akwa Ibom State', 'Eastern Obolo'),
(41, 'Akwa Ibom State', 'Eket'),
(42, 'Akwa Ibom State', 'Esit Eket'),
(43, 'Akwa Ibom State', 'Essien Udim'),
(44, 'Akwa Ibom State', 'Etim Ekpo'),
(45, 'Akwa Ibom State', 'Etinan'),
(46, 'Akwa Ibom State', 'Ibeno'),
(47, 'Akwa Ibom State', 'Ibesikpo Asutan'),
(48, 'Akwa Ibom State', 'Ibiono-Ibom'),
(49, 'Akwa Ibom State', 'Ika'),
(50, 'Akwa Ibom State', 'Ikono'),
(51, 'Akwa Ibom State', 'Ikot Abasi'),
(52, 'Akwa Ibom State', 'Ikot Ekpene'),
(53, 'Akwa Ibom State', 'Ini'),
(54, 'Akwa Ibom State', 'Itu'),
(55, 'Akwa Ibom State', 'Mbo'),
(56, 'Akwa Ibom State', 'Mkpat-Enin'),
(57, 'Akwa Ibom State', 'Nsit-Atai'),
(58, 'Akwa Ibom State', 'Nsit-Ibom'),
(59, 'Akwa Ibom State', 'Nsit-Ubium'),
(60, 'Akwa Ibom State', 'Obot Akara'),
(61, 'Akwa Ibom State', 'Okobo'),
(62, 'Akwa Ibom State', 'Onna'),
(63, 'Akwa Ibom State', 'Oron'),
(64, 'Akwa Ibom State', 'Oruk Anam'),
(65, 'Akwa Ibom State', 'Udung-Uko'),
(66, 'Akwa Ibom State', 'Ukanafun'),
(67, 'Akwa Ibom State', 'Uruan'),
(68, 'Akwa Ibom State', 'Urue-Offong/Oruko'),
(69, 'Akwa Ibom State', 'Uyo'),
(70, 'Anambra State', 'Aguata'),
(71, 'Anambra State', 'Anambra East'),
(72, 'Anambra State', 'Anambra West'),
(73, 'Anambra State', 'Anaocha'),
(74, 'Anambra State', 'Awka North'),
(75, 'Anambra State', 'Awka South'),
(76, 'Anambra State', 'Ayamelum'),
(77, 'Anambra State', 'Dunukofia'),
(78, 'Anambra State', 'Ekwusigo'),
(79, 'Anambra State', 'Idemili North'),
(80, 'Anambra State', 'Idemili South'),
(81, 'Anambra State', 'Ihiala'),
(82, 'Anambra State', 'Njikoka'),
(83, 'Anambra State', 'Nnewi North'),
(84, 'Anambra State', 'Nnewi South'),
(85, 'Anambra State', 'Ogbaru'),
(86, 'Anambra State', 'Onitsha North'),
(87, 'Anambra State', 'Onitsha South'),
(88, 'Anambra State', 'Orumba North'),
(89, 'Anambra State', 'Orumba South'),
(90, 'Anambra State', 'Oyi'),
(91, 'Bauchi State', 'Alkaleri'),
(92, 'Bauchi State', 'Bauchi'),
(93, 'Bauchi State', 'Bogoro'),
(94, 'Bauchi State', 'Damban'),
(95, 'Bauchi State', 'Darazo'),
(96, 'Bauchi State', 'Dass'),
(97, 'Bauchi State', 'Gamawa'),
(98, 'Bauchi State', 'Ganjuwa'),
(99, 'Bauchi State', 'Giade'),
(100, 'Bauchi State', 'Itas/Gadau'),
(101, 'Bauchi State', 'Jama\'are'),
(102, 'Bauchi State', 'Katagum'),
(103, 'Bauchi State', 'Kirfi'),
(104, 'Bauchi State', 'Misau'),
(105, 'Bauchi State', 'Ningi'),
(106, 'Bauchi State', 'Shira'),
(107, 'Bauchi State', 'Tafawa Balewa'),
(108, 'Bauchi State', 'Toro'),
(109, 'Bauchi State', 'Warji'),
(110, 'Bauchi State', 'Zaki'),
(111, 'Bayelsa State', 'Brass'),
(112, 'Bayelsa State', 'Ekeremor'),
(113, 'Bayelsa State', 'Kolokuma/Opokuma'),
(114, 'Bayelsa State', 'Nembe'),
(115, 'Bayelsa State', 'Ogbia'),
(116, 'Bayelsa State', 'Sagbama'),
(117, 'Bayelsa State', 'Southern Ijaw'),
(118, 'Bayelsa State', 'Yenagoa'),
(119, 'Benue State', 'Agatu'),
(120, 'Benue State', 'Apa'),
(121, 'Benue State', 'Ado'),
(122, 'Benue State', 'Buruku'),
(123, 'Benue State', 'Gboko'),
(124, 'Benue State', 'Guma'),
(125, 'Benue State', 'Gwer East'),
(126, 'Benue State', 'Gwer West'),
(127, 'Benue State', 'Katsina-Ala'),
(128, 'Benue State', 'Konshisha'),
(129, 'Benue State', 'Kwande'),
(130, 'Benue State', 'Logo'),
(131, 'Benue State', 'Makurdi'),
(132, 'Benue State', 'Obi'),
(133, 'Benue State', 'Ogbadibo'),
(134, 'Benue State', 'Ohimini'),
(135, 'Benue State', 'Oju'),
(136, 'Benue State', 'Okpokwu'),
(137, 'Benue State', 'Oturkpo'),
(138, 'Benue State', 'Tarka'),
(139, 'Benue State', 'Ukum'),
(140, 'Benue State', 'Ushongo'),
(141, 'Benue State', 'Vandeikya'),
(142, 'Borno State', 'Abadam'),
(143, 'Borno State', 'Askira/Uba'),
(144, 'Borno State', 'Bama'),
(145, 'Borno State', 'Bayo'),
(146, 'Borno State', 'Biu'),
(147, 'Borno State', 'Chibok'),
(148, 'Borno State', 'Damboa'),
(149, 'Borno State', 'Dikwa'),
(150, 'Borno State', 'Gubio'),
(151, 'Borno State', 'Guzamala'),
(152, 'Borno State', 'Gwoza'),
(153, 'Borno State', 'Hawul'),
(154, 'Borno State', 'Jere'),
(155, 'Borno State', 'Kaga'),
(156, 'Borno State', 'Kala/Balge'),
(157, 'Borno State', 'Konduga'),
(158, 'Borno State', 'Kukawa'),
(159, 'Borno State', 'Kwaya Kusar'),
(160, 'Borno State', 'Mafa'),
(161, 'Borno State', 'Magumeri'),
(162, 'Borno State', 'Maiduguri'),
(163, 'Borno State', 'Marte'),
(164, 'Borno State', 'Mobbar'),
(165, 'Borno State', 'Monguno'),
(166, 'Borno State', 'Ngala'),
(167, 'Borno State', 'Nganzai'),
(168, 'Borno State', 'Shani'),
(169, 'Cross River State', 'Abi'),
(170, 'Cross River State', 'Akamkpa'),
(171, 'Cross River State', 'Akpabuyo'),
(172, 'Cross River State', 'Bakassi'),
(173, 'Cross River State', 'Bekwarra'),
(174, 'Cross River State', 'Biase'),
(175, 'Cross River State', 'Boki'),
(176, 'Cross River State', 'Calabar Municipal'),
(177, 'Cross River State', 'Calabar South'),
(178, 'Cross River State', 'Etung'),
(179, 'Cross River State', 'Ikom'),
(180, 'Cross River State', 'Obanliku'),
(181, 'Cross River State', 'Obubra'),
(182, 'Cross River State', 'Obudu'),
(183, 'Cross River State', 'Odukpani'),
(184, 'Cross River State', 'Ogoja'),
(185, 'Cross River State', 'Yakuur'),
(186, 'Cross River State', 'Yala'),
(187, 'Delta State', 'Aniocha North'),
(188, 'Delta State', 'Aniocha South'),
(189, 'Delta State', 'Bomadi'),
(190, 'Delta State', 'Burutu'),
(191, 'Delta State', 'Ethiope East'),
(192, 'Delta State', 'Ethiope West'),
(193, 'Delta State', 'Ika North East'),
(194, 'Delta State', 'Ika South'),
(195, 'Delta State', 'Isoko North'),
(196, 'Delta State', 'Isoko South'),
(197, 'Delta State', 'Ndokwa East'),
(198, 'Delta State', 'Ndokwa West'),
(199, 'Delta State', 'Okpe'),
(200, 'Delta State', 'Oshimili North'),
(201, 'Delta State', 'Oshimili South'),
(202, 'Delta State', 'Patani'),
(203, 'Delta State', 'Sapele'),
(204, 'Delta State', 'Udu'),
(205, 'Delta State', 'Ughelli North'),
(206, 'Delta State', 'Ughelli South'),
(207, 'Delta State', 'Ukwuani'),
(208, 'Delta State', 'Uvwie'),
(209, 'Delta State', 'Warri North'),
(210, 'Delta State', 'Warri South'),
(211, 'Delta State', 'Warri South West'),
(212, 'Ebonyi State', 'Abakaliki'),
(213, 'Ebonyi State', 'Afikpo North'),
(214, 'Ebonyi State', 'Afikpo South'),
(215, 'Ebonyi State', 'Ebonyi'),
(216, 'Ebonyi State', 'Ezza North'),
(217, 'Ebonyi State', 'Ezza South'),
(218, 'Ebonyi State', 'Ikwo'),
(219, 'Ebonyi State', 'Ishielu'),
(220, 'Ebonyi State', 'Ivo'),
(221, 'Ebonyi State', 'Izzi'),
(222, 'Ebonyi State', 'Ohaozara'),
(223, 'Ebonyi State', 'Ohaukwu'),
(224, 'Ebonyi State', 'Onicha'),
(225, 'Edo State', 'Akoko-Edo'),
(226, 'Edo State', 'Egor'),
(227, 'Edo State', 'Esan Central'),
(228, 'Edo State', 'Esan North-East'),
(229, 'Edo State', 'Esan South-East'),
(230, 'Edo State', 'Esan West'),
(231, 'Edo State', 'Etsako Central'),
(232, 'Edo State', 'Etsako East'),
(233, 'Edo State', 'Etsako West'),
(234, 'Edo State', 'Igueben'),
(235, 'Edo State', 'Ikpoba Okha'),
(236, 'Edo State', 'Orhionmwon'),
(237, 'Edo State', 'Oredo'),
(238, 'Edo State', 'Ovia North-East'),
(239, 'Edo State', 'Ovia South-West'),
(240, 'Edo State', 'Owan East'),
(241, 'Edo State', 'Owan West'),
(242, 'Edo State', 'Uhunmwonde'),
(243, 'Ekiti State', 'Ado Ekiti'),
(244, 'Ekiti State', 'Efon'),
(245, 'Ekiti State', 'Ekiti East'),
(246, 'Ekiti State', 'Ekiti South-West'),
(247, 'Ekiti State', 'Ekiti West'),
(248, 'Ekiti State', 'Emure'),
(249, 'Ekiti State', 'Gbonyin'),
(250, 'Ekiti State', 'Ido Osi'),
(251, 'Ekiti State', 'Ijero'),
(252, 'Ekiti State', 'Ikere'),
(253, 'Ekiti State', 'Ikole'),
(254, 'Ekiti State', 'Ilejemeje'),
(255, 'Ekiti State', 'Irepodun/Ifelodun'),
(256, 'Ekiti State', 'Ise/Orun'),
(257, 'Ekiti State', 'Moba'),
(258, 'Ekiti State', 'Oye'),
(259, 'Enugu State', 'Aninri'),
(260, 'Enugu State', 'Awgu'),
(261, 'Enugu State', 'Enugu East'),
(262, 'Enugu State', 'Enugu North'),
(263, 'Enugu State', 'Enugu South'),
(264, 'Enugu State', 'Ezeagu'),
(265, 'Enugu State', 'Igbo Etiti'),
(266, 'Enugu State', 'Igbo Eze North'),
(267, 'Enugu State', 'Igbo Eze South'),
(268, 'Enugu State', 'Isi Uzo'),
(269, 'Enugu State', 'Nkanu East'),
(270, 'Enugu State', 'Nkanu West'),
(271, 'Enugu State', 'Nsukka'),
(272, 'Enugu State', 'Oji River'),
(273, 'Enugu State', 'Udenu'),
(274, 'Enugu State', 'Udi'),
(275, 'Enugu State', 'Uzo Uwani'),
(276, 'FCT', 'Abaji'),
(277, 'FCT', 'Bwari'),
(278, 'FCT', 'Gwagwalada'),
(279, 'FCT', 'Kuje'),
(280, 'FCT', 'Kwali'),
(281, 'FCT', 'Municipal Area Council'),
(282, 'Gombe State', 'Akko'),
(283, 'Gombe State', 'Balanga'),
(284, 'Gombe State', 'Billiri'),
(285, 'Gombe State', 'Dukku'),
(286, 'Gombe State', 'Funakaye'),
(287, 'Gombe State', 'Gombe'),
(288, 'Gombe State', 'Kaltungo'),
(289, 'Gombe State', 'Kwami'),
(290, 'Gombe State', 'Nafada'),
(291, 'Gombe State', 'Shongom'),
(292, 'Gombe State', 'Yamaltu/Deba'),
(293, 'Imo State', 'Aboh Mbaise'),
(294, 'Imo State', 'Ahiazu Mbaise'),
(295, 'Imo State', 'Ehime Mbano'),
(296, 'Imo State', 'Ezinihitte'),
(297, 'Imo State', 'Ideato North'),
(298, 'Imo State', 'Ideato South'),
(299, 'Imo State', 'Ihitte/Uboma'),
(300, 'Imo State', 'Ikeduru'),
(301, 'Imo State', 'Isiala Mbano'),
(302, 'Imo State', 'Isu'),
(303, 'Imo State', 'Mbaitoli'),
(304, 'Imo State', 'Ngor Okpala'),
(305, 'Imo State', 'Njaba'),
(306, 'Imo State', 'Nkwerre'),
(307, 'Imo State', 'Nwangele'),
(308, 'Imo State', 'Obowo'),
(309, 'Imo State', 'Oguta'),
(310, 'Imo State', 'Ohaji/Egbema'),
(311, 'Imo State', 'Okigwe'),
(312, 'Imo State', 'Orlu'),
(313, 'Imo State', 'Orsu'),
(314, 'Imo State', 'Oru East'),
(315, 'Imo State', 'Oru West'),
(316, 'Imo State', 'Owerri Municipal'),
(317, 'Imo State', 'Owerri North'),
(318, 'Imo State', 'Owerri West'),
(319, 'Imo State', 'Unuimo'),
(320, 'Jigawa State', 'Auyo'),
(321, 'Jigawa State', 'Babura'),
(322, 'Jigawa State', 'Biriniwa'),
(323, 'Jigawa State', 'Birnin Kudu'),
(324, 'Jigawa State', 'Buji'),
(325, 'Jigawa State', 'Dutse'),
(326, 'Jigawa State', 'Gagarawa'),
(327, 'Jigawa State', 'Garki'),
(328, 'Jigawa State', 'Gumel'),
(329, 'Jigawa State', 'Guri'),
(330, 'Jigawa State', 'Gwaram'),
(331, 'Jigawa State', 'Gwiwa'),
(332, 'Jigawa State', 'Hadejia'),
(333, 'Jigawa State', 'Jahun'),
(334, 'Jigawa State', 'Kafin Hausa'),
(335, 'Jigawa State', 'Kazaure'),
(336, 'Jigawa State', 'Kiri Kasama'),
(337, 'Jigawa State', 'Kiyawa'),
(338, 'Jigawa State', 'Kaugama'),
(339, 'Jigawa State', 'Maigatari'),
(340, 'Jigawa State', 'Malam Madori'),
(341, 'Jigawa State', 'Miga'),
(342, 'Jigawa State', 'Ringim'),
(343, 'Jigawa State', 'Roni'),
(344, 'Jigawa State', 'Sule Tankarkar'),
(345, 'Jigawa State', 'Taura'),
(346, 'Jigawa State', 'Yankwashi'),
(347, 'Kaduna State', 'Birnin Gwari'),
(348, 'Kaduna State', 'Chikun'),
(349, 'Kaduna State', 'Giwa'),
(350, 'Kaduna State', 'Igabi'),
(351, 'Kaduna State', 'Ikara'),
(352, 'Kaduna State', 'Jaba'),
(353, 'Kaduna State', 'Jema\'a'),
(354, 'Kaduna State', 'Kachia'),
(355, 'Kaduna State', 'Kaduna North'),
(356, 'Kaduna State', 'Kaduna South'),
(357, 'Kaduna State', 'Kagarko'),
(358, 'Kaduna State', 'Kajuru'),
(359, 'Kaduna State', 'Kaura'),
(360, 'Kaduna State', 'Kauru'),
(361, 'Kaduna State', 'Kubau'),
(362, 'Kaduna State', 'Kudan'),
(363, 'Kaduna State', 'Lere'),
(364, 'Kaduna State', 'Makarfi'),
(365, 'Kaduna State', 'Sabon Gari'),
(366, 'Kaduna State', 'Sanga'),
(367, 'Kaduna State', 'Soba'),
(368, 'Kaduna State', 'Zangon Kataf'),
(369, 'Kaduna State', 'Zaria'),
(370, 'Kano State', 'Ajingi'),
(371, 'Kano State', 'Albasu'),
(372, 'Kano State', 'Bagwai'),
(373, 'Kano State', 'Bebeji'),
(374, 'Kano State', 'Bichi'),
(375, 'Kano State', 'Bunkure'),
(376, 'Kano State', 'Dala'),
(377, 'Kano State', 'Dambatta'),
(378, 'Kano State', 'Dawakin Kudu'),
(379, 'Kano State', 'Dawakin Tofa'),
(380, 'Kano State', 'Doguwa'),
(381, 'Kano State', 'Fagge'),
(382, 'Kano State', 'Gabasawa'),
(383, 'Kano State', 'Garko'),
(384, 'Kano State', 'Garun Mallam'),
(385, 'Kano State', 'Gaya'),
(386, 'Kano State', 'Gezawa'),
(387, 'Kano State', 'Gwale'),
(388, 'Kano State', 'Gwarzo'),
(389, 'Kano State', 'Kabo'),
(390, 'Kano State', 'Kano Municipal'),
(391, 'Kano State', 'Karaye'),
(392, 'Kano State', 'Kibiya'),
(393, 'Kano State', 'Kiru'),
(394, 'Kano State', 'Kumbotso'),
(395, 'Kano State', 'Kunchi'),
(396, 'Kano State', 'Kura'),
(397, 'Kano State', 'Madobi'),
(398, 'Kano State', 'Makoda'),
(399, 'Kano State', 'Minjibir'),
(400, 'Kano State', 'Nasarawa'),
(401, 'Kano State', 'Rano'),
(402, 'Kano State', 'Rimin Gado'),
(403, 'Kano State', 'Rogo'),
(404, 'Kano State', 'Shanono'),
(405, 'Kano State', 'Sumaila'),
(406, 'Kano State', 'Takai'),
(407, 'Kano State', 'Tarauni'),
(408, 'Kano State', 'Tofa'),
(409, 'Kano State', 'Tsanyawa'),
(410, 'Kano State', 'Tudun Wada'),
(411, 'Kano State', 'Ungogo'),
(412, 'Kano State', 'Warawa'),
(413, 'Kano State', 'Wudil'),
(414, 'Katsina State', 'Bakori'),
(415, 'Katsina State', 'Batagarawa'),
(416, 'Katsina State', 'Batsari'),
(417, 'Katsina State', 'Baure'),
(418, 'Katsina State', 'Bindawa'),
(419, 'Katsina State', 'Charanchi'),
(420, 'Katsina State', 'Dandume'),
(421, 'Katsina State', 'Danja'),
(422, 'Katsina State', 'Dan Musa'),
(423, 'Katsina State', 'Daura'),
(424, 'Katsina State', 'Dutsi'),
(425, 'Katsina State', 'Dutsin Ma'),
(426, 'Katsina State', 'Faskari'),
(427, 'Katsina State', 'Funtua'),
(428, 'Katsina State', 'Ingawa'),
(429, 'Katsina State', 'Jibia'),
(430, 'Katsina State', 'Kafur'),
(431, 'Katsina State', 'Kaita'),
(432, 'Katsina State', 'Kankara'),
(433, 'Katsina State', 'Kankia'),
(434, 'Katsina State', 'Katsina'),
(435, 'Katsina State', 'Kurfi'),
(436, 'Katsina State', 'Kusada'),
(437, 'Katsina State', 'Mai\'Adua'),
(438, 'Katsina State', 'Malumfashi'),
(439, 'Katsina State', 'Mani'),
(440, 'Katsina State', 'Mashi'),
(441, 'Katsina State', 'Matazu'),
(442, 'Katsina State', 'Musawa'),
(443, 'Katsina State', 'Rimi'),
(444, 'Katsina State', 'Sabuwa'),
(445, 'Katsina State', 'Safana'),
(446, 'Katsina State', 'Sandamu'),
(447, 'Katsina State', 'Zango'),
(448, 'Kebbi State', 'Aleiro'),
(449, 'Kebbi State', 'Arewa Dandi'),
(450, 'Kebbi State', 'Argungu'),
(451, 'Kebbi State', 'Augie'),
(452, 'Kebbi State', 'Bagudo'),
(453, 'Kebbi State', 'Birnin Kebbi'),
(454, 'Kebbi State', 'Bunza'),
(455, 'Kebbi State', 'Dandi'),
(456, 'Kebbi State', 'Fakai'),
(457, 'Kebbi State', 'Gwandu'),
(458, 'Kebbi State', 'Jega'),
(459, 'Kebbi State', 'Kalgo'),
(460, 'Kebbi State', 'Koko/Besse'),
(461, 'Kebbi State', 'Maiyama'),
(462, 'Kebbi State', 'Ngaski'),
(463, 'Kebbi State', 'Sakaba'),
(464, 'Kebbi State', 'Shanga'),
(465, 'Kebbi State', 'Suru'),
(466, 'Kebbi State', 'Wasagu/Danko'),
(467, 'Kebbi State', 'Yauri'),
(468, 'Kebbi State', 'Zuru'),
(469, 'Kogi State', 'Adavi'),
(470, 'Kogi State', 'Ajaokuta'),
(471, 'Kogi State', 'Ankpa'),
(472, 'Kogi State', 'Bassa'),
(473, 'Kogi State', 'Dekina'),
(474, 'Kogi State', 'Ibaji'),
(475, 'Kogi State', 'Idah'),
(476, 'Kogi State', 'Igalamela Odolu'),
(477, 'Kogi State', 'Ijumu'),
(478, 'Kogi State', 'Kabba/Bunu'),
(479, 'Kogi State', 'Kogi'),
(480, 'Kogi State', 'Lokoja'),
(481, 'Kogi State', 'Mopa Muro'),
(482, 'Kogi State', 'Ofu'),
(483, 'Kogi State', 'Ogori/Magongo'),
(484, 'Kogi State', 'Okehi'),
(485, 'Kogi State', 'Okene'),
(486, 'Kogi State', 'Olamaboro'),
(487, 'Kogi State', 'Omala'),
(488, 'Kogi State', 'Yagba East'),
(489, 'Kogi State', 'Yagba West'),
(490, 'Kwara State', 'Asa'),
(491, 'Kwara State', 'Baruten'),
(492, 'Kwara State', 'Edu'),
(493, 'Kwara State', 'Ekiti'),
(494, 'Kwara State', 'Ifelodun'),
(495, 'Kwara State', 'Ilorin East'),
(496, 'Kwara State', 'Ilorin South'),
(497, 'Kwara State', 'Ilorin West'),
(498, 'Kwara State', 'Irepodun'),
(499, 'Kwara State', 'Isin'),
(500, 'Kwara State', 'Kaiama'),
(501, 'Kwara State', 'Moro'),
(502, 'Kwara State', 'Offa'),
(503, 'Kwara State', 'Oke Ero'),
(504, 'Kwara State', 'Oyun'),
(505, 'Kwara State', 'Pategi'),
(506, 'Lagos State', 'Agege'),
(507, 'Lagos State', 'Ajeromi-Ifelodun'),
(508, 'Lagos State', 'Alimosho'),
(509, 'Lagos State', 'Amuwo-Odofin'),
(510, 'Lagos State', 'Apapa'),
(511, 'Lagos State', 'Badagry'),
(512, 'Lagos State', 'Epe'),
(513, 'Lagos State', 'Eti Osa'),
(514, 'Lagos State', 'Ibeju-Lekki'),
(515, 'Lagos State', 'Ifako-Ijaiye'),
(516, 'Lagos State', 'Ikeja'),
(517, 'Lagos State', 'Ikorodu'),
(518, 'Lagos State', 'Kosofe'),
(519, 'Lagos State', 'Lagos Island'),
(520, 'Lagos State', 'Lagos Mainland'),
(521, 'Lagos State', 'Mushin'),
(522, 'Lagos State', 'Ojo'),
(523, 'Lagos State', 'Oshodi-Isolo'),
(524, 'Lagos State', 'Shomolu'),
(525, 'Lagos State', 'Surulere'),
(526, 'Nasarawa State', 'Akwanga'),
(527, 'Nasarawa State', 'Awe'),
(528, 'Nasarawa State', 'Doma'),
(529, 'Nasarawa State', 'Karu'),
(530, 'Nasarawa State', 'Keana'),
(531, 'Nasarawa State', 'Keffi'),
(532, 'Nasarawa State', 'Kokona'),
(533, 'Nasarawa State', 'Lafia'),
(534, 'Nasarawa State', 'Nasarawa'),
(535, 'Nasarawa State', 'Nasarawa Egon'),
(536, 'Nasarawa State', 'Obi'),
(537, 'Nasarawa State', 'Toto'),
(538, 'Nasarawa State', 'Wamba'),
(539, 'Niger State', 'Agaie'),
(540, 'Niger State', 'Agwara'),
(541, 'Niger State', 'Bida'),
(542, 'Niger State', 'Borgu'),
(543, 'Niger State', 'Bosso'),
(544, 'Niger State', 'Chanchaga'),
(545, 'Niger State', 'Edati'),
(546, 'Niger State', 'Gbako'),
(547, 'Niger State', 'Gurara'),
(548, 'Niger State', 'Katcha'),
(549, 'Niger State', 'Kontagora'),
(550, 'Niger State', 'Lapai'),
(551, 'Niger State', 'Lavun'),
(552, 'Niger State', 'Magama'),
(553, 'Niger State', 'Mariga'),
(554, 'Niger State', 'Mashegu'),
(555, 'Niger State', 'Mokwa'),
(556, 'Niger State', 'Moya'),
(557, 'Niger State', 'Paikoro'),
(558, 'Niger State', 'Rafi'),
(559, 'Niger State', 'Rijau'),
(560, 'Niger State', 'Shiroro'),
(561, 'Niger State', 'Suleja'),
(562, 'Niger State', 'Tafa'),
(563, 'Niger State', 'Wushishi'),
(564, 'Ogun State', 'Abeokuta North'),
(565, 'Ogun State', 'Abeokuta South'),
(566, 'Ogun State', 'Ado-Odo/Ota'),
(567, 'Ogun State', 'Egbado North'),
(568, 'Ogun State', 'Egbado South'),
(569, 'Ogun State', 'Ewekoro'),
(570, 'Ogun State', 'Ifo'),
(571, 'Ogun State', 'Ijebu East'),
(572, 'Ogun State', 'Ijebu North'),
(573, 'Ogun State', 'Ijebu North East'),
(574, 'Ogun State', 'Ijebu Ode'),
(575, 'Ogun State', 'Ikenne'),
(576, 'Ogun State', 'Imeko Afon'),
(577, 'Ogun State', 'Ipokia'),
(578, 'Ogun State', 'Obafemi Owode'),
(579, 'Ogun State', 'Odeda'),
(580, 'Ogun State', 'Odogbolu'),
(581, 'Ogun State', 'Ogun Waterside'),
(582, 'Ogun State', 'Remo North'),
(583, 'Ogun State', 'Shagamu'),
(584, 'Ondo State', 'Akoko North-East'),
(585, 'Ondo State', 'Akoko North-West'),
(586, 'Ondo State', 'Akoko South-West'),
(587, 'Ondo State', 'Akoko South-East'),
(588, 'Ondo State', 'Akure North'),
(589, 'Ondo State', 'Akure South'),
(590, 'Ondo State', 'Ese Odo'),
(591, 'Ondo State', 'Idanre'),
(592, 'Ondo State', 'Ifedore'),
(593, 'Ondo State', 'Ilaje'),
(594, 'Ondo State', 'Ile Oluji/Okeigbo'),
(595, 'Ondo State', 'Irele'),
(596, 'Ondo State', 'Odigbo'),
(597, 'Ondo State', 'Okitipupa'),
(598, 'Ondo State', 'Ondo East'),
(599, 'Ondo State', 'Ondo West'),
(600, 'Ondo State', 'Ose'),
(601, 'Ondo State', 'Owo'),
(602, 'Osun State', 'Atakunmosa East'),
(603, 'Osun State', 'Atakunmosa West'),
(604, 'Osun State', 'Aiyedaade'),
(605, 'Osun State', 'Aiyedire'),
(606, 'Osun State', 'Boluwaduro'),
(607, 'Osun State', 'Boripe'),
(608, 'Osun State', 'Ede North'),
(609, 'Osun State', 'Ede South'),
(610, 'Osun State', 'Ife Central'),
(611, 'Osun State', 'Ife East'),
(612, 'Osun State', 'Ife North'),
(613, 'Osun State', 'Ife South'),
(614, 'Osun State', 'Egbedore'),
(615, 'Osun State', 'Ejigbo'),
(616, 'Osun State', 'Ifedayo'),
(617, 'Osun State', 'Ifelodun'),
(618, 'Osun State', 'Ila'),
(619, 'Osun State', 'Ilesa East'),
(620, 'Osun State', 'Ilesa West'),
(621, 'Osun State', 'Irepodun'),
(622, 'Osun State', 'Irewole'),
(623, 'Osun State', 'Isokan'),
(624, 'Osun State', 'Iwo'),
(625, 'Osun State', 'Obokun'),
(626, 'Osun State', 'Odo Otin'),
(627, 'Osun State', 'Ola Oluwa'),
(628, 'Osun State', 'Olorunda'),
(629, 'Osun State', 'Oriade'),
(630, 'Osun State', 'Orolu'),
(631, 'Osun State', 'Osogbo'),
(632, 'Oyo State', 'Afijio'),
(633, 'Oyo State', 'Akinyele'),
(634, 'Oyo State', 'Atiba'),
(635, 'Oyo State', 'Atisbo'),
(636, 'Oyo State', 'Egbeda'),
(637, 'Oyo State', 'Ibadan North'),
(638, 'Oyo State', 'Ibadan North-East'),
(639, 'Oyo State', 'Ibadan North-West'),
(640, 'Oyo State', 'Ibadan South-East'),
(641, 'Oyo State', 'Ibadan South-West'),
(642, 'Oyo State', 'Ibarapa Central'),
(643, 'Oyo State', 'Ibarapa East'),
(644, 'Oyo State', 'Ibarapa North'),
(645, 'Oyo State', 'Ido'),
(646, 'Oyo State', 'Irepo'),
(647, 'Oyo State', 'Iseyin'),
(648, 'Oyo State', 'Itesiwaju'),
(649, 'Oyo State', 'Iwajowa'),
(650, 'Oyo State', 'Kajola'),
(651, 'Oyo State', 'Lagelu'),
(652, 'Oyo State', 'Ogbomosho North'),
(653, 'Oyo State', 'Ogbomosho South'),
(654, 'Oyo State', 'Ogo Oluwa'),
(655, 'Oyo State', 'Olorunsogo'),
(656, 'Oyo State', 'Oluyole'),
(657, 'Oyo State', 'Ona Ara'),
(658, 'Oyo State', 'Orelope'),
(659, 'Oyo State', 'Ori Ire'),
(660, 'Oyo State', 'Oyo'),
(661, 'Oyo State', 'Oyo East'),
(662, 'Oyo State', 'Saki East'),
(663, 'Oyo State', 'Saki West'),
(664, 'Oyo State', 'Surulere'),
(665, 'Plateau State', 'Bokkos'),
(666, 'Plateau State', 'Barkin Ladi'),
(667, 'Plateau State', 'Bassa'),
(668, 'Plateau State', 'Jos East'),
(669, 'Plateau State', 'Jos North'),
(670, 'Plateau State', 'Jos South'),
(671, 'Plateau State', 'Kanam'),
(672, 'Plateau State', 'Kanke'),
(673, 'Plateau State', 'Langtang South'),
(674, 'Plateau State', 'Langtang North'),
(675, 'Plateau State', 'Mangu'),
(676, 'Plateau State', 'Mikang'),
(677, 'Plateau State', 'Pankshin'),
(678, 'Plateau State', 'Qua\'an Pan'),
(679, 'Plateau State', 'Riyom'),
(680, 'Plateau State', 'Shendam'),
(681, 'Plateau State', 'Wase'),
(682, 'Rivers State', 'Abua/Odual'),
(683, 'Rivers State', 'Ahoada East'),
(684, 'Rivers State', 'Ahoada West'),
(685, 'Rivers State', 'Akuku-Toru'),
(686, 'Rivers State', 'Andoni'),
(687, 'Rivers State', 'Asari-Toru'),
(688, 'Rivers State', 'Bonny'),
(689, 'Rivers State', 'Degema'),
(690, 'Rivers State', 'Eleme'),
(691, 'Rivers State', 'Emuoha'),
(692, 'Rivers State', 'Etche'),
(693, 'Rivers State', 'Gokana'),
(694, 'Rivers State', 'Ikwerre'),
(695, 'Rivers State', 'Khana'),
(696, 'Rivers State', 'Obio/Akpor'),
(697, 'Rivers State', 'Ogba/Egbema/Ndoni'),
(698, 'Rivers State', 'Ogu/Bolo'),
(699, 'Rivers State', 'Okrika'),
(700, 'Rivers State', 'Omuma'),
(701, 'Rivers State', 'Opobo/Nkoro'),
(702, 'Rivers State', 'Oyigbo'),
(703, 'Rivers State', 'Port Harcourt'),
(704, 'Rivers State', 'Tai'),
(705, 'Sokoto State', 'Binji'),
(706, 'Sokoto State', 'Bodinga'),
(707, 'Sokoto State', 'Dange Shuni'),
(708, 'Sokoto State', 'Gada'),
(709, 'Sokoto State', 'Goronyo'),
(710, 'Sokoto State', 'Gudu'),
(711, 'Sokoto State', 'Gwadabawa'),
(712, 'Sokoto State', 'Illela'),
(713, 'Sokoto State', 'Isa'),
(714, 'Sokoto State', 'Kebbe'),
(715, 'Sokoto State', 'Kware'),
(716, 'Sokoto State', 'Rabah'),
(717, 'Sokoto State', 'Sabon Birni'),
(718, 'Sokoto State', 'Shagari'),
(719, 'Sokoto State', 'Silame'),
(720, 'Sokoto State', 'Sokoto North'),
(721, 'Sokoto State', 'Sokoto South'),
(722, 'Sokoto State', 'Tambuwal'),
(723, 'Sokoto State', 'Tangaza'),
(724, 'Sokoto State', 'Tureta'),
(725, 'Sokoto State', 'Wamako'),
(726, 'Sokoto State', 'Wurno'),
(727, 'Sokoto State', 'Yabo'),
(728, 'Taraba State', 'Ardo Kola'),
(729, 'Taraba State', 'Bali'),
(730, 'Taraba State', 'Donga'),
(731, 'Taraba State', 'Gashaka'),
(732, 'Taraba State', 'Gassol'),
(733, 'Taraba State', 'Ibi'),
(734, 'Taraba State', 'Jalingo'),
(735, 'Taraba State', 'Karim Lamido'),
(736, 'Taraba State', 'Kumi'),
(737, 'Taraba State', 'Lau'),
(738, 'Taraba State', 'Sardauna'),
(739, 'Taraba State', 'Takum'),
(740, 'Taraba State', 'Ussa'),
(741, 'Taraba State', 'Wukari'),
(742, 'Taraba State', 'Yorro'),
(743, 'Taraba State', 'Zing'),
(744, 'Yobe State', 'Bade'),
(745, 'Yobe State', 'Bursari'),
(746, 'Yobe State', 'Damaturu'),
(747, 'Yobe State', 'Fika'),
(748, 'Yobe State', 'Fune'),
(749, 'Yobe State', 'Geidam'),
(750, 'Yobe State', 'Gujba'),
(751, 'Yobe State', 'Gulani'),
(752, 'Yobe State', 'Jakusko'),
(753, 'Yobe State', 'Karasuwa'),
(754, 'Yobe State', 'Machina'),
(755, 'Yobe State', 'Nangere'),
(756, 'Yobe State', 'Nguru'),
(757, 'Yobe State', 'Potiskum'),
(758, 'Yobe State', 'Tarmuwa'),
(759, 'Yobe State', 'Yunusari'),
(760, 'Yobe State', 'Yusufari'),
(761, 'Zamfara State', 'Anka'),
(762, 'Zamfara State', 'Bakura'),
(763, 'Zamfara State', 'Birnin Magaji/Kiyaw'),
(764, 'Zamfara State', 'Bukkuyum'),
(765, 'Zamfara State', 'Bungudu'),
(766, 'Zamfara State', 'Gummi'),
(767, 'Zamfara State', 'Gusau'),
(768, 'Zamfara State', 'Kaura Namoda'),
(769, 'Zamfara State', 'Maradun'),
(770, 'Zamfara State', 'Maru'),
(771, 'Zamfara State', 'Shinkafi'),
(772, 'Zamfara State', 'Talata Mafara'),
(773, 'Zamfara State', 'Chafe'),
(774, 'Zamfara State', 'Zurmi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locals`
--
ALTER TABLE `locals`
  ADD PRIMARY KEY (`local_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
