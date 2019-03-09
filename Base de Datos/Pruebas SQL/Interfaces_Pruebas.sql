create or replace PACKAGE
PRUEBAS_USUARIOS AS 

PROCEDURE inicializar;
PROCEDURE insertar(nombre_prueba VARCHAR2, w_nombre VARCHAR2, w_apellidos VARCHAR2, w_email VARCHAR2, w_Telefono NUMBER, w_Sexo VARCHAR2, w_OID_Z NUMBER, salidaEsperada BOOLEAN);
PROCEDURE actualizar(nombre_prueba VARCHAR2, w_OID_U NUMBER, w_email VARCHAR2, salidaEsperada BOOLEAN);
PROCEDURE eliminar(nombre_prueba VARCHAR2, w_OID_U NUMBER, salidaEsperada BOOLEAN);

END PRUEBAS_USUARIOS;

/

create or replace PACKAGE PRUEBAS_MODALIDADES AS

 PROCEDURE inicializar;
 PROCEDURE insertar
  (nombre_prueba VARCHAR2,w_nombre VARCHAR2,salidaEsperada BOOLEAN);
 --PROCEDURE actualizar
  --(nombre_prueba VARCHAR2,w_OID_M NUMBER, w_nombre VARCHAR2,salidaEsperada BOOLEAN);
 PROCEDURE eliminar
    (nombre_prueba VARCHAR2, w_OID_M NUMBER,salidaEsperada BOOLEAN);
    
END PRUEBAS_MODALIDADES;

/

create or replace PACKAGE PRUEBAS_TUTORES AS 
PROCEDURE inicializar;
PROCEDURE insertar
(nombre_prueba VARCHAR2,W_OID_T NUMBER, salidaEsperada BOOLEAN); 
PROCEDURE eliminar
(nombre_prueba VARCHAR2, w_OID_T NUMBER, salidaEsperada BOOLEAN);

END PRUEBAS_TUTORES;

/

create or replace PACKAGE PRUEBAS_PROFESORES AS

 PROCEDURE inicializar;
 PROCEDURE insertar
  (nombre_prueba VARCHAR2,W_OID_P NUMBER,w_oid_m NUMBER,salidaEsperada BOOLEAN);
 PROCEDURE actualizar
  (nombre_prueba VARCHAR2,w_OID_P NUMBER, w_oid_m NUMBER,salidaEsperada BOOLEAN);
 PROCEDURE eliminar
    (nombre_prueba VARCHAR2, w_OID_P NUMBER,salidaEsperada BOOLEAN);
    
END PRUEBAS_PROFESORES;

/

create or replace PACKAGE PRUEBAS_MATRICULA AS
PROCEDURE inicializar;
PROCEDURE insertar(nombre_prueba VARCHAR2,W_OID_A NUMBER, W_OID_T NUMBER, W_OID_ASIG NUMBER, W_OID_P NUMBER
, W_FECHACOMIENZO DATE, W_FECHAFIN DATE, W_EVALUACION VARCHAR2, salidaEsperada BOOLEAN);
PROCEDURE actualizar(nombre_prueba VARCHAR2,W_OID_MAT NUMBER, W_FECHACOMIENZO DATE, salidaEsperada BOOLEAN);
PROCEDURE eliminar(nombre_prueba VARCHAR2,W_OID_MAT NUMBER, salidaEsperada BOOLEAN);
END PRUEBAS_MATRICULA;

/

create or replace PACKAGE PRUEBAS_FACTURAS AS

 PROCEDURE inicializar;
 PROCEDURE insertar
  (nombre_prueba VARCHAR2,w_FECHADEPAGO DATE, w_IMPORTE NUMBER,w_METODODEPAGO VARCHAR2,w_PAGADO NUMBER, w_OID_MAT NUMBER,salidaEsperada BOOLEAN);
 PROCEDURE actualizar
  (nombre_prueba VARCHAR2,w_OID_F NUMBER, w_IMPORTE NUMBER,salidaEsperada BOOLEAN);
 PROCEDURE eliminar
    (nombre_prueba VARCHAR2, w_OID_F NUMBER,salidaEsperada BOOLEAN);
    
END PRUEBAS_FACTURAS;

/

