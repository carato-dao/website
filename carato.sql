-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 25, 2021 at 07:19 AM
-- Server version: 5.7.30-0ubuntu0.18.04.1-log
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carato`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL COMMENT 'print=>1;type=>text;required=>required',
  `password` varchar(255) DEFAULT NULL COMMENT 'print=>0;type=>password;required=>required;',
  `email` varchar(100) DEFAULT NULL COMMENT 'print=>1;type=>email;required=>required',
  `image` varchar(400) DEFAULT NULL COMMENT 'print=>1;type=>file;required=>;specs=>admin_files',
  `lastLogin` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'no',
  `level` varchar(10) DEFAULT '0' COMMENT 'print=>1;type=>select;specs=>[SUPERUSER,ADMIN,USER]'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `image`, `lastLogin`, `level`) VALUES
(2, 'admin', '38TU35zS1ObN49KC', 's.cataudo@turinglabs.org', '', '2021-03-23 14:28:21', 'SUPERUSER');

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` int(11) NOT NULL,
  `code` varchar(400) DEFAULT NULL COMMENT 'type=>text;print=>1',
  `value` text COMMENT 'type=>text;print=>1',
  `mod` int(11) DEFAULT '1' COMMENT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `code`, `value`, `mod`) VALUES
(31, 'siteurl', 'http://website.bmt', 0),
(32, 'subdomain_offline', '', 0),
(33, 'subdomain_online', '', 0),
(34, 'debug_mode', 'off', 0),
(36, 'newsletter_mail', 'newsletter@website.bmt', 0),
(37, 'newsletter_from', 'Newsletter - My Awesome website', 0),
(38, 'ieblock', '0', 0),
(39, 'contattimail', 'info@website.bmt', 0),
(40, 'mail_host', 'mail.basementcms.com', 0),
(41, 'mail_port', '465', 0),
(42, 'mail_secure', 'ssl', 0),
(43, 'mail_username', 'notifications@basementcms.com', 0),
(44, 'mail_password', '@#note_bmt@#', 0),
(45, 'mail_name', 'Notification@BMT', 0),
(46, 'backup_pattern', 'Ymd_His', 1),
(47, 'backup_retain', '-3 days', 1),
(48, 'selected_language', 'en', 1);

-- --------------------------------------------------------

--
-- Table structure for table `crypted_configs`
--

