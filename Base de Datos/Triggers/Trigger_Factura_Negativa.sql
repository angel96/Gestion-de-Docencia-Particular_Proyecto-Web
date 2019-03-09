create or replace TRIGGER FacturaNegativa
BEFORE 
INSERT OR UPDATE OF Importe ON Facturas
FOR EACH ROW
 BEGIN
  IF :NEW.Importe< 0  
  THEN
   raise_application_error(-456,'no se puede introducir una factura negativa');
  END IF;
  
  END;