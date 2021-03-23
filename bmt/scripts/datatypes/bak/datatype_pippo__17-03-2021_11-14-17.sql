

CREATE TABLE `datatype_pippo` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `pipposi` varchar(15) DEFAULT NULL COMMENT 'print=>1;order=>1;type=>text;specs=>;multiple=>;required=>required',
  `pippono` varchar(18) DEFAULT NULL COMMENT 'print=>1;order=>2;type=>text;specs=>;multiple=>;required=>required',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




