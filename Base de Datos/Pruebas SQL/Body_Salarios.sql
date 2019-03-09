create or replace PACKAGE
BODY PRUEBAS_SalarioS AS 

PROCEDURE inicializar AS BEGIN
DELETE FROM Salarios;
END inicializar;

PROCEDURE insertar(nombre_prueba VARCHAR2, w_SalarioMes NUMBER, w_mes NUMBER, w_año NUMBER, w_OID_P NUMBER,salidaEsperada BOOLEAN) AS
salida BOOLEAN:= TRUE;
Salario Salarios%ROWTYPE;
w_oid_s NUMBER;
BEGIN
INSERT INTO Salarios VALUES(w_mes, w_año, w_SalarioMes, w_OID_P,sec_Salarios.nextval);
w_oid_s:= sec_Salarios.currval;
SELECT * INTO Salario FROM Salarios WHERE oid_s=w_oid_s;
IF(Salario.salario_Mes<> w_salarioMes) THEN
salida:= false;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;
END insertar;

PROCEDURE actualizar(nombre_prueba VARCHAR2,w_OID_S NUMBER, w_SalarioMes NUMBER, salidaEsperada BOOLEAN) AS
salida BOOLEAN := true;
Salario Salarios%ROWTYPE;
BEGIN
UPDATE Salarios SET salario_mes=w_salarioMes WHERE OID_S=W_OID_S;
SELECT * INTO Salario FROM Salarios WHERE OID_S=W_OID_S;
IF(Salario.salario_Mes<>w_salarioMes) THEN
salida:=false;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;
END actualizar;

PROCEDURE eliminar(nombre_prueba VARCHAR2, w_OID_S NUMBER, salidaEsperada BOOLEAN) AS 
salida BOOLEAN:= TRUE;
n_Salarios INTEGER;
BEGIN

DELETE FROM Salarios where OID_S=W_OID_S;
SELECT COUNT(*) INTO n_Salarios FROM Salarios WHERE oid_s=w_oid_s;
IF(n_Salarios <>0) THEN
salida:=false;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;
END eliminar;

END PRUEBAS_SalarioS;