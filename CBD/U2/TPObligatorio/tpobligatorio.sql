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
/*Asiento tabla creada*/ 
CREATE TABLE funcion(
    idfuncion INT(10) NOT NULL,
    fecha DATE NOT NULL,
    hora TIME NOT NULL,
    idsala INT(10) NOT NULL,
    idpublicidadinicio (11) NOT NULL,
    idpublicidadfinal (11) NOT NULL,
    CONSTRAINT FK_salafuncion FOREIGN KEY (idsala) REFERENCES sala(idsala)
    ON UPDATE CASCADE 
    ON DELETE CASCADE,
    CONSTRAINT FK_publicidadfuncioninicio FOREIGN KEY (idpublicidadinicio) REFERENCES publicidad(idpublicidad)
    ON UPDATE CASCADE 
    ON DELETE CASCADE,
    CONSTRAINT FK_publicidadfuncionfinal FOREIGN KEY (idpublicidadfinal) REFERENCES publicidad(idpublicidad)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
    PRIMARY KEY (idfuncion)
)ENGINE=InnoDB;
/*Funcion tabla con error en la FK de publicidad*/
CREATE TABLE prefiere(
    tipodoc VARCHAR(20) NOT NULL,
    nrodocumento INT(11) NOT NULL,
    idpublicidad INT(11) NOT NULL,
    motivo VARCHAR(200),
    CONSTRAINT FK_clienteprefiere FOREIGN KEY (tipodoc, nrodocumento) REFERENCES cliente(tipodoc, nrodocumento)
    ON UPDATE CASCADE 
    ON DELETE CASCADE,
    CONSTRAINT FK_publicidadprefiere FOREIGN KEY (idpublicidad) REFERENCES publicidad(idpublicidad) 
    ON UPDATE CASCADE 
    ON DELETE CASCADE,
    PRIMARY KEY (tipodoc, nrodocumento, idpublicidad)
)ENGINE=InnoDB;
/*Prefiere tabla con error de agregar las foreign key*/   
CREATE TABLE entrada(
    numeroentrada INT(10) NOT NULL AUTO_INCREMENT,
    tipodoc VARCHAR(20) NOT NULL,
    nrodocumento INT(11) NOT NULL,
    nroasiento INT(10) NOT NULL,
    idsala INT(10) NOT NULL,
    idfuncion INT(10) NOT NULL,
    fechaemision DATE NOT NULL,
    CONSTRAINT FK_clienteentrada FOREIGN KEY (tipodoc, nrodocumento) REFERENCES cliente(tipodoc, nrodocumento)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
    CONSTRAINT FK_asientoentrada FOREIGN KEY (idsala, nroasiento) REFERENCES asiento(idsala, nroasiento)
    ON UPDATE CASCADE,
    ON DELETE CASCADE,
    CONSTRAINT FK_funcionentrada FOREIGN KEY (idfuncion) REFERENCES funcion (idfuncion)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
    PRIMARY KEY (tipodoc, nrodocumento, nroasiento, idsala, idfuncion)
)ENGINE=InnoDB;
/*No la probe*/     