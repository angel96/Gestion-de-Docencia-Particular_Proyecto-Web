SET SERVEROUTPUT ON;
DECLARE 

  OID_ASIG NUMBER;
  OID_M NUMBER;
  
  BEGIN

  PRUEBAS_ASIGNATURA.INICIALIZAR;
  PRUEBAS_ASIGNATURA.INSERTAR ('Prueba 1 - Inserción asig',2,'ALN',1, true);
      OID_ASIG := sec_asignaturas.currval;
  PRUEBAS_ASIGNATURA.INSERTAR ('Prueba 2 - Inserción asig con nombre null',null, null, null,false);
  PRUEBAS_ASIGNATURA.ACTUALIZAR('Prueba 3 - Actualización nombre de asig', OID_ASIG,'DINAMICA',true);
  PRUEBAS_ASIGNATURA.ACTUALIZAR('Prueba 4 - Actualización nombre de asig', OID_ASIG,NULL, false);
  PRUEBAS_ASIGNATURA.ELIMINAR('Prueba 5 - Eliminar asig', OID_ASIG, true);
  
  
  END;