CREATE TABLE `crypted_configs` (
  `id` int(11) NOT NULL,
  `code` varchar(450) DEFAULT NULL COMMENT 'print=>1;order=>0;type=>text;specs=>;multiple=>;required=>',
  `value` varchar(450) DEFAULT NULL COMMENT 'print=>1;order=>0;type=>password;specs=>;multiple=>;required=>'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crypted_configs`
--

INSERT INTO `crypted_configs` (`id`, `code`, `value`) VALUES
(37, 'session_code', 'xsjRr9y5yLrK2Yias6HH7A=='),
(38, 'engine_locked', 'nw==');

-- --------------------------------------------------------

--
-- Table structure for table `datatype_associazioni`
--

CREATE TABLE `datatype_associazioni` (
  `id` int(6) UNSIGNED NOT NULL,
  `nome` varchar(400) DEFAULT NULL COMMENT 'print=>1;order=>1;type=>text;specs=>;multiple=>;required=>required;',
  `logo` varchar(100) DEFAULT NULL COMMENT 'print=>;order=>2;type=>file;specs=>;multiple=>;required=>;',
  `preview` longtext COMMENT 'print=>1;order=>4;type=>textarea;specs=>;multiple=>;required=>required;',
  `facebook` varchar(400) DEFAULT NULL COMMENT 'print=>1;order=>5;type=>text;specs=>;multiple=>;required=>;',
  `twitter` varchar(400) DEFAULT NULL COMMENT 'print=>;order=>6;type=>text;specs=>;multiple=>;required=>;',
  `instagram` varchar(400) DEFAULT NULL COMMENT 'print=>;order=>7;type=>text;specs=>;multiple=>;required=>;',
  `website` varchar(400) DEFAULT NULL COMMENT 'print=>;order=>8;type=>text;specs=>;multiple=>;required=>;',
  `descrizione` longtext COMMENT 'print=>;order=>9;type=>textarea;specs=>;multiple=>;required=>;',
  `banner` varchar(100) DEFAULT NULL COMMENT 'print=>;order=>3;type=>file;specs=>;multiple=>;required=>;',
  `attiva` varchar(2) DEFAULT NULL COMMENT 'print=>1;order=>1.1;type=>select;specs=>[SI,NO];multiple=>;required=>;',
  `slug` varchar(400) DEFAULT NULL COMMENT 'print=>1;order=>5.2;type=>text;specs=>;multiple=>;required=>;',
  `facebook_embed` tinytext COMMENT 'print=>;order=>5.3;type=>textarea;specs=>html;multiple=>;required=>;'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datatype_associazioni`
--

INSERT INTO `datatype_associazioni` (`id`, `nome`, `logo`, `preview`, `facebook`, `twitter`, `instagram`, `website`, `descrizione`, `banner`, `attiva`, `slug`, `facebook_embed`) VALUES
(1, 'Collettivo Ocra', '230321151230logo1.png', '<p>Associazione culturale impegnata nella promozione di iniziative didattico-artistiche e riqualificazione artistica del contesto urbano.</p>', 'https://www.facebook.com/collettivoOCRA/', NULL, 'https://www.instagram.com/collettivoocra/', NULL, '<p>&Egrave; un&rsquo;associazione culturale impegnata nella promozione di iniziative didattico-artistiche rivolte a bambini, ragazzi e adulti. <br /> Il gruppo, formato da Elisa Alescio, Ambra Cassibba e Gaia Nicastro si occupa anche di riqualificazione del contesto urbano per mezzo di interventi artistici (site specific), favorendo attivit&agrave; di recupero e riutilizzo di materiali di scarto, coinvolgendo attivamente la comunit&agrave; in processi di arte pubblica.</p>\r\n<p>Il Collettivo OCRA ha collaborato e continua a collaborare con numerosi istituti scolastici per la riqualificazione di spazi dedicati all&rsquo;educazione non-formale con percorsi sensoriali e giochi psicoeducativi, organizza workshop artistici orientati su tematiche sociali e ambientali.</p>', '', 'SI', 'collettivo-ocra', 'https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FcollettivoOCRA&tabs=timeline&width=700&height=700&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=583447029176740');

-- --------------------------------------------------------

--
-- Table structure for table `datatype_esercenti`
--

CREATE TABLE `datatype_esercenti` (
  `id` int(6) UNSIGNED NOT NULL,
  `nome` varchar(100) DEFAULT NULL COMMENT 'print=>1;order=>1;type=>text;specs=>;multiple=>;required=>required;',
  `banner` varchar(100) DEFAULT NULL COMMENT 'print=>1;order=>2;type=>file;specs=>;multiple=>;required=>;',
  `tipologia` varchar(100) DEFAULT NULL COMMENT 'print=>1;order=>3;type=>text;specs=>;multiple=>;required=>;',
  `comune` varchar(100) DEFAULT NULL COMMENT 'print=>1;order=>4;type=>text;specs=>;multiple=>;required=>;',
  `descrizione` longtext COMMENT 'print=>;order=>11;type=>textarea;specs=>;multiple=>;required=>;',
  `facebook` varchar(400) DEFAULT NULL COMMENT 'print=>;order=>5;type=>text;specs=>;multiple=>;required=>;',
  `instagram` varchar(400) DEFAULT NULL COMMENT 'print=>;order=>6;type=>text;specs=>;multiple=>;required=>;',
  `twitter` varchar(400) DEFAULT NULL COMMENT 'print=>;order=>7;type=>text;specs=>;multiple=>;required=>;',
  `website` varchar(400) DEFAULT NULL COMMENT 'print=>;order=>8;type=>text;specs=>;multiple=>;required=>;',
  `coordinate` varchar(50) DEFAULT NULL COMMENT 'print=>;order=>9;type=>text;specs=>;multiple=>;required=>;',
  `sconto` longtext COMMENT 'print=>1;order=>10;type=>text;specs=>;multiple=>;required=>;',
  `indirizzo` varchar(400) DEFAULT NULL COMMENT 'print=>1;order=>5.1;type=>text;specs=>;multiple=>;required=>;',
  `slug` varchar(400) DEFAULT NULL COMMENT 'print=>1;order=>5.2;type=>text;specs=>;multiple=>;required=>;',
  `attivo` varchar(2) DEFAULT NULL COMMENT 'print=>1;order=>1.1;type=>select;specs=>[SI,NO];multiple=>;required=>;'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datatype_esercenti`
--

INSERT INTO `datatype_esercenti` (`id`, `nome`, `banner`, `tipologia`, `comune`, `descrizione`, `facebook`, `instagram`, `twitter`, `website`, `coordinate`, `sconto`, `indirizzo`, `slug`, `attivo`) VALUES
(1, 'orti', '250321071030event.jpg', 'aa', 'bb', NULL, NULL, NULL, NULL, NULL, '14.724257,36.918427', NULL, 'dasdasadsadsadsadsadsadssdadsdsa', NULL, 'SI');

-- --------------------------------------------------------

--
-- Table structure for table `db_backup`
--

CREATE TABLE `db_backup` (
  `id` int(11) NOT NULL,
  `backup_name` varchar(400) NOT NULL,
  `backup_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `htaccess`
--

CREATE TABLE `htaccess` (
  `id` int(6) UNSIGNED NOT NULL,
  `line` text COMMENT 'print=>1;order=>2;type=>textarea;specs=>html;multiple=>;required=>',
  `active` varchar(2) DEFAULT NULL COMMENT 'print=>1;order=>0;type=>select;specs=>[SI,NO];multiple=>;required=>',
  `ordine` int(11) DEFAULT NULL COMMENT 'print=>1;order=>1;type=>text;specs=>;multiple=>;required=>'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `htaccess`
--

INSERT INTO `htaccess` (`id`, `line`, `active`, `ordine`) VALUES
(1, 'RewriteRule esercente/([^/]+) index.php?page=esercente&slug=$1 [L]\r\nRewriteRule associazione/([^/]+) index.php?page=associazione&slug=$1 [L]', 'SI', 0);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `output_name` varchar(20) NOT NULL,
  `uni_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `output_name`, `uni_code`) VALUES
(7, 'Italiano', 'it');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `order` int(11) DEFAULT NULL COMMENT 'print=>1;order=>0;type=>text;specs=>;multiple=>;required=>',
  `type` varchar(255) DEFAULT NULL COMMENT 'print=>1;order=>0;type=>select;specs=>[TOP,SIDEBAR];multiple=>;required=>',
  `title` varchar(255) DEFAULT NULL COMMENT 'print=>1;order=>0;type=>text;specs=>;multiple=>;required=>',
  `language` varchar(255) DEFAULT NULL COMMENT 'print=>1;order=>0;type=>select;specs=>languages->(output_name)->(uni_code);multiple=>;required=>',
  `permalink` varchar(255) DEFAULT NULL COMMENT 'print=>1;order=>0;type=>select;specs=>pages->(title)->(permalink);multiple=>;required=>'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_sent`
--

CREATE TABLE `newsletter_sent` (
  `id` int(11) NOT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `corpo` text CHARACTER SET latin1 COLLATE latin1_general_cs,
  `oggetto` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `allegato` varchar(255) DEFAULT NULL,
  `utenti` text,
  `inviata` int(11) DEFAULT NULL,
  `campagna` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter_sent`
--

INSERT INTO `newsletter_sent` (`id`, `data`, `corpo`, `oggetto`, `allegato`, `utenti`, `inviata`, `campagna`) VALUES
(1, '2015-09-27 22:00:00', 'test', 'test', '', 'tutti', 0, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_tracking`
--

CREATE TABLE `newsletter_tracking` (
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(120) NOT NULL,
  `email` text,
  `browser` varchar(120) NOT NULL,
  `campaign` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_users`
--

CREATE TABLE `newsletter_users` (
  `id` int(11) NOT NULL,
  `liste` text NOT NULL,
  `nome` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `cognome` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `pass` varchar(255) NOT NULL,
  `verificato` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter_users`
--

INSERT INTO `newsletter_users` (`id`, `liste`, `nome`, `cognome`, `email`, `pass`, `verificato`) VALUES
(3861, 'amministratori,tutti', 'Sebastiano', 'Cataudo', 'sebastiano.cataudo@gmail.com', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `permalink` varchar(255) DEFAULT NULL COMMENT 'print=>1;order=>0;type=>custom;specs=>;multiple=>;required=>required',
  `language` longtext COMMENT 'print=>1;order=>0;type=>select;specs=>languages->(output_name)->(uni_code);multiple=>;required=>required',
  `title` varchar(255) DEFAULT NULL COMMENT 'print=>1;order=>0;type=>text;specs=>;multiple=>;required=>required',
  `subtitle` varchar(400) DEFAULT NULL COMMENT 'print=>;order=>0;type=>text;specs=>;multiple=>;required=>',
  `content` longtext COMMENT 'print=>;order=>0;type=>textarea;specs=>;multiple=>;required=>',
  `ref_page` varchar(60) DEFAULT NULL COMMENT 'print=>1;order=>0;type=>custom;specs=>;multiple=>;required=>required',
  `cover_image` varchar(400) DEFAULT NULL COMMENT 'print=>;order=>0;type=>file;specs=>img_pages;multiple=>;required=>',
  `meta_description` text COMMENT 'print=>;order=>0;type=>textarea;specs=>html;multiple=>;required=>',
  `meta_keywords` text COMMENT 'print=>;order=>0;type=>tag;specs=>;multiple=>;required=>',
  `change_freq` varchar(20) DEFAULT NULL COMMENT 'print=>;order=>0;type=>text;specs=>;multiple=>;required=>',
  `priority` varchar(5) DEFAULT NULL COMMENT 'print=>;order=>0;type=>text;specs=>;multiple=>;required=>',
  `bozza` varchar(5) DEFAULT NULL COMMENT 'print=>;order=>0;type=>select;specs=>[SI,NO];multiple=>;required=>'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `permalink`, `language`, `title`, `subtitle`, `content`, `ref_page`, `cover_image`, `meta_description`, `meta_keywords`, `change_freq`, `priority`, `bozza`) VALUES
(15, 'homepage', 'it', 'Homepage', '', '<p>Quisque velit nisi, pretium ut lacinia in, elementum id enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor lectus nibh. Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor eget felis porttitor volutpat. Proin eget tortor risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec sollicitudin molestie malesuada.</p>\r\n<p>Quisque velit nisi, pretium ut lacinia in, elementum id enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor lectus nibh. Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor eget felis porttitor volutpat. Proin eget tortor risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec sollicitudin molestie malesuada.</p>', 'homepage.php', '', '', '', 'always', '0', NULL),
(16, 'eventi', 'it', 'Eventi', NULL, NULL, 'eventi.php', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'esercente', 'it', 'Esercente', NULL, NULL, 'esercente.php', '', NULL, NULL, NULL, NULL, NULL),
(18, 'associazione', 'it', 'Associazione', NULL, NULL, 'associazione.php', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(120) NOT NULL,
  `browser` varchar(120) NOT NULL,
  `hostname` varchar(200) NOT NULL,
  `client_name` varchar(450) NOT NULL,
  `referral_page` varchar(400) NOT NULL,
  `view_page` varchar(400) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(11) NOT NULL,
  `globale` varchar(255) DEFAULT NULL COMMENT 'print=>1;order=>1;type=>custom;specs=>;multiple=>;required=>',
  `is_html` varchar(2) DEFAULT NULL COMMENT 'print=>;order=>2;type=>select;specs=>[SI,NO];multiple=>;required=>',
  `locales` longtext COMMENT 'print=>1;order=>4;type=>custom;specs=>;multiple=>;required=>',
  `is_js` varchar(2) DEFAULT NULL COMMENT 'print=>;order=>3;type=>select;specs=>[SI,NO];multiple=>;required=>'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `globale`, `is_html`, `locales`, `is_js`) VALUES
(1, 'linktwitter', NULL, '[{\"language\":\"it\",\"locale\":\"<p>http://twitter.com</p>\"}]', NULL),
(2, 'linkfacebook', NULL, '[{\"language\":\"it\",\"locale\":\"<p>http://facebook.com</p>\"}]', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crypted_configs`
--
ALTER TABLE `crypted_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datatype_associazioni`
--
ALTER TABLE `datatype_associazioni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datatype_esercenti`
--
ALTER TABLE `datatype_esercenti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_backup`
--
ALTER TABLE `db_backup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `backup_name` (`backup_name`);

--
-- Indexes for table `htaccess`
--
ALTER TABLE `htaccess`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_sent`
--
ALTER TABLE `newsletter_sent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_tracking`
--
ALTER TABLE `newsletter_tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_users`
--
ALTER TABLE `newsletter_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `crypted_configs`
--
ALTER TABLE `crypted_configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `datatype_associazioni`
--
ALTER TABLE `datatype_associazioni`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `datatype_esercenti`
--
ALTER TABLE `datatype_esercenti`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_backup`
--
ALTER TABLE `db_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `htaccess`
--
ALTER TABLE `htaccess`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter_sent`
--
ALTER TABLE `newsletter_sent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newsletter_tracking`
--
ALTER TABLE `newsletter_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `newsletter_users`
--
ALTER TABLE `newsletter_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3862;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
