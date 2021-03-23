

CREATE TABLE `datatype_esercenti` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL COMMENT 'print=>1;order=>;type=>text;specs=>;multiple=>;required=>required;',
  `banner` varchar(100) DEFAULT NULL COMMENT 'print=>1;order=>;type=>file;specs=>;multiple=>;required=>required;',
  `tipologia` varchar(100) DEFAULT NULL COMMENT 'print=>1;order=>;type=>text;specs=>;multiple=>;required=>;',
  `comune` varchar(100) DEFAULT NULL COMMENT 'print=>1;order=>;type=>text;specs=>;multiple=>;required=>;',
  `descrizione` longtext COMMENT 'print=>;order=>;type=>textarea;specs=>;multiple=>;required=>;',
  `facebook` varchar(400) DEFAULT NULL COMMENT 'print=>;order=>;type=>text;specs=>;multiple=>;required=>;',
  `instagram` varchar(400) DEFAULT NULL COMMENT 'print=>;order=>;type=>text;specs=>;multiple=>;required=>;',
  `twitter` varchar(400) DEFAULT NULL COMMENT 'print=>;order=>;type=>text;specs=>;multiple=>;required=>;',
  `website` varchar(400) DEFAULT NULL COMMENT 'print=>;order=>;type=>text;specs=>;multiple=>;required=>;',
  `coordinate` varchar(50) DEFAULT NULL COMMENT 'print=>;order=>;type=>text;specs=>;multiple=>;required=>;',
  `sconto` longtext COMMENT 'print=>1;order=>;type=>text;specs=>;multiple=>;required=>;',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




