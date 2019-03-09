CREATE OR REPLACE PROCEDURE AÑADIR_TUTOR(
      
          w_OID_T IN Tutores.OID_T%TYPE) 
          
      IS
          
      BEGIN
      
      INSERT INTO Tutores (OID_T) VALUES (w_OID_T);
      
      END AÑADIR_TUTOR;
/
 
        CREATE OR REPLACE PROCEDURE añadir_Factura(
          w_FechaPago IN Facturas.FECHADEPAGO%TYPE,
          w_Importe IN Facturas.IMPORTE%TYPE,
          w_METODODEPAGO IN Facturas.METODODEPAGO%TYPE,
          w_PAGADO IN Facturas.PAGADO%TYPE,
          w_OID_MAT IN Facturas.OID_MAT%TYPE
          
    
        )
        
        IS
        
        BEGIN
        
        INSERT INTO Facturas (OID_F,FECHADEPAGO,IMPORTE, METODODEPAGO,PAGADO, OID_MAT) 
        VALUES (sec_facturas.nextVal,w_FechaPago,w_Importe,w_METODODEPAGO,w_PAGADO, w_OID_MAT);
        
        END añadir_Factura;
/
CREATE OR REPLACE PROCEDURE añadir_Asignatura(
        
          w_OID_M IN Asignaturas.OID_M%TYPE,
          w_Nombre IN Asignaturas.Nombre%TYPE,
          w_Curso IN Asignaturas.Curso%TYPE
        )
        
        IS
        
        BEGIN
        
        INSERT INTO Asignaturas(OID_Asig, OID_M, Nombre, Curso) VALUES (sec_asignaturas.nextVal,w_OID_M, w_Nombre, w_Curso);
        
        END añadir_Asignatura;
/
 CREATE OR REPLACE PROCEDURE añadir_Alumno(
        
            
            w_OID_A IN ALUMNOS.OID_A%TYPE,
            w_Escuela IN Alumnos.Escuela%Type,
            
            w_FechaNacimiento IN Alumnos.FechaNacimiento%Type,
            
            w_Discapacidad IN Alumnos.Discapacidad%TYPE,
            
            W_DNI IN Alumnos.DNI%TYPE,
            
            w_Edad IN Alumnos.Edad%TYPE
        
        )
        
        IS
        
        BEGIN
        
        INSERT INTO Alumnos (OID_A,Escuela, FechaNacimiento, Discapacidad, DNI, Edad) 
        VALUES (w_OID_A,w_Escuela,w_FechaNacimiento,w_Discapacidad,w_DNI, w_Edad);
        
        END añadir_Alumno;
/
 CREATE OR REPLACE PROCEDURE añadir_Usuario(
      
       
        w_Nombre IN     Usuarios.Nombre%TYPE,
        w_Apellidos IN Usuarios.Apellidos%TYPE,
        w_Email IN Usuarios.Email%TYPE,
       
        w_Telefono IN Usuarios.Telefono%TYPE,
        w_Sexo IN Usuarios.Sexo%TYPE,
         w_OID_Z IN Usuarios.OID_Z%TYPE
      )
      
      IS
      
      BEGIN
      
        INSERT INTO Usuarios (OID_U,Nombre, Apellidos, Email, Telefono, Sexo, OID_Z) 
        VALUES (sec_usuarios.nextVal,w_Nombre, w_Apellidos,w_Email,w_Telefono,w_Sexo, w_OID_Z);
        
      END añadir_Usuario;
/
  CREATE OR REPLACE PROCEDURE añadir_Profesor(
        
         w_OID_P IN Profesores.OID_P%TYPE,
          w_OID_M IN Profesores.OID_M%TYPE
      
        )
        
        IS
        
        BEGIN
        
        INSERT INTO Profesores (OID_P,OID_M) VALUES (w_OID_P, w_OID_M);
        
        END añadir_Profesor;
