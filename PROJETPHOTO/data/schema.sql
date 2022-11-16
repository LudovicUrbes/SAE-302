drop table utilisateur;
drop table photo;

CREATE TABLE utilisateur (
    `id` INT AUTO_INCREMENT UNIQUE,
    `nom` VARCHAR(20) NOT NULL,
    `prenom` VARCHAR(20) NOT NULL,
    `departement` VARCHAR(20) NOT NULL,
    `vote_possible` INT default 1,
    `choix` INT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO `utilisateur` (`nom`, `prenom`, `departement`) VALUES ("LEROUX", "Gauthier", "R&T");

CREATE TABLE photo (
    `id` INT AUTO_INCREMENT UNIQUE,
    `stockage` NOT NULL,
    `legend` VARCHAR(100) NOT NULL,
    `like` INT default 0,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;
