CREATE DATABASE projet;

CREATE USER 'php'@'localhost' IDENTIFIED BY 'web';
GRANT ALL PRIVILEGES ON * . * TO 'php'@'localhost';

use projet;

CREATE TABLE users (
    `id` INT AUTO_INCREMENT UNIQUE,
    `email` VARCHAR(50) NOT NULL UNIQUE,
    `password` VARCHAR(50) NOT NULL,
    `vote_possible` INT default 0,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB;

CREATE TABLE images(
    `id` INT AUTO_INCREMENT UNIQUE,
    `url` VARCHAR(100) NOT NULL,
    `likes` INT default 0,
    `user_id` INT NOT NULL UNIQUE,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO `users` (`id`,`email`, `password`) VALUES ("103","gautier.leroux@etu.univ-poitiers.fr", "gtrnet");
INSERT INTO `users` (`id`,`email`, `password`) VALUES ("102","eliott.marceau@etu.univ-poitiers.fr", "gtrnet");
INSERT INTO `users` (`id`,`email`, `password`) VALUES ("101","alan.de.lijster@etu.univ-poitiers.fr", "gtrnet");
INSERT INTO `users` (`id`, `email`, `password`) VALUES ("100", "ludovic.urbes@etu.univ-poitiers.fr", "gtrnet");