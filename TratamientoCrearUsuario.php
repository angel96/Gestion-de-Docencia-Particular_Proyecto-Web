<?php
session_start();
if (isset($_SESSION["formularioUsuarios"]) and !empty($_REQUEST["NOMBRE"]) and !empty($_REQUEST["TELEFONO"]) and !empty($_REQUEST["APELLIDOS"])
and !empty($_REQUEST["SEXO"]) and !empty($_REQUEST["NOMBREZONA"])
and !empty($_REQUEST["EMAIL"]) and
!(!empty($_REQUEST["MODALIDAD"]) and !empty($_REQUEST["DNI"]))) {
    $formularioUsuarios["NOMBRE"]=$_REQUEST["NOMBRE"];
    $formularioUsuarios["APELLIDOS"]=$_REQUEST["APELLIDOS"];
    $formularioUsuarios["EMAIL"]=$_REQUEST["EMAIL"];
    $formularioUsuarios["TELEFONO"]=$_REQUEST["TELEFONO"];
    $formularioUsuarios["SEXO"]=$_REQUEST["SEXO"];
    $formularioUsuarios["NOMBREZONA"]=$_REQUEST["NOMBREZONA"];
    $formularioUsuarios["ESCUELA"]=$_REQUEST["ESCUELA"];
    if($_REQUEST["DNI"]!=""){
    $formularioUsuarios["FECHANACIMIENTODIA"]=$_REQUEST["FECHANACIMIENTODIA"];
    $formularioUsuarios["FECHANACIMIENTOMES"]=$_REQUEST["FECHANACIMIENTOMES"];
    $formularioUsuarios["FECHANACIMIENTOAÑO"]=$_REQUEST["FECHANACIMIENTOAÑO"];
    $formularioUsuarios["DISCAPACIDAD"]=$_REQUEST["DISCAPACIDAD"];
    $formularioUsuarios["DNI"]=$_REQUEST["DNI"];
    }else{
    $formularioUsuarios["FECHANACIMIENTODIA"]="";
    $formularioUsuarios["FECHANACIMIENTOMES"]="";
    $formularioUsuarios["FECHANACIMIENTOAÑO"]="";
    $formularioUsuarios["DISCAPACIDAD"]="";
    $formularioUsuarios["DNI"]="";
    }
    $formularioUsuarios["MODALIDAD"]=$_REQUEST["MODALIDAD"];
    $_SESSION["formularioUsuarios"] = $formularioUsuarios;
    Header("Location: ExitoCrearUsuario.php");
    }
    else if(isset($_SESSION["formularioUsuarios"]) && empty($_REQUEST["NOMBRE"])){
    $erroresUs = " El nombre de el usuario no puede ser vacío";
    $_SESSION["erroresUs"]=$erroresUs;
    Header("Location: Formulario_CrearUsuario.php");
}   else if(isset($_SESSION["formularioUsuarios"]) && empty($_REQUEST["APELLIDOS"])){
    $erroresUs = " Los apellidos de el usuario no puede ser vacío";
    $_SESSION["erroresUs"]=$erroresUs;
    Header("Location: Formulario_CrearUsuario.php");
}   else if(isset($_SESSION["formularioUsuarios"]) && empty($_REQUEST["TELEFONO"])){
    $erroresUs = " El telefono de el usuario no puede ser vacío";
    $_SESSION["erroresUs"]=$erroresUs;
    Header("Location: Formulario_CrearUsuario.php");
}   else if(isset($_SESSION["formularioUsuarios"]) && empty($_REQUEST["SEXO"])){
    $erroresUs = "El sexo de el usuario no puede ser vacío";
    $_SESSION["erroresUs"]=$erroresUs;
    Header("Location: Formulario_CrearUsuario.php");
}   else if(isset($_SESSION["formularioUsuarios"]) && empty($_REQUEST["NOMBREZONA"])){
    $erroresUs = "El nombre de la zona no puede ser vacío";
    $_SESSION["erroresUs"]=$erroresUs;
    Header("Location: Formulario_CrearUsuario.php");
}   else if(isset($_SESSION["formularioUsuarios"]) && empty($_REQUEST["EMAIL"])){
    $erroresUs = "El email no puede ser vacío";
    $_SESSION["erroresUs"]=$erroresUs;
    Header("Location: Formulario_CrearUsuario.php");
}   else if(isset($_SESSION["formularioUsuarios"]) && (!empty($_REQUEST["MODALIDAD"]) and !empty($_REQUEST["DNI"]))){
    $erroresUs = "No me trolliees";
    $_SESSION["erroresUs"]=$erroresUs;
    Header("Location: Formulario_CrearUsuario.php");

}else{
     Header("Location: Formulario_CrearUsuario.php");
        }
        


?>