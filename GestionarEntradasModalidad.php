<?php
      function insertarEntradaModalidad($nombre,$conexion)
  {
    
     try {
       $res="";
      $stmt=$conexion->prepare('CALL AÑADIR_MODALIDAD(:NombreMod)');
      $stmt->bindParam(':NombreMod',$nombre);
      $stmt->execute();

    } catch(PDOException $e) {
      echo $e->getMessage();
      $res=$e;
    }
      return $res;
      
  }
  function consultarTodasLasModalidades($conexion){
    $consulta = "SELECT * FROM MODALIDADES ORDER BY NOMBREMOD";
    $stmt = $conexion->query($consulta);
    return $stmt;
  }
   function modificar_nombre($conexion,$OID_M,$NOMBRE) {
        try {
            $stmt=$conexion->prepare('CALL ACTUALIZA_MODALIDADES(:OID_M,:NOMBRE)');
            $stmt->bindParam(':OID_M',$OID_M);
            $stmt->bindParam(':NOMBRE',$NOMBRE);
            $stmt->execute();
            return "";
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }
 function consultarAsignaturasDeModalidad($conexion,$OID_M){
     $consulta = "SELECT * FROM ASIGNATURAS"
        . " WHERE ASIGNATURAS.OID_M = :W_OID_M"
        . " ORDER BY CURSO,NOMBREASIG";
    
    $stmt = $conexion->prepare($consulta);
    $stmt -> bindParam(":W_OID_M",$OID_M);
    $stmt -> execute();
    return $stmt;
 }
  function consultarProfesoresDeModalidad($conexion,$OID_M){
       $consulta = "SELECT * FROM ZONARESIDENCIAS,USUARIOS,PROFESORES,MODALIDADES"
        . " WHERE MODALIDADES.OID_M = :W_OID_M"
        . " AND PROFESORES.OID_M = :W_OID_M"
        . " AND PROFESORES.OID_P = USUARIOS.OID_U"
        . " AND ZONARESIDENCIAS.OID_Z = USUARIOS.OID_Z"
        . " ORDER BY NOMBREZONA,NOMBRE";
    
    $stmt = $conexion->prepare($consulta);
    $stmt -> bindParam(":W_OID_M",$OID_M);
    $stmt -> execute();
    return $stmt;
  }
    
?>