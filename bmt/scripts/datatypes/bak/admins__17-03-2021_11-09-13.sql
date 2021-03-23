

CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL COMMENT 'print=>1;order=>;type=>text;specs=>;multiple=>;required=>;',
  `password` varchar(255) DEFAULT NULL COMMENT 'print=>1;order=>;type=>text;specs=>;multiple=>;required=>;',
  `email` varchar(100) DEFAULT NULL COMMENT 'print=>1;order=>;type=>text;specs=>;multiple=>;required=>;',
  `image` varchar(400) DEFAULT NULL COMMENT 'print=>1;order=>;type=>text;specs=>;multiple=>;required=>;',
  `level` varchar(10) DEFAULT '0' COMMENT 'print=>1;type=>select;specs=>[SUPERUSER,ADMIN,USER]',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


INSERT INTO admins VALUES
("1","admin","wtfS1tM=","sebastiano.cataudo@gmail.com","","SUPERUSER"),
("2","admin","0MfO1dY=","admin","","SUPERUSER");


