<?php
    session_start();
require_once("GestionarEntradasMatricula.php");
require_once("GestionBD.php");
if (isset ($_SESSION["formularioMat"])){
    $formularioMat = $_SESSION["formularioMat"];
    unset ($_SESSION["formularioMat"]);
    unset ($_SESSION["errores"]);
}
else Header("Location: Formulario_CrearMatricula.php");
$conexion = conectarBD();
?>
<!--Insertar entrada matrcula pasar todos atributos poner todos menos los oids -->
<!---->

<html>
    <head><title>Resultado del Registro</title></head>
    <body><?php if (insertarEntradaMatricula($formularioMat["FECHACOMIENZODIA"],$formularioMat["FECHACOMIENZOMES"],$formularioMat["FECHACOMIENZOAÑO"],
    $formularioMat["FECHAFINDIA"],$formularioMat["FECHAFINMES"],$formularioMat["FECHAFINAÑO"], $formularioMat["DNI"],
    $formularioMat["NOMBRETUTOR"],$formularioMat["APELLIDOSTUTOR"], $formularioMat["NOMBREASIG"],$formularioMat["NOMBREPROFESOR"],
    $formularioMat["APELLIDOSPROFESOR"],$conexion)==""){
        ?>
        <div id="div_exito">
        <h1>Tu entrada para la matricula ha sido creada</h1>
        </div>
        <?php 
        $OID_MAT1=consultarOIDMAT($formularioMat["DNI"], $formularioMat["NOMBREASIG"],$formularioMat["NOMBREPROFESOR"],
    $formularioMat["APELLIDOSPROFESOR"],$conexion);
    foreach($OID_MAT1 as $fila){
        $OID_MAT=$fila["OID_MAT"];
    }}
        else{ ?>
        <div id="div_error_registro">
        Ha ocurrido un errror de procesamiento de los datos, por favor inténtelo con otros valores o contacte con el 
        administrador del sistema.
        </div>
        <?php } 
        ?>
        <div id="div_volver">
        Pulsa <a href="Formulario_CrearFactura.php">aquí</a>
        para crear su factura. Recuerde este identificador:<?php echo $OID_MAT;?>
        </div>
    </body>
</html>
<?php desconectarBD($conexion); ?>