create or replace PACKAGE
BODY PRUEBAS_USUARIOS AS 

PROCEDURE inicializar AS BEGIN
DELETE FROM usuarios;
END inicializar;

PROCEDURE insertar(nombre_prueba VARCHAR2, w_nombre VARCHAR2, w_apellidos VARCHAR2, w_email VARCHAR2,w_Telefono NUMBER, w_Sexo VARCHAR2, w_OID_Z NUMBER, salidaEsperada BOOLEAN) AS
salida BOOLEAN:= TRUE;
usuario usuarios%ROWTYPE;
w_oid_u NUMBER;
BEGIN
INSERT INTO usuarios VALUES(sec_usuarios.nextval, w_nombre, w_apellidos, w_email, w_Telefono,w_Sexo, w_OID_Z);
w_oid_u:= sec_usuarios.currval;
SELECT * INTO usuario FROM usuarios WHERE oid_u=w_oid_u;
IF(usuario.email<> w_email) THEN
salida:= false;
END IF;
COMMIT WORK;

DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;
END insertar;

PROCEDURE actualizar(nombre_prueba VARCHAR2,W_OID_U NUMBER, w_email VARCHAR2, salidaEsperada BOOLEAN) AS
salida BOOLEAN := true;
usuario usuarios%ROWTYPE;
BEGIN
UPDATE usuarios SET  email=w_email WHERE OID_U=W_OID_U;
SELECT * INTO usuario FROM usuarios WHERE OID_U=W_OID_U;
IF(usuario.email<>w_email) THEN
salida:=false;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;
END actualizar;

PROCEDURE eliminar(nombre_prueba VARCHAR2, w_OID_U NUMBER, salidaEsperada BOOLEAN) AS 
salida BOOLEAN:= TRUE;
n_usuarios INTEGER;
BEGIN

DELETE FROM usuarios where OID_U=W_OID_U;
SELECT COUNT(*) INTO n_usuarios FROM usuarios WHERE oid_u=w_oid_u;
IF(n_usuarios <>0) THEN
salida:=false;
END IF;
COMMIT WORK;
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
EXCEPTION
WHEN OTHERS THEN
DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
ROLLBACK;
END eliminar;

END PRUEBAS_USUARIOS;