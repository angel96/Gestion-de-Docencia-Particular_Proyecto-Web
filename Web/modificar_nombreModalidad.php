<?php   
    session_start();
    if (isset ($_SESSION["Modalidad"])){
    $Modalidad=$_SESSION["Modalidad"];
    unset($_SESSION["Modalidad"]);
    }
    else Header("Location: GestionModalidades.php");
        
        require_once("gestionBD.php");
        require_once("gestionarEntradasModalidad.php");
        
        $conexion = conectarBD();      
        
$error=modificar_nombre($conexion,$Modalidad["OID_M"],$Modalidad["NOMBREMOD"]);
desconectarBD($conexion);
    if ($error<>"") {
    $_SESSION["error"] = $error;
    $_SESSION["destino"] = "GestionModalidades.php";
    echo $Modalidad["OID_M"];
    echo $Modalidad["NOMBREMOD"];
    echo $error; }
    else
    Header("Location:GestionModalidades.php");
    ?>
