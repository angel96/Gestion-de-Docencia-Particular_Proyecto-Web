create or replace FUNCTION MatriculasProfesor(Profesor IN MATRICULAS.OID_P%TYPE)
RETURN NUMBER IS Matricula Matriculas.OID_Mat%TYPE;
BEGIN 
SELECT count(*) INTO Matricula FROM Matriculas
WHERE OID_P=Profesor;
RETURN Matricula;
END;