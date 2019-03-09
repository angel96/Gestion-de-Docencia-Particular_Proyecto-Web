<?php
session_start();
if (isset($_SESSION["formularioValoraciones"]) and $_REQUEST["VALORACIONES"]>=1 && $_REQUEST["VALORACIONES"]<=5) {
    $formularioValoraciones["VALORACIONES"]=$_REQUEST["VALORACIONES"];
	$formularioValoraciones["NOMBREASIG"]=$_REQUEST["NOMBREASIG"];
	$formularioValoraciones["DNI"]=$_REQUEST["DNI"];
	$formularioValoraciones["NOMBREPROFESOR"]=$_REQUEST["NOMBREPROFESOR"];
	$formularioValoraciones["APELLIDOSPROFESOR"]=$_REQUEST["APELLIDOSPROFESOR"];
    $_SESSION["formularioValoraciones"] = $formularioValoraciones;
    Header("Location: ExitoCrearValoracion.php");
}else if(isset($_SESSION["formularioValoraciones"]) and ($_REQUEST["VALORACIONES"]<1 || $_REQUEST["VALORACIONES"]>5)){
    $erroresVal = " La valoracion debe estar acotada entre 1 y 5";
    $_SESSION["erroresVal"]=$erroresVal;
    Header("Location: Formulario_CrearValoracion.php");
    }
	else{
    Header("Location: Formulario_CrearValoracion.php");
		}
?>