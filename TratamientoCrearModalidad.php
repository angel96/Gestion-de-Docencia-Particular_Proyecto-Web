<?php
session_start();
if (isset($_SESSION["formularioMod"]) && !empty($_REQUEST["NOMBREMOD"])) {
    $formularioMod["NOMBREMOD"]=$_REQUEST["NOMBREMOD"];
    $_SESSION["formularioMod"] = $formularioMod;
     Header("Location: ExitoCrearModalidad.php");
}
    else if(isset($_SESSION["formularioMod"]) && empty($_REQUEST["NOMBREMOD"])){
        $erroresMod = "El nombre de la modalidad no puede ser vacío";
        $_SESSION["erroresMod"]=$erroresMod;
        Header("Location: Formulario_CrearModalidad.php");
  
    }else{
    Header("Location: Formulario_CrearModalidad.php");
        }
?>