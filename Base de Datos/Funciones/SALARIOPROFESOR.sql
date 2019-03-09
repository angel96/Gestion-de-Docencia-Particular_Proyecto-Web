create or replace FUNCTION SalarioProfesor(Profesor IN Matriculas.OID_P%TYPE)
RETURN NUMBER IS Sueldo NUMBER;
BEGIN
SELECT SUM(Importe) INTO Sueldo FROM matriculas, facturas
WHERE (MATRICULAS.OID_P=Profesor AND PAGADO=1);
RETURN(Sueldo);
END;