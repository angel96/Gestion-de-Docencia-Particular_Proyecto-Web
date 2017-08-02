<?php function insertarEntradaMatricula($fechaDePagoDia,$fechaDePagoMes,$fechaDePagoAño,$importe,$metodoDePago,$pagado,$conexion)
  {
  	/*  ESTO SE PONE ?¿?¿?¿?¿  ------>>>>> $consulta = "SELECT * FROM MATRICULAS,FACTURAS, WHERE ALUMNOS.OID_F=MATRICULAS.OID_MAT 
	 * AND FACTURAS.OID_MAT=MATRICULAS.OID_MAT";
	 */
    
    
    //formularioMat crear funcion auxiliar para consultar los OIDS y meterle una funcion crear 2 porque son 2 OIDS
   
     try {
      $res="";
      $OID_F1=consultarIdentificadorDeMatricula($conexion,$nombreMod);
      foreach($OID_F1 as $fila){
      $OID_F=$fila['OID_F'];
      }
      $stmt=$conexion->prepare('CALL AÑADIR_FACTURA(:OID_F,:NOMBRE,:CURSO)');//poner orden de sql en funcion de matricula lo del parentesis y bind param de todo el parentesis
      $stmt->bindParam(':OID_F',$OID_F);
      $stmt->bindParam(':FECHADEPAGO',$fechaDePagoDia AND $fechaDePagoMes AND $fechaDePagoAño);
      $stmt->bindParam(':IMPORTE',$importe);
	  $stmt->bindParam(':METODODEPAGO',$metodoDePago);
	  $stmt->bindParam(':PAGADO',$pagado);
      $stmt->execute();

    } catch(PDOException $e) {
      echo $e->getMessage();
      $res=$e;
    }
      return $res;
	  
	  //NO SE QUE HACER ME HE PERDIDO A PARTIR DE AQUI Y NO SÉ SI LO DE ARRIBA ESTÁ BIEN
      
  }
   function consultarIdentificadorDeTutor($conexion,$nombreTutor,$apellidosTutor){
     $consulta = "SELECT OID_U FROM USUARIOS"
        . " WHERE NOMBRE=:NOMBRE_MOD AND APELLIDOS=:APELLIDOS_MOD";
    
    $stmt = $conexion->prepare($consulta);
    $stmt -> bindParam(':NOMBRE_MOD',$nombreTutor);
	$stmt -> bindParam(':APELLIDOS_MOD',$apellidosTutor);
    $stmt -> execute();
    return $stmt;
 }
   function consultarTodasLasAsignaturas($conexion){
    $consulta = "SELECT * FROM ASIGNATURAS,MODALIDADES WHERE ASIGNATURAS.OID_Mat=MODALIDADES.OID_M ORDER BY NOMBRE";
    $stmt = $conexion->query($consulta);
    return $stmt;
   }
    
   
     
?>