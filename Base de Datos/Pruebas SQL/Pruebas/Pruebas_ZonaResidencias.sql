SET SERVEROUTPUT ON;

DECLARE

  OID_Z NUMBER;
  
    
  BEGIN
   
  PRUEBAS_ZONARESIDENCIAS.INICIALIZAR;
  PRUEBAS_ZONARESIDENCIAS.INSERTAR ('Prueba 1 - Inserción zona resid ','TRIANA','SEVILLA',true);
  oid_Z:= sec_ZonaResidencias.currval;
  PRUEBAS_ZONARESIDENCIAS.INSERTAR ('Prueba 2 - Inserción zona resid null ', null, null,false);
  PRUEBAS_ZONARESIDENCIAS.ACTUALIZAR('Prueba 3 - Actualización zona resid ', oid_z,'TRIANA',true);
  PRUEBAS_ZONARESIDENCIAS.ACTUALIZAR('Prueba 4 - Actualización zona resid NULL ', OID_z,NULL,false);
  PRUEBAS_ZONARESIDENCIAS.ELIMINAR('Prueba 5 - Eliminar zona resid ', OID_z, true);
  
  
  END;
  