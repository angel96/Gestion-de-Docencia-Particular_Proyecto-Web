create or replace 
PACKAGE BODY PRUEBAS_ASIGNATURA AS 
PROCEDURE inicializar AS
BEGIN
DELETE FROM ASIGNATURAS WHERE OID_ASIG!=2;
END inicializar;

PROCEDURE insertar (nombre_prueba VARCHAR2,  w_OID_M NUMBER, w_NOMBRE VARCHAR2,w_CURSO NUMBER, salidaEsperada BOOLEAN) AS
   salida BOOLEAN := true;
   ASIGNATURA ASIGNATURAS%ROWTYPE;
   w_OID_ASIG NUMBER;
BEGIN

INSERT INTO ASIGNATURAS VALUES(sec_asignaturas.nextval, w_OID_M,w_NOMBRE,w_CURSO);

w_OID_ASIG := sec_asignaturas.currval;
SELECT * INTO ASIGNATURA FROM ASIGNATURAS WHERE  OID_ASIG = w_OID_ASIG;  
IF (ASIGNATURA.NOMBRE<>w_NOMBRE) THEN
  salida := false;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS (salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN 
     DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false,salidaEsperada));
     ROLLBACK;
END insertar;

PROCEDURE actualizar(nombre_prueba VARCHAR2,w_OID_ASIG NUMBER, w_Nombre VARCHAR2, salidaEsperada BOOLEAN)
AS
salida BOOLEAN:=true;
ASIGNATURA ASIGNATURAS%ROWTYPE;
BEGIN

UPDATE ASIGNATURAS SET Nombre=w_Nombre WHERE OID_ASIG=w_OID_ASIG;

SELECT * INTO ASIGNATURA FROM ASIGNATURAS WHERE OID_ASIG=W_OID_ASIG;
IF (ASIGNATURA.Nombre<>w_Nombre) THEN
salida:= false;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(nombre_prueba|| ':' || ASSERT_EQUALS(salida, salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba|| ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;
END actualizar;


PROCEDURE eliminar (nombre_prueba VARCHAR2, w_OID_ASIG NUMBER, salidaEsperada BOOLEAN) AS 
   salida BOOLEAN := true;
   ASIGNATURA ASIGNATURAS%ROWTYPE;
   n_ASIGNATURAS INTEGER;
BEGIN

DELETE FROM ASIGNATURAS WHERE OID_ASIG = w_OID_ASIG;


SELECT COUNT(*) INTO n_ASIGNATURAS FROM ASIGNATURAS WHERE OID_ASIG = w_OID_ASIG;
IF (n_ASIGNATURAS <> 0) THEN
  salida := false;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN 
      DBMS_OUTPUT.put_line (nombre_prueba || ':' || ASSERT_EQUALS(false,salidaEsperada));
      ROLLBACK;
END eliminar;

END PRUEBAS_ASIGNATURA;