create or replace 
PACKAGE PRUEBAS_ESHIJODE AS
PROCEDURE inicializar;
PROCEDURE insertar
(nombre_prueba VARCHAR2, w_OID_A NUMBER, w_OID_T NUMBER, salidaEsperada BOOLEAN);
PROCEDURE actualizar
(nombre_prueba VARCHAR2,w_OID_EHD NUMBER,w_OID_A NUMBER,salidaEsperada BOOLEAN);
PROCEDURE eliminar
(nombre_prueba VARCHAR2, w_OID_EHD NUMBER, salidaEsperada BOOLEAN);

END PRUEBAS_ESHIJODE;

/

create or replace PACKAGE 
PRUEBAS_ALUMNOS AS

PROCEDURE inicializar;
PROCEDURE insertar
(nombre_prueba VARCHAR2,W_OID_A NUMBER, w_escuela VARCHAR2, w_FechaNacimiento DATE,w_Discapacidad NUMBER,w_DNI VARCHAR2,w_Edad NUMBER, salidaEsperada BOOLEAN);
PROCEDURE actualizar(nombre_prueba VARCHAR2,W_OID_A NUMBER, w_Escuela VARCHAR2, w_Edad NUMBER, salidaEsperada BOOLEAN);
PROCEDURE eliminar(nombre_prueba VARCHAR2, w_OID_A NUMBER, salidaEsperada BOOLEAN);

END PRUEBAS_ALUMNOS;

/

create or replace 
PACKAGE PRUEBAS_ASIGNATURA AS 

PROCEDURE inicializar;

PROCEDURE insertar
(nombre_prueba VARCHAR2,  w_OID_M NUMBER, w_NOMBRE VARCHAR2, w_CURSO NUMBER, salidaEsperada BOOLEAN);

PROCEDURE actualizar
(nombre_prueba VARCHAR2,w_OID_ASIG NUMBER, w_Nombre VARCHAR2, salidaEsperada BOOLEAN);

PROCEDURE eliminar
(nombre_prueba VARCHAR2, w_OID_ASIG NUMBER, salidaEsperada BOOLEAN);


END PRUEBAS_ASIGNATURA;

/

create or replace PACKAGE
PRUEBAS_ZONARESIDENCIAS AS 

PROCEDURE inicializar;
PROCEDURE insertar(nombre_prueba VARCHAR2, w_NombreZona VARCHAR2, w_Provincia VARCHAR2, salidaEsperada BOOLEAN);
PROCEDURE actualizar(nombre_prueba VARCHAR2, w_OID_Z NUMBER, w_NombreZona VARCHAR2, salidaEsperada BOOLEAN);
PROCEDURE eliminar(nombre_prueba VARCHAR2, w_OID_Z NUMBER, salidaEsperada BOOLEAN);

END PRUEBAS_ZONARESIDENCIAS;
/
create or replace PACKAGE
PRUEBAS_VALORACIONES AS 

PROCEDURE inicializar;
PROCEDURE insertar(nombre_prueba VARCHAR2, w_VALORACION NUMBER, w_OID_ASIG NUMBER, w_OID_P NUMBER, w_OID_A NUMBER,salidaEsperada BOOLEAN);
PROCEDURE actualizar(nombre_prueba VARCHAR2,w_OID_V NUMBER, w_VALORACION NUMBER, salidaEsperada BOOLEAN);
PROCEDURE eliminar(nombre_prueba VARCHAR2, w_OID_V NUMBER, salidaEsperada BOOLEAN);

END PRUEBAS_VALORACIONES;
/
create or replace PACKAGE
PRUEBAS_SALARIOS AS 

PROCEDURE inicializar;
PROCEDURE insertar(nombre_prueba VARCHAR2, w_SalarioMes NUMBER, w_mes NUMBER, w_año NUMBER, w_OID_P NUMBER,salidaEsperada BOOLEAN);
PROCEDURE actualizar(nombre_prueba VARCHAR2,w_OID_S NUMBER, w_SalarioMes NUMBER, salidaEsperada BOOLEAN);
PROCEDURE eliminar(nombre_prueba VARCHAR2, w_OID_S NUMBER, salidaEsperada BOOLEAN);

END PRUEBAS_SALARIOS;

		
