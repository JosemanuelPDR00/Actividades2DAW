CREATE DATABASE IF NOT EXISTS baselogin;
USE baselogin;

CREATE TABLE  usuarios(
	Id INT (255) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    nombre varchar(255),
    clave varchar(255)
) ENGINE=INNODB;