/

  
CREATE OR REPLACE PROCEDURE añadir_Modalidad(
    
      
    
      w_Nombre IN Modalidades.Nombre%TYPE
    )
    
    IS
    
    BEGIN
      INSERT INTO Modalidades(OID_M, Nombre)
      VALUES(sec_modalidades.nextVal,w_Nombre);
    END añadir_Modalidad;
    
    
    
    
/
create or replace PROCEDURE añadir_ES_HIJO_DE(
        
           
            w_OID_T IN ESHIJODE.OID_T%TYPE,
            w_OID_A IN ESHIJODE.OID_A%TYPE
        
        )
        
        IS
        
        BEGIN
        
        INSERT INTO ESHIJODE (OID_EHD,OID_A, OID_T) 
        VALUES (sec_eshijode.nextVal,W_OID_A, W_OID_T);
        
        END añadir_ES_HIJO_DE;
/
 CREATE OR REPLACE PROCEDURE añadir_Matricula(
        
         
          w_OID_A IN Matriculas.OID_A%TYPE,
          w_OID_T IN Matriculas.OID_T%TYPE,
          w_OID_Asig IN Matriculas.OID_Asig%TYPE,
          w_OID_P IN Matriculas.OID_P%TYPE,
          w_FechaComienzo IN Matriculas.FechaComienzo%TYPE,
          w_FechaFin IN Matriculas.FechaFin%TYPE,
          w_Evaluacion IN Matriculas.Evaluacion%TYPE
    
        )
        
        IS
        
        BEGIN
        
        INSERT INTO Matriculas (OID_MAT,OID_A,OID_T,OID_Asig,OID_P,FechaComienzo,FechaFin,Evaluacion) 
        VALUES (sec_matriculas.nextVal,w_OID_A,w_OID_T,w_OID_Asig,w_OID_P,w_FechaComienzo,w_FechaFin,w_Evaluacion);
        
        END añadir_Matricula;
/
create or replace PROCEDURE añadir_Valoracion(
        
           
            
            w_OID_Asig IN VALORACIONES.OID_P%TYPE,
            
            w_OID_A IN VALORACIONES.OID_A%TYPE,
            w_OID_P IN VALORACIONES.OID_P%TYPE,
             
            w_Valoracion IN VALORACIONES.Valoracion%TYPE
        
        )
        
        IS
        
        BEGIN
        
        INSERT INTO Valoraciones (Valoracion, OID_Asig, OID_P, OID_A, OID_V) 
        VALUES (w_Valoracion, w_OID_Asig, w_OID_P, w_OID_A, sec_valoraciones.nextVal);
        
        END añadir_Valoracion;
        
/

create or replace PROCEDURE añadir_Salario(
        
            w_Mes IN SALARIOS.MES%TYPE,
            
            w_Año IN SALARIOS.AÑO%TYPE,
            
            w_Salario_Mes IN SALARIOS.SALARIO_MES%TYPE,
             
            w_OID_P IN SALARIOS.OID_P%TYPE
        
        )
        
        IS
        
        BEGIN
        
        INSERT INTO Salarios (Mes, Año, SALARIO_MES, OID_P, OID_S) 
        VALUES (w_Mes, w_Año, w_SALARIO_MES, w_OID_P, sec_salarios.nextVal);
        
        END añadir_Salario;
        
/
create or replace PROCEDURE añadir_ZonaResidencia(
        
           
            
            w_NOMBREZONA IN ZonaResidencias.NOMBREZONA%TYPE,
            
            w_Provincia IN ZONARESIDENCIAS.PROVINCIA%TYPE
             
                   
        )
        
        IS
        
        BEGIN
        
        INSERT INTO ZonaResidencias (OID_Z, NombreZona, PROVINCIA) 
        VALUES (sec_zonaresidencias.nextVal,W_NOMBREZONA, W_PROVINCIA);
        
        END añadir_ZonaResidencia;
