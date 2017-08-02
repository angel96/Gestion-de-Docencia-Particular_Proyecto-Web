<?php
session_start();
if (isset($_SESSION["formularioFact"]) && !empty($_REQUEST["FECHADEPAGO"]) &&
(is_numeric($_REQUEST["IMPORTE"]) || $_REQUEST["IMPORTE"]>0) &&
($_REQUEST["METODODEPAGO"]=='Efectivo' || $_REQUEST["METODODEPAGO"]=='Pago Bancario')
&& !($_REQUEST["PAGADO"]<0 || $_REQUEST["PAGADO"]>1)) {
	$formularioFact["FECHADEPAGODIA"]=$_REQUEST["FECHADEPAGODIA"];
   	$formularioFact["FECHADEPAGOMES"]=$_REQUEST["FECHADEPAGOMES"];
	$formularioFact["FECHADEPAGOAÑO"]=$_REQUEST["FECHADEPAGOAÑO"];
    $formularioFact["IMPORTE"]=$_REQUEST["IMPORTE"];
    $formularioFact["METODODEPAGO"]=$_REQUEST["METODODEPAGO"];
	$formularioFact["PAGADO"]=$_REQUEST["PAGADO"];
    $formularioFact["OID_MAT"]=$_REQUEST["OID_MAT"];
    $_SESSION["formularioFact"] = $formularioFact;
    Header("Location: ExitoCrearFactura.php");}
else if(isset($_SESSION["formularioFact"]) && empty($_REQUEST["FECHADEPAGO"])){
    $erroresFact = " La fecha de pago no puede estar vacía";
    $_SESSION["erroresFact"]=$erroresFact;
    Header("Location: Formulario_CrearFactura.php");
}
else if(isset($_SESSION["formularioFact"]) && (!(is_numeric($_REQUEST["IMPORTE"])) || $_REQUEST["IMPORTE"]<=0)){
    $erroresFact = "El importe debe ser un número positivo";
    $_SESSION["erroresFact"]=$erroresFact;
    Header("Location: Formulario_CrearFactura.php");
}
else if(isset($_SESSION["formularioFact"]) && !($_REQUEST["METODODEPAGO"]=='Efectivo' || $_REQUEST["METODODEPAGO"]=='Pago Bancario')){
    $erroresFact = "El método de pago debe ser Efectivo o Pago Bancario";
    $_SESSION["erroresFact"]=$erroresFact;
    Header("Location: Formulario_CrearFactura.php");
}
else if(isset($_SESSION["formularioFact"]) && ($_REQUEST["PAGADO"]<0 || $_REQUEST["PAGADO"]>1)){
    $erroresFact = "El pago efectuado debe ser 0 o 1";
    $_SESSION["erroresFact"]=$erroresFact;
    Header("Location: Formulario_CrearFactura.php");
}else{
    Header("Location: Formulario_CrearFactura.php");
        }
?>