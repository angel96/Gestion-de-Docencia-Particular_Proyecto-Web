SET SERVEROUTPUT ON;
DECLARE

  oid_v NUMBER;
  OID_A NUMBER;
  OID_P NUMBER;
  OID_ASIG NUMBER;
    
  BEGIN
  OID_A:=2;
  OID_P:=6;
  OID_ASIG:=2;

  PRUEBAS_VALORACIONES.INICIALIZAR;
  PRUEBAS_VALORACIONES.INSERTAR ('Prueba 1 - Inserci�n matric',2,OID_ASIG,OID_P,OID_A,true);
  oid_V:= sec_VALORACIONES.currval;
  PRUEBAS_VALORACIONES.INSERTAR ('Prueba 2 - Inserci�n matric null', null,null,null,null,false);
  PRUEBAS_VALORACIONES.ACTUALIZAR('Prueba 3 - Actualizaci�n matric', oid_v, 2,true);
  PRUEBAS_VALORACIONES.ACTUALIZAR('Prueba 4 - Actualizaci�n matric null', OID_v, null,false);
  PRUEBAS_VALORACIONES.ELIMINAR('Prueba 5 - Eliminar matric', OID_v, true);
  
  
  END;