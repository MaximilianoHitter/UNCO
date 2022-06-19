/*Datos Jero*/ 
/*Insert de Persona*/  
INSERT INTO persona VALUES("DNI", 28518811,"Mennell","Gannon",'1990-02-15',7152227238, "gmennell0@washington.edu");
INSERT INTO persona VALUES("DNI",18634814,"Farlane","Erek",'2007-08-02', 9498655338, "efarlane1@mapy.cz");
INSERT INTO persona VALUES("DNI",23772939, "Dendon","Eldon",'2007-01-12' ,9318127741, "edendon2@jigsy.com");
INSERT INTO persona VALUES("DNI",13186016, "Allatt","Joey",'1985-05-06',1757365630,"jallatt3@marriott.com");
INSERT INTO persona VALUES("DNI",30581547,"Pauncefort","Abigael",'1988-05-03',7919046620,"apauncefort5@latimes.com");
INSERT INTO persona VALUES("DNI",24021299, "Ethelston","Tani", '1986-07-14',3593463224,"tethelston6@ebay.co.uk"); 
INSERT INTO persona VALUES("DNI",30529305,"Cockerill","Vic", '2014-04-17',9424819530,"vcockerill8@nasa.gov");
INSERT INTO persona VALUES("DNI",15730982,"Peers","Gussy",'1988-06-25',5941170522,"gpeersa@sun.com");
INSERT INTO persona VALUES("DNI",12268313,"D'Aguanno","Goldie",'2014-03-03',7327799132,"gdaguannob@whitehouse.gov");
INSERT INTO persona VALUES("DNI",36912002,"Blackshaw","Alejandrina",'1984-01-05',7724594667,"ablackshawc@princeton.edu");
INSERT INTO persona VALUES("DNI",25310359,"Bernini","Charmane",'2001-11-06',3692168326,"cberninie@amazon.com");
INSERT INTO persona VALUES("DNI",41556279,"Gaskamp","Webb",'1996-10-05',6049574082,"wgaskampg@ebay.com");
INSERT INTO persona VALUES ("DNI", 42546824, "Rojo", "Jeronimo", "1999-08-24", "2984563486", "personita@gmail.com");
INSERT INTO persona VALUES ("DNI", 42345122, "Hitter", "Maximiliano", "1997-01-3", "29843334244", "personita3@gmail.com");
INSERT INTO persona VALUES ("DNI", 42346954, "Valicenti", "Sergio", "1998-03-14", "2984405279", "personita1@gmail.com");

/*Insert de Encargado*/
INSERT INTO encargado VALUES ("DNI", 42546824, "FAI-345", "Empleado");
INSERT INTO encargado VALUES ("DNI", 42345122, "FAI-322", "Empleado");
INSERT INTO encargado VALUES ("DNI", 42346954, "FAI-221", "Empleado");
INSERT INTO encargado VALUES("DNI",30581547 ,"FAI-353", "Empleado");

/*Insert de Cliente*/   
INSERT INTO cliente VALUES("DNI",12268313,"Dependencia");
INSERT INTO cliente VALUES("DNI",13186016,"Dependencia");
INSERT INTO cliente VALUES("DNI", 15730982,"Desempleado");
INSERT INTO cliente VALUES("DNI",18634814,"Dependencia");
INSERT INTO cliente VALUES("DNI", 23772939,"Monotributista");
INSERT INTO cliente VALUES("DNI",24021299,"Desempleado");
INSERT INTO cliente VALUES("DNI",28518811,"Monotributista");
INSERT INTO cliente VALUES("DNI", 30529305 ,"Monotributista");
INSERT INTO cliente VALUES("DNI",30581547 ,"Monotributista");

/*Insert de Publicidad*/
INSERT INTO publicidad VALUES(1, '00:05:18');
INSERT INTO publicidad VALUES(2, '00:05:22');
INSERT INTO publicidad VALUES(3, '00:02:30');
INSERT INTO publicidad VALUES(4, '00:02:10');
INSERT INTO publicidad VALUES(5, '00:04:12');
INSERT INTO publicidad VALUES(6, '00:02:20');

/*Insert de Sala*/
INSERT INTO sala VALUES (1, "Monster", 40, "3D", "DNI",42546824);
INSERT INTO sala VALUES (2, "Monster", 35, "3D", "DNI",42345122);
INSERT INTO sala VALUES (3, "Normal", 40, "2D", "DNI",42346954);
INSERT INTO sala VALUES (4, "Normal", 30, "3D", "DNI", 42346954);

