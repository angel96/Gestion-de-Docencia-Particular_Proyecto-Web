<?php   
    session_start();
    if (isset ($_SESSION["Alumnos"])){
    $Alumnos=$_SESSION["Alumnos"];
    unset($_SESSION["Alumnos"]);
    }
    else Header("Location: Alumnos.php");
    
        require_once("gestionBD.php");
        require_once("gestionarEntradasAlumnos.php");
        
        $conexion = conectarBD();      
        $error=quitar_alumno($conexion,$Alumnos["OID_A"]);
        desconectarBD($conexion);
    if ($error<>"") {
    $_SESSION["error"] = $error;
    $_SESSION["destino"] = "Alumnos.php";
    Header("Location:error.php"); 
    }
    else
    Header("Location:Alumnos.php");
?>