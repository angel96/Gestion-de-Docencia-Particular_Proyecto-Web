create or replace procedure AsignaturasCurso
  (w_curso in asignaturas.curso%type)
  as
begin
  for rec in
  (
    select distinct oid_asig
    from asignaturas
    where (asignaturas.curso=w_curso)
  )
  loop
    dbms_output.put_line(rec.oid_asig);
  end loop;
end asignaturascurso;