CREATE DATABASE pruebaipoo;
USE pruebaipoo;
CREATE TABLE persona(
    dni INT(10) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(20) NOT NULL,
    apellido VARCHAR(20) NOT NULL,
    PRIMARY KEY(dni)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_unicode_ci;

CREATE TABLE empleado(
    dniempleado INT(10) NOT NULL,
    puesto VARCHAR(10) NOT NULL,
    CONSTRAINT FK_personaempleado FOREIGN KEY (dniempleado) REFERENCES persona(dni)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
    PRIMARY KEY (dniempleado)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_unicode_ci;

CREATE TABLE cliente(
    dnicliente INT(10) NOT NULL,
    credito INT(10),
    CONSTRAINT FK_personacliente FOREIGN KEY (dnicliente) REFERENCES persona(dni)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
    PRIMARY KEY (dnicliente)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_unicode_ci;

CREATE TABLE producto(
    id INT(5) NOT NULL AUTO_INCREMENT,
    descripcion VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_unicode_ci;

CREATE TABLE compra(
    idcompra INT(5) NOT NULL AUTO_INCREMENT,
    dnicliente INT(10) NOT NULL,
    dniempleado INT(10) NOT NULL, 
    idproducto INT(5) NOT NULL,
    CONSTRAINT FK_clientecompra FOREIGN KEY (dnicliente) REFERENCES cliente(dnicliente)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
    CONSTRAINT FK_empleadocompra FOREIGN KEY (dniempleado) REFERENCES empleado(dniempleado)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
    CONSTRAINT FK_productocompra FOREIGN KEY (idproducto) REFERENCES producto(id)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
    PRIMARY KEY (idcompra)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_unicode_ci;

/*Agregar a todas las tablas la codificacion pa que no de problema
DEFAULT CHARSET=utf8 COLLATE utf8_unicode_cl