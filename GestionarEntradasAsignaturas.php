<?php
       function insertarEntradaAsignatura($nombre,$curso,$nombreMod,$conexion)
  {
    
     try {
      $res="";
      $OID_M1=consultarIdentificadorDeModalidad($conexion,$nombreMod);
      foreach($OID_M1 as $fila){
      $OID_M=$fila['OID_M'];
      }
      $stmt=$conexion->prepare('CALL AÑADIR_ASIGNATURA(:OID_M,:NOMBRE,:CURSO)');
      $stmt->bindParam(':OID_M',$OID_M);
      $stmt->bindParam(':NOMBRE',$nombre);
      $stmt->bindParam(':CURSO',$curso);
      $stmt->execute();

    } catch(PDOException $e) {
      echo $e->getMessage();
      $res=$e;
    }
      return $res;
      
  }
  function consultarProfesoresDeAsignatura($conexion,$OID_Asig)
  {
       $consulta = "SELECT * FROM ZONARESIDENCIAS,USUARIOS,PROFESORES,MATRICULAS"
        . " WHERE MATRICULAS.OID_P = PROFESORES.OID_P"
        . " AND MATRICULAS.OID_Asig = :OID_ASIG"
        . " AND PROFESORES.OID_P = USUARIOS.OID_U"
        . " AND ZONARESIDENCIAS.OID_Z = USUARIOS.OID_Z"
        . " ORDER BY NOMBREZONA,NOMBRE";
    
    $stmt = $conexion->prepare($consulta);
    $stmt -> bindParam(":OID_Asig",$OID_Asig);
    $stmt -> execute();
    return $stmt;
  }
  function valoracionMedia($conexion,$OID_P){
       $consulta = "SELECT VALORACION FROM VALORACIONES"
        . " WHERE OID_P=:OID_P";
    
    $stmt = $conexion->prepare($consulta);
    $stmt -> bindParam(':OID_P',$OID_P);
    $stmt -> execute();
    $contador=0;
    $acumulador=0;
    foreach($stmt as $fila){
        $acumulador=$acumulador+$fila["VALORACION"];
        $contador=$contador+1;
    }
    $res=0;
    if($contador!=0){
    $res=$acumulador/$contador;
    }else{
        $res=null;
    }
    return $res;
  }
   function consultarIdentificadorDeModalidad($conexion,$nombreMod){
     $consulta = "SELECT OID_M FROM MODALIDADES"
        . " WHERE NOMBREMOD=:NOMBRE_MOD";
    
    $stmt = $conexion->prepare($consulta);
    $stmt -> bindParam(':NOMBRE_MOD',$nombreMod);
    $stmt -> execute();
    return $stmt;
 }
   function consultarTodasLasAsignaturas($conexion){
    $consulta = "SELECT * FROM ASIGNATURAS,MODALIDADES WHERE ASIGNATURAS.OID_M=MODALIDADES.OID_M ORDER BY NOMBREMOD";
    $stmt = $conexion->query($consulta);
    return $stmt;
   }
    function modificar_nombreAsig($conexion,$OID_Asig,$nombre) {
        try {
            $stmt=$conexion->prepare('CALL ACTUALIZA_ASIGNATURAS(:OID_ASIG,:NOMBREASIG)');
            $stmt->bindParam(':OID_ASIG',$OID_Asig);
            $stmt->bindParam(':NOMBREASIG',$nombre);
            $stmt->execute();
            return "";
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }
   function quitar_asignatura($conexion,$OID_ASIG){
              try {
            $stmt=$conexion->prepare('DELETE FROM ASIGNATURAS WHERE OID_ASIG=:OID_Asig');
            $stmt->bindParam(':OID_Asig',$OID_ASIG);
            $stmt->execute();
            return "";
        } catch(PDOException $e) {
            return $e->getMessage();
        }
   }
  function consultarTodasLasAsignaturasPaginadas($conexion,$page_num,$page_size){
        $stmt = $conexion->prepare("SELECT * FROM (
            SELECT ROWNUM RNUM * FROM(
             SELECT * FROM ASIGNATURAS,MODALIDADES WHERE ASIGNATURAS.OID_M=MODALIDADES.OID_M ORDER BY NOMBRE
            )
            WHERE ROWNUM<=:last
   )WHERE RNUM>=:first");
   $comienzo=$page_num*$page_size;
   $fin=($page_num+1)*$page_size-1;
            $stmt->bindParam(':last',$fin);
            $stmt->bindParam(':first',$cominenzo);
            $stmt->execute();
            return $stmt;
   }
?>