create or replace trigger Edad_Sistema

Before insert or update on ALUMNOS

for each row
    
    
BEGIN
   IF :NEW.EDAD != OBTENEREDAD(:NEW.FECHANACIMIENTO)
   then
   raise_application_error(-20999 ,'No has introducido la fecha correcta');
    END IF;
   END;