/*Insert de Funcion*/   
INSERT INTO funcion VALUES(1, '2022-06-24', '19:00', 1, 3, 6);
INSERT INTO funcion VALUES(2, '2022-06-25', '21:00', 2, 4, 6);
INSERT INTO funcion VALUES(3, '2021-06-27', '19:30', 3, 6, 3);
INSERT INTO funcion VALUES(4, '2021-06-26', '16:30', 2, 3, 4);
INSERT INTO funcion VALUES(5, '2022-05-27', '15:30', 2, 1, 1);

/*Insert de Asiento*/   
INSERT INTO asiento VALUES (1, 1, 1);
INSERT INTO asiento VALUES (1, 2, 1);
INSERT INTO asiento VALUES (1, 3, 1);
INSERT INTO asiento VALUES (1, 4, 1);
INSERT INTO asiento VALUES (2, 1, 1);
INSERT INTO asiento VALUES (2, 2, 1);
INSERT INTO asiento VALUES (2, 3, 1);
INSERT INTO asiento VALUES (2, 4, 1);
INSERT INTO asiento VALUES (3, 1, 1);
INSERT INTO asiento VALUES (3, 2, 1);
INSERT INTO asiento VALUES (3, 3, 1);
INSERT INTO asiento VALUES (3, 4, 1); 
INSERT INTO asiento VALUES (4, 1, 1);
INSERT INTO asiento VALUES (4, 2, 1);
INSERT INTO asiento VALUES (4, 3, 1);
INSERT INTO asiento VALUES (4, 4, 1);

/*Insert de Entrada*/
INSERT INTO entrada VALUES (1, 'DNI', 12268313, 1, 1, 1, '2022-06-15');
INSERT INTO entrada VALUES (2, 'DNI', 13186016, 2, 2, 2, '2022-06-23');
INSERT INTO entrada VALUES (3, 'DNI', 15730982, 1, 2, 3, '2022-06-14');
INSERT INTO entrada VALUES (4, 'DNI', 18634814, 3, 3, 4, '2022-06-24');
INSERT INTO entrada VALUES (5, 'DNI', 12268313, 1, 2, 1, '2022-05-01');
INSERT INTO entrada VALUES (6, 'DNI', 12268313, 3, 2, 2, '2022-05-15');

/*3.a*/
/*Se insertaron en linea 19*/

/*3.b Ok*/
UPDATE funcion SET hora='20:00' WHERE fecha='2022-06-24';

/*3.c Ok*/
DELETE FROM encargado NOT EXISTS(SELECT * FROM encargado AS e JOIN sala AS s ON e.tipodoc = s.tipodoc AND e.nrodocumento = s.nrodocumento);/*No funciono*/
DELETE encargado FROM encargado LEFT JOIN sala ON encargado.tipodoc = sala.tipodoc AND encargado.nrodocumento =  sala.nrodocumento WHERE sala.nrodocumento IS NULL AND sala.tipodoc IS NULL;

/*4.a Ok*/
SELECT e.numeroentrada, e.nroasiento, e.idsala, e.idfuncion FROM entrada AS e INNER JOIN funcion ON e.idfuncion = funcion.idfuncion AND e.idsala = funcion.idsala WHERE funcion.fecha > '2022-06-22';

/*4.b*/
SELECT asiento.idsala, asiento.nroasiento, asiento.fila FROM asiento LEFT JOIN entrada AS e ON asiento.idsala = e.idsala AND asiento.nroasiento = e.nroasiento JOIN sala AS s ON asiento.idsala = s.idsala WHERE s.tipo = '3D' AND e.numeroentrada IS NULL;


/*Sergio*/
SELECT * FROM asiento WHERE NOT EXISTS (SELECT entrada.idsala, entrada.nroasiento FROM entrada INNER JOIN sala ON entrada.idsala = sala.idsala WHERE sala.tipo = '3D' AND asiento.nroasiento = entrada.nroasiento);


/*4.c Ok*/   
SELECT p.idpublicidad, p.duracion, COUNT(f.idfuncion) AS cantidad FROM publicidad AS p JOIN funcion AS f ON p.idpublicidad = f.idpublicidadinicio WHERE f.fecha >= '2022-01-01' GROUP BY p.idpublicidad;
  
/*4.d Ok*/   
SELECT e.fechaemision, COUNT(e.numeroentrada) AS cantidad FROM entrada AS e JOIN funcion AS f on e.idfuncion = f.idfuncion WHERE e.fechaemision LIKE '2022-05-%' AND f.idpublicidadfinal IN(
    SELECT f.idpublicidadfinal FROM funcion AS f JOIN publicidad AS p ON f.idpublicidadfinal = p.idpublicidad WHERE p.duracion LIKE '00:05:%'
);
