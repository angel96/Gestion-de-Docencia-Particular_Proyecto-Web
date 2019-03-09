<?php
    session_start();
    if (isset ($_SESSION["Modalidad"])){
    $Modalidad["OID_M"] = $_REQUEST["OID_M"];
    $Modalidad["NOMBREMOD"] = $_REQUEST["NOMBREMOD"];
    $_SESSION["Modalidad"] = $Modalidad;
    }
    else{
    Header("Location: GestionModalidades.php");
    }
    

    // Realizar alguna operaci�n seg�n el bot�n que se haya pulsado:
    // Si editar: Header("Location:libros.php"); // Al volver, la l�nea correspondiente pasa a modo edici�n
    if (isset($_REQUEST["editar"])){Header("Location:GestionModalidades.php");
    }
    // Si grabar: Header("Location:modificar_titulo.php");
    else if (isset($_REQUEST["grabar"])) Header("Location:modificar_nombreModalidad.php");
    
    // Si consultar pr�stamos: Header("Location:prestamos_libro.php");  
    else Header("Location:asignaturasVinculadas.php");
        
?>
