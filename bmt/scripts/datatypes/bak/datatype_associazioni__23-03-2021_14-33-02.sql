

CREATE TABLE `datatype_associazioni` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(400) DEFAULT NULL COMMENT 'print=>1;order=>1;type=>text;specs=>;multiple=>;required=>required',
  `logo` varchar(100) DEFAULT NULL COMMENT 'print=>1;order=>;type=>file;specs=>;multiple=>;required=>required',
  `preview` longtext COMMENT 'print=>1;order=>;type=>textarea;specs=>;multiple=>;required=>required',
  `facebook` varchar(400) DEFAULT NULL COMMENT 'print=>1;order=>;type=>text;specs=>;multiple=>;required=>',
  `twitter` varchar(400) DEFAULT NULL COMMENT 'print=>1;order=>;type=>text;specs=>;multiple=>;required=>',
  `instagram` varchar(400) DEFAULT NULL COMMENT 'print=>1;order=>;type=>text;specs=>;multiple=>;required=>',
  `website` varchar(400) DEFAULT NULL COMMENT 'print=>1;order=>;type=>text;specs=>;multiple=>;required=>',
  `descrizione` longtext COMMENT 'print=>1;order=>;type=>textarea;specs=>;multiple=>;required=>',
  `banner` varchar(100) DEFAULT NULL COMMENT 'print=>1;order=>;type=>file;specs=>;multiple=>;required=>',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




