<?php
session_start();
if (isset($_SESSION["formularioAsig"]) && !empty($_REQUEST["NOMBREASIG"]) && !empty($_REQUEST["NOMBREMOD"])
&& !($_REQUEST["CURSO"]<=0)) {
    $formularioAsig["NOMBREASIG"]=$_REQUEST["NOMBREASIG"];
    $formularioAsig["CURSO"]=$_REQUEST["CURSO"];
    $formularioAsig["NOMBREMOD"]=$_REQUEST["NOMBREMOD"];
    $_SESSION["formularioAsig"] = $formularioAsig;
    Header("Location: ExitoCrearAsignatura.php");
}
    else if(isset($_SESSION["formularioAsig"]) && empty($_REQUEST["NOMBREASIG"]))
    {
        $erroresAsig="El nombre de la asignatura no puede ser vacio";
        $_SESSION["erroresAsig"]=$erroresAsig;
        Header("Location: Formulario_CrearAsignatura.php");
    }
    else if(isset($_SESSION["formularioAsig"]) && empty($_REQUEST["NOMBREMOD"]))
    {
        $erroresAsig="La modalidad no puede ser negativa";
        $_SESSION["erroresAsig"]=$erroresAsig;
        Header("Location: Formulario_CrearAsignatura.php");
    }
    else if(isset($_SESSION["formularioAsig"]) && $_REQUEST["CURSO"]<=0)
    {
        $erroresAsig="El curso no puede ser negativo";
        $_SESSION["erroresAsig"]=$erroresAsig;
        Header("Location: Formulario_CrearAsignatura.php");
    }
    
else{
    Header("Location: Formulario_CrearAsignatura.php");
        }
?>