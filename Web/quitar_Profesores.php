<?php   
    session_start();
    if (isset ($_SESSION["Profesores"])){
    $Profesores=$_SESSION["Profesores"];
    unset($_SESSION["Profesores"]);
    }
    else Header("Location: Tutores.php");
    
        require_once("gestionBD.php");
        require_once("gestionarEntradasProfesores.php");
        
        $conexion = conectarBD();      
        $error=quitar_Profesores($conexion,$Profesores["OID_P"]);
        desconectarBD($conexion);
    if ($error<>"") {
    $_SESSION["error"] = $error;
    $_SESSION["destino"] = "Profesores.php";
    Header("Location:error.php"); 
    }
    else
    Header("Location:Profesores.php");
?>