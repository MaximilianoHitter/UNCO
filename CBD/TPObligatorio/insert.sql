INSERT INTO persona VALUES ('DNI', '38258043', 'Pepon', 'Pepe', '1994-04-11', '1550983485', 'pepito@yahoo.com');
/*Ok*/
INSERT INTO encargado VALUES ('DNI', '38258043', 'FAI-3523', 'Empleado');
/*Ok*/
INSERT INTO publicidad VALUES(default, '00:50');
INSERT INTO publicidad VALUES(default, '00:20');
INSERT INTO sala VALUES(default, 'Monster', 30, 'Comodos', 'DNI', '38258043');
INSERT INTO funcion VALUES(default, '2022-06-24', '20:00', 1, 2, 1);
UPDATE funcion SET hora='20:00' WHERE fecha='2022-06-24';
/*Ok*/
INSERT INTO persona VALUES('DNI', 12345678, 'Jose', 'Juan', '1991-01-30', '456789', 'josecito@pepe.com');
INSERT INTO encargado VALUES('DNI', 12345678, 'FAI-PEPE', 'Jefe');
DELETE encargado FROM encargado LEFT JOIN sala ON encargado.tipodoc = sala.tipodoc AND encargado.nrodocumento =  sala.nrodocumento WHERE sala.nrodocumento IS NULL;
/*Ok*/
INSERT INTO persona VALUES('DNI', '15975346', 'Kabal', 'Juan', '2000-05-16', '45678985', 'popo@k.com');
INSERT INTO cliente VALUES('DNI', '15975346', 'EN DEUDA');
INSERT INTO asiento VALUES('1', '10', '10');
INSERT INTO entrada VALUES(default, 'DNI', '15975346', '10', '1', '0', '2022-06-15');
SELECT e.numeroentrada, e.nroasiento, e.idsala, e.idfuncion FROM entrada AS e INNER JOIN funcion ON e.idfuncion = funcion.idfuncion AND e.idsala = funcion.idsala WHERE funcion.fecha > '2022-06-22';
/*Ok*/
INSERT INTO sala VALUES(default, '3D', 30, '3D', 'DNI', '38258043');
INSERT INTO asiento VALUES('2', '1', '1');
INSERT INTO asiento VALUES('2', '2', '1');
INSERT INTO asiento VALUES('2', '3', '1');
INSERT INTO funcion VALUES( 1, '2022-06-23', '21:00', '2', 2, 1);
INSERT INTO entrada VALUES(default, 'DNI', '15975346', '2', '2', 1, '2022-06-22');
SELECT idsala, nroasiento, fila FROM asiento AS a WHERE NOT EXISTS(
    SELECT e.nroasiento, e.idsala FROM entrada AS e INNER JOIN sala AS s ON e.nroasiento = a.nroasiento AND e.idsala = a.idsala WHERE s.tipo = '3D'
);
/*Ok*/

