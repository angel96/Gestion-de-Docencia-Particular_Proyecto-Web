create or replace FUNCTION NumeroMatriculasAlumno(OID_Alum IN matriculas.OID_A%TYPE)
RETURN NUMBER IS Matricula MATRICULAS.OID_MAT%TYPE;
BEGIN
SELECT count(*) INTO matricula FROM matriculas
WHERE OID_A=OID_Alum;
RETURN(matricula);
END;