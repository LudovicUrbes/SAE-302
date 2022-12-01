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
    `mdp` VARCHAR(50) NOT NULL,
    `vote_possible` INT default 1,
    `choix` INT NULL,
    `condition` INT default 0,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO `utilisateur` (`prenom`, `nom`, `departement`, `email`, `mdp`, `condition`) VALUES ("Gautier", "LEROUX", "R&eacuteseaux et T&eacutel&eacutecommunications", "gautier.leroux@etu.univ-poitiers.fr", "gtrnet", "1");
INSERT INTO `utilisateur` (`prenom`, `nom`, `departement`, `email`, `mdp`, `condition`) VALUES ("Ludovic", "URBES", "R&eacuteseaux et T&eacutel&eacutecommunications", "ludovic.urbes@etu.univ-poitiers.fr", "gtrnet", "1");
INSERT INTO `utilisateur` (`prenom`, `nom`, `departement`, `email`, `mdp`, `condition`) VALUES ("Eliott", "MARCEAU", "R&eacuteseaux et T&eacutel&eacutecommunications", "eliott.marceau@etu.univ-poitiers.fr", "gtrnet", "1");
INSERT INTO `utilisateur` (`prenom`, `nom`, `departement`, `email`, `mdp`, `condition`) VALUES ("Alan", "DE LIJSTER", "R&eacuteseaux et T&eacutel&eacutecommunications", "alan.de.lijster@etu.univ-poitiers.fr", "gtrnet", "1");

CREATE TABLE photo (
    `id` INT AUTO_INCREMENT UNIQUE,
    `stockage` VARCHAR(50) NOT NULL,
    `legend` VARCHAR(100) NOT NULL,
    `like` INT default 0,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO `photo` (`stockage`, `legend`, `like`) VALUES ("../data/img/", "Petite écursion", "5");
