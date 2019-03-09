create or replace FUNCTION escuelaAlumno(a_escuela IN alumnos.escuela%TYPE)
RETURN NUMBER IS a_escuelasolucion alumnos.escuela%TYPE;
BEGIN
SELECT count (*) INTO a_escuelasolucion FROM alumnos
WHERE escuela=a_escuela;
RETURN (a_escuelasolucion);
END;