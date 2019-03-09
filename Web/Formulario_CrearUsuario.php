<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <?php
    session_start();
    require_once("GestionBD.php");
    require_once("GestionarEntradasModalidad.php");
    $conexion=conectarBD();
if (!isset($_SESSION["formularioUsuarios"])) {
    $formularioUsuarios["NOMBRE"]="";
    $formularioUsuarios["APELLIDOS"]="";
    $formularioUsuarios["EMAIL"]="";
    $formularioUsuarios["TELEFONO"]="";
    $formularioUsuarios["SEXO"]="";
    $formularioUsuarios["NOMBREZONA"]="";
    $formularioUsuarios["ESCUELA"]="";
    $formularioUsuarios["FECHANACIMIENTODIA"]="";
    $formularioUsuarios["FECHANACIMIENTOMES"]="";
    $formularioUsuarios["FECHANACIMIENTOAÑO"]="";
    $formularioUsuarios["DISCAPACIDAD"]="";
    $formularioUsuarios["DNI"]="";
    $formularioUsuarios["EDAD"]="";
    $formularioUsuarios["MODALIDAD"]="";
    $_SESSION["formularioUsuarios"] = $formularioUsuarios;
}
else{
    $formularioUsuarios=$_SESSION["formularioUsuarios"];}
$dias;
for($i=1;$i<=31;$i=$i+1){
    $dias[$i]=$i;
}
$meses;
for($j=1;$j<=12;$j=$j+1){
    $meses[$j]=$j;
}
$años;
for($k=1936;$k<=2014;$k=$k+1){
    $años[$k]=$k;
}
    if(isset($_SESSION["erroresUs"]))
    $erroresUs=$_SESSION["erroresUs"];
?>


    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Crear nuevo usuario</title>
        <link type="text/css" rel="stylesheet" href="estilo general.css">
    </head>
<body background="Blue-Widescreen-Background-1920x1200.jpg">  
    <?php    
    include_once("cabecera.php"); 
    ?>
    <br/><br/><br/><br/><br/><br/><br/>
       <div style="color:red;"> 
        <?php
if (isset($erroresUs)){
print("<div class='error'>");
print("$erroresUs");
print("</div>");
unset($erroresUs);
}
?>
</div> 
    <form action="TratamientoCrearUsuario.php" method="get" enctype="multipart/form-data">
        <table>
        <tr id="div_nombre">
            <td><label for="NOMBRE" id="NOMBRE">Nombre</label></td>
            <td><input id="NOMBRE" name="NOMBRE" type="text" value="<?php echo $formularioUsuarios["NOMBRE"]; ?>" size="50"></input></td></tr>
            <tr id="div_apellidos">
            <td><label for="APELLIDOS" id="label_APELLIDOS">Apellidos</label></td>
            <td><input id="APELLIDOS" name="APELLIDOS" type="text" value="<?php echo $formularioUsuarios['APELLIDOS']; ?>" size="50"></input></td></tr>
            <tr id="div_email">
            <td><label for="EMAIL" id="label_EMAIL">Email</label></td>
            <td><input id="EMAIL" name="EMAIL" type="text" value="<?php echo $formularioUsuarios['EMAIL']; ?>" size="50"></input></td></tr>
            <tr id="div_telefono">
            <td><label for="TELEFONO" id="label_TELEFONO">Teléfono</label></td>
            <td><input id="TELEFONO" name="TELEFONO" type="text" value="<?php echo $formularioUsuarios['TELEFONO']; ?>" size="10"></input></td></tr>
            <tr id="div_sexo">
            <td><label for="SEXO" id="label_SEXO">Sexo:</label></td>
            <td>Hombre <input id="SEXO" name="SEXO" type="radio" value="Hombre"></input></td></tr>
            <tr><td></td><td>Mujer <input id="SEXO" name="SEXO" type="radio" value="Mujer"></input></td></tr>
            <tr id="div_nombreZona">
            <td><label for="NOMBREZONA" id="label_NOMBREZONA">Nombre de la zona</label></td>
            <td><input id="NOMBREZONA" name="NOMBREZONA" type="text" value="<?php echo $formularioUsuarios['NOMBREZONA']; ?>" size="50"></input></td></tr>
            <tr><td></td><td>Si lo que desea es crear un tutor, no necesita rellenar nada más</tr></table>
            <fieldset>
            <legend align="left">
            Si lo que desea es crear un alumno rellene esto
            </legend>
            <table>
            <tr id="div_escuela">
            <td><label for="ESCUELA" id="ESCUELA">Escuela</label></td>
            <td><input id="ESCUELA" name="ESCUELA" type="text" value="<?php echo $formularioUsuarios["ESCUELA"]; ?>" size="50"></input></td></tr>
            <tr id="div_fechaNacimiento">
            <td><label for="FECHANACIMIENTO" id="label_FECHANACIMIENTO">Fecha de Nacimiento</label></td>
            <td><select name="FECHANACIMIENTODIA" value=<?php echo $formularioUsuarios["FECHANACIMIENTODIA"];?> id="FECHANACIMIENTODIA" size="3">
        <?php 
            foreach($dias as $fila) {
        ?>
        <option><?php echo $fila?></option>
        <?php
            }
            ?>
            </select>
            <select name="FECHANACIMIENTOMES" value=<?php echo $formularioUsuarios["FECHANACIMIENTOMES"];?> id="FECHANACIMIENTOMES" size="3">
        <?php 
            foreach($meses as $fila) {
        ?>
        <option><?php echo $fila?></option>
        <?php
            }
            ?>
            </select>
            <select name="FECHANACIMIENTOAÑO" value=<?php echo $formularioUsuarios["FECHANACIMIENTOAÑO"];?> id="FECHANACIMIENTOAÑO" size="3">
        <?php 
            foreach($años as $fila) {
        ?>
        <option><?php echo $fila?></option>
        <?php
            }
            ?>
            </select></td></tr>
            <tr><td><label for="DISCAPACIDAD" id="label_DISCAPACIDAD">Discapacidad:</label></td>
            <td>No <input id="DISCAPACIDAD" name="DISCAPACIDAD" type="radio" value="0"></input></td></tr>
            <tr><td></td><td>Si <input id="DISCAPACIDAD" name="DISCAPACIDAD" type="radio" value="1"></input></td></tr>
            <tr id="div_DNI">
            <td><label for="DNI" id="label_DNI">DNI</label></td>
            <td><input id="DNI" name="DNI" type="text" value="<?php 
            echo $formularioUsuarios['DNI']; ?>" size="9"></input></td></tr>
            </table></fieldset>
            <fieldset>
                 <legend align="left">
                  Si lo que desea es crear un profesor seleccione una modalidad
                   </legend><table>
            <tr><td><label for="Mod" id="label_mod">Modalidad</label></td>
            <td><select name="MODALIDAD" value=<?php echo $formularioUsuarios["MODALIDAD"];?> id="MODALIDAD" size="5">
        <?php 
            $filas = consultarTodasLasModalidades($conexion);
            foreach($filas as $fila) {
        ?>
        <option><?php echo $fila["NOMBREMOD"];?></option>
        <?php
            }
            ?>
            </select></td></tr></table></fieldset>
            <div id="div_submit">
            <tr><td><input type="submit" value="Publicar"></input></td></tr>
        </div>
        </table>
            </form>
        
    
    <?php desconectarBD($conexion);?>
</body>
</html>