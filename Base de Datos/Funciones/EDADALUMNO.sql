create or replace FUNCTION EdadAlumno(alum IN alumnos.oid_a%TYPE)
RETURN NUMBER IS a_edad alumnos.edad%TYPE;
BEGIN
SELECT edad INTO a_edad FROM alumnos
WHERE alumnos.oid_a=alum;
RETURN (a_edad);
END;