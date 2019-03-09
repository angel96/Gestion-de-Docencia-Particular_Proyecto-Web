<?php
    session_start();
require_once("GestionarEntradasZonaResidencia.php");
require_once("GestionBD.php");
if (isset ($_SESSION["formularioZR"])){
    $formularioZR = $_SESSION["formularioZR"];
    unset ($_SESSION["formularioZR"]);
    unset ($_SESSION["errores"]);
}
else Header("Location: Formulario_CrearZonaResidencia.php");
$conexion = conectarBD();
?>
<html>
    <head><title>Resultado del Registro</title></head>
    <body><?php if (insertarEntradaZR($formularioZR["nombreZona"],
        $formularioZR["provincia"], $conexion)==""){
        ?>
        <div id="div_exito">
        <h1>Tu entrada para <?php echo $formularioZR["nombreZona"]; ?>,ha sido creada</h1>
        </div>
        <?php }
        else{ ?>
        <div id="div_error_registro">
        Ha ocurrido un errror de procesamiento de los datos, por favor inténtelo con otros valores.
        </div>
        <?php } ?>
        <div id="div_volver">
        Pulsa <a href="Formulario_CrearZonaResidencia.php">aquí</a>
        para crear otra zona de residencia.
        </div>
    </body>
</html>
<?php desconectarBD($conexion); ?>