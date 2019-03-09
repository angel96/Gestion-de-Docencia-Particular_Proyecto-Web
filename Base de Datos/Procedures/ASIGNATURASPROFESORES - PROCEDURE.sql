create or replace procedure asignaturasProfesores
  (profesor in profesores.oid_p%type)
  as
begin
  for rec in
  (
    select oid_asig
    from matriculas
    where matriculas.oid_p=profesor
  )
  loop
    dbms_output.put_line(rec.oid_asig);
  end loop;
end asignaturasprofesores;