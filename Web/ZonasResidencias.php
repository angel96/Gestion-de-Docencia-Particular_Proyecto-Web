<?php
session_start();

require_once("gestionBD.php");
require_once("gestionarEntradasZonaResidencia.php");

$conexion = conectarBD();


if (!isset($_SESSION["ZONARESIDENCIA"])) {
    $ZONARESIDENCIA["NOMBREZONA"] = "";
    $ZONARESIDENCIA["PROVINCIA"] = "";
    $ZONARESIDENCIA["OID_Z"] = "";
    $_SESSION["error"]="";
    $_SESSION["destino"]="";
    $_SESSION["ZONARESIDENCIA"] = $ZONARESIDENCIA;
}
else{$ZONARESIDENCIA=$_SESSION["ZONARESIDENCIA"];}
    
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF8"> <!--ISO-8859-1-->
        <title>Gesti&oacute;n de zonas de residencia</title>
        <link type="text/css" rel="stylesheet" href="estilo general.css">
    </head>
<body background="Blue-Widescreen-Background-1920x1200.jpg">
    <?php    
    include_once("cabecera.php"); 
    ?>
<div id="contenidos">
   <br/><br/><br/><br/><br/>
    <div id="libros">
         <table>
            <tr>
                <th>Nombre de la zona</th><th>Provincia</th><th>Eliminar</th><th>Profesores</th>
            </tr>      
        <?php 
            $filas = mostrarTodasLasZonas($conexion);
            foreach($filas as $fila) {
        ?>
       
        <div class="zonaRes">
            <form method="post" action="procesar_ZonaResidencia.php">
            
                <!-- C�digo para mostrar cada una de las l�neas, revise los temas de teor�a -->

                <tr>
                <input id="OID_Z" name="OID_Z" type="hidden" value="<?php echo $fila["OID_Z"]?>"/>
                
                <input id="PROVINCIA" name="PROVINCIA" type="hidden" value="<?php echo $fila["PROVINCIA"]?>"/>
                <input id="NOMBREZONA" name="NOMBREZONA" type="hidden" value="<?php echo $fila["NOMBREZONA"]?>"/>
                <td class='NOMBREZONA'><?php echo $fila["NOMBREZONA"];?></td>  
                <td class='PROVINCIA'><?php echo $fila["PROVINCIA"];?></td>      
                <div id="botones_fila">                     
                
               ?>
                <td><button id="quitar" name="quitar" type="submit" class="editar_fila"><img src="remove-32640.jpg" height="42" width="42" class="editar_fila"></button></td>
                <td><button id="ver_prestamos" name="ver_prestamos" type="submit" class="editar_fila"><img src="ensenar_318-11671.png" height="42" width="42" class="editar_fila"></button></td></tr>
                </div>
            </form>
        </div>
        
        <?php } ?>
    </div>  
</div>

<?php   
    desconectarBD($conexion);
?>      
</body>
</html>