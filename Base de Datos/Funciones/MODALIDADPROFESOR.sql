create or replace FUNCTION ModalidadProfesor(Profesor IN Matriculas.oid_p%TYPE)
RETURN NUMBER IS modalidad modalidades.OID_M%TYPE;
BEGIN
SELECT OID_M INTO modalidad FROM profesores
WHERE OID_P=Profesor;
RETURN (modalidad);
END;