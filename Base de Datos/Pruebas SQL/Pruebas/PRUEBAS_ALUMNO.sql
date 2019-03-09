SET SERVEROUTPUT ON;
INSERT INTO ZONARESIDENCIAS(OID_Z,NOMBREZONA,PROVINCIA) VALUES (SEC_ZONARESIDENCIAS.NEXTVAL,'TRIANA','SEVILLA');
INSERT INTO USUARIOS(OID_U,NOMBRE,APELLIDOS,EMAIL,TELEFONO,SEXO,OID_Z) VALUES(SEC_USUARIOS.NEXTVAL,'Alejandro','García Vera','aleg@gmail.com',638683810,'Hombre',SEC_ZONARESIDENCIAS.CURRVAL);
DECLARE 

  oid_a NUMBER;
  
  BEGIN

  PRUEBAS_ALUMNOS.INICIALIZAR;
   oid_a:=sec_usuarios.currval;
  PRUEBAS_ALUMNOS.INSERTAR ('Prueba 1 - Inserción alum',OID_A,'SraDelRosario',TO_DATE('23/06/1995','DD-MM-YYYY'), 0,'47212867P',20,true);
  PRUEBAS_ALUMNOS.INSERTAR ('Prueba 2 - Inserción alum con nombre null',NULL,null,null,null,null, null,false);
  PRUEBAS_ALUMNOS.ACTUALIZAR('Prueba 3 - Actualización nombre de alum', OID_A,'SAFA', 21, true);
  PRUEBAS_ALUMNOS.ACTUALIZAR('Prueba 4 - Actualización nombre de alum', OID_A,null, null,false);
  PRUEBAS_ALUMNOS.ELIMINAR('Prueba 5 - Eliminar alum', OID_A, true);
  
  
  END;
  
  