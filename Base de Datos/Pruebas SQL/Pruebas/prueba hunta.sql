INSERT INTO ZONARESIDENCIAS(OID_Z,NOMBREZONA, PROVINCIA) VALUES (SEC_ZONARESIDENCIAS.NEXTVAL,'BELLAVISTA','SEVILLA');
INSERT INTO ZONARESIDENCIAS(OID_Z,NOMBREZONA, PROVINCIA) VALUES (SEC_ZONARESIDENCIAS.NEXTVAL,'CASCO_ANTIGUO','SEVILLA');
INSERT INTO ZONARESIDENCIAS(OID_Z,NOMBREZONA, PROVINCIA) VALUES (SEC_ZONARESIDENCIAS.NEXTVAL,'CERRO_AMATE','SEVILLA');
INSERT INTO ZONARESIDENCIAS(OID_Z,NOMBREZONA, PROVINCIA) VALUES (SEC_ZONARESIDENCIAS.NEXTVAL,'ESTE','SEVILLA');
INSERT INTO ZONARESIDENCIAS(OID_Z,NOMBREZONA, PROVINCIA) VALUES (SEC_ZONARESIDENCIAS.NEXTVAL,'LOS_REMEDIOS','SEVILLA');
INSERT INTO ZONARESIDENCIAS(OID_Z,NOMBREZONA, PROVINCIA) VALUES (SEC_ZONARESIDENCIAS.NEXTVAL,'MACARENA','SEVILLA');
INSERT INTO ZONARESIDENCIAS(OID_Z,NOMBREZONA, PROVINCIA) VALUES (SEC_ZONARESIDENCIAS.NEXTVAL,'NERVION','SEVILLA');
INSERT INTO ZONARESIDENCIAS(OID_Z,NOMBREZONA, PROVINCIA) VALUES (SEC_ZONARESIDENCIAS.NEXTVAL,'NORTE','SEVILLA');
INSERT INTO ZONARESIDENCIAS(OID_Z,NOMBREZONA, PROVINCIA) VALUES (SEC_ZONARESIDENCIAS.NEXTVAL,'SANTA_JUSTA','SEVILLA');
INSERT INTO ZONARESIDENCIAS(OID_Z,NOMBREZONA, PROVINCIA) VALUES (SEC_ZONARESIDENCIAS.NEXTVAL,'TRIANA','SEVILLA');


