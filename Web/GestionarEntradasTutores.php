<?php
require_once("GestionarEntradasAlumnos.php");

  function consultarTodosLosTutores($conexion){
    $consulta = "SELECT * FROM USUARIOS,TUTORES,ZONARESIDENCIAS WHERE TUTORES.OID_T=USUARIOS.OID_U AND USUARIOS.OID_Z=ZONARESIDENCIAS.OID_Z ORDER BY NOMBREZONA";
    $stmt = $conexion->query($consulta);
    return $stmt;
    }
  function quitar_Tutores($conexion,$OID_T){
       try {
            $stmt=$conexion->prepare('DELETE FROM TUTORES WHERE OID_T=:tutor');
            $stmt->bindParam(':tutor',$OID_T);
            $stmt->execute();
            $stmt=$conexion->prepare('DELETE FROM USUARIOS WHERE OID_U=:tutor');
            $stmt->bindParam(':tutor',$OID_T);
            $stmt->execute();
            return "";
        } catch(PDOException $e) {
            return $e->getMessage();
        }
  }
  function consultarAlumnosDeTutor($conexion,$OID_T){
      $stmt=$conexion->prepare("SELECT * FROM USUARIOS,ALUMNOS,MATRICULAS
    WHERE ALUMNOS.OID_A=USUARIOS.OID_U AND MATRICULAS.OID_A=ALUMNOS.OID_A
    AND MATRICULAS.OID_T=:OID_T ORDER BY NOMBRE");
    $stmt->bindParam(':OID_T',$OID_T);
    $stmt->execute();
    return $stmt;
  }
  function modificar_Tutores($conexion,$OID_T,$EMAIL,$NOMBREZONA,$TELEFONO){
      try {
             $OID_Z1=consultarIdentificadorZonaResidencia($conexion, $NOMBREZONA);
             foreach($OID_Z1 as $fila){
             $OID_Z=$fila['OID_Z'];
             }
            $stmt=$conexion->prepare('CALL ACTUALIZA_USUARIOS(:OID_T,:EMAIL,:OID_Z,:TELEFONO)');
            $stmt->bindParam(':OID_T',$OID_T);
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