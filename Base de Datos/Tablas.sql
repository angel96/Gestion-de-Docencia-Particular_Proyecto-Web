
/**
Realizado por Angel
**/	
      DROP TABLE Usuarios CASCADE CONSTRAINTS;
      DROP TABLE Tutores CASCADE CONSTRAINTS;
      DROP TABLE Alumnos CASCADE CONSTRAINTS;
      DROP TABLE Modalidad CASCADE CONSTRAINTS;
      DROP TABLE EsHijoDe CASCADE CONSTRAINTS;
      DROP TABLE Matriculas CASCADE CONSTRAINTS;
      DROP TABLE Facturas CASCADE CONSTRAINTS;
      DROP TABLE Asignaturas CASCADE CONSTRAINTS;
      DROP TABLE Profesores CASCADE CONSTRAINTS;
      DROP TABLE Salarios CASCADE CONSTRAINTS;
      DROP TABLE Valoraciones CASCADE CONSTRAINTS;
      DROP TABLE ZonaResidencias CASCADE CONSTRAINTS;
      DROP TABLE Modalidades CASCADE CONSTRAINTS;
      
      CREATE TABLE ZONARESIDENCIAS(
      
          OID_Z NUMBER(3) PRIMARY KEY,
          NombreZona VARCHAR(20) NOT NULL,
          Provincia VARCHAR(20) NOT NULL
      
      
      );

      CREATE TABLE Usuarios(
      
      OID_U NUMBER(3) PRIMARY KEY,
      Nombre VARCHAR(20) NOT NULL,
      Apellidos VARCHAR(20) NOT NULL,
      Email VARCHAR(20) NOT NULL,
      Telefono NUMBER(9) NOT NULL,
      Sexo VARCHAR(7) NOT NULL,
      OID_Z NUMBER(3) NOT NULL,
      FOREIGN KEY (OID_Z) REFERENCES ZonaResidencias,
      CONSTRAINT "Sexo" CHECK (Sexo IN('Hombre', 'Mujer'))
      
      );
      
      
      CREATE TABLE Tutores(
      OID_T NUMBER(3) PRIMARY KEY,
      FOREIGN KEY (OID_T) REFERENCES Usuarios
      );
      
      
      
      CREATE TABLE Alumnos(
      OID_A NUMBER(3) PRIMARY KEY,
      FOREIGN KEY (OID_A) REFERENCES Usuarios,      
      Escuela VARCHAR(20) NOT NULL,
      FechaNacimiento DATE NOT NULL,
      Discapacidad NUMBER(1) DEFAULT 0 CHECK (Discapacidad IN(0,1)) NOT NULL,
      DNI VARCHAR(9) NOT NULL,
      EDAD NUMBER (2),
      UNIQUE (DNI)
      
      );
      
      
      CREATE TABLE EsHijoDe(
      
      OID_EHD NUMBER(3) PRIMARY KEY,
      OID_A NUMBER(3) NOT NULL,
      OID_T NUMBER(3) NOT NULL,
      FOREIGN KEY (OID_A) REFERENCES Alumnos,
      FOREIGN KEY (OID_T) REFERENCES Tutores
      
      );
        
      CREATE TABLE Modalidades(
      OID_M NUMBER(2) PRIMARY KEY,
      Nombre VARCHAR(20) NOT NULL,
      UNIQUE (Nombre)
      );
      
      CREATE TABLE Profesores(
      
      OID_P NUMBER(3) PRIMARY KEY,
      FOREIGN KEY (OID_P) REFERENCES Usuarios,
      
      OID_M NUMBER(3),
      FOREIGN KEY(OID_M) REFERENCES Modalidades
      );
      
      CREATE TABLE Asignaturas(
      
       OID_Asig NUMBER(3) PRIMARY KEY,
       OID_M NUMBER(3) NOT NULL,
       FOREIGN KEY (OID_M) REFERENCES Modalidades,
       Nombre VARCHAR(20) NOT NULL,
       Curso NUMBER(1) NOT NULL, CONSTRAINTS "ASIGNATURAS_CHECK" CHECK(Curso>0)
        
      );
      
      CREATE TABLE Matriculas(
      
      OID_Mat NUMBER(3) PRIMARY KEY,
      OID_A NUMBER(3) NOT NULL,
      OID_T NUMBER(3),
      OID_Asig NUMBER(3) NOT NULL,
      OID_P NUMBER(3) NOT NULL,
      FOREIGN KEY (OID_A) REFERENCES Alumnos,
      FOREIGN KEY (OID_T) REFERENCES Tutores,
      FOREIGN KEY (OID_Asig) REFERENCES Asignaturas,
      FOREIGN KEY (OID_P) REFERENCES Profesores,
      FechaComienzo DATE NOT NULL,
      FechaFin DATE NOT NULL,
      Evaluacion VARCHAR(15) NULL, 
      CONSTRAINTS "TipoEvaluacion" CHECK (Evaluacion IN ('No apto', 'Suficiente', 'Bien', 'Notable','Sobresaliente'))  
      
      );
      
      CREATE TABLE Facturas(
      
      OID_F NUMBER(3) PRIMARY KEY,
      FechaDePago DATE NOT NULL,
      Importe NUMBER(5,2) NOT NULL, 
      CONSTRAINT "Facturas_CHK1" CHECK (Importe>0),
      MetodoDePago VARCHAR(10),
      CONSTRAINT "Metodo de Pago" CHECK (MetodoDePago IN('Efectivo', 'Pago Bancario')),
      Pagado NUMBER(1) DEFAULT 0 CHECK (Pagado IN(0,1)) NOT NULL,
      OID_Mat NUMBER(3),
      FOREIGN KEY (OID_Mat) REFERENCES Matriculas
           
      );
      
      CREATE TABLE SALARIOS(
      MES INTEGER NOT NULL,
      CONSTRAINT "Meses" CHECK (MES<=12),
      AÑO INTEGER NOT NULL, 
      SALARIO_MES NUMBER(5,2) NOT NULL, 
      CONSTRAINT "SALARIO_MES" CHECK(SALARIO_MES>=0), 
      OID_P NUMBER(3), FOREIGN KEY (OID_P) REFERENCES PROFESORES, 
      OID_S NUMBER(3) PRIMARY KEY);
      
      CREATE TABLE VALORACIONES(
      VALORACION NUMBER(1) NOT NULL, 
      CONSTRAINT "VALORACION" CHECK (VALORACION<=5), 
      OID_Asig NUMBER(3), FOREIGN KEY (OID_Asig) REFERENCES ASIGNATURAS, 
      OID_P NUMBER(3), FOREIGN KEY (OID_P) REFERENCES PROFESORES, 
      OID_A NUMBER(3), FOREIGN KEY (OID_A) REFERENCES ALUMNOS, 
      OID_V NUMBER(3) PRIMARY KEY);