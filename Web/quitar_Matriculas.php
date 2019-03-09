<?php   
    session_start();
    if (isset ($_SESSION["Matriculas"])){
    $Matriculas=$_SESSION["Matriculas"];
    unset($_SESSION["Matriculas"]);
    }
    else Header("Location: Matriculas.php");
    
        require_once("gestionBD.php");
        require_once("gestionarEntradasMatricula.php");
        $conexion = conectarBD();      
        $error=quitar_Matricula($conexion,$Matriculas["OID_MAT"]);
        desconectarBD($conexion);
    if ($error<>"") {
    $_SESSION["error"] = $error;
    $_SESSION["destino"] = "Matriculas.php";
    Header("Location:error.php"); 
    }
    else
    Header("Location:Matriculas.php");
?>