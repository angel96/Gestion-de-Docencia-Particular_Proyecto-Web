<?php
    session_start();
    if (isset ($_SESSION["Alumnos"])){
     $Alumnos["NOMBRE"] = $_REQUEST["NOMBRE"];
    $Alumnos["APELLIDOS"] = $_REQUEST["APELLIDOS"];
    $Alumnos["EMAIL"] = $_REQUEST["EMAIL"];
    $Alumnos["TELEFONO"] = $_REQUEST["TELEFONO"];
    $Alumnos["SEXO"]=$_REQUEST["SEXO"];
    $Alumnos["NOMBREZONA"]=$_REQUEST["NOMBREZONA"];
    $Alumnos["OID_A"] = $_REQUEST["OID_A"];
    $Alumnos["OID_Z"] = $_REQUEST["OID_Z"];
    $Alumnos["ESCUELA"] = $_REQUEST["ESCUELA"];
    $Alumnos["FECHANACIMIENTO"] = $_REQUEST["FECHANACIMIENTO"];
    $Alumnos["DISCAPACIDAD"] = $_REQUEST["DISCAPACIDAD"];
    $Alumnos["DNI"]=$_REQUEST["DNI"];
    $Alumnos["EDAD"]=$_REQUEST["EDAD"];
    $_SESSION["Alumnos"] = $Alumnos;
    }
    else{
    Header("Location: Alumnos.php");
    }
    

    // Realizar alguna operaci�n seg�n el bot�n que se haya pulsado:
    // Si editar: Header("Location:libros.php"); // Al volver, la l�nea correspondiente pasa a modo edici�n
    if (isset($_REQUEST["editar"])){Header("Location:Alumnos.php");
    }
    
    // Si eliminar: Header("Location:quitar_libro.php"); 
    else if (isset($_REQUEST["quitar"])) {Header("Location:quitar_Alumnos.php");
    }
    // Si grabar: Header("Location:modificar_titulo.php");
    else if (isset($_REQUEST["grabar"])) Header("Location:modificar_Alumnos.php");
    
    // Si consultar pr�stamos: Header("Location:prestamos_libro.php");  
    else Header("Location:EstadisticasAlumnos.php");
        
?>