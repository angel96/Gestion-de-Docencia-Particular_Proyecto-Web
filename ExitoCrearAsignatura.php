<?php
    session_start();
require_once("GestionarEntradasAsignaturas.php");
require_once("GestionBD.php");
if (isset ($_SESSION["formularioAsig"])){
    $formularioAsig = $_SESSION["formularioAsig"];
    unset ($_SESSION["formularioAsig"]);
    unset ($_SESSION["errores"]);
}
else Header("Location: Formulario_CrearAsignatura.php");
$conexion = conectarBD();
?>
<html>
    <head><title>Resultado del Registro</title></head>
    <body><?php if (insertarEntradaAsignatura($formularioAsig["NOMBREASIG"],$formularioAsig["CURSO"],$formularioAsig["NOMBREMOD"],$conexion)==""){
        ?>
        <div id="div_exito">
        <h1>Tu entrada para <?php echo $formularioAsig["NOMBREASIG"]; ?>,ha sido creada</h1>
        </div>
        <?php }
        else{ ?>
        <div id="div_error_registro">
        Ha ocurrido un errror de procesamiento de los datos, por favor inténtelo con otros valores o contacte con el 
        administrador del sistema.
        </div>
        <?php } ?>
        <div id="div_volver">
        Pulsa <a href="Formulario_CrearAsignatura.php">aquí</a>
        para crear otra asignatura.
        </div>
    </body>
</html>
<?php desconectarBD($conexion); ?>