SET SERVEROUTPUT ON;
DECLARE

OID_U NUMBER;
    
  BEGIN
  
  PRUEBAS_USUARIOS.INICIALIZAR;
  PRUEBAS_USUARIOS.INSERTAR ('Prueba 1 - Inserción usuarios','Alejandro','García Vera','aleg@gmail.com',638683810,'Hombre',2,true);
  OID_U:=SEC_USUARIOS.CURRVAL;
  PRUEBAS_USUARIOS.INSERTAR ('Prueba 2 - Inserción usuarios NULL',null,null,null,null,null,null,false);
 PRUEBAS_USUARIOS.ACTUALIZAR('Prueba 3 - Actualización usuarios', OID_U,'alegar@gmail.com',true);
  PRUEBAS_USUARIOS.ACTUALIZAR('Prueba 4 - Actualización usuarios null', OID_U,null,false);
   PRUEBAS_USUARIOS.ELIMINAR('Prueba 5 - Eliminar usuario', OID_U, true);
  
    
  END;