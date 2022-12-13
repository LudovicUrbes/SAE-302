CREATE DATABASE projet;

CREATE USER 'php'@'localhost' IDENTIFIED BY 'web';
GRANT ALL PRIVILEGES ON * . * TO 'php'@'localhost';

use projet;

drop table utilisateur;
drop table photo;

CREATE TABLE utilisateur (
    `id` INT AUTO_INCREMENT UNIQUE,
    `email` VARCHAR(50) NOT NULL UNIQUE,
    `mdp` VARCHAR(50) NOT NULL,
    `vote_possible` INT default 1,
    `choix` INT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO `utilisateur` (`email`, `mdp`) VALUES ("gautier.leroux@etu.univ-poitiers.fr", "gtrnet");
INSERT INTO `utilisateur` (`email`, `mdp`) VALUES ("ludovic.urbes@etu.univ-poitiers.fr", "gtrnet";
INSERT INTO `utilisateur` (`email`, `mdp`) VALUES ("eliott.marceau@etu.univ-poitiers.fr", "gtrnet");
INSERT INTO `utilisateur` (`email`, `mdp`) VALUES ("alan.de.lijster@etu.univ-poitiers.fr", "gtrnet");
INSERT INTO `utilisateur` (`email`, `mdp`) VALUES ("admin", "gtrnet");

CREATE TABLE photo (
    `id` INT AUTO_INCREMENT UNIQUE,
    `stockage` VARCHAR(50) NOT NULL,
    `legend` VARCHAR(100) NOT NULL,
    `like` INT default 0,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO `photo` (`stockage`, `legend`, `like`) VALUES ("../data/img/", "Petite écursion", "5");
