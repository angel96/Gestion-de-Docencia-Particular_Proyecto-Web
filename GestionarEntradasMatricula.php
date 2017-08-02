<?php //añadir DNI NOMBRE Y APELLIDOS PROFESOR Y TUTORES  PONER TODO LO DEL FORMULARIO ; ORDEN EXITO CRREAAR MATRICULA IMPORTANTE =
       function insertarEntradaMatricula($fechaComienzoDia,$fechaComienzoMes,$fechaComienzoAño,
       $fechaFinDia,$fechaFinMes,$fechaFinAño,$DNI,$nombreTutor,$apellidosTutor,$nombreAsig,
       $nombreProfesor,$apellidosProfesor,$conexion)
  {
     try {
      $res="";
      if(!$nombreTutor==""){
      $OID_T1=consultarIdentificadorDeTutor($conexion,$nombreTutor,$apellidosTutor);
      foreach($OID_T1 as $fila){
      $OID_T=$fila['OID_U'];
      }}
      $OID_P1=consultarIdentificadorDeProfesor($conexion,$nombreProfesor,$apellidosProfesor);
      foreach($OID_P1 as $fila){
      $OID_P=$fila['OID_U'];
      }
      $OID_A1=consultarIdentificadorDeAlumno($conexion,$DNI);
      foreach($OID_A1 as $fila){
      $OID_A=$fila['OID_A'];
      }
      $OID_ASIG1=consultarIdentificadorDeAsignatura($conexion,$nombreAsig);
      foreach($OID_ASIG1 as $fila){
      $OID_ASIG=$fila['OID_ASIG'];
      }
      $fecha1 = $fechaComienzoDia."/".$fechaComienzoMes."/".$fechaComienzoAño;
      $fecha2 = $fechaFinDia."/".$fechaFinMes."/".$fechaFinAño;
      if(!$nombreTutor==""){
      $stmt=$conexion->prepare('CALL AÑADIR_MATRICULA(:OID_A,:OID_T,:OID_Asig,:OID_P,:FECHACOMIENZO,:FECHAFIN,null)');
      $stmt->bindParam(':OID_A',$OID_A);
      $stmt->bindParam(':OID_T',$OID_T);
      $stmt->bindParam(':OID_Asig',$OID_ASIG);
      $stmt->bindParam(':OID_P',$OID_P);
      $stmt->bindParam(':FECHACOMIENZO',$fecha1);
      $stmt->bindParam(':FECHAFIN',$fecha2);
      }else{
      $stmt=$conexion->prepare('CALL AÑADIR_MATRICULA(:OID_A,NULL,:OID_Asig,:OID_P,:FECHACOMIENZO,:FECHAFIN,null)');
      $stmt->bindParam(':OID_A',$OID_A);
      $stmt->bindParam(':OID_Asig',$OID_ASIG);
      $stmt->bindParam(':OID_P',$OID_P);
      $stmt->bindParam(':FECHACOMIENZO',$fecha1);
      $stmt->bindParam(':FECHAFIN',$fecha2);
      }
      $stmt->execute();
      
$res="";
    } catch(PDOException $e) {
      echo $e->getMessage();
      $res=$e;
    }
      return $res;
      
  }
