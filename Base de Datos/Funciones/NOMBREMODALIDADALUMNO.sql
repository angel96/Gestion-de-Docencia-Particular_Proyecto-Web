create or replace FUNCTION NombreModalidadProfesor(Profesor IN Profesores.OID_P%TYPE)
RETURN VARCHAR2 IS modalidad modalidades.NOMBRE%type;
BEGIN
SELECT NOMBRE INTO modalidad FROM profesores, MODALIDADES
WHERE (Profesores.OID_P=Profesor AND PROFESORES.OID_M=MODALIDADES.OID_M);
RETURN(modalidad);
END;