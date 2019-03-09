create or replace PROCEDURE ELIMINAR_USUARIO(

          w_OID_U IN USUARIOS.OID_U%TYPE


)

IS

BEGIN
    DECLARE 
    CURSOR cur IS
          SELECT OID_U FROM USUARIOS;
          
          BEGIN 
          FOR fila IN cur LOOP
          
          DELETE FROM  USUARIOS WHERE fila.OID_U = w_OID_U; 
          END LOOP;
          END;
          
          END ELIMINAR_USUARIO;
/
create or replace PROCEDURE ELIMINAR_TUTOR(

        w_OID_T IN TUTORES.OID_T%TYPE
)

IS

BEGIN
    DECLARE 
    CURSOR cur IS
          SELECT OID_T FROM TUTORES;
          
          BEGIN 
          FOR fila IN cur LOOP
          
          DELETE FROM  TUTORES WHERE fila.OID_T = w_OID_T; 
          END LOOP;
          END;
          
          END ELIMINAR_TUTOR;
/
create or replace PROCEDURE ELIMINAR_MATRICULA(

    w_OID_Mat IN MATRICULAS.OID_Mat%TYPE
    
)
IS

BEGIN
    DECLARE 
    CURSOR cur IS
          SELECT OID_Mat FROM MATRICULAS;
          
          BEGIN 
          FOR fila IN cur LOOP
          
          DELETE FROM  MATRICULAS WHERE fila.OID_Mat = w_OID_Mat; 
          END LOOP;
          END;
          
          END ELIMINAR_MATRICULA;
/
create or replace PROCEDURE ELIMINAR_PROFESOR(


              w_OID_P IN PROFESORES.OID_P%TYPE

)

IS

BEGIN
    DECLARE 
    CURSOR cur IS
          SELECT OID_P FROM PROFESORES;
          
          BEGIN 
          FOR fila IN cur LOOP
          
          DELETE FROM  PROFESORES WHERE fila.OID_P = w_OID_P; 
          END LOOP;
          END;
          END ELIMINAR_PROFESOR;
/
create or replace PROCEDURE ELIMINA_ES_HIJO_DE(

          w_EHD IN ESHIJODE.OID_EHD%TYPE

)

IS

BEGIN
    DECLARE 
    CURSOR cur IS
          SELECT OID_EHD FROM ESHIJODE;
          
          BEGIN 
          FOR fila IN cur LOOP
          
          DELETE FROM  ESHIJODE WHERE fila.OID_EHD = ESHIJODE.OID_EHD; 
          END LOOP;
          END;
  
          END ELIMINA_ES_HIJO_DE;
/
create or replace PROCEDURE ELIMINA_ALUMNO(

        w_OID_A IN ALUMNOS.OID_A%TYPE

)

IS

BEGIN
    DECLARE 
    CURSOR cur IS
          SELECT OID_A FROM ALUMNOS;
          
          BEGIN 
          FOR fila IN cur LOOP
          
          DELETE FROM  ALUMNOS WHERE fila.OID_A = w_OID_A; 
          END LOOP;
          END;
  
          END ELIMINA_ALUMNO;
/
create or replace PROCEDURE ELIMINAR_MODALIDAD(

        w_OID_M IN MODALIDADES.OID_M%TYPE
)

IS

BEGIN
    DECLARE 
    CURSOR cur IS
          SELECT OID_M FROM MODALIDADES;
          
          BEGIN 
          FOR fila IN cur LOOP
          
          DELETE FROM  MODALIDADES WHERE fila.OID_M = w_OID_M; 
          END LOOP;
          END;
          
          END ELIMINAR_MODALIDAD;
/
create or replace PROCEDURE ELIMINAR_FACTURA(
          w_OID_F IN FACTURAS.OID_F%TYPE
)

IS

BEGIN
    DECLARE 
    CURSOR cur IS
          SELECT OID_F FROM FACTURAS;
          
          BEGIN 
          FOR fila IN cur LOOP
         
          DELETE FROM  FACTURAS WHERE fila.OID_F = w_OID_F; 
          END LOOP;
          END;
          
          END ELIMINAR_FACTURA;
/
create or replace PROCEDURE ELIMINA_ASIGNATURA(

            w_OID_Asig IN Asignaturas.OID_Asig%TYPE
)

IS

BEGIN
    DECLARE 
    CURSOR cur IS
          SELECT OID_Asig FROM ASIGNATURAS;
          
          BEGIN 
          FOR fila IN cur LOOP
          
          DELETE FROM  ASIGNATURAS WHERE fila.OID_Asig = w_OID_Asig; 
          END LOOP;
          END;
  
          END ELIMINA_ASIGNATURA;
/
create or replace PROCEDURE ELIMINAR_ZonaResidencia(

         w_OID_Z IN ZonaResidencias.OID_Z%TYPE


)

IS

BEGIN
    DECLARE 
    CURSOR cur IS
          SELECT OID_Z FROM ZONARESIDENCIAS;
          
          BEGIN 
          FOR fila IN cur LOOP
          
          DELETE FROM  ZONARESIDENCIAS WHERE fila.OID_Z = w_OID_Z; 
          END LOOP;
          END;
          
          END ELIMINAR_ZONARESIDENCIA;
/
create or replace PROCEDURE ELIMINAR_VALORACION(

         w_OID_V IN VALORACIONES.OID_P%TYPE


)

IS

BEGIN
    DECLARE 
    CURSOR cur IS
          SELECT OID_V FROM VALORACIONES;
      
          BEGIN 
          FOR fila IN cur LOOP
          DELETE FROM  VALORACIONES WHERE fila.OID_V = w_OID_V; 
          END LOOP;
          END;
          
          END ELIMINAR_VALORACION;
/

create or replace PROCEDURE ELIMINAR_Salario(

         w_OID_S IN SALARIOS.OID_S%TYPE


)

IS

BEGIN
    DECLARE 
    CURSOR cur IS
          SELECT OID_S FROM SALARIOS;
      
          BEGIN 
          FOR fila IN cur LOOP
          
          DELETE FROM  SALARIOS WHERE fila.OID_S = w_OID_S; 
          END LOOP;
          END;
          
          END ELIMINAR_Salario;