<?php
session_start();
    
if (isset($_SESSION["formularioMat"]) && !empty($_REQUEST["DNI"]) && !empty($_REQUEST["NOMBREMAT"])
&& !empty($_REQUEST["NOMBREASIG"]) && !empty($_REQUEST["NOMBREPROFESOR"]) && !empty($_REQUEST["APELLIDOSPROFESOR"])) {
    $formularioMat["FECHACOMIENZODIA"]=$_REQUEST["FECHACOMIENZODIA"];
    $formularioMat["FECHACOMIENZOMES"]= $_REQUEST["FECHACOMIENZOMES"];
    $formularioMat["FECHACOMIENZOAÑO"]=$_REQUEST["FECHACOMIENZOAÑO"];
    $formularioMat["DNI"]= $_REQUEST["DNI"];
    $formularioMat["FECHAFINDIA"]=$_REQUEST["FECHAFINDIA"];
    $formularioMat["FECHAFINMES"]=$_REQUEST["FECHAFINMES"];
    $formularioMat["FECHAFINAÑO"]=$_REQUEST["FECHAFINAÑO"];
    $formularioMat["NOMBRETUTOR"]=$_REQUEST["NOMBRETUTOR"];
    $formularioMat["APELLIDOSTUTOR"]=$_REQUEST["APELLIDOSTUTOR"];
    $formularioMat["NOMBREASIG"]=$_REQUEST["NOMBREASIG"];
    $formularioMat["NOMBREPROFESOR"]=$_REQUEST["NOMBREPROFESOR"];
    $formularioMat["APELLIDOSPROFESOR"]=$_REQUEST["APELLIDOSPROFESOR"];
    $_SESSION["formularioMat"] = $formularioMat;
    Header("Location: ExitoCrearMatricula.php");
}else if(isset($_SESSION["formularioMat"]) && empty($_REQUEST["DNI"])){
    $erroresMat = " El DNI no puede ser vacío";
    $_SESSION["erroresMat"]=$erroresMat;
    Header("Location: Formulario_CrearMatricula.php");
}else if(isset($_SESSION["formularioMat"]) && empty($formularioMat["NOMBREMAT"])){
     $erroresMat = "El NOMBRE de la matrícula de la modalidad no puede ser vacío";   
    $_SESSION["erroresMat"]=$erroresMat;
    Header("Location: Formulario_CrearMatricula.php");
}else if(isset($_SESSION["formularioMat"]) && empty($formularioMat["NOMBREASIG"])){
     $erroresMat = " El NOMBREASIG no puede ser vacío";
    $_SESSION["erroresMat"]=$erroresMat;
    Header("Location: Formulario_CrearMatricula.php");
}else if(isset($_SESSION["formularioMat"]) && empty($formularioMat["NOMBREPROFESOR"]) ){
     $erroresMat = " El NOMBREPROFESOR no puede ser vacío";
    $_SESSION["erroresMat"]=$erroresMat;
    Header("Location: Formulario_CrearMatricula.php");
}else if(isset($_SESSION["formularioMat"]) && empty($formularioMat["APELLIDOSPROFESOR"])){
     $erroresMat = " El APELLIDOSPROFESOR no puede ser vacío";  
    $_SESSION["erroresMat"]=$erroresMat;
    Header("Location: Formulario_CrearMatricula.php");
}else{
    Header("Location: Formulario_CrearMatricula.php");
        }
?>