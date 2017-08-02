<?php
session_start();
if (isset($_SESSION["formularioZR"]) && !empty($_REQUEST["nombreZona"])) {
    $formularioZR["nombreZona"]=$_REQUEST["nombreZona"];
    $formularioZR["provincia"]=$_REQUEST["provincia"];
    $_SESSION["formularioZR"] = $formularioZR;
    Header("Location: ExitoCrearZonaResidencia.php");
}
    else if(isset($_SESSION["formularioZR"]) && empty($_REQUEST["nombreZona"]))
    {
        $erroresZR = "El nombre de la zona no puede ser vacío";
        $_SESSION["erroresZR"]=$erroresZR;
        Header("Location: Formulario_CrearZonaResidencia.php");
}else{
    Header("Location: Formulario_CrearZonaResidencia.php");
		}
?>