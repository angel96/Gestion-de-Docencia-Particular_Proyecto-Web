create or replace PACKAGE
BODY PRUEBAS_MATRICULA AS 

PROCEDURE inicializar AS BEGIN
DELETE FROM MATRICULAS;
END inicializar;

PROCEDURE insertar(nombre_prueba VARCHAR2,W_OID_A NUMBER, W_OID_T NUMBER, W_OID_ASIG NUMBER, W_OID_P NUMBER
, W_FECHACOMIENZO DATE, W_FECHAFIN DATE, W_EVALUACION VARCHAR2, salidaEsperada BOOLEAN) as
salida BOOLEAN:= TRUE;
matricula matriculas%ROWTYPE;
w_oid_mat NUMBER;
BEGIN
INSERT INTO matriculas VALUES(sec_matriculas.nextval, w_oid_a, w_oid_t, w_oid_asig, w_oid_p, w_fechacomienzo,w_fechafin, w_evaluacion);
w_oid_mat:= sec_matriculas.currval;
SELECT * INTO matricula FROM matriculas WHERE oid_mat=w_oid_mat;
IF(matricula.fechacomienzo<> w_fechacomienzo) THEN
salida:= false;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;
END insertar;

PROCEDURE actualizar(nombre_prueba VARCHAR2,w_OID_MAT NUMBER, W_FECHACOMIENZO DATE, salidaEsperada BOOLEAN) AS
salida BOOLEAN := true;
MATRICULA MATRICULAS%ROWTYPE;
BEGIN
UPDATE MATRICULAS SET FECHACOMIENZO=W_FECHACOMIENZO WHERE OID_MAT=W_OID_MAT;
SELECT * INTO MATRICULA FROM MATRICULAS WHERE OID_MAT=W_OID_MAT;
IF(MATRICULA.FECHACOMIENZO<>w_FECHACOMIENZO) THEN
salida:=false;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;
END actualizar;

PROCEDURE eliminar(nombre_prueba VARCHAR2, w_OID_MAT NUMBER, salidaEsperada BOOLEAN) AS 
salida BOOLEAN:= TRUE;
n_MATRICULAS INTEGER;
BEGIN

DELETE FROM MATRICULAS where OID_MAT=W_OID_MAT;
SELECT COUNT(*) INTO n_MATRICULAS FROM MATRICULAS WHERE oid_MAT=w_oid_MAT;
IF(n_MATRICULAS <>0) THEN
salida:=false;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;
END eliminar;

END PRUEBAS_MATRICULA;