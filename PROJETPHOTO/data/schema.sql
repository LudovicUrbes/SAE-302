drop table users;
drop table questions;

drop table utilisateur;
drop table photo;

CREATE TABLE utilisateur (
    `id` INT AUTO_INCREMENT UNIQUE,
    `prenom` VARCHAR(20) NOT NULL,
    `nom` VARCHAR(20) NOT NULL,
    `departement` VARCHAR(20) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `vote_possible` INT default 1,
    `choix` INT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO `utilisateur` (`prenom`, `nom`, `departement`, `email` ) VALUES ("Gauthier", "LEROUX", "R&T", "leroux@etu.univ-poitiers.fr");

CREATE TABLE photo (
    `id` INT AUTO_INCREMENT UNIQUE,
    `stockage` VARCHAR(50) NOT NULL,
    `legend` VARCHAR(100) NOT NULL,
    `like` INT default 0,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;
