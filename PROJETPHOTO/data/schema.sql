drop table utilisateur;
drop table photo;

CREATE TABLE utilisateur (
	`id` INT AUTO_INCREMENT UNIQUE,
	`nom` VARCHAR(20) NOT NULL,
    `prenom` VARCHAR(20) NOT NULL,
    `departement` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`id`),
) ENGINE=InnoDB;

CREATE TABLE photo (
	`id` INT AUTO_INCREMENT UNIQUE,
    `like` INT AUTO_INCREMENT 0,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;
