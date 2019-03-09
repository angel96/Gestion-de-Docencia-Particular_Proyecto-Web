create or replace PACKAGE BODY PRUEBAS_ESHIJODE AS 
PROCEDURE inicializar AS
BEGIN
DELETE FROM ESHIJODE;
END inicializar;

PROCEDURE insertar(nombre_prueba VARCHAR2, w_OID_A NUMBER, w_OID_T NUMBER, salidaEsperada BOOLEAN) AS
   salida BOOLEAN := true;
   ESHIJO ESHIJODE%ROWTYPE;
   w_OID_EHD NUMBER;
BEGIN

INSERT INTO ESHIJODE VALUES(sec_eshijode.nextval, w_OID_A,w_OID_T);

w_OID_EHD := sec_eshijode.currval;
SELECT * INTO ESHIJO FROM ESHIJODE WHERE  OID_EHD = w_OID_EHD;  
IF (ESHIJO.OID_EHD<>w_OID_EHD) THEN
  salida := false;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS (salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN 
     DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false,salidaEsperada));
     ROLLBACK;
END insertar;

PROCEDURE actualizar (nombre_prueba VARCHAR2,w_OID_EHD NUMBER,w_OID_A NUMBER, salidaEsperada BOOLEAN)
AS
salida BOOLEAN:=true;
ESHIJO ESHIJODE%ROWTYPE;
BEGIN

UPDATE ESHIJODE SET OID_A=w_OID_A WHERE OID_EHD=w_OID_EHD;

SELECT * INTO ESHIJO FROM ESHIJODE WHERE OID_EHD=W_OID_EHD;
IF (ESHIJO.OID_A<>w_OID_A) THEN
salida:= false;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(nombre_prueba|| ':' || ASSERT_EQUALS(salida, salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba|| ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;
END actualizar;


PROCEDURE eliminar (nombre_prueba VARCHAR2, w_OID_EHD NUMBER, salidaEsperada BOOLEAN) AS 
   salida BOOLEAN := true;
   ESHIJO ESHIJODE%ROWTYPE;
   n_ESHIJO INTEGER;
BEGIN

DELETE FROM ESHIJODE WHERE OID_EHD = w_OID_EHD;


SELECT COUNT(*) INTO n_ESHIJO FROM ESHIJODE WHERE OID_EHD = w_OID_EHD;
IF (n_ESHIJO <> 0) THEN
  salida := false;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));

EXCEPTION
WHEN OTHERS THEN 
      DBMS_OUTPUT.put_line (nombre_prueba || ':' || ASSERT_EQUALS(false,salidaEsperada));
      ROLLBACK;
END eliminar;

END PRUEBAS_ESHIJODE;