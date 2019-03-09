SET SERVEROUTPUT ON;
DECLARE
OID_MAT NUMBER;
    
  BEGIN
  PRUEBAS_MATRICULA.INICIALIZAR;
  PRUEBAS_MATRICULA.INSERTAR ('Prueba 1 - Inserci�n matric',2,4,2,6,TO_DATE('23/07/2016','DD-MM-YYYY'),TO_DATE('23/07/2019','DD-MM-YYYY'),'Suficiente',true);
  oid_mat:= sec_matriculas.currval;
  PRUEBAS_MATRICULA.INSERTAR ('Prueba 2 - Inserci�n matric null', null,null,null,null,null,null,null,false);
  PRUEBAS_MATRICULA.ACTUALIZAR('Prueba 3 - Actualizaci�n matric', oid_mat, TO_DATE('23/10/2016','DD-MM-YYYY'),true);
  PRUEBAS_MATRICULA.ACTUALIZAR('Prueba 4 - Actualizaci�n matric null', OID_mat, null,false);
  PRUEBAS_MATRICULA.ELIMINAR('Prueba 5 - Eliminar matric', OID_mat, true);
  
  
  END;