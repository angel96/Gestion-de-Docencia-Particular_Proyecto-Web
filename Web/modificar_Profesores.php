<?php   
    session_start();
    if (isset ($_SESSION["Profesores"])){
    $Profesores=$_SESSION["Profesores"];
    unset($_SESSION["Profesores"]);
    }
    else Header("Location: Profesores.php");
        
        require_once("gestionBD.php");
        require_once("gestionarEntradasProfesores.php");
        
        $conexion = conectarBD();      
        
$error=modificar_Profesores($conexion,$Profesores["OID_P"],$Profesores["EMAIL"],$Profesores["NOMBREZONA"],$Profesores["TELEFONO"]);
desconectarBD($conexion);
    if ($error<>"") {
    $_SESSION["error"] = $error;
    $_SESSION["destino"] = "Profesores.php";
    Header("Location:Error.php");
    }
    else
    Header("Location:Profesores.php");
    ?>