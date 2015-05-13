-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2015 at 11:33 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gotasku`
--
SET foreign_key_checks = 0;
-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
`id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `wrkr_id` int(11) NOT NULL,
  `appl_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_selected` tinyint(1) DEFAULT '0',
  `wrkr_comments` text,
  `emplyr_comments` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `business_types`
--

DROP TABLE IF EXISTS `business_types`;
CREATE TABLE IF NOT EXISTS `business_types` (
`id` int(11) NOT NULL,
  `type_nm` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `business_types`
--

INSERT INTO `business_types` (`id`, `type_nm`) VALUES
(1, 'Restaurant'),
(2, 'Retailer');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
`id` int(11) NOT NULL,
  `stt_id` int(11) DEFAULT NULL,
  `ct_nm` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `stt_id`, `ct_nm`) VALUES
(1, 1, 'BENGALURU');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
`id` int(11) NOT NULL,
  `country_nm` varchar(100) DEFAULT NULL,
  `iso2` varchar(2) DEFAULT NULL,
  `iso3` varchar(3) DEFAULT NULL,
  `isd_prefix` varchar(3) DEFAULT NULL,
  `localization_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_nm`, `iso2`, `iso3`, `isd_prefix`, `localization_code`) VALUES
(1, 'INDIA', 'IN', 'IND', '91', 'IN-in');

-- --------------------------------------------------------

--
-- Table structure for table `cv`
--

