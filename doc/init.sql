CREATE TABLE `perso` (
	`id_perso` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`nom` VARCHAR(255) NOT NULL UNIQUE,
	`arme` INT UNSIGNED NOT NULL,
	`armeSecondaire` INT UNSIGNED,
	`armure` INT UNSIGNED,
	`miniature` VARCHAR(255) NOT NULL,
	`portrait` VARCHAR(255) NOT NULL,
	`pvmax` INT UNSIGNED NOT NULL,
	`force` INT UNSIGNED NOT NULL,
	`nbPotions` INT UNSIGNED NOT NULL,
	PRIMARY KEY (`id_perso`)
) ENGINE=innoDB;

CREATE TABLE `arme` (
	`id_arme` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`nom` VARCHAR(255) NOT NULL,
	`degats` INT NOT NULL,
	PRIMARY KEY (`id_arme`)
) ENGINE=innoDB;

CREATE TABLE `armure` (
	`id_armure` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`nom` VARCHAR(255) NOT NULL,
	`niveau` INT NOT NULL,
	PRIMARY KEY (`id_armure`)
) ENGINE=innoDB;

ALTER TABLE `perso` ADD CONSTRAINT `perso_fk_arme` FOREIGN KEY (`arme`) REFERENCES `arme`(`id_arme`);

ALTER TABLE `perso` ADD CONSTRAINT `perso_fk_armesecondaire` FOREIGN KEY (`armeSecondaire`) REFERENCES `arme`(`id_arme`);

ALTER TABLE `perso` ADD CONSTRAINT `perso_fk_armure` FOREIGN KEY (`armure`) REFERENCES `armure`(`id_armure`);