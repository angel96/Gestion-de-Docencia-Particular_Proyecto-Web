<?php
require_once("GestionarEntradasAlumnos.php");

  function consultarTodosLosProfesores($conexion){
    $consulta = "SELECT * FROM USUARIOS,PROFESORES,ZONARESIDENCIAS,MODALIDADES WHERE PROFESORES.OID_P=USUARIOS.OID_U AND USUARIOS.OID_Z=ZONARESIDENCIAS.OID_Z AND MODALIDADES.OID_M=PROFESORES.OID_M ORDER BY NOMBREMOD";
    $stmt = $conexion->query($consulta);
    return $stmt;
    }
  function quitar_Profesores($conexion,$OID_P){
       try {
            $stmt=$conexion->prepare('DELETE FROM PROFESORES WHERE OID_P=:profesor');
            $stmt->bindParam(':profesor',$OID_P);
            $stmt->execute();
            $stmt=$conexion->prepare('DELETE FROM USUARIOS WHERE OID_U=:profesor');
            $stmt->bindParam(':profesor',$OID_P);
            $stmt->execute();
            return "";
        } catch(PDOException $e) {
            return $e->getMessage();
        }
  }
  function consultarAlumnosDeProfesor($conexion,$OID_P){
    $stmt=$conexion->prepare("SELECT * FROM USUARIOS,ALUMNOS,VALORACIONES,MATRICULAS,ASIGNATURAS 
    WHERE ALUMNOS.OID_A=USUARIOS.OID_U AND MATRICULAS.OID_A=ALUMNOS.OID_A
    AND VALORACIONES.OID_A=MATRICULAS.OID_A AND MATRICULAS.OID_ASIG=ASIGNATURAS.OID_ASIG
    AND MATRICULAS.OID_P=:OID_P AND VALORACIONES.OID_P=MATRICULAS.OID_P ORDER BY NOMBREASIG");
    $stmt->bindParam(':OID_P',$OID_P);
    $stmt->execute();
    return $stmt;
      
  }
  function modificar_Profesores($conexion,$OID_P,$EMAIL,$NOMBREZONA,$TELEFONO){
      try {
             $OID_Z1=consultarIdentificadorZonaResidencia($conexion, $NOMBREZONA);
             foreach($OID_Z1 as $fila){
             $OID_Z=$fila['OID_Z'];
             }
            $stmt=$conexion->prepare('CALL ACTUALIZA_USUARIOS(:OID_P,:EMAIL,:OID_Z,:TELEFONO)');
            $stmt->bindParam(':OID_P',$OID_P);
            $stmt->bindParam(':EMAIL',$EMAIL);
            $stmt->bindParam(':OID_Z',$OID_Z);
            $stmt->bindParam(':TELEFONO',$TELEFONO);
            $stmt->execute();
            return "";
        } catch(PDOException $e) {
            return $e->getMessage();
        }
  }
?>