INSERT INTO USUARIOS(OID_U,NOMBRE,APELLIDOS,EMAIL,TELEFONO,SEXO,OID_Z) VALUES (SEC_USUARIOS.NEXTVAL,'FRANCISCO JAVIER','HIGUERAS GALV�N','fjhigueras@gmail.com',660974252,'Hombre',2);
INSERT INTO USUARIOS(OID_U,NOMBRE,APELLIDOS,EMAIL,TELEFONO,SEXO,OID_Z) VALUES (SEC_USUARIOS.NEXTVAL,'ESTEFANIA','HIGUERAS GALV�N','estefi@gmail.com',676751688,'Mujer',4);
INSERT INTO USUARIOS(OID_U,NOMBRE,APELLIDOS,EMAIL,TELEFONO,SEXO,OID_Z) VALUES (SEC_USUARIOS.NEXTVAL,'ENCARNACION','GALVAN GARCIA','encarnita@gmail.com',668946659,'Mujer',2);
INSERT INTO USUARIOS(OID_U,NOMBRE,APELLIDOS,EMAIL,TELEFONO,SEXO,OID_Z) VALUES (SEC_USUARIOS.NEXTVAL,'FRANCISCO','HIGUERAS JIM�NEZ','fhigueras@gmail.com',676762124,'Hombre',6);
INSERT INTO USUARIOS(OID_U,NOMBRE,APELLIDOS,EMAIL,TELEFONO,SEXO,OID_Z) VALUES (SEC_USUARIOS.NEXTVAL,'PETRA MARIA','SANCHEZ GUTIERREZ','PMSG@gmail.com',656516848,'Mujer',12);
INSERT INTO USUARIOS(OID_U,NOMBRE,APELLIDOS,EMAIL,TELEFONO,SEXO,OID_Z) VALUES (SEC_USUARIOS.NEXTVAL,'ALEJANDRO','GARCIA VERA','ALE@gmail.com',656831866,'Hombre',18);
INSERT INTO USUARIOS(OID_U,NOMBRE,APELLIDOS,EMAIL,TELEFONO,SEXO,OID_Z) VALUES (SEC_USUARIOS.NEXTVAL,'DAVID','VARGAS AVIVAR','DAVE@gmail.com',699785004,'Hombre',16);
INSERT INTO USUARIOS(OID_U,NOMBRE,APELLIDOS,EMAIL,TELEFONO,SEXO,OID_Z) VALUES (SEC_USUARIOS.NEXTVAL,'ANGEL','DELGADO LUNA','ANGEL@gmail.com',698546222,'Hombre',10);
INSERT INTO USUARIOS(OID_U,NOMBRE,APELLIDOS,EMAIL,TELEFONO,SEXO,OID_Z) VALUES (SEC_USUARIOS.NEXTVAL,'PEPE','VARGAS DEL CARVAJAL','PP@gmail.com',668628522,'Hombre',8);
INSERT INTO USUARIOS(OID_U,NOMBRE,APELLIDOS,EMAIL,TELEFONO,SEXO,OID_Z) VALUES (SEC_USUARIOS.NEXTVAL,'JULIAN','MARTIN MU�OZ','JMM@gmail.com',722856999,'Hombre',14);
INSERT INTO USUARIOS(OID_U,NOMBRE,APELLIDOS,EMAIL,TELEFONO,SEXO,OID_Z) VALUES (SEC_USUARIOS.NEXTVAL,'MARIA ALEJANDRA','GALV�N CARVONELL','ASEITE@gmail.com',656999888,'Mujer',8);
INSERT INTO USUARIOS(OID_U,NOMBRE,APELLIDOS,EMAIL,TELEFONO,SEXO,OID_Z) VALUES (SEC_USUARIOS.NEXTVAL,'PADRE DE ALE','PADRE DE ALE','PADREDEALE@gmail.com',655555555,'Hombre',18);
INSERT INTO USUARIOS(OID_U,NOMBRE,APELLIDOS,EMAIL,TELEFONO,SEXO,OID_Z) VALUES (SEC_USUARIOS.NEXTVAL,'LUIS','GIL CASCARILLA','LGC@gmail.com',666978252,'Hombre',2);
INSERT INTO USUARIOS(OID_U,NOMBRE,APELLIDOS,EMAIL,TELEFONO,SEXO,OID_Z) VALUES (SEC_USUARIOS.NEXTVAL,'FRANCISCO','URRACA MATEOS','PQT@gmail.com',689562312,'Hombre',6);
INSERT INTO USUARIOS(OID_U,NOMBRE,APELLIDOS,EMAIL,TELEFONO,SEXO,OID_Z) VALUES (SEC_USUARIOS.NEXTVAL,'ANA','MORENO ROMAN','AMR@gmail.com',660974252,'Mujer',12);
INSERT INTO USUARIOS(OID_U,NOMBRE,APELLIDOS,EMAIL,TELEFONO,SEXO,OID_Z) VALUES (SEC_USUARIOS.NEXTVAL,'CONSOLACI�N','GONZ�LEZ P�REZ','CGP@gmail.com',660974252,'Mujer',16);
INSERT INTO USUARIOS(OID_U,NOMBRE,APELLIDOS,EMAIL,TELEFONO,SEXO,OID_Z) VALUES (SEC_USUARIOS.NEXTVAL,'SILVANO','AGUILAR RUIZ','SAR@gmail.com',665566998,'Hombre',10);

INSERT INTO MODALIDADES(OID_M,NOMBRE) VALUES (SEC_MODALIDADES.NEXTVAL,'Pedagog�a');
INSERT INTO MODALIDADES(OID_M,NOMBRE) VALUES (SEC_MODALIDADES.NEXTVAL,'Lengua');
INSERT INTO MODALIDADES(OID_M,NOMBRE) VALUES (SEC_MODALIDADES.NEXTVAL,'Matem�ticas');
INSERT INTO MODALIDADES(OID_M,NOMBRE) VALUES (SEC_MODALIDADES.NEXTVAL,'Inform�tica');
INSERT INTO MODALIDADES(OID_M,NOMBRE) VALUES (SEC_MODALIDADES.NEXTVAL,'F�sicayQu�mica');
INSERT INTO MODALIDADES(OID_M,NOMBRE) VALUES (SEC_MODALIDADES.NEXTVAL,'Expresi�nArt');

