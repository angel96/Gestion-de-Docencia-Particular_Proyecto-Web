<?php
    session_start();
require_once("GestionarEntradasFacturas.php");
require_once("GestionBD.php");
if (isset ($_SESSION["formularioFact"])){
    $formularioFact = $_SESSION["formularioFact"];
    unset ($_SESSION["formularioFact"]);
    unset ($_SESSION["errores"]);
}
else Header("Location: Formulario_CrearFactura.php");
$conexion = conectarBD();
?>
<!--CORRIGE LO DEL div_exito y error que no sé si estan bien thx -->


<html>
    <head><title>Resultado del Registro</title></head>
    <body><?php if (insertarEntradaFactura($formularioFact["FECHADEPAGODIA"],$formularioFact["FECHADEPAGOMES"],$formularioFact["FECHADEPAGOAÑO"],$formularioFact["IMPORTE"],
	$formularioFact["METODODEPAGO"],$formularioFact["PAGADO"],$formularioFact["OID_MAT"],$conexion)==""){
        ?>
        <div id="div_exito">
        <h1>Tu entrada para la factura ,ha sido creada</h1>
        </div>
        <?php }
        else{ ?>
        <div id="div_error_registro">
        Ha ocurrido un errror de procesamiento de los datos, por favor inténtelo con otros valores o contacte con el 
        administrador del sistema.
        </div>
        <?php } ?>
        <div id="div_volver">
        Pulsa <a href="Formulario_CrearMatrícula.php">aquí</a>
        para crear otra matrícula.
        </div>
    </body>
</html>
<?php desconectarBD($conexion); ?>