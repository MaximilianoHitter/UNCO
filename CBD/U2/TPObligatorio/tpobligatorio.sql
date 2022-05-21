CREATE DATABASE cine;
USE cine;
CREATE TABLE persona(
    tipodoc VARCHAR(20) NOT NULL,
    nrodocumento INT(11) NOT NULL,
    apellido VARCHAR(30) NOT NULL,
    nombre VARCHAR(30) NOT NULL,
    fechanacimiento DATE,
    telefono VARCHAR(30),
    correoelectronico VARCHAR(40),
    PRIMARY KEY (tipoDoc, NroDocumento)
)ENGINE=InnoDB;
/*Persona tabla creada*/
CREATE TABLE cliente(
    tipodoc VARCHAR(20) NOT NULL,
    nrodocumento INT(11) NOT NULL, 
    situacionfiscal VARCHAR(100),
    CONSTRAINT FK_personacliente FOREIGN KEY (tipodoc, nrodocumento) REFERENCES persona(tipodoc, nrodocumento) 
    ON UPDATE CASCADE  
    ON DELETE CASCADE,
    PRIMARY KEY(tipodoc, nrodocumento)
)ENGINE=InnoDB;
/*Cliente tabla creada*/
CREATE TABLE encargado(
    tipodoc VARCHAR(20) NOT NULL,
    nrodocumento INT(11) NOT NULL,
    legajo VARCHAR(10) NOT NULL,
    categoria VARCHAR(10) NOT NULL,
    CONSTRAINT FK_personaencargado FOREIGN KEY (tipodoc, nrodocumento) REFERENCES persona(tipodoc, nrodocumento) 
    ON UPDATE CASCADE  
    ON DELETE CASCADE,
    PRIMARY KEY(tipodoc, nrodocumento)
)ENGINE=InnoDB;
/*Encargado tabla creada*/
CREATE TABLE publicidad(
    idpublicidad INT(11) NOT NULL AUTO_INCREMENT,
    duracion VARCHAR(20) NOT NULL,
    PRIMARY KEY (idpublicidad)
)ENGINE=InnoDB;
/*Publicidad tabla creada*/
CREATE TABLE sala(
    idsala INT(10) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(20) NOT NULL,
    cantidadasientos INT(10),
    tipo VARCHAR(20),
    tipodoc VARCHAR(20) NOT NULL,
    nrodocumento INT(11) NOT NULL,
    CONSTRAINT FK_personasala FOREIGN KEY (tipodoc, nrodocumento) REFERENCES persona(tipodoc, nrodocumento) 
    ON UPDATE CASCADE  
    ON DELETE CASCADE,
    PRIMARY KEY (idsala)
)ENGINE=InnoDB;
/*Sala tabla creada*/
CREATE TABLE asiento(
    idsala INT(10) NOT NULL,
    nroasiento INT(10) NOT NULL,
    fila INT(10),
    CONSTRAINT FK_salaasiento FOREIGN KEY (idsala) REFERENCES sala(idsala) 
    ON UPDATE CASCADE  
    ON DELETE CASCADE,
    PRIMARY KEY(idsala, nroasiento)
)ENGINE=InnoDB;
