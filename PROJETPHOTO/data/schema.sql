CREATE USER 'php'@'localhost' IDENTIFIED BY 'web';
GRANT ALL PRIVILEGES ON * . * TO 'php'@'localhost';

drop table utilisateur;
drop table photo;

CREATE TABLE utilisateur (
    `id` INT AUTO_INCREMENT UNIQUE,
    `prenom` VARCHAR(20) NOT NULL UNIQUE,
    `nom` VARCHAR(20) NOT NULL UNIQUE,
    `departement` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) NOT NULL UNIQUE,
    `vote_possible` INT default 1,
    `choix` INT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO `utilisateur` (`prenom`, `nom`, `departement`, `email` ) VALUES ("Gautier", "LEROUX", "Réseaux et Télécommunications", "gautier.leroux@etu.univ-poitiers.fr");
INSERT INTO `utilisateur` (`prenom`, `nom`, `departement`, `email` ) VALUES ("Ludovic", "URBES", "Réseaux et Télécommunications", "ludovic.urbes@etu.univ-poitiers.fr");
INSERT INTO `utilisateur` (`prenom`, `nom`, `departement`, `email` ) VALUES ("Eliott", "MARCEAU", "Réseaux et Télécommunications", "eliott.marceau@etu.univ-poitiers.fr");


CREATE TABLE photo (
    `id` INT AUTO_INCREMENT UNIQUE,
    `stockage` VARCHAR(50) NOT NULL,
    `legend` VARCHAR(100) NOT NULL,
    `like` INT default 0,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;
