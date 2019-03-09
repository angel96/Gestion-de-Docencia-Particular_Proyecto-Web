SET SERVEROUTPUT ON;

DECLARE

  OID_f NUMBER;
    
  BEGIN
    
  PRUEBAS_FACTURAS.INICIALIZAR;
  PRUEBAS_FACTURAS.INSERTAR ('Prueba 1 - Inserci�n fechapago',TO_DATE('23/06/2016','DD-MM-YYYY'),430.20,'Efectivo',1,2,true);
  oid_f := sec_facturas.currval;
  PRUEBAS_FACTURAS.INSERTAR ('Prueba 2 - Inserci�n fechapago null', null, null,null,null,null,false);
  PRUEBAS_FACTURAS.ACTUALIZAR('Prueba 3 - Actualizaci�n fechapago', oid_f,430.20,true);
  PRUEBAS_FACTURAS.ACTUALIZAR('Prueba 4 - Actualizaci�n fechapago', OID_f,5465215616165161635156313165163.25,false);
  PRUEBAS_FACTURAS.ELIMINAR('Prueba 5 - Eliminar alum', OID_f, true);
  
  
  END;