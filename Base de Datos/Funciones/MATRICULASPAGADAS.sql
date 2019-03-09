create or replace FUNCTION MatriculasPagadas(OID_Matricula IN facturas.OID_Mat%TYPE)
RETURN NUMBER IS CosteS NUMBER;
BEGIN
SELECT count(*) INTO CosteS FROM facturas
WHERE (OID_Mat=OID_Matricula AND PAGADO=1);
RETURN(CosteS);
END;