create or replace procedure ProfesorValoracionAdecuada
  (w_asignatura in asignaturas.oid_asig%type)
  as
begin
  for rec in
  (
    select oid_p
    from Valoraciones
    where Valoraciones.OID_Asig=w_Asignatura AND Valoraciones.Valoracion>3
  )
  loop
    dbms_output.put_line(rec.oid_p);
  end loop;
end profesorvaloracionadecuada;