<?php
    session_start();
require_once("GestionarEntradasUsuario.php");
require_once("GestionBD.php");
if (isset ($_SESSION["formularioUsuarios"])){
    $formularioUsuarios= $_SESSION["formularioUsuarios"];
    unset ($_SESSION["formularioUsuarios"]);
    unset ($_SESSION["errores"]);
}
else Header("Location: Formulario_CrearUsuario.php");
$conexion = conectarBD();
?>
<html>
    <head><title>Resultado del Registro</title></head>
    <body><?php if($formularioUsuarios["DNI"]!=""){
        if (crearAlumno($formularioUsuarios["NOMBRE"],$formularioUsuarios["APELLIDOS"],$formularioUsuarios["EMAIL"],$formularioUsuarios["TELEFONO"],$formularioUsuarios["SEXO"],$formularioUsuarios["NOMBREZONA"],$formularioUsuarios["ESCUELA"],$formularioUsuarios["FECHANACIMIENTODIA"],$formularioUsuarios["FECHANACIMIENTOMES"],$formularioUsuarios["FECHANACIMIENTOAÑO"],$formularioUsuarios["DISCAPACIDAD"],$formularioUsuarios["DNI"],$conexion)==""){
        ?>
        <div id="div_exito">
        <h1>Tu entrada para <?php echo $formularioUsuarios["NOMBRE"].$formularioUsuarios["APELLIDOS"]; ?>,ha sido creada</h1>
        </div>
        <?php }
        else{ ?>
        <div id="div_error_registro">
        Ha ocurrido un errror de procesamiento de los datos, por favor inténtelo con otros valores o contacte con el 
        administrador del sistema.
        </div>
        <?php }} 
        else if($formularioUsuarios["MODALIDAD"]!=""){
            if (crearProfesor($formularioUsuarios["NOMBRE"],$formularioUsuarios["APELLIDOS"],$formularioUsuarios["EMAIL"],$formularioUsuarios["TELEFONO"],$formularioUsuarios["SEXO"],$formularioUsuarios["NOMBREZONA"],$formularioUsuarios["MODALIDAD"],$conexion)==""){
        ?>
        <div id="div_exito">
        <h1>Tu entrada para <?php echo $formularioUsuarios["NOMBRE"].$formularioUsuarios["APELLIDOS"]; ?>,ha sido creada</h1>
        </div>
        <?php }
        else{ ?>
        <div id="div_error_registro">
        Ha ocurrido un errror de procesamiento de los datos, por favor inténtelo con otros valores o contacte con el 
        administrador del sistema.
        </div>
        <?php }}else{
            if (crearTutor($formularioUsuarios["NOMBRE"],$formularioUsuarios["APELLIDOS"],$formularioUsuarios["EMAIL"],$formularioUsuarios["TELEFONO"],$formularioUsuarios["SEXO"],$formularioUsuarios["NOMBREZONA"],$conexion)==""){
        ?>
        <div id="div_exito">
        <h1>Tu entrada para <?php echo $formularioUsuarios["NOMBRE"].$formularioUsuarios["APELLIDOS"]; ?>,ha sido creada</h1>
        </div>
        <?php }
        else{ ?>
        <div id="div_error_registro">
        Ha ocurrido un errror de procesamiento de los datos, por favor inténtelo con otros valores o contacte con el 
        administrador del sistema.
        </div>
        <?php }} ?>
        <div id="div_volver">
        Pulsa <a href="Formulario_CrearUsuario.php">aquí</a>
        para crear otro usuario.
        </div>
        
    </body>
</html>
<?php desconectarBD($conexion); ?>