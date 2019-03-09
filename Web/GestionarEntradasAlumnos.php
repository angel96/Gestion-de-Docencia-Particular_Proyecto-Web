<?php
    function consultarTodosLosAlumnos($conexion){
    $consulta = "SELECT * FROM USUARIOS,ALUMNOS,ZONARESIDENCIAS WHERE ALUMNOS.OID_A=USUARIOS.OID_U AND USUARIOS.OID_Z=ZONARESIDENCIAS.OID_Z ORDER BY NOMBREZONA";
    $stmt = $conexion->query($consulta);
    return $stmt;
    }
    function quitar_alumno($conexion,$alumno){
        try {
            $stmt=$conexion->prepare('DELETE FROM ALUMNOS WHERE OID_A=:alumno');
            $stmt->bindParam(':alumno',$alumno);
            $stmt->execute();
            $stmt=$conexion->prepare('DELETE FROM USUARIOS WHERE OID_U=:alumno');
            $stmt->bindParam(':alumno',$alumno);
            $stmt->execute();
            return "";
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }
     function modificar_Alumno($conexion,$OID_A,$ESCUELA,$EMAIL,$NOMBREZONA,$TELEFONO,$EDAD)
    {
         try {
             $OID_Z1=consultarIdentificadorZonaResidencia($conexion, $NOMBREZONA);
             foreach($OID_Z1 as $fila){
             $OID_Z=$fila['OID_Z'];
             }
            $stmt=$conexion->prepare('CALL ACTUALIZA_USUARIOS(:OID_A,:EMAIL,:OID_Z,:TELEFONO)');
            $stmt->bindParam(':OID_A',$OID_A);
            $stmt->bindParam(':EMAIL',$EMAIL);
            $stmt->bindParam(':OID_Z',$OID_Z);
            $stmt->bindParam(':TELEFONO',$TELEFONO);
            $stmt->execute();
            $stmt2=$conexion->prepare('CALL ACTUALIZA_ALUMNOS(:OID_A,:ESCUELA,:EDAD)');
            $stmt2->bindParam(':OID_A',$OID_A);
            $stmt2->bindParam(':ESCUELA',$ESCUELA);
            $stmt2->bindParam(':EDAD',$EDAD);
            $stmt2->execute();
            return "";
        } catch(PDOException $e) {
            return $e->getMessage();
        }
    }
    function consultarMatriculasDelAlumno($conexion,$OID_A){
    $stmt=$conexion->prepare("SELECT * FROM USUARIOS,PROFESORES,MATRICULAS,ASIGNATURAS 
    WHERE PROFESORES.OID_P=USUARIOS.OID_U AND MATRICULAS.OID_P=PROFESORES.OID_P
    AND MATRICULAS.OID_A=:OID_A AND MATRICULAS.OID_ASIG=ASIGNATURAS.OID_ASIG ORDER BY NOMBREASIG");
    $stmt->bindParam(':OID_A',$OID_A);
    $stmt->execute();
    return $stmt;
    }
    function consultarIdentificadorZonaResidencia($conexion,$nombrezona){
            $stmt=$conexion->prepare('SELECT OID_Z FROM ZONARESIDENCIAS WHERE NOMBREZONA=:NOMBRE');
            $stmt->bindParam(':NOMBRE',$nombrezona);
            $stmt->execute();
            return $stmt;
    }
?>