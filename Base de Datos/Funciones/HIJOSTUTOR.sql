create or replace FUNCTION hijosTutor(Tutor IN eshijode.oid_t%TYPE)
RETURN NUMBER IS hijos eshijode.oid_a%TYPE;
BEGIN
SELECT distinct count (*) INTO hijos FROM eshijode
WHERE oid_T=tutor;
RETURN (hijos);
END;