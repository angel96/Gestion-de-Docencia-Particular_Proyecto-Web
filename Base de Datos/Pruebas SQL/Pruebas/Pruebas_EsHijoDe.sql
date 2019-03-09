SET SERVEROUTPUT ON;

DECLARE
  OID_EHD NUMBER;
  BEGIN

  PRUEBAS_ESHIJODE.INICIALIZAR;
  PRUEBAS_ESHIJODE.INSERTAR ('Prueba 1 - Inserción alum',4,2,true);
  oid_EHD:= sec_eshijode.currval;
  PRUEBAS_ESHIJODE.INSERTAR ('Prueba 2 - Inserción alum null', null, null,false);
  PRUEBAS_ESHIJODE.ACTUALIZAR('Prueba 4 - Actualización nombre de alum', OID_EHD,NULL,false);
  PRUEBAS_ESHIJODE.ELIMINAR('Prueba 5 - Eliminar alum', OID_EHD, true);
  
  
  END;