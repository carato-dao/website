

CREATE TABLE `datatype_associazioni` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(400) DEFAULT NULL COMMENT 'print=>1;order=>1;type=>text;specs=>;multiple=>;required=>required;',
  `logo` varchar(100) DEFAULT NULL COMMENT 'print=>;order=>2;type=>file;specs=>;multiple=>;required=>required;',
  `preview` longtext COMMENT 'print=>1;order=>4;type=>textarea;specs=>;multiple=>;required=>required;',
  `facebook` varchar(400) DEFAULT NULL COMMENT 'print=>1;order=>6;type=>text;specs=>;multiple=>;required=>;',
  `twitter` varchar(400) DEFAULT NULL COMMENT 'print=>;order=>7;type=>text;specs=>;multiple=>;required=>;',
  `instagram` varchar(400) DEFAULT NULL COMMENT 'print=>;order=>8;type=>text;specs=>;multiple=>;required=>;',
  `website` varchar(400) DEFAULT NULL COMMENT 'print=>;order=>9;type=>text;specs=>;multiple=>;required=>;',
  `descrizione` longtext COMMENT 'print=>;order=>5;type=>textarea;specs=>;multiple=>;required=>;',
  `banner` varchar(100) DEFAULT NULL COMMENT 'print=>;order=>3;type=>file;specs=>;multiple=>;required=>;',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




