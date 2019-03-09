create or replace PACKAGE BODY PRUEBAS_FACTURAS AS

PROCEDURE inicializar AS
BEGIN
DELETE FROM facturas;
END inicializar;


 PROCEDURE insertar  (nombre_prueba VARCHAR2,w_FECHADEPAGO DATE, w_IMPORTE NUMBER,w_METODODEPAGO VARCHAR2,w_PAGADO NUMBER, w_OID_MAT NUMBER,salidaEsperada BOOLEAN) AS
   salida BOOLEAN := true;
   factura facturas%ROWTYPE;
   w_oid_f NUMBER;
   
  BEGIN
  
   INSERT INTO facturas VALUES(sec_facturas.nextval,w_FECHADEPAGO, w_IMPORTE ,w_METODODEPAGO ,w_PAGADO , w_OID_MAT);
  w_oid_f := sec_facturas.currval;
  SELECT * INTO factura FROM facturas WHERE OID_F=w_oid_f;
  IF (factura.IMPORTE<>w_IMPORTE) THEN
  salida := false;
  END IF;
  COMMIT WORK;
  
  
  DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida,salidaEsperada));
  
  
  EXCEPTION
  WHEN OTHERS THEN 
  DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false,salidaEsperada));
  ROLLBACK;
  END insertar;
  
  PROCEDURE actualizar  (nombre_prueba VARCHAR2,w_OID_F NUMBER, w_IMPORTE NUMBER,salidaEsperada BOOLEAN) AS
salida BOOLEAN:=true;
factura facturas%ROWTYPE;
BEGIN

UPDATE facturas SET IMPORTE=w_IMPORTE WHERE OID_F=W_OID_F;

SELECT * INTO factura FROM facturas WHERE OID_F=W_OID_F;
IF (factura.IMPORTE<>w_IMPORTE) THEN
salida:= false;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(nombre_prueba|| ':' || ASSERT_EQUALS(salida, salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba|| ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;
END actualizar;

PROCEDURE eliminar(nombre_prueba VARCHAR2, w_OID_F NUMBER,salidaEsperada BOOLEAN)AS 
salida BOOLEAN := true;
n_facturas INTEGER;
BEGIN

DELETE FROM facturas WHERE OID_F=W_OID_F;

SELECT COUNT (*) INTO n_facturas FROM facturas WHERE oid_f=w_oid_f;
IF(n_FACTURAS <>0) THEN
salida :=false;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));

EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;
END eliminar;

END PRUEBAS_FACTURAS;

