DROP DATABASE IF EXISTS gestor;
CREATE DATABASE gestor;

DROP USER IF EXISTS 'adminGestor'@'localhost';
CREATE USER 'adminGestor'@'localhost' IDENTIFIED BY 'aa';
USE gestor;

GRANT ALL ON gestor.*TO 'adminGestor';

CREATE TABLE Usuario(
    idUser int AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(200) NOT NULL,
    correo varchar(200) UNIQUE,
    pass varchar(200) UNIQUE,
    foto longblob NOT NULL,
    apellido1 varchar(200) NOT NULL,
    apellido2 varchar(200),
    fechaNac date NOT NULL
);

CREATE TABLE Administrador(
    idAdmin int AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(200) NOT NULL,
    correo varchar(200) UNIQUE,
    pass varchar(200) UNIQUE,
    foto longblob NOT NULL,
    apellido1 varchar(200) NOT NULL,
    apellido2 varchar(200),
    fechaNac date NOT NULL
);
CREATE TABLE Producto(
    Nif VARCHAR(200) PRIMARY KEY,
    cantidad int NOT NULL,
    proveedor varchar(200) NOT NULL,
    nombreProducto varchar(200) NOT NULL,
    fotoProducto longblob NOT NULL,
    categoria varchar(200) NOT NULL,
    precio decimal(10,2) NOT NULL,
    descripcion varchar(500) NOT NULL
);
CREATE TABLE Pedir(
    Nif VARCHAR(200),
    idUser int,
    unidad int NOT NULL,
    precioTotal decimal (10,2) NOT NULL,
    FOREIGN KEY (Nif) REFERENCES Producto (Nif) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (idUser) REFERENCES Usuario (idUser) ON UPDATE CASCADE ON DELETE CASCADE,
    PRIMARY KEY (Nif,idUser) 
);