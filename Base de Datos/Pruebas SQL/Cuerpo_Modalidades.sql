create or replace PACKAGE BODY PRUEBAS_MODALIDADES AS

PROCEDURE inicializar AS
BEGIN
DELETE FROM modalidades WHERE OID_M!=2;
END inicializar;


 PROCEDURE insertar  (nombre_prueba VARCHAR2,w_nombre VARCHAR2,salidaEsperada BOOLEAN) AS
   salida BOOLEAN := true;
   modalidad modalidades%ROWTYPE;
   w_oid_m NUMBER;
   
  BEGIN
  
  INSERT INTO modalidades VALUES(sec_modalidades.nextval,w_nombre);
  w_oid_m := sec_modalidades.currval;
  SELECT * INTO modalidad FROM modalidades WHERE OID_M=w_oid_m;
  IF (modalidad.nombre<>w_nombre) THEN
  salida := false;
  END IF;
  COMMIT WORK;
  
  
  DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));
  
  
  EXCEPTION
  WHEN OTHERS THEN 
  DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false,salidaEsperada));
  ROLLBACK;
  END insertar;
  
/**  PROCEDURE actualizar(nombre_prueba VARCHAR2,w_OID_M NUMBER, w_nombre VARCHAR2,salidaEsperada BOOLEAN)
AS
salida BOOLEAN:=true;
modalidad modalidades%ROWTYPE;
BEGIN

UPDATE modalidades SET nombre=w_nombre WHERE OID_M=W_OID_M;

SELECT * INTO modalidad FROM modalidades WHERE OID_M=W_OID_M;
IF (modalidad.nombre<>w_nombre) THEN
salida:= false;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(nombre_prueba|| ':' || ASSERT_EQUALS(salida, salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba|| ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;
END actualizar;**/

PROCEDURE eliminar(nombre_prueba VARCHAR2, w_OID_M NUMBER,salidaEsperada BOOLEAN)AS 
salida BOOLEAN := true;
n_modalidades INTEGER;
BEGIN

DELETE FROM modalidades WHERE OID_M=W_OID_M;

SELECT COUNT (*) INTO n_modalidades FROM modalidades WHERE oid_m=w_oid_m;
IF(n_MODALIDADES <>0) THEN
salida :=false;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;
END eliminar;

END PRUEBAS_MODALIDADES;