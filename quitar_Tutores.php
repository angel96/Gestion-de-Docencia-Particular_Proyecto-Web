<?php   
    session_start();
    if (isset ($_SESSION["Tutores"])){
    $Tutores=$_SESSION["Tutores"];
    unset($_SESSION["Tutores"]);
    }
    else Header("Location: Tutores.php");
    
        require_once("gestionBD.php");
        require_once("gestionarEntradasTutores.php");
        
        $conexion = conectarBD();      
        $error=quitar_Tutores($conexion,$Tutores["OID_T"]);
        desconectarBD($conexion);
    if ($error<>"") {
    $_SESSION["error"] = $error;
    $_SESSION["destino"] = "Tutores.php";
    Header("Location:error.php"); 
    }
    else
    Header("Location:Tutores.php");
?>