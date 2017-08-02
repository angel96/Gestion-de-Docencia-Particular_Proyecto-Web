<?php
session_start();

if (isset($_SESSION["Modalidad"])) {
    $Modalidad = $_SESSION["Modalidad"];
    unset($_SESSION["Modalidad"]);
    
    require_once("gestionBD.php");
    require_once("GestionarEntradasModalidad.php");

    $conexion = conectarBD();
}
else Header("Location:GestionModalidades.php");// Se ha tratado de acceder directamente a este PHP

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF8"><!--ISO-8859-1-->
        <title>Gesti&oacute;n de modalidades: Asignaturas vinculadas</title>
        <link type="text/css" rel="stylesheet" href="estilo general.css">
        
    </head>
<body background="Blue-Widescreen-Background-1920x1200.jpg"> 
    <?php    
    include_once("cabecera.php"); 
    ?>
    <br/><br/><br/><br/>
<table>
<tr class="Modalidad"><td>
    <?php echo $Modalidad["NOMBREMOD"]; ?>
</td></tr>
<tr><td><fieldset>
<legend align="left">
Asignaturas
</legend>
<table>
    <tr><th>Nombre</th><th>Curso</th></tr>
    <?php 
        $filas = consultarAsignaturasDeModalidad($conexion,$Modalidad["OID_M"]);
        foreach($filas as $fila) {
    ?>
            <tr><td><?php echo $fila["NOMBREASIG"]?></td>
            <td><?php echo $fila["CURSO"]?></td></tr>
        
    <?php } ?>
    </td></tr></table>
<tr><td><fieldset>
<legend align="left">
Profesores
</legend>
<table>
    <tr><th>Nombre</th><th>Apellidos</th><th>Email</th><th>Teléfono</th><th>Sexo</th><th>Zona</th></tr>
    <?php 
        $filas = consultarProfesoresDeModalidad($conexion,$Modalidad["OID_M"]);
        foreach($filas as $fila) {
    ?>
            <tr><td><?php echo $fila["NOMBRE"]?></td>
            <td><?php echo $fila["APELLIDOS"]?></td>
            <td><?php echo $fila["EMAIL"]?></td>
            <td><?php echo $fila["TELEFONO"]?></td><
            <td><?php echo $fila["SEXO"]?></td>
            <td><?php echo $fila["NOMBREZONA"]?></td></tr>
        
    <?php } ?>
    </table></td></tr>
    </table>
<?php
    desconectarBD($conexion);
?>
</body>
</html>