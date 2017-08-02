<?php   
    session_start();
    if (isset ($_SESSION["ZONARESIDENCIA"])){
    $ZONARESIDENCIA=$_SESSION["ZONARESIDENCIA"];
    unset($_SESSION["ZONARESIDENCIA"]);
    }
    else Header("Location: EliminarZonasResidencias.php");
    
        require_once("gestionBD.php");
        require_once("gestionarEntradasZonaResidencia.php");
        
        $conexion = conectarBD();      
        $error=quitar_zonaResidencia($conexion,$ZONARESIDENCIA["OID_Z"]);
        desconectarBD($conexion);
    if ($error<>"") {
    $_SESSION["error"] = $error;
    $_SESSION["destino"] = "EliminarZonasResidencias.php";
    // Header("Location:error.php");
    echo $error; 
    }
    else
    Header("Location:EliminarZonasResidencias.php");
?>