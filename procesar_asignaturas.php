<?php
    session_start();
    if (isset ($_SESSION["Asignaturas"])){
    $Asignaturas["OID_M"] = $_REQUEST["OID_M"];
    $Asignaturas["OID_ASIG"] = $_REQUEST["OID_ASIG"];
    $Asignaturas["NOMBREASIG"] = $_REQUEST["NOMBREASIG"];
    $Asignaturas["NOMBREMOD"] = $_REQUEST["NOMBREMOD"];
    $Asignaturas["CURSO"] = $_REQUEST["CURSO"];
    $_SESSION["Asignaturas"] = $Asignaturas;
    }
    else{
    Header("Location: Asignaturas.php");
    }
    

    // Realizar alguna operaci�n seg�n el bot�n que se haya pulsado:
    // Si editar: Header("Location:libros.php"); // Al volver, la l�nea correspondiente pasa a modo edici�n
    if (isset($_REQUEST["editar"])){Header("Location:Asignaturas.php");
    }
    
    // Si eliminar: Header("Location:quitar_libro.php"); 
    else if (isset($_REQUEST["quitar"])) {Header("Location:quitar_asignatura.php");
    }
    // Si grabar: Header("Location:modificar_titulo.php");
    else if (isset($_REQUEST["grabar"])) Header("Location:modificar_Asignatura.php");
    
    // Si consultar pr�stamos: Header("Location:prestamos_libro.php");  
    else Header("Location:EstadisticasAsignaturas.php");
        
?>