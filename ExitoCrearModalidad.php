<?php
    session_start();
require_once("GestionarEntradasModalidad.php");
require_once("GestionBD.php");
if (isset ($_SESSION["formularioMod"])){
    $formularioMod = $_SESSION["formularioMod"];
    unset ($_SESSION["formularioMod"]);
    unset ($_SESSION["errores"]);
}
else Header("Location: Formulario_CrearModalidad.php");
$conexion = conectarBD();
?>
<html>
    <head><title>Resultado del Registro</title></head>
    <body><?php if (insertarEntradaModalidad($formularioMod["NOMBREMOD"],$conexion)==""){
        ?>
        <div id="div_exito">
        <h1>Tu entrada para <?php echo $formularioMod["NOMBREMOD"]; ?>,ha sido creada</h1>
        </div>
        <?php }
        else{ ?>
        <div id="div_error_registro">
        Ha ocurrido un errror de procesamiento de los datos, por favor inténtelo con otros valores o contacte con el 
        administrador del sistema.
        </div>
        <?php } ?>
        <div id="div_volver">
        Pulsa <a href="Formulario_CrearModalidad.php">aquí</a>
        para crear otra modalidad.
        </div>
    </body>
</html>
<?php desconectarBD($conexion); ?>