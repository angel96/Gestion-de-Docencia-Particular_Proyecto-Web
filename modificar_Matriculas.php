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
        
$error=modificar_Matricula($conexion,$Matriculas["OID_MAT"],$Matriculas["OID_F"],$Matriculas["FECHADEPAGO"],$Matriculas["EVALUACION"],$Matriculas["PAGADO"]);
desconectarBD($conexion);
    if ($error<>"") {
    $_SESSION["error"] = $error;
    $_SESSION["destino"] = "Matriculas.php";
    echo $error; }
    else
    Header("Location:Matriculas.php");
    ?>
