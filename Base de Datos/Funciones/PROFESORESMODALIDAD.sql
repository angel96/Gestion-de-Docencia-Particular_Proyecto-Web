create or replace FUNCTION ProfesoresModalidad(Modalidad IN Profesores.OID_M%TYPE)
RETURN NUMBER IS Profesor profesores.OID_P%TYPE;
BEGIN
SELECT count(*) INTO Profesor FROM profesores
WHERE OID_M=MODALIDAD;
return Profesor;
END;