drop table users;
drop table photo;

CREATE TABLE users (
	`id` INT NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(20) NOT NULL,
	`password` VARCHAR(250) NOT NULL,
	`role` VARCHAR(20) NOT NULL default "users",
	PRIMARY KEY (`id`),
	UNIQUE (`username`)
) ENGINE=InnoDB;

INSERT INTO `users` (`username`, `password`, `role`, `is_published`) VALUES ("root", "gtrnet", "admin", 0);

CREATE TABLE photo (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nom` TEXT NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;
