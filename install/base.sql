-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Ott 21, 2015 alle 13:29
-- Versione del server: 5.5.44-cll-lve
-- Versione PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `basement_db`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `admins`
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

-- --------------------------------------------------------

--
-- Struttura della tabella `configs`
--

CREATE TABLE `configs` (
  `id` int(11) NOT NULL,
  `code` varchar(400) DEFAULT NULL COMMENT 'type=>text;print=>1',
  `value` text COMMENT 'type=>text;print=>1',
  `mod` int(11) DEFAULT '1' COMMENT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `configs`
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
-- Struttura della tabella `crypted_configs`
--

CREATE TABLE `crypted_configs` (
  `id` int(11) NOT NULL,
  `code` varchar(450) DEFAULT NULL COMMENT 'print=>1;order=>0;type=>text;specs=>;multiple=>;required=>',
  `value` varchar(450) DEFAULT NULL COMMENT 'print=>1;order=>0;type=>password;specs=>;multiple=>;required=>'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `crypted_configs`
--

INSERT INTO `crypted_configs` (`id`, `code`, `value`) VALUES
(35, 'session_code', 'w+DZzNjT59bW4pw='),
(36, 'engine_locked', 'kQ==');

-- --------------------------------------------------------

--
-- Struttura della tabella `db_backup`
--

CREATE TABLE `db_backup` (
  `id` int(11) NOT NULL,
  `backup_name` varchar(400) NOT NULL,
  `backup_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `htaccess`
--

CREATE TABLE `htaccess` (
  `id` int(6) UNSIGNED NOT NULL,
  `line` text COMMENT 'print=>1;order=>2;type=>textarea;specs=>html;multiple=>;required=>',
  `active` varchar(2) DEFAULT NULL COMMENT 'print=>1;order=>0;type=>select;specs=>[SI,NO];multiple=>;required=>',
  `ordine` int(11) DEFAULT NULL COMMENT 'print=>1;order=>1;type=>text;specs=>;multiple=>;required=>'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `htaccess`
--

INSERT INTO `htaccess` (`id`, `line`, `active`, `ordine`) VALUES
(1, 'RewriteRule documentation/([^/]+)/([^/]+) index.php?page=documentation&id=$1 [L]', '0', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `output_name` varchar(20) NOT NULL,
  `uni_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `languages`
--

INSERT INTO `languages` (`id`, `output_name`, `uni_code`) VALUES
(7, 'Italiano', 'it');

-- --------------------------------------------------------

--
-- Struttura della tabella `menu`
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
-- Struttura della tabella `newsletter_sent`
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
-- Dump dei dati per la tabella `newsletter_sent`
--

INSERT INTO `newsletter_sent` (`id`, `data`, `corpo`, `oggetto`, `allegato`, `utenti`, `inviata`, `campagna`) VALUES
(1, '2015-09-27 22:00:00', 'test', 'test', '', 'tutti', 0, 'test');

-- --------------------------------------------------------

--
-- Struttura della tabella `newsletter_tracking`
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
-- Struttura della tabella `newsletter_users`
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
-- Dump dei dati per la tabella `newsletter_users`
--

INSERT INTO `newsletter_users` (`id`, `liste`, `nome`, `cognome`, `email`, `pass`, `verificato`) VALUES
(3861, 'amministratori,tutti', 'Sebastiano', 'Cataudo', 'sebastiano.cataudo@gmail.com', '', '1');

-- --------------------------------------------------------

--
-- Struttura della tabella `pages`
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
-- Dump dei dati per la tabella `pages`
--

INSERT INTO `pages` (`id`, `permalink`, `language`, `title`, `subtitle`, `content`, `ref_page`, `cover_image`, `meta_description`, `meta_keywords`, `change_freq`, `priority`) VALUES
(14, 'splash', 'it', 'Splash', '', '', 'splash.php', '', '', '', 'always', '0'),
(15, 'homepage', 'it', 'Homepage', '', '<p>Quisque velit nisi, pretium ut lacinia in, elementum id enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor lectus nibh. Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor eget felis porttitor volutpat. Proin eget tortor risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec sollicitudin molestie malesuada.</p>\r\n<p>Quisque velit nisi, pretium ut lacinia in, elementum id enim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor lectus nibh. Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor eget felis porttitor volutpat. Proin eget tortor risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec sollicitudin molestie malesuada.</p>', 'homepage.php', '', '', '', 'always', '0');

-- --------------------------------------------------------

--
-- Struttura della tabella `tracking`
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
-- Struttura della tabella `translations`
--

CREATE TABLE `translations` (
  `id` int(11) NOT NULL,
  `globale` varchar(255) DEFAULT NULL COMMENT 'print=>1;order=>1;type=>custom;specs=>;multiple=>;required=>',
  `is_html` varchar(2) DEFAULT NULL COMMENT 'print=>;order=>2;type=>select;specs=>[SI,NO];multiple=>;required=>',
  `locales` longtext COMMENT 'print=>1;order=>4;type=>custom;specs=>;multiple=>;required=>',
  `is_js` varchar(2) DEFAULT NULL COMMENT 'print=>;order=>3;type=>select;specs=>[SI,NO];multiple=>;required=>'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `translations`
--

INSERT INTO `translations` (`id`, `globale`, `is_html`, `locales`, `is_js`) VALUES
(1, 'linktwitter', NULL, '[{"language":"it","locale":"<p>http://twitter.com</p>"}]', NULL),
(2, 'linkfacebook', NULL, '[{"language":"it","locale":"<p>http://facebook.com</p>"}]', NULL);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `crypted_configs`
--
ALTER TABLE `crypted_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `db_backup`
--
ALTER TABLE `db_backup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `backup_name` (`backup_name`);

--
-- Indici per le tabelle `htaccess`
--
ALTER TABLE `htaccess`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `newsletter_sent`
--
ALTER TABLE `newsletter_sent`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `newsletter_tracking`
--
ALTER TABLE `newsletter_tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `newsletter_users`
--
ALTER TABLE `newsletter_users`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT per la tabella `crypted_configs`
--
ALTER TABLE `crypted_configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT per la tabella `db_backup`
--
ALTER TABLE `db_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `htaccess`
--
ALTER TABLE `htaccess`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT per la tabella `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `newsletter_sent`
--
ALTER TABLE `newsletter_sent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `newsletter_tracking`
--
ALTER TABLE `newsletter_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `newsletter_users`
--
ALTER TABLE `newsletter_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3862;
--
-- AUTO_INCREMENT per la tabella `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT per la tabella `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
