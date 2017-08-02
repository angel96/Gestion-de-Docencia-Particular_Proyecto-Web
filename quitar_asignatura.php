<?php   
    session_start();
    if (isset ($_SESSION["Asignaturas"])){
    $Asignaturas=$_SESSION["Asignaturas"];
    unset($_SESSION["Asignaturas"]);
    }
    else Header("Location: Asignaturas.php");
    
        require_once("gestionBD.php");
        require_once("gestionarEntradasAsignaturas.php");
        
        $conexion = conectarBD();      
        $error=quitar_asignatura($conexion,$Asignaturas["OID_ASIG"]);
        desconectarBD($conexion);
    if ($error<>"") {
    $_SESSION["error"] = $error;
    $_SESSION["destino"] = "Asignaturas.php";
    Header("Location:error.php"); 
    }
    else
    Header("Location:Asignaturas.php");
?>