function consultarOIDMAT($DNI,$nombreAsig,
       $nombreProfesor,$apellidosProfesor,$conexion){
    
     try {
      $res="";
      $OID_P1=consultarIdentificadorDeProfesor($conexion,$nombreProfesor,$apellidosProfesor);
      foreach($OID_P1 as $fila){
      $OID_P=$fila['OID_U'];
      }
      $OID_A1=consultarIdentificadorDeAlumno($conexion,$DNI);
      foreach($OID_A1 as $fila){
      $OID_A=$fila['OID_A'];
      }
      $OID_ASIG1=consultarIdentificadorDeAsignatura($conexion,$nombreAsig);
      foreach($OID_ASIG1 as $fila){
      $OID_ASIG=$fila['OID_ASIG'];
      }
      $stmt2=$conexion->prepare('SELECT OID_MAT FROM MATRICULAS WHERE MATRICULAS.OID_A=:OID_A AND MATRICULAS.OID_ASIG=:OID_Asig AND MATRICULAS.OID_P=:OID_P');
      $stmt2->bindParam(':OID_A',$OID_A);
      $stmt2->bindParam(':OID_Asig',$OID_ASIG);
      $stmt2->bindParam(':OID_P',$OID_P);
      $stmt2->execute();
      return $stmt2;
    } catch(PDOException $e) {
      echo $e->getMessage();
      return $e;
    }
}
function consultarTodasLasMatriculasYFacturas($conexion){
    $consulta = "SELECT * FROM FACTURAS,MATRICULAS,ASIGNATURAS WHERE FACTURAS.OID_MAT=MATRICULAS.OID_MAT AND MATRICULAS.OID_ASIG=ASIGNATURAS.OID_ASIG ORDER BY IMPORTE";
    $stmt = $conexion->query($consulta);
    return $stmt;
}
function alumnoconOID($conexion,$OID_A){
    $stmt = $conexion->prepare("SELECT * FROM USUARIOS WHERE OID_U=:OID_A");
    $stmt -> bindParam(':OID_A',$OID_A);
    $stmt -> execute();
    return $stmt;
}
function profesorconOID($conexion,$OID_P){
    $stmt = $conexion->prepare("SELECT * FROM USUARIOS WHERE OID_U=:OID_P");
    $stmt -> bindParam(':OID_P',$OID_P);
    $stmt -> execute();
    return $stmt;
}
function edadAlumno($conexion,$DNI){
    $stmt = $conexion->prepare("SELECT EDAD FROM ALUMNOS WHERE DNI=:DNI");
    $stmt -> bindParam(':DNI',$DNI);
    $stmt -> execute();
    return $stmt;
}
   function consultarIdentificadorDeTutor($conexion,$nombreTutor,$apellidosTutor){
     $consulta = "SELECT OID_U FROM USUARIOS"
        . " WHERE NOMBRE=:NOMBRE AND APELLIDOS=:APELLIDOS";
    
    $stmt = $conexion->prepare($consulta);
    $stmt -> bindParam(':NOMBRE',$nombreTutor);
    $stmt -> bindParam(':APELLIDOS',$apellidosTutor);
    $stmt -> execute();
    return $stmt;
 }
   function quitar_Matricula($conexion,$OID_Mat){
       try {
            $stmt=$conexion->prepare('DELETE FROM FACTURAS WHERE OID_MAT=:OID_MAT');
            $stmt->bindParam(':OID_MAT',$OID_Mat);
            $stmt->execute();
            $stmt2=$conexion->prepare('DELETE FROM MATRICULAS WHERE OID_MAT=:OID_MAT');
            $stmt2->bindParam(':OID_MAT',$OID_Mat);
            $stmt2->execute();
            return "";
        } catch(PDOException $e) {
            return $e->getMessage();
        }
   }
   function modificar_Matricula($conexion,$OID_Mat,$OID_F,$FECHADEPAGO,$EVALUACION,$PAGADO){
      try{
          $stmt=$conexion->prepare("CALL ACTUALIZA_FACTURAS(:OID_F,:FECHADEPAGO,:PAGADO)");
          $stmt->bindParam(':OID_F',$OID_F);
          $stmt->bindParam(':FECHADEPAGO',$FECHADEPAGO);
          $stmt->bindParam(':PAGADO',$PAGADO);
          $stmt->execute();
          $stmt2=$conexion->prepare("CALL ACTUALIZA_MATRICULAS(:OID_MAT,:EVALUACION)");
          $stmt2->bindParam(':OID_MAT',$OID_Mat);
          $stmt2->bindParam(':EVALUACION',$EVALUACION);
          $stmt2->execute();
          return "";
      } catch(PDOException $e){
          return $e->getMessage();
      }
   }
   function consultarIdentificadorDeProfesor($conexion,$nombreProf,$apellidosProf){
    $consulta = "SELECT OID_U FROM USUARIOS WHERE NOMBRE=:NOMBRE_MOD AND APELLIDOS=:APELLIDOS_MOD";
    $stmt = $conexion->prepare($consulta);
    $stmt -> bindParam(':NOMBRE_MOD',$nombreProf);
    $stmt -> bindParam(':APELLIDOS_MOD',$apellidosProf);
    $stmt -> execute();
    return $stmt;
 }
   function consultarIdentificadorDeAlumno($conexion,$DNI){
     $consulta = "SELECT OID_A FROM ALUMNOS"
        . " WHERE DNI=:DNI";
    
    $stmt = $conexion->prepare($consulta);
    $stmt -> bindParam(':DNI',$DNI);
    $stmt -> execute();
    return $stmt;
 }
   function consultarIdentificadorDeAsignatura($conexion,$nombreAsig){
     $consulta = "SELECT OID_ASIG FROM ASIGNATURAS"
        . " WHERE NOMBREASIG=:NOMBREASIG";
    
    $stmt = $conexion->prepare($consulta);
    $stmt -> bindParam(':NOMBREASIG',$nombreAsig);
    $stmt -> execute();
    return $stmt;
 }
   function consultarTodasLasAsignaturas($conexion){
    $consulta = "SELECT * FROM ASIGNATURAS ORDER BY NOMBREASIG";
    $stmt = $conexion->query($consulta);
    return $stmt;
   }
     
?>