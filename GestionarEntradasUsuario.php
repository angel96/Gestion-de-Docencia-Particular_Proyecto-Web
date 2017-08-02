<?php
require_once("GestionarEntradasAsignaturas.php");
    function crearAlumno($NOMBRE,$APELLIDOS,$EMAIL,$TELEFONO,$SEXO,
    $NOMBREZONA,$ESCUELA,$FECHANACIMIENTODIA,$FECHANACIMIENTOMES,
    $FECHANACIMIENTOAÑO,$DISCAPACIDAD,$DNI,$conexion){
        if(crearUsuario($NOMBRE,$APELLIDOS,$EMAIL,$TELEFONO,$SEXO,
    $NOMBREZONA,$conexion)==""){
        try {
      $res="";
      $OID_U1=consultarIdentificadorUsuario($NOMBRE,$APELLIDOS,$conexion);
      foreach($OID_U1 as $fila){
      $OID_U=$fila['OID_U'];
      }
      $fechaActual=getDate();
      $edad=$fechaActual["year"]-$FECHANACIMIENTOAÑO-1;
      if($fechaActual["mon"]==$FECHANACIMIENTOMES){
          if($fechaActual["mday"]>=$FECHANACIMIENTODIA){
              $edad=$edad+1;
          }
      }if($fechaActual["mon"]>$FECHANACIMIENTOMES){
          $edad=$edad+1;
      }
      $timestamp = $FECHANACIMIENTODIA."/".$FECHANACIMIENTOMES."/".$FECHANACIMIENTOAÑO;
      $stmt=$conexion->prepare('CALL AÑADIR_ALUMNO(:OID_U,:ESCUELA,:FECHA,:DISCAPACIDAD,:DNI,:EDAD)');
      $stmt->bindParam(':OID_U',$OID_U);
      $stmt->bindParam(':ESCUELA',$ESCUELA);
      $stmt->bindParam(':FECHA',$timestamp);
      $stmt->bindParam(':DISCAPACIDAD',$DISCAPACIDAD);
      $stmt->bindParam(':DNI',$DNI);
      $stmt->bindParam(':EDAD',$edad);
      echo $edad;
      $stmt->execute();

    } catch(PDOException $e) {
      echo $e->getMessage();
      $res=$e;
    }}
        else{
            $res="nanai";
        }
      return $res;
    }  
function crearProfesor($NOMBRE,$APELLIDOS,$EMAIL,$TELEFONO,$SEXO,
    $NOMBREZONA,$MODALIDAD,$conexion){
        if(crearUsuario($NOMBRE,$APELLIDOS,$EMAIL,$TELEFONO,$SEXO,
    $NOMBREZONA,$conexion)==""){
        try {
      $res="";
      $OID_U1=consultarIdentificadorUsuario($NOMBRE,$APELLIDOS,$conexion);
      foreach($OID_U1 as $fila){
      $OID_U=$fila['OID_U'];
      }
      $OID_M1=consultarIdentificadorDeModalidad($conexion,$MODALIDAD);
      foreach($OID_M1 as $fila){
      $OID_M=$fila['OID_M'];
      }
      $stmt=$conexion->prepare('CALL AÑADIR_PROFESOR(:OID_U,:OID_M)');
      echo $OID_M;
      echo $OID_U;
      $stmt->bindParam(':OID_M',$OID_M);
      $stmt->bindParam(':OID_U',$OID_U);
      $stmt->execute();


     } catch(PDOException $e) {
      echo $e->getMessage();
      $res=$e;
    }}
        else{
            $res="nanai";
        }
      return $res;
    }
    function crearTutor($NOMBRE,$APELLIDOS,$EMAIL,$TELEFONO,$SEXO,
    $NOMBREZONA,$conexion){
         if(crearUsuario($NOMBRE,$APELLIDOS,$EMAIL,$TELEFONO,$SEXO,
    $NOMBREZONA,$conexion)==""){
        try {
      $res="";
      $OID_U1=consultarIdentificadorUsuario($NOMBRE,$APELLIDOS,$conexion);
      foreach($OID_U1 as $fila){
      $OID_U=$fila['OID_U'];
      }
      $stmt=$conexion->prepare('CALL AÑADIR_TUTOR(:OID_U)');
      $stmt->bindParam(':OID_U',$OID_U);
      $stmt->execute();


     } catch(PDOException $e) {
      echo $e->getMessage();
      $res=$e;
    }}
        else{
            $res="nanai";
        }
      return $res;
    }
     function consultarIdentificadorUsuario($nombre,$apellidos,$conexion){
         $consulta = "SELECT OID_U FROM USUARIOS"
        . " WHERE NOMBRE=:NOMBRE_Z AND APELLIDOS=:APELLIDOS_Z";
    
    $stmt = $conexion->prepare($consulta);
    $stmt -> bindParam(':NOMBRE_Z',$nombre);
    $stmt -> bindParam(':APELLIDOS_Z',$apellidos);
    $stmt -> execute();
    return $stmt;
    }
    function crearUsuario($NOMBRE,$APELLIDOS,$EMAIL,$TELEFONO,$SEXO,
    $NOMBREZONA,$conexion){
        try {
      $res="";
      $OID_Z1=consultarIdentificadorZonaResidencia($NOMBREZONA,$conexion);
      foreach($OID_Z1 as $fila){
      $OID_Z=$fila['OID_Z'];
      }
      $stmt=$conexion->prepare('CALL AÑADIR_USUARIO(:NOMBRE,:APELLIDOS,:EMAIL,:TELEFONO,:SEXO,:OID_Z)');
      $stmt->bindParam(':NOMBRE',$NOMBRE);
      $stmt->bindParam(':APELLIDOS',$APELLIDOS);
      $stmt->bindParam(':EMAIL',$EMAIL);
      $stmt->bindParam(':TELEFONO',$TELEFONO);
      $stmt->bindParam(':SEXO',$SEXO);
      $stmt->bindParam(':OID_Z',$OID_Z);
      $stmt->execute();

    } catch(PDOException $e) {
      echo $e->getMessage();
      $res=$e;
    }
      return $res;
    }
    
    function consultarIdentificadorZonaResidencia($nombreZR,$conexion){
         $consulta = "SELECT OID_Z FROM ZONARESIDENCIAS"
        . " WHERE NOMBREZONA=:NOMBRE_Z";
    
    $stmt = $conexion->prepare($consulta);
    $stmt -> bindParam(':NOMBRE_Z',$nombreZR);
    $stmt -> execute();
    return $stmt;
    }
?>