<?php
    session_start();
    if (isset ($_SESSION["Matriculas"])){
    $Matriculas["OID_MAT"] = $_REQUEST["OID_MAT"];
    $Matriculas["OID_A"] = $_REQUEST["OID_A"];
    $Matriculas["OID_T"] = $_REQUEST["OID_T"];
    $Matriculas["OID_ASIG"] = $_REQUEST["OID_ASIG"];
    $Matriculas["OID_P"]=$_REQUEST["OID_P"];
    $Matriculas["FECHACOMIENZO"] = $_REQUEST["FECHACOMIENZO"];
    $Matriculas["FECHAFIN"] = $_REQUEST["FECHAFIN"];
    $Matriculas["EVALUACION"] = $_REQUEST["EVALUACION"];
    $Matriculas["NOMBREASIG"] = $_REQUEST["NOMBREASIG"];
    $Matriculas["NOMBREPROF"]=$_REQUEST["NOMBREPROF"];
    $Matriculas["APELLIDOSPROF"] = $_REQUEST["APELLIDOSPROF"];
    $Matriculas["NOMBREALUMNO"] = $_REQUEST["NOMBREALUMNO"];
    $Matriculas["APELLIDOSALUMNO"] = $_REQUEST["APELLIDOSALUMNO"];
    $Matriculas["OID_F"] = $_REQUEST["OID_F"];
    $Matriculas["FECHADEPAGO"]=$_REQUEST["FECHADEPAGO"];
    $Matriculas["IMPORTE"] = $_REQUEST["IMPORTE"];
    $Matriculas["METODODEPAGO"] = $_REQUEST["METODODEPAGO"];
    $Matriculas["PAGADO"]=$_REQUEST["PAGADO"];
    $_SESSION["Matriculas"] = $Matriculas;
    }
    else{
    Header("Location: Matriculas.php");
    }
    

    // Realizar alguna operaci�n seg�n el bot�n que se haya pulsado:
    // Si editar: Header("Location:libros.php"); // Al volver, la l�nea correspondiente pasa a modo edici�n
    if (isset($_REQUEST["editar"])){Header("Location:Matriculas.php");
    }
    
    // Si eliminar: Header("Location:quitar_libro.php"); 
    else if (isset($_REQUEST["quitar"])) {Header("Location:quitar_Matriculas.php");
    }
    // Si grabar: Header("Location:modificar_titulo.php");
    else if (isset($_REQUEST["grabar"])) Header("Location:modificar_Matriculas.php");
        
?>