INSERT INTO PROFESORES(OID_P,OID_M) VALUES (5,6);
INSERT INTO PROFESORES(OID_P,OID_M) VALUES (10,2);
INSERT INTO PROFESORES(OID_P,OID_M) VALUES (11,12);
INSERT INTO PROFESORES(OID_P,OID_M) VALUES (13,4);
INSERT INTO PROFESORES(OID_P,OID_M) VALUES (14,8);
INSERT INTO PROFESORES(OID_P,OID_M) VALUES (16,4);
INSERT INTO PROFESORES(OID_P,OID_M) VALUES (17,10);

INSERT INTO ASIGNATURAS (OID_ASIG,OID_M, NOMBRE, CURSO) VALUES (sec_asignaturas.nextval, 2, 'Psic Desrllo' , 1); 
INSERT INTO ASIGNATURAS (OID_ASIG,OID_M, NOMBRE, CURSO) VALUES (sec_asignaturas.nextval, 2, 'DER. HUMANOS', 1);
INSERT INTO ASIGNATURAS (OID_ASIG,OID_M, NOMBRE, CURSO) VALUES (sec_asignaturas.nextval, 4, 'LITER.SIGLO DE ORO', 1);
INSERT INTO ASIGNATURAS (OID_ASIG,OID_M, NOMBRE, CURSO) VALUES (sec_asignaturas.nextval, 4, 'COMUN ORAL Y ESCRITA', 1);
INSERT INTO ASIGNATURAS (OID_ASIG,OID_M, NOMBRE, CURSO) VALUES (sec_asignaturas.nextval, 6, 'MAT.DISC.', 2);
INSERT INTO ASIGNATURAS (OID_ASIG,OID_M, NOMBRE, CURSO) VALUES (sec_asignaturas.nextval, 6, 'ALN', 1);
INSERT INTO ASIGNATURAS (OID_ASIG,OID_M, NOMBRE, CURSO) VALUES (sec_asignaturas.nextval, 8, 'IISSI', 2);
INSERT INTO ASIGNATURAS (OID_ASIG,OID_M, NOMBRE, CURSO) VALUES (sec_asignaturas.nextval, 8, 'ADDA', 2);
INSERT INTO ASIGNATURAS (OID_ASIG,OID_M, NOMBRE, CURSO) VALUES (sec_asignaturas.nextval, 10, 'ONDAS', 2);
INSERT INTO ASIGNATURAS (OID_ASIG,OID_M, NOMBRE, CURSO) VALUES (sec_asignaturas.nextval, 10, 'MEC�NICA', 2);
INSERT INTO ASIGNATURAS (OID_ASIG,OID_M, NOMBRE, CURSO) VALUES (sec_asignaturas.nextval, 10, 'QU�M. ANAL�TICA', 1);
INSERT INTO ASIGNATURAS (OID_ASIG,OID_M, NOMBRE, CURSO) VALUES (sec_asignaturas.nextval, 10, 'QU�M. FIS. MOLEC.', 1);
INSERT INTO ASIGNATURAS (OID_ASIG,OID_M, NOMBRE, CURSO) VALUES (sec_asignaturas.nextval, 12, 'VOL�MENES', 3);
INSERT INTO ASIGNATURAS (OID_ASIG,OID_M, NOMBRE, CURSO) VALUES (sec_asignaturas.nextval, 12, 'H. DEL ARTE', 3);

INSERT INTO ALUMNOS(OID_A,ESCUELA, FECHANACIMIENTO, DISCAPACIDAD, DNI, EDAD) VALUES (1,'IES Ponce de Leon', TO_DATE('1995/06/23','YYYY-MM-DD'),0,'47212867P',20);
INSERT INTO ALUMNOS(OID_A,ESCUELA, FECHANACIMIENTO, DISCAPACIDAD, DNI, EDAD) VALUES (2,'IES Ponce de Leon',TO_DATE('1990/02/14','YYYY-MM-DD'),1,'47212866F',25);
INSERT INTO ALUMNOS(OID_A,ESCUELA, FECHANACIMIENTO, DISCAPACIDAD, DNI, EDAD) VALUES (6,'IESMarqu�sdeMairena',TO_DATE('1996/11/25','YYYY-MM-DD'),0,'65894525P',19);
INSERT INTO ALUMNOS(OID_A,ESCUELA, FECHANACIMIENTO, DISCAPACIDAD, DNI, EDAD) VALUES (7,'IESVirgendelRoc�o',TO_DATE('1995/06/23','YYYY-MM-DD'),0,'12345678M',20);
INSERT INTO ALUMNOS(OID_A,ESCUELA, FECHANACIMIENTO, DISCAPACIDAD, DNI, EDAD) VALUES (8,'IES Ruiz Guij�n',TO_DATE('1993/11/14','YYYY-MM-DD'),0,'56822212K',22);
INSERT INTO ALUMNOS(OID_A,ESCUELA, FECHANACIMIENTO, DISCAPACIDAD, DNI, EDAD) VALUES (15,'IES Ponce de Leon',TO_DATE('1992/04/05','YYYY-MM-DD'),0,'87666322M',23);

