create or replace FUNCTION asignaturasModalidad(Modalidad IN Asignaturas.OID_M%TYPE)
RETURN NUMBER IS asignatura asignaturas.OID_Asig%TYPE;
BEGIN
SELECT count(*) INTO asignatura FROM asignaturas
WHERE OID_M=Modalidad;
RETURN (asignatura);
END;