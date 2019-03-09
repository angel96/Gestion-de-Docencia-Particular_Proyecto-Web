<?php
    session_start();
    if (isset ($_SESSION["Tutores"])){
    $Tutores["NOMBRE"] = $_REQUEST["NOMBRE"];
    $Tutores["APELLIDOS"] = $_REQUEST["APELLIDOS"];
    $Tutores["EMAIL"] = $_REQUEST["EMAIL"];
    $Tutores["TELEFONO"] = $_REQUEST["TELEFONO"];
    $Tutores["SEXO"]=$_REQUEST["SEXO"];
    $Tutores["NOMBREZONA"]=$_REQUEST["NOMBREZONA"];
    $Tutores["OID_T"] = $_REQUEST["OID_T"];
    $Tutores["OID_Z"] = $_REQUEST["OID_Z"];
    $_SESSION["Tutores"] = $Tutores;
    }
    else{
    Header("Location: Tutores.php");
    }
    

    // Realizar alguna operaci�n seg�n el bot�n que se haya pulsado:
    // Si editar: Header("Location:libros.php"); // Al volver, la l�nea correspondiente pasa a modo edici�n
    if (isset($_REQUEST["editar"])){Header("Location:Tutores.php");
    }
    
    // Si eliminar: Header("Location:quitar_libro.php"); 
    else if (isset($_REQUEST["quitar"])) {Header("Location:quitar_Tutores.php");
    }
    // Si grabar: Header("Location:modificar_titulo.php");
    else if (isset($_REQUEST["grabar"])) Header("Location:modificar_Tutores.php");
    
    // Si consultar pr�stamos: Header("Location:prestamos_libro.php");  
    else Header("Location:EstadisticasTutores.php");
        
?>