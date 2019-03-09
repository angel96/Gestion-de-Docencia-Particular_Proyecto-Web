<?php
  /*
     * #===========================================================#
     * #	Este fichero contiene las funciones de gestión     			 
     * #	de entradas de la capa de acceso a datos de				
     * #       nuestro blog.								
     * #==========================================================#
     */
    
  
  function insertarEntradaZR($nombreZona,$provincia,$conexion)
  {
  	
	 try {
	  $stmt=$conexion->prepare('CALL AÑADIR_ZONARESIDENCIA(:NombreZona,:Provincia)');
	  $stmt->bindParam(':NombreZona',$nombreZona);
      $stmt->bindParam(':Provincia',$provincia);
      $stmt->execute();

	} catch(PDOException $e) {
      echo $e->getMessage();
    }
      return "";
      
  }
	
 
  
  
  function mostrarTodasLasZonas($conexion){
    $consulta = "SELECT * FROM ZONARESIDENCIAS"
        . " ORDER BY PROVINCIA";
    $stmt = $conexion->query($consulta);
    return $stmt;
  }
  function quitar_ZonaResidencia($conexion,$OID_Z)
  {
      try{
          $stmt=$conexion->prepare('DELETE FROM ZONARESIDENCIAS WHERE OID_Z=:OID_Z');
          $stmt->bindParam(':OID_Z',$OID_Z);
          $stmt->execute();
          return "";
      }catch(PDOException $e){
          return $e->getMessage();
      }
  }
  
  function consultarProfesoresDeZona($conexion,$OID_Z)
  {
       $consulta = "SELECT * FROM ZONARESIDENCIAS,USUARIOS,PROFESORES,MODALIDADES"
        . " WHERE MODALIDADES.OID_M = PROFESORES.OID_M"
        . " AND PROFESORES.OID_P = USUARIOS.OID_U"
        . " AND ZONARESIDENCIAS.OID_Z = :OID_Z"
        . " AND ZONARESIDENCIAS.OID_Z = USUARIOS.OID_Z"
        . " ORDER BY NOMBREZONA,NOMBRE";
    
    $stmt = $conexion->prepare($consulta);
    $stmt -> bindParam(":OID_Z",$OID_Z);
    $stmt -> execute();
    return $stmt;
  }
  
?>