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
        
$error=modificar_Alumno($conexion,$Alumnos["OID_A"],$Alumnos["ESCUELA"],$Alumnos["EMAIL"],$Alumnos["NOMBREZONA"],$Alumnos["TELEFONO"],$Alumnos["EDAD"]);
desconectarBD($conexion);
    if ($error<>"") {
    $_SESSION["error"] = $error;
    $_SESSION["destino"] = "Asignaturas.php";
    Header("Location:Error.php");
    }
    else
    Header("Location:Alumnos.php");
    ?>