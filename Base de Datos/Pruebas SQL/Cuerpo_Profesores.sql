create or replace PACKAGE BODY PRUEBAS_PROFESORES AS

PROCEDURE inicializar AS
BEGIN
DELETE FROM profesores;
END inicializar;


 PROCEDURE insertar  (nombre_prueba VARCHAR2,W_OID_P NUMBER,w_oid_m NUMBER,salidaEsperada BOOLEAN) AS
   salida BOOLEAN := true;
   profesor profesores%ROWTYPE;
   
  BEGIN
  
  INSERT INTO profesores VALUES(W_OID_P,w_oid_m);
  SELECT * INTO profesor FROM profesores WHERE OID_P=w_oid_p;
  IF (profesor.oid_m<>w_oid_m) THEN
  salida := false;
  END IF;
  COMMIT WORK;
  
  
  DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));
  
  
  EXCEPTION
  WHEN OTHERS THEN 
  DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false,salidaEsperada));
  ROLLBACK;
  END insertar;
  
  PROCEDURE actualizar(nombre_prueba VARCHAR2,w_OID_P NUMBER, w_oid_m NUMBER,salidaEsperada BOOLEAN)
AS
salida BOOLEAN:=true;
profesor profesores%ROWTYPE;
BEGIN

UPDATE profesores SET oid_m=w_oid_m WHERE OID_P=W_OID_P;

SELECT * INTO profesor FROM profesores WHERE OID_P=W_OID_P;
IF (profesor.oid_m<>w_oid_m) THEN
salida:= false;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(nombre_prueba|| ':' || ASSERT_EQUALS(salida, salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba|| ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;
END actualizar;

PROCEDURE eliminar(nombre_prueba VARCHAR2, w_OID_P NUMBER,salidaEsperada BOOLEAN)AS 
salida BOOLEAN := true;
n_profesores INTEGER;
BEGIN

DELETE FROM profesores WHERE OID_P=W_OID_P;

SELECT COUNT (*) INTO n_profesores FROM profesores WHERE oid_p=w_oid_p;
IF(n_PROFESORES <>0) THEN
salida :=false;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;
END eliminar;

END PRUEBAS_PROFESORES;