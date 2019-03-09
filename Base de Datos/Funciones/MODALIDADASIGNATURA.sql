create or replace FUNCTION ModalidadAsignatura(Asignatura IN Asignaturas.OID_Asig%TYPE)
RETURN NUMBER IS modalidad asignaturas.OID_M%TYPE;
BEGIN
SELECT OID_M INTO modalidad FROM asignaturas
WHERE OID_Asig=Asignatura;
RETURN (modalidad);
END;