CREATE DATABASE projet;

CREATE USER 'php'@'localhost' IDENTIFIED BY 'web';
GRANT ALL PRIVILEGES ON * . * TO 'php'@'localhost';

use projet;

DROP TABLE users;
DROP TABLE images;
DROP TABLE dates;

CREATE TABLE users (
    `id` INT AUTO_INCREMENT UNIQUE,
    `email` VARCHAR(50) NOT NULL UNIQUE,
    `password` VARCHAR(50) NOT NULL,
    `vote_possible` INT default 0,
    `banned` INT default 0,
    `auth` VARCHAR(50) NOT NULL default 'users',
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB;

CREATE TABLE images(
    `id` INT AUTO_INCREMENT UNIQUE,
    `url` VARCHAR(100) NOT NULL,
    `likes` INT default 0,
    `user_id` INT NOT NULL UNIQUE,
    `hash` CHAR(32) NOT NULL UNIQUE,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE dates(
    `id` INT AUTO_INCREMENT UNIQUE,
    `fin_envoi` DATETIME NOT NULL,
    `debut_vote` DATETIME NOT NULL,
    `fin_vote` DATETIME NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO `users` (`email`, `password`) VALUES ("gautier.leroux@etu.univ-poitiers.fr", "gtrnet");
INSERT INTO `users` (`email`, `password`, `auth`) VALUES ("eliott.marceau@etu.univ-poitiers.fr", "gtrnet", "admin");
INSERT INTO `users` (`email`, `password`, `auth`) VALUES ("alan.de.lijster@etu.univ-poitiers.fr", "gtrnet", "admin");
INSERT INTO `users` (`email`, `password`, `auth`) VALUES ("ludovic.urbes@etu.univ-poitiers.fr", "gtrnet", "admin");
INSERT INTO `users` (`email`, `password`, `auth`) VALUES ("benoit.tremblais@univ-poitiers.fr", "gtrnet", "admin");

INSERT INTO `dates` (`fin_envoi`, `debut_vote`, `fin_vote`) VALUES ('2023-01-01 00:00:00', '2023-01-01 00:00:00', '2023-01-01 00:00:00');
