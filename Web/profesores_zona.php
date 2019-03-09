<?php
session_start();

if (isset($_SESSION["ZONARESIDENCIA"])) {
    $ZONARESIDENCIA = $_SESSION["ZONARESIDENCIA"];
    unset($_SESSION["ZONARESIDENCIA"]);
    
    require_once("gestionBD.php");
    require_once("GestionarEntradasZonaResidencia.php");

    $conexion = conectarBD();
}
else Header("Location:EliminarZonasResidencias.php");// Se ha tratado de acceder directamente a este PHP

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF8"><!--ISO-8859-1-->
        <title>Gesti&oacute;n de zonas de residencia: Profesores</title>
        <link type="text/css" rel="stylesheet" href="estilo general.css">
    </head>
<body background="Blue-Widescreen-Background-1920x1200.jpg">
    <?php    
    include_once("cabecera.php"); 
    ?>  
     <br/><br/><br/><br/><br/><br/><br/>
<table>
<tr class="ZonaResidencia"><td>
    <?php echo $ZONARESIDENCIA["NOMBREZONA"]."</div>"; ?>
</td></tr>
<tr><td><fieldset>
<legend align="left">
Profesores
</legend>
<table>
     <tr><th>Nombre</th><th>Apellidos</th><th>Email</th><th>Teléfono</th><th>Sexo</th><th>Modalidad</th></tr>
    <?php 
        $filas = consultarProfesoresDeZona($conexion,$ZONARESIDENCIA["OID_Z"]);
        foreach($filas as $fila) {
    ?>
           <tr><td><?php echo $fila["NOMBRE"]?></td>
            <td><?php echo $fila["APELLIDOS"]?></td>
            <td><?php echo $fila["EMAIL"]?></td>
            <td><?php echo $fila["TELEFONO"]?></td>
            <td><?php echo $fila["SEXO"]?></td>
            <td><?php echo $fila["NOMBREMOD"]?></td></tr>
        
    <?php } ?>
    </td></tr></table>
    </table>
<?php
    desconectarBD($conexion);
?>
</body>
</html>