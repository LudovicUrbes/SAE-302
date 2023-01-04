CREATE DATABASE projet;

CREATE USER 'php'@'localhost' IDENTIFIED BY 'web';
GRANT ALL PRIVILEGES ON * . * TO 'php'@'localhost';

use projet;

drop table users;
drop table images;

CREATE TABLE users (
    `id` INT AUTO_INCREMENT UNIQUE,
    `email` VARCHAR(50) NOT NULL UNIQUE,
    `password` VARCHAR(50) NOT NULL,
    `vote_possible` INT default 1,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB;

CREATE TABLE images(
    `id` INT AUTO_INCREMENT UNIQUE,
    `url` VARCHAR(50) NOT NULL UNIQUE,
    `likes` INT default 0,
    `user_id` INT NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO `users` (`email`, `password`) VALUES ("gautier.leroux@etu.univ-poitiers.fr", "gtrnet");
INSERT INTO `users` (`email`, `password`) VALUES ("eliott.marceau@etu.univ-poitiers.fr", "gtrnet");
INSERT INTO `users` (`email`, `password`) VALUES ("alan.de.lijster@etu.univ-poitiers.fr", "gtrnet");
INSERT INTO `users` (`email`, `password`) VALUES ("ludovic.urbes@etu.univ-poitiers.fr", "gtrnet");