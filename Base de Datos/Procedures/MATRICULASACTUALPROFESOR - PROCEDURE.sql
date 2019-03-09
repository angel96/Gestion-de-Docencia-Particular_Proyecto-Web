create or replace procedure MatriculasActualProfesor
  (w_profesor in profesores.oid_p%type)
  as
begin
  for rec in
  (
    select oid_mat
    from matriculas
    where Matriculas.OID_P=w_Profesor AND fechaFin>=sysDate
  )
  loop
    dbms_output.put_line(rec.oid_mat);
  end loop;
end matriculasactualprofesor;