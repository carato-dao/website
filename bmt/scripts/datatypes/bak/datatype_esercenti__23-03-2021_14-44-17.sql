

CREATE TABLE `datatype_esercenti` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL COMMENT 'print=>1;order=>1;type=>text;specs=>;multiple=>;required=>required;',
  `banner` varchar(100) DEFAULT NULL COMMENT 'print=>1;order=>2;type=>file;specs=>;multiple=>;required=>required;',
  `tipologia` varchar(100) DEFAULT NULL COMMENT 'print=>1;order=>3;type=>text;specs=>;multiple=>;required=>;',
  `comune` varchar(100) DEFAULT NULL COMMENT 'print=>1;order=>4;type=>text;specs=>;multiple=>;required=>;',
  `descrizione` longtext COMMENT 'print=>;order=>11;type=>textarea;specs=>;multiple=>;required=>;',
  `facebook` varchar(400) DEFAULT NULL COMMENT 'print=>;order=>5;type=>text;specs=>;multiple=>;required=>;',
  `instagram` varchar(400) DEFAULT NULL COMMENT 'print=>;order=>6;type=>text;specs=>;multiple=>;required=>;',
  `twitter` varchar(400) DEFAULT NULL COMMENT 'print=>;order=>7;type=>text;specs=>;multiple=>;required=>;',
  `website` varchar(400) DEFAULT NULL COMMENT 'print=>;order=>8;type=>text;specs=>;multiple=>;required=>;',
  `coordinate` varchar(50) DEFAULT NULL COMMENT 'print=>;order=>9;type=>text;specs=>;multiple=>;required=>;',
  `sconto` longtext COMMENT 'print=>1;order=>10;type=>text;specs=>;multiple=>;required=>;',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




