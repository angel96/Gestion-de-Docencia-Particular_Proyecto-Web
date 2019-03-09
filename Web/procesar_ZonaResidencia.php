<?php
session_start();
if (isset($_SESSION["ZONARESIDENCIA"])) {
    $ZONARESIDENCIA["OID_Z"]=$_REQUEST["OID_Z"];
    $ZONARESIDENCIA["PROVINCIA"]=$_REQUEST["PROVINCIA"];
    $ZONARESIDENCIA["NOMBREZONA"]=$_REQUEST["NOMBREZONA"];
    $_SESSION["ZONARESIDENCIA"] = $ZONARESIDENCIA;
}
else{Header("Location:EliminarZonasResidencias.php");}
	
if(isset($_REQUEST["editar"])) Header("Location:EliminarZonasResidencias.php");
else if(isset($_REQUEST["quitar"])) Header("Location:quitar_zonaResidencia.php");
else if (isset($_REQUEST["grabar"])) Header("Location:modificar_zonaResidencia.php");
else Header("Location:profesores_zona.php");