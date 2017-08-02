<?php
	function conectarBD(){
	 	$host = "oci:dbname=localhost/XE;charset=UTF8";
		$usuario = "Rokkuman";
		$password = "680225162";
		$conexion=null;
	try{
	$conexion=new PDO($host,$usuario,$password,array(PDO::ATTR_PERSISTENT => true));
     $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
			}
		catch( PDOException $e ) {
			// tratamiento del error
		echo "error de conexión: " . $e->getMessage();
		//header("Location: error.php");
        }
		return $conexion;
  }	
  
  function desconectarBD($conexion) {
  	$conexion=null;
  }

  
?>