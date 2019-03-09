create or replace procedure TutoresPorProfesores
  (w_profesor in NUMBER)
  as
begin
  for rec in
  (
    select oid_T
    from MATRICULAS
    where OID_P=w_Profesor
  )
  loop
    dbms_output.put_line(rec.oid_t);
  end loop;
end tutoresporprofesores;