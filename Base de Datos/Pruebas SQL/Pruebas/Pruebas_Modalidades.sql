SET SERVEROUTPUT ON;

DECLARE

  oid_m NUMBER;
  
    
  BEGIN
   

  PRUEBAS_MODALIDADES.INICIALIZAR;
  PRUEBAS_MODALIDADES.INSERTAR ('Prueba 1 - Inserción modalid','Entrenamiento',true);
  oid_m := sec_modalidades.currval;
  PRUEBAS_MODALIDADES.INSERTAR ('Prueba 2 - Inserción modalid null', null,false);
  PRUEBAS_MODALIDADES.ELIMINAR('Prueba 5 - Eliminar modalid', OID_m, true);
  
  
  END;