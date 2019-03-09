create or replace PACKAGE BODY PRUEBAS_ALUMNOS AS

PROCEDURE inicializar AS
BEGIN
DELETE FROM alumnos;
END inicializar;


PROCEDURE insertar
(nombre_prueba VARCHAR2,W_OID_A NUMBER, w_escuela VARCHAR2, w_FechaNacimiento DATE,w_Discapacidad NUMBER,w_DNI VARCHAR2,w_Edad NUMBER, salidaEsperada BOOLEAN) AS
salida BOOLEAN := true;
alumno alumnos%ROWTYPE;
BEGIN

INSERT INTO alumnos VALUES(W_OID_A, w_escuela, w_FechaNacimiento,w_Discapacidad, w_DNI, w_Edad);
SELECT * INTO alumno FROM alumnos WHERE OID_A=w_oid_a;
IF(alumno.DNI<>w_DNI) THEN
salida:= false;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;
END insertar;


PROCEDURE actualizar(nombre_prueba VARCHAR2,w_OID_A NUMBER, w_Escuela VARCHAR2, w_Edad NUMBER, salidaEsperada BOOLEAN)
AS
salida BOOLEAN:=true;
alumno alumnos%ROWTYPE;
BEGIN

UPDATE alumnos SET Escuela=w_Escuela WHERE OID_A=W_OID_A;

SELECT * INTO alumno FROM alumnos WHERE OID_A=W_OID_A;
IF (alumno.Escuela<>w_Escuela) THEN
salida:= false;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(nombre_prueba|| ':' || ASSERT_EQUALS(salida, salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba|| ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;
END actualizar;

PROCEDURE eliminar(nombre_prueba VARCHAR2, w_OID_A NUMBER, salidaEsperada BOOLEAN)
AS salida BOOLEAN := true;
n_alumnos INTEGER;
BEGIN

DELETE FROM alumnos WHERE OID_A=W_OID_A;

SELECT COUNT (*) INTO n_alumnos FROM alumnos WHERE oid_a=w_oid_a;
IF(n_ALUMNOS <>0) THEN
salida :=false;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;
END eliminar;

END PRUEBAS_ALUMNOS;