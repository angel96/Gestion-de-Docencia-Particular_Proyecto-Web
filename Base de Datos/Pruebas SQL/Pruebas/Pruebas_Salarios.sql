SET SERVEROUTPUT ON;
DECLARE

 oid_s NUMBER;
    
  BEGIN
  PRUEBAS_SALARIOS.INICIALIZAR;
  PRUEBAS_SALARIOS.INSERTAR ('Prueba 1 - Inserci�n salario',562.03,02,2016,6,true);
  oid_s:= sec_Salarios.currval;
  PRUEBAS_SALARIOS.INSERTAR ('Prueba 2 - Inserci�n salario null',null,null,null,null,false);
  PRUEBAS_SALARIOS.ACTUALIZAR('Prueba 3 - Actualizaci�n salario', oid_s,200.00,true);
  PRUEBAS_SALARIOS.ACTUALIZAR('Prueba 4 - Actualizaci�n salario null', OID_s,1465156161654684616651351354351351.50,false);
  PRUEBAS_SALARIOS.ELIMINAR('Prueba 5 - Eliminar salario', OID_s, true);
    
  END;