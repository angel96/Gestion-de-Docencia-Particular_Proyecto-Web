create or replace procedure FacturaNoPagadasAlumno
  (Alumno in alumnos.oid_a%type)
  as
begin
  for rec in
  (
    select distinct oid_f
    from facturas,matriculas
    where (Alumno=OID_A AND Pagado=0)
  )
  loop
    dbms_output.put_line(rec.oid_f);
  end loop;
end FacturaNoPagadasAlumno;