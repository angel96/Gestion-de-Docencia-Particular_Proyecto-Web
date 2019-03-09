create or replace PACKAGE BODY PRUEBAS_TUTORES AS 
PROCEDURE inicializar AS
BEGIN
DELETE FROM TUTORES;
END inicializar;

PROCEDURE insertar (nombre_prueba VARCHAR2,W_OID_T NUMBER, salidaEsperada BOOLEAN) AS 
   salida BOOLEAN := true;
   TUTOR TUTORES%ROWTYPE;
BEGIN

INSERT INTO TUTORES VALUES(W_OID_T);
SELECT * INTO TUTOR FROM TUTORES WHERE  OID_T = w_OID_T;  
COMMIT WORK;

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS (salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN 
     DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false,salidaEsperada));
     ROLLBACK;
END insertar;


PROCEDURE eliminar (nombre_prueba VARCHAR2, w_OID_T NUMBER, salidaEsperada BOOLEAN) AS 
   salida BOOLEAN := true;
   TUTOR TUTORES%ROWTYPE;
   n_TUTORES INTEGER;
BEGIN

DELETE FROM TUTORES WHERE OID_T = w_OID_T;


SELECT COUNT(*) INTO TUTOR FROM TUTORES WHERE OID_T = w_OID_T;
IF (n_TUTORES <> 0) THEN
  salida := false;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN 
      DBMS_OUTPUT.put_line (nombre_prueba || ':' || ASSERT_EQUALS(false,salidaEsperada));
      ROLLBACK;
END eliminar;

END PRUEBAS_TUTORES;