INSERT INTO TUTORES(OID_T) VALUES (3);
INSERT INTO TUTORES(OID_T) VALUES (4);
INSERT INTO TUTORES(OID_T) VALUES (9);
INSERT INTO TUTORES(OID_T) VALUES (12);
INSERT INTO TUTORES(OID_T) VALUES (10);

INSERT INTO ESHIJODE(OID_EHD,OID_A,OID_T) VALUES (SEC_ESHIJODE.NEXTVAL,1,3);
INSERT INTO ESHIJODE(OID_EHD,OID_A,OID_T) VALUES (SEC_ESHIJODE.NEXTVAL,1,4);
INSERT INTO ESHIJODE(OID_EHD,OID_A,OID_T) VALUES (SEC_ESHIJODE.NEXTVAL,2,3);
INSERT INTO ESHIJODE(OID_EHD,OID_A,OID_T) VALUES (SEC_ESHIJODE.NEXTVAL,2,4);
INSERT INTO ESHIJODE(OID_EHD,OID_A,OID_T) VALUES (SEC_ESHIJODE.NEXTVAL,6,12);
INSERT INTO ESHIJODE(OID_EHD,OID_A,OID_T) VALUES (SEC_ESHIJODE.NEXTVAL,7,9);

INSERT INTO MATRICULAS(OID_MAT,OID_A,OID_T,OID_ASIG,OID_P,FECHACOMIENZO,FECHAFIN,EVALUACION) VALUES (SEC_MATRICULAS.NEXTVAL,1,3,10,5,TO_DATE('20/01/2016','DD-MM-YYYY'),TO_DATE('20/05/2016','DD-MM-YYYY'),null);
INSERT INTO MATRICULAS(OID_MAT,OID_A,OID_T,OID_ASIG,OID_P,FECHACOMIENZO,FECHAFIN,EVALUACION) VALUES (SEC_MATRICULAS.NEXTVAL,6,12,8,16,TO_DATE('20/01/2014','DD-MM-YYYY'),TO_DATE('20/10/2014','DD-MM-YYYY'),'Notable');
INSERT INTO MATRICULAS(OID_MAT,OID_A,OID_T,OID_ASIG,OID_P,FECHACOMIENZO,FECHAFIN,EVALUACION) VALUES (SEC_MATRICULAS.NEXTVAL,6,12,20,17,TO_DATE('14/12/2016','DD-MM-YYYY'),TO_DATE('14/02/2016','DD-MM-YYYY'),null);
INSERT INTO MATRICULAS(OID_MAT,OID_A,OID_T,OID_ASIG,OID_P,FECHACOMIENZO,FECHAFIN,EVALUACION) VALUES (SEC_MATRICULAS.NEXTVAL,15,null,18,17,TO_DATE('15/09/2015','DD-MM-YYYY'),TO_DATE('15/10/2015','DD-MM-YYYY'),'Suficiente');

