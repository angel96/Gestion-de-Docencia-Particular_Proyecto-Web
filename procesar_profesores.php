<?php
    session_start();
    if (isset ($_SESSION["Profesores"])){
    $Profesores["NOMBRE"] = $_REQUEST["NOMBRE"];
    $Profesores["APELLIDOS"] = $_REQUEST["APELLIDOS"];
    $Profesores["EMAIL"] = $_REQUEST["EMAIL"];
    $Profesores["TELEFONO"] = $_REQUEST["TELEFONO"];
    $Profesores["SEXO"]=$_REQUEST["SEXO"];
    $Profesores["NOMBREZONA"]=$_REQUEST["NOMBREZONA"];
    $Profesores["OID_P"] = $_REQUEST["OID_P"];
    $Profesores["NOMBREMOD"] = $_REQUEST["NOMBREMOD"];
    $Profesores["OID_Z"] = $_REQUEST["OID_Z"];
    $_SESSION["Profesores"] = $Profesores;
    }
    else{
    Header("Location: Profesores.php");
    }
    

    // Realizar alguna operaci�n seg�n el bot�n que se haya pulsado:
    // Si editar: Header("Location:libros.php"); // Al volver, la l�nea correspondiente pasa a modo edici�n
    if (isset($_REQUEST["editar"])){Header("Location:Profesores.php");
    }
    
    // Si eliminar: Header("Location:quitar_libro.php"); 
    else if (isset($_REQUEST["quitar"])) {Header("Location:quitar_Profesores.php");
    }
    // Si grabar: Header("Location:modificar_titulo.php");
    else if (isset($_REQUEST["grabar"])) Header("Location:modificar_Profesores.php");
    
    // Si consultar pr�stamos: Header("Location:prestamos_libro.php");  
    else Header("Location:EstadisticasProfesores.php");
        
?>