DROP TABLE IF EXISTS `cv`;
CREATE TABLE IF NOT EXISTS `cv` (
  `id` int(11) NOT NULL,
  `wrkr_id` int(11) NOT NULL,
  `cv_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

DROP TABLE IF EXISTS `education`;
CREATE TABLE IF NOT EXISTS `education` (
`id` int(11) NOT NULL,
  `wrkr_id` int(11) DEFAULT NULL,
  `edctn_type_id` int(11) DEFAULT NULL,
  `degree` varchar(200) DEFAULT NULL,
  `university` varchar(100) DEFAULT NULL,
  `institution` varchar(100) DEFAULT NULL,
  `from_yr` int(11) DEFAULT NULL,
  `to_yr` int(11) DEFAULT NULL,
  `result` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `education_types`
--

DROP TABLE IF EXISTS `education_types`;
CREATE TABLE IF NOT EXISTS `education_types` (
`id` int(11) NOT NULL,
  `type_nm` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `education_types`
--

INSERT INTO `education_types` (`id`, `type_nm`) VALUES
(1, 'Graduate'),
(2, 'Post Graduate'),
(3, 'Masters In Business Administration'),
(4, 'Any Other Masters Degree'),
(5, 'Under Graduate'),
(6, 'High School'),
(7, 'School'),
(8, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `employer_details`
--

DROP TABLE IF EXISTS `employer_details`;
CREATE TABLE IF NOT EXISTS `employer_details` (
`id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `bsnss_nm` varchar(200) DEFAULT NULL,
  `profile_pic` text NOT NULL,
  `business_type` int(11) NOT NULL,
  `cntct_addr` text,
  `cntr_id` int(11) DEFAULT NULL,
  `stt_id` int(11) DEFAULT NULL,
  `ct_id` int(11) DEFAULT NULL,
  `pstl_cd` varchar(15) DEFAULT NULL,
  `web_site` varchar(200) NOT NULL,
  `cntct_prsn_lnm` varchar(100) DEFAULT NULL,
  `cntct_prsn_fnm` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `cntct_num1` varchar(20) NOT NULL,
  `cntct_num2` varchar(20) DEFAULT NULL,
  `email1` varchar(100) NOT NULL,
  `email2` varchar(100) DEFAULT NULL,
  `comp_desc` text NOT NULL,
  `same_billing_addr` tinyint(1) NOT NULL DEFAULT '0',
  `billing_addr` varchar(255) NOT NULL,
  `billing_name` varchar(255) NOT NULL,
  `billing_pstl_cd` varchar(15) NOT NULL,
  `billing_email` varchar(255) NOT NULL,
  `org_logo` varchar(200) NOT NULL,
  `bill_by_email` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `employer_details`
--

INSERT INTO `employer_details` (`id`, `usr_id`, `bsnss_nm`, `profile_pic`, `business_type`, `cntct_addr`, `cntr_id`, `stt_id`, `ct_id`, `pstl_cd`, `web_site`, `cntct_prsn_lnm`, `cntct_prsn_fnm`, `role`, `cntct_num1`, `cntct_num2`, `email1`, `email2`, `comp_desc`, `same_billing_addr`, `billing_addr`, `billing_name`, `billing_pstl_cd`, `billing_email`, `org_logo`, `bill_by_email`) VALUES
(1, 1, 'ajsdhf', '', 2, 'ahsgdkfhgak', NULL, NULL, NULL, '6234786', 'www.google.com', 'Jakku', 'Aku', 0, '6253645273', '648363785', 'aku@foundza.com', NULL, 'sjh dfghsjdhfgh skd kdhgfhksdh gfsdhfg sjdfhg sdfhkgjsdh fkjg sjdjhfghklsdflghsdjf jg skjdfhgjs hdjlfh l gsjdsdfgsdfgas dfasdf sdlfhg', 1, 'ahsgdkfhgak', 'ajsdhf', '6234786', 'aku@foundza.com', '', 1),
(2, 2, NULL, '', 0, NULL, NULL, NULL, NULL, NULL, '', 'Pvt. Ltd.', 'NSI India', 0, '9966498968', NULL, 'nsi@live.com', NULL, '', 0, '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employer_ratings`
--

DROP TABLE IF EXISTS `employer_ratings`;
CREATE TABLE IF NOT EXISTS `employer_ratings` (
`id` int(11) NOT NULL,
  `emplyr_id` int(11) DEFAULT NULL,
  `usr_id` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `comment` text,
  `dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
`id` int(11) NOT NULL,
  `job_type_id` int(11) DEFAULT NULL,
  `emplyr_id` int(11) DEFAULT NULL,
  `pay_mode_id` int(11) DEFAULT NULL,
  `job_ttl` varchar(100) DEFAULT NULL,
  `resp` text NOT NULL COMMENT 'responsibilities field from the form',
  `job_desc_sort` varchar(255) DEFAULT NULL,
  `job_desc_long` text,
  `strt_dt` date DEFAULT NULL,
  `end_dt` date DEFAULT NULL,
  `min_pay` decimal(6,2) DEFAULT NULL COMMENT 'this column is used to store the amount employee supposed to get',
  `max_pay` decimal(6,2) DEFAULT NULL COMMENT 'this column is used to store the amount the employer supposed to give including all the charges and taxes ',
  `shift_charges` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  `last_dt_appl` date DEFAULT NULL,
  `job_st_time` varchar(20) DEFAULT NULL,
  `job_end_time` varchar(20) DEFAULT NULL,
  `othr_org_nm` varchar(200) DEFAULT NULL,
  `othr_org_bsnss` int(11) DEFAULT NULL,
  `othr_org_addr` text,
  `othr_org_pstl_cd` varchar(10) DEFAULT NULL,
  `othr_org_phone` varchar(25) DEFAULT NULL,
  `othr_org_website` varchar(200) DEFAULT NULL,
  `is_othr_org` tinyint(1) NOT NULL DEFAULT '0',
  `posted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_type_id`, `emplyr_id`, `pay_mode_id`, `job_ttl`, `resp`, `job_desc_sort`, `job_desc_long`, `strt_dt`, `end_dt`, `min_pay`, `max_pay`, `shift_charges`, `is_active`, `last_dt_appl`, `job_st_time`, `job_end_time`, `othr_org_nm`, `othr_org_bsnss`, `othr_org_addr`, `othr_org_pstl_cd`, `othr_org_phone`, `othr_org_website`, `is_othr_org`, `posted_on`) VALUES
(1, 1, 1, 1, 'sdfgsdfgsdfg', 'asdfasdf asdfasdfasdf a', '', 'asdfasdf asdfasdfasdf a', '2015-05-14', '2015-05-22', '5.50', '5.60', 1, 1, '2015-05-22', '', '', 'asjdhfkjasdj', 2, 'weasdfasdfasdf', '234234', '32452345', 'www.google.com', 1, '2015-05-13 09:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `job_ratings`
--

DROP TABLE IF EXISTS `job_ratings`;
CREATE TABLE IF NOT EXISTS `job_ratings` (
`id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `usr_id` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `comment` text,
  `dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `job_skills`
--

DROP TABLE IF EXISTS `job_skills`;
CREATE TABLE IF NOT EXISTS `job_skills` (
`id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `skill` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `job_skills`
--

INSERT INTO `job_skills` (`id`, `job_id`, `skill`) VALUES
(1, 1, 'skill1'),
(2, 1, 'skill2'),
(3, 1, 'skill3');

-- --------------------------------------------------------

--
-- Table structure for table `job_skill_tags`
--

DROP TABLE IF EXISTS `job_skill_tags`;
CREATE TABLE IF NOT EXISTS `job_skill_tags` (
`id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `skill_tag_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

DROP TABLE IF EXISTS `job_types`;
CREATE TABLE IF NOT EXISTS `job_types` (
`id` int(11) NOT NULL,
  `type_nm` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `type_nm`) VALUES
(1, 'PART TIME'),
(2, 'FULL TIME'),
(3, 'ON CONTRACT'),
(4, 'HOUSE KEEPING - FULL TIME'),
(5, 'HOUSE KEEPING - PART TIME'),
(6, 'OTHERS');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `access_token` varchar(40) NOT NULL,
  `client_id` varchar(80) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scope` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_authorization_codes`
--

DROP TABLE IF EXISTS `oauth_authorization_codes`;
CREATE TABLE IF NOT EXISTS `oauth_authorization_codes` (
  `authorization_code` varchar(40) NOT NULL,
  `client_id` varchar(80) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `redirect_uri` varchar(2000) DEFAULT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scope` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `client_id` varchar(80) NOT NULL,
  `client_secret` varchar(80) NOT NULL,
  `redirect_uri` varchar(2000) NOT NULL,
  `grant_types` varchar(80) DEFAULT NULL,
  `scope` varchar(100) DEFAULT NULL,
  `user_id` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_jwt`
--

DROP TABLE IF EXISTS `oauth_jwt`;
CREATE TABLE IF NOT EXISTS `oauth_jwt` (
  `client_id` varchar(80) NOT NULL,
  `subject` varchar(80) DEFAULT NULL,
  `public_key` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `refresh_token` varchar(40) NOT NULL,
  `client_id` varchar(80) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scope` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_scopes`
--

DROP TABLE IF EXISTS `oauth_scopes`;
CREATE TABLE IF NOT EXISTS `oauth_scopes` (
  `scope` text,
  `is_default` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_users`
--

DROP TABLE IF EXISTS `oauth_users`;
CREATE TABLE IF NOT EXISTS `oauth_users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(2000) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

DROP TABLE IF EXISTS `organizations`;
CREATE TABLE IF NOT EXISTS `organizations` (
`id` int(11) NOT NULL,
  `bsnss_nm` varchar(100) NOT NULL,
  `pstl_addr` text NOT NULL,
  `cntr_id` int(11) NOT NULL,
  `stt_id` int(11) NOT NULL,
  `ct_id` int(11) NOT NULL,
  `pstl_cd` varchar(15) NOT NULL,
  `cntct_prsn` varchar(45) NOT NULL,
  `cntct_num_1` varchar(10) NOT NULL,
  `cntct_num_2` varchar(10) DEFAULT NULL,
  `cntct_email_1` varchar(100) NOT NULL,
  `cntct_email_2` varchar(100) DEFAULT NULL,
  `stts` tinyint(1) DEFAULT '0',
  `webaddress` varchar(200) NOT NULL,
  `key` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `bsnss_nm`, `pstl_addr`, `cntr_id`, `stt_id`, `ct_id`, `pstl_cd`, `cntct_prsn`, `cntct_num_1`, `cntct_num_2`, `cntct_email_1`, `cntct_email_2`, `stts`, `webaddress`, `key`) VALUES
(1, 'gotasku', '#554/A', 1, 1, 1, '243445', 'Satyan', '9886166621', NULL, 'satyan.iyengar@live.com', NULL, 1, 'www.gotasku.com', 'QWERRTGTtt!@#$#$%%_');

-- --------------------------------------------------------

--
-- Table structure for table `pay_modes`
--

DROP TABLE IF EXISTS `pay_modes`;
CREATE TABLE IF NOT EXISTS `pay_modes` (
`id` int(11) NOT NULL,
  `mode` varchar(45) DEFAULT NULL COMMENT 'hourly, daily, monthly, weekly, end of period'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pay_modes`
--

INSERT INTO `pay_modes` (`id`, `mode`) VALUES
(1, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `skill_tags`
--

DROP TABLE IF EXISTS `skill_tags`;
CREATE TABLE IF NOT EXISTS `skill_tags` (
`id` int(11) NOT NULL,
  `skill_tag` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1001 ;

--
-- Dumping data for table `skill_tags`
--

INSERT INTO `skill_tags` (`id`, `skill_tag`) VALUES
(1, 'Skill1'),
(10, 'Skill10'),
(100, 'Skill100'),
(1000, 'Skill1000'),
(101, 'Skill101'),
(102, 'Skill102'),
(103, 'Skill103'),
(104, 'Skill104'),
(105, 'Skill105'),
(106, 'Skill106'),
(107, 'Skill107'),
(108, 'Skill108'),
(109, 'Skill109'),
(11, 'Skill11'),
(110, 'Skill110'),
(111, 'Skill111'),
(112, 'Skill112'),
(113, 'Skill113'),
(114, 'Skill114'),
(115, 'Skill115'),
(116, 'Skill116'),
(117, 'Skill117'),
(118, 'Skill118'),
(119, 'Skill119'),
(12, 'Skill12'),
(120, 'Skill120'),
(121, 'Skill121'),
(122, 'Skill122'),
(123, 'Skill123'),
(124, 'Skill124'),
(125, 'Skill125'),
(126, 'Skill126'),
(127, 'Skill127'),
(128, 'Skill128'),
(129, 'Skill129'),
(13, 'Skill13'),
(130, 'Skill130'),
(131, 'Skill131'),
(132, 'Skill132'),
(133, 'Skill133'),
(134, 'Skill134'),
(135, 'Skill135'),
(136, 'Skill136'),
(137, 'Skill137'),
(138, 'Skill138'),
(139, 'Skill139'),
(14, 'Skill14'),
(140, 'Skill140'),
(141, 'Skill141'),
(142, 'Skill142'),
(143, 'Skill143'),
(144, 'Skill144'),
(145, 'Skill145'),
(146, 'Skill146'),
(147, 'Skill147'),
(148, 'Skill148'),
(149, 'Skill149'),
(15, 'Skill15'),
(150, 'Skill150'),
(151, 'Skill151'),
(152, 'Skill152'),
(153, 'Skill153'),
(154, 'Skill154'),
(155, 'Skill155'),
(156, 'Skill156'),
(157, 'Skill157'),
(158, 'Skill158'),
(159, 'Skill159'),
(16, 'Skill16'),
(160, 'Skill160'),
(161, 'Skill161'),
(162, 'Skill162'),
(163, 'Skill163'),
(164, 'Skill164'),
(165, 'Skill165'),
(166, 'Skill166'),
(167, 'Skill167'),
(168, 'Skill168'),
(169, 'Skill169'),
(17, 'Skill17'),
(170, 'Skill170'),
(171, 'Skill171'),
(172, 'Skill172'),
(173, 'Skill173'),
(174, 'Skill174'),
(175, 'Skill175'),
(176, 'Skill176'),
(177, 'Skill177'),
(178, 'Skill178'),
(179, 'Skill179'),
(18, 'Skill18'),
(180, 'Skill180'),
(181, 'Skill181'),
(182, 'Skill182'),
(183, 'Skill183'),
(184, 'Skill184'),
(185, 'Skill185'),
(186, 'Skill186'),
(187, 'Skill187'),
(188, 'Skill188'),
(189, 'Skill189'),
(19, 'Skill19'),
(190, 'Skill190'),
(191, 'Skill191'),
(192, 'Skill192'),
(193, 'Skill193'),
(194, 'Skill194'),
(195, 'Skill195'),
(196, 'Skill196'),
(197, 'Skill197'),
(198, 'Skill198'),
(199, 'Skill199'),
(2, 'Skill2'),
(20, 'Skill20'),
(200, 'Skill200'),
(201, 'Skill201'),
(202, 'Skill202'),
(203, 'Skill203'),
(204, 'Skill204'),
(205, 'Skill205'),
(206, 'Skill206'),
(207, 'Skill207'),
(208, 'Skill208'),
(209, 'Skill209'),
(21, 'Skill21'),
(210, 'Skill210'),
(211, 'Skill211'),
(212, 'Skill212'),
(213, 'Skill213'),
(214, 'Skill214'),
(215, 'Skill215'),
(216, 'Skill216'),
(217, 'Skill217'),
(218, 'Skill218'),
(219, 'Skill219'),
(22, 'Skill22'),
(220, 'Skill220'),
(221, 'Skill221'),
(222, 'Skill222'),
(223, 'Skill223'),
(224, 'Skill224'),
(225, 'Skill225'),
(226, 'Skill226'),
(227, 'Skill227'),
(228, 'Skill228'),
(229, 'Skill229'),
(23, 'Skill23'),
(230, 'Skill230'),
(231, 'Skill231'),
(232, 'Skill232'),
(233, 'Skill233'),
(234, 'Skill234'),
(235, 'Skill235'),
(236, 'Skill236'),
(237, 'Skill237'),
(238, 'Skill238'),
(239, 'Skill239'),
(24, 'Skill24'),
(240, 'Skill240'),
(241, 'Skill241'),
(242, 'Skill242'),
(243, 'Skill243'),
(244, 'Skill244'),
(245, 'Skill245'),
(246, 'Skill246'),
(247, 'Skill247'),
(248, 'Skill248'),
(249, 'Skill249'),
(25, 'Skill25'),
(250, 'Skill250'),
(251, 'Skill251'),
(252, 'Skill252'),
(253, 'Skill253'),
(254, 'Skill254'),
(255, 'Skill255'),
(256, 'Skill256'),
(257, 'Skill257'),
(258, 'Skill258'),
(259, 'Skill259'),
(26, 'Skill26'),
(260, 'Skill260'),
(261, 'Skill261'),
(262, 'Skill262'),
(263, 'Skill263'),
(264, 'Skill264'),
(265, 'Skill265'),
(266, 'Skill266'),
(267, 'Skill267'),
(268, 'Skill268'),
(269, 'Skill269'),
(27, 'Skill27'),
(270, 'Skill270'),
(271, 'Skill271'),
(272, 'Skill272'),
(273, 'Skill273'),
(274, 'Skill274'),
(275, 'Skill275'),
(276, 'Skill276'),
(277, 'Skill277'),
(278, 'Skill278'),
(279, 'Skill279'),
(28, 'Skill28'),
(280, 'Skill280'),
(281, 'Skill281'),
(282, 'Skill282'),
(283, 'Skill283'),
(284, 'Skill284'),
(285, 'Skill285'),
(286, 'Skill286'),
(287, 'Skill287'),
(288, 'Skill288'),
(289, 'Skill289'),
(29, 'Skill29'),
(290, 'Skill290'),
(291, 'Skill291'),
(292, 'Skill292'),
(293, 'Skill293'),
(294, 'Skill294'),
(295, 'Skill295'),
(296, 'Skill296'),
(297, 'Skill297'),
(298, 'Skill298'),
(299, 'Skill299'),
(3, 'Skill3'),
(30, 'Skill30'),
(300, 'Skill300'),
(301, 'Skill301'),
(302, 'Skill302'),
(303, 'Skill303'),
(304, 'Skill304'),
(305, 'Skill305'),
(306, 'Skill306'),
(307, 'Skill307'),
(308, 'Skill308'),
(309, 'Skill309'),
(31, 'Skill31'),
(310, 'Skill310'),
(311, 'Skill311'),
(312, 'Skill312'),
(313, 'Skill313'),
(314, 'Skill314'),
(315, 'Skill315'),
(316, 'Skill316'),
(317, 'Skill317'),
(318, 'Skill318'),
(319, 'Skill319'),
(32, 'Skill32'),
(320, 'Skill320'),
(321, 'Skill321'),
(322, 'Skill322'),
(323, 'Skill323'),
(324, 'Skill324'),
(325, 'Skill325'),
(326, 'Skill326'),
(327, 'Skill327'),
(328, 'Skill328'),
(329, 'Skill329'),
(33, 'Skill33'),
(330, 'Skill330'),
(331, 'Skill331'),
(332, 'Skill332'),
(333, 'Skill333'),
(334, 'Skill334'),
(335, 'Skill335'),
(336, 'Skill336'),
(337, 'Skill337'),
(338, 'Skill338'),
(339, 'Skill339'),
(34, 'Skill34'),
(340, 'Skill340'),
(341, 'Skill341'),
(342, 'Skill342'),
(343, 'Skill343'),
(344, 'Skill344'),
(345, 'Skill345'),
(346, 'Skill346'),
(347, 'Skill347'),
(348, 'Skill348'),
(349, 'Skill349'),
(35, 'Skill35'),
(350, 'Skill350'),
(351, 'Skill351'),
(352, 'Skill352'),
(353, 'Skill353'),
(354, 'Skill354'),
(355, 'Skill355'),
(356, 'Skill356'),
(357, 'Skill357'),
(358, 'Skill358'),
(359, 'Skill359'),
(36, 'Skill36'),
(360, 'Skill360'),
(361, 'Skill361'),
(362, 'Skill362'),
(363, 'Skill363'),
(364, 'Skill364'),
(365, 'Skill365'),
(366, 'Skill366'),
(367, 'Skill367'),
(368, 'Skill368'),
(369, 'Skill369'),
(37, 'Skill37'),
(370, 'Skill370'),
(371, 'Skill371'),
(372, 'Skill372'),
(373, 'Skill373'),
(374, 'Skill374'),
(375, 'Skill375'),
(376, 'Skill376'),
(377, 'Skill377'),
(378, 'Skill378'),
(379, 'Skill379'),
(38, 'Skill38'),
(380, 'Skill380'),
(381, 'Skill381'),
(382, 'Skill382'),
(383, 'Skill383'),
(384, 'Skill384'),
(385, 'Skill385'),
(386, 'Skill386'),
(387, 'Skill387'),
(388, 'Skill388'),
(389, 'Skill389'),
(39, 'Skill39'),
(390, 'Skill390'),
(391, 'Skill391'),
(392, 'Skill392'),
(393, 'Skill393'),
(394, 'Skill394'),
(395, 'Skill395'),
(396, 'Skill396'),
(397, 'Skill397'),
(398, 'Skill398'),
(399, 'Skill399'),
(4, 'Skill4'),
(40, 'Skill40'),
(400, 'Skill400'),
(401, 'Skill401'),
(402, 'Skill402'),
(403, 'Skill403'),
(404, 'Skill404'),
(405, 'Skill405'),
(406, 'Skill406'),
(407, 'Skill407'),
(408, 'Skill408'),
(409, 'Skill409'),
(41, 'Skill41'),
(410, 'Skill410'),
(411, 'Skill411'),
(412, 'Skill412'),
(413, 'Skill413'),
(414, 'Skill414'),
(415, 'Skill415'),
(416, 'Skill416'),
(417, 'Skill417'),
(418, 'Skill418'),
(419, 'Skill419'),
(42, 'Skill42'),
(420, 'Skill420'),
(421, 'Skill421'),
(422, 'Skill422'),
(423, 'Skill423'),
(424, 'Skill424'),
(425, 'Skill425'),
(426, 'Skill426'),
(427, 'Skill427'),
(428, 'Skill428'),
(429, 'Skill429'),
(43, 'Skill43'),
(430, 'Skill430'),
(431, 'Skill431'),
(432, 'Skill432'),
(433, 'Skill433'),
(434, 'Skill434'),
(435, 'Skill435'),
(436, 'Skill436'),
(437, 'Skill437'),
(438, 'Skill438'),
(439, 'Skill439'),
(44, 'Skill44'),
(440, 'Skill440'),
(441, 'Skill441'),
(442, 'Skill442'),
(443, 'Skill443'),
(444, 'Skill444'),
(445, 'Skill445'),
(446, 'Skill446'),
(447, 'Skill447'),
(448, 'Skill448'),
(449, 'Skill449'),
(45, 'Skill45'),
(450, 'Skill450'),
(451, 'Skill451'),
(452, 'Skill452'),
(453, 'Skill453'),
(454, 'Skill454'),
(455, 'Skill455'),
(456, 'Skill456'),
(457, 'Skill457'),
(458, 'Skill458'),
(459, 'Skill459'),
(46, 'Skill46'),
(460, 'Skill460'),
(461, 'Skill461'),
(462, 'Skill462'),
(463, 'Skill463'),
(464, 'Skill464'),
(465, 'Skill465'),
(466, 'Skill466'),
(467, 'Skill467'),
(468, 'Skill468'),
(469, 'Skill469'),
(47, 'Skill47'),
(470, 'Skill470'),
(471, 'Skill471'),
(472, 'Skill472'),
(473, 'Skill473'),
(474, 'Skill474'),
(475, 'Skill475'),
(476, 'Skill476'),
(477, 'Skill477'),
(478, 'Skill478'),
(479, 'Skill479'),
(48, 'Skill48'),
(480, 'Skill480'),
(481, 'Skill481'),
(482, 'Skill482'),
(483, 'Skill483'),
(484, 'Skill484'),
(485, 'Skill485'),
(486, 'Skill486'),
(487, 'Skill487'),
(488, 'Skill488'),
(489, 'Skill489'),
(49, 'Skill49'),
(490, 'Skill490'),
(491, 'Skill491'),
(492, 'Skill492'),
(493, 'Skill493'),
(494, 'Skill494'),
(495, 'Skill495'),
(496, 'Skill496'),
(497, 'Skill497'),
(498, 'Skill498'),
(499, 'Skill499'),
(5, 'Skill5'),
(50, 'Skill50'),
(500, 'Skill500'),
(501, 'Skill501'),
(502, 'Skill502'),
(503, 'Skill503'),
(504, 'Skill504'),
(505, 'Skill505'),
(506, 'Skill506'),
(507, 'Skill507'),
(508, 'Skill508'),
(509, 'Skill509'),
(51, 'Skill51'),
(510, 'Skill510'),
(511, 'Skill511'),
(512, 'Skill512'),
(513, 'Skill513'),
(514, 'Skill514'),
(515, 'Skill515'),
(516, 'Skill516'),
(517, 'Skill517'),
(518, 'Skill518'),
(519, 'Skill519'),
(52, 'Skill52'),
(520, 'Skill520'),
(521, 'Skill521'),
(522, 'Skill522'),
(523, 'Skill523'),
(524, 'Skill524'),
(525, 'Skill525'),
(526, 'Skill526'),
(527, 'Skill527'),
(528, 'Skill528'),
(529, 'Skill529'),
(53, 'Skill53'),
(530, 'Skill530'),
(531, 'Skill531'),
(532, 'Skill532'),
(533, 'Skill533'),
(534, 'Skill534'),
(535, 'Skill535'),
(536, 'Skill536'),
(537, 'Skill537'),
(538, 'Skill538'),
(539, 'Skill539'),
(54, 'Skill54'),
(540, 'Skill540'),
(541, 'Skill541'),
(542, 'Skill542'),
(543, 'Skill543'),
(544, 'Skill544'),
(545, 'Skill545'),
(546, 'Skill546'),
(547, 'Skill547'),
(548, 'Skill548'),
(549, 'Skill549'),
(55, 'Skill55'),
(550, 'Skill550'),
(551, 'Skill551'),
(552, 'Skill552'),
(553, 'Skill553'),
(554, 'Skill554'),
(555, 'Skill555'),
(556, 'Skill556'),
(557, 'Skill557'),
(558, 'Skill558'),
(559, 'Skill559'),
(56, 'Skill56'),
(560, 'Skill560'),
(561, 'Skill561'),
(562, 'Skill562'),
(563, 'Skill563'),
(564, 'Skill564'),
(565, 'Skill565'),
(566, 'Skill566'),
(567, 'Skill567'),
(568, 'Skill568'),
(569, 'Skill569'),
(57, 'Skill57'),
(570, 'Skill570'),
(571, 'Skill571'),
(572, 'Skill572'),
(573, 'Skill573'),
(574, 'Skill574'),
(575, 'Skill575'),
(576, 'Skill576'),
(577, 'Skill577'),
(578, 'Skill578'),
(579, 'Skill579'),
(58, 'Skill58'),
(580, 'Skill580'),
(581, 'Skill581'),
(582, 'Skill582'),
(583, 'Skill583'),
(584, 'Skill584'),
(585, 'Skill585'),
(586, 'Skill586'),
(587, 'Skill587'),
(588, 'Skill588'),
(589, 'Skill589'),
(59, 'Skill59'),
(590, 'Skill590'),
(591, 'Skill591'),
(592, 'Skill592'),
(593, 'Skill593'),
(594, 'Skill594'),
(595, 'Skill595'),
(596, 'Skill596'),
(597, 'Skill597'),
(598, 'Skill598'),
(599, 'Skill599'),
(6, 'Skill6'),
(60, 'Skill60'),
(600, 'Skill600'),
(601, 'Skill601'),
(602, 'Skill602'),
(603, 'Skill603'),
(604, 'Skill604'),
(605, 'Skill605'),
(606, 'Skill606'),
(607, 'Skill607'),
(608, 'Skill608'),
(609, 'Skill609'),
(61, 'Skill61'),
(610, 'Skill610'),
(611, 'Skill611'),
(612, 'Skill612'),
(613, 'Skill613'),
(614, 'Skill614'),
(615, 'Skill615'),
(616, 'Skill616'),
(617, 'Skill617'),
(618, 'Skill618'),
(619, 'Skill619'),
(62, 'Skill62'),
(620, 'Skill620'),
(621, 'Skill621'),
(622, 'Skill622'),
(623, 'Skill623'),
(624, 'Skill624'),
(625, 'Skill625'),
(626, 'Skill626'),
(627, 'Skill627'),
(628, 'Skill628'),
(629, 'Skill629'),
(63, 'Skill63'),
(630, 'Skill630'),
(631, 'Skill631'),
(632, 'Skill632'),
(633, 'Skill633'),
(634, 'Skill634'),
(635, 'Skill635'),
(636, 'Skill636'),
(637, 'Skill637'),
(638, 'Skill638'),
(639, 'Skill639'),
(64, 'Skill64'),
(640, 'Skill640'),
(641, 'Skill641'),
(642, 'Skill642'),
(643, 'Skill643'),
(644, 'Skill644'),
(645, 'Skill645'),
(646, 'Skill646'),
(647, 'Skill647'),
(648, 'Skill648'),
(649, 'Skill649'),
(65, 'Skill65'),
(650, 'Skill650'),
(651, 'Skill651'),
(652, 'Skill652'),
(653, 'Skill653'),
(654, 'Skill654'),
(655, 'Skill655'),
(656, 'Skill656'),
(657, 'Skill657'),
(658, 'Skill658'),
(659, 'Skill659'),
(66, 'Skill66'),
(660, 'Skill660'),
(661, 'Skill661'),
(662, 'Skill662'),
(663, 'Skill663'),
(664, 'Skill664'),
(665, 'Skill665'),
(666, 'Skill666'),
(667, 'Skill667'),
(668, 'Skill668'),
(669, 'Skill669'),
(67, 'Skill67'),
(670, 'Skill670'),
(671, 'Skill671'),
(672, 'Skill672'),
(673, 'Skill673'),
(674, 'Skill674'),
(675, 'Skill675'),
(676, 'Skill676'),
(677, 'Skill677'),
(678, 'Skill678'),
(679, 'Skill679'),
(68, 'Skill68'),
(680, 'Skill680'),
(681, 'Skill681'),
(682, 'Skill682'),
(683, 'Skill683'),
(684, 'Skill684'),
(685, 'Skill685'),
(686, 'Skill686'),
(687, 'Skill687'),
(688, 'Skill688'),
(689, 'Skill689'),
(69, 'Skill69'),
(690, 'Skill690'),
(691, 'Skill691'),
(692, 'Skill692'),
(693, 'Skill693'),
(694, 'Skill694'),
(695, 'Skill695'),
(696, 'Skill696'),
(697, 'Skill697'),
(698, 'Skill698'),
(699, 'Skill699'),
(7, 'Skill7'),
(70, 'Skill70'),
(700, 'Skill700'),
(701, 'Skill701'),
(702, 'Skill702'),
(703, 'Skill703'),
(704, 'Skill704'),
(705, 'Skill705'),
(706, 'Skill706'),
(707, 'Skill707'),
(708, 'Skill708'),
(709, 'Skill709'),
(71, 'Skill71'),
(710, 'Skill710'),
(711, 'Skill711'),
(712, 'Skill712'),
(713, 'Skill713'),
(714, 'Skill714'),
(715, 'Skill715'),
(716, 'Skill716'),
(717, 'Skill717'),
(718, 'Skill718'),
(719, 'Skill719'),
(72, 'Skill72'),
(720, 'Skill720'),
(721, 'Skill721'),
(722, 'Skill722'),
(723, 'Skill723'),
(724, 'Skill724'),
(725, 'Skill725'),
(726, 'Skill726'),
(727, 'Skill727'),
(728, 'Skill728'),
(729, 'Skill729'),
(73, 'Skill73'),
(730, 'Skill730'),
(731, 'Skill731'),
(732, 'Skill732'),
(733, 'Skill733'),
(734, 'Skill734'),
(735, 'Skill735'),
(736, 'Skill736'),
(737, 'Skill737'),
(738, 'Skill738'),
(739, 'Skill739'),
(74, 'Skill74'),
(740, 'Skill740'),
(741, 'Skill741'),
(742, 'Skill742'),
(743, 'Skill743'),
(744, 'Skill744'),
(745, 'Skill745'),
(746, 'Skill746'),
(747, 'Skill747'),
(748, 'Skill748'),
(749, 'Skill749'),
(75, 'Skill75'),
(750, 'Skill750'),
(751, 'Skill751'),
(752, 'Skill752'),
(753, 'Skill753'),
(754, 'Skill754'),
(755, 'Skill755'),
(756, 'Skill756'),
(757, 'Skill757'),
(758, 'Skill758'),
(759, 'Skill759'),
(76, 'Skill76'),
(760, 'Skill760'),
(761, 'Skill761'),
(762, 'Skill762'),
(763, 'Skill763'),
(764, 'Skill764'),
(765, 'Skill765'),
(766, 'Skill766'),
(767, 'Skill767'),
(768, 'Skill768'),
(769, 'Skill769'),
(77, 'Skill77'),
(770, 'Skill770'),
(771, 'Skill771'),
(772, 'Skill772'),
(773, 'Skill773'),
(774, 'Skill774'),
(775, 'Skill775'),
(776, 'Skill776'),
(777, 'Skill777'),
(778, 'Skill778'),
(779, 'Skill779'),
(78, 'Skill78'),
(780, 'Skill780'),
(781, 'Skill781'),
(782, 'Skill782'),
(783, 'Skill783'),
(784, 'Skill784'),
(785, 'Skill785'),
(786, 'Skill786'),
(787, 'Skill787'),
(788, 'Skill788'),
(789, 'Skill789'),
(79, 'Skill79'),
(790, 'Skill790'),
(791, 'Skill791'),
(792, 'Skill792'),
(793, 'Skill793'),
(794, 'Skill794'),
(795, 'Skill795'),
(796, 'Skill796'),
(797, 'Skill797'),
(798, 'Skill798'),
(799, 'Skill799'),
(8, 'Skill8'),
(80, 'Skill80'),
(800, 'Skill800'),
(801, 'Skill801'),
(802, 'Skill802'),
(803, 'Skill803'),
(804, 'Skill804'),
(805, 'Skill805'),
(806, 'Skill806'),
(807, 'Skill807'),
(808, 'Skill808'),
(809, 'Skill809'),
(81, 'Skill81'),
(810, 'Skill810'),
(811, 'Skill811'),
(812, 'Skill812'),
(813, 'Skill813'),
(814, 'Skill814'),
(815, 'Skill815'),
(816, 'Skill816'),
(817, 'Skill817'),
(818, 'Skill818'),
(819, 'Skill819'),
(82, 'Skill82'),
(820, 'Skill820'),
(821, 'Skill821'),
(822, 'Skill822'),
(823, 'Skill823'),
(824, 'Skill824'),
(825, 'Skill825'),
(826, 'Skill826'),
(827, 'Skill827'),
(828, 'Skill828'),
(829, 'Skill829'),
(83, 'Skill83'),
(830, 'Skill830'),
(831, 'Skill831'),
(832, 'Skill832'),
(833, 'Skill833'),
(834, 'Skill834'),
(835, 'Skill835'),
(836, 'Skill836'),
(837, 'Skill837'),
(838, 'Skill838'),
(839, 'Skill839'),
(84, 'Skill84'),
(840, 'Skill840'),
(841, 'Skill841'),
(842, 'Skill842'),
(843, 'Skill843'),
(844, 'Skill844'),
(845, 'Skill845'),
(846, 'Skill846'),
(847, 'Skill847'),
(848, 'Skill848'),
(849, 'Skill849'),
(85, 'Skill85'),
(850, 'Skill850'),
(851, 'Skill851'),
(852, 'Skill852'),
(853, 'Skill853'),
(854, 'Skill854'),
(855, 'Skill855'),
(856, 'Skill856'),
(857, 'Skill857'),
(858, 'Skill858'),
(859, 'Skill859'),
(86, 'Skill86'),
(860, 'Skill860'),
(861, 'Skill861'),
(862, 'Skill862'),
(863, 'Skill863'),
(864, 'Skill864'),
(865, 'Skill865'),
(866, 'Skill866'),
(867, 'Skill867'),
(868, 'Skill868'),
(869, 'Skill869'),
(87, 'Skill87'),
(870, 'Skill870'),
(871, 'Skill871'),
(872, 'Skill872'),
(873, 'Skill873'),
(874, 'Skill874'),
(875, 'Skill875'),
(876, 'Skill876'),
(877, 'Skill877'),
(878, 'Skill878'),
(879, 'Skill879'),
(88, 'Skill88'),
(880, 'Skill880'),
(881, 'Skill881'),
(882, 'Skill882'),
(883, 'Skill883'),
(884, 'Skill884'),
(885, 'Skill885'),
(886, 'Skill886'),
(887, 'Skill887'),
(888, 'Skill888'),
(889, 'Skill889'),
(89, 'Skill89'),
(890, 'Skill890'),
(891, 'Skill891'),
(892, 'Skill892'),
(893, 'Skill893'),
(894, 'Skill894'),
(895, 'Skill895'),
(896, 'Skill896'),
(897, 'Skill897'),
(898, 'Skill898'),
(899, 'Skill899'),
(9, 'Skill9'),
(90, 'Skill90'),
(900, 'Skill900'),
(901, 'Skill901'),
(902, 'Skill902'),
(903, 'Skill903'),
(904, 'Skill904'),
(905, 'Skill905'),
(906, 'Skill906'),
(907, 'Skill907'),
(908, 'Skill908'),
(909, 'Skill909'),
(91, 'Skill91'),
(910, 'Skill910'),
(911, 'Skill911'),
(912, 'Skill912'),
(913, 'Skill913'),
(914, 'Skill914'),
(915, 'Skill915'),
(916, 'Skill916'),
(917, 'Skill917'),
(918, 'Skill918'),
(919, 'Skill919'),
(92, 'Skill92'),
(920, 'Skill920'),
(921, 'Skill921'),
(922, 'Skill922'),
(923, 'Skill923'),
(924, 'Skill924'),
(925, 'Skill925'),
(926, 'Skill926'),
(927, 'Skill927'),
(928, 'Skill928'),
(929, 'Skill929'),
(93, 'Skill93'),
(930, 'Skill930'),
(931, 'Skill931'),
(932, 'Skill932'),
(933, 'Skill933'),
(934, 'Skill934'),
(935, 'Skill935'),
(936, 'Skill936'),
(937, 'Skill937'),
(938, 'Skill938'),
(939, 'Skill939'),
(94, 'Skill94'),
(940, 'Skill940'),
(941, 'Skill941'),
(942, 'Skill942'),
(943, 'Skill943'),
(944, 'Skill944'),
(945, 'Skill945'),
(946, 'Skill946'),
(947, 'Skill947'),
(948, 'Skill948'),
(949, 'Skill949'),
(95, 'Skill95'),
(950, 'Skill950'),
(951, 'Skill951'),
(952, 'Skill952'),
(953, 'Skill953'),
(954, 'Skill954'),
(955, 'Skill955'),
(956, 'Skill956'),
(957, 'Skill957'),
(958, 'Skill958'),
(959, 'Skill959'),
(96, 'Skill96'),
(960, 'Skill960'),
(961, 'Skill961'),
(962, 'Skill962'),
(963, 'Skill963'),
(964, 'Skill964'),
(965, 'Skill965'),
(966, 'Skill966'),
(967, 'Skill967'),
(968, 'Skill968'),
(969, 'Skill969'),
(97, 'Skill97'),
(970, 'Skill970'),
(971, 'Skill971'),
(972, 'Skill972'),
(973, 'Skill973'),
(974, 'Skill974'),
(975, 'Skill975'),
(976, 'Skill976'),
(977, 'Skill977'),
(978, 'Skill978'),
(979, 'Skill979'),
(98, 'Skill98'),
(980, 'Skill980'),
(981, 'Skill981'),
(982, 'Skill982'),
(983, 'Skill983'),
(984, 'Skill984'),
(985, 'Skill985'),
(986, 'Skill986'),
(987, 'Skill987'),
(988, 'Skill988'),
(989, 'Skill989'),
(99, 'Skill99'),
(990, 'Skill990'),
(991, 'Skill991'),
(992, 'Skill992'),
(993, 'Skill993'),
(994, 'Skill994'),
(995, 'Skill995'),
(996, 'Skill996'),
(997, 'Skill997'),
(998, 'Skill998'),
(999, 'Skill999');

-- --------------------------------------------------------

--
-- Table structure for table `social_auths`
--

DROP TABLE IF EXISTS `social_auths`;
CREATE TABLE IF NOT EXISTS `social_auths` (
`id` int(11) NOT NULL,
  `auth_type_nm` varchar(45) NOT NULL,
  `auth_key` varchar(45) NOT NULL,
  `auth_url` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
`id` int(11) NOT NULL,
  `contry_id` int(11) DEFAULT NULL,
  `stt_nm` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `contry_id`, `stt_nm`) VALUES
(1, 1, 'Karnataka');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `org_id` int(11) DEFAULT NULL,
  `usr_type_id` int(11) DEFAULT NULL,
  `prnt_usr_id` int(11) DEFAULT '0',
  `usr_nm` varchar(25) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `salt` varchar(200) NOT NULL,
  `stts` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `org_id`, `usr_type_id`, `prnt_usr_id`, `usr_nm`, `pwd`, `salt`, `stts`) VALUES
(1, 1, 3, 0, 'aku@foundza.com', 'c3g5aktJMmdiSC9SOFFFR3AzRnNPdz09', '2a62f', 1),
(2, 1, 3, 0, 'nsi@live.com', 'ZlFtbkZCQ2FmWm5YUWNIZWtRK0hFdz09', 'fa8ce', 1),
(3, 1, 2, 0, 'satyan.iyengar@live.com', 'czBFWThxeWZXb3g4R3EyN0drdHdFdz09', 'b290e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_social_data`
--

DROP TABLE IF EXISTS `user_social_data`;
CREATE TABLE IF NOT EXISTS `user_social_data` (
`id` int(11) NOT NULL,
  `usr_id` int(11) DEFAULT NULL,
  `gndr` varchar(10) DEFAULT NULL,
  `f_nm` varchar(45) DEFAULT NULL,
  `l_nm` varchar(45) DEFAULT NULL,
  `m_nm` varchar(45) DEFAULT NULL,
  `cntct_num1` varchar(20) DEFAULT NULL,
  `cntct_num2` varchar(20) DEFAULT NULL,
  `email1` varchar(100) DEFAULT NULL,
  `email2` varchar(100) DEFAULT NULL,
  `edctn` varchar(100) DEFAULT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `ct` varchar(100) DEFAULT NULL,
  `stt` varchar(100) DEFAULT NULL,
  `cntry` varchar(100) DEFAULT NULL,
  `is_single` tinyint(1) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `profile_pic` text,
  `key_expiry` datetime DEFAULT NULL,
  `last_updated_on` datetime DEFAULT NULL,
  `raw_data` text,
  `social_auth_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

DROP TABLE IF EXISTS `user_types`;
CREATE TABLE IF NOT EXISTS `user_types` (
`id` int(11) NOT NULL,
  `org_id` int(11) DEFAULT '0',
  `usr_type_nm` varchar(45) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `stts` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `org_id`, `usr_type_nm`, `is_admin`, `stts`) VALUES
(1, 1, 'SUPER_ADMIN', 1, 1),
(2, 1, 'EMPLOYEE', 0, 1),
(3, 1, 'EMPLOYER', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `worker_details`
--

DROP TABLE IF EXISTS `worker_details`;
CREATE TABLE IF NOT EXISTS `worker_details` (
`id` int(11) NOT NULL,
  `usr_id` int(11) DEFAULT NULL,
  `gndr` tinyint(1) DEFAULT NULL,
  `fnm` varchar(50) DEFAULT NULL,
  `mnm` varchar(50) DEFAULT NULL,
  `lnm` varchar(50) DEFAULT NULL,
  `cntct_addr` text,
  `cntr_id` int(11) DEFAULT NULL,
  `st_id` int(11) DEFAULT NULL,
  `ct_id` int(11) DEFAULT NULL,
  `pstl_cd` varchar(10) DEFAULT NULL,
  `cntct_num1` varchar(100) DEFAULT NULL,
  `cntct_num2` varchar(10) DEFAULT NULL,
  `email1` varchar(100) DEFAULT NULL,
  `email2` varchar(100) DEFAULT NULL,
  `prfrd_cntct_time` varchar(45) DEFAULT NULL,
  `profile_pic` text,
  `account_number_iban` varchar(50) NOT NULL,
  `dscrptn` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `worker_details`
--

INSERT INTO `worker_details` (`id`, `usr_id`, `gndr`, `fnm`, `mnm`, `lnm`, `cntct_addr`, `cntr_id`, `st_id`, `ct_id`, `pstl_cd`, `cntct_num1`, `cntct_num2`, `email1`, `email2`, `prfrd_cntct_time`, `profile_pic`, `account_number_iban`, `dscrptn`) VALUES
(1, 3, NULL, 'Satyanarayan', NULL, 'Iyengar', '557/3, 1st D Cross, 3rd Main, Mathikere, Bangalore ', NULL, NULL, NULL, '560054', '8095666861', NULL, 'satyan.iyengar@live.com', NULL, NULL, '11017189_1422928154685655_7975922575180145057_n.jpg', 'Fl34563 6362 5464 5464', 'jajd hagdkfh asdk asdf sdjfh asjdhfl');

-- --------------------------------------------------------

--
-- Table structure for table `worker_docs`
--

DROP TABLE IF EXISTS `worker_docs`;
CREATE TABLE IF NOT EXISTS `worker_docs` (
`id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `doc_type_id` varchar(3) NOT NULL COMMENT 'DLC,HPT,OTH',
  `doc_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `worker_education_details`
--

DROP TABLE IF EXISTS `worker_education_details`;
CREATE TABLE IF NOT EXISTS `worker_education_details` (
`id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `edu_type_id` int(11) NOT NULL,
  `institution` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `year` int(11) NOT NULL,
  `grade` varchar(5) NOT NULL,
  `experties` text
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `worker_education_details`
--

INSERT INTO `worker_education_details` (`id`, `usr_id`, `edu_type_id`, `institution`, `subject`, `year`, `grade`, `experties`) VALUES
(26, 3, 1, '', 'sdhkfh', 0, '', 'hgsdkhf'),
(27, 3, 0, '', '', 0, '', ''),
(28, 3, 0, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `worker_experiences`
--

DROP TABLE IF EXISTS `worker_experiences`;
CREATE TABLE IF NOT EXISTS `worker_experiences` (
`id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `dsgntn` varchar(100) NOT NULL,
  `org_nm` varchar(200) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `skills` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `worker_experiences`
--

INSERT INTO `worker_experiences` (`id`, `usr_id`, `dsgntn`, `org_nm`, `from`, `to`, `skills`) VALUES
(2, 3, 'Delivery Head', 'ITP', '2011-06-01', '2014-02-28', '');

-- --------------------------------------------------------

--
-- Table structure for table `worker_preferences`
--

DROP TABLE IF EXISTS `worker_preferences`;
CREATE TABLE IF NOT EXISTS `worker_preferences` (
`id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `setting` varchar(50) NOT NULL,
  `value` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `worker_preferences`
--

INSERT INTO `worker_preferences` (`id`, `usr_id`, `setting`, `value`, `description`) VALUES
(1, 3, 'WAGE', '45', ''),
(2, 3, 'WORK_DISTANCE', '200', '');

-- --------------------------------------------------------

--
-- Table structure for table `worker_ratings`
--

DROP TABLE IF EXISTS `worker_ratings`;
CREATE TABLE IF NOT EXISTS `worker_ratings` (
`id` int(11) NOT NULL,
  `worker_id` int(11) DEFAULT NULL,
  `usr_id` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `comment` text,
  `dt` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `worker_skills`
--

DROP TABLE IF EXISTS `worker_skills`;
CREATE TABLE IF NOT EXISTS `worker_skills` (
`id` int(11) NOT NULL,
  `wrkr_id` int(11) NOT NULL,
  `skill` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `worker_skills`
--

INSERT INTO `worker_skills` (`id`, `wrkr_id`, `skill`) VALUES
(5, 3, 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `worker_skill_tags`
--

DROP TABLE IF EXISTS `worker_skill_tags`;
CREATE TABLE IF NOT EXISTS `worker_skill_tags` (
`id` int(11) NOT NULL,
  `wrkr_id` int(11) NOT NULL,
  `skill_tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_job_id_idx` (`job_id`), ADD KEY `fk_wrkr_id_idx` (`wrkr_id`);

--
-- Indexes for table `business_types`
--
ALTER TABLE `business_types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_stt_id_idx` (`stt_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cv`
--
ALTER TABLE `cv`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_wrkr_id_idx` (`wrkr_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_wrkr_id_idx` (`wrkr_id`), ADD KEY `fk_edctn_id_idx` (`edctn_type_id`);

--
-- Indexes for table `education_types`
--
ALTER TABLE `education_types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer_details`
--
ALTER TABLE `employer_details`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_usr_id_idx` (`usr_id`), ADD KEY `fk_cntry_id_idx` (`cntr_id`), ADD KEY `fk_stt_id_idx` (`stt_id`), ADD KEY `fk_ct_id_idx` (`ct_id`), ADD KEY `business_type` (`business_type`), ADD KEY `web_site` (`web_site`), ADD KEY `role` (`role`), ADD KEY `billing_email` (`billing_email`), ADD KEY `bill_by_email` (`bill_by_email`);

--
-- Indexes for table `employer_ratings`
--
ALTER TABLE `employer_ratings`
 ADD PRIMARY KEY (`id`), ADD KEY `emplyr_id_idx` (`emplyr_id`), ADD KEY `fk_usr_id_idx` (`usr_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_job_type_id_idx` (`job_type_id`), ADD KEY `fk_emplr_id_idx` (`emplyr_id`), ADD KEY `fk_pay_mode_id_idx` (`pay_mode_id`), ADD KEY `posted_on` (`posted_on`);

--
-- Indexes for table `job_ratings`
--
ALTER TABLE `job_ratings`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_job_id_idx` (`job_id`), ADD KEY `fk_usr_id_idx` (`usr_id`);

--
-- Indexes for table `job_skills`
--
-- ALTER TABLE `job_skills`
-- ADD PRIMARY KEY (`id`), ADD KEY `skill` (`skill`), ADD FULLTEXT KEY `skill_2` (`skill`);

--
-- Indexes for table `job_skill_tags`
--
ALTER TABLE `job_skill_tags`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_job_id_idx` (`job_id`), ADD KEY `fk_skill_id_idx` (`skill_tag_id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
 ADD PRIMARY KEY (`access_token`);

--
-- Indexes for table `oauth_authorization_codes`
--
ALTER TABLE `oauth_authorization_codes`
 ADD PRIMARY KEY (`authorization_code`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
 ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `oauth_jwt`
--
ALTER TABLE `oauth_jwt`
 ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
 ADD PRIMARY KEY (`refresh_token`);

--
-- Indexes for table `oauth_users`
--
ALTER TABLE `oauth_users`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_cntry_id_idx` (`cntr_id`), ADD KEY `fk_stt_id_idx` (`stt_id`), ADD KEY `fk_ct_id_idx` (`ct_id`), ADD KEY `webaddress` (`webaddress`,`key`);

--
-- Indexes for table `pay_modes`
--
ALTER TABLE `pay_modes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill_tags`
--
ALTER TABLE `skill_tags`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `skill_tag` (`skill_tag`);

--
-- Indexes for table `social_auths`
--
ALTER TABLE `social_auths`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_cntry_id_idx` (`contry_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `usr_nm` (`usr_nm`), ADD KEY `fk_org_id_idx` (`org_id`), ADD KEY `fk_usr_type_id_idx` (`usr_type_id`);

--
-- Indexes for table `user_social_data`
--
ALTER TABLE `user_social_data`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_usr_id_idx` (`usr_id`), ADD KEY `fk_scl_auth_id_idx` (`social_auth_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_org_id_idx` (`org_id`);

--
-- Indexes for table `worker_details`
--
ALTER TABLE `worker_details`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_usr_id_idx` (`usr_id`), ADD KEY `fk_cntry_id_idx` (`cntr_id`), ADD KEY `fk_stt_id_idx` (`st_id`), ADD KEY `fk_city_id_idx` (`ct_id`);

--
-- Indexes for table `worker_docs`
--
ALTER TABLE `worker_docs`
 ADD PRIMARY KEY (`id`), ADD KEY `usr_id` (`usr_id`), ADD KEY `doc_type_id` (`doc_type_id`);

--
-- Indexes for table `worker_education_details`
--
ALTER TABLE `worker_education_details`
 ADD PRIMARY KEY (`id`), ADD KEY `usr_id` (`usr_id`);

--
-- Indexes for table `worker_experiences`
--
ALTER TABLE `worker_experiences`
 ADD PRIMARY KEY (`id`), ADD KEY `usr_id` (`usr_id`);

--
-- Indexes for table `worker_preferences`
--
ALTER TABLE `worker_preferences`
 ADD PRIMARY KEY (`id`), ADD KEY `usr_id` (`usr_id`,`setting`,`value`);

--
-- Indexes for table `worker_ratings`
--
ALTER TABLE `worker_ratings`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_wrkr_id_idx` (`worker_id`), ADD KEY `fk_usr_id_idx` (`usr_id`);

--
-- Indexes for table `worker_skills`
--
ALTER TABLE `worker_skills`
 ADD PRIMARY KEY (`id`), ADD KEY `wrkr_id` (`wrkr_id`,`skill`);

--
-- Indexes for table `worker_skill_tags`
--
ALTER TABLE `worker_skill_tags`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_wrkr_id_idx` (`wrkr_id`), ADD KEY `fk_skill_tag_id_idx` (`skill_tag_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `business_types`
--
ALTER TABLE `business_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `education_types`
--
ALTER TABLE `education_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `employer_details`
--
ALTER TABLE `employer_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `employer_ratings`
--
ALTER TABLE `employer_ratings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `job_ratings`
--
ALTER TABLE `job_ratings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `job_skills`
--
ALTER TABLE `job_skills`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `job_skill_tags`
--
ALTER TABLE `job_skill_tags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pay_modes`
--
ALTER TABLE `pay_modes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `skill_tags`
--
ALTER TABLE `skill_tags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1001;
--
-- AUTO_INCREMENT for table `social_auths`
--
ALTER TABLE `social_auths`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_social_data`
--
ALTER TABLE `user_social_data`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `worker_details`
--
ALTER TABLE `worker_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `worker_docs`
--
ALTER TABLE `worker_docs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `worker_education_details`
--
ALTER TABLE `worker_education_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `worker_experiences`
--
ALTER TABLE `worker_experiences`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `worker_preferences`
--
ALTER TABLE `worker_preferences`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `worker_ratings`
--
ALTER TABLE `worker_ratings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `worker_skills`
--
ALTER TABLE `worker_skills`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `worker_skill_tags`
--
ALTER TABLE `worker_skill_tags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`wrkr_id`) REFERENCES `worker_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`stt_id`) REFERENCES `states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cv`
--
ALTER TABLE `cv`
ADD CONSTRAINT `cv_ibfk_1` FOREIGN KEY (`wrkr_id`) REFERENCES `worker_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
ADD CONSTRAINT `fk_edctn_id` FOREIGN KEY (`edctn_type_id`) REFERENCES `education_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_wrkr_id` FOREIGN KEY (`wrkr_id`) REFERENCES `worker_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employer_details`
--
ALTER TABLE `employer_details`
ADD CONSTRAINT `employer_details_ibfk_1` FOREIGN KEY (`usr_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `employer_details_ibfk_2` FOREIGN KEY (`cntr_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `employer_details_ibfk_3` FOREIGN KEY (`stt_id`) REFERENCES `states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `employer_details_ibfk_4` FOREIGN KEY (`ct_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employer_ratings`
--
ALTER TABLE `employer_ratings`
ADD CONSTRAINT `employer_ratings_ibfk_1` FOREIGN KEY (`emplyr_id`) REFERENCES `employer_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `employer_ratings_ibfk_2` FOREIGN KEY (`usr_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
ADD CONSTRAINT `fk_emplr_id` FOREIGN KEY (`emplyr_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_job_type_id` FOREIGN KEY (`job_type_id`) REFERENCES `job_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_pay_mode_id` FOREIGN KEY (`pay_mode_id`) REFERENCES `pay_modes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `job_ratings`
--
ALTER TABLE `job_ratings`
ADD CONSTRAINT `job_ratings_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `job_ratings_ibfk_2` FOREIGN KEY (`usr_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `job_skill_tags`
--
ALTER TABLE `job_skill_tags`
ADD CONSTRAINT `fk_job_id` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_skill_id` FOREIGN KEY (`skill_tag_id`) REFERENCES `skill_tags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `organizations`
--
ALTER TABLE `organizations`
ADD CONSTRAINT `fk_cntry_id` FOREIGN KEY (`cntr_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_ct_id` FOREIGN KEY (`ct_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_stt_id` FOREIGN KEY (`stt_id`) REFERENCES `states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
ADD CONSTRAINT `states_ibfk_1` FOREIGN KEY (`contry_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`org_id`) REFERENCES `organizations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`usr_type_id`) REFERENCES `user_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_social_data`
--
ALTER TABLE `user_social_data`
ADD CONSTRAINT `fk_scl_auth_id` FOREIGN KEY (`social_auth_id`) REFERENCES `social_auths` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_usr_id` FOREIGN KEY (`usr_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_types`
--
ALTER TABLE `user_types`
ADD CONSTRAINT `fk_org_id` FOREIGN KEY (`org_id`) REFERENCES `organizations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `worker_details`
--
ALTER TABLE `worker_details`
ADD CONSTRAINT `worker_details_ibfk_1` FOREIGN KEY (`cntr_id`) REFERENCES `countries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `worker_details_ibfk_2` FOREIGN KEY (`st_id`) REFERENCES `states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `worker_details_ibfk_3` FOREIGN KEY (`ct_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `worker_details_ibfk_4` FOREIGN KEY (`usr_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `worker_docs`
--
ALTER TABLE `worker_docs`
ADD CONSTRAINT `worker_docs_ibfk_1` FOREIGN KEY (`usr_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `worker_education_details`
--
ALTER TABLE `worker_education_details`
ADD CONSTRAINT `worker_education_details_ibfk_1` FOREIGN KEY (`usr_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `worker_experiences`
--
ALTER TABLE `worker_experiences`
ADD CONSTRAINT `worker_experiences_ibfk_1` FOREIGN KEY (`usr_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `worker_skill_tags`
--
ALTER TABLE `worker_skill_tags`
ADD CONSTRAINT `worker_skill_tags_ibfk_1` FOREIGN KEY (`wrkr_id`) REFERENCES `worker_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `worker_skill_tags_ibfk_2` FOREIGN KEY (`skill_tag_id`) REFERENCES `skill_tags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET foreign_key_checks = 1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