INSERT INTO FACTURAS(OID_F,FECHADEPAGO,IMPORTE,METODODEPAGO,PAGADO,OID_MAT) VALUES (SEC_FACTURAS.NEXTVAL,TO_DATE('20/02/2014','DD-MM-YYYY'),128.69,'Efectivo',1,4);
INSERT INTO FACTURAS(OID_F,FECHADEPAGO,IMPORTE,METODODEPAGO,PAGADO,OID_MAT) VALUES (SEC_FACTURAS.NEXTVAL,TO_DATE('20/03/2014','DD-MM-YYYY'),128.69,'Efectivo',1,4);
INSERT INTO FACTURAS(OID_F,FECHADEPAGO,IMPORTE,METODODEPAGO,PAGADO,OID_MAT) VALUES (SEC_FACTURAS.NEXTVAL,TO_DATE('20/04/2014','DD-MM-YYYY'),128.69,'Efectivo',1,4);
INSERT INTO FACTURAS(OID_F,FECHADEPAGO,IMPORTE,METODODEPAGO,PAGADO,OID_MAT) VALUES (SEC_FACTURAS.NEXTVAL,TO_DATE('20/05/2014','DD-MM-YYYY'),128.69,'Efectivo',1,4);
INSERT INTO FACTURAS(OID_F,FECHADEPAGO,IMPORTE,METODODEPAGO,PAGADO,OID_MAT) VALUES (SEC_FACTURAS.NEXTVAL,TO_DATE('20/06/2014','DD-MM-YYYY'),128.69,'Efectivo',1,4);
INSERT INTO FACTURAS(OID_F,FECHADEPAGO,IMPORTE,METODODEPAGO,PAGADO,OID_MAT) VALUES (SEC_FACTURAS.NEXTVAL,TO_DATE('20/07/2014','DD-MM-YYYY'),128.69,'Efectivo',1,4);
INSERT INTO FACTURAS(OID_F,FECHADEPAGO,IMPORTE,METODODEPAGO,PAGADO,OID_MAT) VALUES (SEC_FACTURAS.NEXTVAL,TO_DATE('20/08/2014','DD-MM-YYYY'),128.69,'Efectivo',1,4);
INSERT INTO FACTURAS(OID_F,FECHADEPAGO,IMPORTE,METODODEPAGO,PAGADO,OID_MAT) VALUES (SEC_FACTURAS.NEXTVAL,TO_DATE('20/09/2014','DD-MM-YYYY'),128.69,'Efectivo',1,4);
INSERT INTO FACTURAS(OID_F,FECHADEPAGO,IMPORTE,METODODEPAGO,PAGADO,OID_MAT) VALUES (SEC_FACTURAS.NEXTVAL,TO_DATE('20/10/2014','DD-MM-YYYY'),128.69,'Efectivo',0,4);
INSERT INTO FACTURAS(OID_F,FECHADEPAGO,IMPORTE,METODODEPAGO,PAGADO,OID_MAT) VALUES (SEC_FACTURAS.NEXTVAL,TO_DATE('14/01/2016','DD-MM-YYYY'),204.05,'Efectivo',1,6);
INSERT INTO FACTURAS(OID_F,FECHADEPAGO,IMPORTE,METODODEPAGO,PAGADO,OID_MAT) VALUES (SEC_FACTURAS.NEXTVAL,TO_DATE('15/10/2015','DD-MM-YYYY'),309.55,'Efectivo',0,8);

INSERT INTO SALARIOS(MES,A�O,SALARIO_MES,OID_P,OID_S) VALUES (2,2014,128.69,16,SEC_SALARIOS.NEXTVAL);
INSERT INTO SALARIOS(MES,A�O,SALARIO_MES,OID_P,OID_S) VALUES (3,2014,128.69,16,SEC_SALARIOS.NEXTVAL);
INSERT INTO SALARIOS(MES,A�O,SALARIO_MES,OID_P,OID_S) VALUES (4,2014,128.69,16,SEC_SALARIOS.NEXTVAL);
INSERT INTO SALARIOS(MES,A�O,SALARIO_MES,OID_P,OID_S) VALUES (5,2014,128.69,16,SEC_SALARIOS.NEXTVAL);
INSERT INTO SALARIOS(MES,A�O,SALARIO_MES,OID_P,OID_S) VALUES (6,2014,128.69,16,SEC_SALARIOS.NEXTVAL);
INSERT INTO SALARIOS(MES,A�O,SALARIO_MES,OID_P,OID_S) VALUES (7,2014,128.69,16,SEC_SALARIOS.NEXTVAL);
INSERT INTO SALARIOS(MES,A�O,SALARIO_MES,OID_P,OID_S) VALUES (8,2014,128.69,16,SEC_SALARIOS.NEXTVAL);
INSERT INTO SALARIOS(MES,A�O,SALARIO_MES,OID_P,OID_S) VALUES (9,2014,128.69,16,SEC_SALARIOS.NEXTVAL);
INSERT INTO SALARIOS(MES,A�O,SALARIO_MES,OID_P,OID_S) VALUES (10,2014,128.69,16,SEC_SALARIOS.NEXTVAL);
INSERT INTO SALARIOS(MES,A�O,SALARIO_MES,OID_P,OID_S) VALUES (1,2016,204.05,17,SEC_SALARIOS.NEXTVAL);
INSERT INTO SALARIOS(MES,A�O,SALARIO_MES,OID_P,OID_S) VALUES (10,2015,309.55,17,SEC_SALARIOS.NEXTVAL);