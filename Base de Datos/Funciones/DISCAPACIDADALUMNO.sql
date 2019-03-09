create or replace FUNCTION DiscapacidadAlumno(alum IN alumnos.oid_a%TYPE)
RETURN NUMBER IS a_disc alumnos.discapacidad%TYPE;
BEGIN
SELECT discapacidad INTO a_disc FROM alumnos
WHERE alumnos.oid_a=alum;
RETURN (a_disc);
END;