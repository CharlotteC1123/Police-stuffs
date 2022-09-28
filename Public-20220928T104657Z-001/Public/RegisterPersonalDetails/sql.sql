DROP TABLE IF EXISTS `user_login`;

CREATE TABLE `user_login`(
    `firstName` varchar(20) NOT NULL,
    `lastName` varchar(20) NOT NULL,
    `email` varchar(50) NOT NULL,
    `password` varchar(255) NOT NULL,
    PRIMARY KEY (`email`)
)ENGINE=InnoDB;

DROP TABLE IF EXISTS `police_login`;
CREATE TABLE `police_login`(
    `firstName` varchar(20) NOT NULL,
    `secondName` varchar(20) NOT NULL,
    `policeRank` varchar(50) NOT NULL,
    `policeNumber` INT(50) NOT NULL,
    `password` varchar(255) NOT NULL,
    PRIMARY KEY (`policeNumber`)
)ENGINE=InnoDB;

DROP TABLE IF EXISTS `report_stolen`;
CREATE TABLE `report_stolen`(
    `BikeID` INT(10) NOT NULL,
    `Latitude` DECIMAL(9,6) NOT NULL,
    `Longitude` DECIMAL(9,6) NOT NULL,
    `DateStolen` DATE NOT NULL,
    PRIMARY KEY (`BikeID`)
)ENGINE=InnoDB;