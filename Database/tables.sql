CREATE TABLE `company` (
  `id` int(20) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `tenpoints` varchar(200) DEFAULT 'You used your seatbelt',
  `twentypoints` varchar(200) DEFAULT 'You properly logged your miles',
  `thirtypoints` varchar(200) DEFAULT 'You stopped a maximum of 2 times per 300 miles',
  `fortypoints` varchar(200) DEFAULT 'You excuted a routine vehicle check',
  `categoryone` varchar(45) NOT NULL,
  `categorytwo` varchar(45) NOT NULL,
  `categorythree` varchar(45) NOT NULL,
  `categoryfour` varchar(45) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `secAns` varchar(45) DEFAULT NULL,
  `companyN` varchar(45) DEFAULT NULL,
  `what` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `mname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `bmonth` varchar(45) DEFAULT NULL,
  `bday` varchar(45) DEFAULT NULL,
  `byear` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  `price` decimal(11,0) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `pointratio` decimal(11,0) DEFAULT NULL,
  `secAns` varchar(45) DEFAULT NULL,
  `companyN` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1000048 DEFAULT CHARSET=latin1;
CREATE TABLE `users_has_company` (
  `users_id` int(11) NOT NULL,
  `company_id` int(20) NOT NULL,
  PRIMARY KEY (`users_id`,`company_id`),
  KEY `fk_users_has_company_company1_idx` (`company_id`),
  KEY `fk_users_has_company_users_idx` (`users_id`),
  CONSTRAINT `fk_users_has_company_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_company_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
