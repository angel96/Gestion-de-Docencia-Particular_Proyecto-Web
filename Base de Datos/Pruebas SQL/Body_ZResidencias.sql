create or replace PACKAGE
BODY PRUEBAS_ZONARESIDENCIAS AS 

PROCEDURE inicializar AS BEGIN
DELETE FROM ZONARESIDENCIAS;
END inicializar;

PROCEDURE insertar(nombre_prueba VARCHAR2, w_NombreZona VARCHAR2, w_Provincia VARCHAR2,salidaEsperada BOOLEAN) AS
salida BOOLEAN:= TRUE;
ZonaResidencia ZonaResidencias%ROWTYPE;
w_oid_Z NUMBER;
BEGIN
INSERT INTO ZonaResidencias VALUES(sec_ZonaResidencias.nextval, w_NombreZona, w_Provincia);
w_oid_Z:= sec_ZonaResidencias.currval;
SELECT * INTO ZonaResidencia FROM ZonaResidencias WHERE oid_Z=w_oid_Z;
IF(ZonaResidencia.NombreZona<> w_NombreZona) THEN
salida:= false;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;
END insertar;

PROCEDURE actualizar(nombre_prueba VARCHAR2, w_OID_Z NUMBER,w_NombreZona VARCHAR2,salidaEsperada BOOLEAN) AS
salida BOOLEAN := true;
ZonaResidencia ZonaResidencias%ROWTYPE;
BEGIN
UPDATE ZonaResidencias SET NombreZona= w_NombreZona WHERE OID_Z=W_OID_Z;
SELECT * INTO zonaresidencia FROM zonaresidencias WHERE OID_Z=W_OID_Z;
IF(ZonaResidencia.NombreZona<>w_NombreZona) THEN
salida:=false;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;
END actualizar;

PROCEDURE eliminar(nombre_prueba VARCHAR2, w_OID_Z NUMBER, salidaEsperada BOOLEAN) AS 
salida BOOLEAN:= TRUE;
n_ZonaResidencias INTEGER;
BEGIN

DELETE FROM ZonaResidencias where OID_Z=W_OID_Z;
SELECT COUNT(*) INTO n_ZonaResidencias FROM ZonaResidencias WHERE oid_Z=w_oid_Z;
IF(n_ZonaResidencias <>0) THEN
salida:=false;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;
END eliminar;

END PRUEBAS_ZonaResidencias;